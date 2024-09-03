//<script type="text/javascript" language="javascript">



//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../util/tipo_precio_constante.js';

import {tipo_precio_funcion,tipo_precio_funcion1} from '../util/tipo_precio_funcion.js';


class tipo_precio_webcontrol extends GeneralEntityWebControl {
	
	tipo_precio_control=null;
	tipo_precio_controlInicial=null;
	tipo_precio_controlAuxiliar=null;
		
	//if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_precio_control) {
		super();
		
		this.tipo_precio_control=tipo_precio_control;
	}
		
	actualizarVariablesPagina(tipo_precio_control) {
		
		if(tipo_precio_control.action=="index" || tipo_precio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_precio_control);
			
		} 
		
		
		else if(tipo_precio_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_precio_control);
			
		} else if(tipo_precio_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_precio_control);
			
		} else if(tipo_precio_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_precio_control);
		
		}  else if(tipo_precio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_precio_control);		
		
		} else if(tipo_precio_control.action.includes("Busqueda") ||
				  tipo_precio_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(tipo_precio_control);
			
		} else if(tipo_precio_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_precio_control)
		}
		
		
		
	
		else if(tipo_precio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_precio_control);	
		
		} else if(tipo_precio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control);		
		}
	
		else if(tipo_precio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control);		
		}
	
		else if(tipo_precio_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_precio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_precio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_precio_control) {
		this.actualizarPaginaAccionesGenerales(tipo_precio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_precio_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_precio_control);
		this.actualizarPaginaOrderBy(tipo_precio_control);
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
		this.actualizarPaginaAreaBusquedas(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_precio_control) {
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_precio_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_precio_control);
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
		this.actualizarPaginaAreaBusquedas(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_precio_control) {
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_precio_control) {
		this.actualizarPaginaAbrirLink(tipo_precio_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);				
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		//this.actualizarPaginaFormulario(tipo_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		//this.actualizarPaginaFormulario(tipo_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_precio_control) {
		//this.actualizarPaginaFormulario(tipo_precio_control);
		this.onLoadCombosDefectoFK(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		//this.actualizarPaginaFormulario(tipo_precio_control);
		this.onLoadCombosDefectoFK(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_precio_control) {
		this.actualizarPaginaAbrirLink(tipo_precio_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_precio_control) {
					//super.actualizarPaginaImprimir(tipo_precio_control,"tipo_precio");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_precio_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("tipo_precio_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_precio_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_precio_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_precio_control) {
		//super.actualizarPaginaImprimir(tipo_precio_control,"tipo_precio");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("tipo_precio_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(tipo_precio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_precio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_precio_control) {
		//super.actualizarPaginaImprimir(tipo_precio_control,"tipo_precio");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("tipo_precio_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_precio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_precio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_precio_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_precio_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_precio_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(tipo_precio_control);
			
		this.actualizarPaginaAbrirLink(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control) {
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_precio_control) {
		
		if(tipo_precio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_precio_control);
		}
		
		if(tipo_precio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_precio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_precio_control) {
		if(tipo_precio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_precioReturnGeneral",JSON.stringify(tipo_precio_control.tipo_precioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control) {
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_precio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_precio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_precio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_precio_control, mostrar) {
		
		if(mostrar==true) {
			tipo_precio_funcion1.resaltarRestaurarDivsPagina(false,"tipo_precio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_precio_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_precio");
			}			
			
			tipo_precio_funcion1.mostrarDivMensaje(true,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_precio_funcion1.mostrarDivMensaje(false,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_precio_control) {
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_webcontrol1.actualizarPaginaTablaDatos(tipo_precio_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_precio_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_precio_control) {
		tipo_precio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_precio_control.strAuxiliarUrlPagina);
				
		tipo_precio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_precio_control.strAuxiliarTipo,tipo_precio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_precio_control) {
		tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
			
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_precio_control) {
		this.tipo_precio_controlInicial=tipo_precio_control;
			
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_precio_control.strStyleDivArbol,tipo_precio_control.strStyleDivContent
																,tipo_precio_control.strStyleDivOpcionesBanner,tipo_precio_control.strStyleDivExpandirColapsar
																,tipo_precio_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_precio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_precio_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_precio_control) {
		this.actualizarCssBotonesPagina(tipo_precio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_precio_control.tiposReportes,tipo_precio_control.tiposReporte
															 	,tipo_precio_control.tiposPaginacion,tipo_precio_control.tiposAcciones
																,tipo_precio_control.tiposColumnasSelect,tipo_precio_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_precio_control.tiposRelaciones,tipo_precio_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_precio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_precio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_precio_control) {
	
		var indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_precio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_precio_control.strRecargarFkTiposNinguno!=null && tipo_precio_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_precio_control.strRecargarFkTiposNinguno!='') {
			
				if(tipo_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTiposNinguno,",")) { 
					tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(tipo_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,tipo_precio_funcion1,tipo_precio_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(tipo_precio_control) {
		jQuery("#divBusquedatipo_precioAjaxWebPart").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trtipo_precioCabeceraBusquedas").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_precio").css("display",tipo_precio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_precio_control.htmlTablaOrderBy!=null
			&& tipo_precio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_precio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_precio_control.htmlTablaOrderByRel!=null
			&& tipo_precio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_precioAjaxWebPart").css("display","none");
			jQuery("#trtipo_precioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_precio").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(tipo_precio_control) {
		
		if(!tipo_precio_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(tipo_precio_control);
		} else {
			jQuery("#divTablaDatostipo_preciosAjaxWebPart").html(tipo_precio_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_precios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_precios=jQuery("#tblTablaDatostipo_precios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_precio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_precio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_precio_webcontrol1.registrarControlesTableEdition(tipo_precio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_precio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(tipo_precio_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("tipo_precio_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_precio_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostipo_preciosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(tipo_precio_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(tipo_precio_control);
		
		const divOrderBy = document.getElementById("divOrderBytipo_precioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(tipo_precio_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltipo_precioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(tipo_precio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_precio_control.tipo_precioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_precio_control);			
		}
	}
	
	actualizarCamposFilaTabla(tipo_precio_control) {
		var i=0;
		
		i=tipo_precio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_precio_control.tipo_precioActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_precio_control.tipo_precioActual.versionRow);
		
		if(tipo_precio_control.tipo_precioActual.id_empresa!=null && tipo_precio_control.tipo_precioActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != tipo_precio_control.tipo_precioActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(tipo_precio_control.tipo_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(tipo_precio_control.tipo_precioActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(tipo_precio_control.tipo_precioActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_precio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatostipo_precios").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionprecio_producto").click(function(){
		jQuery("#tblTablaDatostipo_precios").on("click",".imgrelacionprecio_producto", function () {

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaprecio_productos(idActual);
		});				
	}
		
	

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_precio","cliente","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1,"s","");
	}

	registrarSesionParaprecio_productos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_precio","precio_producto","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1,"s","");
	}
	
	registrarControlesTableEdition(tipo_precio_control) {
		tipo_precio_funcion1.registrarControlesTableValidacionEdition(tipo_precio_control,tipo_precio_webcontrol1,tipo_precio_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_precio_control) {
		jQuery("#divResumentipo_precioActualAjaxWebPart").html(tipo_precio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control) {
		//jQuery("#divAccionesRelacionestipo_precioAjaxWebPart").html(tipo_precio_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("tipo_precio_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_precio_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestipo_precioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		tipo_precio_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_precio_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_precio_control) {
		
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+tipo_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",tipo_precio_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+tipo_precio_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",tipo_precio_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_precio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_precio",id,"inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		tipo_precio_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("tipo_precio","empresa","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionprecio_producto").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_precio");

			tipo_precio_webcontrol1.registrarSesionParaprecio_productos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precioConstante,strParametros);
		
		//tipo_precio_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(tipo_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa",tipo_precio_control.empresasFK);

		if(tipo_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+tipo_precio_control.idFilaTablaActual+"_2",tipo_precio_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(tipo_precio_control) {

	};

	
	
	setDefectoValorCombosempresasFK(tipo_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(tipo_precio_control.idempresaDefaultFK>-1 && jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.idempresaDefaultFK) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_precio_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.setDefectoValorCombosempresasFK(tipo_precio_control);
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
	onLoadCombosEventosFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				tipo_precio_webcontrol1.registrarComboActionChangeCombosempresasFK(tipo_precio_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_precio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("tipo_precio","FK_Idempresa","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
		
			
			if(tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_precio");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_precio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_precio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,"tipo_precio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				tipo_precio_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_precio");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_precio_control) {
		
		jQuery("#divBusquedatipo_precioAjaxWebPart").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trtipo_precioCabeceraBusquedas").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_precio").css("display",tipo_precio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_precio").css("display",tipo_precio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_precio").attr("style",tipo_precio_control.strPermisoMostrarTodos);		
		
		if(tipo_precio_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_precioNuevo").css("display",tipo_precio_control.strPermisoNuevo);
			jQuery("#tdtipo_precioNuevoToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_precioDuplicar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_precioDuplicarToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_precioNuevoGuardarCambios").css("display",tipo_precio_control.strPermisoNuevo);
			jQuery("#tdtipo_precioNuevoGuardarCambiosToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_precio_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_precioCopiar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_precioCopiarToolBar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_precioConEditar").css("display",tipo_precio_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_precioGuardarCambios").css("display",tipo_precio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_precioGuardarCambiosToolBar").css("display",tipo_precio_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtipo_precioCerrarPagina").css("display",tipo_precio_control.strPermisoPopup);		
		jQuery("#tdtipo_precioCerrarPaginaToolBar").css("display",tipo_precio_control.strPermisoPopup);
		//jQuery("#trtipo_precioAccionesRelaciones").css("display",tipo_precio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Precios";
		sTituloBanner+=" - " + tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_precio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_precioRelacionesToolBar").css("display",tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_precio").css("display",tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_precio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_precio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarEventosControles();
		
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			tipo_precio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_precio_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_precio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_precio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_precio_webcontrol1.onLoad();
			
			//} else {
				//if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			tipo_precio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
}

var tipo_precio_webcontrol1 = new tipo_precio_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_precio_webcontrol,tipo_precio_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_precio_webcontrol1 = tipo_precio_webcontrol1;


if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_precio_webcontrol1.onLoadWindow; 
}

//</script>