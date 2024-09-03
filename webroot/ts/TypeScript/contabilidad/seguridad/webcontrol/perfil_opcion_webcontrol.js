//<script type="text/javascript" language="javascript">



//var perfil_opcionJQueryPaginaWebInteraccion= function (perfil_opcion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_opcion_constante,perfil_opcion_constante1} from '../util/perfil_opcion_constante.js';

import {perfil_opcion_funcion,perfil_opcion_funcion1} from '../util/perfil_opcion_funcion.js';


class perfil_opcion_webcontrol extends GeneralEntityWebControl {
	
	perfil_opcion_control=null;
	perfil_opcion_controlInicial=null;
	perfil_opcion_controlAuxiliar=null;
		
	//if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_opcion_control) {
		super();
		
		this.perfil_opcion_control=perfil_opcion_control;
	}
		
	actualizarVariablesPagina(perfil_opcion_control) {
		
		if(perfil_opcion_control.action=="index" || perfil_opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_opcion_control);
			
		} 
		
		
		else if(perfil_opcion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_opcion_control);
			
		} else if(perfil_opcion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_opcion_control);
			
		} else if(perfil_opcion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_opcion_control);
		
		}  else if(perfil_opcion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action.includes("Busqueda") ||
				  perfil_opcion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(perfil_opcion_control);
			
		} else if(perfil_opcion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_opcion_control)
		}
		
		
		
	
		else if(perfil_opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_opcion_control);	
		
		} else if(perfil_opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_opcion_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_opcion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_opcion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_opcion_control) {
		this.actualizarPaginaAccionesGenerales(perfil_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_opcion_control);
		this.actualizarPaginaOrderBy(perfil_opcion_control);
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control);
		this.actualizarPaginaAreaBusquedas(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_opcion_control) {
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_opcion_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_opcion_control);
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control);
		this.actualizarPaginaAreaBusquedas(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_opcion_control) {
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaAbrirLink(perfil_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);				
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		//this.actualizarPaginaFormulario(perfil_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		//this.actualizarPaginaFormulario(perfil_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_opcion_control) {
		//this.actualizarPaginaFormulario(perfil_opcion_control);
		this.onLoadCombosDefectoFK(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		//this.actualizarPaginaFormulario(perfil_opcion_control);
		this.onLoadCombosDefectoFK(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaAbrirLink(perfil_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_opcion_control) {
		this.actualizarPaginaTablaDatos(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_opcion_control) {
					//super.actualizarPaginaImprimir(perfil_opcion_control,"perfil_opcion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_opcion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("perfil_opcion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_opcion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_opcion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_opcion_control) {
		//super.actualizarPaginaImprimir(perfil_opcion_control,"perfil_opcion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("perfil_opcion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(perfil_opcion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_opcion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_opcion_control) {
		//super.actualizarPaginaImprimir(perfil_opcion_control,"perfil_opcion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("perfil_opcion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_opcion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_opcion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_opcion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_opcion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(perfil_opcion_control);
			
		this.actualizarPaginaAbrirLink(perfil_opcion_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_opcion_control) {
		
		if(perfil_opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_opcion_control);
		}
		
		if(perfil_opcion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_opcion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_opcion_control) {
		if(perfil_opcion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_opcionReturnGeneral",JSON.stringify(perfil_opcion_control.perfil_opcionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control) {
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_opcion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_opcion_control, mostrar) {
		
		if(mostrar==true) {
			perfil_opcion_funcion1.resaltarRestaurarDivsPagina(false,"perfil_opcion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_opcion_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_opcion");
			}			
			
			perfil_opcion_funcion1.mostrarDivMensaje(true,perfil_opcion_control.strAuxiliarMensaje,perfil_opcion_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_opcion_funcion1.mostrarDivMensaje(false,perfil_opcion_control.strAuxiliarMensaje,perfil_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control) {
		if(perfil_opcion_funcion1.esPaginaForm(perfil_opcion_constante1)==true) {
			window.opener.perfil_opcion_webcontrol1.actualizarPaginaTablaDatos(perfil_opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_opcion_control) {
		perfil_opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_opcion_control.strAuxiliarUrlPagina);
				
		perfil_opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_opcion_control.strAuxiliarTipo,perfil_opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_opcion_control) {
		perfil_opcion_funcion1.resaltarRestaurarDivMensaje(true,perfil_opcion_control.strAuxiliarMensajeAlert,perfil_opcion_control.strAuxiliarCssMensaje);
			
		if(perfil_opcion_funcion1.esPaginaForm(perfil_opcion_constante1)==true) {
			window.opener.perfil_opcion_funcion1.resaltarRestaurarDivMensaje(true,perfil_opcion_control.strAuxiliarMensajeAlert,perfil_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_opcion_control) {
		this.perfil_opcion_controlInicial=perfil_opcion_control;
			
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_opcion_control.strStyleDivArbol,perfil_opcion_control.strStyleDivContent
																,perfil_opcion_control.strStyleDivOpcionesBanner,perfil_opcion_control.strStyleDivExpandirColapsar
																,perfil_opcion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_opcion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_opcion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_opcion_control) {
		this.actualizarCssBotonesPagina(perfil_opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_opcion_control.tiposReportes,perfil_opcion_control.tiposReporte
															 	,perfil_opcion_control.tiposPaginacion,perfil_opcion_control.tiposAcciones
																,perfil_opcion_control.tiposColumnasSelect,perfil_opcion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_opcion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_opcion_control) {
	
		var indexPosition=perfil_opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.cargarCombosperfilsFK(perfil_opcion_control);
			}

			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.cargarCombosopcionsFK(perfil_opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_opcion_control.strRecargarFkTiposNinguno!=null && perfil_opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_opcion_webcontrol1.cargarCombosperfilsFK(perfil_opcion_control);
				}

				if(perfil_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_opcion_webcontrol1.cargarCombosopcionsFK(perfil_opcion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_opcion_funcion1,perfil_opcion_control.perfilsFK);
	}

	cargarComboEditarTablaopcionFK(perfil_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_opcion_funcion1,perfil_opcion_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(perfil_opcion_control) {
		jQuery("#divBusquedaperfil_opcionAjaxWebPart").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trperfil_opcionCabeceraBusquedas").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_opcion").css("display",perfil_opcion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_opcion_control.htmlTablaOrderBy!=null
			&& perfil_opcion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfil_opcionAjaxWebPart").html(perfil_opcion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_opcion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_opcion_control.htmlTablaOrderByRel!=null
			&& perfil_opcion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfil_opcionAjaxWebPart").html(perfil_opcion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfil_opcionAjaxWebPart").css("display","none");
			jQuery("#trperfil_opcionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil_opcion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(perfil_opcion_control) {
		
		if(!perfil_opcion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(perfil_opcion_control);
		} else {
			jQuery("#divTablaDatosperfil_opcionsAjaxWebPart").html(perfil_opcion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfil_opcions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfil_opcions=jQuery("#tblTablaDatosperfil_opcions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil_opcion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_opcion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_opcion_webcontrol1.registrarControlesTableEdition(perfil_opcion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_opcion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(perfil_opcion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("perfil_opcion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_opcion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosperfil_opcionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(perfil_opcion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(perfil_opcion_control);
		
		const divOrderBy = document.getElementById("divOrderByperfil_opcionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(perfil_opcion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelperfil_opcionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(perfil_opcion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_opcion_control.perfil_opcionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_opcion_control);			
		}
	}
	
	actualizarCamposFilaTabla(perfil_opcion_control) {
		var i=0;
		
		i=perfil_opcion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_opcion_control.perfil_opcionActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_opcion_control.perfil_opcionActual.versionRow);
		
		if(perfil_opcion_control.perfil_opcionActual.id_perfil!=null && perfil_opcion_control.perfil_opcionActual.id_perfil>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != perfil_opcion_control.perfil_opcionActual.id_perfil) {
				jQuery("#t-cel_"+i+"_2").val(perfil_opcion_control.perfil_opcionActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_opcion_control.perfil_opcionActual.id_opcion!=null && perfil_opcion_control.perfil_opcionActual.id_opcion>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_opcion_control.perfil_opcionActual.id_opcion) {
				jQuery("#t-cel_"+i+"_3").val(perfil_opcion_control.perfil_opcionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").prop('checked',perfil_opcion_control.perfil_opcionActual.todo);
		jQuery("#t-cel_"+i+"_5").prop('checked',perfil_opcion_control.perfil_opcionActual.ingreso);
		jQuery("#t-cel_"+i+"_6").prop('checked',perfil_opcion_control.perfil_opcionActual.modificacion);
		jQuery("#t-cel_"+i+"_7").prop('checked',perfil_opcion_control.perfil_opcionActual.eliminacion);
		jQuery("#t-cel_"+i+"_8").prop('checked',perfil_opcion_control.perfil_opcionActual.consulta);
		jQuery("#t-cel_"+i+"_9").prop('checked',perfil_opcion_control.perfil_opcionActual.busqueda);
		jQuery("#t-cel_"+i+"_10").prop('checked',perfil_opcion_control.perfil_opcionActual.reporte);
		jQuery("#t-cel_"+i+"_11").prop('checked',perfil_opcion_control.perfil_opcionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_opcion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(perfil_opcion_control) {
		perfil_opcion_funcion1.registrarControlesTableValidacionEdition(perfil_opcion_control,perfil_opcion_webcontrol1,perfil_opcion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_opcion_control) {
		jQuery("#divResumenperfil_opcionActualAjaxWebPart").html(perfil_opcion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_opcion_control) {
		//jQuery("#divAccionesRelacionesperfil_opcionAjaxWebPart").html(perfil_opcion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("perfil_opcion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_opcion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesperfil_opcionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		perfil_opcion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_opcion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_opcion_control) {
		
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion").attr("style",perfil_opcion_control.strVisibleBusquedaPorIdPerfilPorIdOpcion);
			jQuery("#tblstrVisible"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion").attr("style",perfil_opcion_control.strVisibleBusquedaPorIdPerfilPorIdOpcion);
		}

		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",perfil_opcion_control.strVisibleFK_Idopcion);
			jQuery("#tblstrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",perfil_opcion_control.strVisibleFK_Idopcion);
		}

		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_opcion_control.strVisibleFK_Idperfil);
			jQuery("#tblstrVisible"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_opcion_control.strVisibleFK_Idperfil);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil_opcion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil_opcion",id,"seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);		
	}
	
	

	abrirBusquedaParaperfil(strNombreCampoBusqueda){//idActual
		perfil_opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_opcion","perfil","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}

	abrirBusquedaParaopcion(strNombreCampoBusqueda){//idActual
		perfil_opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_opcion","opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	

	setCombosCodigoDesdeBusquedaid_opcion(id_opcion) {
		if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != id_opcion) {
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(id_opcion).trigger("change");

		}
		if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val() != id_opcion) {
			jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(id_opcion).trigger("change");
		}
		if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != id_opcion) {
			jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(id_opcion).trigger("change");
		}

	}
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcionConstante,strParametros);
		
		//perfil_opcion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil",perfil_opcion_control.perfilsFK);

		if(perfil_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_opcion_control.idFilaTablaActual+"_2",perfil_opcion_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil",perfil_opcion_control.perfilsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_opcion_control.perfilsFK);

	};

	cargarCombosopcionsFK(perfil_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion",perfil_opcion_control.opcionsFK);

		if(perfil_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_opcion_control.idFilaTablaActual+"_3",perfil_opcion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion",perfil_opcion_control.opcionsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",perfil_opcion_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_opcion_control) {

	};

	registrarComboActionChangeCombosopcionsFK(perfil_opcion_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_opcion_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_opcion_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_opcion_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val(perfil_opcion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_opcion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosopcionsFK(perfil_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_opcion_control.idopcionDefaultFK>-1 && jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != perfil_opcion_control.idopcionDefaultFK) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(perfil_opcion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(perfil_opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(perfil_opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.setDefectoValorCombosperfilsFK(perfil_opcion_control);
			}

			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.setDefectoValorCombosopcionsFK(perfil_opcion_control);
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
	onLoadCombosEventosFK(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_opcion_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_opcion_control);
			//}

			//if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_opcion_webcontrol1.registrarComboActionChangeCombosopcionsFK(perfil_opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_opcion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_opcion","BusquedaPorIdPerfilPorIdOpcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_opcion","FK_Idopcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_opcion","FK_Idperfil","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
		
			
			if(perfil_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_opcion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_opcion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,"perfil_opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_opcion_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				perfil_opcion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_opcion_control) {
		
		jQuery("#divBusquedaperfil_opcionAjaxWebPart").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trperfil_opcionCabeceraBusquedas").css("display",perfil_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_opcion").css("display",perfil_opcion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil_opcion").css("display",perfil_opcion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil_opcion").attr("style",perfil_opcion_control.strPermisoMostrarTodos);		
		
		if(perfil_opcion_control.strPermisoNuevo!=null) {
			jQuery("#tdperfil_opcionNuevo").css("display",perfil_opcion_control.strPermisoNuevo);
			jQuery("#tdperfil_opcionNuevoToolBar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfil_opcionDuplicar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_opcionDuplicarToolBar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_opcionNuevoGuardarCambios").css("display",perfil_opcion_control.strPermisoNuevo);
			jQuery("#tdperfil_opcionNuevoGuardarCambiosToolBar").css("display",perfil_opcion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_opcionCopiar").css("display",perfil_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_opcionCopiarToolBar").css("display",perfil_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_opcionConEditar").css("display",perfil_opcion_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfil_opcionGuardarCambios").css("display",perfil_opcion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfil_opcionGuardarCambiosToolBar").css("display",perfil_opcion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdperfil_opcionCerrarPagina").css("display",perfil_opcion_control.strPermisoPopup);		
		jQuery("#tdperfil_opcionCerrarPaginaToolBar").css("display",perfil_opcion_control.strPermisoPopup);
		//jQuery("#trperfil_opcionAccionesRelaciones").css("display",perfil_opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfil Opciones";
		sTituloBanner+=" - " + perfil_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_opcion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_opcionRelacionesToolBar").css("display",perfil_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_opcion").css("display",perfil_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_opcion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_opcion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_opcion_webcontrol1.registrarEventosControles();
		
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			perfil_opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_opcion_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_opcion_webcontrol1.onLoad();
			
			//} else {
				//if(perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			perfil_opcion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);	
	}
}

var perfil_opcion_webcontrol1 = new perfil_opcion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_opcion_webcontrol,perfil_opcion_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_opcion_webcontrol1 = perfil_opcion_webcontrol1;


if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_opcion_webcontrol1.onLoadWindow; 
}

//</script>