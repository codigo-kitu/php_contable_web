//<script type="text/javascript" language="javascript">



//var dato_general_usuarioJQueryPaginaWebInteraccion= function (dato_general_usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {dato_general_usuario_constante,dato_general_usuario_constante1} from '../util/dato_general_usuario_constante.js';

import {dato_general_usuario_funcion,dato_general_usuario_funcion1} from '../util/dato_general_usuario_funcion.js';


class dato_general_usuario_webcontrol extends GeneralEntityWebControl {
	
	dato_general_usuario_control=null;
	dato_general_usuario_controlInicial=null;
	dato_general_usuario_controlAuxiliar=null;
		
	//if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(dato_general_usuario_control) {
		super();
		
		this.dato_general_usuario_control=dato_general_usuario_control;
	}
		
	actualizarVariablesPagina(dato_general_usuario_control) {
		
		if(dato_general_usuario_control.action=="index" || dato_general_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(dato_general_usuario_control);
			
		} 
		
		
		else if(dato_general_usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(dato_general_usuario_control);
			
		} else if(dato_general_usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(dato_general_usuario_control);
			
		} else if(dato_general_usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(dato_general_usuario_control);
		
		}  else if(dato_general_usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(dato_general_usuario_control);
		
		} else if(dato_general_usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(dato_general_usuario_control);		
		
		} else if(dato_general_usuario_control.action.includes("Busqueda") ||
				  dato_general_usuario_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(dato_general_usuario_control);
			
		} else if(dato_general_usuario_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(dato_general_usuario_control)
		}
		
		
		
	
		else if(dato_general_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(dato_general_usuario_control);	
		
		} else if(dato_general_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(dato_general_usuario_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + dato_general_usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(dato_general_usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(dato_general_usuario_control) {
		this.actualizarPaginaAccionesGenerales(dato_general_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(dato_general_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(dato_general_usuario_control);
		this.actualizarPaginaOrderBy(dato_general_usuario_control);
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control);
		this.actualizarPaginaAreaBusquedas(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(dato_general_usuario_control) {
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(dato_general_usuario_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(dato_general_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(dato_general_usuario_control);
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		this.actualizarPaginaCargaGeneralControles(dato_general_usuario_control);
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control);
		this.actualizarPaginaAreaBusquedas(dato_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(dato_general_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(dato_general_usuario_control) {
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);				
		//this.actualizarPaginaFormulario(dato_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		//this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		//this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(dato_general_usuario_control) {
		//this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.onLoadCombosDefectoFK(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		//this.actualizarPaginaFormulario(dato_general_usuario_control);
		this.onLoadCombosDefectoFK(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(dato_general_usuario_control) {
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(dato_general_usuario_control) {
		this.actualizarPaginaTablaDatos(dato_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(dato_general_usuario_control) {
					//super.actualizarPaginaImprimir(dato_general_usuario_control,"dato_general_usuario");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",dato_general_usuario_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("dato_general_usuario_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(dato_general_usuario_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(dato_general_usuario_control) {
		//super.actualizarPaginaImprimir(dato_general_usuario_control,"dato_general_usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("dato_general_usuario_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(dato_general_usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",dato_general_usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(dato_general_usuario_control) {
		//super.actualizarPaginaImprimir(dato_general_usuario_control,"dato_general_usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("dato_general_usuario_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(dato_general_usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",dato_general_usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(dato_general_usuario_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(dato_general_usuario_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(dato_general_usuario_control);
			
		this.actualizarPaginaAbrirLink(dato_general_usuario_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(dato_general_usuario_control) {
		
		if(dato_general_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(dato_general_usuario_control);
		}
		
		if(dato_general_usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(dato_general_usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(dato_general_usuario_control) {
		if(dato_general_usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("dato_general_usuarioReturnGeneral",JSON.stringify(dato_general_usuario_control.dato_general_usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(dato_general_usuario_control) {
		if(dato_general_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && dato_general_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(dato_general_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(dato_general_usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(dato_general_usuario_control, mostrar) {
		
		if(mostrar==true) {
			dato_general_usuario_funcion1.resaltarRestaurarDivsPagina(false,"dato_general_usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				dato_general_usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"dato_general_usuario");
			}			
			
			dato_general_usuario_funcion1.mostrarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensaje,dato_general_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			dato_general_usuario_funcion1.mostrarDivMensaje(false,dato_general_usuario_control.strAuxiliarMensaje,dato_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(dato_general_usuario_control) {
		if(dato_general_usuario_funcion1.esPaginaForm(dato_general_usuario_constante1)==true) {
			window.opener.dato_general_usuario_webcontrol1.actualizarPaginaTablaDatos(dato_general_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(dato_general_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(dato_general_usuario_control) {
		dato_general_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(dato_general_usuario_control.strAuxiliarUrlPagina);
				
		dato_general_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(dato_general_usuario_control.strAuxiliarTipo,dato_general_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(dato_general_usuario_control) {
		dato_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensajeAlert,dato_general_usuario_control.strAuxiliarCssMensaje);
			
		if(dato_general_usuario_funcion1.esPaginaForm(dato_general_usuario_constante1)==true) {
			window.opener.dato_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,dato_general_usuario_control.strAuxiliarMensajeAlert,dato_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(dato_general_usuario_control) {
		this.dato_general_usuario_controlInicial=dato_general_usuario_control;
			
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(dato_general_usuario_control.strStyleDivArbol,dato_general_usuario_control.strStyleDivContent
																,dato_general_usuario_control.strStyleDivOpcionesBanner,dato_general_usuario_control.strStyleDivExpandirColapsar
																,dato_general_usuario_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=dato_general_usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",dato_general_usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(dato_general_usuario_control) {
		this.actualizarCssBotonesPagina(dato_general_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(dato_general_usuario_control.tiposReportes,dato_general_usuario_control.tiposReporte
															 	,dato_general_usuario_control.tiposPaginacion,dato_general_usuario_control.tiposAcciones
																,dato_general_usuario_control.tiposColumnasSelect,dato_general_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(dato_general_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(dato_general_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(dato_general_usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(dato_general_usuario_control) {
	
		var indexPosition=dato_general_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=dato_general_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(dato_general_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosusuariosFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombospaissFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosprovinciasFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.cargarCombosciudadsFK(dato_general_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(dato_general_usuario_control.strRecargarFkTiposNinguno!=null && dato_general_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && dato_general_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosusuariosFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombospaissFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosprovinciasFK(dato_general_usuario_control);
				}

				if(dato_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					dato_general_usuario_webcontrol1.cargarCombosciudadsFK(dato_general_usuario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.usuariosFK);
	}

	cargarComboEditarTablapaisFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(dato_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,dato_general_usuario_funcion1,dato_general_usuario_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(dato_general_usuario_control) {
		jQuery("#divBusquedadato_general_usuarioAjaxWebPart").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trdato_general_usuarioCabeceraBusquedas").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedadato_general_usuario").css("display",dato_general_usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(dato_general_usuario_control.htmlTablaOrderBy!=null
			&& dato_general_usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydato_general_usuarioAjaxWebPart").html(dato_general_usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//dato_general_usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(dato_general_usuario_control.htmlTablaOrderByRel!=null
			&& dato_general_usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldato_general_usuarioAjaxWebPart").html(dato_general_usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadato_general_usuarioAjaxWebPart").css("display","none");
			jQuery("#trdato_general_usuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadato_general_usuario").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(dato_general_usuario_control) {
		
		if(!dato_general_usuario_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(dato_general_usuario_control);
		} else {
			jQuery("#divTablaDatosdato_general_usuariosAjaxWebPart").html(dato_general_usuario_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdato_general_usuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdato_general_usuarios=jQuery("#tblTablaDatosdato_general_usuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("dato_general_usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',dato_general_usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			dato_general_usuario_webcontrol1.registrarControlesTableEdition(dato_general_usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		dato_general_usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(dato_general_usuario_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("dato_general_usuario_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(dato_general_usuario_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdato_general_usuariosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(dato_general_usuario_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(dato_general_usuario_control);
		
		const divOrderBy = document.getElementById("divOrderBydato_general_usuarioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(dato_general_usuario_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldato_general_usuarioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(dato_general_usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(dato_general_usuario_control.dato_general_usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(dato_general_usuario_control);			
		}
	}
	
	actualizarCamposFilaTabla(dato_general_usuario_control) {
		var i=0;
		
		i=dato_general_usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(dato_general_usuario_control.dato_general_usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(dato_general_usuario_control.dato_general_usuarioActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(dato_general_usuario_control.dato_general_usuarioActual.versionRow);
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_pais!=null && dato_general_usuario_control.dato_general_usuarioActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != dato_general_usuario_control.dato_general_usuarioActual.id_pais) {
				jQuery("#t-cel_"+i+"_3").val(dato_general_usuario_control.dato_general_usuarioActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_provincia!=null && dato_general_usuario_control.dato_general_usuarioActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != dato_general_usuario_control.dato_general_usuarioActual.id_provincia) {
				jQuery("#t-cel_"+i+"_4").val(dato_general_usuario_control.dato_general_usuarioActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad!=null && dato_general_usuario_control.dato_general_usuarioActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != dato_general_usuario_control.dato_general_usuarioActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_5").val(dato_general_usuario_control.dato_general_usuarioActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(dato_general_usuario_control.dato_general_usuarioActual.cedula);
		jQuery("#t-cel_"+i+"_7").val(dato_general_usuario_control.dato_general_usuarioActual.apellidos);
		jQuery("#t-cel_"+i+"_8").val(dato_general_usuario_control.dato_general_usuarioActual.nombres);
		jQuery("#t-cel_"+i+"_9").val(dato_general_usuario_control.dato_general_usuarioActual.telefono);
		jQuery("#t-cel_"+i+"_10").val(dato_general_usuario_control.dato_general_usuarioActual.telefono_movil);
		jQuery("#t-cel_"+i+"_11").val(dato_general_usuario_control.dato_general_usuarioActual.e_mail);
		jQuery("#t-cel_"+i+"_12").val(dato_general_usuario_control.dato_general_usuarioActual.url);
		jQuery("#t-cel_"+i+"_13").val(dato_general_usuario_control.dato_general_usuarioActual.fecha_nacimiento);
		jQuery("#t-cel_"+i+"_14").val(dato_general_usuario_control.dato_general_usuarioActual.direccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(dato_general_usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(dato_general_usuario_control) {
		dato_general_usuario_funcion1.registrarControlesTableValidacionEdition(dato_general_usuario_control,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(dato_general_usuario_control) {
		jQuery("#divResumendato_general_usuarioActualAjaxWebPart").html(dato_general_usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(dato_general_usuario_control) {
		//jQuery("#divAccionesRelacionesdato_general_usuarioAjaxWebPart").html(dato_general_usuario_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("dato_general_usuario_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(dato_general_usuario_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdato_general_usuarioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		dato_general_usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(dato_general_usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(dato_general_usuario_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(dato_general_usuario_control) {
		
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",dato_general_usuario_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",dato_general_usuario_control.strVisibleFK_Idciudad);
		}

		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais").attr("style",dato_general_usuario_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais").attr("style",dato_general_usuario_control.strVisibleFK_Idpais);
		}

		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",dato_general_usuario_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",dato_general_usuario_control.strVisibleFK_Idprovincia);
		}

		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid").attr("style",dato_general_usuario_control.strVisibleFK_Idusuarioid);
			jQuery("#tblstrVisible"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid").attr("style",dato_general_usuario_control.strVisibleFK_Idusuarioid);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondato_general_usuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("dato_general_usuario",id,"seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","pais","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","provincia","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		dato_general_usuario_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("dato_general_usuario","ciudad","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuarioConstante,strParametros);
		
		//dato_general_usuario_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id",dato_general_usuario_control.usuariosFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_0",dato_general_usuario_control.usuariosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid",dato_general_usuario_control.usuariosFK);

	};

	cargarCombospaissFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais",dato_general_usuario_control.paissFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_3",dato_general_usuario_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",dato_general_usuario_control.paissFK);

	};

	cargarCombosprovinciasFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia",dato_general_usuario_control.provinciasFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_4",dato_general_usuario_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",dato_general_usuario_control.provinciasFK);

	};

	cargarCombosciudadsFK(dato_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad",dato_general_usuario_control.ciudadsFK);

		if(dato_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+dato_general_usuario_control.idFilaTablaActual+"_5",dato_general_usuario_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",dato_general_usuario_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombosusuariosFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombospaissFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(dato_general_usuario_control) {

	};

	registrarComboActionChangeCombosciudadsFK(dato_general_usuario_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val() != dato_general_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id").val(dato_general_usuario_control.idusuarioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(dato_general_usuario_control.idusuarioDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idpaisDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val() != dato_general_usuario_control.idpaisDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais").val(dato_general_usuario_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(dato_general_usuario_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idprovinciaDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val() != dato_general_usuario_control.idprovinciaDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia").val(dato_general_usuario_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(dato_general_usuario_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(dato_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(dato_general_usuario_control.idciudadDefaultFK>-1 && jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val() != dato_general_usuario_control.idciudadDefaultFK) {
				jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad").val(dato_general_usuario_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(dato_general_usuario_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+dato_general_usuario_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//dato_general_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosusuariosFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombospaissFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosprovinciasFK(dato_general_usuario_control);
			}

			if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 
				dato_general_usuario_webcontrol1.setDefectoValorCombosciudadsFK(dato_general_usuario_control);
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
	onLoadCombosEventosFK(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombospaissFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosprovinciasFK(dato_general_usuario_control);
			//}

			//if(dato_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",dato_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				dato_general_usuario_webcontrol1.registrarComboActionChangeCombosciudadsFK(dato_general_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(dato_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(dato_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(dato_general_usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idciudad","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idpais","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idprovincia","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("dato_general_usuario","FK_Idusuarioid","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
		
			
			if(dato_general_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("dato_general_usuario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("dato_general_usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,"dato_general_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParausuario("id");
				//alert(jQuery('#form-id_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+dato_general_usuario_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				dato_general_usuario_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(dato_general_usuario_control) {
		
		jQuery("#divBusquedadato_general_usuarioAjaxWebPart").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trdato_general_usuarioCabeceraBusquedas").css("display",dato_general_usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedadato_general_usuario").css("display",dato_general_usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedato_general_usuario").css("display",dato_general_usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdato_general_usuario").attr("style",dato_general_usuario_control.strPermisoMostrarTodos);		
		
		if(dato_general_usuario_control.strPermisoNuevo!=null) {
			jQuery("#tddato_general_usuarioNuevo").css("display",dato_general_usuario_control.strPermisoNuevo);
			jQuery("#tddato_general_usuarioNuevoToolBar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddato_general_usuarioDuplicar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddato_general_usuarioDuplicarToolBar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddato_general_usuarioNuevoGuardarCambios").css("display",dato_general_usuario_control.strPermisoNuevo);
			jQuery("#tddato_general_usuarioNuevoGuardarCambiosToolBar").css("display",dato_general_usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(dato_general_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tddato_general_usuarioCopiar").css("display",dato_general_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddato_general_usuarioCopiarToolBar").css("display",dato_general_usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddato_general_usuarioConEditar").css("display",dato_general_usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tddato_general_usuarioGuardarCambios").css("display",dato_general_usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddato_general_usuarioGuardarCambiosToolBar").css("display",dato_general_usuario_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddato_general_usuarioCerrarPagina").css("display",dato_general_usuario_control.strPermisoPopup);		
		jQuery("#tddato_general_usuarioCerrarPaginaToolBar").css("display",dato_general_usuario_control.strPermisoPopup);
		//jQuery("#trdato_general_usuarioAccionesRelaciones").css("display",dato_general_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=dato_general_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + dato_general_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + dato_general_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Dato General Usuarios";
		sTituloBanner+=" - " + dato_general_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + dato_general_usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddato_general_usuarioRelacionesToolBar").css("display",dato_general_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdato_general_usuario").css("display",dato_general_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		dato_general_usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		dato_general_usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		dato_general_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		dato_general_usuario_webcontrol1.registrarEventosControles();
		
		if(dato_general_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			dato_general_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(dato_general_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(dato_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				dato_general_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(dato_general_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(dato_general_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				dato_general_usuario_webcontrol1.onLoad();
			
			//} else {
				//if(dato_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			dato_general_usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("dato_general_usuario","seguridad","",dato_general_usuario_funcion1,dato_general_usuario_webcontrol1,dato_general_usuario_constante1);	
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

var dato_general_usuario_webcontrol1 = new dato_general_usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {dato_general_usuario_webcontrol,dato_general_usuario_webcontrol1};

//Para ser llamado desde window.opener
window.dato_general_usuario_webcontrol1 = dato_general_usuario_webcontrol1;


if(dato_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = dato_general_usuario_webcontrol1.onLoadWindow; 
}

//</script>