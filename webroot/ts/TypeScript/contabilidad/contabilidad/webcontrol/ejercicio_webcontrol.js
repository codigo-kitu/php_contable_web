//<script type="text/javascript" language="javascript">



//var ejercicioJQueryPaginaWebInteraccion= function (ejercicio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {ejercicio_constante,ejercicio_constante1} from '../util/ejercicio_constante.js';

import {ejercicio_funcion,ejercicio_funcion1} from '../util/ejercicio_funcion.js';


class ejercicio_webcontrol extends GeneralEntityWebControl {
	
	ejercicio_control=null;
	ejercicio_controlInicial=null;
	ejercicio_controlAuxiliar=null;
		
	//if(ejercicio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(ejercicio_control) {
		super();
		
		this.ejercicio_control=ejercicio_control;
	}
		
	actualizarVariablesPagina(ejercicio_control) {
		
		if(ejercicio_control.action=="index" || ejercicio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(ejercicio_control);
			
		} 
		
		
		else if(ejercicio_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(ejercicio_control);
		
		} else if(ejercicio_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(ejercicio_control);
		
		} else if(ejercicio_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(ejercicio_control);
		
		} else if(ejercicio_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(ejercicio_control);
			
		} else if(ejercicio_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(ejercicio_control);
			
		} else if(ejercicio_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(ejercicio_control);
		
		} else if(ejercicio_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(ejercicio_control);		
		
		} else if(ejercicio_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(ejercicio_control);
		
		} else if(ejercicio_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(ejercicio_control);
		
		} else if(ejercicio_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(ejercicio_control);
		
		} else if(ejercicio_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(ejercicio_control);
		
		}  else if(ejercicio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(ejercicio_control);
		
		} else if(ejercicio_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(ejercicio_control);
		
		} else if(ejercicio_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(ejercicio_control);
		
		} else if(ejercicio_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(ejercicio_control);
		
		} else if(ejercicio_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ejercicio_control);		
		
		} else if(ejercicio_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(ejercicio_control);		
		
		} else if(ejercicio_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(ejercicio_control);		
		
		} else if(ejercicio_control.action.includes("Busqueda") ||
				  ejercicio_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(ejercicio_control);
			
		} else if(ejercicio_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(ejercicio_control)
		}
		
		
		
	
		else if(ejercicio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(ejercicio_control);	
		
		} else if(ejercicio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(ejercicio_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + ejercicio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(ejercicio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(ejercicio_control) {
		this.actualizarPaginaAccionesGenerales(ejercicio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(ejercicio_control) {
		
		this.actualizarPaginaCargaGeneral(ejercicio_control);
		this.actualizarPaginaOrderBy(ejercicio_control);
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control);
		this.actualizarPaginaAreaBusquedas(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(ejercicio_control) {
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(ejercicio_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(ejercicio_control) {
		
		this.actualizarPaginaCargaGeneral(ejercicio_control);
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control);
		this.actualizarPaginaAreaBusquedas(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		//this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		//this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		//this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(ejercicio_control) {
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ejercicio_control) {
		this.actualizarPaginaAbrirLink(ejercicio_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);				
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);
		//this.actualizarPaginaFormulario(ejercicio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		//this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);
		//this.actualizarPaginaFormulario(ejercicio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(ejercicio_control) {
		//this.actualizarPaginaFormulario(ejercicio_control);
		this.onLoadCombosDefectoFK(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);
		//this.actualizarPaginaFormulario(ejercicio_control);
		this.onLoadCombosDefectoFK(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		//this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ejercicio_control) {
		this.actualizarPaginaAbrirLink(ejercicio_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(ejercicio_control) {
		this.actualizarPaginaTablaDatos(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(ejercicio_control) {
					//super.actualizarPaginaImprimir(ejercicio_control,"ejercicio");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",ejercicio_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("ejercicio_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(ejercicio_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(ejercicio_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ejercicio_control) {
		//super.actualizarPaginaImprimir(ejercicio_control,"ejercicio");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("ejercicio_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(ejercicio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",ejercicio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(ejercicio_control) {
		//super.actualizarPaginaImprimir(ejercicio_control,"ejercicio");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("ejercicio_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(ejercicio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",ejercicio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(ejercicio_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(ejercicio_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(ejercicio_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(ejercicio_control);
			
		this.actualizarPaginaAbrirLink(ejercicio_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(ejercicio_control) {
		
		if(ejercicio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(ejercicio_control);
		}
		
		if(ejercicio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(ejercicio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(ejercicio_control) {
		if(ejercicio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("ejercicioReturnGeneral",JSON.stringify(ejercicio_control.ejercicioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(ejercicio_control) {
		if(ejercicio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ejercicio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(ejercicio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(ejercicio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(ejercicio_control, mostrar) {
		
		if(mostrar==true) {
			ejercicio_funcion1.resaltarRestaurarDivsPagina(false,"ejercicio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				ejercicio_funcion1.resaltarRestaurarDivMantenimiento(false,"ejercicio");
			}			
			
			ejercicio_funcion1.mostrarDivMensaje(true,ejercicio_control.strAuxiliarMensaje,ejercicio_control.strAuxiliarCssMensaje);
		
		} else {
			ejercicio_funcion1.mostrarDivMensaje(false,ejercicio_control.strAuxiliarMensaje,ejercicio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(ejercicio_control) {
		if(ejercicio_funcion1.esPaginaForm(ejercicio_constante1)==true) {
			window.opener.ejercicio_webcontrol1.actualizarPaginaTablaDatos(ejercicio_control);
		} else {
			this.actualizarPaginaTablaDatos(ejercicio_control);
		}
	}
	
	actualizarPaginaAbrirLink(ejercicio_control) {
		ejercicio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(ejercicio_control.strAuxiliarUrlPagina);
				
		ejercicio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(ejercicio_control.strAuxiliarTipo,ejercicio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(ejercicio_control) {
		ejercicio_funcion1.resaltarRestaurarDivMensaje(true,ejercicio_control.strAuxiliarMensajeAlert,ejercicio_control.strAuxiliarCssMensaje);
			
		if(ejercicio_funcion1.esPaginaForm(ejercicio_constante1)==true) {
			window.opener.ejercicio_funcion1.resaltarRestaurarDivMensaje(true,ejercicio_control.strAuxiliarMensajeAlert,ejercicio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(ejercicio_control) {
		this.ejercicio_controlInicial=ejercicio_control;
			
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(ejercicio_control.strStyleDivArbol,ejercicio_control.strStyleDivContent
																,ejercicio_control.strStyleDivOpcionesBanner,ejercicio_control.strStyleDivExpandirColapsar
																,ejercicio_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=ejercicio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",ejercicio_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(ejercicio_control) {
		this.actualizarCssBotonesPagina(ejercicio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(ejercicio_control.tiposReportes,ejercicio_control.tiposReporte
															 	,ejercicio_control.tiposPaginacion,ejercicio_control.tiposAcciones
																,ejercicio_control.tiposColumnasSelect,ejercicio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(ejercicio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(ejercicio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(ejercicio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(ejercicio_control) {
	
		var indexPosition=ejercicio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=ejercicio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(ejercicio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(ejercicio_control.strRecargarFkTiposNinguno!=null && ejercicio_control.strRecargarFkTiposNinguno!='NINGUNO' && ejercicio_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(ejercicio_control) {
		jQuery("#divBusquedaejercicioAjaxWebPart").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trejercicioCabeceraBusquedas").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trBusquedaejercicio").css("display",ejercicio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(ejercicio_control.htmlTablaOrderBy!=null
			&& ejercicio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByejercicioAjaxWebPart").html(ejercicio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//ejercicio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(ejercicio_control.htmlTablaOrderByRel!=null
			&& ejercicio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelejercicioAjaxWebPart").html(ejercicio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(ejercicio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaejercicioAjaxWebPart").css("display","none");
			jQuery("#trejercicioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaejercicio").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(ejercicio_control) {
		
		if(!ejercicio_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(ejercicio_control);
		} else {
			jQuery("#divTablaDatosejerciciosAjaxWebPart").html(ejercicio_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosejercicios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosejercicios=jQuery("#tblTablaDatosejercicios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("ejercicio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',ejercicio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			ejercicio_webcontrol1.registrarControlesTableEdition(ejercicio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		ejercicio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(ejercicio_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("ejercicio_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(ejercicio_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosejerciciosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(ejercicio_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(ejercicio_control);
		
		const divOrderBy = document.getElementById("divOrderByejercicioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(ejercicio_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelejercicioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(ejercicio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(ejercicio_control.ejercicioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(ejercicio_control);			
		}
	}
	
	actualizarCamposFilaTabla(ejercicio_control) {
		var i=0;
		
		i=ejercicio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(ejercicio_control.ejercicioActual.id);
		jQuery("#t-version_row_"+i+"").val(ejercicio_control.ejercicioActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(ejercicio_control.ejercicioActual.fecha_inicio);
		jQuery("#t-cel_"+i+"_3").val(ejercicio_control.ejercicioActual.fecha_fin);
		jQuery("#t-cel_"+i+"_4").val(ejercicio_control.ejercicioActual.descripcion);
		jQuery("#t-cel_"+i+"_5").prop('checked',ejercicio_control.ejercicioActual.activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(ejercicio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(ejercicio_control) {
		ejercicio_funcion1.registrarControlesTableValidacionEdition(ejercicio_control,ejercicio_webcontrol1,ejercicio_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(ejercicio_control) {
		jQuery("#divResumenejercicioActualAjaxWebPart").html(ejercicio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(ejercicio_control) {
		//jQuery("#divAccionesRelacionesejercicioAjaxWebPart").html(ejercicio_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("ejercicio_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(ejercicio_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesejercicioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		ejercicio_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(ejercicio_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(ejercicio_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionejercicio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("ejercicio",id,"contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicioConstante,strParametros);
		
		//ejercicio_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//ejercicio_control
		
	
	}
	
	onLoadCombosDefectoFK(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(ejercicio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(ejercicio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
			
			
		
			
			if(ejercicio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("ejercicio");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("ejercicio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(ejercicio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,"ejercicio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(ejercicio_control) {
		
		jQuery("#divBusquedaejercicioAjaxWebPart").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trejercicioCabeceraBusquedas").css("display",ejercicio_control.strPermisoBusqueda);
		jQuery("#trBusquedaejercicio").css("display",ejercicio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteejercicio").css("display",ejercicio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosejercicio").attr("style",ejercicio_control.strPermisoMostrarTodos);		
		
		if(ejercicio_control.strPermisoNuevo!=null) {
			jQuery("#tdejercicioNuevo").css("display",ejercicio_control.strPermisoNuevo);
			jQuery("#tdejercicioNuevoToolBar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdejercicioDuplicar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdejercicioDuplicarToolBar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdejercicioNuevoGuardarCambios").css("display",ejercicio_control.strPermisoNuevo);
			jQuery("#tdejercicioNuevoGuardarCambiosToolBar").css("display",ejercicio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(ejercicio_control.strPermisoActualizar!=null) {
			jQuery("#tdejercicioCopiar").css("display",ejercicio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdejercicioCopiarToolBar").css("display",ejercicio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdejercicioConEditar").css("display",ejercicio_control.strPermisoActualizar);
		}
		
		jQuery("#tdejercicioGuardarCambios").css("display",ejercicio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdejercicioGuardarCambiosToolBar").css("display",ejercicio_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdejercicioCerrarPagina").css("display",ejercicio_control.strPermisoPopup);		
		jQuery("#tdejercicioCerrarPaginaToolBar").css("display",ejercicio_control.strPermisoPopup);
		//jQuery("#trejercicioAccionesRelaciones").css("display",ejercicio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=ejercicio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ejercicio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + ejercicio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " ejercicios";
		sTituloBanner+=" - " + ejercicio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ejercicio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdejercicioRelacionesToolBar").css("display",ejercicio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosejercicio").css("display",ejercicio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		ejercicio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		ejercicio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		ejercicio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		ejercicio_webcontrol1.registrarEventosControles();
		
		if(ejercicio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			ejercicio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(ejercicio_constante1.STR_ES_RELACIONES=="true") {
			if(ejercicio_constante1.BIT_ES_PAGINA_FORM==true) {
				ejercicio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(ejercicio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(ejercicio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				ejercicio_webcontrol1.onLoad();
			
			//} else {
				//if(ejercicio_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			ejercicio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);	
	}
}

var ejercicio_webcontrol1 = new ejercicio_webcontrol();

//Para ser llamado desde otro archivo (import)
export {ejercicio_webcontrol,ejercicio_webcontrol1};

//Para ser llamado desde window.opener
window.ejercicio_webcontrol1 = ejercicio_webcontrol1;


if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = ejercicio_webcontrol1.onLoadWindow; 
}

//</script>