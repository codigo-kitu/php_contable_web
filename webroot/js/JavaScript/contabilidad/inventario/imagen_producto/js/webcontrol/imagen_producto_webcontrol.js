//<script type="text/javascript" language="javascript">



//var imagen_productoJQueryPaginaWebInteraccion= function (imagen_producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_producto_constante,imagen_producto_constante1} from '../util/imagen_producto_constante.js';

import {imagen_producto_funcion,imagen_producto_funcion1} from '../util/imagen_producto_funcion.js';


class imagen_producto_webcontrol extends GeneralEntityWebControl {
	
	imagen_producto_control=null;
	imagen_producto_controlInicial=null;
	imagen_producto_controlAuxiliar=null;
		
	//if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_producto_control) {
		super();
		
		this.imagen_producto_control=imagen_producto_control;
	}
		
	actualizarVariablesPagina(imagen_producto_control) {
		
		if(imagen_producto_control.action=="index" || imagen_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_producto_control);
			
		} 
		
		
		else if(imagen_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_producto_control);
			
		} else if(imagen_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_producto_control);
			
		} else if(imagen_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_producto_control);		
		
		} else if(imagen_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_producto_control);
		
		}  else if(imagen_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_producto_control);		
		
		} else if(imagen_producto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_producto_control);		
		
		} else if(imagen_producto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_producto_control);		
		
		} else if(imagen_producto_control.action.includes("Busqueda") ||
				  imagen_producto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_producto_control);
			
		} else if(imagen_producto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_producto_control)
		}
		
		
		
	
		else if(imagen_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_producto_control);	
		
		} else if(imagen_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_producto_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_producto_control) {
		this.actualizarPaginaAccionesGenerales(imagen_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_producto_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_producto_control);
		this.actualizarPaginaOrderBy(imagen_producto_control);
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control);
		this.actualizarPaginaAreaBusquedas(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_producto_control) {
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_producto_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_producto_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_producto_control);
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control);
		this.actualizarPaginaAreaBusquedas(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_producto_control) {
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_producto_control) {
		this.actualizarPaginaAbrirLink(imagen_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);				
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		//this.actualizarPaginaFormulario(imagen_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		//this.actualizarPaginaFormulario(imagen_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_producto_control) {
		//this.actualizarPaginaFormulario(imagen_producto_control);
		this.onLoadCombosDefectoFK(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		//this.actualizarPaginaFormulario(imagen_producto_control);
		this.onLoadCombosDefectoFK(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_producto_control) {
		this.actualizarPaginaAbrirLink(imagen_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_producto_control) {
		this.actualizarPaginaTablaDatos(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_producto_control) {
					//super.actualizarPaginaImprimir(imagen_producto_control,"imagen_producto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_producto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_producto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_producto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_producto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_producto_control) {
		//super.actualizarPaginaImprimir(imagen_producto_control,"imagen_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_producto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_producto_control) {
		//super.actualizarPaginaImprimir(imagen_producto_control,"imagen_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_producto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_producto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_producto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_producto_control);
			
		this.actualizarPaginaAbrirLink(imagen_producto_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_producto_control) {
		
		if(imagen_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_producto_control);
		}
		
		if(imagen_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_producto_control) {
		if(imagen_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_productoReturnGeneral",JSON.stringify(imagen_producto_control.imagen_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control) {
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_producto_control, mostrar) {
		
		if(mostrar==true) {
			imagen_producto_funcion1.resaltarRestaurarDivsPagina(false,"imagen_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_producto");
			}			
			
			imagen_producto_funcion1.mostrarDivMensaje(true,imagen_producto_control.strAuxiliarMensaje,imagen_producto_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_producto_funcion1.mostrarDivMensaje(false,imagen_producto_control.strAuxiliarMensaje,imagen_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_producto_control) {
		if(imagen_producto_funcion1.esPaginaForm(imagen_producto_constante1)==true) {
			window.opener.imagen_producto_webcontrol1.actualizarPaginaTablaDatos(imagen_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_producto_control) {
		imagen_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_producto_control.strAuxiliarUrlPagina);
				
		imagen_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_producto_control.strAuxiliarTipo,imagen_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_producto_control) {
		imagen_producto_funcion1.resaltarRestaurarDivMensaje(true,imagen_producto_control.strAuxiliarMensajeAlert,imagen_producto_control.strAuxiliarCssMensaje);
			
		if(imagen_producto_funcion1.esPaginaForm(imagen_producto_constante1)==true) {
			window.opener.imagen_producto_funcion1.resaltarRestaurarDivMensaje(true,imagen_producto_control.strAuxiliarMensajeAlert,imagen_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_producto_control) {
		this.imagen_producto_controlInicial=imagen_producto_control;
			
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_producto_control.strStyleDivArbol,imagen_producto_control.strStyleDivContent
																,imagen_producto_control.strStyleDivOpcionesBanner,imagen_producto_control.strStyleDivExpandirColapsar
																,imagen_producto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_producto_control) {
		this.actualizarCssBotonesPagina(imagen_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_producto_control.tiposReportes,imagen_producto_control.tiposReporte
															 	,imagen_producto_control.tiposPaginacion,imagen_producto_control.tiposAcciones
																,imagen_producto_control.tiposColumnasSelect,imagen_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_producto_control) {
	
		var indexPosition=imagen_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 
				imagen_producto_webcontrol1.cargarCombosproductosFK(imagen_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_producto_control.strRecargarFkTiposNinguno!=null && imagen_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTiposNinguno,",")) { 
					imagen_producto_webcontrol1.cargarCombosproductosFK(imagen_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(imagen_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_producto_funcion1,imagen_producto_control.productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_producto_control) {
		jQuery("#divBusquedaimagen_productoAjaxWebPart").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trimagen_productoCabeceraBusquedas").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_producto").css("display",imagen_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_producto_control.htmlTablaOrderBy!=null
			&& imagen_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_productoAjaxWebPart").html(imagen_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_producto_control.htmlTablaOrderByRel!=null
			&& imagen_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_productoAjaxWebPart").html(imagen_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_productoAjaxWebPart").css("display","none");
			jQuery("#trimagen_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_producto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_producto_control) {
		
		if(!imagen_producto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_producto_control);
		} else {
			jQuery("#divTablaDatosimagen_productosAjaxWebPart").html(imagen_producto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_productos=jQuery("#tblTablaDatosimagen_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_producto_webcontrol1.registrarControlesTableEdition(imagen_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_producto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_producto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_producto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_productosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_producto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_producto_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_productoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_producto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_productoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_producto_control.imagen_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_producto_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_producto_control) {
		var i=0;
		
		i=imagen_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_producto_control.imagen_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_producto_control.imagen_productoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(imagen_producto_control.imagen_productoActual.versionRow);
		
		if(imagen_producto_control.imagen_productoActual.id_producto!=null && imagen_producto_control.imagen_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != imagen_producto_control.imagen_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_3").val(imagen_producto_control.imagen_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(imagen_producto_control.imagen_productoActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_producto_control) {
		imagen_producto_funcion1.registrarControlesTableValidacionEdition(imagen_producto_control,imagen_producto_webcontrol1,imagen_producto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_producto_control) {
		jQuery("#divResumenimagen_productoActualAjaxWebPart").html(imagen_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_producto_control) {
		//jQuery("#divAccionesRelacionesimagen_productoAjaxWebPart").html(imagen_producto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_producto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_producto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_productoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_producto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_producto_control) {
		
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",imagen_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",imagen_producto_control.strVisibleFK_Idproducto);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_producto",id,"inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		imagen_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_producto","producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_productoConstante,strParametros);
		
		//imagen_producto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(imagen_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto",imagen_producto_control.productosFK);

		if(imagen_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_producto_control.idFilaTablaActual+"_3",imagen_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",imagen_producto_control.productosFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(imagen_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(imagen_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val() != imagen_producto_control.idproductoDefaultFK) {
				jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val(imagen_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(imagen_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 
				imagen_producto_webcontrol1.setDefectoValorCombosproductosFK(imagen_producto_control);
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
	onLoadCombosEventosFK(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(imagen_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_producto","FK_Idproducto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
		
			
			if(imagen_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,"imagen_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				imagen_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_producto_control) {
		
		jQuery("#divBusquedaimagen_productoAjaxWebPart").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trimagen_productoCabeceraBusquedas").css("display",imagen_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_producto").css("display",imagen_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_producto").css("display",imagen_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_producto").attr("style",imagen_producto_control.strPermisoMostrarTodos);		
		
		if(imagen_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_productoNuevo").css("display",imagen_producto_control.strPermisoNuevo);
			jQuery("#tdimagen_productoNuevoToolBar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_productoDuplicar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_productoDuplicarToolBar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_productoNuevoGuardarCambios").css("display",imagen_producto_control.strPermisoNuevo);
			jQuery("#tdimagen_productoNuevoGuardarCambiosToolBar").css("display",imagen_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_productoCopiar").css("display",imagen_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_productoCopiarToolBar").css("display",imagen_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_productoConEditar").css("display",imagen_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_productoGuardarCambios").css("display",imagen_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_productoGuardarCambiosToolBar").css("display",imagen_producto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_productoCerrarPagina").css("display",imagen_producto_control.strPermisoPopup);		
		jQuery("#tdimagen_productoCerrarPaginaToolBar").css("display",imagen_producto_control.strPermisoPopup);
		//jQuery("#trimagen_productoAccionesRelaciones").css("display",imagen_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Productos";
		sTituloBanner+=" - " + imagen_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_productoRelacionesToolBar").css("display",imagen_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_producto").css("display",imagen_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_producto_webcontrol1.registrarEventosControles();
		
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			imagen_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_producto_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_producto_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);	
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

var imagen_producto_webcontrol1 = new imagen_producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_producto_webcontrol,imagen_producto_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_producto_webcontrol1 = imagen_producto_webcontrol1;


if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_producto_webcontrol1.onLoadWindow; 
}

//</script>