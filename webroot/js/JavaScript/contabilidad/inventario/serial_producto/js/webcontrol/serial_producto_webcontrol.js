//<script type="text/javascript" language="javascript">



//var serial_productoJQueryPaginaWebInteraccion= function (serial_producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {serial_producto_constante,serial_producto_constante1} from '../util/serial_producto_constante.js';

import {serial_producto_funcion,serial_producto_funcion1} from '../util/serial_producto_funcion.js';


class serial_producto_webcontrol extends GeneralEntityWebControl {
	
	serial_producto_control=null;
	serial_producto_controlInicial=null;
	serial_producto_controlAuxiliar=null;
		
	//if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(serial_producto_control) {
		super();
		
		this.serial_producto_control=serial_producto_control;
	}
		
	actualizarVariablesPagina(serial_producto_control) {
		
		if(serial_producto_control.action=="index" || serial_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(serial_producto_control);
			
		} 
		
		
		else if(serial_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(serial_producto_control);
		
		} else if(serial_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(serial_producto_control);
		
		} else if(serial_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(serial_producto_control);
		
		} else if(serial_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(serial_producto_control);
			
		} else if(serial_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(serial_producto_control);
			
		} else if(serial_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(serial_producto_control);
		
		} else if(serial_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(serial_producto_control);		
		
		} else if(serial_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(serial_producto_control);
		
		} else if(serial_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(serial_producto_control);
		
		} else if(serial_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(serial_producto_control);
		
		} else if(serial_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(serial_producto_control);
		
		}  else if(serial_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(serial_producto_control);
		
		} else if(serial_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(serial_producto_control);
		
		} else if(serial_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(serial_producto_control);
		
		} else if(serial_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(serial_producto_control);
		
		} else if(serial_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(serial_producto_control);
		
		} else if(serial_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(serial_producto_control);
		
		} else if(serial_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(serial_producto_control);
		
		} else if(serial_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(serial_producto_control);		
		
		} else if(serial_producto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(serial_producto_control);		
		
		} else if(serial_producto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(serial_producto_control);		
		
		} else if(serial_producto_control.action.includes("Busqueda") ||
				  serial_producto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(serial_producto_control);
			
		} else if(serial_producto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(serial_producto_control)
		}
		
		
		
	
		else if(serial_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(serial_producto_control);	
		
		} else if(serial_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(serial_producto_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + serial_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(serial_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(serial_producto_control) {
		this.actualizarPaginaAccionesGenerales(serial_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(serial_producto_control) {
		
		this.actualizarPaginaCargaGeneral(serial_producto_control);
		this.actualizarPaginaOrderBy(serial_producto_control);
		this.actualizarPaginaTablaDatos(serial_producto_control);
		this.actualizarPaginaCargaGeneralControles(serial_producto_control);
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(serial_producto_control);
		this.actualizarPaginaAreaBusquedas(serial_producto_control);
		this.actualizarPaginaCargaCombosFK(serial_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(serial_producto_control) {
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(serial_producto_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(serial_producto_control) {
		
		this.actualizarPaginaCargaGeneral(serial_producto_control);
		this.actualizarPaginaTablaDatos(serial_producto_control);
		this.actualizarPaginaCargaGeneralControles(serial_producto_control);
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(serial_producto_control);
		this.actualizarPaginaAreaBusquedas(serial_producto_control);
		this.actualizarPaginaCargaCombosFK(serial_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(serial_producto_control) {
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(serial_producto_control) {
		this.actualizarPaginaAbrirLink(serial_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);				
		//this.actualizarPaginaFormulario(serial_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);
		//this.actualizarPaginaFormulario(serial_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);
		//this.actualizarPaginaFormulario(serial_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(serial_producto_control) {
		//this.actualizarPaginaFormulario(serial_producto_control);
		this.onLoadCombosDefectoFK(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);
		//this.actualizarPaginaFormulario(serial_producto_control);
		this.onLoadCombosDefectoFK(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(serial_producto_control) {
		this.actualizarPaginaAbrirLink(serial_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(serial_producto_control) {
		this.actualizarPaginaTablaDatos(serial_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(serial_producto_control) {
					//super.actualizarPaginaImprimir(serial_producto_control,"serial_producto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",serial_producto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("serial_producto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(serial_producto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(serial_producto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(serial_producto_control) {
		//super.actualizarPaginaImprimir(serial_producto_control,"serial_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("serial_producto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(serial_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",serial_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(serial_producto_control) {
		//super.actualizarPaginaImprimir(serial_producto_control,"serial_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("serial_producto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(serial_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",serial_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(serial_producto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(serial_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(serial_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(serial_producto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(serial_producto_control);
			
		this.actualizarPaginaAbrirLink(serial_producto_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(serial_producto_control) {
		
		if(serial_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(serial_producto_control);
		}
		
		if(serial_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(serial_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(serial_producto_control) {
		if(serial_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("serial_productoReturnGeneral",JSON.stringify(serial_producto_control.serial_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(serial_producto_control) {
		if(serial_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && serial_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(serial_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(serial_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(serial_producto_control, mostrar) {
		
		if(mostrar==true) {
			serial_producto_funcion1.resaltarRestaurarDivsPagina(false,"serial_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				serial_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"serial_producto");
			}			
			
			serial_producto_funcion1.mostrarDivMensaje(true,serial_producto_control.strAuxiliarMensaje,serial_producto_control.strAuxiliarCssMensaje);
		
		} else {
			serial_producto_funcion1.mostrarDivMensaje(false,serial_producto_control.strAuxiliarMensaje,serial_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(serial_producto_control) {
		if(serial_producto_funcion1.esPaginaForm(serial_producto_constante1)==true) {
			window.opener.serial_producto_webcontrol1.actualizarPaginaTablaDatos(serial_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(serial_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(serial_producto_control) {
		serial_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(serial_producto_control.strAuxiliarUrlPagina);
				
		serial_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(serial_producto_control.strAuxiliarTipo,serial_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(serial_producto_control) {
		serial_producto_funcion1.resaltarRestaurarDivMensaje(true,serial_producto_control.strAuxiliarMensajeAlert,serial_producto_control.strAuxiliarCssMensaje);
			
		if(serial_producto_funcion1.esPaginaForm(serial_producto_constante1)==true) {
			window.opener.serial_producto_funcion1.resaltarRestaurarDivMensaje(true,serial_producto_control.strAuxiliarMensajeAlert,serial_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(serial_producto_control) {
		this.serial_producto_controlInicial=serial_producto_control;
			
		if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(serial_producto_control.strStyleDivArbol,serial_producto_control.strStyleDivContent
																,serial_producto_control.strStyleDivOpcionesBanner,serial_producto_control.strStyleDivExpandirColapsar
																,serial_producto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=serial_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",serial_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(serial_producto_control) {
		this.actualizarCssBotonesPagina(serial_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(serial_producto_control.tiposReportes,serial_producto_control.tiposReporte
															 	,serial_producto_control.tiposPaginacion,serial_producto_control.tiposAcciones
																,serial_producto_control.tiposColumnasSelect,serial_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(serial_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(serial_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(serial_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(serial_producto_control) {
	
		var indexPosition=serial_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=serial_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(serial_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.cargarCombosproductosFK(serial_producto_control);
			}

			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.cargarCombosbodegasFK(serial_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(serial_producto_control.strRecargarFkTiposNinguno!=null && serial_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && serial_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(serial_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTiposNinguno,",")) { 
					serial_producto_webcontrol1.cargarCombosproductosFK(serial_producto_control);
				}

				if(serial_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTiposNinguno,",")) { 
					serial_producto_webcontrol1.cargarCombosbodegasFK(serial_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(serial_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,serial_producto_funcion1,serial_producto_control.productosFK);
	}

	cargarComboEditarTablabodegaFK(serial_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,serial_producto_funcion1,serial_producto_control.bodegasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(serial_producto_control) {
		jQuery("#divBusquedaserial_productoAjaxWebPart").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trserial_productoCabeceraBusquedas").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaserial_producto").css("display",serial_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(serial_producto_control.htmlTablaOrderBy!=null
			&& serial_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByserial_productoAjaxWebPart").html(serial_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//serial_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(serial_producto_control.htmlTablaOrderByRel!=null
			&& serial_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelserial_productoAjaxWebPart").html(serial_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(serial_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaserial_productoAjaxWebPart").css("display","none");
			jQuery("#trserial_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaserial_producto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(serial_producto_control) {
		
		if(!serial_producto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(serial_producto_control);
		} else {
			jQuery("#divTablaDatosserial_productosAjaxWebPart").html(serial_producto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosserial_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosserial_productos=jQuery("#tblTablaDatosserial_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("serial_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',serial_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			serial_producto_webcontrol1.registrarControlesTableEdition(serial_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		serial_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(serial_producto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("serial_producto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(serial_producto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosserial_productosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(serial_producto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(serial_producto_control);
		
		const divOrderBy = document.getElementById("divOrderByserial_productoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(serial_producto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelserial_productoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(serial_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(serial_producto_control.serial_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(serial_producto_control);			
		}
	}
	
	actualizarCamposFilaTabla(serial_producto_control) {
		var i=0;
		
		i=serial_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(serial_producto_control.serial_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(serial_producto_control.serial_productoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(serial_producto_control.serial_productoActual.versionRow);
		
		if(serial_producto_control.serial_productoActual.id_producto!=null && serial_producto_control.serial_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != serial_producto_control.serial_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_3").val(serial_producto_control.serial_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(serial_producto_control.serial_productoActual.nro_serial);
		jQuery("#t-cel_"+i+"_5").val(serial_producto_control.serial_productoActual.ingresado);
		jQuery("#t-cel_"+i+"_6").val(serial_producto_control.serial_productoActual.proveedor_mid);
		jQuery("#t-cel_"+i+"_7").val(serial_producto_control.serial_productoActual.modulo_ingreso);
		jQuery("#t-cel_"+i+"_8").val(serial_producto_control.serial_productoActual.nro_documento_ingreso);
		jQuery("#t-cel_"+i+"_9").val(serial_producto_control.serial_productoActual.salida);
		jQuery("#t-cel_"+i+"_10").val(serial_producto_control.serial_productoActual.cliente_mid);
		jQuery("#t-cel_"+i+"_11").val(serial_producto_control.serial_productoActual.modulo_salida);
		
		if(serial_producto_control.serial_productoActual.id_bodega!=null && serial_producto_control.serial_productoActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != serial_producto_control.serial_productoActual.id_bodega) {
				jQuery("#t-cel_"+i+"_12").val(serial_producto_control.serial_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_13").val(serial_producto_control.serial_productoActual.nro_item);
		jQuery("#t-cel_"+i+"_14").val(serial_producto_control.serial_productoActual.nro_documento_salida);
		jQuery("#t-cel_"+i+"_15").val(serial_producto_control.serial_productoActual.nro_items);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(serial_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(serial_producto_control) {
		serial_producto_funcion1.registrarControlesTableValidacionEdition(serial_producto_control,serial_producto_webcontrol1,serial_producto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(serial_producto_control) {
		jQuery("#divResumenserial_productoActualAjaxWebPart").html(serial_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(serial_producto_control) {
		//jQuery("#divAccionesRelacionesserial_productoAjaxWebPart").html(serial_producto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("serial_producto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(serial_producto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesserial_productoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		serial_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(serial_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(serial_producto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(serial_producto_control) {
		
		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",serial_producto_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",serial_producto_control.strVisibleFK_Idbodega);
		}

		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",serial_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",serial_producto_control.strVisibleFK_Idproducto);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionserial_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("serial_producto",id,"inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		serial_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("serial_producto","producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		serial_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("serial_producto","bodega","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_productoConstante,strParametros);
		
		//serial_producto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(serial_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto",serial_producto_control.productosFK);

		if(serial_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+serial_producto_control.idFilaTablaActual+"_3",serial_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",serial_producto_control.productosFK);

	};

	cargarCombosbodegasFK(serial_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega",serial_producto_control.bodegasFK);

		if(serial_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+serial_producto_control.idFilaTablaActual+"_12",serial_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",serial_producto_control.bodegasFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(serial_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(serial_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(serial_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(serial_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val() != serial_producto_control.idproductoDefaultFK) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto").val(serial_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(serial_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(serial_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(serial_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val() != serial_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega").val(serial_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(serial_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+serial_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//serial_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(serial_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(serial_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.setDefectoValorCombosproductosFK(serial_producto_control);
			}

			if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTipos,",")) { 
				serial_producto_webcontrol1.setDefectoValorCombosbodegasFK(serial_producto_control);
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
	onLoadCombosEventosFK(serial_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(serial_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",serial_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				serial_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(serial_producto_control);
			//}

			//if(serial_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",serial_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				serial_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(serial_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(serial_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(serial_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(serial_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("serial_producto","FK_Idbodega","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("serial_producto","FK_Idproducto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
		
			
			if(serial_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("serial_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("serial_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(serial_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,"serial_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				serial_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+serial_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				serial_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(serial_producto_control) {
		
		jQuery("#divBusquedaserial_productoAjaxWebPart").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trserial_productoCabeceraBusquedas").css("display",serial_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaserial_producto").css("display",serial_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteserial_producto").css("display",serial_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosserial_producto").attr("style",serial_producto_control.strPermisoMostrarTodos);		
		
		if(serial_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdserial_productoNuevo").css("display",serial_producto_control.strPermisoNuevo);
			jQuery("#tdserial_productoNuevoToolBar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdserial_productoDuplicar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdserial_productoDuplicarToolBar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdserial_productoNuevoGuardarCambios").css("display",serial_producto_control.strPermisoNuevo);
			jQuery("#tdserial_productoNuevoGuardarCambiosToolBar").css("display",serial_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(serial_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdserial_productoCopiar").css("display",serial_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdserial_productoCopiarToolBar").css("display",serial_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdserial_productoConEditar").css("display",serial_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdserial_productoGuardarCambios").css("display",serial_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdserial_productoGuardarCambiosToolBar").css("display",serial_producto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdserial_productoCerrarPagina").css("display",serial_producto_control.strPermisoPopup);		
		jQuery("#tdserial_productoCerrarPaginaToolBar").css("display",serial_producto_control.strPermisoPopup);
		//jQuery("#trserial_productoAccionesRelaciones").css("display",serial_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=serial_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + serial_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + serial_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Seriales Producto";
		sTituloBanner+=" - " + serial_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + serial_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdserial_productoRelacionesToolBar").css("display",serial_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosserial_producto").css("display",serial_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		serial_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		serial_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		serial_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		serial_producto_webcontrol1.registrarEventosControles();
		
		if(serial_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
			serial_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(serial_producto_constante1.STR_ES_RELACIONES=="true") {
			if(serial_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				serial_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(serial_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(serial_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				serial_producto_webcontrol1.onLoad();
			
			//} else {
				//if(serial_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			serial_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("serial_producto","inventario","",serial_producto_funcion1,serial_producto_webcontrol1,serial_producto_constante1);	
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

var serial_producto_webcontrol1 = new serial_producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {serial_producto_webcontrol,serial_producto_webcontrol1};

//Para ser llamado desde window.opener
window.serial_producto_webcontrol1 = serial_producto_webcontrol1;


if(serial_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = serial_producto_webcontrol1.onLoadWindow; 
}

//</script>