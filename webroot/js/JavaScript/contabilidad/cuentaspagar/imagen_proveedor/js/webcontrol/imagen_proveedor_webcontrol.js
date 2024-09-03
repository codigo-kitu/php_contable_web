//<script type="text/javascript" language="javascript">



//var imagen_proveedorJQueryPaginaWebInteraccion= function (imagen_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_proveedor_constante,imagen_proveedor_constante1} from '../util/imagen_proveedor_constante.js';

import {imagen_proveedor_funcion,imagen_proveedor_funcion1} from '../util/imagen_proveedor_funcion.js';


class imagen_proveedor_webcontrol extends GeneralEntityWebControl {
	
	imagen_proveedor_control=null;
	imagen_proveedor_controlInicial=null;
	imagen_proveedor_controlAuxiliar=null;
		
	//if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_proveedor_control) {
		super();
		
		this.imagen_proveedor_control=imagen_proveedor_control;
	}
		
	actualizarVariablesPagina(imagen_proveedor_control) {
		
		if(imagen_proveedor_control.action=="index" || imagen_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_proveedor_control);
			
		} 
		
		
		else if(imagen_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_proveedor_control);
			
		} else if(imagen_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_proveedor_control);
			
		} else if(imagen_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_proveedor_control);
		
		}  else if(imagen_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action.includes("Busqueda") ||
				  imagen_proveedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_proveedor_control);
			
		} else if(imagen_proveedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_proveedor_control)
		}
		
		
		
	
		else if(imagen_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_proveedor_control);	
		
		} else if(imagen_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_proveedor_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(imagen_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_proveedor_control);
		this.actualizarPaginaOrderBy(imagen_proveedor_control);
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control);
		this.actualizarPaginaAreaBusquedas(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_proveedor_control) {
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_proveedor_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_proveedor_control);
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control);
		this.actualizarPaginaAreaBusquedas(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_proveedor_control) {
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);				
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		//this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		//this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_proveedor_control) {
		//this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.onLoadCombosDefectoFK(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		//this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.onLoadCombosDefectoFK(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_proveedor_control) {
					//super.actualizarPaginaImprimir(imagen_proveedor_control,"imagen_proveedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_proveedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_proveedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_proveedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_proveedor_control) {
		//super.actualizarPaginaImprimir(imagen_proveedor_control,"imagen_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_proveedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_proveedor_control) {
		//super.actualizarPaginaImprimir(imagen_proveedor_control,"imagen_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_proveedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_proveedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_proveedor_control);
			
		this.actualizarPaginaAbrirLink(imagen_proveedor_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_proveedor_control) {
		
		if(imagen_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_proveedor_control);
		}
		
		if(imagen_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_proveedor_control) {
		if(imagen_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_proveedorReturnGeneral",JSON.stringify(imagen_proveedor_control.imagen_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control) {
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			imagen_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"imagen_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_proveedor");
			}			
			
			imagen_proveedor_funcion1.mostrarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensaje,imagen_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_proveedor_funcion1.mostrarDivMensaje(false,imagen_proveedor_control.strAuxiliarMensaje,imagen_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control) {
		if(imagen_proveedor_funcion1.esPaginaForm(imagen_proveedor_constante1)==true) {
			window.opener.imagen_proveedor_webcontrol1.actualizarPaginaTablaDatos(imagen_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_proveedor_control) {
		imagen_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_proveedor_control.strAuxiliarUrlPagina);
				
		imagen_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_proveedor_control.strAuxiliarTipo,imagen_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_proveedor_control) {
		imagen_proveedor_funcion1.resaltarRestaurarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensajeAlert,imagen_proveedor_control.strAuxiliarCssMensaje);
			
		if(imagen_proveedor_funcion1.esPaginaForm(imagen_proveedor_constante1)==true) {
			window.opener.imagen_proveedor_funcion1.resaltarRestaurarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensajeAlert,imagen_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_proveedor_control) {
		this.imagen_proveedor_controlInicial=imagen_proveedor_control;
			
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_proveedor_control.strStyleDivArbol,imagen_proveedor_control.strStyleDivContent
																,imagen_proveedor_control.strStyleDivOpcionesBanner,imagen_proveedor_control.strStyleDivExpandirColapsar
																,imagen_proveedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_proveedor_control) {
		this.actualizarCssBotonesPagina(imagen_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_proveedor_control.tiposReportes,imagen_proveedor_control.tiposReporte
															 	,imagen_proveedor_control.tiposPaginacion,imagen_proveedor_control.tiposAcciones
																,imagen_proveedor_control.tiposColumnasSelect,imagen_proveedor_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_proveedor_control) {
	
		var indexPosition=imagen_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 
				imagen_proveedor_webcontrol1.cargarCombosproveedorsFK(imagen_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_proveedor_control.strRecargarFkTiposNinguno!=null && imagen_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					imagen_proveedor_webcontrol1.cargarCombosproveedorsFK(imagen_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproveedorFK(imagen_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_proveedor_funcion1,imagen_proveedor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_proveedor_control) {
		jQuery("#divBusquedaimagen_proveedorAjaxWebPart").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trimagen_proveedorCabeceraBusquedas").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_proveedor").css("display",imagen_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_proveedor_control.htmlTablaOrderBy!=null
			&& imagen_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_proveedorAjaxWebPart").html(imagen_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_proveedor_control.htmlTablaOrderByRel!=null
			&& imagen_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_proveedorAjaxWebPart").html(imagen_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_proveedorAjaxWebPart").css("display","none");
			jQuery("#trimagen_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_proveedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_proveedor_control) {
		
		if(!imagen_proveedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_proveedor_control);
		} else {
			jQuery("#divTablaDatosimagen_proveedorsAjaxWebPart").html(imagen_proveedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_proveedors=jQuery("#tblTablaDatosimagen_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_proveedor_webcontrol1.registrarControlesTableEdition(imagen_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_proveedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_proveedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_proveedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_proveedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_proveedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_proveedor_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_proveedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_proveedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_proveedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_proveedor_control.imagen_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_proveedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_proveedor_control) {
		var i=0;
		
		i=imagen_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_proveedor_control.imagen_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_proveedor_control.imagen_proveedorActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(imagen_proveedor_control.imagen_proveedorActual.versionRow);
		
		if(imagen_proveedor_control.imagen_proveedorActual.id_proveedor!=null && imagen_proveedor_control.imagen_proveedorActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != imagen_proveedor_control.imagen_proveedorActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_3").val(imagen_proveedor_control.imagen_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(imagen_proveedor_control.imagen_proveedorActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_proveedor_control) {
		imagen_proveedor_funcion1.registrarControlesTableValidacionEdition(imagen_proveedor_control,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_proveedor_control) {
		jQuery("#divResumenimagen_proveedorActualAjaxWebPart").html(imagen_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_proveedor_control) {
		//jQuery("#divAccionesRelacionesimagen_proveedorAjaxWebPart").html(imagen_proveedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_proveedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_proveedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_proveedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_proveedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_proveedor_control) {
		
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",imagen_proveedor_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",imagen_proveedor_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_proveedor",id,"cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);		
	}
	
	

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		imagen_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_proveedor","proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedorConstante,strParametros);
		
		//imagen_proveedor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproveedorsFK(imagen_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor",imagen_proveedor_control.proveedorsFK);

		if(imagen_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_proveedor_control.idFilaTablaActual+"_3",imagen_proveedor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",imagen_proveedor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproveedorsFK(imagen_proveedor_control) {

	};

	
	
	setDefectoValorCombosproveedorsFK(imagen_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_proveedor_control.idproveedorDefaultFK>-1 && jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != imagen_proveedor_control.idproveedorDefaultFK) {
				jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(imagen_proveedor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(imagen_proveedor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 
				imagen_proveedor_webcontrol1.setDefectoValorCombosproveedorsFK(imagen_proveedor_control);
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
	onLoadCombosEventosFK(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_proveedor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(imagen_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_proveedor","FK_Idproveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
		
			
			if(imagen_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_proveedor");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,"imagen_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				imagen_proveedor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_proveedor_control) {
		
		jQuery("#divBusquedaimagen_proveedorAjaxWebPart").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trimagen_proveedorCabeceraBusquedas").css("display",imagen_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_proveedor").css("display",imagen_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_proveedor").css("display",imagen_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_proveedor").attr("style",imagen_proveedor_control.strPermisoMostrarTodos);		
		
		if(imagen_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_proveedorNuevo").css("display",imagen_proveedor_control.strPermisoNuevo);
			jQuery("#tdimagen_proveedorNuevoToolBar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_proveedorDuplicar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_proveedorDuplicarToolBar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_proveedorNuevoGuardarCambios").css("display",imagen_proveedor_control.strPermisoNuevo);
			jQuery("#tdimagen_proveedorNuevoGuardarCambiosToolBar").css("display",imagen_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_proveedorCopiar").css("display",imagen_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_proveedorCopiarToolBar").css("display",imagen_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_proveedorConEditar").css("display",imagen_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_proveedorGuardarCambios").css("display",imagen_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_proveedorGuardarCambiosToolBar").css("display",imagen_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_proveedorCerrarPagina").css("display",imagen_proveedor_control.strPermisoPopup);		
		jQuery("#tdimagen_proveedorCerrarPaginaToolBar").css("display",imagen_proveedor_control.strPermisoPopup);
		//jQuery("#trimagen_proveedorAccionesRelaciones").css("display",imagen_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Proveedoreses";
		sTituloBanner+=" - " + imagen_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_proveedorRelacionesToolBar").css("display",imagen_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_proveedor").css("display",imagen_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_proveedor_webcontrol1.registrarEventosControles();
		
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			imagen_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_proveedor_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);	
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

var imagen_proveedor_webcontrol1 = new imagen_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_proveedor_webcontrol,imagen_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_proveedor_webcontrol1 = imagen_proveedor_webcontrol1;


if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_proveedor_webcontrol1.onLoadWindow; 
}

//</script>