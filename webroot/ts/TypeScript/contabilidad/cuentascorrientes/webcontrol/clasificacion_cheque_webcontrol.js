//<script type="text/javascript" language="javascript">



//var clasificacion_chequeJQueryPaginaWebInteraccion= function (clasificacion_cheque_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {clasificacion_cheque_constante,clasificacion_cheque_constante1} from '../util/clasificacion_cheque_constante.js';

import {clasificacion_cheque_funcion,clasificacion_cheque_funcion1} from '../util/clasificacion_cheque_funcion.js';


class clasificacion_cheque_webcontrol extends GeneralEntityWebControl {
	
	clasificacion_cheque_control=null;
	clasificacion_cheque_controlInicial=null;
	clasificacion_cheque_controlAuxiliar=null;
		
	//if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(clasificacion_cheque_control) {
		super();
		
		this.clasificacion_cheque_control=clasificacion_cheque_control;
	}
		
	actualizarVariablesPagina(clasificacion_cheque_control) {
		
		if(clasificacion_cheque_control.action=="index" || clasificacion_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(clasificacion_cheque_control);
			
		} 
		
		
		else if(clasificacion_cheque_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(clasificacion_cheque_control);
			
		} else if(clasificacion_cheque_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(clasificacion_cheque_control);
			
		} else if(clasificacion_cheque_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(clasificacion_cheque_control);
		
		}  else if(clasificacion_cheque_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action.includes("Busqueda") ||
				  clasificacion_cheque_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(clasificacion_cheque_control);
			
		} else if(clasificacion_cheque_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(clasificacion_cheque_control)
		}
		
		
		
	
		else if(clasificacion_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(clasificacion_cheque_control);	
		
		} else if(clasificacion_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(clasificacion_cheque_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + clasificacion_cheque_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(clasificacion_cheque_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(clasificacion_cheque_control) {
		this.actualizarPaginaAccionesGenerales(clasificacion_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(clasificacion_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(clasificacion_cheque_control);
		this.actualizarPaginaOrderBy(clasificacion_cheque_control);
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaAreaBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(clasificacion_cheque_control) {
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(clasificacion_cheque_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(clasificacion_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(clasificacion_cheque_control);
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaAreaBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(clasificacion_cheque_control) {
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);				
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(clasificacion_cheque_control) {
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.onLoadCombosDefectoFK(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.onLoadCombosDefectoFK(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(clasificacion_cheque_control) {
					//super.actualizarPaginaImprimir(clasificacion_cheque_control,"clasificacion_cheque");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",clasificacion_cheque_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("clasificacion_cheque_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(clasificacion_cheque_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(clasificacion_cheque_control) {
		//super.actualizarPaginaImprimir(clasificacion_cheque_control,"clasificacion_cheque");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("clasificacion_cheque_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(clasificacion_cheque_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",clasificacion_cheque_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(clasificacion_cheque_control) {
		//super.actualizarPaginaImprimir(clasificacion_cheque_control,"clasificacion_cheque");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("clasificacion_cheque_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(clasificacion_cheque_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",clasificacion_cheque_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(clasificacion_cheque_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(clasificacion_cheque_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(clasificacion_cheque_control);
			
		this.actualizarPaginaAbrirLink(clasificacion_cheque_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(clasificacion_cheque_control) {
		
		if(clasificacion_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(clasificacion_cheque_control);
		}
		
		if(clasificacion_cheque_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(clasificacion_cheque_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(clasificacion_cheque_control) {
		if(clasificacion_cheque_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("clasificacion_chequeReturnGeneral",JSON.stringify(clasificacion_cheque_control.clasificacion_chequeReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control) {
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && clasificacion_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(clasificacion_cheque_control, mostrar) {
		
		if(mostrar==true) {
			clasificacion_cheque_funcion1.resaltarRestaurarDivsPagina(false,"clasificacion_cheque");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				clasificacion_cheque_funcion1.resaltarRestaurarDivMantenimiento(false,"clasificacion_cheque");
			}			
			
			clasificacion_cheque_funcion1.mostrarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensaje,clasificacion_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			clasificacion_cheque_funcion1.mostrarDivMensaje(false,clasificacion_cheque_control.strAuxiliarMensaje,clasificacion_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control) {
		if(clasificacion_cheque_funcion1.esPaginaForm(clasificacion_cheque_constante1)==true) {
			window.opener.clasificacion_cheque_webcontrol1.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(clasificacion_cheque_control) {
		clasificacion_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(clasificacion_cheque_control.strAuxiliarUrlPagina);
				
		clasificacion_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(clasificacion_cheque_control.strAuxiliarTipo,clasificacion_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(clasificacion_cheque_control) {
		clasificacion_cheque_funcion1.resaltarRestaurarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensajeAlert,clasificacion_cheque_control.strAuxiliarCssMensaje);
			
		if(clasificacion_cheque_funcion1.esPaginaForm(clasificacion_cheque_constante1)==true) {
			window.opener.clasificacion_cheque_funcion1.resaltarRestaurarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensajeAlert,clasificacion_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(clasificacion_cheque_control) {
		this.clasificacion_cheque_controlInicial=clasificacion_cheque_control;
			
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(clasificacion_cheque_control.strStyleDivArbol,clasificacion_cheque_control.strStyleDivContent
																,clasificacion_cheque_control.strStyleDivOpcionesBanner,clasificacion_cheque_control.strStyleDivExpandirColapsar
																,clasificacion_cheque_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=clasificacion_cheque_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",clasificacion_cheque_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(clasificacion_cheque_control) {
		this.actualizarCssBotonesPagina(clasificacion_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(clasificacion_cheque_control.tiposReportes,clasificacion_cheque_control.tiposReporte
															 	,clasificacion_cheque_control.tiposPaginacion,clasificacion_cheque_control.tiposAcciones
																,clasificacion_cheque_control.tiposColumnasSelect,clasificacion_cheque_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(clasificacion_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(clasificacion_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(clasificacion_cheque_control);			
	}
	
	actualizarPaginaUsuarioInvitado(clasificacion_cheque_control) {
	
		var indexPosition=clasificacion_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=clasificacion_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(clasificacion_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			}

			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.cargarComboscategoria_chequesFK(clasificacion_cheque_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(clasificacion_cheque_control.strRecargarFkTiposNinguno!=null && clasificacion_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && clasificacion_cheque_control.strRecargarFkTiposNinguno!='') {
			
				if(clasificacion_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTiposNinguno,",")) { 
					clasificacion_cheque_webcontrol1.cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
				}

				if(clasificacion_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTiposNinguno,",")) { 
					clasificacion_cheque_webcontrol1.cargarComboscategoria_chequesFK(clasificacion_cheque_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacuenta_corriente_detalleFK(clasificacion_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,clasificacion_cheque_funcion1,clasificacion_cheque_control.cuenta_corriente_detallesFK);
	}

	cargarComboEditarTablacategoria_chequeFK(clasificacion_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,clasificacion_cheque_funcion1,clasificacion_cheque_control.categoria_chequesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(clasificacion_cheque_control) {
		jQuery("#divBusquedaclasificacion_chequeAjaxWebPart").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trclasificacion_chequeCabeceraBusquedas").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedaclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(clasificacion_cheque_control.htmlTablaOrderBy!=null
			&& clasificacion_cheque_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByclasificacion_chequeAjaxWebPart").html(clasificacion_cheque_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//clasificacion_cheque_webcontrol1.registrarOrderByActions();
			
		}
			
		if(clasificacion_cheque_control.htmlTablaOrderByRel!=null
			&& clasificacion_cheque_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelclasificacion_chequeAjaxWebPart").html(clasificacion_cheque_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaclasificacion_chequeAjaxWebPart").css("display","none");
			jQuery("#trclasificacion_chequeCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaclasificacion_cheque").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(clasificacion_cheque_control) {
		
		if(!clasificacion_cheque_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(clasificacion_cheque_control);
		} else {
			jQuery("#divTablaDatosclasificacion_chequesAjaxWebPart").html(clasificacion_cheque_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosclasificacion_cheques=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosclasificacion_cheques=jQuery("#tblTablaDatosclasificacion_cheques").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("clasificacion_cheque",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',clasificacion_cheque_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			clasificacion_cheque_webcontrol1.registrarControlesTableEdition(clasificacion_cheque_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		clasificacion_cheque_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(clasificacion_cheque_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("clasificacion_cheque_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(clasificacion_cheque_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosclasificacion_chequesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(clasificacion_cheque_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(clasificacion_cheque_control);
		
		const divOrderBy = document.getElementById("divOrderByclasificacion_chequeAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(clasificacion_cheque_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelclasificacion_chequeAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(clasificacion_cheque_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(clasificacion_cheque_control.clasificacion_chequeActual!=null) {//form
			
			this.actualizarCamposFilaTabla(clasificacion_cheque_control);			
		}
	}
	
	actualizarCamposFilaTabla(clasificacion_cheque_control) {
		var i=0;
		
		i=clasificacion_cheque_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(clasificacion_cheque_control.clasificacion_chequeActual.id);
		jQuery("#t-version_row_"+i+"").val(clasificacion_cheque_control.clasificacion_chequeActual.versionRow);
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle) {
				jQuery("#t-cel_"+i+"_2").val(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque) {
				jQuery("#t-cel_"+i+"_3").val(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(clasificacion_cheque_control.clasificacion_chequeActual.monto);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(clasificacion_cheque_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(clasificacion_cheque_control) {
		clasificacion_cheque_funcion1.registrarControlesTableValidacionEdition(clasificacion_cheque_control,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(clasificacion_cheque_control) {
		jQuery("#divResumenclasificacion_chequeActualAjaxWebPart").html(clasificacion_cheque_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(clasificacion_cheque_control) {
		//jQuery("#divAccionesRelacionesclasificacion_chequeAjaxWebPart").html(clasificacion_cheque_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("clasificacion_cheque_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(clasificacion_cheque_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesclasificacion_chequeAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		clasificacion_cheque_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(clasificacion_cheque_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(clasificacion_cheque_control) {
		
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",clasificacion_cheque_control.strVisibleFK_Idcategoria_cheque);
			jQuery("#tblstrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",clasificacion_cheque_control.strVisibleFK_Idcategoria_cheque);
		}

		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle").attr("style",clasificacion_cheque_control.strVisibleFK_Idcuenta_corriente_detalle);
			jQuery("#tblstrVisible"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle").attr("style",clasificacion_cheque_control.strVisibleFK_Idcuenta_corriente_detalle);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionclasificacion_cheque();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("clasificacion_cheque",id,"cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);		
	}
	
	

	abrirBusquedaParacuenta_corriente_detalle(strNombreCampoBusqueda){//idActual
		clasificacion_cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("clasificacion_cheque","cuenta_corriente_detalle","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}

	abrirBusquedaParacategoria_cheque(strNombreCampoBusqueda){//idActual
		clasificacion_cheque_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("clasificacion_cheque","categoria_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_chequeConstante,strParametros);
		
		//clasificacion_cheque_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle",clasificacion_cheque_control.cuenta_corriente_detallesFK);

		if(clasificacion_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+clasificacion_cheque_control.idFilaTablaActual+"_2",clasificacion_cheque_control.cuenta_corriente_detallesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle",clasificacion_cheque_control.cuenta_corriente_detallesFK);

	};

	cargarComboscategoria_chequesFK(clasificacion_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque",clasificacion_cheque_control.categoria_chequesFK);

		if(clasificacion_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+clasificacion_cheque_control.idFilaTablaActual+"_3",clasificacion_cheque_control.categoria_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque",clasificacion_cheque_control.categoria_chequesFK);

	};

	
	
	registrarComboActionChangeComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

	};

	registrarComboActionChangeComboscategoria_chequesFK(clasificacion_cheque_control) {

	};

	
	
	setDefectoValorComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK>-1 && jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val() != clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultForeignKey).trigger("change");
			if(jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_chequesFK(clasificacion_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(clasificacion_cheque_control.idcategoria_chequeDefaultFK>-1 && jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != clasificacion_cheque_control.idcategoria_chequeDefaultFK) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(clasificacion_cheque_control.idcategoria_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(clasificacion_cheque_control.idcategoria_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//clasificacion_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.setDefectoValorComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			}

			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.setDefectoValorComboscategoria_chequesFK(clasificacion_cheque_control);
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
	onLoadCombosEventosFK(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				clasificacion_cheque_webcontrol1.registrarComboActionChangeComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			//}

			//if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				clasificacion_cheque_webcontrol1.registrarComboActionChangeComboscategoria_chequesFK(clasificacion_cheque_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(clasificacion_cheque_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("clasificacion_cheque","FK_Idcategoria_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("clasificacion_cheque","FK_Idcuenta_corriente_detalle","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
		
			
			if(clasificacion_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("clasificacion_cheque");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("clasificacion_cheque");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,"clasificacion_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente_detalle","id_cuenta_corriente_detalle","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle_img_busqueda").click(function(){
				clasificacion_cheque_webcontrol1.abrirBusquedaParacuenta_corriente_detalle("id_cuenta_corriente_detalle");
				//alert(jQuery('#form-id_cuenta_corriente_detalle_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cheque","id_categoria_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque_img_busqueda").click(function(){
				clasificacion_cheque_webcontrol1.abrirBusquedaParacategoria_cheque("id_categoria_cheque");
				//alert(jQuery('#form-id_categoria_cheque_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(clasificacion_cheque_control) {
		
		jQuery("#divBusquedaclasificacion_chequeAjaxWebPart").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trclasificacion_chequeCabeceraBusquedas").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedaclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosclasificacion_cheque").attr("style",clasificacion_cheque_control.strPermisoMostrarTodos);		
		
		if(clasificacion_cheque_control.strPermisoNuevo!=null) {
			jQuery("#tdclasificacion_chequeNuevo").css("display",clasificacion_cheque_control.strPermisoNuevo);
			jQuery("#tdclasificacion_chequeNuevoToolBar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdclasificacion_chequeDuplicar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclasificacion_chequeDuplicarToolBar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclasificacion_chequeNuevoGuardarCambios").css("display",clasificacion_cheque_control.strPermisoNuevo);
			jQuery("#tdclasificacion_chequeNuevoGuardarCambiosToolBar").css("display",clasificacion_cheque_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(clasificacion_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdclasificacion_chequeCopiar").css("display",clasificacion_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclasificacion_chequeCopiarToolBar").css("display",clasificacion_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclasificacion_chequeConEditar").css("display",clasificacion_cheque_control.strPermisoActualizar);
		}
		
		jQuery("#tdclasificacion_chequeGuardarCambios").css("display",clasificacion_cheque_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdclasificacion_chequeGuardarCambiosToolBar").css("display",clasificacion_cheque_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdclasificacion_chequeCerrarPagina").css("display",clasificacion_cheque_control.strPermisoPopup);		
		jQuery("#tdclasificacion_chequeCerrarPaginaToolBar").css("display",clasificacion_cheque_control.strPermisoPopup);
		//jQuery("#trclasificacion_chequeAccionesRelaciones").css("display",clasificacion_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=clasificacion_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + clasificacion_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + clasificacion_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Clasificacion Cheques";
		sTituloBanner+=" - " + clasificacion_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + clasificacion_cheque_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdclasificacion_chequeRelacionesToolBar").css("display",clasificacion_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosclasificacion_cheque").css("display",clasificacion_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		clasificacion_cheque_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		clasificacion_cheque_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		clasificacion_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		clasificacion_cheque_webcontrol1.registrarEventosControles();
		
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			clasificacion_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(clasificacion_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(clasificacion_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				clasificacion_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(clasificacion_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(clasificacion_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				clasificacion_cheque_webcontrol1.onLoad();
			
			//} else {
				//if(clasificacion_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			clasificacion_cheque_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);	
	}
}

var clasificacion_cheque_webcontrol1 = new clasificacion_cheque_webcontrol();

//Para ser llamado desde otro archivo (import)
export {clasificacion_cheque_webcontrol,clasificacion_cheque_webcontrol1};

//Para ser llamado desde window.opener
window.clasificacion_cheque_webcontrol1 = clasificacion_cheque_webcontrol1;


if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = clasificacion_cheque_webcontrol1.onLoadWindow; 
}

//</script>