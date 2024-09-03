//<script type="text/javascript" language="javascript">



//var auditoriaJQueryPaginaWebInteraccion= function (auditoria_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {auditoria_constante,auditoria_constante1} from '../util/auditoria_constante.js';

import {auditoria_funcion,auditoria_funcion1} from '../util/auditoria_funcion.js';


class auditoria_webcontrol extends GeneralEntityWebControl {
	
	auditoria_control=null;
	auditoria_controlInicial=null;
	auditoria_controlAuxiliar=null;
		
	//if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(auditoria_control) {
		super();
		
		this.auditoria_control=auditoria_control;
	}
		
	actualizarVariablesPagina(auditoria_control) {
		
		if(auditoria_control.action=="index" || auditoria_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(auditoria_control);
			
		} 
		
		
		else if(auditoria_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(auditoria_control);
		
		} else if(auditoria_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(auditoria_control);
		
		} else if(auditoria_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(auditoria_control);
		
		} else if(auditoria_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(auditoria_control);
			
		} else if(auditoria_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(auditoria_control);
			
		} else if(auditoria_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(auditoria_control);
		
		} else if(auditoria_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(auditoria_control);		
		
		} else if(auditoria_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(auditoria_control);
		
		} else if(auditoria_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(auditoria_control);
		
		} else if(auditoria_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(auditoria_control);
		
		} else if(auditoria_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(auditoria_control);
		
		}  else if(auditoria_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(auditoria_control);
		
		} else if(auditoria_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(auditoria_control);
		
		} else if(auditoria_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(auditoria_control);
		
		} else if(auditoria_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(auditoria_control);
		
		} else if(auditoria_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(auditoria_control);
		
		} else if(auditoria_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(auditoria_control);
		
		} else if(auditoria_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(auditoria_control);		
		
		} else if(auditoria_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(auditoria_control);		
		
		} else if(auditoria_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(auditoria_control);		
		
		} else if(auditoria_control.action.includes("Busqueda") ||
				  auditoria_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(auditoria_control);
			
		} else if(auditoria_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(auditoria_control)
		}
		
		
		
	
		else if(auditoria_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(auditoria_control);	
		
		} else if(auditoria_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_control);		
		}
	
		else if(auditoria_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(auditoria_control);		
		}
	
		else if(auditoria_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(auditoria_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + auditoria_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(auditoria_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(auditoria_control) {
		this.actualizarPaginaAccionesGenerales(auditoria_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(auditoria_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_control);
		this.actualizarPaginaOrderBy(auditoria_control);
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_control);
		this.actualizarPaginaAreaBusquedas(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(auditoria_control) {
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(auditoria_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(auditoria_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(auditoria_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_control);
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_control);
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_control);
		this.actualizarPaginaAreaBusquedas(auditoria_control);
		this.actualizarPaginaCargaCombosFK(auditoria_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(auditoria_control) {
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(auditoria_control) {
		this.actualizarPaginaAbrirLink(auditoria_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);				
		//this.actualizarPaginaFormulario(auditoria_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		//this.actualizarPaginaFormulario(auditoria_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		//this.actualizarPaginaFormulario(auditoria_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(auditoria_control) {
		//this.actualizarPaginaFormulario(auditoria_control);
		this.onLoadCombosDefectoFK(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		//this.actualizarPaginaFormulario(auditoria_control);
		this.onLoadCombosDefectoFK(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(auditoria_control) {
		this.actualizarPaginaAbrirLink(auditoria_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(auditoria_control) {
					//super.actualizarPaginaImprimir(auditoria_control,"auditoria");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",auditoria_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("auditoria_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(auditoria_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(auditoria_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(auditoria_control) {
		//super.actualizarPaginaImprimir(auditoria_control,"auditoria");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("auditoria_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(auditoria_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",auditoria_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(auditoria_control) {
		//super.actualizarPaginaImprimir(auditoria_control,"auditoria");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("auditoria_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(auditoria_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",auditoria_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(auditoria_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(auditoria_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(auditoria_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(auditoria_control);
			
		this.actualizarPaginaAbrirLink(auditoria_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(auditoria_control) {
		this.actualizarPaginaTablaDatos(auditoria_control);
		this.actualizarPaginaFormulario(auditoria_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(auditoria_control) {
		
		if(auditoria_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(auditoria_control);
		}
		
		if(auditoria_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(auditoria_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(auditoria_control) {
		if(auditoria_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("auditoriaReturnGeneral",JSON.stringify(auditoria_control.auditoriaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(auditoria_control) {
		if(auditoria_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && auditoria_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(auditoria_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(auditoria_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(auditoria_control, mostrar) {
		
		if(mostrar==true) {
			auditoria_funcion1.resaltarRestaurarDivsPagina(false,"auditoria");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				auditoria_funcion1.resaltarRestaurarDivMantenimiento(false,"auditoria");
			}			
			
			auditoria_funcion1.mostrarDivMensaje(true,auditoria_control.strAuxiliarMensaje,auditoria_control.strAuxiliarCssMensaje);
		
		} else {
			auditoria_funcion1.mostrarDivMensaje(false,auditoria_control.strAuxiliarMensaje,auditoria_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(auditoria_control) {
		if(auditoria_funcion1.esPaginaForm(auditoria_constante1)==true) {
			window.opener.auditoria_webcontrol1.actualizarPaginaTablaDatos(auditoria_control);
		} else {
			this.actualizarPaginaTablaDatos(auditoria_control);
		}
	}
	
	actualizarPaginaAbrirLink(auditoria_control) {
		auditoria_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(auditoria_control.strAuxiliarUrlPagina);
				
		auditoria_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(auditoria_control.strAuxiliarTipo,auditoria_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(auditoria_control) {
		auditoria_funcion1.resaltarRestaurarDivMensaje(true,auditoria_control.strAuxiliarMensajeAlert,auditoria_control.strAuxiliarCssMensaje);
			
		if(auditoria_funcion1.esPaginaForm(auditoria_constante1)==true) {
			window.opener.auditoria_funcion1.resaltarRestaurarDivMensaje(true,auditoria_control.strAuxiliarMensajeAlert,auditoria_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(auditoria_control) {
		this.auditoria_controlInicial=auditoria_control;
			
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(auditoria_control.strStyleDivArbol,auditoria_control.strStyleDivContent
																,auditoria_control.strStyleDivOpcionesBanner,auditoria_control.strStyleDivExpandirColapsar
																,auditoria_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=auditoria_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",auditoria_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(auditoria_control) {
		this.actualizarCssBotonesPagina(auditoria_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(auditoria_control.tiposReportes,auditoria_control.tiposReporte
															 	,auditoria_control.tiposPaginacion,auditoria_control.tiposAcciones
																,auditoria_control.tiposColumnasSelect,auditoria_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(auditoria_control.tiposRelaciones,auditoria_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(auditoria_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(auditoria_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(auditoria_control);			
	}
	
	actualizarPaginaUsuarioInvitado(auditoria_control) {
	
		var indexPosition=auditoria_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=auditoria_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(auditoria_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 
				auditoria_webcontrol1.cargarCombosusuariosFK(auditoria_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(auditoria_control.strRecargarFkTiposNinguno!=null && auditoria_control.strRecargarFkTiposNinguno!='NINGUNO' && auditoria_control.strRecargarFkTiposNinguno!='') {
			
				if(auditoria_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTiposNinguno,",")) { 
					auditoria_webcontrol1.cargarCombosusuariosFK(auditoria_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(auditoria_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,auditoria_funcion1,auditoria_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(auditoria_control) {
		jQuery("#divBusquedaauditoriaAjaxWebPart").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trauditoriaCabeceraBusquedas").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trBusquedaauditoria").css("display",auditoria_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(auditoria_control.htmlTablaOrderBy!=null
			&& auditoria_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByauditoriaAjaxWebPart").html(auditoria_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//auditoria_webcontrol1.registrarOrderByActions();
			
		}
			
		if(auditoria_control.htmlTablaOrderByRel!=null
			&& auditoria_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelauditoriaAjaxWebPart").html(auditoria_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(auditoria_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaauditoriaAjaxWebPart").css("display","none");
			jQuery("#trauditoriaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaauditoria").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(auditoria_control) {
		
		if(!auditoria_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(auditoria_control);
		} else {
			jQuery("#divTablaDatosauditoriasAjaxWebPart").html(auditoria_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosauditorias=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosauditorias=jQuery("#tblTablaDatosauditorias").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("auditoria",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',auditoria_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			auditoria_webcontrol1.registrarControlesTableEdition(auditoria_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		auditoria_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(auditoria_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("auditoria_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(auditoria_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosauditoriasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(auditoria_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(auditoria_control);
		
		const divOrderBy = document.getElementById("divOrderByauditoriaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(auditoria_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelauditoriaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(auditoria_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(auditoria_control.auditoriaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(auditoria_control);			
		}
	}
	
	actualizarCamposFilaTabla(auditoria_control) {
		var i=0;
		
		i=auditoria_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(auditoria_control.auditoriaActual.id);
		jQuery("#t-version_row_"+i+"").val(auditoria_control.auditoriaActual.versionRow);
		
		if(auditoria_control.auditoriaActual.id_usuario!=null && auditoria_control.auditoriaActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != auditoria_control.auditoriaActual.id_usuario) {
				jQuery("#t-cel_"+i+"_2").val(auditoria_control.auditoriaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(auditoria_control.auditoriaActual.nombre_tabla);
		jQuery("#t-cel_"+i+"_4").val(auditoria_control.auditoriaActual.id_fila);
		jQuery("#t-cel_"+i+"_5").val(auditoria_control.auditoriaActual.accion);
		jQuery("#t-cel_"+i+"_6").val(auditoria_control.auditoriaActual.proceso);
		jQuery("#t-cel_"+i+"_7").val(auditoria_control.auditoriaActual.nombre_pc);
		jQuery("#t-cel_"+i+"_8").val(auditoria_control.auditoriaActual.ip_pc);
		jQuery("#t-cel_"+i+"_9").val(auditoria_control.auditoriaActual.usuario_pc);
		jQuery("#t-cel_"+i+"_10").val(auditoria_control.auditoriaActual.fecha_hora);
		jQuery("#t-cel_"+i+"_11").val(auditoria_control.auditoriaActual.observacion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(auditoria_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionauditoria_detalle").click(function(){
		jQuery("#tblTablaDatosauditorias").on("click",".imgrelacionauditoria_detalle", function () {

			var idActual=jQuery(this).attr("idactualauditoria");

			auditoria_webcontrol1.registrarSesionParaauditoria_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaauditoria_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"auditoria","auditoria_detalle","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1,"s","");
	}
	
	registrarControlesTableEdition(auditoria_control) {
		auditoria_funcion1.registrarControlesTableValidacionEdition(auditoria_control,auditoria_webcontrol1,auditoria_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(auditoria_control) {
		jQuery("#divResumenauditoriaActualAjaxWebPart").html(auditoria_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(auditoria_control) {
		//jQuery("#divAccionesRelacionesauditoriaAjaxWebPart").html(auditoria_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("auditoria_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(auditoria_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesauditoriaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		auditoria_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(auditoria_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(auditoria_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(auditoria_control) {
		
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIPPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIPPCPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorIPPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorIPPCPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombrePCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombrePCPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombrePCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombrePCPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombreTablaPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombreTablaPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorNombreTablaPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorNombreTablaPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorObservacionesPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorObservacionesPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorObservacionesPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorObservacionesPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorProcesoPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorProcesoPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorProcesoPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorProcesoPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorUsuarioPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorUsuarioPCPorFechaHora);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"BusquedaPorUsuarioPCPorFechaHora").attr("style",auditoria_control.strVisibleBusquedaPorUsuarioPCPorFechaHora);
		}

		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",auditoria_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+auditoria_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",auditoria_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionauditoria();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("auditoria",id,"seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		auditoria_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("auditoria","usuario","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionauditoria_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualauditoria");

			auditoria_webcontrol1.registrarSesionParaauditoria_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoriaConstante,strParametros);
		
		//auditoria_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(auditoria_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario",auditoria_control.usuariosFK);

		if(auditoria_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+auditoria_control.idFilaTablaActual+"_2",auditoria_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(auditoria_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(auditoria_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(auditoria_control.idusuarioDefaultFK>-1 && jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val() != auditoria_control.idusuarioDefaultFK) {
				jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario").val(auditoria_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//auditoria_control
		
	
	}
	
	onLoadCombosDefectoFK(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 
				auditoria_webcontrol1.setDefectoValorCombosusuariosFK(auditoria_control);
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
	onLoadCombosEventosFK(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(auditoria_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",auditoria_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				auditoria_webcontrol1.registrarComboActionChangeCombosusuariosFK(auditoria_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(auditoria_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(auditoria_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorIdUsuarioPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorIPPCPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorNombrePCPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorNombreTablaPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorObservacionesPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorProcesoPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","BusquedaPorUsuarioPCPorFechaHora","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria","FK_Idusuario","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
		
			
			if(auditoria_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("auditoria");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("auditoria");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(auditoria_funcion1,auditoria_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(auditoria_funcion1,auditoria_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(auditoria_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,"auditoria");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+auditoria_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				auditoria_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("auditoria");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(auditoria_control) {
		
		jQuery("#divBusquedaauditoriaAjaxWebPart").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trauditoriaCabeceraBusquedas").css("display",auditoria_control.strPermisoBusqueda);
		jQuery("#trBusquedaauditoria").css("display",auditoria_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteauditoria").css("display",auditoria_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosauditoria").attr("style",auditoria_control.strPermisoMostrarTodos);		
		
		if(auditoria_control.strPermisoNuevo!=null) {
			jQuery("#tdauditoriaNuevo").css("display",auditoria_control.strPermisoNuevo);
			jQuery("#tdauditoriaNuevoToolBar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdauditoriaDuplicar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdauditoriaDuplicarToolBar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdauditoriaNuevoGuardarCambios").css("display",auditoria_control.strPermisoNuevo);
			jQuery("#tdauditoriaNuevoGuardarCambiosToolBar").css("display",auditoria_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(auditoria_control.strPermisoActualizar!=null) {
			jQuery("#tdauditoriaCopiar").css("display",auditoria_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdauditoriaCopiarToolBar").css("display",auditoria_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdauditoriaConEditar").css("display",auditoria_control.strPermisoActualizar);
		}
		
		jQuery("#tdauditoriaGuardarCambios").css("display",auditoria_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdauditoriaGuardarCambiosToolBar").css("display",auditoria_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdauditoriaCerrarPagina").css("display",auditoria_control.strPermisoPopup);		
		jQuery("#tdauditoriaCerrarPaginaToolBar").css("display",auditoria_control.strPermisoPopup);
		//jQuery("#trauditoriaAccionesRelaciones").css("display",auditoria_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=auditoria_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + auditoria_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Auditorias";
		sTituloBanner+=" - " + auditoria_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdauditoriaRelacionesToolBar").css("display",auditoria_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosauditoria").css("display",auditoria_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		auditoria_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		auditoria_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		auditoria_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		auditoria_webcontrol1.registrarEventosControles();
		
		if(auditoria_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
			auditoria_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(auditoria_constante1.STR_ES_RELACIONES=="true") {
			if(auditoria_constante1.BIT_ES_PAGINA_FORM==true) {
				auditoria_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(auditoria_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(auditoria_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				auditoria_webcontrol1.onLoad();
			
			//} else {
				//if(auditoria_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			auditoria_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("auditoria","seguridad","",auditoria_funcion1,auditoria_webcontrol1,auditoria_constante1);	
	}
}

var auditoria_webcontrol1 = new auditoria_webcontrol();

//Para ser llamado desde otro archivo (import)
export {auditoria_webcontrol,auditoria_webcontrol1};

//Para ser llamado desde window.opener
window.auditoria_webcontrol1 = auditoria_webcontrol1;


if(auditoria_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = auditoria_webcontrol1.onLoadWindow; 
}

//</script>