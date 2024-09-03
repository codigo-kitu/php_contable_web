//<script type="text/javascript" language="javascript">



//var parametro_sqlJQueryPaginaWebInteraccion= function (parametro_sql_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_sql_constante,parametro_sql_constante1} from '../util/parametro_sql_constante.js';

import {parametro_sql_funcion,parametro_sql_funcion1} from '../util/parametro_sql_funcion.js';


class parametro_sql_webcontrol extends GeneralEntityWebControl {
	
	parametro_sql_control=null;
	parametro_sql_controlInicial=null;
	parametro_sql_controlAuxiliar=null;
		
	//if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_sql_control) {
		super();
		
		this.parametro_sql_control=parametro_sql_control;
	}
		
	actualizarVariablesPagina(parametro_sql_control) {
		
		if(parametro_sql_control.action=="index" || parametro_sql_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_sql_control);
			
		} 
		
		
		else if(parametro_sql_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_sql_control);
			
		} else if(parametro_sql_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_sql_control);
			
		} else if(parametro_sql_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_sql_control);		
		
		} else if(parametro_sql_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_sql_control);
		
		}  else if(parametro_sql_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_sql_control);		
		
		} else if(parametro_sql_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_sql_control);		
		
		} else if(parametro_sql_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_sql_control);		
		
		} else if(parametro_sql_control.action.includes("Busqueda") ||
				  parametro_sql_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(parametro_sql_control);
			
		} else if(parametro_sql_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_sql_control)
		}
		
		
		
	
		else if(parametro_sql_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_sql_control);	
		
		} else if(parametro_sql_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_sql_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_sql_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_sql_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_sql_control) {
		this.actualizarPaginaAccionesGenerales(parametro_sql_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_sql_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_sql_control);
		this.actualizarPaginaOrderBy(parametro_sql_control);
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control);
		this.actualizarPaginaAreaBusquedas(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_sql_control) {
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_sql_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_sql_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_sql_control);
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control);
		this.actualizarPaginaAreaBusquedas(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_sql_control) {
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_sql_control) {
		this.actualizarPaginaAbrirLink(parametro_sql_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);				
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		//this.actualizarPaginaFormulario(parametro_sql_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		//this.actualizarPaginaFormulario(parametro_sql_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_sql_control) {
		//this.actualizarPaginaFormulario(parametro_sql_control);
		this.onLoadCombosDefectoFK(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		//this.actualizarPaginaFormulario(parametro_sql_control);
		this.onLoadCombosDefectoFK(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_sql_control) {
		this.actualizarPaginaAbrirLink(parametro_sql_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_sql_control) {
		this.actualizarPaginaTablaDatos(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_sql_control) {
					//super.actualizarPaginaImprimir(parametro_sql_control,"parametro_sql");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_sql_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("parametro_sql_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_sql_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_sql_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_sql_control) {
		//super.actualizarPaginaImprimir(parametro_sql_control,"parametro_sql");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("parametro_sql_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(parametro_sql_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_sql_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_sql_control) {
		//super.actualizarPaginaImprimir(parametro_sql_control,"parametro_sql");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("parametro_sql_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_sql_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_sql_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_sql_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_sql_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_sql_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(parametro_sql_control);
			
		this.actualizarPaginaAbrirLink(parametro_sql_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_sql_control) {
		
		if(parametro_sql_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_sql_control);
		}
		
		if(parametro_sql_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_sql_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_sql_control) {
		if(parametro_sql_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_sqlReturnGeneral",JSON.stringify(parametro_sql_control.parametro_sqlReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control) {
		if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_sql_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_sql_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_sql_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_sql_control, mostrar) {
		
		if(mostrar==true) {
			parametro_sql_funcion1.resaltarRestaurarDivsPagina(false,"parametro_sql");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_sql_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_sql");
			}			
			
			parametro_sql_funcion1.mostrarDivMensaje(true,parametro_sql_control.strAuxiliarMensaje,parametro_sql_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_sql_funcion1.mostrarDivMensaje(false,parametro_sql_control.strAuxiliarMensaje,parametro_sql_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_sql_control) {
		if(parametro_sql_funcion1.esPaginaForm(parametro_sql_constante1)==true) {
			window.opener.parametro_sql_webcontrol1.actualizarPaginaTablaDatos(parametro_sql_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_sql_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_sql_control) {
		parametro_sql_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_sql_control.strAuxiliarUrlPagina);
				
		parametro_sql_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_sql_control.strAuxiliarTipo,parametro_sql_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_sql_control) {
		parametro_sql_funcion1.resaltarRestaurarDivMensaje(true,parametro_sql_control.strAuxiliarMensajeAlert,parametro_sql_control.strAuxiliarCssMensaje);
			
		if(parametro_sql_funcion1.esPaginaForm(parametro_sql_constante1)==true) {
			window.opener.parametro_sql_funcion1.resaltarRestaurarDivMensaje(true,parametro_sql_control.strAuxiliarMensajeAlert,parametro_sql_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_sql_control) {
		this.parametro_sql_controlInicial=parametro_sql_control;
			
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_sql_control.strStyleDivArbol,parametro_sql_control.strStyleDivContent
																,parametro_sql_control.strStyleDivOpcionesBanner,parametro_sql_control.strStyleDivExpandirColapsar
																,parametro_sql_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_sql_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_sql_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_sql_control) {
		this.actualizarCssBotonesPagina(parametro_sql_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_sql_control.tiposReportes,parametro_sql_control.tiposReporte
															 	,parametro_sql_control.tiposPaginacion,parametro_sql_control.tiposAcciones
																,parametro_sql_control.tiposColumnasSelect,parametro_sql_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_sql_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_sql_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_sql_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_sql_control) {
	
		var indexPosition=parametro_sql_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_sql_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_sql_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_sql_control.strRecargarFkTiposNinguno!=null && parametro_sql_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_sql_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(parametro_sql_control) {
		jQuery("#divBusquedaparametro_sqlAjaxWebPart").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trparametro_sqlCabeceraBusquedas").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_sql").css("display",parametro_sql_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_sql_control.htmlTablaOrderBy!=null
			&& parametro_sql_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_sqlAjaxWebPart").html(parametro_sql_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_sql_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_sql_control.htmlTablaOrderByRel!=null
			&& parametro_sql_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_sqlAjaxWebPart").html(parametro_sql_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_sqlAjaxWebPart").css("display","none");
			jQuery("#trparametro_sqlCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_sql").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(parametro_sql_control) {
		
		if(!parametro_sql_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(parametro_sql_control);
		} else {
			jQuery("#divTablaDatosparametro_sqlsAjaxWebPart").html(parametro_sql_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_sqls=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_sqls=jQuery("#tblTablaDatosparametro_sqls").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_sql",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_sql_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_sql_webcontrol1.registrarControlesTableEdition(parametro_sql_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_sql_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(parametro_sql_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("parametro_sql_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_sql_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosparametro_sqlsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(parametro_sql_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(parametro_sql_control);
		
		const divOrderBy = document.getElementById("divOrderByparametro_sqlAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(parametro_sql_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelparametro_sqlAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(parametro_sql_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_sql_control.parametro_sqlActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_sql_control);			
		}
	}
	
	actualizarCamposFilaTabla(parametro_sql_control) {
		var i=0;
		
		i=parametro_sql_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_sql_control.parametro_sqlActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_sql_control.parametro_sqlActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(parametro_sql_control.parametro_sqlActual.binario1);
		jQuery("#t-cel_"+i+"_3").val(parametro_sql_control.parametro_sqlActual.binario2);
		jQuery("#t-cel_"+i+"_4").val(parametro_sql_control.parametro_sqlActual.binario3);
		jQuery("#t-cel_"+i+"_5").val(parametro_sql_control.parametro_sqlActual.binario4);
		jQuery("#t-cel_"+i+"_6").val(parametro_sql_control.parametro_sqlActual.binario5);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_sql_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_sql_control) {
		parametro_sql_funcion1.registrarControlesTableValidacionEdition(parametro_sql_control,parametro_sql_webcontrol1,parametro_sql_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_sql_control) {
		jQuery("#divResumenparametro_sqlActualAjaxWebPart").html(parametro_sql_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_sql_control) {
		//jQuery("#divAccionesRelacionesparametro_sqlAjaxWebPart").html(parametro_sql_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("parametro_sql_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_sql_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesparametro_sqlAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		parametro_sql_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_sql_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_sql_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_sql();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_sql",id,"general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sqlConstante,strParametros);
		
		//parametro_sql_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_sql_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_sql_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
			
			
		
			
			if(parametro_sql_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_sql");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_sql");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_sql_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,"parametro_sql");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_sql_control) {
		
		jQuery("#divBusquedaparametro_sqlAjaxWebPart").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trparametro_sqlCabeceraBusquedas").css("display",parametro_sql_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_sql").css("display",parametro_sql_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_sql").css("display",parametro_sql_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_sql").attr("style",parametro_sql_control.strPermisoMostrarTodos);		
		
		if(parametro_sql_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_sqlNuevo").css("display",parametro_sql_control.strPermisoNuevo);
			jQuery("#tdparametro_sqlNuevoToolBar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_sqlDuplicar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_sqlDuplicarToolBar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_sqlNuevoGuardarCambios").css("display",parametro_sql_control.strPermisoNuevo);
			jQuery("#tdparametro_sqlNuevoGuardarCambiosToolBar").css("display",parametro_sql_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_sql_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_sqlCopiar").css("display",parametro_sql_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_sqlCopiarToolBar").css("display",parametro_sql_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_sqlConEditar").css("display",parametro_sql_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_sqlGuardarCambios").css("display",parametro_sql_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_sqlGuardarCambiosToolBar").css("display",parametro_sql_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdparametro_sqlCerrarPagina").css("display",parametro_sql_control.strPermisoPopup);		
		jQuery("#tdparametro_sqlCerrarPaginaToolBar").css("display",parametro_sql_control.strPermisoPopup);
		//jQuery("#trparametro_sqlAccionesRelaciones").css("display",parametro_sql_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_sql_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_sql_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_sql_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametros Sqles";
		sTituloBanner+=" - " + parametro_sql_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_sql_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_sqlRelacionesToolBar").css("display",parametro_sql_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_sql").css("display",parametro_sql_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_sql_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_sql_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_sql_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_sql_webcontrol1.registrarEventosControles();
		
		if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			parametro_sql_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_sql_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_sql_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_sql_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_sql_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_sql_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_sql_webcontrol1.onLoad();
			
			//} else {
				//if(parametro_sql_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			parametro_sql_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);	
	}
}

var parametro_sql_webcontrol1 = new parametro_sql_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_sql_webcontrol,parametro_sql_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_sql_webcontrol1 = parametro_sql_webcontrol1;


if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_sql_webcontrol1.onLoadWindow; 
}

//</script>