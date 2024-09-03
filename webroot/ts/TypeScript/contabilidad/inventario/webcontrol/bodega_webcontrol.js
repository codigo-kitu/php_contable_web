//<script type="text/javascript" language="javascript">



//var bodegaJQueryPaginaWebInteraccion= function (bodega_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {bodega_constante,bodega_constante1} from '../util/bodega_constante.js';

import {bodega_funcion,bodega_funcion1} from '../util/bodega_funcion.js';


class bodega_webcontrol extends GeneralEntityWebControl {
	
	bodega_control=null;
	bodega_controlInicial=null;
	bodega_controlAuxiliar=null;
		
	//if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(bodega_control) {
		super();
		
		this.bodega_control=bodega_control;
	}
		
	actualizarVariablesPagina(bodega_control) {
		
		if(bodega_control.action=="index" || bodega_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(bodega_control);
			
		} 
		
		
		else if(bodega_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(bodega_control);
		
		} else if(bodega_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(bodega_control);
		
		} else if(bodega_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(bodega_control);
		
		} else if(bodega_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(bodega_control);
			
		} else if(bodega_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(bodega_control);
			
		} else if(bodega_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(bodega_control);
		
		} else if(bodega_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(bodega_control);		
		
		} else if(bodega_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(bodega_control);
		
		} else if(bodega_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(bodega_control);
		
		} else if(bodega_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(bodega_control);
		
		} else if(bodega_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(bodega_control);
		
		}  else if(bodega_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(bodega_control);
		
		} else if(bodega_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(bodega_control);
		
		} else if(bodega_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(bodega_control);
		
		} else if(bodega_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(bodega_control);
		
		} else if(bodega_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(bodega_control);
		
		} else if(bodega_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(bodega_control);
		
		} else if(bodega_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(bodega_control);
		
		} else if(bodega_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(bodega_control);		
		
		} else if(bodega_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(bodega_control);		
		
		} else if(bodega_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(bodega_control);		
		
		} else if(bodega_control.action.includes("Busqueda") ||
				  bodega_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(bodega_control);
			
		} else if(bodega_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(bodega_control)
		}
		
		
		
	
		else if(bodega_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(bodega_control);	
		
		} else if(bodega_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(bodega_control);		
		}
	
		else if(bodega_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(bodega_control);		
		}
	
		else if(bodega_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(bodega_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + bodega_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(bodega_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(bodega_control) {
		this.actualizarPaginaAccionesGenerales(bodega_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(bodega_control) {
		
		this.actualizarPaginaCargaGeneral(bodega_control);
		this.actualizarPaginaOrderBy(bodega_control);
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(bodega_control);
		this.actualizarPaginaAreaBusquedas(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(bodega_control) {
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(bodega_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(bodega_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(bodega_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(bodega_control) {
		
		this.actualizarPaginaCargaGeneral(bodega_control);
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(bodega_control);
		this.actualizarPaginaAreaBusquedas(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		//this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		//this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		//this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(bodega_control) {
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(bodega_control) {
		this.actualizarPaginaAbrirLink(bodega_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);				
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		//this.actualizarPaginaFormulario(bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		//this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		//this.actualizarPaginaFormulario(bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(bodega_control) {
		//this.actualizarPaginaFormulario(bodega_control);
		this.onLoadCombosDefectoFK(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		//this.actualizarPaginaFormulario(bodega_control);
		this.onLoadCombosDefectoFK(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		//this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(bodega_control) {
		this.actualizarPaginaAbrirLink(bodega_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(bodega_control) {
					//super.actualizarPaginaImprimir(bodega_control,"bodega");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",bodega_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("bodega_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(bodega_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(bodega_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(bodega_control) {
		//super.actualizarPaginaImprimir(bodega_control,"bodega");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("bodega_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(bodega_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",bodega_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(bodega_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(bodega_control) {
		//super.actualizarPaginaImprimir(bodega_control,"bodega");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("bodega_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(bodega_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",bodega_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(bodega_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(bodega_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(bodega_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(bodega_control);
			
		this.actualizarPaginaAbrirLink(bodega_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(bodega_control) {
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(bodega_control) {
		
		if(bodega_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(bodega_control);
		}
		
		if(bodega_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(bodega_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(bodega_control) {
		if(bodega_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("bodegaReturnGeneral",JSON.stringify(bodega_control.bodegaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(bodega_control) {
		if(bodega_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && bodega_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(bodega_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(bodega_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(bodega_control, mostrar) {
		
		if(mostrar==true) {
			bodega_funcion1.resaltarRestaurarDivsPagina(false,"bodega");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				bodega_funcion1.resaltarRestaurarDivMantenimiento(false,"bodega");
			}			
			
			bodega_funcion1.mostrarDivMensaje(true,bodega_control.strAuxiliarMensaje,bodega_control.strAuxiliarCssMensaje);
		
		} else {
			bodega_funcion1.mostrarDivMensaje(false,bodega_control.strAuxiliarMensaje,bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(bodega_control) {
		if(bodega_funcion1.esPaginaForm(bodega_constante1)==true) {
			window.opener.bodega_webcontrol1.actualizarPaginaTablaDatos(bodega_control);
		} else {
			this.actualizarPaginaTablaDatos(bodega_control);
		}
	}
	
	actualizarPaginaAbrirLink(bodega_control) {
		bodega_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(bodega_control.strAuxiliarUrlPagina);
				
		bodega_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(bodega_control.strAuxiliarTipo,bodega_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(bodega_control) {
		bodega_funcion1.resaltarRestaurarDivMensaje(true,bodega_control.strAuxiliarMensajeAlert,bodega_control.strAuxiliarCssMensaje);
			
		if(bodega_funcion1.esPaginaForm(bodega_constante1)==true) {
			window.opener.bodega_funcion1.resaltarRestaurarDivMensaje(true,bodega_control.strAuxiliarMensajeAlert,bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(bodega_control) {
		this.bodega_controlInicial=bodega_control;
			
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(bodega_control.strStyleDivArbol,bodega_control.strStyleDivContent
																,bodega_control.strStyleDivOpcionesBanner,bodega_control.strStyleDivExpandirColapsar
																,bodega_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=bodega_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",bodega_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(bodega_control) {
		this.actualizarCssBotonesPagina(bodega_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(bodega_control.tiposReportes,bodega_control.tiposReporte
															 	,bodega_control.tiposPaginacion,bodega_control.tiposAcciones
																,bodega_control.tiposColumnasSelect,bodega_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(bodega_control.tiposRelaciones,bodega_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(bodega_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(bodega_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(bodega_control);			
	}
	
	actualizarPaginaUsuarioInvitado(bodega_control) {
	
		var indexPosition=bodega_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=bodega_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(bodega_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.cargarCombosempresasFK(bodega_control);
			}

			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.cargarCombossucursalsFK(bodega_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(bodega_control.strRecargarFkTiposNinguno!=null && bodega_control.strRecargarFkTiposNinguno!='NINGUNO' && bodega_control.strRecargarFkTiposNinguno!='') {
			
				if(bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTiposNinguno,",")) { 
					bodega_webcontrol1.cargarCombosempresasFK(bodega_control);
				}

				if(bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTiposNinguno,",")) { 
					bodega_webcontrol1.cargarCombossucursalsFK(bodega_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,bodega_funcion1,bodega_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,bodega_funcion1,bodega_control.sucursalsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(bodega_control) {
		jQuery("#divBusquedabodegaAjaxWebPart").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trbodegaCabeceraBusquedas").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trBusquedabodega").css("display",bodega_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(bodega_control.htmlTablaOrderBy!=null
			&& bodega_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBybodegaAjaxWebPart").html(bodega_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//bodega_webcontrol1.registrarOrderByActions();
			
		}
			
		if(bodega_control.htmlTablaOrderByRel!=null
			&& bodega_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelbodegaAjaxWebPart").html(bodega_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(bodega_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedabodegaAjaxWebPart").css("display","none");
			jQuery("#trbodegaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedabodega").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(bodega_control) {
		
		if(!bodega_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(bodega_control);
		} else {
			jQuery("#divTablaDatosbodegasAjaxWebPart").html(bodega_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosbodegas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(bodega_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosbodegas=jQuery("#tblTablaDatosbodegas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("bodega",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',bodega_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			bodega_webcontrol1.registrarControlesTableEdition(bodega_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		bodega_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(bodega_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("bodega_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(bodega_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosbodegasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(bodega_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(bodega_control);
		
		const divOrderBy = document.getElementById("divOrderBybodegaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(bodega_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelbodegaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(bodega_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(bodega_control.bodegaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(bodega_control);			
		}
	}
	
	actualizarCamposFilaTabla(bodega_control) {
		var i=0;
		
		i=bodega_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(bodega_control.bodegaActual.id);
		jQuery("#t-version_row_"+i+"").val(bodega_control.bodegaActual.versionRow);
		
		if(bodega_control.bodegaActual.id_empresa!=null && bodega_control.bodegaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != bodega_control.bodegaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(bodega_control.bodegaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(bodega_control.bodegaActual.id_sucursal!=null && bodega_control.bodegaActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != bodega_control.bodegaActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(bodega_control.bodegaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(bodega_control.bodegaActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(bodega_control.bodegaActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(bodega_control.bodegaActual.direccion);
		jQuery("#t-cel_"+i+"_7").val(bodega_control.bodegaActual.telefono);
		jQuery("#t-cel_"+i+"_8").val(bodega_control.bodegaActual.numero_productos);
		jQuery("#t-cel_"+i+"_9").prop('checked',bodega_control.bodegaActual.defecto);
		jQuery("#t-cel_"+i+"_10").prop('checked',bodega_control.bodegaActual.activo);
		jQuery("#t-cel_"+i+"_11").val(bodega_control.bodegaActual.direccion2);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(bodega_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_bodega").click(function(){
		jQuery("#tblTablaDatosbodegas").on("click",".imgrelacionproducto_bodega", function () {

			var idActual=jQuery(this).attr("idactualbodega");

			bodega_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_defecto").click(function(){
		jQuery("#tblTablaDatosbodegas").on("click",".imgrelacionproducto_defecto", function () {

			var idActual=jQuery(this).attr("idactualbodega");

			bodega_webcontrol1.registrarSesion_defectoParaproductos(idActual);
		});				
	}
		
	

	registrarSesionParaproducto_bodegas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"bodega","producto_bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1,"s","");
	}

	registrarSesion_defectoParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"bodega","producto","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1,"s","_defecto");
	}
	
	registrarControlesTableEdition(bodega_control) {
		bodega_funcion1.registrarControlesTableValidacionEdition(bodega_control,bodega_webcontrol1,bodega_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(bodega_control) {
		jQuery("#divResumenbodegaActualAjaxWebPart").html(bodega_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(bodega_control) {
		//jQuery("#divAccionesRelacionesbodegaAjaxWebPart").html(bodega_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("bodega_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(bodega_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesbodegaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		bodega_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(bodega_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(bodega_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(bodega_control) {
		
		if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",bodega_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",bodega_control.strVisibleFK_Idempresa);
		}

		if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",bodega_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+bodega_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",bodega_control.strVisibleFK_Idsucursal);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionbodega();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("bodega",id,"inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		bodega_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("bodega","empresa","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		bodega_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("bodega","sucursal","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproducto_bodega").click(function(){

			var idActual=jQuery(this).attr("idactualbodega");

			bodega_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualbodega");

			bodega_webcontrol1.registrarSesionParaproductos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodegaConstante,strParametros);
		
		//bodega_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa",bodega_control.empresasFK);

		if(bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+bodega_control.idFilaTablaActual+"_2",bodega_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal",bodega_control.sucursalsFK);

		if(bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+bodega_control.idFilaTablaActual+"_3",bodega_control.sucursalsFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(bodega_control) {

	};

	registrarComboActionChangeCombossucursalsFK(bodega_control) {

	};

	
	
	setDefectoValorCombosempresasFK(bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(bodega_control.idempresaDefaultFK>-1 && jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val() != bodega_control.idempresaDefaultFK) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val(bodega_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(bodega_control.idsucursalDefaultFK>-1 && jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val() != bodega_control.idsucursalDefaultFK) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val(bodega_control.idsucursalDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//bodega_control
		
	
	}
	
	onLoadCombosDefectoFK(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.setDefectoValorCombosempresasFK(bodega_control);
			}

			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.setDefectoValorCombossucursalsFK(bodega_control);
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
	onLoadCombosEventosFK(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				bodega_webcontrol1.registrarComboActionChangeCombosempresasFK(bodega_control);
			//}

			//if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				bodega_webcontrol1.registrarComboActionChangeCombossucursalsFK(bodega_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(bodega_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("bodega","FK_Idempresa","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("bodega","FK_Idsucursal","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
		
			
			if(bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("bodega");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("bodega");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(bodega_funcion1,bodega_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(bodega_funcion1,bodega_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(bodega_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,"bodega");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				bodega_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				bodega_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("bodega");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(bodega_control) {
		
		jQuery("#divBusquedabodegaAjaxWebPart").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trbodegaCabeceraBusquedas").css("display",bodega_control.strPermisoBusqueda);
		jQuery("#trBusquedabodega").css("display",bodega_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportebodega").css("display",bodega_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosbodega").attr("style",bodega_control.strPermisoMostrarTodos);		
		
		if(bodega_control.strPermisoNuevo!=null) {
			jQuery("#tdbodegaNuevo").css("display",bodega_control.strPermisoNuevo);
			jQuery("#tdbodegaNuevoToolBar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdbodegaDuplicar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbodegaDuplicarToolBar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbodegaNuevoGuardarCambios").css("display",bodega_control.strPermisoNuevo);
			jQuery("#tdbodegaNuevoGuardarCambiosToolBar").css("display",bodega_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(bodega_control.strPermisoActualizar!=null) {
			jQuery("#tdbodegaCopiar").css("display",bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbodegaCopiarToolBar").css("display",bodega_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbodegaConEditar").css("display",bodega_control.strPermisoActualizar);
		}
		
		jQuery("#tdbodegaGuardarCambios").css("display",bodega_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdbodegaGuardarCambiosToolBar").css("display",bodega_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdbodegaCerrarPagina").css("display",bodega_control.strPermisoPopup);		
		jQuery("#tdbodegaCerrarPaginaToolBar").css("display",bodega_control.strPermisoPopup);
		//jQuery("#trbodegaAccionesRelaciones").css("display",bodega_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=bodega_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + bodega_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + bodega_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Bodegas";
		sTituloBanner+=" - " + bodega_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + bodega_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdbodegaRelacionesToolBar").css("display",bodega_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosbodega").css("display",bodega_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		bodega_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		bodega_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		bodega_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		bodega_webcontrol1.registrarEventosControles();
		
		if(bodega_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			bodega_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(bodega_constante1.STR_ES_RELACIONES=="true") {
			if(bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				bodega_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(bodega_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				bodega_webcontrol1.onLoad();
			
			//} else {
				//if(bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			bodega_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);	
	}
}

var bodega_webcontrol1 = new bodega_webcontrol();

//Para ser llamado desde otro archivo (import)
export {bodega_webcontrol,bodega_webcontrol1};

//Para ser llamado desde window.opener
window.bodega_webcontrol1 = bodega_webcontrol1;


if(bodega_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = bodega_webcontrol1.onLoadWindow; 
}

//</script>