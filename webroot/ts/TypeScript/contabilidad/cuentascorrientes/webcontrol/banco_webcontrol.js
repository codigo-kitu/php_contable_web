//<script type="text/javascript" language="javascript">



//var bancoJQueryPaginaWebInteraccion= function (banco_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {banco_constante,banco_constante1} from '../util/banco_constante.js';

import {banco_funcion,banco_funcion1} from '../util/banco_funcion.js';


class banco_webcontrol extends GeneralEntityWebControl {
	
	banco_control=null;
	banco_controlInicial=null;
	banco_controlAuxiliar=null;
		
	//if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(banco_control) {
		super();
		
		this.banco_control=banco_control;
	}
		
	actualizarVariablesPagina(banco_control) {
		
		if(banco_control.action=="index" || banco_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(banco_control);
			
		} 
		
		
		else if(banco_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(banco_control);
		
		} else if(banco_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(banco_control);
		
		} else if(banco_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(banco_control);
		
		} else if(banco_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(banco_control);
			
		} else if(banco_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(banco_control);
			
		} else if(banco_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(banco_control);
		
		} else if(banco_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(banco_control);		
		
		} else if(banco_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(banco_control);
		
		} else if(banco_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(banco_control);
		
		} else if(banco_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(banco_control);
		
		} else if(banco_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(banco_control);
		
		}  else if(banco_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(banco_control);
		
		} else if(banco_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(banco_control);
		
		} else if(banco_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(banco_control);
		
		} else if(banco_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(banco_control);
		
		} else if(banco_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(banco_control);
		
		} else if(banco_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(banco_control);
		
		} else if(banco_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(banco_control);
		
		} else if(banco_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(banco_control);
		
		} else if(banco_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(banco_control);
		
		} else if(banco_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(banco_control);		
		
		} else if(banco_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(banco_control);		
		
		} else if(banco_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(banco_control);		
		
		} else if(banco_control.action.includes("Busqueda") ||
				  banco_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(banco_control);
			
		} else if(banco_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(banco_control)
		}
		
		
		
	
		else if(banco_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(banco_control);	
		
		} else if(banco_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(banco_control);		
		}
	
		else if(banco_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(banco_control);		
		}
	
		else if(banco_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(banco_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + banco_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(banco_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(banco_control) {
		this.actualizarPaginaAccionesGenerales(banco_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(banco_control) {
		
		this.actualizarPaginaCargaGeneral(banco_control);
		this.actualizarPaginaOrderBy(banco_control);
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaCargaGeneralControles(banco_control);
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(banco_control);
		this.actualizarPaginaAreaBusquedas(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(banco_control) {
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(banco_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(banco_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(banco_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(banco_control) {
		
		this.actualizarPaginaCargaGeneral(banco_control);
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaCargaGeneralControles(banco_control);
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(banco_control);
		this.actualizarPaginaAreaBusquedas(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		//this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		//this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		//this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(banco_control) {
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(banco_control) {
		this.actualizarPaginaAbrirLink(banco_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);				
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		//this.actualizarPaginaFormulario(banco_control);
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		//this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		//this.actualizarPaginaFormulario(banco_control);
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(banco_control) {
		//this.actualizarPaginaFormulario(banco_control);
		this.onLoadCombosDefectoFK(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		//this.actualizarPaginaFormulario(banco_control);
		this.onLoadCombosDefectoFK(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		//this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(banco_control) {
		this.actualizarPaginaAbrirLink(banco_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(banco_control) {
					//super.actualizarPaginaImprimir(banco_control,"banco");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",banco_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("banco_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(banco_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(banco_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(banco_control) {
		//super.actualizarPaginaImprimir(banco_control,"banco");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("banco_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(banco_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",banco_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(banco_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(banco_control) {
		//super.actualizarPaginaImprimir(banco_control,"banco");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("banco_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(banco_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",banco_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(banco_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(banco_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(banco_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(banco_control);
			
		this.actualizarPaginaAbrirLink(banco_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(banco_control) {
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaFormulario(banco_control);
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(banco_control) {
		
		if(banco_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(banco_control);
		}
		
		if(banco_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(banco_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(banco_control) {
		if(banco_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("bancoReturnGeneral",JSON.stringify(banco_control.bancoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(banco_control) {
		if(banco_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && banco_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(banco_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(banco_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(banco_control, mostrar) {
		
		if(mostrar==true) {
			banco_funcion1.resaltarRestaurarDivsPagina(false,"banco");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				banco_funcion1.resaltarRestaurarDivMantenimiento(false,"banco");
			}			
			
			banco_funcion1.mostrarDivMensaje(true,banco_control.strAuxiliarMensaje,banco_control.strAuxiliarCssMensaje);
		
		} else {
			banco_funcion1.mostrarDivMensaje(false,banco_control.strAuxiliarMensaje,banco_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(banco_control) {
		if(banco_funcion1.esPaginaForm(banco_constante1)==true) {
			window.opener.banco_webcontrol1.actualizarPaginaTablaDatos(banco_control);
		} else {
			this.actualizarPaginaTablaDatos(banco_control);
		}
	}
	
	actualizarPaginaAbrirLink(banco_control) {
		banco_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(banco_control.strAuxiliarUrlPagina);
				
		banco_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(banco_control.strAuxiliarTipo,banco_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(banco_control) {
		banco_funcion1.resaltarRestaurarDivMensaje(true,banco_control.strAuxiliarMensajeAlert,banco_control.strAuxiliarCssMensaje);
			
		if(banco_funcion1.esPaginaForm(banco_constante1)==true) {
			window.opener.banco_funcion1.resaltarRestaurarDivMensaje(true,banco_control.strAuxiliarMensajeAlert,banco_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(banco_control) {
		this.banco_controlInicial=banco_control;
			
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(banco_control.strStyleDivArbol,banco_control.strStyleDivContent
																,banco_control.strStyleDivOpcionesBanner,banco_control.strStyleDivExpandirColapsar
																,banco_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=banco_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",banco_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(banco_control) {
		this.actualizarCssBotonesPagina(banco_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(banco_control.tiposReportes,banco_control.tiposReporte
															 	,banco_control.tiposPaginacion,banco_control.tiposAcciones
																,banco_control.tiposColumnasSelect,banco_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(banco_control.tiposRelaciones,banco_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(banco_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(banco_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(banco_control);			
	}
	
	actualizarPaginaUsuarioInvitado(banco_control) {
	
		var indexPosition=banco_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=banco_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(banco_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 
				banco_webcontrol1.cargarCombosempresasFK(banco_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(banco_control.strRecargarFkTiposNinguno!=null && banco_control.strRecargarFkTiposNinguno!='NINGUNO' && banco_control.strRecargarFkTiposNinguno!='') {
			
				if(banco_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTiposNinguno,",")) { 
					banco_webcontrol1.cargarCombosempresasFK(banco_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(banco_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,banco_funcion1,banco_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(banco_control) {
		jQuery("#divBusquedabancoAjaxWebPart").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trbancoCabeceraBusquedas").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trBusquedabanco").css("display",banco_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(banco_control.htmlTablaOrderBy!=null
			&& banco_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBybancoAjaxWebPart").html(banco_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//banco_webcontrol1.registrarOrderByActions();
			
		}
			
		if(banco_control.htmlTablaOrderByRel!=null
			&& banco_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelbancoAjaxWebPart").html(banco_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(banco_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedabancoAjaxWebPart").css("display","none");
			jQuery("#trbancoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedabanco").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(banco_control) {
		
		if(!banco_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(banco_control);
		} else {
			jQuery("#divTablaDatosbancosAjaxWebPart").html(banco_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosbancos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(banco_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosbancos=jQuery("#tblTablaDatosbancos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("banco",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',banco_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			banco_webcontrol1.registrarControlesTableEdition(banco_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		banco_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(banco_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("banco_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(banco_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosbancosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(banco_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(banco_control);
		
		const divOrderBy = document.getElementById("divOrderBybancoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(banco_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelbancoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(banco_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(banco_control.bancoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(banco_control);			
		}
	}
	
	actualizarCamposFilaTabla(banco_control) {
		var i=0;
		
		i=banco_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(banco_control.bancoActual.id);
		jQuery("#t-version_row_"+i+"").val(banco_control.bancoActual.versionRow);
		
		if(banco_control.bancoActual.id_empresa!=null && banco_control.bancoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != banco_control.bancoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(banco_control.bancoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(banco_control.bancoActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(banco_control.bancoActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(banco_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_corriente").click(function(){
		jQuery("#tblTablaDatosbancos").on("click",".imgrelacioncuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualbanco");

			banco_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});				
	}
		
	

	registrarSesionParacuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"banco","cuenta_corriente","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1,"s","");
	}
	
	registrarControlesTableEdition(banco_control) {
		banco_funcion1.registrarControlesTableValidacionEdition(banco_control,banco_webcontrol1,banco_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(banco_control) {
		jQuery("#divResumenbancoActualAjaxWebPart").html(banco_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(banco_control) {
		//jQuery("#divAccionesRelacionesbancoAjaxWebPart").html(banco_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("banco_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(banco_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesbancoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		banco_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(banco_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(banco_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(banco_control) {
		
		if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+banco_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",banco_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+banco_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",banco_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionbanco();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("banco",id,"cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		banco_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("banco","empresa","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualbanco");

			banco_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,bancoConstante,strParametros);
		
		//banco_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(banco_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+banco_constante1.STR_SUFIJO+"-id_empresa",banco_control.empresasFK);

		if(banco_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+banco_control.idFilaTablaActual+"_2",banco_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(banco_control) {

	};

	
	
	setDefectoValorCombosempresasFK(banco_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(banco_control.idempresaDefaultFK>-1 && jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val() != banco_control.idempresaDefaultFK) {
				jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val(banco_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//banco_control
		
	
	}
	
	onLoadCombosDefectoFK(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 
				banco_webcontrol1.setDefectoValorCombosempresasFK(banco_control);
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
	onLoadCombosEventosFK(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				banco_webcontrol1.registrarComboActionChangeCombosempresasFK(banco_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(banco_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("banco","FK_Idempresa","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
		
			
			if(banco_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("banco");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("banco");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(banco_funcion1,banco_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(banco_funcion1,banco_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(banco_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,"banco");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",banco_funcion1,banco_webcontrol1,banco_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				banco_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("banco");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(banco_control) {
		
		jQuery("#divBusquedabancoAjaxWebPart").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trbancoCabeceraBusquedas").css("display",banco_control.strPermisoBusqueda);
		jQuery("#trBusquedabanco").css("display",banco_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportebanco").css("display",banco_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosbanco").attr("style",banco_control.strPermisoMostrarTodos);		
		
		if(banco_control.strPermisoNuevo!=null) {
			jQuery("#tdbancoNuevo").css("display",banco_control.strPermisoNuevo);
			jQuery("#tdbancoNuevoToolBar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdbancoDuplicar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbancoDuplicarToolBar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbancoNuevoGuardarCambios").css("display",banco_control.strPermisoNuevo);
			jQuery("#tdbancoNuevoGuardarCambiosToolBar").css("display",banco_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(banco_control.strPermisoActualizar!=null) {
			jQuery("#tdbancoCopiar").css("display",banco_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbancoCopiarToolBar").css("display",banco_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbancoConEditar").css("display",banco_control.strPermisoActualizar);
		}
		
		jQuery("#tdbancoGuardarCambios").css("display",banco_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdbancoGuardarCambiosToolBar").css("display",banco_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdbancoCerrarPagina").css("display",banco_control.strPermisoPopup);		
		jQuery("#tdbancoCerrarPaginaToolBar").css("display",banco_control.strPermisoPopup);
		//jQuery("#trbancoAccionesRelaciones").css("display",banco_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=banco_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + banco_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + banco_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Bancos";
		sTituloBanner+=" - " + banco_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + banco_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdbancoRelacionesToolBar").css("display",banco_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosbanco").css("display",banco_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		banco_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		banco_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		banco_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		banco_webcontrol1.registrarEventosControles();
		
		if(banco_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			banco_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(banco_constante1.STR_ES_RELACIONES=="true") {
			if(banco_constante1.BIT_ES_PAGINA_FORM==true) {
				banco_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(banco_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(banco_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				banco_webcontrol1.onLoad();
			
			//} else {
				//if(banco_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			banco_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);	
	}
}

var banco_webcontrol1 = new banco_webcontrol();

//Para ser llamado desde otro archivo (import)
export {banco_webcontrol,banco_webcontrol1};

//Para ser llamado desde window.opener
window.banco_webcontrol1 = banco_webcontrol1;


if(banco_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = banco_webcontrol1.onLoadWindow; 
}

//</script>