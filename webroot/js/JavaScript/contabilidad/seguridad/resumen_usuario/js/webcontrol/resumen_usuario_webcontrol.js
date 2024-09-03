//<script type="text/javascript" language="javascript">



//var resumen_usuarioJQueryPaginaWebInteraccion= function (resumen_usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {resumen_usuario_constante,resumen_usuario_constante1} from '../util/resumen_usuario_constante.js';

import {resumen_usuario_funcion,resumen_usuario_funcion1} from '../util/resumen_usuario_funcion.js';


class resumen_usuario_webcontrol extends GeneralEntityWebControl {
	
	resumen_usuario_control=null;
	resumen_usuario_controlInicial=null;
	resumen_usuario_controlAuxiliar=null;
		
	//if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(resumen_usuario_control) {
		super();
		
		this.resumen_usuario_control=resumen_usuario_control;
	}
		
	actualizarVariablesPagina(resumen_usuario_control) {
		
		if(resumen_usuario_control.action=="index" || resumen_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(resumen_usuario_control);
			
		} 
		
		
		else if(resumen_usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(resumen_usuario_control);
			
		} else if(resumen_usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(resumen_usuario_control);
			
		} else if(resumen_usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(resumen_usuario_control);
		
		}  else if(resumen_usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(resumen_usuario_control);
		
		} else if(resumen_usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(resumen_usuario_control);		
		
		} else if(resumen_usuario_control.action.includes("Busqueda") ||
				  resumen_usuario_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(resumen_usuario_control);
			
		} else if(resumen_usuario_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(resumen_usuario_control)
		}
		
		
		
	
		else if(resumen_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(resumen_usuario_control);	
		
		} else if(resumen_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(resumen_usuario_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + resumen_usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(resumen_usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(resumen_usuario_control) {
		this.actualizarPaginaAccionesGenerales(resumen_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(resumen_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(resumen_usuario_control);
		this.actualizarPaginaOrderBy(resumen_usuario_control);
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control);
		this.actualizarPaginaAreaBusquedas(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(resumen_usuario_control) {
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(resumen_usuario_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(resumen_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(resumen_usuario_control);
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		this.actualizarPaginaCargaGeneralControles(resumen_usuario_control);
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control);
		this.actualizarPaginaAreaBusquedas(resumen_usuario_control);
		this.actualizarPaginaCargaCombosFK(resumen_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(resumen_usuario_control) {
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaAbrirLink(resumen_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);				
		//this.actualizarPaginaFormulario(resumen_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		//this.actualizarPaginaFormulario(resumen_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		//this.actualizarPaginaFormulario(resumen_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(resumen_usuario_control) {
		//this.actualizarPaginaFormulario(resumen_usuario_control);
		this.onLoadCombosDefectoFK(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);
		//this.actualizarPaginaFormulario(resumen_usuario_control);
		this.onLoadCombosDefectoFK(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(resumen_usuario_control) {
		this.actualizarPaginaAbrirLink(resumen_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(resumen_usuario_control) {
		this.actualizarPaginaTablaDatos(resumen_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(resumen_usuario_control) {
					//super.actualizarPaginaImprimir(resumen_usuario_control,"resumen_usuario");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",resumen_usuario_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("resumen_usuario_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(resumen_usuario_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(resumen_usuario_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(resumen_usuario_control) {
		//super.actualizarPaginaImprimir(resumen_usuario_control,"resumen_usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("resumen_usuario_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(resumen_usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",resumen_usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(resumen_usuario_control) {
		//super.actualizarPaginaImprimir(resumen_usuario_control,"resumen_usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("resumen_usuario_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(resumen_usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",resumen_usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(resumen_usuario_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(resumen_usuario_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(resumen_usuario_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(resumen_usuario_control);
			
		this.actualizarPaginaAbrirLink(resumen_usuario_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(resumen_usuario_control) {
		
		if(resumen_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(resumen_usuario_control);
		}
		
		if(resumen_usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(resumen_usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(resumen_usuario_control) {
		if(resumen_usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("resumen_usuarioReturnGeneral",JSON.stringify(resumen_usuario_control.resumen_usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(resumen_usuario_control) {
		if(resumen_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && resumen_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(resumen_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(resumen_usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(resumen_usuario_control, mostrar) {
		
		if(mostrar==true) {
			resumen_usuario_funcion1.resaltarRestaurarDivsPagina(false,"resumen_usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				resumen_usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"resumen_usuario");
			}			
			
			resumen_usuario_funcion1.mostrarDivMensaje(true,resumen_usuario_control.strAuxiliarMensaje,resumen_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			resumen_usuario_funcion1.mostrarDivMensaje(false,resumen_usuario_control.strAuxiliarMensaje,resumen_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(resumen_usuario_control) {
		if(resumen_usuario_funcion1.esPaginaForm(resumen_usuario_constante1)==true) {
			window.opener.resumen_usuario_webcontrol1.actualizarPaginaTablaDatos(resumen_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(resumen_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(resumen_usuario_control) {
		resumen_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(resumen_usuario_control.strAuxiliarUrlPagina);
				
		resumen_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(resumen_usuario_control.strAuxiliarTipo,resumen_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(resumen_usuario_control) {
		resumen_usuario_funcion1.resaltarRestaurarDivMensaje(true,resumen_usuario_control.strAuxiliarMensajeAlert,resumen_usuario_control.strAuxiliarCssMensaje);
			
		if(resumen_usuario_funcion1.esPaginaForm(resumen_usuario_constante1)==true) {
			window.opener.resumen_usuario_funcion1.resaltarRestaurarDivMensaje(true,resumen_usuario_control.strAuxiliarMensajeAlert,resumen_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(resumen_usuario_control) {
		this.resumen_usuario_controlInicial=resumen_usuario_control;
			
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(resumen_usuario_control.strStyleDivArbol,resumen_usuario_control.strStyleDivContent
																,resumen_usuario_control.strStyleDivOpcionesBanner,resumen_usuario_control.strStyleDivExpandirColapsar
																,resumen_usuario_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=resumen_usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",resumen_usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(resumen_usuario_control) {
		this.actualizarCssBotonesPagina(resumen_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(resumen_usuario_control.tiposReportes,resumen_usuario_control.tiposReporte
															 	,resumen_usuario_control.tiposPaginacion,resumen_usuario_control.tiposAcciones
																,resumen_usuario_control.tiposColumnasSelect,resumen_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(resumen_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(resumen_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(resumen_usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(resumen_usuario_control) {
	
		var indexPosition=resumen_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=resumen_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(resumen_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 
				resumen_usuario_webcontrol1.cargarCombosusuariosFK(resumen_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(resumen_usuario_control.strRecargarFkTiposNinguno!=null && resumen_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && resumen_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(resumen_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTiposNinguno,",")) { 
					resumen_usuario_webcontrol1.cargarCombosusuariosFK(resumen_usuario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(resumen_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,resumen_usuario_funcion1,resumen_usuario_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(resumen_usuario_control) {
		jQuery("#divBusquedaresumen_usuarioAjaxWebPart").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trresumen_usuarioCabeceraBusquedas").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaresumen_usuario").css("display",resumen_usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(resumen_usuario_control.htmlTablaOrderBy!=null
			&& resumen_usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByresumen_usuarioAjaxWebPart").html(resumen_usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//resumen_usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(resumen_usuario_control.htmlTablaOrderByRel!=null
			&& resumen_usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelresumen_usuarioAjaxWebPart").html(resumen_usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaresumen_usuarioAjaxWebPart").css("display","none");
			jQuery("#trresumen_usuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaresumen_usuario").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(resumen_usuario_control) {
		
		if(!resumen_usuario_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(resumen_usuario_control);
		} else {
			jQuery("#divTablaDatosresumen_usuariosAjaxWebPart").html(resumen_usuario_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosresumen_usuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosresumen_usuarios=jQuery("#tblTablaDatosresumen_usuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("resumen_usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',resumen_usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			resumen_usuario_webcontrol1.registrarControlesTableEdition(resumen_usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		resumen_usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(resumen_usuario_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("resumen_usuario_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(resumen_usuario_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosresumen_usuariosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(resumen_usuario_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(resumen_usuario_control);
		
		const divOrderBy = document.getElementById("divOrderByresumen_usuarioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(resumen_usuario_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelresumen_usuarioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(resumen_usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(resumen_usuario_control.resumen_usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(resumen_usuario_control);			
		}
	}
	
	actualizarCamposFilaTabla(resumen_usuario_control) {
		var i=0;
		
		i=resumen_usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(resumen_usuario_control.resumen_usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(resumen_usuario_control.resumen_usuarioActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(resumen_usuario_control.resumen_usuarioActual.versionRow);
		
		if(resumen_usuario_control.resumen_usuarioActual.id_usuario!=null && resumen_usuario_control.resumen_usuarioActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != resumen_usuario_control.resumen_usuarioActual.id_usuario) {
				jQuery("#t-cel_"+i+"_3").val(resumen_usuario_control.resumen_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(resumen_usuario_control.resumen_usuarioActual.numero_ingresos);
		jQuery("#t-cel_"+i+"_5").val(resumen_usuario_control.resumen_usuarioActual.numero_error_ingreso);
		jQuery("#t-cel_"+i+"_6").val(resumen_usuario_control.resumen_usuarioActual.numero_intentos);
		jQuery("#t-cel_"+i+"_7").val(resumen_usuario_control.resumen_usuarioActual.numero_cierres);
		jQuery("#t-cel_"+i+"_8").val(resumen_usuario_control.resumen_usuarioActual.numero_reinicios);
		jQuery("#t-cel_"+i+"_9").val(resumen_usuario_control.resumen_usuarioActual.numero_ingreso_actual);
		jQuery("#t-cel_"+i+"_10").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_ingreso);
		jQuery("#t-cel_"+i+"_11").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_error_ingreso);
		jQuery("#t-cel_"+i+"_12").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_intento);
		jQuery("#t-cel_"+i+"_13").val(resumen_usuario_control.resumen_usuarioActual.fecha_ultimo_cierre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(resumen_usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(resumen_usuario_control) {
		resumen_usuario_funcion1.registrarControlesTableValidacionEdition(resumen_usuario_control,resumen_usuario_webcontrol1,resumen_usuario_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(resumen_usuario_control) {
		jQuery("#divResumenresumen_usuarioActualAjaxWebPart").html(resumen_usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(resumen_usuario_control) {
		//jQuery("#divAccionesRelacionesresumen_usuarioAjaxWebPart").html(resumen_usuario_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("resumen_usuario_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(resumen_usuario_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesresumen_usuarioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		resumen_usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(resumen_usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(resumen_usuario_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(resumen_usuario_control) {
		
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+resumen_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",resumen_usuario_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+resumen_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",resumen_usuario_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionresumen_usuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("resumen_usuario",id,"seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		resumen_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("resumen_usuario","usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuarioConstante,strParametros);
		
		//resumen_usuario_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(resumen_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario",resumen_usuario_control.usuariosFK);

		if(resumen_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+resumen_usuario_control.idFilaTablaActual+"_3",resumen_usuario_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(resumen_usuario_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(resumen_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(resumen_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != resumen_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario").val(resumen_usuario_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//resumen_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 
				resumen_usuario_webcontrol1.setDefectoValorCombosusuariosFK(resumen_usuario_control);
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
	onLoadCombosEventosFK(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(resumen_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",resumen_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				resumen_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(resumen_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(resumen_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(resumen_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(resumen_usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("resumen_usuario","FK_Idusuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
		
			
			if(resumen_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("resumen_usuario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("resumen_usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(resumen_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,"resumen_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+resumen_usuario_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				resumen_usuario_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(resumen_usuario_control) {
		
		jQuery("#divBusquedaresumen_usuarioAjaxWebPart").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trresumen_usuarioCabeceraBusquedas").css("display",resumen_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaresumen_usuario").css("display",resumen_usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteresumen_usuario").css("display",resumen_usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosresumen_usuario").attr("style",resumen_usuario_control.strPermisoMostrarTodos);		
		
		if(resumen_usuario_control.strPermisoNuevo!=null) {
			jQuery("#tdresumen_usuarioNuevo").css("display",resumen_usuario_control.strPermisoNuevo);
			jQuery("#tdresumen_usuarioNuevoToolBar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdresumen_usuarioDuplicar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdresumen_usuarioDuplicarToolBar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdresumen_usuarioNuevoGuardarCambios").css("display",resumen_usuario_control.strPermisoNuevo);
			jQuery("#tdresumen_usuarioNuevoGuardarCambiosToolBar").css("display",resumen_usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(resumen_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdresumen_usuarioCopiar").css("display",resumen_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdresumen_usuarioCopiarToolBar").css("display",resumen_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdresumen_usuarioConEditar").css("display",resumen_usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tdresumen_usuarioGuardarCambios").css("display",resumen_usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdresumen_usuarioGuardarCambiosToolBar").css("display",resumen_usuario_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdresumen_usuarioCerrarPagina").css("display",resumen_usuario_control.strPermisoPopup);		
		jQuery("#tdresumen_usuarioCerrarPaginaToolBar").css("display",resumen_usuario_control.strPermisoPopup);
		//jQuery("#trresumen_usuarioAccionesRelaciones").css("display",resumen_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=resumen_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + resumen_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + resumen_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Resumen Usuarios";
		sTituloBanner+=" - " + resumen_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + resumen_usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdresumen_usuarioRelacionesToolBar").css("display",resumen_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosresumen_usuario").css("display",resumen_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		resumen_usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		resumen_usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		resumen_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		resumen_usuario_webcontrol1.registrarEventosControles();
		
		if(resumen_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
			resumen_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(resumen_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(resumen_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				resumen_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(resumen_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(resumen_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				resumen_usuario_webcontrol1.onLoad();
			
			//} else {
				//if(resumen_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			resumen_usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("resumen_usuario","seguridad","",resumen_usuario_funcion1,resumen_usuario_webcontrol1,resumen_usuario_constante1);	
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

var resumen_usuario_webcontrol1 = new resumen_usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {resumen_usuario_webcontrol,resumen_usuario_webcontrol1};

//Para ser llamado desde window.opener
window.resumen_usuario_webcontrol1 = resumen_usuario_webcontrol1;


if(resumen_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = resumen_usuario_webcontrol1.onLoadWindow; 
}

//</script>