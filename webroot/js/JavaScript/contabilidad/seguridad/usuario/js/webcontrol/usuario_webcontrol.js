//<script type="text/javascript" language="javascript">



//var usuarioJQueryPaginaWebInteraccion= function (usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {usuario_constante,usuario_constante1} from '../util/usuario_constante.js';

import {usuario_funcion,usuario_funcion1} from '../util/usuario_funcion.js';


class usuario_webcontrol extends GeneralEntityWebControl {
	
	usuario_control=null;
	usuario_controlInicial=null;
	usuario_controlAuxiliar=null;
		
	//if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(usuario_control) {
		super();
		
		this.usuario_control=usuario_control;
	}
		
	actualizarVariablesPagina(usuario_control) {
		
		if(usuario_control.action=="index" || usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(usuario_control);
			
		} 
		
		
		else if(usuario_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(usuario_control);
		
		} else if(usuario_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(usuario_control);
		
		} else if(usuario_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(usuario_control);
		
		} else if(usuario_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(usuario_control);
			
		} else if(usuario_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(usuario_control);
			
		} else if(usuario_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(usuario_control);
		
		} else if(usuario_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(usuario_control);		
		
		} else if(usuario_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(usuario_control);
		
		} else if(usuario_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(usuario_control);
		
		} else if(usuario_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(usuario_control);
		
		} else if(usuario_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(usuario_control);
		
		}  else if(usuario_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(usuario_control);
		
		} else if(usuario_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(usuario_control);
		
		} else if(usuario_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(usuario_control);
		
		} else if(usuario_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(usuario_control);
		
		} else if(usuario_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(usuario_control);
		
		} else if(usuario_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(usuario_control);
		
		} else if(usuario_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(usuario_control);
		
		} else if(usuario_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(usuario_control);		
		
		} else if(usuario_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(usuario_control);		
		
		} else if(usuario_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(usuario_control);		
		
		} else if(usuario_control.action.includes("Busqueda") ||
				  usuario_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(usuario_control);
			
		} else if(usuario_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(usuario_control)
		}
		
		
		
	
		else if(usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(usuario_control);	
		
		} else if(usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(usuario_control);		
		}
	
		else if(usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(usuario_control);		
		}
	
		else if(usuario_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(usuario_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(usuario_control) {
		this.actualizarPaginaAccionesGenerales(usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(usuario_control) {
		
		this.actualizarPaginaCargaGeneral(usuario_control);
		this.actualizarPaginaOrderBy(usuario_control);
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(usuario_control);
		this.actualizarPaginaAreaBusquedas(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(usuario_control) {
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(usuario_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(usuario_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(usuario_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(usuario_control) {
		
		this.actualizarPaginaCargaGeneral(usuario_control);
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(usuario_control);
		this.actualizarPaginaAreaBusquedas(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(usuario_control) {
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(usuario_control) {
		this.actualizarPaginaAbrirLink(usuario_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);				
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		//this.actualizarPaginaFormulario(usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		//this.actualizarPaginaFormulario(usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(usuario_control) {
		//this.actualizarPaginaFormulario(usuario_control);
		this.onLoadCombosDefectoFK(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		//this.actualizarPaginaFormulario(usuario_control);
		this.onLoadCombosDefectoFK(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		//this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(usuario_control) {
		this.actualizarPaginaAbrirLink(usuario_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(usuario_control) {
					//super.actualizarPaginaImprimir(usuario_control,"usuario");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",usuario_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("usuario_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(usuario_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(usuario_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(usuario_control) {
		//super.actualizarPaginaImprimir(usuario_control,"usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("usuario_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(usuario_control) {
		//super.actualizarPaginaImprimir(usuario_control,"usuario");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("usuario_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(usuario_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",usuario_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(usuario_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(usuario_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(usuario_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(usuario_control);
			
		this.actualizarPaginaAbrirLink(usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(usuario_control) {
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(usuario_control) {
		
		if(usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(usuario_control);
		}
		
		if(usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(usuario_control) {
		if(usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("usuarioReturnGeneral",JSON.stringify(usuario_control.usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(usuario_control) {
		if(usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(usuario_control, mostrar) {
		
		if(mostrar==true) {
			usuario_funcion1.resaltarRestaurarDivsPagina(false,"usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"usuario");
			}			
			
			usuario_funcion1.mostrarDivMensaje(true,usuario_control.strAuxiliarMensaje,usuario_control.strAuxiliarCssMensaje);
		
		} else {
			usuario_funcion1.mostrarDivMensaje(false,usuario_control.strAuxiliarMensaje,usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(usuario_control) {
		if(usuario_funcion1.esPaginaForm(usuario_constante1)==true) {
			window.opener.usuario_webcontrol1.actualizarPaginaTablaDatos(usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(usuario_control) {
		usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(usuario_control.strAuxiliarUrlPagina);
				
		usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(usuario_control.strAuxiliarTipo,usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(usuario_control) {
		usuario_funcion1.resaltarRestaurarDivMensaje(true,usuario_control.strAuxiliarMensajeAlert,usuario_control.strAuxiliarCssMensaje);
			
		if(usuario_funcion1.esPaginaForm(usuario_constante1)==true) {
			window.opener.usuario_funcion1.resaltarRestaurarDivMensaje(true,usuario_control.strAuxiliarMensajeAlert,usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(usuario_control) {
		this.usuario_controlInicial=usuario_control;
			
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(usuario_control.strStyleDivArbol,usuario_control.strStyleDivContent
																,usuario_control.strStyleDivOpcionesBanner,usuario_control.strStyleDivExpandirColapsar
																,usuario_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=usuario_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",usuario_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(usuario_control) {
		this.actualizarCssBotonesPagina(usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(usuario_control.tiposReportes,usuario_control.tiposReporte
															 	,usuario_control.tiposPaginacion,usuario_control.tiposAcciones
																,usuario_control.tiposColumnasSelect,usuario_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(usuario_control.tiposRelaciones,usuario_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(usuario_control) {
	
		var indexPosition=usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(usuario_control.strRecargarFkTiposNinguno!=null && usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && usuario_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(usuario_control) {
		jQuery("#divBusquedausuarioAjaxWebPart").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trusuarioCabeceraBusquedas").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedausuario").css("display",usuario_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(usuario_control.htmlTablaOrderBy!=null
			&& usuario_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByusuarioAjaxWebPart").html(usuario_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//usuario_webcontrol1.registrarOrderByActions();
			
		}
			
		if(usuario_control.htmlTablaOrderByRel!=null
			&& usuario_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelusuarioAjaxWebPart").html(usuario_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(usuario_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedausuarioAjaxWebPart").css("display","none");
			jQuery("#trusuarioCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedausuario").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(usuario_control) {
		
		if(!usuario_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(usuario_control);
		} else {
			jQuery("#divTablaDatosusuariosAjaxWebPart").html(usuario_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosusuarios=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(usuario_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosusuarios=jQuery("#tblTablaDatosusuarios").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("usuario",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',usuario_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			usuario_webcontrol1.registrarControlesTableEdition(usuario_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		usuario_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(usuario_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("usuario_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(usuario_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosusuariosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(usuario_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(usuario_control);
		
		const divOrderBy = document.getElementById("divOrderByusuarioAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(usuario_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelusuarioAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(usuario_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(usuario_control.usuarioActual!=null) {//form
			
			this.actualizarCamposFilaTabla(usuario_control);			
		}
	}
	
	actualizarCamposFilaTabla(usuario_control) {
		var i=0;
		
		i=usuario_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(usuario_control.usuarioActual.id);
		jQuery("#t-version_row_"+i+"").val(usuario_control.usuarioActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(usuario_control.usuarioActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(usuario_control.usuarioActual.user_name);
		jQuery("#t-cel_"+i+"_4").val(usuario_control.usuarioActual.clave);
		jQuery("#t-cel_"+i+"_5").val(usuario_control.usuarioActual.confirmar_clave);
		jQuery("#t-cel_"+i+"_6").val(usuario_control.usuarioActual.nombre);
		jQuery("#t-cel_"+i+"_7").val(usuario_control.usuarioActual.codigo_alterno);
		jQuery("#t-cel_"+i+"_8").prop('checked',usuario_control.usuarioActual.tipo);
		jQuery("#t-cel_"+i+"_9").prop('checked',usuario_control.usuarioActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(usuario_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionhistorial_cambio_clave").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionhistorial_cambio_clave", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParahistorial_cambio_claves(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionresumen_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionresumen_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionPararesumen_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionauditoria").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionauditoria", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaauditorias(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionperfil_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_general_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelacionparametro_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaparametro_general_usuarioes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondato_general_usuario").click(function(){
		jQuery("#tblTablaDatosusuarios").on("click",".imgrelaciondato_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});				
	}
		
	

	registrarSesionParahistorial_cambio_claves(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","historial_cambio_clave","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1,"s","");
	}

	registrarSesionPararesumen_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","resumen_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1,"s","");
	}

	registrarSesionParaauditorias(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","auditoria","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1,"s","");
	}

	registrarSesionParaperfil_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","perfil_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1,"s","");
	}

	registrarSesionParaparametro_general_usuarioes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","parametro_general_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1,"es","");
	}

	registrarSesionParadato_general_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"usuario","dato_general_usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1,"s","");
	}
	
	registrarControlesTableEdition(usuario_control) {
		usuario_funcion1.registrarControlesTableValidacionEdition(usuario_control,usuario_webcontrol1,usuario_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(usuario_control) {
		jQuery("#divResumenusuarioActualAjaxWebPart").html(usuario_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(usuario_control) {
		//jQuery("#divAccionesRelacionesusuarioAjaxWebPart").html(usuario_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("usuario_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(usuario_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesusuarioAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		usuario_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(usuario_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(usuario_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(usuario_control) {
		
		if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",usuario_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",usuario_control.strVisibleBusquedaPorNombre);
		}

		if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorUserName").attr("style",usuario_control.strVisibleBusquedaPorUserName);
			jQuery("#tblstrVisible"+usuario_constante1.STR_SUFIJO+"BusquedaPorUserName").attr("style",usuario_control.strVisibleBusquedaPorUserName);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionusuario();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("usuario",id,"seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionhistorial_cambio_clave").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParahistorial_cambio_claves(idActual);
		});
		jQuery("#imgdivrelacionresumen_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionPararesumen_usuarios(idActual);
		});
		jQuery("#imgdivrelacionauditoria").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaauditorias(idActual);
		});
		jQuery("#imgdivrelacionperfil_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});
		jQuery("#imgdivrelacionparametro_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParaparametro_general_usuarioes(idActual);
		});
		jQuery("#imgdivrelaciondato_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualusuario");

			usuario_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuarioConstante,strParametros);
		
		//usuario_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(usuario_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("usuario","BusquedaPorNombre","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("usuario","BusquedaPorUserName","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
		
			
			if(usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("usuario");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(usuario_funcion1,usuario_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(usuario_funcion1,usuario_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,"usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("usuario");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(usuario_control) {
		
		jQuery("#divBusquedausuarioAjaxWebPart").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trusuarioCabeceraBusquedas").css("display",usuario_control.strPermisoBusqueda);
		jQuery("#trBusquedausuario").css("display",usuario_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteusuario").css("display",usuario_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosusuario").attr("style",usuario_control.strPermisoMostrarTodos);		
		
		if(usuario_control.strPermisoNuevo!=null) {
			jQuery("#tdusuarioNuevo").css("display",usuario_control.strPermisoNuevo);
			jQuery("#tdusuarioNuevoToolBar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdusuarioDuplicar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdusuarioDuplicarToolBar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdusuarioNuevoGuardarCambios").css("display",usuario_control.strPermisoNuevo);
			jQuery("#tdusuarioNuevoGuardarCambiosToolBar").css("display",usuario_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdusuarioCopiar").css("display",usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdusuarioCopiarToolBar").css("display",usuario_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdusuarioConEditar").css("display",usuario_control.strPermisoActualizar);
		}
		
		jQuery("#tdusuarioGuardarCambios").css("display",usuario_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdusuarioGuardarCambiosToolBar").css("display",usuario_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdusuarioCerrarPagina").css("display",usuario_control.strPermisoPopup);		
		jQuery("#tdusuarioCerrarPaginaToolBar").css("display",usuario_control.strPermisoPopup);
		//jQuery("#trusuarioAccionesRelaciones").css("display",usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Usuarios";
		sTituloBanner+=" - " + usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdusuarioRelacionesToolBar").css("display",usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosusuario").css("display",usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		usuario_webcontrol1.registrarEventosControles();
		
		if(usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(usuario_constante1.STR_ES_RELACIONES=="true") {
			if(usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				usuario_webcontrol1.onLoad();
			
			//} else {
				//if(usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);	
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

var usuario_webcontrol1 = new usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {usuario_webcontrol,usuario_webcontrol1};

//Para ser llamado desde window.opener
window.usuario_webcontrol1 = usuario_webcontrol1;


if(usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = usuario_webcontrol1.onLoadWindow; 
}

//</script>