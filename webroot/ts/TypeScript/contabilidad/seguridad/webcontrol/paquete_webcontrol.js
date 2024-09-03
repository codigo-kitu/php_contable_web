//<script type="text/javascript" language="javascript">



//var paqueteJQueryPaginaWebInteraccion= function (paquete_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {paquete_constante,paquete_constante1} from '../util/paquete_constante.js';

import {paquete_funcion,paquete_funcion1} from '../util/paquete_funcion.js';


class paquete_webcontrol extends GeneralEntityWebControl {
	
	paquete_control=null;
	paquete_controlInicial=null;
	paquete_controlAuxiliar=null;
		
	//if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(paquete_control) {
		super();
		
		this.paquete_control=paquete_control;
	}
		
	actualizarVariablesPagina(paquete_control) {
		
		if(paquete_control.action=="index" || paquete_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(paquete_control);
			
		} 
		
		
		else if(paquete_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(paquete_control);
		
		} else if(paquete_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(paquete_control);
		
		} else if(paquete_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(paquete_control);
		
		} else if(paquete_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(paquete_control);
			
		} else if(paquete_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(paquete_control);
			
		} else if(paquete_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(paquete_control);
		
		} else if(paquete_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(paquete_control);		
		
		} else if(paquete_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(paquete_control);
		
		} else if(paquete_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(paquete_control);
		
		} else if(paquete_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(paquete_control);
		
		} else if(paquete_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(paquete_control);
		
		}  else if(paquete_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(paquete_control);
		
		} else if(paquete_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(paquete_control);
		
		} else if(paquete_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(paquete_control);
		
		} else if(paquete_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(paquete_control);
		
		} else if(paquete_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(paquete_control);
		
		} else if(paquete_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(paquete_control);
		
		} else if(paquete_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(paquete_control);
		
		} else if(paquete_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(paquete_control);		
		
		} else if(paquete_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(paquete_control);		
		
		} else if(paquete_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(paquete_control);		
		
		} else if(paquete_control.action.includes("Busqueda") ||
				  paquete_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(paquete_control);
			
		} else if(paquete_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(paquete_control)
		}
		
		
		
	
		else if(paquete_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(paquete_control);	
		
		} else if(paquete_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(paquete_control);		
		}
	
		else if(paquete_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(paquete_control);		
		}
	
		else if(paquete_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(paquete_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + paquete_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(paquete_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(paquete_control) {
		this.actualizarPaginaAccionesGenerales(paquete_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(paquete_control) {
		
		this.actualizarPaginaCargaGeneral(paquete_control);
		this.actualizarPaginaOrderBy(paquete_control);
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(paquete_control);
		this.actualizarPaginaAreaBusquedas(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(paquete_control) {
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(paquete_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(paquete_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(paquete_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(paquete_control) {
		
		this.actualizarPaginaCargaGeneral(paquete_control);
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(paquete_control);
		this.actualizarPaginaAreaBusquedas(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		//this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		//this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		//this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(paquete_control) {
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(paquete_control) {
		this.actualizarPaginaAbrirLink(paquete_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);				
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		//this.actualizarPaginaFormulario(paquete_control);
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		//this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		//this.actualizarPaginaFormulario(paquete_control);
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(paquete_control) {
		//this.actualizarPaginaFormulario(paquete_control);
		this.onLoadCombosDefectoFK(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		//this.actualizarPaginaFormulario(paquete_control);
		this.onLoadCombosDefectoFK(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		//this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(paquete_control) {
		this.actualizarPaginaAbrirLink(paquete_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(paquete_control) {
					//super.actualizarPaginaImprimir(paquete_control,"paquete");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",paquete_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("paquete_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(paquete_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(paquete_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(paquete_control) {
		//super.actualizarPaginaImprimir(paquete_control,"paquete");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("paquete_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(paquete_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",paquete_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(paquete_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(paquete_control) {
		//super.actualizarPaginaImprimir(paquete_control,"paquete");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("paquete_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(paquete_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",paquete_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(paquete_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(paquete_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(paquete_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(paquete_control);
			
		this.actualizarPaginaAbrirLink(paquete_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(paquete_control) {
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(paquete_control) {
		
		if(paquete_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(paquete_control);
		}
		
		if(paquete_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(paquete_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(paquete_control) {
		if(paquete_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("paqueteReturnGeneral",JSON.stringify(paquete_control.paqueteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(paquete_control) {
		if(paquete_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && paquete_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(paquete_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(paquete_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(paquete_control, mostrar) {
		
		if(mostrar==true) {
			paquete_funcion1.resaltarRestaurarDivsPagina(false,"paquete");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				paquete_funcion1.resaltarRestaurarDivMantenimiento(false,"paquete");
			}			
			
			paquete_funcion1.mostrarDivMensaje(true,paquete_control.strAuxiliarMensaje,paquete_control.strAuxiliarCssMensaje);
		
		} else {
			paquete_funcion1.mostrarDivMensaje(false,paquete_control.strAuxiliarMensaje,paquete_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(paquete_control) {
		if(paquete_funcion1.esPaginaForm(paquete_constante1)==true) {
			window.opener.paquete_webcontrol1.actualizarPaginaTablaDatos(paquete_control);
		} else {
			this.actualizarPaginaTablaDatos(paquete_control);
		}
	}
	
	actualizarPaginaAbrirLink(paquete_control) {
		paquete_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(paquete_control.strAuxiliarUrlPagina);
				
		paquete_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(paquete_control.strAuxiliarTipo,paquete_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(paquete_control) {
		paquete_funcion1.resaltarRestaurarDivMensaje(true,paquete_control.strAuxiliarMensajeAlert,paquete_control.strAuxiliarCssMensaje);
			
		if(paquete_funcion1.esPaginaForm(paquete_constante1)==true) {
			window.opener.paquete_funcion1.resaltarRestaurarDivMensaje(true,paquete_control.strAuxiliarMensajeAlert,paquete_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(paquete_control) {
		this.paquete_controlInicial=paquete_control;
			
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(paquete_control.strStyleDivArbol,paquete_control.strStyleDivContent
																,paquete_control.strStyleDivOpcionesBanner,paquete_control.strStyleDivExpandirColapsar
																,paquete_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=paquete_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",paquete_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(paquete_control) {
		this.actualizarCssBotonesPagina(paquete_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(paquete_control.tiposReportes,paquete_control.tiposReporte
															 	,paquete_control.tiposPaginacion,paquete_control.tiposAcciones
																,paquete_control.tiposColumnasSelect,paquete_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(paquete_control.tiposRelaciones,paquete_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(paquete_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(paquete_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(paquete_control);			
	}
	
	actualizarPaginaUsuarioInvitado(paquete_control) {
	
		var indexPosition=paquete_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=paquete_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(paquete_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 
				paquete_webcontrol1.cargarCombossistemasFK(paquete_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(paquete_control.strRecargarFkTiposNinguno!=null && paquete_control.strRecargarFkTiposNinguno!='NINGUNO' && paquete_control.strRecargarFkTiposNinguno!='') {
			
				if(paquete_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTiposNinguno,",")) { 
					paquete_webcontrol1.cargarCombossistemasFK(paquete_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(paquete_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,paquete_funcion1,paquete_control.sistemasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(paquete_control) {
		jQuery("#divBusquedapaqueteAjaxWebPart").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trpaqueteCabeceraBusquedas").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trBusquedapaquete").css("display",paquete_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(paquete_control.htmlTablaOrderBy!=null
			&& paquete_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBypaqueteAjaxWebPart").html(paquete_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//paquete_webcontrol1.registrarOrderByActions();
			
		}
			
		if(paquete_control.htmlTablaOrderByRel!=null
			&& paquete_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelpaqueteAjaxWebPart").html(paquete_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(paquete_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedapaqueteAjaxWebPart").css("display","none");
			jQuery("#trpaqueteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedapaquete").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(paquete_control) {
		
		if(!paquete_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(paquete_control);
		} else {
			jQuery("#divTablaDatospaquetesAjaxWebPart").html(paquete_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatospaquetes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(paquete_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatospaquetes=jQuery("#tblTablaDatospaquetes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("paquete",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',paquete_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			paquete_webcontrol1.registrarControlesTableEdition(paquete_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		paquete_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(paquete_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("paquete_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(paquete_control);
		
		const divTablaDatos = document.getElementById("divTablaDatospaquetesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(paquete_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(paquete_control);
		
		const divOrderBy = document.getElementById("divOrderBypaqueteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(paquete_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelpaqueteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(paquete_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(paquete_control.paqueteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(paquete_control);			
		}
	}
	
	actualizarCamposFilaTabla(paquete_control) {
		var i=0;
		
		i=paquete_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(paquete_control.paqueteActual.id);
		jQuery("#t-version_row_"+i+"").val(paquete_control.paqueteActual.versionRow);
		
		if(paquete_control.paqueteActual.id_sistema!=null && paquete_control.paqueteActual.id_sistema>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != paquete_control.paqueteActual.id_sistema) {
				jQuery("#t-cel_"+i+"_2").val(paquete_control.paqueteActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(paquete_control.paqueteActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(paquete_control.paqueteActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(paquete_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionmodulo").click(function(){
		jQuery("#tblTablaDatospaquetes").on("click",".imgrelacionmodulo", function () {

			var idActual=jQuery(this).attr("idactualpaquete");

			paquete_webcontrol1.registrarSesionParamodulos(idActual);
		});				
	}
		
	

	registrarSesionParamodulos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"paquete","modulo","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1,"s","");
	}
	
	registrarControlesTableEdition(paquete_control) {
		paquete_funcion1.registrarControlesTableValidacionEdition(paquete_control,paquete_webcontrol1,paquete_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(paquete_control) {
		jQuery("#divResumenpaqueteActualAjaxWebPart").html(paquete_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(paquete_control) {
		//jQuery("#divAccionesRelacionespaqueteAjaxWebPart").html(paquete_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("paquete_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(paquete_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionespaqueteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		paquete_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(paquete_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(paquete_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(paquete_control) {
		
		if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+paquete_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",paquete_control.strVisibleFK_Idsistema);
			jQuery("#tblstrVisible"+paquete_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",paquete_control.strVisibleFK_Idsistema);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionpaquete();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("paquete",id,"seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);		
	}
	
	

	abrirBusquedaParasistema(strNombreCampoBusqueda){//idActual
		paquete_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("paquete","sistema","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionmodulo").click(function(){

			var idActual=jQuery(this).attr("idactualpaquete");

			paquete_webcontrol1.registrarSesionParamodulos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paqueteConstante,strParametros);
		
		//paquete_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(paquete_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema",paquete_control.sistemasFK);

		if(paquete_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+paquete_control.idFilaTablaActual+"_2",paquete_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",paquete_control.sistemasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(paquete_control) {

	};

	
	
	setDefectoValorCombossistemasFK(paquete_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(paquete_control.idsistemaDefaultFK>-1 && jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val() != paquete_control.idsistemaDefaultFK) {
				jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val(paquete_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(paquete_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//paquete_control
		
	
	}
	
	onLoadCombosDefectoFK(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 
				paquete_webcontrol1.setDefectoValorCombossistemasFK(paquete_control);
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
	onLoadCombosEventosFK(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				paquete_webcontrol1.registrarComboActionChangeCombossistemasFK(paquete_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(paquete_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("paquete","FK_Idsistema","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
		
			
			if(paquete_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("paquete");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("paquete");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(paquete_funcion1,paquete_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(paquete_funcion1,paquete_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(paquete_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,"paquete");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				paquete_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("paquete");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(paquete_control) {
		
		jQuery("#divBusquedapaqueteAjaxWebPart").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trpaqueteCabeceraBusquedas").css("display",paquete_control.strPermisoBusqueda);
		jQuery("#trBusquedapaquete").css("display",paquete_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportepaquete").css("display",paquete_control.strPermisoReporte);			
		jQuery("#tdMostrarTodospaquete").attr("style",paquete_control.strPermisoMostrarTodos);		
		
		if(paquete_control.strPermisoNuevo!=null) {
			jQuery("#tdpaqueteNuevo").css("display",paquete_control.strPermisoNuevo);
			jQuery("#tdpaqueteNuevoToolBar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdpaqueteDuplicar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaqueteDuplicarToolBar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaqueteNuevoGuardarCambios").css("display",paquete_control.strPermisoNuevo);
			jQuery("#tdpaqueteNuevoGuardarCambiosToolBar").css("display",paquete_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(paquete_control.strPermisoActualizar!=null) {
			jQuery("#tdpaqueteCopiar").css("display",paquete_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaqueteCopiarToolBar").css("display",paquete_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaqueteConEditar").css("display",paquete_control.strPermisoActualizar);
		}
		
		jQuery("#tdpaqueteGuardarCambios").css("display",paquete_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdpaqueteGuardarCambiosToolBar").css("display",paquete_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdpaqueteCerrarPagina").css("display",paquete_control.strPermisoPopup);		
		jQuery("#tdpaqueteCerrarPaginaToolBar").css("display",paquete_control.strPermisoPopup);
		//jQuery("#trpaqueteAccionesRelaciones").css("display",paquete_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=paquete_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + paquete_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + paquete_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Paquetes";
		sTituloBanner+=" - " + paquete_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + paquete_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpaqueteRelacionesToolBar").css("display",paquete_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospaquete").css("display",paquete_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		paquete_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		paquete_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		paquete_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		paquete_webcontrol1.registrarEventosControles();
		
		if(paquete_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			paquete_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(paquete_constante1.STR_ES_RELACIONES=="true") {
			if(paquete_constante1.BIT_ES_PAGINA_FORM==true) {
				paquete_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(paquete_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(paquete_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				paquete_webcontrol1.onLoad();
			
			//} else {
				//if(paquete_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			paquete_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);	
	}
}

var paquete_webcontrol1 = new paquete_webcontrol();

//Para ser llamado desde otro archivo (import)
export {paquete_webcontrol,paquete_webcontrol1};

//Para ser llamado desde window.opener
window.paquete_webcontrol1 = paquete_webcontrol1;


if(paquete_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = paquete_webcontrol1.onLoadWindow; 
}

//</script>