//<script type="text/javascript" language="javascript">



//var ciudadJQueryPaginaWebInteraccion= function (ciudad_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {ciudad_constante,ciudad_constante1} from '../util/ciudad_constante.js';

import {ciudad_funcion,ciudad_funcion1} from '../util/ciudad_funcion.js';


class ciudad_webcontrol extends GeneralEntityWebControl {
	
	ciudad_control=null;
	ciudad_controlInicial=null;
	ciudad_controlAuxiliar=null;
		
	//if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(ciudad_control) {
		super();
		
		this.ciudad_control=ciudad_control;
	}
		
	actualizarVariablesPagina(ciudad_control) {
		
		if(ciudad_control.action=="index" || ciudad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(ciudad_control);
			
		} 
		
		
		else if(ciudad_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(ciudad_control);
		
		} else if(ciudad_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(ciudad_control);
		
		} else if(ciudad_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(ciudad_control);
		
		} else if(ciudad_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(ciudad_control);
			
		} else if(ciudad_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(ciudad_control);
			
		} else if(ciudad_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(ciudad_control);
		
		} else if(ciudad_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(ciudad_control);		
		
		} else if(ciudad_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(ciudad_control);
		
		} else if(ciudad_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(ciudad_control);
		
		} else if(ciudad_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(ciudad_control);
		
		} else if(ciudad_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(ciudad_control);
		
		}  else if(ciudad_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(ciudad_control);
		
		} else if(ciudad_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(ciudad_control);
		
		} else if(ciudad_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(ciudad_control);
		
		} else if(ciudad_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(ciudad_control);
		
		} else if(ciudad_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ciudad_control);		
		
		} else if(ciudad_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(ciudad_control);		
		
		} else if(ciudad_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(ciudad_control);		
		
		} else if(ciudad_control.action.includes("Busqueda") ||
				  ciudad_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(ciudad_control);
			
		} else if(ciudad_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(ciudad_control)
		}
		
		
		
	
		else if(ciudad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(ciudad_control);	
		
		} else if(ciudad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(ciudad_control);		
		}
	
		else if(ciudad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(ciudad_control);		
		}
	
		else if(ciudad_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(ciudad_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + ciudad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(ciudad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(ciudad_control) {
		this.actualizarPaginaAccionesGenerales(ciudad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(ciudad_control) {
		
		this.actualizarPaginaCargaGeneral(ciudad_control);
		this.actualizarPaginaOrderBy(ciudad_control);
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ciudad_control);
		this.actualizarPaginaAreaBusquedas(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(ciudad_control) {
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(ciudad_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(ciudad_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(ciudad_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(ciudad_control) {
		
		this.actualizarPaginaCargaGeneral(ciudad_control);
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ciudad_control);
		this.actualizarPaginaAreaBusquedas(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		//this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		//this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		//this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(ciudad_control) {
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(ciudad_control) {
		this.actualizarPaginaAbrirLink(ciudad_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);				
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		//this.actualizarPaginaFormulario(ciudad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		//this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		//this.actualizarPaginaFormulario(ciudad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(ciudad_control) {
		//this.actualizarPaginaFormulario(ciudad_control);
		this.onLoadCombosDefectoFK(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		//this.actualizarPaginaFormulario(ciudad_control);
		this.onLoadCombosDefectoFK(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		//this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(ciudad_control) {
		this.actualizarPaginaAbrirLink(ciudad_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(ciudad_control) {
					//super.actualizarPaginaImprimir(ciudad_control,"ciudad");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",ciudad_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("ciudad_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(ciudad_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(ciudad_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(ciudad_control) {
		//super.actualizarPaginaImprimir(ciudad_control,"ciudad");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("ciudad_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(ciudad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",ciudad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(ciudad_control) {
		//super.actualizarPaginaImprimir(ciudad_control,"ciudad");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("ciudad_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(ciudad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",ciudad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(ciudad_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(ciudad_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(ciudad_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(ciudad_control);
			
		this.actualizarPaginaAbrirLink(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(ciudad_control) {
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(ciudad_control) {
		
		if(ciudad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(ciudad_control);
		}
		
		if(ciudad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(ciudad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(ciudad_control) {
		if(ciudad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("ciudadReturnGeneral",JSON.stringify(ciudad_control.ciudadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(ciudad_control) {
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ciudad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(ciudad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(ciudad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(ciudad_control, mostrar) {
		
		if(mostrar==true) {
			ciudad_funcion1.resaltarRestaurarDivsPagina(false,"ciudad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				ciudad_funcion1.resaltarRestaurarDivMantenimiento(false,"ciudad");
			}			
			
			ciudad_funcion1.mostrarDivMensaje(true,ciudad_control.strAuxiliarMensaje,ciudad_control.strAuxiliarCssMensaje);
		
		} else {
			ciudad_funcion1.mostrarDivMensaje(false,ciudad_control.strAuxiliarMensaje,ciudad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(ciudad_control) {
		if(ciudad_funcion1.esPaginaForm(ciudad_constante1)==true) {
			window.opener.ciudad_webcontrol1.actualizarPaginaTablaDatos(ciudad_control);
		} else {
			this.actualizarPaginaTablaDatos(ciudad_control);
		}
	}
	
	actualizarPaginaAbrirLink(ciudad_control) {
		ciudad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(ciudad_control.strAuxiliarUrlPagina);
				
		ciudad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(ciudad_control.strAuxiliarTipo,ciudad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(ciudad_control) {
		ciudad_funcion1.resaltarRestaurarDivMensaje(true,ciudad_control.strAuxiliarMensajeAlert,ciudad_control.strAuxiliarCssMensaje);
			
		if(ciudad_funcion1.esPaginaForm(ciudad_constante1)==true) {
			window.opener.ciudad_funcion1.resaltarRestaurarDivMensaje(true,ciudad_control.strAuxiliarMensajeAlert,ciudad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(ciudad_control) {
		this.ciudad_controlInicial=ciudad_control;
			
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(ciudad_control.strStyleDivArbol,ciudad_control.strStyleDivContent
																,ciudad_control.strStyleDivOpcionesBanner,ciudad_control.strStyleDivExpandirColapsar
																,ciudad_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=ciudad_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",ciudad_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(ciudad_control) {
		this.actualizarCssBotonesPagina(ciudad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(ciudad_control.tiposReportes,ciudad_control.tiposReporte
															 	,ciudad_control.tiposPaginacion,ciudad_control.tiposAcciones
																,ciudad_control.tiposColumnasSelect,ciudad_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(ciudad_control.tiposRelaciones,ciudad_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(ciudad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(ciudad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(ciudad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(ciudad_control) {
	
		var indexPosition=ciudad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=ciudad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(ciudad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 
				ciudad_webcontrol1.cargarCombosprovinciasFK(ciudad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(ciudad_control.strRecargarFkTiposNinguno!=null && ciudad_control.strRecargarFkTiposNinguno!='NINGUNO' && ciudad_control.strRecargarFkTiposNinguno!='') {
			
				if(ciudad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTiposNinguno,",")) { 
					ciudad_webcontrol1.cargarCombosprovinciasFK(ciudad_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaprovinciaFK(ciudad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,ciudad_funcion1,ciudad_control.provinciasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(ciudad_control) {
		jQuery("#divBusquedaciudadAjaxWebPart").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trciudadCabeceraBusquedas").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trBusquedaciudad").css("display",ciudad_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(ciudad_control.htmlTablaOrderBy!=null
			&& ciudad_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByciudadAjaxWebPart").html(ciudad_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//ciudad_webcontrol1.registrarOrderByActions();
			
		}
			
		if(ciudad_control.htmlTablaOrderByRel!=null
			&& ciudad_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelciudadAjaxWebPart").html(ciudad_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(ciudad_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaciudadAjaxWebPart").css("display","none");
			jQuery("#trciudadCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaciudad").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(ciudad_control) {
		
		if(!ciudad_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(ciudad_control);
		} else {
			jQuery("#divTablaDatosciudadsAjaxWebPart").html(ciudad_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosciudads=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosciudads=jQuery("#tblTablaDatosciudads").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("ciudad",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',ciudad_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			ciudad_webcontrol1.registrarControlesTableEdition(ciudad_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		ciudad_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(ciudad_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("ciudad_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(ciudad_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosciudadsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(ciudad_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(ciudad_control);
		
		const divOrderBy = document.getElementById("divOrderByciudadAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(ciudad_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelciudadAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(ciudad_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(ciudad_control.ciudadActual!=null) {//form
			
			this.actualizarCamposFilaTabla(ciudad_control);			
		}
	}
	
	actualizarCamposFilaTabla(ciudad_control) {
		var i=0;
		
		i=ciudad_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(ciudad_control.ciudadActual.id);
		jQuery("#t-version_row_"+i+"").val(ciudad_control.ciudadActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(ciudad_control.ciudadActual.versionRow);
		
		if(ciudad_control.ciudadActual.id_provincia!=null && ciudad_control.ciudadActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != ciudad_control.ciudadActual.id_provincia) {
				jQuery("#t-cel_"+i+"_3").val(ciudad_control.ciudadActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(ciudad_control.ciudadActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(ciudad_control.ciudadActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(ciudad_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondato_general_usuario").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelaciondato_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionsucursal").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacionsucursal", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParasucursals(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionempresa").click(function(){
		jQuery("#tblTablaDatosciudads").on("click",".imgrelacionempresa", function () {

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaempresas(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","proveedor","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1,"es","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","cliente","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1,"s","");
	}

	registrarSesionParadato_general_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","dato_general_usuario","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1,"s","");
	}

	registrarSesionParasucursals(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","sucursal","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1,"s","");
	}

	registrarSesionParaempresas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"ciudad","empresa","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1,"s","");
	}
	
	registrarControlesTableEdition(ciudad_control) {
		ciudad_funcion1.registrarControlesTableValidacionEdition(ciudad_control,ciudad_webcontrol1,ciudad_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(ciudad_control) {
		jQuery("#divResumenciudadActualAjaxWebPart").html(ciudad_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(ciudad_control) {
		//jQuery("#divAccionesRelacionesciudadAjaxWebPart").html(ciudad_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("ciudad_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(ciudad_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesciudadAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		ciudad_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(ciudad_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(ciudad_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(ciudad_control) {
		
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",ciudad_control.strVisibleBusquedaPorCodigo);
			jQuery("#tblstrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",ciudad_control.strVisibleBusquedaPorCodigo);
		}

		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",ciudad_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+ciudad_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",ciudad_control.strVisibleBusquedaPorNombre);
		}

		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",ciudad_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",ciudad_control.strVisibleFK_Idprovincia);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionciudad();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("ciudad",id,"seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);		
	}
	
	

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		ciudad_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("ciudad","provincia","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelaciondato_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});
		jQuery("#imgdivrelacionsucursal").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParasucursals(idActual);
		});
		jQuery("#imgdivrelacionempresa").click(function(){

			var idActual=jQuery(this).attr("idactualciudad");

			ciudad_webcontrol1.registrarSesionParaempresas(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudadConstante,strParametros);
		
		//ciudad_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosprovinciasFK(ciudad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia",ciudad_control.provinciasFK);

		if(ciudad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+ciudad_control.idFilaTablaActual+"_3",ciudad_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",ciudad_control.provinciasFK);

	};

	
	
	registrarComboActionChangeCombosprovinciasFK(ciudad_control) {

	};

	
	
	setDefectoValorCombosprovinciasFK(ciudad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(ciudad_control.idprovinciaDefaultFK>-1 && jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val() != ciudad_control.idprovinciaDefaultFK) {
				jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val(ciudad_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(ciudad_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//ciudad_control
		
	
	}
	
	onLoadCombosDefectoFK(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 
				ciudad_webcontrol1.setDefectoValorCombosprovinciasFK(ciudad_control);
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
	onLoadCombosEventosFK(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				ciudad_webcontrol1.registrarComboActionChangeCombosprovinciasFK(ciudad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(ciudad_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("ciudad","BusquedaPorCodigo","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("ciudad","BusquedaPorNombre","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("ciudad","FK_Idprovincia","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
		
			
			if(ciudad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("ciudad");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("ciudad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(ciudad_funcion1,ciudad_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(ciudad_funcion1,ciudad_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(ciudad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"ciudad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				ciudad_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("ciudad");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(ciudad_control) {
		
		jQuery("#divBusquedaciudadAjaxWebPart").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trciudadCabeceraBusquedas").css("display",ciudad_control.strPermisoBusqueda);
		jQuery("#trBusquedaciudad").css("display",ciudad_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteciudad").css("display",ciudad_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosciudad").attr("style",ciudad_control.strPermisoMostrarTodos);		
		
		if(ciudad_control.strPermisoNuevo!=null) {
			jQuery("#tdciudadNuevo").css("display",ciudad_control.strPermisoNuevo);
			jQuery("#tdciudadNuevoToolBar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdciudadDuplicar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdciudadDuplicarToolBar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdciudadNuevoGuardarCambios").css("display",ciudad_control.strPermisoNuevo);
			jQuery("#tdciudadNuevoGuardarCambiosToolBar").css("display",ciudad_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(ciudad_control.strPermisoActualizar!=null) {
			jQuery("#tdciudadCopiar").css("display",ciudad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdciudadCopiarToolBar").css("display",ciudad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdciudadConEditar").css("display",ciudad_control.strPermisoActualizar);
		}
		
		jQuery("#tdciudadGuardarCambios").css("display",ciudad_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdciudadGuardarCambiosToolBar").css("display",ciudad_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdciudadCerrarPagina").css("display",ciudad_control.strPermisoPopup);		
		jQuery("#tdciudadCerrarPaginaToolBar").css("display",ciudad_control.strPermisoPopup);
		//jQuery("#trciudadAccionesRelaciones").css("display",ciudad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=ciudad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ciudad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + ciudad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Ciudades";
		sTituloBanner+=" - " + ciudad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ciudad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdciudadRelacionesToolBar").css("display",ciudad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosciudad").css("display",ciudad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		ciudad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		ciudad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		ciudad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		ciudad_webcontrol1.registrarEventosControles();
		
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			ciudad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(ciudad_constante1.STR_ES_RELACIONES=="true") {
			if(ciudad_constante1.BIT_ES_PAGINA_FORM==true) {
				ciudad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(ciudad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(ciudad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				ciudad_webcontrol1.onLoad();
			
			//} else {
				//if(ciudad_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			ciudad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);	
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

var ciudad_webcontrol1 = new ciudad_webcontrol();

//Para ser llamado desde otro archivo (import)
export {ciudad_webcontrol,ciudad_webcontrol1};

//Para ser llamado desde window.opener
window.ciudad_webcontrol1 = ciudad_webcontrol1;


if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = ciudad_webcontrol1.onLoadWindow; 
}

//</script>