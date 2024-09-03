//<script type="text/javascript" language="javascript">



//var perfil_campoJQueryPaginaWebInteraccion= function (perfil_campo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_campo_constante,perfil_campo_constante1} from '../util/perfil_campo_constante.js';

import {perfil_campo_funcion,perfil_campo_funcion1} from '../util/perfil_campo_funcion.js';


class perfil_campo_webcontrol extends GeneralEntityWebControl {
	
	perfil_campo_control=null;
	perfil_campo_controlInicial=null;
	perfil_campo_controlAuxiliar=null;
		
	//if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_campo_control) {
		super();
		
		this.perfil_campo_control=perfil_campo_control;
	}
		
	actualizarVariablesPagina(perfil_campo_control) {
		
		if(perfil_campo_control.action=="index" || perfil_campo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_campo_control);
			
		} 
		
		
		else if(perfil_campo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_campo_control);
			
		} else if(perfil_campo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_campo_control);
			
		} else if(perfil_campo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_campo_control);		
		
		} else if(perfil_campo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_campo_control);
		
		}  else if(perfil_campo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_campo_control);		
		
		} else if(perfil_campo_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_campo_control);		
		
		} else if(perfil_campo_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_campo_control);		
		
		} else if(perfil_campo_control.action.includes("Busqueda") ||
				  perfil_campo_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(perfil_campo_control);
			
		} else if(perfil_campo_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_campo_control)
		}
		
		
		
	
		else if(perfil_campo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_campo_control);	
		
		} else if(perfil_campo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_campo_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_campo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_campo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_campo_control) {
		this.actualizarPaginaAccionesGenerales(perfil_campo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_campo_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_campo_control);
		this.actualizarPaginaOrderBy(perfil_campo_control);
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control);
		this.actualizarPaginaAreaBusquedas(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_campo_control) {
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_campo_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_campo_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_campo_control);
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control);
		this.actualizarPaginaAreaBusquedas(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_campo_control) {
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_campo_control) {
		this.actualizarPaginaAbrirLink(perfil_campo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);				
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		//this.actualizarPaginaFormulario(perfil_campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		//this.actualizarPaginaFormulario(perfil_campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_campo_control) {
		//this.actualizarPaginaFormulario(perfil_campo_control);
		this.onLoadCombosDefectoFK(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		//this.actualizarPaginaFormulario(perfil_campo_control);
		this.onLoadCombosDefectoFK(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_campo_control) {
		this.actualizarPaginaAbrirLink(perfil_campo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_campo_control) {
		this.actualizarPaginaTablaDatos(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_campo_control) {
					//super.actualizarPaginaImprimir(perfil_campo_control,"perfil_campo");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_campo_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("perfil_campo_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_campo_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_campo_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_campo_control) {
		//super.actualizarPaginaImprimir(perfil_campo_control,"perfil_campo");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("perfil_campo_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(perfil_campo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_campo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_campo_control) {
		//super.actualizarPaginaImprimir(perfil_campo_control,"perfil_campo");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("perfil_campo_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_campo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_campo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_campo_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_campo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_campo_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(perfil_campo_control);
			
		this.actualizarPaginaAbrirLink(perfil_campo_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_campo_control) {
		
		if(perfil_campo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_campo_control);
		}
		
		if(perfil_campo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_campo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_campo_control) {
		if(perfil_campo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_campoReturnGeneral",JSON.stringify(perfil_campo_control.perfil_campoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control) {
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_campo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_campo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_campo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_campo_control, mostrar) {
		
		if(mostrar==true) {
			perfil_campo_funcion1.resaltarRestaurarDivsPagina(false,"perfil_campo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_campo_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_campo");
			}			
			
			perfil_campo_funcion1.mostrarDivMensaje(true,perfil_campo_control.strAuxiliarMensaje,perfil_campo_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_campo_funcion1.mostrarDivMensaje(false,perfil_campo_control.strAuxiliarMensaje,perfil_campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_campo_control) {
		if(perfil_campo_funcion1.esPaginaForm(perfil_campo_constante1)==true) {
			window.opener.perfil_campo_webcontrol1.actualizarPaginaTablaDatos(perfil_campo_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_campo_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_campo_control) {
		perfil_campo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_campo_control.strAuxiliarUrlPagina);
				
		perfil_campo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_campo_control.strAuxiliarTipo,perfil_campo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_campo_control) {
		perfil_campo_funcion1.resaltarRestaurarDivMensaje(true,perfil_campo_control.strAuxiliarMensajeAlert,perfil_campo_control.strAuxiliarCssMensaje);
			
		if(perfil_campo_funcion1.esPaginaForm(perfil_campo_constante1)==true) {
			window.opener.perfil_campo_funcion1.resaltarRestaurarDivMensaje(true,perfil_campo_control.strAuxiliarMensajeAlert,perfil_campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_campo_control) {
		this.perfil_campo_controlInicial=perfil_campo_control;
			
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_campo_control.strStyleDivArbol,perfil_campo_control.strStyleDivContent
																,perfil_campo_control.strStyleDivOpcionesBanner,perfil_campo_control.strStyleDivExpandirColapsar
																,perfil_campo_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_campo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_campo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_campo_control) {
		this.actualizarCssBotonesPagina(perfil_campo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_campo_control.tiposReportes,perfil_campo_control.tiposReporte
															 	,perfil_campo_control.tiposPaginacion,perfil_campo_control.tiposAcciones
																,perfil_campo_control.tiposColumnasSelect,perfil_campo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_campo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_campo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_campo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_campo_control) {
	
		var indexPosition=perfil_campo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_campo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_campo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.cargarCombosperfilsFK(perfil_campo_control);
			}

			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.cargarComboscamposFK(perfil_campo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_campo_control.strRecargarFkTiposNinguno!=null && perfil_campo_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_campo_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTiposNinguno,",")) { 
					perfil_campo_webcontrol1.cargarCombosperfilsFK(perfil_campo_control);
				}

				if(perfil_campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTiposNinguno,",")) { 
					perfil_campo_webcontrol1.cargarComboscamposFK(perfil_campo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_campo_funcion1,perfil_campo_control.perfilsFK);
	}

	cargarComboEditarTablacampoFK(perfil_campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_campo_funcion1,perfil_campo_control.camposFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(perfil_campo_control) {
		jQuery("#divBusquedaperfil_campoAjaxWebPart").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trperfil_campoCabeceraBusquedas").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_campo").css("display",perfil_campo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_campo_control.htmlTablaOrderBy!=null
			&& perfil_campo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfil_campoAjaxWebPart").html(perfil_campo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_campo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_campo_control.htmlTablaOrderByRel!=null
			&& perfil_campo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfil_campoAjaxWebPart").html(perfil_campo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfil_campoAjaxWebPart").css("display","none");
			jQuery("#trperfil_campoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil_campo").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(perfil_campo_control) {
		
		if(!perfil_campo_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(perfil_campo_control);
		} else {
			jQuery("#divTablaDatosperfil_camposAjaxWebPart").html(perfil_campo_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfil_campos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfil_campos=jQuery("#tblTablaDatosperfil_campos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil_campo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_campo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_campo_webcontrol1.registrarControlesTableEdition(perfil_campo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_campo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(perfil_campo_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("perfil_campo_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_campo_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosperfil_camposAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(perfil_campo_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(perfil_campo_control);
		
		const divOrderBy = document.getElementById("divOrderByperfil_campoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(perfil_campo_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelperfil_campoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(perfil_campo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_campo_control.perfil_campoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_campo_control);			
		}
	}
	
	actualizarCamposFilaTabla(perfil_campo_control) {
		var i=0;
		
		i=perfil_campo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_campo_control.perfil_campoActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_campo_control.perfil_campoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(perfil_campo_control.perfil_campoActual.versionRow);
		
		if(perfil_campo_control.perfil_campoActual.id_perfil!=null && perfil_campo_control.perfil_campoActual.id_perfil>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_campo_control.perfil_campoActual.id_perfil) {
				jQuery("#t-cel_"+i+"_3").val(perfil_campo_control.perfil_campoActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_campo_control.perfil_campoActual.id_campo!=null && perfil_campo_control.perfil_campoActual.id_campo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != perfil_campo_control.perfil_campoActual.id_campo) {
				jQuery("#t-cel_"+i+"_4").val(perfil_campo_control.perfil_campoActual.id_campo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").prop('checked',perfil_campo_control.perfil_campoActual.todo);
		jQuery("#t-cel_"+i+"_6").prop('checked',perfil_campo_control.perfil_campoActual.ingreso);
		jQuery("#t-cel_"+i+"_7").prop('checked',perfil_campo_control.perfil_campoActual.modificacion);
		jQuery("#t-cel_"+i+"_8").prop('checked',perfil_campo_control.perfil_campoActual.eliminacion);
		jQuery("#t-cel_"+i+"_9").prop('checked',perfil_campo_control.perfil_campoActual.consulta);
		jQuery("#t-cel_"+i+"_10").prop('checked',perfil_campo_control.perfil_campoActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_campo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(perfil_campo_control) {
		perfil_campo_funcion1.registrarControlesTableValidacionEdition(perfil_campo_control,perfil_campo_webcontrol1,perfil_campo_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_campo_control) {
		jQuery("#divResumenperfil_campoActualAjaxWebPart").html(perfil_campo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_campo_control) {
		//jQuery("#divAccionesRelacionesperfil_campoAjaxWebPart").html(perfil_campo_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("perfil_campo_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_campo_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesperfil_campoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		perfil_campo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_campo_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_campo_control) {
		
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo").attr("style",perfil_campo_control.strVisibleFK_Idcampo);
			jQuery("#tblstrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo").attr("style",perfil_campo_control.strVisibleFK_Idcampo);
		}

		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_campo_control.strVisibleFK_Idperfil);
			jQuery("#tblstrVisible"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_campo_control.strVisibleFK_Idperfil);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil_campo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil_campo",id,"seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);		
	}
	
	

	abrirBusquedaParaperfil(strNombreCampoBusqueda){//idActual
		perfil_campo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_campo","perfil","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}

	abrirBusquedaParacampo(strNombreCampoBusqueda){//idActual
		perfil_campo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_campo","campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	

	setCombosCodigoDesdeBusquedaid_perfil(id_perfil) {
		if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != id_perfil) {
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(id_perfil).trigger("change");

		}
		if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != id_perfil) {
			jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(id_perfil).trigger("change");
		}

	}
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campoConstante,strParametros);
		
		//perfil_campo_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil",perfil_campo_control.perfilsFK);

		if(perfil_campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_campo_control.idFilaTablaActual+"_3",perfil_campo_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_campo_control.perfilsFK);

	};

	cargarComboscamposFK(perfil_campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo",perfil_campo_control.camposFK);

		if(perfil_campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_campo_control.idFilaTablaActual+"_4",perfil_campo_control.camposFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo",perfil_campo_control.camposFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_campo_control) {

	};

	registrarComboActionChangeComboscamposFK(perfil_campo_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_campo_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_campo_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(perfil_campo_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_campo_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscamposFK(perfil_campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_campo_control.idcampoDefaultFK>-1 && jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val() != perfil_campo_control.idcampoDefaultFK) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val(perfil_campo_control.idcampoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val(perfil_campo_control.idcampoDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_campo_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.setDefectoValorCombosperfilsFK(perfil_campo_control);
			}

			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.setDefectoValorComboscamposFK(perfil_campo_control);
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
	onLoadCombosEventosFK(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_campo_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_campo_control);
			//}

			//if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_campo_webcontrol1.registrarComboActionChangeComboscamposFK(perfil_campo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_campo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_campo","FK_Idcampo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_campo","FK_Idperfil","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
		
			
			if(perfil_campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_campo");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_campo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_campo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,"perfil_campo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_campo_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("campo","id_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo_img_busqueda").click(function(){
				perfil_campo_webcontrol1.abrirBusquedaParacampo("id_campo");
				//alert(jQuery('#form-id_campo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_campo_control) {
		
		jQuery("#divBusquedaperfil_campoAjaxWebPart").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trperfil_campoCabeceraBusquedas").css("display",perfil_campo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_campo").css("display",perfil_campo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil_campo").css("display",perfil_campo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil_campo").attr("style",perfil_campo_control.strPermisoMostrarTodos);		
		
		if(perfil_campo_control.strPermisoNuevo!=null) {
			jQuery("#tdperfil_campoNuevo").css("display",perfil_campo_control.strPermisoNuevo);
			jQuery("#tdperfil_campoNuevoToolBar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfil_campoDuplicar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_campoDuplicarToolBar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_campoNuevoGuardarCambios").css("display",perfil_campo_control.strPermisoNuevo);
			jQuery("#tdperfil_campoNuevoGuardarCambiosToolBar").css("display",perfil_campo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_campo_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_campoCopiar").css("display",perfil_campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_campoCopiarToolBar").css("display",perfil_campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_campoConEditar").css("display",perfil_campo_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfil_campoGuardarCambios").css("display",perfil_campo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfil_campoGuardarCambiosToolBar").css("display",perfil_campo_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdperfil_campoCerrarPagina").css("display",perfil_campo_control.strPermisoPopup);		
		jQuery("#tdperfil_campoCerrarPaginaToolBar").css("display",perfil_campo_control.strPermisoPopup);
		//jQuery("#trperfil_campoAccionesRelaciones").css("display",perfil_campo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfil Campos";
		sTituloBanner+=" - " + perfil_campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_campo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_campoRelacionesToolBar").css("display",perfil_campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_campo").css("display",perfil_campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_campo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_campo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_campo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_campo_webcontrol1.registrarEventosControles();
		
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			perfil_campo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_campo_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_campo_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_campo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_campo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_campo_webcontrol1.onLoad();
			
			//} else {
				//if(perfil_campo_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			perfil_campo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);	
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

var perfil_campo_webcontrol1 = new perfil_campo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_campo_webcontrol,perfil_campo_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_campo_webcontrol1 = perfil_campo_webcontrol1;


if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_campo_webcontrol1.onLoadWindow; 
}

//</script>