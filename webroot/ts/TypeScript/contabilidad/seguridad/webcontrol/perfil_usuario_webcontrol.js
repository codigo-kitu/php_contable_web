//<script type="text/javascript" language="javascript">



//var perfil_usuarioJQueryPaginaWebInteraccion= function (perfil_usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_usuario_constante,perfil_usuario_constante1} from '../util/perfil_usuario_constante.js';

import {perfil_usuario_funcion,perfil_usuario_funcion1} from '../util/perfil_usuario_funcion.js';


class perfil_usuario_webcontrol extends GeneralEntityWebControl {
	
	perfil_usuario_control=null;
	perfil_usuario_controlInicial=null;
	perfil_usuario_controlAuxiliar=null;
		
	//if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_usuario_control) {
		super();
		
		this.perfil_usuario_control=perfil_usuario_control;
	}
		
	actualizarVariablesPagina(perfil_usuario_control) {
		
		if(perfil_usuario_control.action=="index" || perfil_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_usuario_control);
			
		} 
		
		
		else if(perfil_usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_usuario_control);
			
		} else if(perfil_usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_usuario_control);
			
		} else if(perfil_usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_usuario_control);
		
		}  else if(perfil_usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action.includes("Busqueda") ||
				  perfil_usuario_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(perfil_usuario_control);
			
		} else if(perfil_usuario_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_usuario_control)
		}
		
		
		
	
		else if(perfil_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_usuario_control);	
		
		} else if(perfil_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_usuario_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_usuario_control) {
		this.actualizarPaginaAccionesGenerales(perfil_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_usuario_control);
		this.actualizarPaginaOrderBy(perfil_usuario_control);
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control);
		this.actualizarPaginaAreaBusquedas(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_usuario_control) {
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_usuario_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_usuario_control);
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control);
		this.actualizarPaginaAreaBusquedas(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_usuario_control) {
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaAbrirLink(perfil_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);				
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		//this.actualizarPaginaFormulario(perfil_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		//this.actualizarPaginaFormulario(perfil_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_usuario_control) {
		//this.actualizarPaginaFormulario(perfil_usuario_control);
		this.onLoadCombosDefectoFK(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		//this.actualizarPaginaFormulario(perfil_usuario_control);
		this.onLoadCombosDefectoFK(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaAbrirLink(perfil_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_usuario_control) {
		this.actualizarPaginaTablaDatos(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_usuario_control) {
					//super.actualizarPaginaImprimir(perfil_usuario_control,"perfil_usuario");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_usuario_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("perfil_usuario_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_usuario_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_usuario_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_usuario_control) {
		//super.actualizarPaginaImprimir(perfil_usuario_control,"perfil_usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("perfil_usuario_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(perfil_usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_usuario_control) {
		//super.actualizarPaginaImprimir(perfil_usuario_control,"perfil_usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("perfil_usuario_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_usuario_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_usuario_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_usuario_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(perfil_usuario_control);
			
		this.actualizarPaginaAbrirLink(perfil_usuario_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_usuario_control) {
		
		if(perfil_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_usuario_control);
		}
		
		if(perfil_usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_usuario_control) {
		if(perfil_usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_usuarioReturnGeneral",JSON.stringify(perfil_usuario_control.perfil_usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control) {
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_usuario_control, mostrar) {
		
		if(mostrar==true) {
			perfil_usuario_funcion1.resaltarRestaurarDivsPagina(false,"perfil_usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_usuario");
			}			
			
			perfil_usuario_funcion1.mostrarDivMensaje(true,perfil_usuario_control.strAuxiliarMensaje,perfil_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_usuario_funcion1.mostrarDivMensaje(false,perfil_usuario_control.strAuxiliarMensaje,perfil_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control) {
		if(perfil_usuario_funcion1.esPaginaForm(perfil_usuario_constante1)==true) {
			window.opener.perfil_usuario_webcontrol1.actualizarPaginaTablaDatos(perfil_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_usuario_control) {
		perfil_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_usuario_control.strAuxiliarUrlPagina);
				
		perfil_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_usuario_control.strAuxiliarTipo,perfil_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_usuario_control) {
		perfil_usuario_funcion1.resaltarRestaurarDivMensaje(true,perfil_usuario_control.strAuxiliarMensajeAlert,perfil_usuario_control.strAuxiliarCssMensaje);
			
		if(perfil_usuario_funcion1.esPaginaForm(perfil_usuario_constante1)==true) {
			window.opener.perfil_usuario_funcion1.resaltarRestaurarDivMensaje(true,perfil_usuario_control.strAuxiliarMensajeAlert,perfil_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_usuario_control) {
		this.perfil_usuario_controlInicial=perfil_usuario_control;
			
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_usuario_control.strStyleDivArbol,perfil_usuario_control.strStyleDivContent
																,perfil_usuario_control.strStyleDivOpcionesBanner,perfil_usuario_control.strStyleDivExpandirColapsar
																,perfil_usuario_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_usuario_control) {
		this.actualizarCssBotonesPagina(perfil_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_usuario_control.tiposReportes,perfil_usuario_control.tiposReporte
															 	,perfil_usuario_control.tiposPaginacion,perfil_usuario_control.tiposAcciones
																,perfil_usuario_control.tiposColumnasSelect,perfil_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_usuario_control) {
	
		var indexPosition=perfil_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.cargarCombosperfilsFK(perfil_usuario_control);
			}

			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.cargarCombosusuariosFK(perfil_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_usuario_control.strRecargarFkTiposNinguno!=null && perfil_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTiposNinguno,",")) { 
					perfil_usuario_webcontrol1.cargarCombosperfilsFK(perfil_usuario_control);
				}

				if(perfil_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTiposNinguno,",")) { 
					perfil_usuario_webcontrol1.cargarCombosusuariosFK(perfil_usuario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_usuario_funcion1,perfil_usuario_control.perfilsFK);
	}

	cargarComboEditarTablausuarioFK(perfil_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_usuario_funcion1,perfil_usuario_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(perfil_usuario_control) {
		jQuery("#divBusquedaperfil_usuarioAjaxWebPart").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trperfil_usuarioCabeceraBusquedas").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_usuario").css("display",perfil_usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_usuario_control.htmlTablaOrderBy!=null
			&& perfil_usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfil_usuarioAjaxWebPart").html(perfil_usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_usuario_control.htmlTablaOrderByRel!=null
			&& perfil_usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfil_usuarioAjaxWebPart").html(perfil_usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfil_usuarioAjaxWebPart").css("display","none");
			jQuery("#trperfil_usuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil_usuario").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(perfil_usuario_control) {
		
		if(!perfil_usuario_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(perfil_usuario_control);
		} else {
			jQuery("#divTablaDatosperfil_usuariosAjaxWebPart").html(perfil_usuario_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfil_usuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfil_usuarios=jQuery("#tblTablaDatosperfil_usuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil_usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_usuario_webcontrol1.registrarControlesTableEdition(perfil_usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(perfil_usuario_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("perfil_usuario_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_usuario_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosperfil_usuariosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(perfil_usuario_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(perfil_usuario_control);
		
		const divOrderBy = document.getElementById("divOrderByperfil_usuarioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(perfil_usuario_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelperfil_usuarioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(perfil_usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_usuario_control.perfil_usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_usuario_control);			
		}
	}
	
	actualizarCamposFilaTabla(perfil_usuario_control) {
		var i=0;
		
		i=perfil_usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_usuario_control.perfil_usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_usuario_control.perfil_usuarioActual.versionRow);
		
		if(perfil_usuario_control.perfil_usuarioActual.id_perfil!=null && perfil_usuario_control.perfil_usuarioActual.id_perfil>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != perfil_usuario_control.perfil_usuarioActual.id_perfil) {
				jQuery("#t-cel_"+i+"_2").val(perfil_usuario_control.perfil_usuarioActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_usuario_control.perfil_usuarioActual.id_usuario!=null && perfil_usuario_control.perfil_usuarioActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_usuario_control.perfil_usuarioActual.id_usuario) {
				jQuery("#t-cel_"+i+"_3").val(perfil_usuario_control.perfil_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").prop('checked',perfil_usuario_control.perfil_usuarioActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(perfil_usuario_control) {
		perfil_usuario_funcion1.registrarControlesTableValidacionEdition(perfil_usuario_control,perfil_usuario_webcontrol1,perfil_usuario_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_usuario_control) {
		jQuery("#divResumenperfil_usuarioActualAjaxWebPart").html(perfil_usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_usuario_control) {
		//jQuery("#divAccionesRelacionesperfil_usuarioAjaxWebPart").html(perfil_usuario_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("perfil_usuario_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_usuario_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesperfil_usuarioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		perfil_usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_usuario_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_usuario_control) {
		
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_usuario_control.strVisibleFK_Idperfil);
			jQuery("#tblstrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_usuario_control.strVisibleFK_Idperfil);
		}

		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",perfil_usuario_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",perfil_usuario_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil_usuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil_usuario",id,"seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);		
	}
	
	

	abrirBusquedaParaperfil(strNombreCampoBusqueda){//idActual
		perfil_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_usuario","perfil","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		perfil_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_usuario","usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	

	setCombosCodigoDesdeBusquedaid_usuario(id_usuario) {
		if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != id_usuario) {
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(id_usuario).trigger("change");

		}
		if(jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario").val() != id_usuario) {
			jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idusuario-cmbid_usuario").val(id_usuario).trigger("change");
		}

	}
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuarioConstante,strParametros);
		
		//perfil_usuario_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil",perfil_usuario_control.perfilsFK);

		if(perfil_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_usuario_control.idFilaTablaActual+"_2",perfil_usuario_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_usuario_control.perfilsFK);

	};

	cargarCombosusuariosFK(perfil_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario",perfil_usuario_control.usuariosFK);

		if(perfil_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_usuario_control.idFilaTablaActual+"_3",perfil_usuario_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_usuario_control) {

	};

	registrarComboActionChangeCombosusuariosFK(perfil_usuario_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_usuario_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_usuario_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val(perfil_usuario_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_usuario_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(perfil_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != perfil_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(perfil_usuario_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.setDefectoValorCombosperfilsFK(perfil_usuario_control);
			}

			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.setDefectoValorCombosusuariosFK(perfil_usuario_control);
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
	onLoadCombosEventosFK(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_usuario_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_usuario_control);
			//}

			//if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(perfil_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_usuario","FK_Idperfil","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_usuario","FK_Idusuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
		
			
			if(perfil_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_usuario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,"perfil_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_usuario_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				perfil_usuario_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_usuario_control) {
		
		jQuery("#divBusquedaperfil_usuarioAjaxWebPart").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trperfil_usuarioCabeceraBusquedas").css("display",perfil_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_usuario").css("display",perfil_usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil_usuario").css("display",perfil_usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil_usuario").attr("style",perfil_usuario_control.strPermisoMostrarTodos);		
		
		if(perfil_usuario_control.strPermisoNuevo!=null) {
			jQuery("#tdperfil_usuarioNuevo").css("display",perfil_usuario_control.strPermisoNuevo);
			jQuery("#tdperfil_usuarioNuevoToolBar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfil_usuarioDuplicar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_usuarioDuplicarToolBar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_usuarioNuevoGuardarCambios").css("display",perfil_usuario_control.strPermisoNuevo);
			jQuery("#tdperfil_usuarioNuevoGuardarCambiosToolBar").css("display",perfil_usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_usuarioCopiar").css("display",perfil_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_usuarioCopiarToolBar").css("display",perfil_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_usuarioConEditar").css("display",perfil_usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfil_usuarioGuardarCambios").css("display",perfil_usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfil_usuarioGuardarCambiosToolBar").css("display",perfil_usuario_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdperfil_usuarioCerrarPagina").css("display",perfil_usuario_control.strPermisoPopup);		
		jQuery("#tdperfil_usuarioCerrarPaginaToolBar").css("display",perfil_usuario_control.strPermisoPopup);
		//jQuery("#trperfil_usuarioAccionesRelaciones").css("display",perfil_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Usuarios Perfiles s";
		sTituloBanner+=" - " + perfil_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_usuarioRelacionesToolBar").css("display",perfil_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_usuario").css("display",perfil_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_usuario_webcontrol1.registrarEventosControles();
		
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			perfil_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_usuario_webcontrol1.onLoad();
			
			//} else {
				//if(perfil_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			perfil_usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);	
	}
}

var perfil_usuario_webcontrol1 = new perfil_usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_usuario_webcontrol,perfil_usuario_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_usuario_webcontrol1 = perfil_usuario_webcontrol1;


if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_usuario_webcontrol1.onLoadWindow; 
}

//</script>