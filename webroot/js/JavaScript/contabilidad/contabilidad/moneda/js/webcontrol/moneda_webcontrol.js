//<script type="text/javascript" language="javascript">



//var monedaJQueryPaginaWebInteraccion= function (moneda_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {moneda_constante,moneda_constante1} from '../util/moneda_constante.js';

import {moneda_funcion,moneda_funcion1} from '../util/moneda_funcion.js';


class moneda_webcontrol extends GeneralEntityWebControl {
	
	moneda_control=null;
	moneda_controlInicial=null;
	moneda_controlAuxiliar=null;
		
	//if(moneda_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(moneda_control) {
		super();
		
		this.moneda_control=moneda_control;
	}
		
	actualizarVariablesPagina(moneda_control) {
		
		if(moneda_control.action=="index" || moneda_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(moneda_control);
			
		} 
		
		
		else if(moneda_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(moneda_control);
		
		} else if(moneda_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(moneda_control);
		
		} else if(moneda_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(moneda_control);
		
		} else if(moneda_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(moneda_control);
			
		} else if(moneda_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(moneda_control);
			
		} else if(moneda_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(moneda_control);
		
		} else if(moneda_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(moneda_control);		
		
		} else if(moneda_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(moneda_control);
		
		} else if(moneda_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(moneda_control);
		
		} else if(moneda_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(moneda_control);
		
		} else if(moneda_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(moneda_control);
		
		}  else if(moneda_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(moneda_control);
		
		} else if(moneda_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(moneda_control);
		
		} else if(moneda_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(moneda_control);
		
		} else if(moneda_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(moneda_control);
		
		} else if(moneda_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(moneda_control);
		
		} else if(moneda_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(moneda_control);
		
		} else if(moneda_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(moneda_control);
		
		} else if(moneda_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(moneda_control);
		
		} else if(moneda_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(moneda_control);
		
		} else if(moneda_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(moneda_control);		
		
		} else if(moneda_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(moneda_control);		
		
		} else if(moneda_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(moneda_control);		
		
		} else if(moneda_control.action.includes("Busqueda") ||
				  moneda_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(moneda_control);
			
		} else if(moneda_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(moneda_control)
		}
		
		
		
	
		else if(moneda_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(moneda_control);	
		
		} else if(moneda_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(moneda_control);		
		}
	
		else if(moneda_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(moneda_control);		
		}
	
		else if(moneda_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(moneda_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + moneda_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(moneda_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(moneda_control) {
		this.actualizarPaginaAccionesGenerales(moneda_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(moneda_control) {
		
		this.actualizarPaginaCargaGeneral(moneda_control);
		this.actualizarPaginaOrderBy(moneda_control);
		this.actualizarPaginaTablaDatos(moneda_control);
		this.actualizarPaginaCargaGeneralControles(moneda_control);
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(moneda_control);
		this.actualizarPaginaAreaBusquedas(moneda_control);
		this.actualizarPaginaCargaCombosFK(moneda_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(moneda_control) {
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(moneda_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(moneda_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(moneda_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(moneda_control) {
		
		this.actualizarPaginaCargaGeneral(moneda_control);
		this.actualizarPaginaTablaDatos(moneda_control);
		this.actualizarPaginaCargaGeneralControles(moneda_control);
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(moneda_control);
		this.actualizarPaginaAreaBusquedas(moneda_control);
		this.actualizarPaginaCargaCombosFK(moneda_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		//this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		//this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		//this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(moneda_control) {
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(moneda_control) {
		this.actualizarPaginaAbrirLink(moneda_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);				
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);
		//this.actualizarPaginaFormulario(moneda_control);
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		//this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);
		//this.actualizarPaginaFormulario(moneda_control);
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(moneda_control) {
		//this.actualizarPaginaFormulario(moneda_control);
		this.onLoadCombosDefectoFK(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);
		//this.actualizarPaginaFormulario(moneda_control);
		this.onLoadCombosDefectoFK(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		//this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(moneda_control) {
		this.actualizarPaginaAbrirLink(moneda_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(moneda_control) {
					//super.actualizarPaginaImprimir(moneda_control,"moneda");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",moneda_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("moneda_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(moneda_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(moneda_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(moneda_control) {
		//super.actualizarPaginaImprimir(moneda_control,"moneda");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("moneda_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(moneda_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",moneda_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(moneda_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(moneda_control) {
		//super.actualizarPaginaImprimir(moneda_control,"moneda");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("moneda_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(moneda_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",moneda_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(moneda_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(moneda_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(moneda_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(moneda_control);
			
		this.actualizarPaginaAbrirLink(moneda_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(moneda_control) {
		this.actualizarPaginaTablaDatos(moneda_control);
		this.actualizarPaginaFormulario(moneda_control);
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(moneda_control) {
		
		if(moneda_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(moneda_control);
		}
		
		if(moneda_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(moneda_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(moneda_control) {
		if(moneda_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("monedaReturnGeneral",JSON.stringify(moneda_control.monedaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(moneda_control) {
		if(moneda_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && moneda_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(moneda_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(moneda_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(moneda_control, mostrar) {
		
		if(mostrar==true) {
			moneda_funcion1.resaltarRestaurarDivsPagina(false,"moneda");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				moneda_funcion1.resaltarRestaurarDivMantenimiento(false,"moneda");
			}			
			
			moneda_funcion1.mostrarDivMensaje(true,moneda_control.strAuxiliarMensaje,moneda_control.strAuxiliarCssMensaje);
		
		} else {
			moneda_funcion1.mostrarDivMensaje(false,moneda_control.strAuxiliarMensaje,moneda_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(moneda_control) {
		if(moneda_funcion1.esPaginaForm(moneda_constante1)==true) {
			window.opener.moneda_webcontrol1.actualizarPaginaTablaDatos(moneda_control);
		} else {
			this.actualizarPaginaTablaDatos(moneda_control);
		}
	}
	
	actualizarPaginaAbrirLink(moneda_control) {
		moneda_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(moneda_control.strAuxiliarUrlPagina);
				
		moneda_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(moneda_control.strAuxiliarTipo,moneda_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(moneda_control) {
		moneda_funcion1.resaltarRestaurarDivMensaje(true,moneda_control.strAuxiliarMensajeAlert,moneda_control.strAuxiliarCssMensaje);
			
		if(moneda_funcion1.esPaginaForm(moneda_constante1)==true) {
			window.opener.moneda_funcion1.resaltarRestaurarDivMensaje(true,moneda_control.strAuxiliarMensajeAlert,moneda_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(moneda_control) {
		this.moneda_controlInicial=moneda_control;
			
		if(moneda_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(moneda_control.strStyleDivArbol,moneda_control.strStyleDivContent
																,moneda_control.strStyleDivOpcionesBanner,moneda_control.strStyleDivExpandirColapsar
																,moneda_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=moneda_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",moneda_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(moneda_control) {
		this.actualizarCssBotonesPagina(moneda_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(moneda_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(moneda_control.tiposReportes,moneda_control.tiposReporte
															 	,moneda_control.tiposPaginacion,moneda_control.tiposAcciones
																,moneda_control.tiposColumnasSelect,moneda_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(moneda_control.tiposRelaciones,moneda_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(moneda_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(moneda_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(moneda_control);			
	}
	
	actualizarPaginaUsuarioInvitado(moneda_control) {
	
		var indexPosition=moneda_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=moneda_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(moneda_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(moneda_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTipos,",")) { 
				moneda_webcontrol1.cargarCombosempresasFK(moneda_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(moneda_control.strRecargarFkTiposNinguno!=null && moneda_control.strRecargarFkTiposNinguno!='NINGUNO' && moneda_control.strRecargarFkTiposNinguno!='') {
			
				if(moneda_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTiposNinguno,",")) { 
					moneda_webcontrol1.cargarCombosempresasFK(moneda_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(moneda_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,moneda_funcion1,moneda_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(moneda_control) {
		jQuery("#divBusquedamonedaAjaxWebPart").css("display",moneda_control.strPermisoBusqueda);
		jQuery("#trmonedaCabeceraBusquedas").css("display",moneda_control.strPermisoBusqueda);
		jQuery("#trBusquedamoneda").css("display",moneda_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(moneda_control.htmlTablaOrderBy!=null
			&& moneda_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBymonedaAjaxWebPart").html(moneda_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//moneda_webcontrol1.registrarOrderByActions();
			
		}
			
		if(moneda_control.htmlTablaOrderByRel!=null
			&& moneda_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelmonedaAjaxWebPart").html(moneda_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(moneda_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedamonedaAjaxWebPart").css("display","none");
			jQuery("#trmonedaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedamoneda").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(moneda_control) {
		
		if(!moneda_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(moneda_control);
		} else {
			jQuery("#divTablaDatosmonedasAjaxWebPart").html(moneda_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosmonedas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(moneda_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosmonedas=jQuery("#tblTablaDatosmonedas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("moneda",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',moneda_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			moneda_webcontrol1.registrarControlesTableEdition(moneda_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		moneda_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(moneda_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("moneda_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(moneda_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosmonedasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(moneda_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(moneda_control);
		
		const divOrderBy = document.getElementById("divOrderBymonedaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(moneda_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelmonedaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(moneda_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(moneda_control.monedaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(moneda_control);			
		}
	}
	
	actualizarCamposFilaTabla(moneda_control) {
		var i=0;
		
		i=moneda_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(moneda_control.monedaActual.id);
		jQuery("#t-version_row_"+i+"").val(moneda_control.monedaActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(moneda_control.monedaActual.versionRow);
		
		if(moneda_control.monedaActual.id_empresa!=null && moneda_control.monedaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != moneda_control.monedaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(moneda_control.monedaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(moneda_control.monedaActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(moneda_control.monedaActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(moneda_control.monedaActual.simbolo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(moneda_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelaciondevolucion_factura", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_lote").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelacionfactura_lote", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelacionestimado", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaestimados(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelaciondevolucion", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParadevoluciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelacionfactura", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParafacturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelacioncotizacion", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParacotizaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_general").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelacionparametro_general", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaparametro_generales(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacion").click(function(){
		jQuery("#tblTablaDatosmonedas").on("click",".imgrelacionconsignacion", function () {

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});				
	}
		
	

	registrarSesionParadevolucion_facturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","devolucion_factura","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"s","");
	}

	registrarSesionParafactura_lotees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","factura_lote","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"es","");
	}

	registrarSesionParaestimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","estimado","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"s","");
	}

	registrarSesionParadevoluciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","devolucion","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"es","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","orden_compra","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"s","");
	}

	registrarSesionParafacturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","factura","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"s","");
	}

	registrarSesionParacotizaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","cotizacion","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"es","");
	}

	registrarSesionParaparametro_generales(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","parametro_general","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"es","");
	}

	registrarSesionParaconsignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"moneda","consignacion","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1,"es","");
	}
	
	registrarControlesTableEdition(moneda_control) {
		moneda_funcion1.registrarControlesTableValidacionEdition(moneda_control,moneda_webcontrol1,moneda_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(moneda_control) {
		jQuery("#divResumenmonedaActualAjaxWebPart").html(moneda_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(moneda_control) {
		//jQuery("#divAccionesRelacionesmonedaAjaxWebPart").html(moneda_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("moneda_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(moneda_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesmonedaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		moneda_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(moneda_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(moneda_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(moneda_control) {
		
		if(moneda_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+moneda_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",moneda_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+moneda_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",moneda_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionmoneda();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("moneda",id,"contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		moneda_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("moneda","empresa","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondevolucion_factura").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});
		jQuery("#imgdivrelacionfactura_lote").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});
		jQuery("#imgdivrelacionestimado").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaestimados(idActual);
		});
		jQuery("#imgdivrelaciondevolucion").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParadevoluciones(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelacionfactura").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParafacturas(idActual);
		});
		jQuery("#imgdivrelacioncotizacion").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParacotizaciones(idActual);
		});
		jQuery("#imgdivrelacionparametro_general").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaparametro_generales(idActual);
		});
		jQuery("#imgdivrelacionconsignacion").click(function(){

			var idActual=jQuery(this).attr("idactualmoneda");

			moneda_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,monedaConstante,strParametros);
		
		//moneda_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(moneda_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa",moneda_control.empresasFK);

		if(moneda_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+moneda_control.idFilaTablaActual+"_3",moneda_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(moneda_control) {

	};

	
	
	setDefectoValorCombosempresasFK(moneda_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(moneda_control.idempresaDefaultFK>-1 && jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val() != moneda_control.idempresaDefaultFK) {
				jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val(moneda_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//moneda_control
		
	
	}
	
	onLoadCombosDefectoFK(moneda_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(moneda_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(moneda_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTipos,",")) { 
				moneda_webcontrol1.setDefectoValorCombosempresasFK(moneda_control);
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
	onLoadCombosEventosFK(moneda_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(moneda_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(moneda_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				moneda_webcontrol1.registrarComboActionChangeCombosempresasFK(moneda_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(moneda_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(moneda_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(moneda_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(moneda_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("moneda","FK_Idempresa","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
		
			
			if(moneda_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("moneda");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("moneda");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(moneda_funcion1,moneda_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(moneda_funcion1,moneda_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(moneda_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,"moneda");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				moneda_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("moneda");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(moneda_control) {
		
		jQuery("#divBusquedamonedaAjaxWebPart").css("display",moneda_control.strPermisoBusqueda);
		jQuery("#trmonedaCabeceraBusquedas").css("display",moneda_control.strPermisoBusqueda);
		jQuery("#trBusquedamoneda").css("display",moneda_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportemoneda").css("display",moneda_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosmoneda").attr("style",moneda_control.strPermisoMostrarTodos);		
		
		if(moneda_control.strPermisoNuevo!=null) {
			jQuery("#tdmonedaNuevo").css("display",moneda_control.strPermisoNuevo);
			jQuery("#tdmonedaNuevoToolBar").css("display",moneda_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdmonedaDuplicar").css("display",moneda_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmonedaDuplicarToolBar").css("display",moneda_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmonedaNuevoGuardarCambios").css("display",moneda_control.strPermisoNuevo);
			jQuery("#tdmonedaNuevoGuardarCambiosToolBar").css("display",moneda_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(moneda_control.strPermisoActualizar!=null) {
			jQuery("#tdmonedaCopiar").css("display",moneda_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmonedaCopiarToolBar").css("display",moneda_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmonedaConEditar").css("display",moneda_control.strPermisoActualizar);
		}
		
		jQuery("#tdmonedaGuardarCambios").css("display",moneda_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdmonedaGuardarCambiosToolBar").css("display",moneda_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdmonedaCerrarPagina").css("display",moneda_control.strPermisoPopup);		
		jQuery("#tdmonedaCerrarPaginaToolBar").css("display",moneda_control.strPermisoPopup);
		//jQuery("#trmonedaAccionesRelaciones").css("display",moneda_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=moneda_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + moneda_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + moneda_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Monedas";
		sTituloBanner+=" - " + moneda_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + moneda_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdmonedaRelacionesToolBar").css("display",moneda_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosmoneda").css("display",moneda_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		moneda_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		moneda_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		moneda_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		moneda_webcontrol1.registrarEventosControles();
		
		if(moneda_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(moneda_constante1.STR_ES_RELACIONADO=="false") {
			moneda_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(moneda_constante1.STR_ES_RELACIONES=="true") {
			if(moneda_constante1.BIT_ES_PAGINA_FORM==true) {
				moneda_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(moneda_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(moneda_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				moneda_webcontrol1.onLoad();
			
			//} else {
				//if(moneda_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			moneda_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);	
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

var moneda_webcontrol1 = new moneda_webcontrol();

//Para ser llamado desde otro archivo (import)
export {moneda_webcontrol,moneda_webcontrol1};

//Para ser llamado desde window.opener
window.moneda_webcontrol1 = moneda_webcontrol1;


if(moneda_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = moneda_webcontrol1.onLoadWindow; 
}

//</script>