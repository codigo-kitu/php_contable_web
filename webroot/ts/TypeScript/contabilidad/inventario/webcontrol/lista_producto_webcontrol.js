//<script type="text/javascript" language="javascript">



//var lista_productoJQueryPaginaWebInteraccion= function (lista_producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {lista_producto_constante,lista_producto_constante1} from '../util/lista_producto_constante.js';

import {lista_producto_funcion,lista_producto_funcion1} from '../util/lista_producto_funcion.js';


class lista_producto_webcontrol extends GeneralEntityWebControl {
	
	lista_producto_control=null;
	lista_producto_controlInicial=null;
	lista_producto_controlAuxiliar=null;
		
	//if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lista_producto_control) {
		super();
		
		this.lista_producto_control=lista_producto_control;
	}
		
	actualizarVariablesPagina(lista_producto_control) {
		
		if(lista_producto_control.action=="index" || lista_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lista_producto_control);
			
		} 
		
		
		else if(lista_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(lista_producto_control);
		
		} else if(lista_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(lista_producto_control);
		
		} else if(lista_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(lista_producto_control);
		
		} else if(lista_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(lista_producto_control);
			
		} else if(lista_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(lista_producto_control);
			
		} else if(lista_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(lista_producto_control);
		
		} else if(lista_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(lista_producto_control);		
		
		} else if(lista_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(lista_producto_control);
		
		} else if(lista_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(lista_producto_control);
		
		} else if(lista_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(lista_producto_control);
		
		} else if(lista_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(lista_producto_control);
		
		}  else if(lista_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lista_producto_control);
		
		} else if(lista_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(lista_producto_control);
		
		} else if(lista_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(lista_producto_control);
		
		} else if(lista_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(lista_producto_control);
		
		} else if(lista_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(lista_producto_control);
		
		} else if(lista_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(lista_producto_control);
		
		} else if(lista_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lista_producto_control);
		
		} else if(lista_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(lista_producto_control);
		
		} else if(lista_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(lista_producto_control);
		
		} else if(lista_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lista_producto_control);		
		
		} else if(lista_producto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(lista_producto_control);		
		
		} else if(lista_producto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(lista_producto_control);		
		
		} else if(lista_producto_control.action.includes("Busqueda") ||
				  lista_producto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(lista_producto_control);
			
		} else if(lista_producto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(lista_producto_control)
		}
		
		
		
	
		else if(lista_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lista_producto_control);	
		
		} else if(lista_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lista_producto_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + lista_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(lista_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(lista_producto_control) {
		this.actualizarPaginaAccionesGenerales(lista_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(lista_producto_control) {
		
		this.actualizarPaginaCargaGeneral(lista_producto_control);
		this.actualizarPaginaOrderBy(lista_producto_control);
		this.actualizarPaginaTablaDatos(lista_producto_control);
		this.actualizarPaginaCargaGeneralControles(lista_producto_control);
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_producto_control);
		this.actualizarPaginaAreaBusquedas(lista_producto_control);
		this.actualizarPaginaCargaCombosFK(lista_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(lista_producto_control) {
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lista_producto_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(lista_producto_control) {
		
		this.actualizarPaginaCargaGeneral(lista_producto_control);
		this.actualizarPaginaTablaDatos(lista_producto_control);
		this.actualizarPaginaCargaGeneralControles(lista_producto_control);
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_producto_control);
		this.actualizarPaginaAreaBusquedas(lista_producto_control);
		this.actualizarPaginaCargaCombosFK(lista_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(lista_producto_control) {
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(lista_producto_control) {
		this.actualizarPaginaAbrirLink(lista_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);				
		//this.actualizarPaginaFormulario(lista_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);
		//this.actualizarPaginaFormulario(lista_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);
		//this.actualizarPaginaFormulario(lista_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(lista_producto_control) {
		//this.actualizarPaginaFormulario(lista_producto_control);
		this.onLoadCombosDefectoFK(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);
		//this.actualizarPaginaFormulario(lista_producto_control);
		this.onLoadCombosDefectoFK(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(lista_producto_control) {
		this.actualizarPaginaAbrirLink(lista_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(lista_producto_control) {
		this.actualizarPaginaTablaDatos(lista_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(lista_producto_control) {
					//super.actualizarPaginaImprimir(lista_producto_control,"lista_producto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_producto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("lista_producto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(lista_producto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_producto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(lista_producto_control) {
		//super.actualizarPaginaImprimir(lista_producto_control,"lista_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("lista_producto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(lista_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(lista_producto_control) {
		//super.actualizarPaginaImprimir(lista_producto_control,"lista_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("lista_producto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(lista_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",lista_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(lista_producto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(lista_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(lista_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(lista_producto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(lista_producto_control);
			
		this.actualizarPaginaAbrirLink(lista_producto_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(lista_producto_control) {
		
		if(lista_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lista_producto_control);
		}
		
		if(lista_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(lista_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(lista_producto_control) {
		if(lista_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("lista_productoReturnGeneral",JSON.stringify(lista_producto_control.lista_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(lista_producto_control) {
		if(lista_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lista_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lista_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lista_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(lista_producto_control, mostrar) {
		
		if(mostrar==true) {
			lista_producto_funcion1.resaltarRestaurarDivsPagina(false,"lista_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lista_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"lista_producto");
			}			
			
			lista_producto_funcion1.mostrarDivMensaje(true,lista_producto_control.strAuxiliarMensaje,lista_producto_control.strAuxiliarCssMensaje);
		
		} else {
			lista_producto_funcion1.mostrarDivMensaje(false,lista_producto_control.strAuxiliarMensaje,lista_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lista_producto_control) {
		if(lista_producto_funcion1.esPaginaForm(lista_producto_constante1)==true) {
			window.opener.lista_producto_webcontrol1.actualizarPaginaTablaDatos(lista_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(lista_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(lista_producto_control) {
		lista_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lista_producto_control.strAuxiliarUrlPagina);
				
		lista_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lista_producto_control.strAuxiliarTipo,lista_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lista_producto_control) {
		lista_producto_funcion1.resaltarRestaurarDivMensaje(true,lista_producto_control.strAuxiliarMensajeAlert,lista_producto_control.strAuxiliarCssMensaje);
			
		if(lista_producto_funcion1.esPaginaForm(lista_producto_constante1)==true) {
			window.opener.lista_producto_funcion1.resaltarRestaurarDivMensaje(true,lista_producto_control.strAuxiliarMensajeAlert,lista_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(lista_producto_control) {
		this.lista_producto_controlInicial=lista_producto_control;
			
		if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lista_producto_control.strStyleDivArbol,lista_producto_control.strStyleDivContent
																,lista_producto_control.strStyleDivOpcionesBanner,lista_producto_control.strStyleDivExpandirColapsar
																,lista_producto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=lista_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",lista_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(lista_producto_control) {
		this.actualizarCssBotonesPagina(lista_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lista_producto_control.tiposReportes,lista_producto_control.tiposReporte
															 	,lista_producto_control.tiposPaginacion,lista_producto_control.tiposAcciones
																,lista_producto_control.tiposColumnasSelect,lista_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(lista_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lista_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lista_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(lista_producto_control) {
	
		var indexPosition=lista_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lista_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(lista_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosproductosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosunidad_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosunidad_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscategoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombossub_categoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombostipo_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosbodegasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscuenta_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscuenta_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarComboscuenta_inventariosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_suplidorsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosimpuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosimpuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosimpuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_impuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_impuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosotro_impuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosretencionsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosretencion_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.cargarCombosretencion_comprassFK(lista_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lista_producto_control.strRecargarFkTiposNinguno!=null && lista_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && lista_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosproductosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosunidad_comprasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosunidad_ventasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscategoria_productosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombossub_categoria_productosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombostipo_productosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosbodegasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscuenta_comprasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscuenta_ventasFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarComboscuenta_inventariosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_suplidorsFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosimpuestosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosimpuesto_ventassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosimpuesto_comprassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_impuestosFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_impuesto_ventassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosotro_impuesto_comprassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosretencionsFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosretencion_ventassFK(lista_producto_control);
				}

				if(lista_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTiposNinguno,",")) { 
					lista_producto_webcontrol1.cargarCombosretencion_comprassFK(lista_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.productosFK);
	}

	cargarComboEditarTablaunidad_compraFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.unidad_comprasFK);
	}

	cargarComboEditarTablaunidad_ventaFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.unidad_ventasFK);
	}

	cargarComboEditarTablacategoria_productoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.categoria_productosFK);
	}

	cargarComboEditarTablasub_categoria_productoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.sub_categoria_productosFK);
	}

	cargarComboEditarTablatipo_productoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.tipo_productosFK);
	}

	cargarComboEditarTablabodegaFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.bodegasFK);
	}

	cargarComboEditarTablacuenta_compraFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.cuenta_comprasFK);
	}

	cargarComboEditarTablacuenta_ventaFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.cuenta_ventasFK);
	}

	cargarComboEditarTablacuenta_inventarioFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.cuenta_inventariosFK);
	}

	cargarComboEditarTablaotro_suplidorFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_suplidorsFK);
	}

	cargarComboEditarTablaimpuestoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.impuestosFK);
	}

	cargarComboEditarTablaimpuesto_ventasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.impuesto_ventassFK);
	}

	cargarComboEditarTablaimpuesto_comprasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.impuesto_comprassFK);
	}

	cargarComboEditarTablaotro_impuestoFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_impuestosFK);
	}

	cargarComboEditarTablaotro_impuesto_ventasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_impuesto_ventassFK);
	}

	cargarComboEditarTablaotro_impuesto_comprasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.otro_impuesto_comprassFK);
	}

	cargarComboEditarTablaretencionFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.retencionsFK);
	}

	cargarComboEditarTablaretencion_ventasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.retencion_ventassFK);
	}

	cargarComboEditarTablaretencion_comprasFK(lista_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_producto_funcion1,lista_producto_control.retencion_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(lista_producto_control) {
		jQuery("#divBusquedalista_productoAjaxWebPart").css("display",lista_producto_control.strPermisoBusqueda);
		jQuery("#trlista_productoCabeceraBusquedas").css("display",lista_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedalista_producto").css("display",lista_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(lista_producto_control.htmlTablaOrderBy!=null
			&& lista_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylista_productoAjaxWebPart").html(lista_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//lista_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(lista_producto_control.htmlTablaOrderByRel!=null
			&& lista_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellista_productoAjaxWebPart").html(lista_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(lista_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalista_productoAjaxWebPart").css("display","none");
			jQuery("#trlista_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalista_producto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(lista_producto_control) {
		
		if(!lista_producto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(lista_producto_control);
		} else {
			jQuery("#divTablaDatoslista_productosAjaxWebPart").html(lista_producto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslista_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslista_productos=jQuery("#tblTablaDatoslista_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("lista_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',lista_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			lista_producto_webcontrol1.registrarControlesTableEdition(lista_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		lista_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(lista_producto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("lista_producto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(lista_producto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoslista_productosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(lista_producto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(lista_producto_control);
		
		const divOrderBy = document.getElementById("divOrderBylista_productoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(lista_producto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRellista_productoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(lista_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(lista_producto_control.lista_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(lista_producto_control);			
		}
	}
	
	actualizarCamposFilaTabla(lista_producto_control) {
		var i=0;
		
		i=lista_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(lista_producto_control.lista_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(lista_producto_control.lista_productoActual.versionRow);
		
		if(lista_producto_control.lista_productoActual.id_producto!=null && lista_producto_control.lista_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != lista_producto_control.lista_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_2").val(lista_producto_control.lista_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(lista_producto_control.lista_productoActual.codigo_producto);
		jQuery("#t-cel_"+i+"_4").val(lista_producto_control.lista_productoActual.descripcion_producto);
		jQuery("#t-cel_"+i+"_5").val(lista_producto_control.lista_productoActual.precio1);
		jQuery("#t-cel_"+i+"_6").val(lista_producto_control.lista_productoActual.precio2);
		jQuery("#t-cel_"+i+"_7").val(lista_producto_control.lista_productoActual.precio3);
		jQuery("#t-cel_"+i+"_8").val(lista_producto_control.lista_productoActual.precio4);
		jQuery("#t-cel_"+i+"_9").val(lista_producto_control.lista_productoActual.costo);
		
		if(lista_producto_control.lista_productoActual.id_unidad_compra!=null && lista_producto_control.lista_productoActual.id_unidad_compra>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != lista_producto_control.lista_productoActual.id_unidad_compra) {
				jQuery("#t-cel_"+i+"_10").val(lista_producto_control.lista_productoActual.id_unidad_compra).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(lista_producto_control.lista_productoActual.unidad_en_compra);
		jQuery("#t-cel_"+i+"_12").val(lista_producto_control.lista_productoActual.equivalencia_en_compra);
		
		if(lista_producto_control.lista_productoActual.id_unidad_venta!=null && lista_producto_control.lista_productoActual.id_unidad_venta>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != lista_producto_control.lista_productoActual.id_unidad_venta) {
				jQuery("#t-cel_"+i+"_13").val(lista_producto_control.lista_productoActual.id_unidad_venta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(lista_producto_control.lista_productoActual.unidad_en_venta);
		jQuery("#t-cel_"+i+"_15").val(lista_producto_control.lista_productoActual.equivalencia_en_venta);
		jQuery("#t-cel_"+i+"_16").val(lista_producto_control.lista_productoActual.cantidad_total);
		jQuery("#t-cel_"+i+"_17").val(lista_producto_control.lista_productoActual.cantidad_minima);
		
		if(lista_producto_control.lista_productoActual.id_categoria_producto!=null && lista_producto_control.lista_productoActual.id_categoria_producto>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != lista_producto_control.lista_productoActual.id_categoria_producto) {
				jQuery("#t-cel_"+i+"_18").val(lista_producto_control.lista_productoActual.id_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_sub_categoria_producto!=null && lista_producto_control.lista_productoActual.id_sub_categoria_producto>-1){
			if(jQuery("#t-cel_"+i+"_19").val() != lista_producto_control.lista_productoActual.id_sub_categoria_producto) {
				jQuery("#t-cel_"+i+"_19").val(lista_producto_control.lista_productoActual.id_sub_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_19").select2("val", null);
			if(jQuery("#t-cel_"+i+"_19").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_19").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_20").val(lista_producto_control.lista_productoActual.acepta_lote);
		jQuery("#t-cel_"+i+"_21").val(lista_producto_control.lista_productoActual.valor_inventario);
		jQuery("#t-cel_"+i+"_22").val(lista_producto_control.lista_productoActual.imagen);
		jQuery("#t-cel_"+i+"_23").val(lista_producto_control.lista_productoActual.incremento1);
		jQuery("#t-cel_"+i+"_24").val(lista_producto_control.lista_productoActual.incremento2);
		jQuery("#t-cel_"+i+"_25").val(lista_producto_control.lista_productoActual.incremento3);
		jQuery("#t-cel_"+i+"_26").val(lista_producto_control.lista_productoActual.incremento4);
		jQuery("#t-cel_"+i+"_27").val(lista_producto_control.lista_productoActual.codigo_fabricante);
		jQuery("#t-cel_"+i+"_28").val(lista_producto_control.lista_productoActual.producto_fisico);
		jQuery("#t-cel_"+i+"_29").val(lista_producto_control.lista_productoActual.situacion_producto);
		
		if(lista_producto_control.lista_productoActual.id_tipo_producto!=null && lista_producto_control.lista_productoActual.id_tipo_producto>-1){
			if(jQuery("#t-cel_"+i+"_30").val() != lista_producto_control.lista_productoActual.id_tipo_producto) {
				jQuery("#t-cel_"+i+"_30").val(lista_producto_control.lista_productoActual.id_tipo_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_30").select2("val", null);
			if(jQuery("#t-cel_"+i+"_30").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_30").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_31").val(lista_producto_control.lista_productoActual.tipo_producto_codigo);
		
		if(lista_producto_control.lista_productoActual.id_bodega!=null && lista_producto_control.lista_productoActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_32").val() != lista_producto_control.lista_productoActual.id_bodega) {
				jQuery("#t-cel_"+i+"_32").val(lista_producto_control.lista_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_32").select2("val", null);
			if(jQuery("#t-cel_"+i+"_32").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_32").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_33").val(lista_producto_control.lista_productoActual.mostrar_componente);
		jQuery("#t-cel_"+i+"_34").val(lista_producto_control.lista_productoActual.factura_sin_stock);
		jQuery("#t-cel_"+i+"_35").val(lista_producto_control.lista_productoActual.avisa_expiracion);
		jQuery("#t-cel_"+i+"_36").val(lista_producto_control.lista_productoActual.factura_con_precio);
		jQuery("#t-cel_"+i+"_37").val(lista_producto_control.lista_productoActual.producto_equivalente);
		
		if(lista_producto_control.lista_productoActual.id_cuenta_compra!=null && lista_producto_control.lista_productoActual.id_cuenta_compra>-1){
			if(jQuery("#t-cel_"+i+"_38").val() != lista_producto_control.lista_productoActual.id_cuenta_compra) {
				jQuery("#t-cel_"+i+"_38").val(lista_producto_control.lista_productoActual.id_cuenta_compra).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_38").select2("val", null);
			if(jQuery("#t-cel_"+i+"_38").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_38").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_cuenta_venta!=null && lista_producto_control.lista_productoActual.id_cuenta_venta>-1){
			if(jQuery("#t-cel_"+i+"_39").val() != lista_producto_control.lista_productoActual.id_cuenta_venta) {
				jQuery("#t-cel_"+i+"_39").val(lista_producto_control.lista_productoActual.id_cuenta_venta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_39").select2("val", null);
			if(jQuery("#t-cel_"+i+"_39").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_39").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_cuenta_inventario!=null && lista_producto_control.lista_productoActual.id_cuenta_inventario>-1){
			if(jQuery("#t-cel_"+i+"_40").val() != lista_producto_control.lista_productoActual.id_cuenta_inventario) {
				jQuery("#t-cel_"+i+"_40").val(lista_producto_control.lista_productoActual.id_cuenta_inventario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_40").select2("val", null);
			if(jQuery("#t-cel_"+i+"_40").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_40").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_41").val(lista_producto_control.lista_productoActual.cuenta_compra_codigo);
		jQuery("#t-cel_"+i+"_42").val(lista_producto_control.lista_productoActual.cuenta_venta_codigo);
		jQuery("#t-cel_"+i+"_43").val(lista_producto_control.lista_productoActual.cuenta_inventario_codigo);
		
		if(lista_producto_control.lista_productoActual.id_otro_suplidor!=null && lista_producto_control.lista_productoActual.id_otro_suplidor>-1){
			if(jQuery("#t-cel_"+i+"_44").val() != lista_producto_control.lista_productoActual.id_otro_suplidor) {
				jQuery("#t-cel_"+i+"_44").val(lista_producto_control.lista_productoActual.id_otro_suplidor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_44").select2("val", null);
			if(jQuery("#t-cel_"+i+"_44").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_44").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_impuesto!=null && lista_producto_control.lista_productoActual.id_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_45").val() != lista_producto_control.lista_productoActual.id_impuesto) {
				jQuery("#t-cel_"+i+"_45").val(lista_producto_control.lista_productoActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_45").select2("val", null);
			if(jQuery("#t-cel_"+i+"_45").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_45").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_impuesto_ventas!=null && lista_producto_control.lista_productoActual.id_impuesto_ventas>-1){
			if(jQuery("#t-cel_"+i+"_46").val() != lista_producto_control.lista_productoActual.id_impuesto_ventas) {
				jQuery("#t-cel_"+i+"_46").val(lista_producto_control.lista_productoActual.id_impuesto_ventas).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_46").select2("val", null);
			if(jQuery("#t-cel_"+i+"_46").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_46").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_impuesto_compras!=null && lista_producto_control.lista_productoActual.id_impuesto_compras>-1){
			if(jQuery("#t-cel_"+i+"_47").val() != lista_producto_control.lista_productoActual.id_impuesto_compras) {
				jQuery("#t-cel_"+i+"_47").val(lista_producto_control.lista_productoActual.id_impuesto_compras).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_47").select2("val", null);
			if(jQuery("#t-cel_"+i+"_47").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_47").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_48").val(lista_producto_control.lista_productoActual.impuesto1_en_ventas);
		jQuery("#t-cel_"+i+"_49").val(lista_producto_control.lista_productoActual.impuesto1_en_compras);
		jQuery("#t-cel_"+i+"_50").val(lista_producto_control.lista_productoActual.ultima_venta);
		
		if(lista_producto_control.lista_productoActual.id_otro_impuesto!=null && lista_producto_control.lista_productoActual.id_otro_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_51").val() != lista_producto_control.lista_productoActual.id_otro_impuesto) {
				jQuery("#t-cel_"+i+"_51").val(lista_producto_control.lista_productoActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_51").select2("val", null);
			if(jQuery("#t-cel_"+i+"_51").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_51").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_otro_impuesto_ventas!=null && lista_producto_control.lista_productoActual.id_otro_impuesto_ventas>-1){
			if(jQuery("#t-cel_"+i+"_52").val() != lista_producto_control.lista_productoActual.id_otro_impuesto_ventas) {
				jQuery("#t-cel_"+i+"_52").val(lista_producto_control.lista_productoActual.id_otro_impuesto_ventas).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_52").select2("val", null);
			if(jQuery("#t-cel_"+i+"_52").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_52").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_otro_impuesto_compras!=null && lista_producto_control.lista_productoActual.id_otro_impuesto_compras>-1){
			if(jQuery("#t-cel_"+i+"_53").val() != lista_producto_control.lista_productoActual.id_otro_impuesto_compras) {
				jQuery("#t-cel_"+i+"_53").val(lista_producto_control.lista_productoActual.id_otro_impuesto_compras).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_53").select2("val", null);
			if(jQuery("#t-cel_"+i+"_53").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_53").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_54").val(lista_producto_control.lista_productoActual.otro_impuesto_ventas_codigo);
		jQuery("#t-cel_"+i+"_55").val(lista_producto_control.lista_productoActual.otro_impuesto_compras_codigo);
		jQuery("#t-cel_"+i+"_56").val(lista_producto_control.lista_productoActual.precio_de_compra_0);
		jQuery("#t-cel_"+i+"_57").val(lista_producto_control.lista_productoActual.precio_actualizado);
		jQuery("#t-cel_"+i+"_58").val(lista_producto_control.lista_productoActual.requiere_nro_serie);
		jQuery("#t-cel_"+i+"_59").val(lista_producto_control.lista_productoActual.costo_dolar);
		jQuery("#t-cel_"+i+"_60").val(lista_producto_control.lista_productoActual.comentario);
		jQuery("#t-cel_"+i+"_61").val(lista_producto_control.lista_productoActual.comenta_factura);
		
		if(lista_producto_control.lista_productoActual.id_retencion!=null && lista_producto_control.lista_productoActual.id_retencion>-1){
			if(jQuery("#t-cel_"+i+"_62").val() != lista_producto_control.lista_productoActual.id_retencion) {
				jQuery("#t-cel_"+i+"_62").val(lista_producto_control.lista_productoActual.id_retencion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_62").select2("val", null);
			if(jQuery("#t-cel_"+i+"_62").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_62").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_retencion_ventas!=null && lista_producto_control.lista_productoActual.id_retencion_ventas>-1){
			if(jQuery("#t-cel_"+i+"_63").val() != lista_producto_control.lista_productoActual.id_retencion_ventas) {
				jQuery("#t-cel_"+i+"_63").val(lista_producto_control.lista_productoActual.id_retencion_ventas).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_63").select2("val", null);
			if(jQuery("#t-cel_"+i+"_63").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_63").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_producto_control.lista_productoActual.id_retencion_compras!=null && lista_producto_control.lista_productoActual.id_retencion_compras>-1){
			if(jQuery("#t-cel_"+i+"_64").val() != lista_producto_control.lista_productoActual.id_retencion_compras) {
				jQuery("#t-cel_"+i+"_64").val(lista_producto_control.lista_productoActual.id_retencion_compras).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_64").select2("val", null);
			if(jQuery("#t-cel_"+i+"_64").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_64").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_65").val(lista_producto_control.lista_productoActual.retencion_ventas_codigo);
		jQuery("#t-cel_"+i+"_66").val(lista_producto_control.lista_productoActual.retencion_compras_codigo);
		jQuery("#t-cel_"+i+"_67").val(lista_producto_control.lista_productoActual.notas);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(lista_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(lista_producto_control) {
		lista_producto_funcion1.registrarControlesTableValidacionEdition(lista_producto_control,lista_producto_webcontrol1,lista_producto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(lista_producto_control) {
		jQuery("#divResumenlista_productoActualAjaxWebPart").html(lista_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(lista_producto_control) {
		//jQuery("#divAccionesRelacioneslista_productoAjaxWebPart").html(lista_producto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("lista_producto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(lista_producto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneslista_productoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		lista_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(lista_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(lista_producto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(lista_producto_control) {
		
		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",lista_producto_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",lista_producto_control.strVisibleFK_Idbodega);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto").attr("style",lista_producto_control.strVisibleFK_Idcategoria_producto);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto").attr("style",lista_producto_control.strVisibleFK_Idcategoria_producto);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra").attr("style",lista_producto_control.strVisibleFK_Idcuenta_compra);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra").attr("style",lista_producto_control.strVisibleFK_Idcuenta_compra);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario").attr("style",lista_producto_control.strVisibleFK_Idcuenta_inventario);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario").attr("style",lista_producto_control.strVisibleFK_Idcuenta_inventario);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta").attr("style",lista_producto_control.strVisibleFK_Idcuenta_venta);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta").attr("style",lista_producto_control.strVisibleFK_Idcuenta_venta);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",lista_producto_control.strVisibleFK_Idimpuesto);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",lista_producto_control.strVisibleFK_Idimpuesto);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras").attr("style",lista_producto_control.strVisibleFK_Idimpuesto_compras);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras").attr("style",lista_producto_control.strVisibleFK_Idimpuesto_compras);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas").attr("style",lista_producto_control.strVisibleFK_Idimpuesto_ventas);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas").attr("style",lista_producto_control.strVisibleFK_Idimpuesto_ventas);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",lista_producto_control.strVisibleFK_Idotro_impuesto);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",lista_producto_control.strVisibleFK_Idotro_impuesto);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras").attr("style",lista_producto_control.strVisibleFK_Idotro_impuesto_compras);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras").attr("style",lista_producto_control.strVisibleFK_Idotro_impuesto_compras);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas").attr("style",lista_producto_control.strVisibleFK_Idotro_impuesto_ventas);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas").attr("style",lista_producto_control.strVisibleFK_Idotro_impuesto_ventas);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor").attr("style",lista_producto_control.strVisibleFK_Idotro_suplidor);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor").attr("style",lista_producto_control.strVisibleFK_Idotro_suplidor);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lista_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",lista_producto_control.strVisibleFK_Idproducto);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",lista_producto_control.strVisibleFK_Idretencion);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",lista_producto_control.strVisibleFK_Idretencion);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras").attr("style",lista_producto_control.strVisibleFK_Idretencion_compras);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras").attr("style",lista_producto_control.strVisibleFK_Idretencion_compras);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas").attr("style",lista_producto_control.strVisibleFK_Idretencion_ventas);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas").attr("style",lista_producto_control.strVisibleFK_Idretencion_ventas);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto").attr("style",lista_producto_control.strVisibleFK_Idsub_categoria_producto);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto").attr("style",lista_producto_control.strVisibleFK_Idsub_categoria_producto);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto").attr("style",lista_producto_control.strVisibleFK_Idtipo_producto);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto").attr("style",lista_producto_control.strVisibleFK_Idtipo_producto);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra").attr("style",lista_producto_control.strVisibleFK_Idunidad_compra);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra").attr("style",lista_producto_control.strVisibleFK_Idunidad_compra);
		}

		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta").attr("style",lista_producto_control.strVisibleFK_Idunidad_venta);
			jQuery("#tblstrVisible"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta").attr("style",lista_producto_control.strVisibleFK_Idunidad_venta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlista_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("lista_producto",id,"inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","unidad","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","unidad","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParacategoria_producto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","categoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParasub_categoria_producto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","sub_categoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParatipo_producto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","tipo_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","bodega","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","cuenta","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","cuenta","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","cuenta","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaotro_suplidor(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","otro_suplidor","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","impuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","impuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","impuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaotro_impuesto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","otro_impuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaotro_impuesto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","otro_impuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaParaotro_impuesto(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","otro_impuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaPararetencion(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","retencion","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaPararetencion(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","retencion","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}

	abrirBusquedaPararetencion(strNombreCampoBusqueda){//idActual
		lista_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("lista_producto","retencion","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_productoConstante,strParametros);
		
		//lista_producto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto",lista_producto_control.productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_2",lista_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lista_producto_control.productosFK);

	};

	cargarCombosunidad_comprasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra",lista_producto_control.unidad_comprasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_10",lista_producto_control.unidad_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra",lista_producto_control.unidad_comprasFK);

	};

	cargarCombosunidad_ventasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta",lista_producto_control.unidad_ventasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_13",lista_producto_control.unidad_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta",lista_producto_control.unidad_ventasFK);

	};

	cargarComboscategoria_productosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto",lista_producto_control.categoria_productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_18",lista_producto_control.categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto",lista_producto_control.categoria_productosFK);

	};

	cargarCombossub_categoria_productosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto",lista_producto_control.sub_categoria_productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_19",lista_producto_control.sub_categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto",lista_producto_control.sub_categoria_productosFK);

	};

	cargarCombostipo_productosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto",lista_producto_control.tipo_productosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_30",lista_producto_control.tipo_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto",lista_producto_control.tipo_productosFK);

	};

	cargarCombosbodegasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega",lista_producto_control.bodegasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_32",lista_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",lista_producto_control.bodegasFK);

	};

	cargarComboscuenta_comprasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra",lista_producto_control.cuenta_comprasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_38",lista_producto_control.cuenta_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra",lista_producto_control.cuenta_comprasFK);

	};

	cargarComboscuenta_ventasFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta",lista_producto_control.cuenta_ventasFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_39",lista_producto_control.cuenta_ventasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta",lista_producto_control.cuenta_ventasFK);

	};

	cargarComboscuenta_inventariosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario",lista_producto_control.cuenta_inventariosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_40",lista_producto_control.cuenta_inventariosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario",lista_producto_control.cuenta_inventariosFK);

	};

	cargarCombosotro_suplidorsFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor",lista_producto_control.otro_suplidorsFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_44",lista_producto_control.otro_suplidorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor",lista_producto_control.otro_suplidorsFK);

	};

	cargarCombosimpuestosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto",lista_producto_control.impuestosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_45",lista_producto_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",lista_producto_control.impuestosFK);

	};

	cargarCombosimpuesto_ventassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas",lista_producto_control.impuesto_ventassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_46",lista_producto_control.impuesto_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas",lista_producto_control.impuesto_ventassFK);

	};

	cargarCombosimpuesto_comprassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras",lista_producto_control.impuesto_comprassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_47",lista_producto_control.impuesto_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras",lista_producto_control.impuesto_comprassFK);

	};

	cargarCombosotro_impuestosFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto",lista_producto_control.otro_impuestosFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_51",lista_producto_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",lista_producto_control.otro_impuestosFK);

	};

	cargarCombosotro_impuesto_ventassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas",lista_producto_control.otro_impuesto_ventassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_52",lista_producto_control.otro_impuesto_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas",lista_producto_control.otro_impuesto_ventassFK);

	};

	cargarCombosotro_impuesto_comprassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras",lista_producto_control.otro_impuesto_comprassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_53",lista_producto_control.otro_impuesto_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras",lista_producto_control.otro_impuesto_comprassFK);

	};

	cargarCombosretencionsFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion",lista_producto_control.retencionsFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_62",lista_producto_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",lista_producto_control.retencionsFK);

	};

	cargarCombosretencion_ventassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas",lista_producto_control.retencion_ventassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_63",lista_producto_control.retencion_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas",lista_producto_control.retencion_ventassFK);

	};

	cargarCombosretencion_comprassFK(lista_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras",lista_producto_control.retencion_comprassFK);

		if(lista_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_producto_control.idFilaTablaActual+"_64",lista_producto_control.retencion_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras",lista_producto_control.retencion_comprassFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosunidad_comprasFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosunidad_ventasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscategoria_productosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombossub_categoria_productosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombostipo_productosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscuenta_comprasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscuenta_ventasFK(lista_producto_control) {

	};

	registrarComboActionChangeComboscuenta_inventariosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_suplidorsFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosimpuesto_ventassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosimpuesto_comprassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_impuesto_ventassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosotro_impuesto_comprassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosretencionsFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosretencion_ventassFK(lista_producto_control) {

	};

	registrarComboActionChangeCombosretencion_comprassFK(lista_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val() != lista_producto_control.idproductoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto").val(lista_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lista_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_comprasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idunidad_compraDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val() != lista_producto_control.idunidad_compraDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra").val(lista_producto_control.idunidad_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(lista_producto_control.idunidad_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_compra-cmbid_unidad_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidad_ventasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idunidad_ventaDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val() != lista_producto_control.idunidad_ventaDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta").val(lista_producto_control.idunidad_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(lista_producto_control.idunidad_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idunidad_venta-cmbid_unidad_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_productosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcategoria_productoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != lista_producto_control.idcategoria_productoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(lista_producto_control.idcategoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(lista_producto_control.idcategoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombossub_categoria_productosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idsub_categoria_productoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val() != lista_producto_control.idsub_categoria_productoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto").val(lista_producto_control.idsub_categoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(lista_producto_control.idsub_categoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idsub_categoria_producto-cmbid_sub_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_productosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idtipo_productoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val() != lista_producto_control.idtipo_productoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto").val(lista_producto_control.idtipo_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(lista_producto_control.idtipo_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idtipo_producto-cmbid_tipo_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val() != lista_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega").val(lista_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(lista_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcuenta_compraDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val() != lista_producto_control.idcuenta_compraDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra").val(lista_producto_control.idcuenta_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(lista_producto_control.idcuenta_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_compra-cmbid_cuenta_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventasFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcuenta_ventaDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val() != lista_producto_control.idcuenta_ventaDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta").val(lista_producto_control.idcuenta_ventaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(lista_producto_control.idcuenta_ventaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_venta-cmbid_cuenta_venta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_inventariosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idcuenta_inventarioDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val() != lista_producto_control.idcuenta_inventarioDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario").val(lista_producto_control.idcuenta_inventarioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario").val(lista_producto_control.idcuenta_inventarioDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idcuenta_inventario-cmbid_cuenta_inventario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_suplidorsFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_suplidorDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val() != lista_producto_control.idotro_suplidorDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor").val(lista_producto_control.idotro_suplidorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(lista_producto_control.idotro_suplidorDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idimpuestoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val() != lista_producto_control.idimpuestoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto").val(lista_producto_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(lista_producto_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuesto_ventassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idimpuesto_ventasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val() != lista_producto_control.idimpuesto_ventasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas").val(lista_producto_control.idimpuesto_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas").val(lista_producto_control.idimpuesto_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_ventas-cmbid_impuesto_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuesto_comprassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idimpuesto_comprasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val() != lista_producto_control.idimpuesto_comprasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras").val(lista_producto_control.idimpuesto_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras").val(lista_producto_control.idimpuesto_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idimpuesto_compras-cmbid_impuesto_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != lista_producto_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto").val(lista_producto_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(lista_producto_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuesto_ventassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_impuesto_ventasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val() != lista_producto_control.idotro_impuesto_ventasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas").val(lista_producto_control.idotro_impuesto_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas").val(lista_producto_control.idotro_impuesto_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_ventas-cmbid_otro_impuesto_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuesto_comprassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idotro_impuesto_comprasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val() != lista_producto_control.idotro_impuesto_comprasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras").val(lista_producto_control.idotro_impuesto_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras").val(lista_producto_control.idotro_impuesto_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idotro_impuesto_compras-cmbid_otro_impuesto_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idretencionDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val() != lista_producto_control.idretencionDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion").val(lista_producto_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(lista_producto_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_ventassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idretencion_ventasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val() != lista_producto_control.idretencion_ventasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas").val(lista_producto_control.idretencion_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas").val(lista_producto_control.idretencion_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_ventas-cmbid_retencion_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_comprassFK(lista_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_producto_control.idretencion_comprasDefaultFK>-1 && jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val() != lista_producto_control.idretencion_comprasDefaultFK) {
				jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras").val(lista_producto_control.idretencion_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras").val(lista_producto_control.idretencion_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_producto_constante1.STR_SUFIJO+"FK_Idretencion_compras-cmbid_retencion_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lista_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(lista_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosproductosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosunidad_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosunidad_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscategoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombossub_categoria_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombostipo_productosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosbodegasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscuenta_comprasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscuenta_ventasFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorComboscuenta_inventariosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_suplidorsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosimpuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosimpuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosimpuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_impuestosFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_impuesto_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosotro_impuesto_comprassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosretencionsFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosretencion_ventassFK(lista_producto_control);
			}

			if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTipos,",")) { 
				lista_producto_webcontrol1.setDefectoValorCombosretencion_comprassFK(lista_producto_control);
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
	onLoadCombosEventosFK(lista_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_compra",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosunidad_comprasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad_venta",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosunidad_ventasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscategoria_productosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sub_categoria_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombossub_categoria_productosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_producto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombostipo_productosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compra",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscuenta_comprasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_venta",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscuenta_ventasFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_inventario",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeComboscuenta_inventariosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_suplidorsFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosimpuestosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosimpuesto_ventassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosimpuesto_comprassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_ventas",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_impuesto_ventassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto_compras",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosotro_impuesto_comprassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosretencionsFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ventas",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosretencion_ventassFK(lista_producto_control);
			//}

			//if(lista_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_compras",lista_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_producto_webcontrol1.registrarComboActionChangeCombosretencion_comprassFK(lista_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lista_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(lista_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idbodega","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idcategoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idcuenta_compra","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idcuenta_inventario","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idcuenta_venta","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idimpuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idimpuesto_compras","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idimpuesto_ventas","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idotro_impuesto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idotro_impuesto_compras","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idotro_impuesto_ventas","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idotro_suplidor","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idproducto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idretencion","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idretencion_compras","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idretencion_ventas","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idsub_categoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idtipo_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idunidad_compra","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("lista_producto","FK_Idunidad_venta","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
		
			
			if(lista_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lista_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lista_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(lista_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,"lista_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_compra","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_compra_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_compra");
				//alert(jQuery('#form-id_unidad_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad_venta","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_unidad_venta_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaunidad("id_unidad_venta");
				//alert(jQuery('#form-id_unidad_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_producto","id_categoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_categoria_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacategoria_producto("id_categoria_producto");
				//alert(jQuery('#form-id_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sub_categoria_producto","id_sub_categoria_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_sub_categoria_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParasub_categoria_producto("id_sub_categoria_producto");
				//alert(jQuery('#form-id_sub_categoria_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_producto","id_tipo_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_tipo_producto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParatipo_producto("id_tipo_producto");
				//alert(jQuery('#form-id_tipo_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compra","contabilidad","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_compra_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compra");
				//alert(jQuery('#form-id_cuenta_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_venta","contabilidad","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_venta_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_venta");
				//alert(jQuery('#form-id_cuenta_venta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_inventario","contabilidad","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_cuenta_inventario_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_inventario");
				//alert(jQuery('#form-id_cuenta_inventario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_suplidor","id_otro_suplidor","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_suplidor_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_suplidor("id_otro_suplidor");
				//alert(jQuery('#form-id_otro_suplidor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto_ventas","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_ventas_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto_ventas");
				//alert(jQuery('#form-id_impuesto_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto_compras","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_impuesto_compras_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto_compras");
				//alert(jQuery('#form-id_impuesto_compras_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto_ventas","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_ventas_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto_ventas");
				//alert(jQuery('#form-id_otro_impuesto_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto_compras","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_otro_impuesto_compras_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto_compras");
				//alert(jQuery('#form-id_otro_impuesto_compras_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion_ventas","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_ventas_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaPararetencion("id_retencion_ventas");
				//alert(jQuery('#form-id_retencion_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion_compras","facturacion","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_producto_constante1.STR_SUFIJO+"-id_retencion_compras_img_busqueda").click(function(){
				lista_producto_webcontrol1.abrirBusquedaPararetencion("id_retencion_compras");
				//alert(jQuery('#form-id_retencion_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lista_producto_control) {
		
		jQuery("#divBusquedalista_productoAjaxWebPart").css("display",lista_producto_control.strPermisoBusqueda);
		jQuery("#trlista_productoCabeceraBusquedas").css("display",lista_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedalista_producto").css("display",lista_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelista_producto").css("display",lista_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslista_producto").attr("style",lista_producto_control.strPermisoMostrarTodos);		
		
		if(lista_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdlista_productoNuevo").css("display",lista_producto_control.strPermisoNuevo);
			jQuery("#tdlista_productoNuevoToolBar").css("display",lista_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlista_productoDuplicar").css("display",lista_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlista_productoDuplicarToolBar").css("display",lista_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlista_productoNuevoGuardarCambios").css("display",lista_producto_control.strPermisoNuevo);
			jQuery("#tdlista_productoNuevoGuardarCambiosToolBar").css("display",lista_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(lista_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdlista_productoCopiar").css("display",lista_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlista_productoCopiarToolBar").css("display",lista_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlista_productoConEditar").css("display",lista_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdlista_productoGuardarCambios").css("display",lista_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlista_productoGuardarCambiosToolBar").css("display",lista_producto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdlista_productoCerrarPagina").css("display",lista_producto_control.strPermisoPopup);		
		jQuery("#tdlista_productoCerrarPaginaToolBar").css("display",lista_producto_control.strPermisoPopup);
		//jQuery("#trlista_productoAccionesRelaciones").css("display",lista_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=lista_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + lista_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Lista Productoses";
		sTituloBanner+=" - " + lista_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlista_productoRelacionesToolBar").css("display",lista_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslista_producto").css("display",lista_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		lista_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		lista_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lista_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lista_producto_webcontrol1.registrarEventosControles();
		
		if(lista_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
			lista_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lista_producto_constante1.STR_ES_RELACIONES=="true") {
			if(lista_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lista_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(lista_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				lista_producto_webcontrol1.onLoad();
			
			//} else {
				//if(lista_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			lista_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lista_producto","inventario","",lista_producto_funcion1,lista_producto_webcontrol1,lista_producto_constante1);	
	}
}

var lista_producto_webcontrol1 = new lista_producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {lista_producto_webcontrol,lista_producto_webcontrol1};

//Para ser llamado desde window.opener
window.lista_producto_webcontrol1 = lista_producto_webcontrol1;


if(lista_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lista_producto_webcontrol1.onLoadWindow; 
}

//</script>