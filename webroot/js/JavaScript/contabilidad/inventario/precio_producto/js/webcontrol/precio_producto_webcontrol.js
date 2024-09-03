//<script type="text/javascript" language="javascript">



//var precio_productoJQueryPaginaWebInteraccion= function (precio_producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {precio_producto_constante,precio_producto_constante1} from '../util/precio_producto_constante.js';

import {precio_producto_funcion,precio_producto_funcion1} from '../util/precio_producto_funcion.js';


class precio_producto_webcontrol extends GeneralEntityWebControl {
	
	precio_producto_control=null;
	precio_producto_controlInicial=null;
	precio_producto_controlAuxiliar=null;
		
	//if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(precio_producto_control) {
		super();
		
		this.precio_producto_control=precio_producto_control;
	}
		
	actualizarVariablesPagina(precio_producto_control) {
		
		if(precio_producto_control.action=="index" || precio_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(precio_producto_control);
			
		} 
		
		
		else if(precio_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(precio_producto_control);
		
		} else if(precio_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(precio_producto_control);
		
		} else if(precio_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(precio_producto_control);
		
		} else if(precio_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(precio_producto_control);
			
		} else if(precio_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(precio_producto_control);
			
		} else if(precio_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(precio_producto_control);
		
		} else if(precio_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(precio_producto_control);		
		
		} else if(precio_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(precio_producto_control);
		
		} else if(precio_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(precio_producto_control);
		
		} else if(precio_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(precio_producto_control);
		
		} else if(precio_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(precio_producto_control);
		
		}  else if(precio_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(precio_producto_control);
		
		} else if(precio_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(precio_producto_control);
		
		} else if(precio_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(precio_producto_control);
		
		} else if(precio_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(precio_producto_control);
		
		} else if(precio_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(precio_producto_control);		
		
		} else if(precio_producto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(precio_producto_control);		
		
		} else if(precio_producto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(precio_producto_control);		
		
		} else if(precio_producto_control.action.includes("Busqueda") ||
				  precio_producto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(precio_producto_control);
			
		} else if(precio_producto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(precio_producto_control)
		}
		
		
		
	
		else if(precio_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(precio_producto_control);	
		
		} else if(precio_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(precio_producto_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + precio_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(precio_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(precio_producto_control) {
		this.actualizarPaginaAccionesGenerales(precio_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(precio_producto_control) {
		
		this.actualizarPaginaCargaGeneral(precio_producto_control);
		this.actualizarPaginaOrderBy(precio_producto_control);
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control);
		this.actualizarPaginaAreaBusquedas(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(precio_producto_control) {
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(precio_producto_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(precio_producto_control) {
		
		this.actualizarPaginaCargaGeneral(precio_producto_control);
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control);
		this.actualizarPaginaAreaBusquedas(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(precio_producto_control) {
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(precio_producto_control) {
		this.actualizarPaginaAbrirLink(precio_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);				
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);
		//this.actualizarPaginaFormulario(precio_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);
		//this.actualizarPaginaFormulario(precio_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(precio_producto_control) {
		//this.actualizarPaginaFormulario(precio_producto_control);
		this.onLoadCombosDefectoFK(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);
		//this.actualizarPaginaFormulario(precio_producto_control);
		this.onLoadCombosDefectoFK(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(precio_producto_control) {
		this.actualizarPaginaAbrirLink(precio_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(precio_producto_control) {
		this.actualizarPaginaTablaDatos(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(precio_producto_control) {
					//super.actualizarPaginaImprimir(precio_producto_control,"precio_producto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",precio_producto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("precio_producto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(precio_producto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(precio_producto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(precio_producto_control) {
		//super.actualizarPaginaImprimir(precio_producto_control,"precio_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("precio_producto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(precio_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",precio_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(precio_producto_control) {
		//super.actualizarPaginaImprimir(precio_producto_control,"precio_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("precio_producto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(precio_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",precio_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(precio_producto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(precio_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(precio_producto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(precio_producto_control);
			
		this.actualizarPaginaAbrirLink(precio_producto_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(precio_producto_control) {
		
		if(precio_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(precio_producto_control);
		}
		
		if(precio_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(precio_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(precio_producto_control) {
		if(precio_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("precio_productoReturnGeneral",JSON.stringify(precio_producto_control.precio_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(precio_producto_control) {
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && precio_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(precio_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(precio_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(precio_producto_control, mostrar) {
		
		if(mostrar==true) {
			precio_producto_funcion1.resaltarRestaurarDivsPagina(false,"precio_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				precio_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"precio_producto");
			}			
			
			precio_producto_funcion1.mostrarDivMensaje(true,precio_producto_control.strAuxiliarMensaje,precio_producto_control.strAuxiliarCssMensaje);
		
		} else {
			precio_producto_funcion1.mostrarDivMensaje(false,precio_producto_control.strAuxiliarMensaje,precio_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(precio_producto_control) {
		if(precio_producto_funcion1.esPaginaForm(precio_producto_constante1)==true) {
			window.opener.precio_producto_webcontrol1.actualizarPaginaTablaDatos(precio_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(precio_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(precio_producto_control) {
		precio_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(precio_producto_control.strAuxiliarUrlPagina);
				
		precio_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(precio_producto_control.strAuxiliarTipo,precio_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(precio_producto_control) {
		precio_producto_funcion1.resaltarRestaurarDivMensaje(true,precio_producto_control.strAuxiliarMensajeAlert,precio_producto_control.strAuxiliarCssMensaje);
			
		if(precio_producto_funcion1.esPaginaForm(precio_producto_constante1)==true) {
			window.opener.precio_producto_funcion1.resaltarRestaurarDivMensaje(true,precio_producto_control.strAuxiliarMensajeAlert,precio_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(precio_producto_control) {
		this.precio_producto_controlInicial=precio_producto_control;
			
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(precio_producto_control.strStyleDivArbol,precio_producto_control.strStyleDivContent
																,precio_producto_control.strStyleDivOpcionesBanner,precio_producto_control.strStyleDivExpandirColapsar
																,precio_producto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=precio_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",precio_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(precio_producto_control) {
		this.actualizarCssBotonesPagina(precio_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(precio_producto_control.tiposReportes,precio_producto_control.tiposReporte
															 	,precio_producto_control.tiposPaginacion,precio_producto_control.tiposAcciones
																,precio_producto_control.tiposColumnasSelect,precio_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(precio_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(precio_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(precio_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(precio_producto_control) {
	
		var indexPosition=precio_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=precio_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(precio_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombosempresasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombosbodegasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombosproductosFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombostipo_preciosFK(precio_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(precio_producto_control.strRecargarFkTiposNinguno!=null && precio_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && precio_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombosempresasFK(precio_producto_control);
				}

				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombosbodegasFK(precio_producto_control);
				}

				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombosproductosFK(precio_producto_control);
				}

				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombostipo_preciosFK(precio_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.empresasFK);
	}

	cargarComboEditarTablabodegaFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.productosFK);
	}

	cargarComboEditarTablatipo_precioFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.tipo_preciosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(precio_producto_control) {
		jQuery("#divBusquedaprecio_productoAjaxWebPart").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trprecio_productoCabeceraBusquedas").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaprecio_producto").css("display",precio_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(precio_producto_control.htmlTablaOrderBy!=null
			&& precio_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByprecio_productoAjaxWebPart").html(precio_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//precio_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(precio_producto_control.htmlTablaOrderByRel!=null
			&& precio_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelprecio_productoAjaxWebPart").html(precio_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(precio_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaprecio_productoAjaxWebPart").css("display","none");
			jQuery("#trprecio_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaprecio_producto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(precio_producto_control) {
		
		if(!precio_producto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(precio_producto_control);
		} else {
			jQuery("#divTablaDatosprecio_productosAjaxWebPart").html(precio_producto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosprecio_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosprecio_productos=jQuery("#tblTablaDatosprecio_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("precio_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',precio_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			precio_producto_webcontrol1.registrarControlesTableEdition(precio_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		precio_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(precio_producto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("precio_producto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(precio_producto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosprecio_productosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(precio_producto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(precio_producto_control);
		
		const divOrderBy = document.getElementById("divOrderByprecio_productoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(precio_producto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelprecio_productoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(precio_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(precio_producto_control.precio_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(precio_producto_control);			
		}
	}
	
	actualizarCamposFilaTabla(precio_producto_control) {
		var i=0;
		
		i=precio_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(precio_producto_control.precio_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(precio_producto_control.precio_productoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(precio_producto_control.precio_productoActual.versionRow);
		
		if(precio_producto_control.precio_productoActual.id_empresa!=null && precio_producto_control.precio_productoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != precio_producto_control.precio_productoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(precio_producto_control.precio_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_bodega!=null && precio_producto_control.precio_productoActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != precio_producto_control.precio_productoActual.id_bodega) {
				jQuery("#t-cel_"+i+"_4").val(precio_producto_control.precio_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_producto!=null && precio_producto_control.precio_productoActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != precio_producto_control.precio_productoActual.id_producto) {
				jQuery("#t-cel_"+i+"_5").val(precio_producto_control.precio_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_tipo_precio!=null && precio_producto_control.precio_productoActual.id_tipo_precio>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != precio_producto_control.precio_productoActual.id_tipo_precio) {
				jQuery("#t-cel_"+i+"_6").val(precio_producto_control.precio_productoActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(precio_producto_control.precio_productoActual.precio);
		jQuery("#t-cel_"+i+"_8").val(precio_producto_control.precio_productoActual.descuento_porciento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(precio_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(precio_producto_control) {
		precio_producto_funcion1.registrarControlesTableValidacionEdition(precio_producto_control,precio_producto_webcontrol1,precio_producto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(precio_producto_control) {
		jQuery("#divResumenprecio_productoActualAjaxWebPart").html(precio_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(precio_producto_control) {
		//jQuery("#divAccionesRelacionesprecio_productoAjaxWebPart").html(precio_producto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("precio_producto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(precio_producto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesprecio_productoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		precio_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(precio_producto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(precio_producto_control) {
		
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",precio_producto_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",precio_producto_control.strVisibleFK_Idbodega);
		}

		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",precio_producto_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",precio_producto_control.strVisibleFK_Idempresa);
		}

		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",precio_producto_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",precio_producto_control.strVisibleFK_Idproducto);
		}

		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",precio_producto_control.strVisibleFK_Idtipo_precio);
			jQuery("#tblstrVisible"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",precio_producto_control.strVisibleFK_Idtipo_precio);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionprecio_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("precio_producto",id,"inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		precio_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("precio_producto","empresa","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		precio_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("precio_producto","bodega","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		precio_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("precio_producto","producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}

	abrirBusquedaParatipo_precio(strNombreCampoBusqueda){//idActual
		precio_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("precio_producto","tipo_precio","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_productoConstante,strParametros);
		
		//precio_producto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa",precio_producto_control.empresasFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_3",precio_producto_control.empresasFK);
		}
	};

	cargarCombosbodegasFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega",precio_producto_control.bodegasFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_4",precio_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",precio_producto_control.bodegasFK);

	};

	cargarCombosproductosFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto",precio_producto_control.productosFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_5",precio_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",precio_producto_control.productosFK);

	};

	cargarCombostipo_preciosFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio",precio_producto_control.tipo_preciosFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_6",precio_producto_control.tipo_preciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio",precio_producto_control.tipo_preciosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(precio_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(precio_producto_control) {

	};

	registrarComboActionChangeCombosproductosFK(precio_producto_control) {

	};

	registrarComboActionChangeCombostipo_preciosFK(precio_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val() != precio_producto_control.idempresaDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val(precio_producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val() != precio_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val(precio_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(precio_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val() != precio_producto_control.idproductoDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val(precio_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(precio_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_preciosFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idtipo_precioDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val() != precio_producto_control.idtipo_precioDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val(precio_producto_control.idtipo_precioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(precio_producto_control.idtipo_precioDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//precio_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombosempresasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombosbodegasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombosproductosFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombostipo_preciosFK(precio_producto_control);
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
	onLoadCombosEventosFK(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(precio_producto_control);
			//}

			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(precio_producto_control);
			//}

			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(precio_producto_control);
			//}

			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombostipo_preciosFK(precio_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(precio_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("precio_producto","FK_Idbodega","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("precio_producto","FK_Idempresa","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("precio_producto","FK_Idproducto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("precio_producto","FK_Idtipo_precio","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
		
			
			if(precio_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("precio_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("precio_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(precio_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,"precio_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_precio","id_tipo_precio","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParatipo_precio("id_tipo_precio");
				//alert(jQuery('#form-id_tipo_precio_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(precio_producto_control) {
		
		jQuery("#divBusquedaprecio_productoAjaxWebPart").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trprecio_productoCabeceraBusquedas").css("display",precio_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedaprecio_producto").css("display",precio_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteprecio_producto").css("display",precio_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosprecio_producto").attr("style",precio_producto_control.strPermisoMostrarTodos);		
		
		if(precio_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdprecio_productoNuevo").css("display",precio_producto_control.strPermisoNuevo);
			jQuery("#tdprecio_productoNuevoToolBar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdprecio_productoDuplicar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdprecio_productoDuplicarToolBar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdprecio_productoNuevoGuardarCambios").css("display",precio_producto_control.strPermisoNuevo);
			jQuery("#tdprecio_productoNuevoGuardarCambiosToolBar").css("display",precio_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(precio_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdprecio_productoCopiar").css("display",precio_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprecio_productoCopiarToolBar").css("display",precio_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdprecio_productoConEditar").css("display",precio_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdprecio_productoGuardarCambios").css("display",precio_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdprecio_productoGuardarCambiosToolBar").css("display",precio_producto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdprecio_productoCerrarPagina").css("display",precio_producto_control.strPermisoPopup);		
		jQuery("#tdprecio_productoCerrarPaginaToolBar").css("display",precio_producto_control.strPermisoPopup);
		//jQuery("#trprecio_productoAccionesRelaciones").css("display",precio_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=precio_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + precio_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + precio_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Precio Productos";
		sTituloBanner+=" - " + precio_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + precio_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdprecio_productoRelacionesToolBar").css("display",precio_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosprecio_producto").css("display",precio_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		precio_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		precio_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		precio_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		precio_producto_webcontrol1.registrarEventosControles();
		
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			precio_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(precio_producto_constante1.STR_ES_RELACIONES=="true") {
			if(precio_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				precio_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(precio_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(precio_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				precio_producto_webcontrol1.onLoad();
			
			//} else {
				//if(precio_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			precio_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);	
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

var precio_producto_webcontrol1 = new precio_producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {precio_producto_webcontrol,precio_producto_webcontrol1};

//Para ser llamado desde window.opener
window.precio_producto_webcontrol1 = precio_producto_webcontrol1;


if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = precio_producto_webcontrol1.onLoadWindow; 
}

//</script>