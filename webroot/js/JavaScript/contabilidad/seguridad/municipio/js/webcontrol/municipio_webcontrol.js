//<script type="text/javascript" language="javascript">



//var municipioJQueryPaginaWebInteraccion= function (municipio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {municipio_constante,municipio_constante1} from '../util/municipio_constante.js';

import {municipio_funcion,municipio_funcion1} from '../util/municipio_funcion.js';


class municipio_webcontrol extends GeneralEntityWebControl {
	
	municipio_control=null;
	municipio_controlInicial=null;
	municipio_controlAuxiliar=null;
		
	//if(municipio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(municipio_control) {
		super();
		
		this.municipio_control=municipio_control;
	}
		
	actualizarVariablesPagina(municipio_control) {
		
		if(municipio_control.action=="index" || municipio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(municipio_control);
			
		} 
		
		
		else if(municipio_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(municipio_control);
		
		} else if(municipio_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(municipio_control);
		
		} else if(municipio_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(municipio_control);
		
		} else if(municipio_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(municipio_control);
			
		} else if(municipio_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(municipio_control);
			
		} else if(municipio_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(municipio_control);
		
		} else if(municipio_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(municipio_control);		
		
		} else if(municipio_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(municipio_control);
		
		} else if(municipio_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(municipio_control);
		
		} else if(municipio_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(municipio_control);
		
		} else if(municipio_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(municipio_control);
		
		}  else if(municipio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(municipio_control);
		
		} else if(municipio_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(municipio_control);
		
		} else if(municipio_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(municipio_control);
		
		} else if(municipio_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(municipio_control);
		
		} else if(municipio_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(municipio_control);
		
		} else if(municipio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(municipio_control);
		
		} else if(municipio_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(municipio_control);
		
		} else if(municipio_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(municipio_control);		
		
		} else if(municipio_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(municipio_control);		
		
		} else if(municipio_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(municipio_control);		
		
		} else if(municipio_control.action.includes("Busqueda") ||
				  municipio_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(municipio_control);
			
		} else if(municipio_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(municipio_control)
		}
		
		
		
	
		else if(municipio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(municipio_control);	
		
		} else if(municipio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(municipio_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + municipio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(municipio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(municipio_control) {
		this.actualizarPaginaAccionesGenerales(municipio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(municipio_control) {
		
		this.actualizarPaginaCargaGeneral(municipio_control);
		this.actualizarPaginaOrderBy(municipio_control);
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(municipio_control);
		this.actualizarPaginaAreaBusquedas(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(municipio_control) {
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(municipio_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(municipio_control) {
		
		this.actualizarPaginaCargaGeneral(municipio_control);
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(municipio_control);
		this.actualizarPaginaAreaBusquedas(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		//this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		//this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		//this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(municipio_control) {
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(municipio_control) {
		this.actualizarPaginaAbrirLink(municipio_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);				
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);
		//this.actualizarPaginaFormulario(municipio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		//this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);
		//this.actualizarPaginaFormulario(municipio_control);
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(municipio_control) {
		//this.actualizarPaginaFormulario(municipio_control);
		this.onLoadCombosDefectoFK(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);
		//this.actualizarPaginaFormulario(municipio_control);
		this.onLoadCombosDefectoFK(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		//this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(municipio_control) {
		this.actualizarPaginaAbrirLink(municipio_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(municipio_control) {
		this.actualizarPaginaTablaDatos(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(municipio_control) {
					//super.actualizarPaginaImprimir(municipio_control,"municipio");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",municipio_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("municipio_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(municipio_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(municipio_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(municipio_control) {
		//super.actualizarPaginaImprimir(municipio_control,"municipio");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("municipio_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(municipio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",municipio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(municipio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(municipio_control) {
		//super.actualizarPaginaImprimir(municipio_control,"municipio");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("municipio_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(municipio_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",municipio_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(municipio_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(municipio_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(municipio_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(municipio_control);
			
		this.actualizarPaginaAbrirLink(municipio_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(municipio_control) {
		
		if(municipio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(municipio_control);
		}
		
		if(municipio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(municipio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(municipio_control) {
		if(municipio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("municipioReturnGeneral",JSON.stringify(municipio_control.municipioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(municipio_control) {
		if(municipio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && municipio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(municipio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(municipio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(municipio_control, mostrar) {
		
		if(mostrar==true) {
			municipio_funcion1.resaltarRestaurarDivsPagina(false,"municipio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				municipio_funcion1.resaltarRestaurarDivMantenimiento(false,"municipio");
			}			
			
			municipio_funcion1.mostrarDivMensaje(true,municipio_control.strAuxiliarMensaje,municipio_control.strAuxiliarCssMensaje);
		
		} else {
			municipio_funcion1.mostrarDivMensaje(false,municipio_control.strAuxiliarMensaje,municipio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(municipio_control) {
		if(municipio_funcion1.esPaginaForm(municipio_constante1)==true) {
			window.opener.municipio_webcontrol1.actualizarPaginaTablaDatos(municipio_control);
		} else {
			this.actualizarPaginaTablaDatos(municipio_control);
		}
	}
	
	actualizarPaginaAbrirLink(municipio_control) {
		municipio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(municipio_control.strAuxiliarUrlPagina);
				
		municipio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(municipio_control.strAuxiliarTipo,municipio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(municipio_control) {
		municipio_funcion1.resaltarRestaurarDivMensaje(true,municipio_control.strAuxiliarMensajeAlert,municipio_control.strAuxiliarCssMensaje);
			
		if(municipio_funcion1.esPaginaForm(municipio_constante1)==true) {
			window.opener.municipio_funcion1.resaltarRestaurarDivMensaje(true,municipio_control.strAuxiliarMensajeAlert,municipio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(municipio_control) {
		this.municipio_controlInicial=municipio_control;
			
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(municipio_control.strStyleDivArbol,municipio_control.strStyleDivContent
																,municipio_control.strStyleDivOpcionesBanner,municipio_control.strStyleDivExpandirColapsar
																,municipio_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=municipio_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",municipio_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(municipio_control) {
		this.actualizarCssBotonesPagina(municipio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(municipio_control.tiposReportes,municipio_control.tiposReporte
															 	,municipio_control.tiposPaginacion,municipio_control.tiposAcciones
																,municipio_control.tiposColumnasSelect,municipio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(municipio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(municipio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(municipio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(municipio_control) {
	
		var indexPosition=municipio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=municipio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(municipio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(municipio_control.strRecargarFkTiposNinguno!=null && municipio_control.strRecargarFkTiposNinguno!='NINGUNO' && municipio_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(municipio_control) {
		jQuery("#divBusquedamunicipioAjaxWebPart").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trmunicipioCabeceraBusquedas").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trBusquedamunicipio").css("display",municipio_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(municipio_control.htmlTablaOrderBy!=null
			&& municipio_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBymunicipioAjaxWebPart").html(municipio_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//municipio_webcontrol1.registrarOrderByActions();
			
		}
			
		if(municipio_control.htmlTablaOrderByRel!=null
			&& municipio_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelmunicipioAjaxWebPart").html(municipio_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(municipio_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedamunicipioAjaxWebPart").css("display","none");
			jQuery("#trmunicipioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedamunicipio").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(municipio_control) {
		
		if(!municipio_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(municipio_control);
		} else {
			jQuery("#divTablaDatosmunicipiosAjaxWebPart").html(municipio_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosmunicipios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(municipio_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosmunicipios=jQuery("#tblTablaDatosmunicipios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("municipio",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',municipio_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			municipio_webcontrol1.registrarControlesTableEdition(municipio_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		municipio_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(municipio_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("municipio_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(municipio_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosmunicipiosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(municipio_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(municipio_control);
		
		const divOrderBy = document.getElementById("divOrderBymunicipioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(municipio_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelmunicipioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(municipio_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(municipio_control.municipioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(municipio_control);			
		}
	}
	
	actualizarCamposFilaTabla(municipio_control) {
		var i=0;
		
		i=municipio_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(municipio_control.municipioActual.id);
		jQuery("#t-version_row_"+i+"").val(municipio_control.municipioActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(municipio_control.municipioActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(municipio_control.municipioActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(municipio_control.municipioActual.municipio);
		jQuery("#t-cel_"+i+"_5").val(municipio_control.municipioActual.departamento);
		jQuery("#t-cel_"+i+"_6").val(municipio_control.municipioActual.codigo_departamento);
		jQuery("#t-cel_"+i+"_7").val(municipio_control.municipioActual.codigo_municipio);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(municipio_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(municipio_control) {
		municipio_funcion1.registrarControlesTableValidacionEdition(municipio_control,municipio_webcontrol1,municipio_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(municipio_control) {
		jQuery("#divResumenmunicipioActualAjaxWebPart").html(municipio_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(municipio_control) {
		//jQuery("#divAccionesRelacionesmunicipioAjaxWebPart").html(municipio_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("municipio_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(municipio_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesmunicipioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		municipio_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(municipio_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(municipio_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(municipio_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionmunicipio();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("municipio",id,"seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipioConstante,strParametros);
		
		//municipio_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//municipio_control
		
	
	}
	
	onLoadCombosDefectoFK(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(municipio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(municipio_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
			
			
		
			
			if(municipio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("municipio");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("municipio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(municipio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,"municipio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(municipio_control) {
		
		jQuery("#divBusquedamunicipioAjaxWebPart").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trmunicipioCabeceraBusquedas").css("display",municipio_control.strPermisoBusqueda);
		jQuery("#trBusquedamunicipio").css("display",municipio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportemunicipio").css("display",municipio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosmunicipio").attr("style",municipio_control.strPermisoMostrarTodos);		
		
		if(municipio_control.strPermisoNuevo!=null) {
			jQuery("#tdmunicipioNuevo").css("display",municipio_control.strPermisoNuevo);
			jQuery("#tdmunicipioNuevoToolBar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdmunicipioDuplicar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmunicipioDuplicarToolBar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmunicipioNuevoGuardarCambios").css("display",municipio_control.strPermisoNuevo);
			jQuery("#tdmunicipioNuevoGuardarCambiosToolBar").css("display",municipio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(municipio_control.strPermisoActualizar!=null) {
			jQuery("#tdmunicipioCopiar").css("display",municipio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmunicipioCopiarToolBar").css("display",municipio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmunicipioConEditar").css("display",municipio_control.strPermisoActualizar);
		}
		
		jQuery("#tdmunicipioGuardarCambios").css("display",municipio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdmunicipioGuardarCambiosToolBar").css("display",municipio_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdmunicipioCerrarPagina").css("display",municipio_control.strPermisoPopup);		
		jQuery("#tdmunicipioCerrarPaginaToolBar").css("display",municipio_control.strPermisoPopup);
		//jQuery("#trmunicipioAccionesRelaciones").css("display",municipio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=municipio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + municipio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + municipio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Municipios";
		sTituloBanner+=" - " + municipio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + municipio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdmunicipioRelacionesToolBar").css("display",municipio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosmunicipio").css("display",municipio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		municipio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		municipio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		municipio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		municipio_webcontrol1.registrarEventosControles();
		
		if(municipio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			municipio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(municipio_constante1.STR_ES_RELACIONES=="true") {
			if(municipio_constante1.BIT_ES_PAGINA_FORM==true) {
				municipio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(municipio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(municipio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				municipio_webcontrol1.onLoad();
			
			//} else {
				//if(municipio_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			municipio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);	
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

var municipio_webcontrol1 = new municipio_webcontrol();

//Para ser llamado desde otro archivo (import)
export {municipio_webcontrol,municipio_webcontrol1};

//Para ser llamado desde window.opener
window.municipio_webcontrol1 = municipio_webcontrol1;


if(municipio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = municipio_webcontrol1.onLoadWindow; 
}

//</script>