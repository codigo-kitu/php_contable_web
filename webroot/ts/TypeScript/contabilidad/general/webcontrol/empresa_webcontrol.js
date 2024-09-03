//<script type="text/javascript" language="javascript">



//var empresaJQueryPaginaWebInteraccion= function (empresa_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {empresa_constante,empresa_constante1} from '../util/empresa_constante.js';

import {empresa_funcion,empresa_funcion1} from '../util/empresa_funcion.js';


class empresa_webcontrol extends GeneralEntityWebControl {
	
	empresa_control=null;
	empresa_controlInicial=null;
	empresa_controlAuxiliar=null;
		
	//if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(empresa_control) {
		super();
		
		this.empresa_control=empresa_control;
	}
		
	actualizarVariablesPagina(empresa_control) {
		
		if(empresa_control.action=="index" || empresa_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(empresa_control);
			
		} 
		
		
		else if(empresa_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(empresa_control);
		
		} else if(empresa_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(empresa_control);
		
		} else if(empresa_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(empresa_control);
		
		} else if(empresa_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(empresa_control);
			
		} else if(empresa_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(empresa_control);
			
		} else if(empresa_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(empresa_control);
		
		} else if(empresa_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(empresa_control);		
		
		} else if(empresa_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(empresa_control);
		
		} else if(empresa_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(empresa_control);
		
		} else if(empresa_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(empresa_control);
		
		} else if(empresa_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(empresa_control);
		
		}  else if(empresa_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(empresa_control);
		
		} else if(empresa_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(empresa_control);
		
		} else if(empresa_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(empresa_control);
		
		} else if(empresa_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(empresa_control);
		
		} else if(empresa_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(empresa_control);
		
		} else if(empresa_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(empresa_control);
		
		} else if(empresa_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(empresa_control);
		
		} else if(empresa_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(empresa_control);
		
		} else if(empresa_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(empresa_control);		
		
		} else if(empresa_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(empresa_control);		
		
		} else if(empresa_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(empresa_control);		
		
		} else if(empresa_control.action.includes("Busqueda") ||
				  empresa_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(empresa_control);
			
		} else if(empresa_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(empresa_control)
		}
		
		
		
	
		else if(empresa_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(empresa_control);	
		
		} else if(empresa_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(empresa_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + empresa_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(empresa_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(empresa_control) {
		this.actualizarPaginaAccionesGenerales(empresa_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(empresa_control) {
		
		this.actualizarPaginaCargaGeneral(empresa_control);
		this.actualizarPaginaOrderBy(empresa_control);
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(empresa_control);
		this.actualizarPaginaAreaBusquedas(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(empresa_control) {
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(empresa_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(empresa_control) {
		
		this.actualizarPaginaCargaGeneral(empresa_control);
		this.actualizarPaginaTablaDatos(empresa_control);
		this.actualizarPaginaCargaGeneralControles(empresa_control);
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(empresa_control);
		this.actualizarPaginaAreaBusquedas(empresa_control);
		this.actualizarPaginaCargaCombosFK(empresa_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(empresa_control) {
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(empresa_control) {
		this.actualizarPaginaAbrirLink(empresa_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);				
		//this.actualizarPaginaFormulario(empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);
		//this.actualizarPaginaFormulario(empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);
		//this.actualizarPaginaFormulario(empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(empresa_control) {
		//this.actualizarPaginaFormulario(empresa_control);
		this.onLoadCombosDefectoFK(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);
		//this.actualizarPaginaFormulario(empresa_control);
		this.onLoadCombosDefectoFK(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(empresa_control) {
		this.actualizarPaginaAbrirLink(empresa_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(empresa_control) {
		this.actualizarPaginaTablaDatos(empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(empresa_control) {
					//super.actualizarPaginaImprimir(empresa_control,"empresa");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",empresa_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("empresa_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(empresa_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(empresa_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(empresa_control) {
		//super.actualizarPaginaImprimir(empresa_control,"empresa");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("empresa_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(empresa_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",empresa_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(empresa_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(empresa_control) {
		//super.actualizarPaginaImprimir(empresa_control,"empresa");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("empresa_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(empresa_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",empresa_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(empresa_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(empresa_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(empresa_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(empresa_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(empresa_control);
			
		this.actualizarPaginaAbrirLink(empresa_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(empresa_control) {
		
		if(empresa_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(empresa_control);
		}
		
		if(empresa_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(empresa_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(empresa_control) {
		if(empresa_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("empresaReturnGeneral",JSON.stringify(empresa_control.empresaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(empresa_control) {
		if(empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && empresa_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(empresa_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(empresa_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(empresa_control, mostrar) {
		
		if(mostrar==true) {
			empresa_funcion1.resaltarRestaurarDivsPagina(false,"empresa");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				empresa_funcion1.resaltarRestaurarDivMantenimiento(false,"empresa");
			}			
			
			empresa_funcion1.mostrarDivMensaje(true,empresa_control.strAuxiliarMensaje,empresa_control.strAuxiliarCssMensaje);
		
		} else {
			empresa_funcion1.mostrarDivMensaje(false,empresa_control.strAuxiliarMensaje,empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(empresa_control) {
		if(empresa_funcion1.esPaginaForm(empresa_constante1)==true) {
			window.opener.empresa_webcontrol1.actualizarPaginaTablaDatos(empresa_control);
		} else {
			this.actualizarPaginaTablaDatos(empresa_control);
		}
	}
	
	actualizarPaginaAbrirLink(empresa_control) {
		empresa_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(empresa_control.strAuxiliarUrlPagina);
				
		empresa_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(empresa_control.strAuxiliarTipo,empresa_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(empresa_control) {
		empresa_funcion1.resaltarRestaurarDivMensaje(true,empresa_control.strAuxiliarMensajeAlert,empresa_control.strAuxiliarCssMensaje);
			
		if(empresa_funcion1.esPaginaForm(empresa_constante1)==true) {
			window.opener.empresa_funcion1.resaltarRestaurarDivMensaje(true,empresa_control.strAuxiliarMensajeAlert,empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(empresa_control) {
		this.empresa_controlInicial=empresa_control;
			
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(empresa_control.strStyleDivArbol,empresa_control.strStyleDivContent
																,empresa_control.strStyleDivOpcionesBanner,empresa_control.strStyleDivExpandirColapsar
																,empresa_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=empresa_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",empresa_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(empresa_control) {
		this.actualizarCssBotonesPagina(empresa_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(empresa_control.tiposReportes,empresa_control.tiposReporte
															 	,empresa_control.tiposPaginacion,empresa_control.tiposAcciones
																,empresa_control.tiposColumnasSelect,empresa_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(empresa_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(empresa_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(empresa_control);			
	}
	
	actualizarPaginaUsuarioInvitado(empresa_control) {
	
		var indexPosition=empresa_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=empresa_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(empresa_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.cargarCombospaissFK(empresa_control);
			}

			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.cargarCombosciudadsFK(empresa_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(empresa_control.strRecargarFkTiposNinguno!=null && empresa_control.strRecargarFkTiposNinguno!='NINGUNO' && empresa_control.strRecargarFkTiposNinguno!='') {
			
				if(empresa_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTiposNinguno,",")) { 
					empresa_webcontrol1.cargarCombospaissFK(empresa_control);
				}

				if(empresa_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTiposNinguno,",")) { 
					empresa_webcontrol1.cargarCombosciudadsFK(empresa_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablapaisFK(empresa_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,empresa_funcion1,empresa_control.paissFK);
	}

	cargarComboEditarTablaciudadFK(empresa_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,empresa_funcion1,empresa_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(empresa_control) {
		jQuery("#divBusquedaempresaAjaxWebPart").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trempresaCabeceraBusquedas").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedaempresa").css("display",empresa_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(empresa_control.htmlTablaOrderBy!=null
			&& empresa_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByempresaAjaxWebPart").html(empresa_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//empresa_webcontrol1.registrarOrderByActions();
			
		}
			
		if(empresa_control.htmlTablaOrderByRel!=null
			&& empresa_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelempresaAjaxWebPart").html(empresa_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(empresa_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaempresaAjaxWebPart").css("display","none");
			jQuery("#trempresaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaempresa").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(empresa_control) {
		
		if(!empresa_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(empresa_control);
		} else {
			jQuery("#divTablaDatosempresasAjaxWebPart").html(empresa_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosempresas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(empresa_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosempresas=jQuery("#tblTablaDatosempresas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("empresa",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',empresa_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			empresa_webcontrol1.registrarControlesTableEdition(empresa_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		empresa_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(empresa_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("empresa_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(empresa_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosempresasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(empresa_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(empresa_control);
		
		const divOrderBy = document.getElementById("divOrderByempresaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(empresa_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelempresaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(empresa_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(empresa_control.empresaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(empresa_control);			
		}
	}
	
	actualizarCamposFilaTabla(empresa_control) {
		var i=0;
		
		i=empresa_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(empresa_control.empresaActual.id);
		jQuery("#t-version_row_"+i+"").val(empresa_control.empresaActual.versionRow);
		
		if(empresa_control.empresaActual.id_pais!=null && empresa_control.empresaActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != empresa_control.empresaActual.id_pais) {
				jQuery("#t-cel_"+i+"_2").val(empresa_control.empresaActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(empresa_control.empresaActual.id_ciudad!=null && empresa_control.empresaActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != empresa_control.empresaActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_3").val(empresa_control.empresaActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(empresa_control.empresaActual.ruc);
		jQuery("#t-cel_"+i+"_5").val(empresa_control.empresaActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(empresa_control.empresaActual.nombre_comercial);
		jQuery("#t-cel_"+i+"_7").val(empresa_control.empresaActual.sector);
		jQuery("#t-cel_"+i+"_8").val(empresa_control.empresaActual.direccion1);
		jQuery("#t-cel_"+i+"_9").val(empresa_control.empresaActual.direccion2);
		jQuery("#t-cel_"+i+"_10").val(empresa_control.empresaActual.direccion3);
		jQuery("#t-cel_"+i+"_11").val(empresa_control.empresaActual.telefono1);
		jQuery("#t-cel_"+i+"_12").val(empresa_control.empresaActual.movil);
		jQuery("#t-cel_"+i+"_13").val(empresa_control.empresaActual.mail);
		jQuery("#t-cel_"+i+"_14").val(empresa_control.empresaActual.sitio_web);
		jQuery("#t-cel_"+i+"_15").val(empresa_control.empresaActual.codigo_postal);
		jQuery("#t-cel_"+i+"_16").val(empresa_control.empresaActual.fax);
		jQuery("#t-cel_"+i+"_17").val(empresa_control.empresaActual.logo);
		jQuery("#t-cel_"+i+"_18").val(empresa_control.empresaActual.icono);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(empresa_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(empresa_control) {
		empresa_funcion1.registrarControlesTableValidacionEdition(empresa_control,empresa_webcontrol1,empresa_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(empresa_control) {
		jQuery("#divResumenempresaActualAjaxWebPart").html(empresa_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(empresa_control) {
		//jQuery("#divAccionesRelacionesempresaAjaxWebPart").html(empresa_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("empresa_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(empresa_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesempresaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		empresa_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(empresa_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(empresa_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(empresa_control) {
		
		if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",empresa_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",empresa_control.strVisibleFK_Idciudad);
		}

		if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idpais").attr("style",empresa_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+empresa_constante1.STR_SUFIJO+"FK_Idpais").attr("style",empresa_control.strVisibleFK_Idpais);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionempresa();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("empresa","general","",empresa_funcion1,empresa_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("empresa",id,"general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);		
	}
	
	

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		empresa_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("empresa","pais","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		empresa_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("empresa","ciudad","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresaConstante,strParametros);
		
		//empresa_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombospaissFK(empresa_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+empresa_constante1.STR_SUFIJO+"-id_pais",empresa_control.paissFK);

		if(empresa_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+empresa_control.idFilaTablaActual+"_2",empresa_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",empresa_control.paissFK);

	};

	cargarCombosciudadsFK(empresa_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad",empresa_control.ciudadsFK);

		if(empresa_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+empresa_control.idFilaTablaActual+"_3",empresa_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",empresa_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombospaissFK(empresa_control) {

	};

	registrarComboActionChangeCombosciudadsFK(empresa_control) {

	};

	
	
	setDefectoValorCombospaissFK(empresa_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(empresa_control.idpaisDefaultFK>-1 && jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val() != empresa_control.idpaisDefaultFK) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais").val(empresa_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(empresa_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(empresa_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(empresa_control.idciudadDefaultFK>-1 && jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val() != empresa_control.idciudadDefaultFK) {
				jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad").val(empresa_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(empresa_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+empresa_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//empresa_control
		
	
	}
	
	onLoadCombosDefectoFK(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.setDefectoValorCombospaissFK(empresa_control);
			}

			if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 
				empresa_webcontrol1.setDefectoValorCombosciudadsFK(empresa_control);
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
	onLoadCombosEventosFK(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",empresa_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				empresa_webcontrol1.registrarComboActionChangeCombospaissFK(empresa_control);
			//}

			//if(empresa_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",empresa_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				empresa_webcontrol1.registrarComboActionChangeCombosciudadsFK(empresa_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(empresa_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(empresa_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("empresa","FK_Idciudad","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("empresa","FK_Idpais","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
		
			
			if(empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("empresa","general","",empresa_funcion1,empresa_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("empresa");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("empresa");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(empresa_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("empresa","general","",empresa_funcion1,empresa_webcontrol1,"empresa");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				empresa_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+empresa_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				empresa_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("empresa","general","",empresa_funcion1,empresa_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(empresa_control) {
		
		jQuery("#divBusquedaempresaAjaxWebPart").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trempresaCabeceraBusquedas").css("display",empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedaempresa").css("display",empresa_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteempresa").css("display",empresa_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosempresa").attr("style",empresa_control.strPermisoMostrarTodos);		
		
		if(empresa_control.strPermisoNuevo!=null) {
			jQuery("#tdempresaNuevo").css("display",empresa_control.strPermisoNuevo);
			jQuery("#tdempresaNuevoToolBar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdempresaDuplicar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdempresaDuplicarToolBar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdempresaNuevoGuardarCambios").css("display",empresa_control.strPermisoNuevo);
			jQuery("#tdempresaNuevoGuardarCambiosToolBar").css("display",empresa_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(empresa_control.strPermisoActualizar!=null) {
			jQuery("#tdempresaCopiar").css("display",empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdempresaCopiarToolBar").css("display",empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdempresaConEditar").css("display",empresa_control.strPermisoActualizar);
		}
		
		jQuery("#tdempresaGuardarCambios").css("display",empresa_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdempresaGuardarCambiosToolBar").css("display",empresa_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdempresaCerrarPagina").css("display",empresa_control.strPermisoPopup);		
		jQuery("#tdempresaCerrarPaginaToolBar").css("display",empresa_control.strPermisoPopup);
		//jQuery("#trempresaAccionesRelaciones").css("display",empresa_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Empresas";
		sTituloBanner+=" - " + empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + empresa_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdempresaRelacionesToolBar").css("display",empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosempresa").css("display",empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("empresa","general","",empresa_funcion1,empresa_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		empresa_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		empresa_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		empresa_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		empresa_webcontrol1.registrarEventosControles();
		
		if(empresa_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(empresa_constante1.STR_ES_RELACIONADO=="false") {
			empresa_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(empresa_constante1.STR_ES_RELACIONES=="true") {
			if(empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				empresa_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(empresa_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				empresa_webcontrol1.onLoad();
			
			//} else {
				//if(empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			empresa_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("empresa","general","",empresa_funcion1,empresa_webcontrol1,empresa_constante1);	
	}
}

var empresa_webcontrol1 = new empresa_webcontrol();

//Para ser llamado desde otro archivo (import)
export {empresa_webcontrol,empresa_webcontrol1};

//Para ser llamado desde window.opener
window.empresa_webcontrol1 = empresa_webcontrol1;


if(empresa_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = empresa_webcontrol1.onLoadWindow; 
}

//</script>