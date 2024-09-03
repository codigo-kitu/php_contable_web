//<script type="text/javascript" language="javascript">



//var sistemaJQueryPaginaWebInteraccion= function (sistema_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {sistema_constante,sistema_constante1} from '../util/sistema_constante.js';

import {sistema_funcion,sistema_funcion1} from '../util/sistema_funcion.js';


class sistema_webcontrol extends GeneralEntityWebControl {
	
	sistema_control=null;
	sistema_controlInicial=null;
	sistema_controlAuxiliar=null;
		
	//if(sistema_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(sistema_control) {
		super();
		
		this.sistema_control=sistema_control;
	}
		
	actualizarVariablesPagina(sistema_control) {
		
		if(sistema_control.action=="index" || sistema_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(sistema_control);
			
		} 
		
		
		else if(sistema_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(sistema_control);
		
		} else if(sistema_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(sistema_control);
		
		} else if(sistema_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(sistema_control);
		
		} else if(sistema_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(sistema_control);
			
		} else if(sistema_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(sistema_control);
			
		} else if(sistema_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(sistema_control);
		
		} else if(sistema_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(sistema_control);		
		
		} else if(sistema_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(sistema_control);
		
		} else if(sistema_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(sistema_control);
		
		} else if(sistema_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(sistema_control);
		
		} else if(sistema_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(sistema_control);
		
		}  else if(sistema_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(sistema_control);
		
		} else if(sistema_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(sistema_control);
		
		} else if(sistema_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(sistema_control);
		
		} else if(sistema_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(sistema_control);
		
		} else if(sistema_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(sistema_control);
		
		} else if(sistema_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(sistema_control);
		
		} else if(sistema_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(sistema_control);
		
		} else if(sistema_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(sistema_control);
		
		} else if(sistema_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(sistema_control);
		
		} else if(sistema_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(sistema_control);		
		
		} else if(sistema_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(sistema_control);		
		
		} else if(sistema_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(sistema_control);		
		
		} else if(sistema_control.action.includes("Busqueda") ||
				  sistema_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(sistema_control);
			
		} else if(sistema_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(sistema_control)
		}
		
		
		
	
		else if(sistema_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(sistema_control);	
		
		} else if(sistema_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(sistema_control);		
		}
	
		else if(sistema_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(sistema_control);		
		}
	
		else if(sistema_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sistema_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + sistema_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(sistema_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(sistema_control) {
		this.actualizarPaginaAccionesGenerales(sistema_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(sistema_control) {
		
		this.actualizarPaginaCargaGeneral(sistema_control);
		this.actualizarPaginaOrderBy(sistema_control);
		this.actualizarPaginaTablaDatos(sistema_control);
		this.actualizarPaginaCargaGeneralControles(sistema_control);
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sistema_control);
		this.actualizarPaginaAreaBusquedas(sistema_control);
		this.actualizarPaginaCargaCombosFK(sistema_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(sistema_control) {
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(sistema_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sistema_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(sistema_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(sistema_control) {
		
		this.actualizarPaginaCargaGeneral(sistema_control);
		this.actualizarPaginaTablaDatos(sistema_control);
		this.actualizarPaginaCargaGeneralControles(sistema_control);
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sistema_control);
		this.actualizarPaginaAreaBusquedas(sistema_control);
		this.actualizarPaginaCargaCombosFK(sistema_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		//this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		//this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		//this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(sistema_control) {
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(sistema_control) {
		this.actualizarPaginaAbrirLink(sistema_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);				
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);
		//this.actualizarPaginaFormulario(sistema_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		//this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);
		//this.actualizarPaginaFormulario(sistema_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(sistema_control) {
		//this.actualizarPaginaFormulario(sistema_control);
		this.onLoadCombosDefectoFK(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);
		//this.actualizarPaginaFormulario(sistema_control);
		this.onLoadCombosDefectoFK(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		//this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(sistema_control) {
		this.actualizarPaginaAbrirLink(sistema_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(sistema_control) {
					//super.actualizarPaginaImprimir(sistema_control,"sistema");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sistema_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("sistema_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(sistema_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sistema_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(sistema_control) {
		//super.actualizarPaginaImprimir(sistema_control,"sistema");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("sistema_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(sistema_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sistema_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sistema_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(sistema_control) {
		//super.actualizarPaginaImprimir(sistema_control,"sistema");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("sistema_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(sistema_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sistema_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sistema_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(sistema_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(sistema_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(sistema_control);
			
		this.actualizarPaginaAbrirLink(sistema_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(sistema_control) {
		this.actualizarPaginaTablaDatos(sistema_control);
		this.actualizarPaginaFormulario(sistema_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(sistema_control) {
		
		if(sistema_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(sistema_control);
		}
		
		if(sistema_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(sistema_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(sistema_control) {
		if(sistema_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("sistemaReturnGeneral",JSON.stringify(sistema_control.sistemaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(sistema_control) {
		if(sistema_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && sistema_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(sistema_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(sistema_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(sistema_control, mostrar) {
		
		if(mostrar==true) {
			sistema_funcion1.resaltarRestaurarDivsPagina(false,"sistema");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				sistema_funcion1.resaltarRestaurarDivMantenimiento(false,"sistema");
			}			
			
			sistema_funcion1.mostrarDivMensaje(true,sistema_control.strAuxiliarMensaje,sistema_control.strAuxiliarCssMensaje);
		
		} else {
			sistema_funcion1.mostrarDivMensaje(false,sistema_control.strAuxiliarMensaje,sistema_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(sistema_control) {
		if(sistema_funcion1.esPaginaForm(sistema_constante1)==true) {
			window.opener.sistema_webcontrol1.actualizarPaginaTablaDatos(sistema_control);
		} else {
			this.actualizarPaginaTablaDatos(sistema_control);
		}
	}
	
	actualizarPaginaAbrirLink(sistema_control) {
		sistema_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(sistema_control.strAuxiliarUrlPagina);
				
		sistema_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(sistema_control.strAuxiliarTipo,sistema_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(sistema_control) {
		sistema_funcion1.resaltarRestaurarDivMensaje(true,sistema_control.strAuxiliarMensajeAlert,sistema_control.strAuxiliarCssMensaje);
			
		if(sistema_funcion1.esPaginaForm(sistema_constante1)==true) {
			window.opener.sistema_funcion1.resaltarRestaurarDivMensaje(true,sistema_control.strAuxiliarMensajeAlert,sistema_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(sistema_control) {
		this.sistema_controlInicial=sistema_control;
			
		if(sistema_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(sistema_control.strStyleDivArbol,sistema_control.strStyleDivContent
																,sistema_control.strStyleDivOpcionesBanner,sistema_control.strStyleDivExpandirColapsar
																,sistema_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=sistema_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",sistema_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(sistema_control) {
		this.actualizarCssBotonesPagina(sistema_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(sistema_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(sistema_control.tiposReportes,sistema_control.tiposReporte
															 	,sistema_control.tiposPaginacion,sistema_control.tiposAcciones
																,sistema_control.tiposColumnasSelect,sistema_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(sistema_control.tiposRelaciones,sistema_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(sistema_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(sistema_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(sistema_control);			
	}
	
	actualizarPaginaUsuarioInvitado(sistema_control) {
	
		var indexPosition=sistema_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=sistema_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(sistema_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(sistema_control.strRecargarFkTiposNinguno!=null && sistema_control.strRecargarFkTiposNinguno!='NINGUNO' && sistema_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(sistema_control) {
		jQuery("#divBusquedasistemaAjaxWebPart").css("display",sistema_control.strPermisoBusqueda);
		jQuery("#trsistemaCabeceraBusquedas").css("display",sistema_control.strPermisoBusqueda);
		jQuery("#trBusquedasistema").css("display",sistema_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(sistema_control.htmlTablaOrderBy!=null
			&& sistema_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBysistemaAjaxWebPart").html(sistema_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//sistema_webcontrol1.registrarOrderByActions();
			
		}
			
		if(sistema_control.htmlTablaOrderByRel!=null
			&& sistema_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelsistemaAjaxWebPart").html(sistema_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(sistema_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedasistemaAjaxWebPart").css("display","none");
			jQuery("#trsistemaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedasistema").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(sistema_control) {
		
		if(!sistema_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(sistema_control);
		} else {
			jQuery("#divTablaDatossistemasAjaxWebPart").html(sistema_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatossistemas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(sistema_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatossistemas=jQuery("#tblTablaDatossistemas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("sistema",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',sistema_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			sistema_webcontrol1.registrarControlesTableEdition(sistema_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		sistema_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(sistema_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("sistema_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(sistema_control);
		
		const divTablaDatos = document.getElementById("divTablaDatossistemasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(sistema_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(sistema_control);
		
		const divOrderBy = document.getElementById("divOrderBysistemaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(sistema_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelsistemaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(sistema_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(sistema_control.sistemaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(sistema_control);			
		}
	}
	
	actualizarCamposFilaTabla(sistema_control) {
		var i=0;
		
		i=sistema_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(sistema_control.sistemaActual.id);
		jQuery("#t-version_row_"+i+"").val(sistema_control.sistemaActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(sistema_control.sistemaActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(sistema_control.sistemaActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(sistema_control.sistemaActual.nombre_principal);
		jQuery("#t-cel_"+i+"_5").val(sistema_control.sistemaActual.nombre_secundario);
		jQuery("#t-cel_"+i+"_6").prop('checked',sistema_control.sistemaActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(sistema_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil").click(function(){
		jQuery("#tblTablaDatossistemas").on("click",".imgrelacionperfil", function () {

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParaperfiles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionopcion").click(function(){
		jQuery("#tblTablaDatossistemas").on("click",".imgrelacionopcion", function () {

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParaopciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionpaquete").click(function(){
		jQuery("#tblTablaDatossistemas").on("click",".imgrelacionpaquete", function () {

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParapaquetes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionmodulo").click(function(){
		jQuery("#tblTablaDatossistemas").on("click",".imgrelacionmodulo", function () {

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParamodulos(idActual);
		});				
	}
		
	

	registrarSesionParaperfiles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"sistema","perfil","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1,"es","");
	}

	registrarSesionParaopciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"sistema","opcion","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1,"es","");
	}

	registrarSesionParapaquetes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"sistema","paquete","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1,"s","");
	}

	registrarSesionParamodulos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"sistema","modulo","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1,"s","");
	}
	
	registrarControlesTableEdition(sistema_control) {
		sistema_funcion1.registrarControlesTableValidacionEdition(sistema_control,sistema_webcontrol1,sistema_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(sistema_control) {
		jQuery("#divResumensistemaActualAjaxWebPart").html(sistema_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(sistema_control) {
		//jQuery("#divAccionesRelacionessistemaAjaxWebPart").html(sistema_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("sistema_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(sistema_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionessistemaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		sistema_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(sistema_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(sistema_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(sistema_control) {
		
		if(sistema_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+sistema_constante1.STR_SUFIJO+"BusquedaPorNombrePrincipal").attr("style",sistema_control.strVisibleBusquedaPorNombrePrincipal);
			jQuery("#tblstrVisible"+sistema_constante1.STR_SUFIJO+"BusquedaPorNombrePrincipal").attr("style",sistema_control.strVisibleBusquedaPorNombrePrincipal);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionsistema();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("sistema",id,"seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil").click(function(){

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParaperfiles(idActual);
		});
		jQuery("#imgdivrelacionopcion").click(function(){

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParaopciones(idActual);
		});
		jQuery("#imgdivrelacionpaquete").click(function(){

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParapaquetes(idActual);
		});
		jQuery("#imgdivrelacionmodulo").click(function(){

			var idActual=jQuery(this).attr("idactualsistema");

			sistema_webcontrol1.registrarSesionParamodulos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistemaConstante,strParametros);
		
		//sistema_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//sistema_control
		
	
	}
	
	onLoadCombosDefectoFK(sistema_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sistema_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(sistema_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sistema_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(sistema_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sistema_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(sistema_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(sistema_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("sistema","BusquedaPorNombrePrincipal","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
		
			
			if(sistema_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("sistema");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("sistema");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(sistema_funcion1,sistema_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(sistema_funcion1,sistema_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(sistema_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,"sistema");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("sistema");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(sistema_control) {
		
		jQuery("#divBusquedasistemaAjaxWebPart").css("display",sistema_control.strPermisoBusqueda);
		jQuery("#trsistemaCabeceraBusquedas").css("display",sistema_control.strPermisoBusqueda);
		jQuery("#trBusquedasistema").css("display",sistema_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportesistema").css("display",sistema_control.strPermisoReporte);			
		jQuery("#tdMostrarTodossistema").attr("style",sistema_control.strPermisoMostrarTodos);		
		
		if(sistema_control.strPermisoNuevo!=null) {
			jQuery("#tdsistemaNuevo").css("display",sistema_control.strPermisoNuevo);
			jQuery("#tdsistemaNuevoToolBar").css("display",sistema_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdsistemaDuplicar").css("display",sistema_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsistemaDuplicarToolBar").css("display",sistema_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsistemaNuevoGuardarCambios").css("display",sistema_control.strPermisoNuevo);
			jQuery("#tdsistemaNuevoGuardarCambiosToolBar").css("display",sistema_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(sistema_control.strPermisoActualizar!=null) {
			jQuery("#tdsistemaCopiar").css("display",sistema_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsistemaCopiarToolBar").css("display",sistema_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsistemaConEditar").css("display",sistema_control.strPermisoActualizar);
		}
		
		jQuery("#tdsistemaGuardarCambios").css("display",sistema_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdsistemaGuardarCambiosToolBar").css("display",sistema_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdsistemaCerrarPagina").css("display",sistema_control.strPermisoPopup);		
		jQuery("#tdsistemaCerrarPaginaToolBar").css("display",sistema_control.strPermisoPopup);
		//jQuery("#trsistemaAccionesRelaciones").css("display",sistema_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=sistema_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sistema_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + sistema_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Sistemas";
		sTituloBanner+=" - " + sistema_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sistema_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdsistemaRelacionesToolBar").css("display",sistema_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultossistema").css("display",sistema_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		sistema_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		sistema_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		sistema_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		sistema_webcontrol1.registrarEventosControles();
		
		if(sistema_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(sistema_constante1.STR_ES_RELACIONADO=="false") {
			sistema_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(sistema_constante1.STR_ES_RELACIONES=="true") {
			if(sistema_constante1.BIT_ES_PAGINA_FORM==true) {
				sistema_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(sistema_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(sistema_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				sistema_webcontrol1.onLoad();
			
			//} else {
				//if(sistema_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			sistema_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);	
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

var sistema_webcontrol1 = new sistema_webcontrol();

//Para ser llamado desde otro archivo (import)
export {sistema_webcontrol,sistema_webcontrol1};

//Para ser llamado desde window.opener
window.sistema_webcontrol1 = sistema_webcontrol1;


if(sistema_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = sistema_webcontrol1.onLoadWindow; 
}

//</script>