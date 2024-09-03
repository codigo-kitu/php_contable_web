//<script type="text/javascript" language="javascript">



//var archivoJQueryPaginaWebInteraccion= function (archivo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {archivo_constante,archivo_constante1} from '../util/archivo_constante.js';

import {archivo_funcion,archivo_funcion1} from '../util/archivo_funcion.js';


class archivo_webcontrol extends GeneralEntityWebControl {
	
	archivo_control=null;
	archivo_controlInicial=null;
	archivo_controlAuxiliar=null;
		
	//if(archivo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(archivo_control) {
		super();
		
		this.archivo_control=archivo_control;
	}
		
	actualizarVariablesPagina(archivo_control) {
		
		if(archivo_control.action=="index" || archivo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(archivo_control);
			
		} 
		
		
		else if(archivo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(archivo_control);
		
		} else if(archivo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(archivo_control);
		
		} else if(archivo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(archivo_control);
		
		} else if(archivo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(archivo_control);
			
		} else if(archivo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(archivo_control);
			
		} else if(archivo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(archivo_control);
		
		} else if(archivo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(archivo_control);		
		
		} else if(archivo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(archivo_control);
		
		} else if(archivo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(archivo_control);
		
		} else if(archivo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(archivo_control);
		
		} else if(archivo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(archivo_control);
		
		}  else if(archivo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(archivo_control);
		
		} else if(archivo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(archivo_control);
		
		} else if(archivo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(archivo_control);
		
		} else if(archivo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(archivo_control);
		
		} else if(archivo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(archivo_control);
		
		} else if(archivo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(archivo_control);
		
		} else if(archivo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(archivo_control);
		
		} else if(archivo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(archivo_control);
		
		} else if(archivo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(archivo_control);		
		
		} else if(archivo_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(archivo_control);		
		
		} else if(archivo_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(archivo_control);		
		
		} else if(archivo_control.action.includes("Busqueda") ||
				  archivo_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(archivo_control);
			
		} else if(archivo_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(archivo_control)
		}
		
		
		
	
		else if(archivo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(archivo_control);	
		
		} else if(archivo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(archivo_control);		
		}
	
		else if(archivo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(archivo_control);		
		}
	
		else if(archivo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(archivo_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + archivo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(archivo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(archivo_control) {
		this.actualizarPaginaAccionesGenerales(archivo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(archivo_control) {
		
		this.actualizarPaginaCargaGeneral(archivo_control);
		this.actualizarPaginaOrderBy(archivo_control);
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(archivo_control);
		this.actualizarPaginaAreaBusquedas(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(archivo_control) {
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(archivo_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(archivo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(archivo_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(archivo_control) {
		
		this.actualizarPaginaCargaGeneral(archivo_control);
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaCargaGeneralControles(archivo_control);
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(archivo_control);
		this.actualizarPaginaAreaBusquedas(archivo_control);
		this.actualizarPaginaCargaCombosFK(archivo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		//this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		//this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		//this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(archivo_control) {
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(archivo_control) {
		this.actualizarPaginaAbrirLink(archivo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);				
		//this.actualizarPaginaFormulario(archivo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		//this.actualizarPaginaFormulario(archivo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		//this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		//this.actualizarPaginaFormulario(archivo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(archivo_control) {
		//this.actualizarPaginaFormulario(archivo_control);
		this.onLoadCombosDefectoFK(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		//this.actualizarPaginaFormulario(archivo_control);
		this.onLoadCombosDefectoFK(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		//this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(archivo_control) {
		this.actualizarPaginaAbrirLink(archivo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(archivo_control) {
					//super.actualizarPaginaImprimir(archivo_control,"archivo");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",archivo_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("archivo_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(archivo_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(archivo_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(archivo_control) {
		//super.actualizarPaginaImprimir(archivo_control,"archivo");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("archivo_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(archivo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",archivo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(archivo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(archivo_control) {
		//super.actualizarPaginaImprimir(archivo_control,"archivo");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("archivo_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(archivo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",archivo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(archivo_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(archivo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(archivo_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(archivo_control);
			
		this.actualizarPaginaAbrirLink(archivo_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(archivo_control) {
		this.actualizarPaginaTablaDatos(archivo_control);
		this.actualizarPaginaFormulario(archivo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(archivo_control);		
		this.actualizarPaginaAreaMantenimiento(archivo_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(archivo_control) {
		
		if(archivo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(archivo_control);
		}
		
		if(archivo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(archivo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(archivo_control) {
		if(archivo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("archivoReturnGeneral",JSON.stringify(archivo_control.archivoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(archivo_control) {
		if(archivo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && archivo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(archivo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(archivo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(archivo_control, mostrar) {
		
		if(mostrar==true) {
			archivo_funcion1.resaltarRestaurarDivsPagina(false,"archivo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				archivo_funcion1.resaltarRestaurarDivMantenimiento(false,"archivo");
			}			
			
			archivo_funcion1.mostrarDivMensaje(true,archivo_control.strAuxiliarMensaje,archivo_control.strAuxiliarCssMensaje);
		
		} else {
			archivo_funcion1.mostrarDivMensaje(false,archivo_control.strAuxiliarMensaje,archivo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(archivo_control) {
		if(archivo_funcion1.esPaginaForm(archivo_constante1)==true) {
			window.opener.archivo_webcontrol1.actualizarPaginaTablaDatos(archivo_control);
		} else {
			this.actualizarPaginaTablaDatos(archivo_control);
		}
	}
	
	actualizarPaginaAbrirLink(archivo_control) {
		archivo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(archivo_control.strAuxiliarUrlPagina);
				
		archivo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(archivo_control.strAuxiliarTipo,archivo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(archivo_control) {
		archivo_funcion1.resaltarRestaurarDivMensaje(true,archivo_control.strAuxiliarMensajeAlert,archivo_control.strAuxiliarCssMensaje);
			
		if(archivo_funcion1.esPaginaForm(archivo_constante1)==true) {
			window.opener.archivo_funcion1.resaltarRestaurarDivMensaje(true,archivo_control.strAuxiliarMensajeAlert,archivo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(archivo_control) {
		this.archivo_controlInicial=archivo_control;
			
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(archivo_control.strStyleDivArbol,archivo_control.strStyleDivContent
																,archivo_control.strStyleDivOpcionesBanner,archivo_control.strStyleDivExpandirColapsar
																,archivo_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=archivo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",archivo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(archivo_control) {
		this.actualizarCssBotonesPagina(archivo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(archivo_control.tiposReportes,archivo_control.tiposReporte
															 	,archivo_control.tiposPaginacion,archivo_control.tiposAcciones
																,archivo_control.tiposColumnasSelect,archivo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(archivo_control.tiposRelaciones,archivo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(archivo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(archivo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(archivo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(archivo_control) {
	
		var indexPosition=archivo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=archivo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(archivo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(archivo_control.strRecargarFkTiposNinguno!=null && archivo_control.strRecargarFkTiposNinguno!='NINGUNO' && archivo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(archivo_control) {
		jQuery("#divBusquedaarchivoAjaxWebPart").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trarchivoCabeceraBusquedas").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trBusquedaarchivo").css("display",archivo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(archivo_control.htmlTablaOrderBy!=null
			&& archivo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByarchivoAjaxWebPart").html(archivo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//archivo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(archivo_control.htmlTablaOrderByRel!=null
			&& archivo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelarchivoAjaxWebPart").html(archivo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(archivo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaarchivoAjaxWebPart").css("display","none");
			jQuery("#trarchivoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaarchivo").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(archivo_control) {
		
		if(!archivo_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(archivo_control);
		} else {
			jQuery("#divTablaDatosarchivosAjaxWebPart").html(archivo_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosarchivos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(archivo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosarchivos=jQuery("#tblTablaDatosarchivos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("archivo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',archivo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			archivo_webcontrol1.registrarControlesTableEdition(archivo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		archivo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(archivo_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("archivo_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(archivo_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosarchivosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(archivo_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(archivo_control);
		
		const divOrderBy = document.getElementById("divOrderByarchivoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(archivo_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelarchivoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(archivo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(archivo_control.archivoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(archivo_control);			
		}
	}
	
	actualizarCamposFilaTabla(archivo_control) {
		var i=0;
		
		i=archivo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(archivo_control.archivoActual.id);
		jQuery("#t-version_row_"+i+"").val(archivo_control.archivoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(archivo_control.archivoActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(archivo_control.archivoActual.imagen);
		jQuery("#t-cel_"+i+"_4").val(archivo_control.archivoActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(archivo_control.archivoActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(archivo_control.archivoActual.archivo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(archivo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionotro_documento").click(function(){
		jQuery("#tblTablaDatosarchivos").on("click",".imgrelacionotro_documento", function () {

			var idActual=jQuery(this).attr("idactualarchivo");

			archivo_webcontrol1.registrarSesionParaotro_documentoes(idActual);
		});				
	}
		
	

	registrarSesionParaotro_documentoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"archivo","otro_documento","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1,"es","");
	}
	
	registrarControlesTableEdition(archivo_control) {
		archivo_funcion1.registrarControlesTableValidacionEdition(archivo_control,archivo_webcontrol1,archivo_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(archivo_control) {
		jQuery("#divResumenarchivoActualAjaxWebPart").html(archivo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(archivo_control) {
		//jQuery("#divAccionesRelacionesarchivoAjaxWebPart").html(archivo_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("archivo_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(archivo_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesarchivoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		archivo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(archivo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(archivo_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(archivo_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionarchivo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("archivo","general","",archivo_funcion1,archivo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("archivo",id,"general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionotro_documento").click(function(){

			var idActual=jQuery(this).attr("idactualarchivo");

			archivo_webcontrol1.registrarSesionParaotro_documentoes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivoConstante,strParametros);
		
		//archivo_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//archivo_control
		
	
	}
	
	onLoadCombosDefectoFK(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(archivo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(archivo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(archivo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(archivo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
			
			
		
			
			if(archivo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("archivo","general","",archivo_funcion1,archivo_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("archivo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("archivo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(archivo_funcion1,archivo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(archivo_funcion1,archivo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(archivo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("archivo","general","",archivo_funcion1,archivo_webcontrol1,"archivo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("archivo","general","",archivo_funcion1,archivo_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("archivo");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(archivo_control) {
		
		jQuery("#divBusquedaarchivoAjaxWebPart").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trarchivoCabeceraBusquedas").css("display",archivo_control.strPermisoBusqueda);
		jQuery("#trBusquedaarchivo").css("display",archivo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportearchivo").css("display",archivo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosarchivo").attr("style",archivo_control.strPermisoMostrarTodos);		
		
		if(archivo_control.strPermisoNuevo!=null) {
			jQuery("#tdarchivoNuevo").css("display",archivo_control.strPermisoNuevo);
			jQuery("#tdarchivoNuevoToolBar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdarchivoDuplicar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdarchivoDuplicarToolBar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdarchivoNuevoGuardarCambios").css("display",archivo_control.strPermisoNuevo);
			jQuery("#tdarchivoNuevoGuardarCambiosToolBar").css("display",archivo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(archivo_control.strPermisoActualizar!=null) {
			jQuery("#tdarchivoCopiar").css("display",archivo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdarchivoCopiarToolBar").css("display",archivo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdarchivoConEditar").css("display",archivo_control.strPermisoActualizar);
		}
		
		jQuery("#tdarchivoGuardarCambios").css("display",archivo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdarchivoGuardarCambiosToolBar").css("display",archivo_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdarchivoCerrarPagina").css("display",archivo_control.strPermisoPopup);		
		jQuery("#tdarchivoCerrarPaginaToolBar").css("display",archivo_control.strPermisoPopup);
		//jQuery("#trarchivoAccionesRelaciones").css("display",archivo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=archivo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + archivo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + archivo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Archivoses";
		sTituloBanner+=" - " + archivo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + archivo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdarchivoRelacionesToolBar").css("display",archivo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosarchivo").css("display",archivo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("archivo","general","",archivo_funcion1,archivo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		archivo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		archivo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		archivo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		archivo_webcontrol1.registrarEventosControles();
		
		if(archivo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(archivo_constante1.STR_ES_RELACIONADO=="false") {
			archivo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(archivo_constante1.STR_ES_RELACIONES=="true") {
			if(archivo_constante1.BIT_ES_PAGINA_FORM==true) {
				archivo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(archivo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(archivo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				archivo_webcontrol1.onLoad();
			
			//} else {
				//if(archivo_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			archivo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("archivo","general","",archivo_funcion1,archivo_webcontrol1,archivo_constante1);	
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

var archivo_webcontrol1 = new archivo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {archivo_webcontrol,archivo_webcontrol1};

//Para ser llamado desde window.opener
window.archivo_webcontrol1 = archivo_webcontrol1;


if(archivo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = archivo_webcontrol1.onLoadWindow; 
}

//</script>