//<script type="text/javascript" language="javascript">



//var opcionJQueryPaginaWebInteraccion= function (opcion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {opcion_constante,opcion_constante1} from '../util/opcion_constante.js';

import {opcion_funcion,opcion_funcion1} from '../util/opcion_funcion.js';


class opcion_webcontrol extends GeneralEntityWebControl {
	
	opcion_control=null;
	opcion_controlInicial=null;
	opcion_controlAuxiliar=null;
		
	//if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(opcion_control) {
		super();
		
		this.opcion_control=opcion_control;
	}
		
	actualizarVariablesPagina(opcion_control) {
		
		if(opcion_control.action=="index" || opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(opcion_control);
			
		} 
		
		
		else if(opcion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(opcion_control);
		
		} else if(opcion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(opcion_control);
		
		} else if(opcion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(opcion_control);
		
		} else if(opcion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(opcion_control);
			
		} else if(opcion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(opcion_control);
			
		} else if(opcion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(opcion_control);
		
		} else if(opcion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(opcion_control);		
		
		} else if(opcion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(opcion_control);
		
		} else if(opcion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(opcion_control);
		
		} else if(opcion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(opcion_control);
		
		} else if(opcion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(opcion_control);
		
		}  else if(opcion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(opcion_control);
		
		} else if(opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(opcion_control);
		
		} else if(opcion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(opcion_control);
		
		} else if(opcion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(opcion_control);
		
		} else if(opcion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(opcion_control);
		
		} else if(opcion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(opcion_control);
		
		} else if(opcion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(opcion_control);
		
		} else if(opcion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(opcion_control);
		
		} else if(opcion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(opcion_control);
		
		} else if(opcion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(opcion_control);		
		
		} else if(opcion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(opcion_control);		
		
		} else if(opcion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(opcion_control);		
		
		} else if(opcion_control.action.includes("Busqueda") ||
				  opcion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(opcion_control);
			
		} else if(opcion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(opcion_control)
		}
		
		
		
	
		else if(opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(opcion_control);	
		
		} else if(opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(opcion_control);		
		}
	
		else if(opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(opcion_control);		
		}
	
		else if(opcion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(opcion_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + opcion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(opcion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(opcion_control) {
		this.actualizarPaginaAccionesGenerales(opcion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(opcion_control) {
		
		this.actualizarPaginaCargaGeneral(opcion_control);
		this.actualizarPaginaOrderBy(opcion_control);
		this.actualizarPaginaTablaDatos(opcion_control);
		this.actualizarPaginaCargaGeneralControles(opcion_control);
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(opcion_control);
		this.actualizarPaginaAreaBusquedas(opcion_control);
		this.actualizarPaginaCargaCombosFK(opcion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(opcion_control) {
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(opcion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(opcion_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(opcion_control) {
		
		this.actualizarPaginaCargaGeneral(opcion_control);
		this.actualizarPaginaTablaDatos(opcion_control);
		this.actualizarPaginaCargaGeneralControles(opcion_control);
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(opcion_control);
		this.actualizarPaginaAreaBusquedas(opcion_control);
		this.actualizarPaginaCargaCombosFK(opcion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(opcion_control) {
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(opcion_control) {
		this.actualizarPaginaAbrirLink(opcion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);				
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);
		//this.actualizarPaginaFormulario(opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);
		//this.actualizarPaginaFormulario(opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(opcion_control) {
		//this.actualizarPaginaFormulario(opcion_control);
		this.onLoadCombosDefectoFK(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);
		//this.actualizarPaginaFormulario(opcion_control);
		this.onLoadCombosDefectoFK(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(opcion_control) {
		this.actualizarPaginaAbrirLink(opcion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(opcion_control) {
					//super.actualizarPaginaImprimir(opcion_control,"opcion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",opcion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("opcion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(opcion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(opcion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(opcion_control) {
		//super.actualizarPaginaImprimir(opcion_control,"opcion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("opcion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(opcion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",opcion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(opcion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(opcion_control) {
		//super.actualizarPaginaImprimir(opcion_control,"opcion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("opcion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(opcion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",opcion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(opcion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(opcion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(opcion_control);
			
		this.actualizarPaginaAbrirLink(opcion_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(opcion_control) {
		this.actualizarPaginaTablaDatos(opcion_control);
		this.actualizarPaginaFormulario(opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(opcion_control) {
		
		if(opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(opcion_control);
		}
		
		if(opcion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(opcion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(opcion_control) {
		if(opcion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("opcionReturnGeneral",JSON.stringify(opcion_control.opcionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(opcion_control) {
		if(opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(opcion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(opcion_control, mostrar) {
		
		if(mostrar==true) {
			opcion_funcion1.resaltarRestaurarDivsPagina(false,"opcion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				opcion_funcion1.resaltarRestaurarDivMantenimiento(false,"opcion");
			}			
			
			opcion_funcion1.mostrarDivMensaje(true,opcion_control.strAuxiliarMensaje,opcion_control.strAuxiliarCssMensaje);
		
		} else {
			opcion_funcion1.mostrarDivMensaje(false,opcion_control.strAuxiliarMensaje,opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(opcion_control) {
		if(opcion_funcion1.esPaginaForm(opcion_constante1)==true) {
			window.opener.opcion_webcontrol1.actualizarPaginaTablaDatos(opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(opcion_control) {
		opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(opcion_control.strAuxiliarUrlPagina);
				
		opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(opcion_control.strAuxiliarTipo,opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(opcion_control) {
		opcion_funcion1.resaltarRestaurarDivMensaje(true,opcion_control.strAuxiliarMensajeAlert,opcion_control.strAuxiliarCssMensaje);
			
		if(opcion_funcion1.esPaginaForm(opcion_constante1)==true) {
			window.opener.opcion_funcion1.resaltarRestaurarDivMensaje(true,opcion_control.strAuxiliarMensajeAlert,opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(opcion_control) {
		this.opcion_controlInicial=opcion_control;
			
		if(opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(opcion_control.strStyleDivArbol,opcion_control.strStyleDivContent
																,opcion_control.strStyleDivOpcionesBanner,opcion_control.strStyleDivExpandirColapsar
																,opcion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=opcion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",opcion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(opcion_control) {
		this.actualizarCssBotonesPagina(opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(opcion_control.tiposReportes,opcion_control.tiposReporte
															 	,opcion_control.tiposPaginacion,opcion_control.tiposAcciones
																,opcion_control.tiposColumnasSelect,opcion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(opcion_control.tiposRelaciones,opcion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(opcion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(opcion_control) {
	
		var indexPosition=opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombossistemasFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombosopcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombosgrupo_opcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombosmodulosFK(opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(opcion_control.strRecargarFkTiposNinguno!=null && opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombossistemasFK(opcion_control);
				}

				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombosopcionsFK(opcion_control);
				}

				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombosgrupo_opcionsFK(opcion_control);
				}

				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombosmodulosFK(opcion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.sistemasFK);
	}

	cargarComboEditarTablaopcionFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.opcionsFK);
	}

	cargarComboEditarTablagrupo_opcionFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.grupo_opcionsFK);
	}

	cargarComboEditarTablamoduloFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(opcion_control) {
		jQuery("#divBusquedaopcionAjaxWebPart").css("display",opcion_control.strPermisoBusqueda);
		jQuery("#tropcionCabeceraBusquedas").css("display",opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedaopcion").css("display",opcion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(opcion_control.htmlTablaOrderBy!=null
			&& opcion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByopcionAjaxWebPart").html(opcion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//opcion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(opcion_control.htmlTablaOrderByRel!=null
			&& opcion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelopcionAjaxWebPart").html(opcion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(opcion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaopcionAjaxWebPart").css("display","none");
			jQuery("#tropcionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaopcion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(opcion_control) {
		
		if(!opcion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(opcion_control);
		} else {
			jQuery("#divTablaDatosopcionsAjaxWebPart").html(opcion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosopcions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(opcion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosopcions=jQuery("#tblTablaDatosopcions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("opcion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',opcion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			opcion_webcontrol1.registrarControlesTableEdition(opcion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		opcion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(opcion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("opcion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(opcion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosopcionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(opcion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(opcion_control);
		
		const divOrderBy = document.getElementById("divOrderByopcionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(opcion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelopcionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(opcion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(opcion_control.opcionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(opcion_control);			
		}
	}
	
	actualizarCamposFilaTabla(opcion_control) {
		var i=0;
		
		i=opcion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(opcion_control.opcionActual.id);
		jQuery("#t-version_row_"+i+"").val(opcion_control.opcionActual.versionRow);
		
		if(opcion_control.opcionActual.id_sistema!=null && opcion_control.opcionActual.id_sistema>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != opcion_control.opcionActual.id_sistema) {
				jQuery("#t-cel_"+i+"_2").val(opcion_control.opcionActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(opcion_control.opcionActual.id_opcion!=null && opcion_control.opcionActual.id_opcion>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != opcion_control.opcionActual.id_opcion) {
				jQuery("#t-cel_"+i+"_3").val(opcion_control.opcionActual.id_opcion).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_3").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(opcion_control.opcionActual.id_grupo_opcion!=null && opcion_control.opcionActual.id_grupo_opcion>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != opcion_control.opcionActual.id_grupo_opcion) {
				jQuery("#t-cel_"+i+"_4").val(opcion_control.opcionActual.id_grupo_opcion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(opcion_control.opcionActual.id_modulo!=null && opcion_control.opcionActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != opcion_control.opcionActual.id_modulo) {
				jQuery("#t-cel_"+i+"_5").val(opcion_control.opcionActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(opcion_control.opcionActual.codigo);
		jQuery("#t-cel_"+i+"_7").val(opcion_control.opcionActual.nombre);
		jQuery("#t-cel_"+i+"_8").val(opcion_control.opcionActual.posicion);
		jQuery("#t-cel_"+i+"_9").val(opcion_control.opcionActual.icon_name);
		jQuery("#t-cel_"+i+"_10").val(opcion_control.opcionActual.nombre_clase);
		jQuery("#t-cel_"+i+"_11").val(opcion_control.opcionActual.modulo0);
		jQuery("#t-cel_"+i+"_12").val(opcion_control.opcionActual.sub_modulo);
		jQuery("#t-cel_"+i+"_13").val(opcion_control.opcionActual.paquete);
		jQuery("#t-cel_"+i+"_14").prop('checked',opcion_control.opcionActual.es_para_menu);
		jQuery("#t-cel_"+i+"_15").prop('checked',opcion_control.opcionActual.es_guardar_relaciones);
		jQuery("#t-cel_"+i+"_16").prop('checked',opcion_control.opcionActual.con_mostrar_acciones_campo);
		jQuery("#t-cel_"+i+"_17").prop('checked',opcion_control.opcionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(opcion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_opcion").click(function(){
		jQuery("#tblTablaDatosopcions").on("click",".imgrelacionperfil_opcion", function () {

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionopcion").click(function(){
		jQuery("#tblTablaDatosopcions").on("click",".imgrelacionopcion", function () {

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParaopciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionaccion").click(function(){
		jQuery("#tblTablaDatosopcions").on("click",".imgrelacionaccion", function () {

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParaacciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncampo").click(function(){
		jQuery("#tblTablaDatosopcions").on("click",".imgrelacioncampo", function () {

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParacampos(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_opciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"opcion","perfil_opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1,"es","");
	}

	registrarSesionParaopciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"opcion","opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1,"es","");
	}

	registrarSesionParaacciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"opcion","accion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1,"es","");
	}

	registrarSesionParacampos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"opcion","campo","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1,"s","");
	}
	
	registrarControlesTableEdition(opcion_control) {
		opcion_funcion1.registrarControlesTableValidacionEdition(opcion_control,opcion_webcontrol1,opcion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(opcion_control) {
		jQuery("#divResumenopcionActualAjaxWebPart").html(opcion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(opcion_control) {
		//jQuery("#divAccionesRelacionesopcionAjaxWebPart").html(opcion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("opcion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(opcion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesopcionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		opcion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(opcion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(opcion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(opcion_control) {
		
		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion").attr("style",opcion_control.strVisibleBusquedaPorIdSistemaPorIdOpcion);
			jQuery("#tblstrVisible"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion").attr("style",opcion_control.strVisibleBusquedaPorIdSistemaPorIdOpcion);
		}

		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre").attr("style",opcion_control.strVisibleBusquedaPorIdSistemaPorNombre);
			jQuery("#tblstrVisible"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre").attr("style",opcion_control.strVisibleBusquedaPorIdSistemaPorNombre);
		}

		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion").attr("style",opcion_control.strVisibleFK_Idgrupo_opcion);
			jQuery("#tblstrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion").attr("style",opcion_control.strVisibleFK_Idgrupo_opcion);
		}

		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",opcion_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",opcion_control.strVisibleFK_Idmodulo);
		}

		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",opcion_control.strVisibleFK_Idopcion);
			jQuery("#tblstrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",opcion_control.strVisibleFK_Idopcion);
		}

		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",opcion_control.strVisibleFK_Idsistema);
			jQuery("#tblstrVisible"+opcion_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",opcion_control.strVisibleFK_Idsistema);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionopcion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("opcion",id,"seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);		
	}
	
	

	abrirBusquedaParasistema(strNombreCampoBusqueda){//idActual
		opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("opcion","sistema","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}

	abrirBusquedaParaopcion(strNombreCampoBusqueda){//idActual
		opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("opcion","opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}

	abrirBusquedaParagrupo_opcion(strNombreCampoBusqueda){//idActual
		opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("opcion","grupo_opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("opcion","modulo","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_opcion").click(function(){

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		});
		jQuery("#imgdivrelacionopcion").click(function(){

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParaopciones(idActual);
		});
		jQuery("#imgdivrelacionaccion").click(function(){

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParaacciones(idActual);
		});
		jQuery("#imgdivrelacioncampo").click(function(){

			var idActual=jQuery(this).attr("idactualopcion");

			opcion_webcontrol1.registrarSesionParacampos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcionConstante,strParametros);
		
		//opcion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema",opcion_control.sistemasFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_2",opcion_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema",opcion_control.sistemasFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema",opcion_control.sistemasFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",opcion_control.sistemasFK);

	};

	cargarCombosopcionsFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion",opcion_control.opcionsFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_3",opcion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion",opcion_control.opcionsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",opcion_control.opcionsFK);

	};

	cargarCombosgrupo_opcionsFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion",opcion_control.grupo_opcionsFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_4",opcion_control.grupo_opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion",opcion_control.grupo_opcionsFK);

	};

	cargarCombosmodulosFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo",opcion_control.modulosFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_5",opcion_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombossistemasFK(opcion_control) {

	};

	registrarComboActionChangeCombosopcionsFK(opcion_control) {

	};

	registrarComboActionChangeCombosgrupo_opcionsFK(opcion_control) {

	};

	registrarComboActionChangeCombosmodulosFK(opcion_control) {

	};

	
	
	setDefectoValorCombossistemasFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idsistemaDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val() != opcion_control.idsistemaDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val(opcion_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema").val(opcion_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema").val(opcion_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(opcion_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosopcionsFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idopcionDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val() != opcion_control.idopcionDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val(opcion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion").val(opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgrupo_opcionsFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idgrupo_opcionDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val() != opcion_control.idgrupo_opcionDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val(opcion_control.idgrupo_opcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion").val(opcion_control.idgrupo_opcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idmoduloDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val() != opcion_control.idmoduloDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val(opcion_control.idmoduloDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombossistemasFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombosopcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombosgrupo_opcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombosmodulosFK(opcion_control);
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
	onLoadCombosEventosFK(opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombossistemasFK(opcion_control);
			//}

			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombosopcionsFK(opcion_control);
			//}

			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombosgrupo_opcionsFK(opcion_control);
			//}

			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombosmodulosFK(opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(opcion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("opcion","BusquedaPorIdSistemaPorIdOpcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("opcion","BusquedaPorIdSistemaPorNombre","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("opcion","FK_Idgrupo_opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("opcion","FK_Idmodulo","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("opcion","FK_Idopcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("opcion","FK_Idsistema","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
		
			
			if(opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("opcion");		
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("opcion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(opcion_funcion1,opcion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(opcion_funcion1,opcion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,"opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("grupo_opcion","id_grupo_opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParagrupo_opcion("id_grupo_opcion");
				//alert(jQuery('#form-id_grupo_opcion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("opcion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(opcion_control) {
		
		jQuery("#divBusquedaopcionAjaxWebPart").css("display",opcion_control.strPermisoBusqueda);
		jQuery("#tropcionCabeceraBusquedas").css("display",opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedaopcion").css("display",opcion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteopcion").css("display",opcion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosopcion").attr("style",opcion_control.strPermisoMostrarTodos);		
		
		if(opcion_control.strPermisoNuevo!=null) {
			jQuery("#tdopcionNuevo").css("display",opcion_control.strPermisoNuevo);
			jQuery("#tdopcionNuevoToolBar").css("display",opcion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdopcionDuplicar").css("display",opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdopcionDuplicarToolBar").css("display",opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdopcionNuevoGuardarCambios").css("display",opcion_control.strPermisoNuevo);
			jQuery("#tdopcionNuevoGuardarCambiosToolBar").css("display",opcion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdopcionCopiar").css("display",opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdopcionCopiarToolBar").css("display",opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdopcionConEditar").css("display",opcion_control.strPermisoActualizar);
		}
		
		jQuery("#tdopcionGuardarCambios").css("display",opcion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdopcionGuardarCambiosToolBar").css("display",opcion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdopcionCerrarPagina").css("display",opcion_control.strPermisoPopup);		
		jQuery("#tdopcionCerrarPaginaToolBar").css("display",opcion_control.strPermisoPopup);
		//jQuery("#tropcionAccionesRelaciones").css("display",opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Opciones";
		sTituloBanner+=" - " + opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + opcion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdopcionRelacionesToolBar").css("display",opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosopcion").css("display",opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		opcion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		opcion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		opcion_webcontrol1.registrarEventosControles();
		
		if(opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(opcion_constante1.STR_ES_RELACIONADO=="false") {
			opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(opcion_constante1.STR_ES_RELACIONES=="true") {
			if(opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				opcion_webcontrol1.onLoad();
			
			//} else {
				//if(opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			opcion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);	
	}
}

var opcion_webcontrol1 = new opcion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {opcion_webcontrol,opcion_webcontrol1};

//Para ser llamado desde window.opener
window.opcion_webcontrol1 = opcion_webcontrol1;


if(opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = opcion_webcontrol1.onLoadWindow; 
}

//</script>