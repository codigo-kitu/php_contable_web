//<script type="text/javascript" language="javascript">



//var proveedorJQueryPaginaWebInteraccion= function (proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {proveedor_constante,proveedor_constante1} from '../util/proveedor_constante.js';

import {proveedor_funcion,proveedor_funcion1} from '../util/proveedor_funcion.js';


class proveedor_webcontrol extends GeneralEntityWebControl {
	
	proveedor_control=null;
	proveedor_controlInicial=null;
	proveedor_controlAuxiliar=null;
		
	//if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(proveedor_control) {
		super();
		
		this.proveedor_control=proveedor_control;
	}
		
	actualizarVariablesPagina(proveedor_control) {
		
		if(proveedor_control.action=="index" || proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(proveedor_control);
			
		} 
		
		
		else if(proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(proveedor_control);
		
		} else if(proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(proveedor_control);
		
		} else if(proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(proveedor_control);
		
		} else if(proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(proveedor_control);
			
		} else if(proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(proveedor_control);
			
		} else if(proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(proveedor_control);
		
		} else if(proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(proveedor_control);		
		
		} else if(proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(proveedor_control);
		
		} else if(proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(proveedor_control);
		
		} else if(proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(proveedor_control);
		
		} else if(proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(proveedor_control);
		
		}  else if(proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(proveedor_control);
		
		} else if(proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(proveedor_control);
		
		} else if(proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(proveedor_control);
		
		} else if(proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(proveedor_control);
		
		} else if(proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(proveedor_control);		
		
		} else if(proveedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(proveedor_control);		
		
		} else if(proveedor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(proveedor_control);		
		
		} else if(proveedor_control.action.includes("Busqueda") ||
				  proveedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(proveedor_control);
			
		} else if(proveedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(proveedor_control)
		}
		
		
		
	
		else if(proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(proveedor_control);	
		
		} else if(proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(proveedor_control);		
		}
	
		else if(proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(proveedor_control);		
		}
	
		else if(proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(proveedor_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(proveedor_control) {
		this.actualizarPaginaAccionesGenerales(proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(proveedor_control);
		this.actualizarPaginaOrderBy(proveedor_control);
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(proveedor_control);
		this.actualizarPaginaAreaBusquedas(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(proveedor_control) {
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(proveedor_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(proveedor_control);
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(proveedor_control);
		this.actualizarPaginaAreaBusquedas(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(proveedor_control) {
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(proveedor_control) {
		this.actualizarPaginaAbrirLink(proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);				
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		//this.actualizarPaginaFormulario(proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		//this.actualizarPaginaFormulario(proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(proveedor_control) {
		//this.actualizarPaginaFormulario(proveedor_control);
		this.onLoadCombosDefectoFK(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		//this.actualizarPaginaFormulario(proveedor_control);
		this.onLoadCombosDefectoFK(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(proveedor_control) {
		this.actualizarPaginaAbrirLink(proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(proveedor_control) {
					//super.actualizarPaginaImprimir(proveedor_control,"proveedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",proveedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("proveedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(proveedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(proveedor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(proveedor_control) {
		//super.actualizarPaginaImprimir(proveedor_control,"proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("proveedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(proveedor_control) {
		//super.actualizarPaginaImprimir(proveedor_control,"proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("proveedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(proveedor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(proveedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(proveedor_control);
			
		this.actualizarPaginaAbrirLink(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(proveedor_control) {
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(proveedor_control) {
		
		if(proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(proveedor_control);
		}
		
		if(proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(proveedor_control) {
		if(proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("proveedorReturnGeneral",JSON.stringify(proveedor_control.proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(proveedor_control) {
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(proveedor_control, mostrar) {
		
		if(mostrar==true) {
			proveedor_funcion1.resaltarRestaurarDivsPagina(false,"proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"proveedor");
			}			
			
			proveedor_funcion1.mostrarDivMensaje(true,proveedor_control.strAuxiliarMensaje,proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			proveedor_funcion1.mostrarDivMensaje(false,proveedor_control.strAuxiliarMensaje,proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(proveedor_control) {
		if(proveedor_funcion1.esPaginaForm(proveedor_constante1)==true) {
			window.opener.proveedor_webcontrol1.actualizarPaginaTablaDatos(proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(proveedor_control) {
		proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(proveedor_control.strAuxiliarUrlPagina);
				
		proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(proveedor_control.strAuxiliarTipo,proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(proveedor_control) {
		proveedor_funcion1.resaltarRestaurarDivMensaje(true,proveedor_control.strAuxiliarMensajeAlert,proveedor_control.strAuxiliarCssMensaje);
			
		if(proveedor_funcion1.esPaginaForm(proveedor_constante1)==true) {
			window.opener.proveedor_funcion1.resaltarRestaurarDivMensaje(true,proveedor_control.strAuxiliarMensajeAlert,proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(proveedor_control) {
		this.proveedor_controlInicial=proveedor_control;
			
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(proveedor_control.strStyleDivArbol,proveedor_control.strStyleDivContent
																,proveedor_control.strStyleDivOpcionesBanner,proveedor_control.strStyleDivExpandirColapsar
																,proveedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(proveedor_control) {
		this.actualizarCssBotonesPagina(proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(proveedor_control.tiposReportes,proveedor_control.tiposReporte
															 	,proveedor_control.tiposPaginacion,proveedor_control.tiposAcciones
																,proveedor_control.tiposColumnasSelect,proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(proveedor_control.tiposRelaciones,proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(proveedor_control) {
	
		var indexPosition=proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosempresasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombostipo_personasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarComboscategoria_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosgiro_negocio_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombospaissFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosprovinciasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosciudadsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosvendedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombostermino_pago_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarComboscuentasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosimpuestosFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosretencionsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosretencion_fuentesFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosretencion_icasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosotro_impuestosFK(proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(proveedor_control.strRecargarFkTiposNinguno!=null && proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosempresasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombostipo_personasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarComboscategoria_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosgiro_negocio_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombospaissFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosprovinciasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosciudadsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosvendedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombostermino_pago_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarComboscuentasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosimpuestosFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosretencionsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosretencion_fuentesFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosretencion_icasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosotro_impuestosFK(proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.empresasFK);
	}

	cargarComboEditarTablatipo_personaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.tipo_personasFK);
	}

	cargarComboEditarTablacategoria_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.categoria_proveedorsFK);
	}

	cargarComboEditarTablagiro_negocio_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.giro_negocio_proveedorsFK);
	}

	cargarComboEditarTablapaisFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.ciudadsFK);
	}

	cargarComboEditarTablavendedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablacuentaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.cuentasFK);
	}

	cargarComboEditarTablaimpuestoFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.impuestosFK);
	}

	cargarComboEditarTablaretencionFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.retencionsFK);
	}

	cargarComboEditarTablaretencion_fuenteFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.retencion_fuentesFK);
	}

	cargarComboEditarTablaretencion_icaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.retencion_icasFK);
	}

	cargarComboEditarTablaotro_impuestoFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.otro_impuestosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(proveedor_control) {
		jQuery("#divBusquedaproveedorAjaxWebPart").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trproveedorCabeceraBusquedas").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaproveedor").css("display",proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(proveedor_control.htmlTablaOrderBy!=null
			&& proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByproveedorAjaxWebPart").html(proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(proveedor_control.htmlTablaOrderByRel!=null
			&& proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelproveedorAjaxWebPart").html(proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaproveedorAjaxWebPart").css("display","none");
			jQuery("#trproveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaproveedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(proveedor_control) {
		
		if(!proveedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(proveedor_control);
		} else {
			jQuery("#divTablaDatosproveedorsAjaxWebPart").html(proveedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosproveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosproveedors=jQuery("#tblTablaDatosproveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			proveedor_webcontrol1.registrarControlesTableEdition(proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(proveedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("proveedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(proveedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosproveedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(proveedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(proveedor_control);
		
		const divOrderBy = document.getElementById("divOrderByproveedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(proveedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelproveedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(proveedor_control.proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(proveedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(proveedor_control) {
		var i=0;
		
		i=proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(proveedor_control.proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(proveedor_control.proveedorActual.versionRow);
		
		if(proveedor_control.proveedorActual.id_empresa!=null && proveedor_control.proveedorActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != proveedor_control.proveedorActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(proveedor_control.proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_tipo_persona!=null && proveedor_control.proveedorActual.id_tipo_persona>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != proveedor_control.proveedorActual.id_tipo_persona) {
				jQuery("#t-cel_"+i+"_3").val(proveedor_control.proveedorActual.id_tipo_persona).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_categoria_proveedor!=null && proveedor_control.proveedorActual.id_categoria_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != proveedor_control.proveedorActual.id_categoria_proveedor) {
				jQuery("#t-cel_"+i+"_4").val(proveedor_control.proveedorActual.id_categoria_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_giro_negocio_proveedor!=null && proveedor_control.proveedorActual.id_giro_negocio_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != proveedor_control.proveedorActual.id_giro_negocio_proveedor) {
				jQuery("#t-cel_"+i+"_5").val(proveedor_control.proveedorActual.id_giro_negocio_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(proveedor_control.proveedorActual.codigo);
		jQuery("#t-cel_"+i+"_7").val(proveedor_control.proveedorActual.ruc);
		jQuery("#t-cel_"+i+"_8").val(proveedor_control.proveedorActual.primer_apellido);
		jQuery("#t-cel_"+i+"_9").val(proveedor_control.proveedorActual.segundo_apellido);
		jQuery("#t-cel_"+i+"_10").val(proveedor_control.proveedorActual.primer_nombre);
		jQuery("#t-cel_"+i+"_11").val(proveedor_control.proveedorActual.segundo_nombre);
		jQuery("#t-cel_"+i+"_12").val(proveedor_control.proveedorActual.nombre_completo);
		jQuery("#t-cel_"+i+"_13").val(proveedor_control.proveedorActual.direccion);
		jQuery("#t-cel_"+i+"_14").val(proveedor_control.proveedorActual.telefono);
		jQuery("#t-cel_"+i+"_15").val(proveedor_control.proveedorActual.telefono_movil);
		jQuery("#t-cel_"+i+"_16").val(proveedor_control.proveedorActual.e_mail);
		jQuery("#t-cel_"+i+"_17").val(proveedor_control.proveedorActual.e_mail2);
		jQuery("#t-cel_"+i+"_18").val(proveedor_control.proveedorActual.comentario);
		jQuery("#t-cel_"+i+"_19").val(proveedor_control.proveedorActual.imagen);
		jQuery("#t-cel_"+i+"_20").prop('checked',proveedor_control.proveedorActual.activo);
		
		if(proveedor_control.proveedorActual.id_pais!=null && proveedor_control.proveedorActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_21").val() != proveedor_control.proveedorActual.id_pais) {
				jQuery("#t-cel_"+i+"_21").val(proveedor_control.proveedorActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_21").select2("val", null);
			if(jQuery("#t-cel_"+i+"_21").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_21").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_provincia!=null && proveedor_control.proveedorActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_22").val() != proveedor_control.proveedorActual.id_provincia) {
				jQuery("#t-cel_"+i+"_22").val(proveedor_control.proveedorActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_22").select2("val", null);
			if(jQuery("#t-cel_"+i+"_22").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_22").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_ciudad!=null && proveedor_control.proveedorActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_23").val() != proveedor_control.proveedorActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_23").val(proveedor_control.proveedorActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_23").select2("val", null);
			if(jQuery("#t-cel_"+i+"_23").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_23").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_24").val(proveedor_control.proveedorActual.codigo_postal);
		jQuery("#t-cel_"+i+"_25").val(proveedor_control.proveedorActual.fax);
		jQuery("#t-cel_"+i+"_26").val(proveedor_control.proveedorActual.contacto);
		
		if(proveedor_control.proveedorActual.id_vendedor!=null && proveedor_control.proveedorActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_27").val() != proveedor_control.proveedorActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_27").val(proveedor_control.proveedorActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_27").select2("val", null);
			if(jQuery("#t-cel_"+i+"_27").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_27").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_28").val(proveedor_control.proveedorActual.maximo_credito);
		jQuery("#t-cel_"+i+"_29").val(proveedor_control.proveedorActual.maximo_descuento);
		jQuery("#t-cel_"+i+"_30").val(proveedor_control.proveedorActual.interes_anual);
		jQuery("#t-cel_"+i+"_31").val(proveedor_control.proveedorActual.balance);
		
		if(proveedor_control.proveedorActual.id_termino_pago_proveedor!=null && proveedor_control.proveedorActual.id_termino_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_32").val() != proveedor_control.proveedorActual.id_termino_pago_proveedor) {
				jQuery("#t-cel_"+i+"_32").val(proveedor_control.proveedorActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_32").select2("val", null);
			if(jQuery("#t-cel_"+i+"_32").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_32").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_cuenta!=null && proveedor_control.proveedorActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_33").val() != proveedor_control.proveedorActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_33").val(proveedor_control.proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_33").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_33").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_34").prop('checked',proveedor_control.proveedorActual.aplica_impuesto_compras);
		
		if(proveedor_control.proveedorActual.id_impuesto!=null && proveedor_control.proveedorActual.id_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_35").val() != proveedor_control.proveedorActual.id_impuesto) {
				jQuery("#t-cel_"+i+"_35").val(proveedor_control.proveedorActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_35").select2("val", null);
			if(jQuery("#t-cel_"+i+"_35").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_35").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_36").prop('checked',proveedor_control.proveedorActual.aplica_retencion_impuesto);
		
		if(proveedor_control.proveedorActual.id_retencion!=null && proveedor_control.proveedorActual.id_retencion>-1){
			if(jQuery("#t-cel_"+i+"_37").val() != proveedor_control.proveedorActual.id_retencion) {
				jQuery("#t-cel_"+i+"_37").val(proveedor_control.proveedorActual.id_retencion).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_37").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_37").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_38").prop('checked',proveedor_control.proveedorActual.aplica_retencion_fuente);
		
		if(proveedor_control.proveedorActual.id_retencion_fuente!=null && proveedor_control.proveedorActual.id_retencion_fuente>-1){
			if(jQuery("#t-cel_"+i+"_39").val() != proveedor_control.proveedorActual.id_retencion_fuente) {
				jQuery("#t-cel_"+i+"_39").val(proveedor_control.proveedorActual.id_retencion_fuente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_39").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_39").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_40").prop('checked',proveedor_control.proveedorActual.aplica_retencion_ica);
		
		if(proveedor_control.proveedorActual.id_retencion_ica!=null && proveedor_control.proveedorActual.id_retencion_ica>-1){
			if(jQuery("#t-cel_"+i+"_41").val() != proveedor_control.proveedorActual.id_retencion_ica) {
				jQuery("#t-cel_"+i+"_41").val(proveedor_control.proveedorActual.id_retencion_ica).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_41").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_41").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_42").prop('checked',proveedor_control.proveedorActual.aplica_2do_impuesto);
		
		if(proveedor_control.proveedorActual.id_otro_impuesto!=null && proveedor_control.proveedorActual.id_otro_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_43").val() != proveedor_control.proveedorActual.id_otro_impuesto) {
				jQuery("#t-cel_"+i+"_43").val(proveedor_control.proveedorActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_43").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_43").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_44").val(proveedor_control.proveedorActual.creado);
		jQuery("#t-cel_"+i+"_45").val(proveedor_control.proveedorActual.monto_ultima_transaccion);
		jQuery("#t-cel_"+i+"_46").val(proveedor_control.proveedorActual.fecha_ultima_transaccion);
		jQuery("#t-cel_"+i+"_47").val(proveedor_control.proveedorActual.descripcion_ultima_transaccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionotro_suplidor").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionotro_suplidor", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_proveedor").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionimagen_proveedor", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaimagen_proveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_pagar").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacioncuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_precio").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelacionlista_precio", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParalista_precioes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_proveedor").click(function(){
		jQuery("#tblTablaDatosproveedors").on("click",".imgrelaciondocumento_proveedor", function () {

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParadocumento_proveedores(idActual);
		});				
	}
		
	

	registrarSesionParaotro_suplidores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","otro_suplidor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1,"es","");
	}

	registrarSesionParaimagen_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","imagen_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1,"es","");
	}

	registrarSesionParacuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","cuenta_pagar","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1,"s","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","orden_compra","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1,"s","");
	}

	registrarSesionParalista_precioes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","lista_precio","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1,"es","");
	}

	registrarSesionParadocumento_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"proveedor","documento_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1,"es","");
	}
	
	registrarControlesTableEdition(proveedor_control) {
		proveedor_funcion1.registrarControlesTableValidacionEdition(proveedor_control,proveedor_webcontrol1,proveedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(proveedor_control) {
		jQuery("#divResumenproveedorActualAjaxWebPart").html(proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(proveedor_control) {
		//jQuery("#divAccionesRelacionesproveedorAjaxWebPart").html(proveedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("proveedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(proveedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesproveedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(proveedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(proveedor_control) {
		
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor").attr("style",proveedor_control.strVisibleFK_Idcategoria_proveedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor").attr("style",proveedor_control.strVisibleFK_Idcategoria_proveedor);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",proveedor_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",proveedor_control.strVisibleFK_Idciudad);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",proveedor_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",proveedor_control.strVisibleFK_Idcuenta);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",proveedor_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",proveedor_control.strVisibleFK_Idempresa);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor").attr("style",proveedor_control.strVisibleFK_Idgiro_negocio_proveedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor").attr("style",proveedor_control.strVisibleFK_Idgiro_negocio_proveedor);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",proveedor_control.strVisibleFK_Idimpuesto);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",proveedor_control.strVisibleFK_Idimpuesto);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",proveedor_control.strVisibleFK_Idotro_impuesto);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",proveedor_control.strVisibleFK_Idotro_impuesto);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idpais").attr("style",proveedor_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idpais").attr("style",proveedor_control.strVisibleFK_Idpais);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",proveedor_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",proveedor_control.strVisibleFK_Idprovincia);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",proveedor_control.strVisibleFK_Idretencion);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",proveedor_control.strVisibleFK_Idretencion);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente").attr("style",proveedor_control.strVisibleFK_Idretencion_fuente);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente").attr("style",proveedor_control.strVisibleFK_Idretencion_fuente);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica").attr("style",proveedor_control.strVisibleFK_Idretencion_ica);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica").attr("style",proveedor_control.strVisibleFK_Idretencion_ica);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",proveedor_control.strVisibleFK_Idtermino_pago_proveedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor").attr("style",proveedor_control.strVisibleFK_Idtermino_pago_proveedor);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona").attr("style",proveedor_control.strVisibleFK_Idtipo_persona);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona").attr("style",proveedor_control.strVisibleFK_Idtipo_persona);
		}

		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",proveedor_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",proveedor_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionproveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("proveedor",id,"cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","empresa","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParatipo_persona(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","tipo_persona","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParacategoria_proveedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","categoria_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParagiro_negocio_proveedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","giro_negocio_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","pais","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","provincia","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","ciudad","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","vendedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParatermino_pago_proveedor(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","termino_pago_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","cuenta","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","impuesto","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaPararetencion(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","retencion","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaPararetencion_fuente(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","retencion_fuente","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaPararetencion_ica(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","retencion_ica","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}

	abrirBusquedaParaotro_impuesto(strNombreCampoBusqueda){//idActual
		proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("proveedor","otro_impuesto","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionotro_suplidor").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		});
		jQuery("#imgdivrelacionimagen_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaimagen_proveedores(idActual);
		});
		jQuery("#imgdivrelacioncuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelacionlista_precio").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParalista_precioes(idActual);
		});
		jQuery("#imgdivrelaciondocumento_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualproveedor");

			proveedor_webcontrol1.registrarSesionParadocumento_proveedores(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedorConstante,strParametros);
		
		//proveedor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa",proveedor_control.empresasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_2",proveedor_control.empresasFK);
		}
	};

	cargarCombostipo_personasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona",proveedor_control.tipo_personasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_3",proveedor_control.tipo_personasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona",proveedor_control.tipo_personasFK);

	};

	cargarComboscategoria_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor",proveedor_control.categoria_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_4",proveedor_control.categoria_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor",proveedor_control.categoria_proveedorsFK);

	};

	cargarCombosgiro_negocio_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor",proveedor_control.giro_negocio_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_5",proveedor_control.giro_negocio_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor",proveedor_control.giro_negocio_proveedorsFK);

	};

	cargarCombospaissFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais",proveedor_control.paissFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_21",proveedor_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",proveedor_control.paissFK);

	};

	cargarCombosprovinciasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia",proveedor_control.provinciasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_22",proveedor_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",proveedor_control.provinciasFK);

	};

	cargarCombosciudadsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad",proveedor_control.ciudadsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_23",proveedor_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",proveedor_control.ciudadsFK);

	};

	cargarCombosvendedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor",proveedor_control.vendedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_27",proveedor_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",proveedor_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",proveedor_control.termino_pago_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_32",proveedor_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",proveedor_control.termino_pago_proveedorsFK);

	};

	cargarComboscuentasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta",proveedor_control.cuentasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_33",proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",proveedor_control.cuentasFK);

	};

	cargarCombosimpuestosFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto",proveedor_control.impuestosFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_35",proveedor_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",proveedor_control.impuestosFK);

	};

	cargarCombosretencionsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion",proveedor_control.retencionsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_37",proveedor_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",proveedor_control.retencionsFK);

	};

	cargarCombosretencion_fuentesFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente",proveedor_control.retencion_fuentesFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_39",proveedor_control.retencion_fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente",proveedor_control.retencion_fuentesFK);

	};

	cargarCombosretencion_icasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica",proveedor_control.retencion_icasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_41",proveedor_control.retencion_icasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica",proveedor_control.retencion_icasFK);

	};

	cargarCombosotro_impuestosFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto",proveedor_control.otro_impuestosFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_43",proveedor_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",proveedor_control.otro_impuestosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(proveedor_control) {

	};

	registrarComboActionChangeCombostipo_personasFK(proveedor_control) {

	};

	registrarComboActionChangeComboscategoria_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosgiro_negocio_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombospaissFK(proveedor_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosciudadsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeComboscuentasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(proveedor_control) {

	};

	registrarComboActionChangeCombosretencionsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosretencion_fuentesFK(proveedor_control) {

	};

	registrarComboActionChangeCombosretencion_icasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val(proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_personasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idtipo_personaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val() != proveedor_control.idtipo_personaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val(proveedor_control.idtipo_personaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(proveedor_control.idtipo_personaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idcategoria_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val() != proveedor_control.idcategoria_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val(proveedor_control.idcategoria_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val(proveedor_control.idcategoria_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgiro_negocio_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idgiro_negocio_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val() != proveedor_control.idgiro_negocio_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val(proveedor_control.idgiro_negocio_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val(proveedor_control.idgiro_negocio_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idpaisDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val() != proveedor_control.idpaisDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val(proveedor_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(proveedor_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idprovinciaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val() != proveedor_control.idprovinciaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val(proveedor_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(proveedor_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idciudadDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val() != proveedor_control.idciudadDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val(proveedor_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(proveedor_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idvendedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val() != proveedor_control.idvendedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val(proveedor_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(proveedor_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != proveedor_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(proveedor_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(proveedor_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idimpuestoDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val() != proveedor_control.idimpuestoDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val(proveedor_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(proveedor_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idretencionDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val() != proveedor_control.idretencionDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val(proveedor_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(proveedor_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_fuentesFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idretencion_fuenteDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val() != proveedor_control.idretencion_fuenteDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val(proveedor_control.idretencion_fuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(proveedor_control.idretencion_fuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_icasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idretencion_icaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val() != proveedor_control.idretencion_icaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val(proveedor_control.idretencion_icaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(proveedor_control.idretencion_icaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != proveedor_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val(proveedor_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(proveedor_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosempresasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombostipo_personasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorComboscategoria_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosgiro_negocio_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombospaissFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosprovinciasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosciudadsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosvendedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorComboscuentasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosimpuestosFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosretencionsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosretencion_fuentesFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosretencion_icasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosotro_impuestosFK(proveedor_control);
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
	onLoadCombosEventosFK(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombostipo_personasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeComboscategoria_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosgiro_negocio_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombospaissFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosprovinciasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosciudadsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosvendedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosimpuestosFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosretencionsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosretencion_fuentesFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosretencion_icasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idcategoria_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idciudad","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idcuenta","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idempresa","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idgiro_negocio_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idimpuesto","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idotro_impuesto","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idpais","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idprovincia","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idretencion","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idretencion_fuente","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idretencion_ica","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idtermino_pago_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idtipo_persona","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("proveedor","FK_Idvendedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
		
			
			if(proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(proveedor_funcion1,proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(proveedor_funcion1,proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_persona","id_tipo_persona","general","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParatipo_persona("id_tipo_persona");
				//alert(jQuery('#form-id_tipo_persona_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_proveedor","id_categoria_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParacategoria_proveedor("id_categoria_proveedor");
				//alert(jQuery('#form-id_categoria_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("giro_negocio_proveedor","id_giro_negocio_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParagiro_negocio_proveedor("id_giro_negocio_proveedor");
				//alert(jQuery('#form-id_giro_negocio_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_fuente","id_retencion_fuente","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaPararetencion_fuente("id_retencion_fuente");
				//alert(jQuery('#form-id_retencion_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_ica","id_retencion_ica","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaPararetencion_ica("id_retencion_ica");
				//alert(jQuery('#form-id_retencion_ica_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(proveedor_control) {
		
		jQuery("#divBusquedaproveedorAjaxWebPart").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trproveedorCabeceraBusquedas").css("display",proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaproveedor").css("display",proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteproveedor").css("display",proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosproveedor").attr("style",proveedor_control.strPermisoMostrarTodos);		
		
		if(proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdproveedorNuevo").css("display",proveedor_control.strPermisoNuevo);
			jQuery("#tdproveedorNuevoToolBar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdproveedorDuplicar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproveedorDuplicarToolBar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproveedorNuevoGuardarCambios").css("display",proveedor_control.strPermisoNuevo);
			jQuery("#tdproveedorNuevoGuardarCambiosToolBar").css("display",proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdproveedorCopiar").css("display",proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproveedorCopiarToolBar").css("display",proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproveedorConEditar").css("display",proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdproveedorGuardarCambios").css("display",proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdproveedorGuardarCambiosToolBar").css("display",proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdproveedorCerrarPagina").css("display",proveedor_control.strPermisoPopup);		
		jQuery("#tdproveedorCerrarPaginaToolBar").css("display",proveedor_control.strPermisoPopup);
		//jQuery("#trproveedorAccionesRelaciones").css("display",proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Proveedores";
		sTituloBanner+=" - " + proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdproveedorRelacionesToolBar").css("display",proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosproveedor").css("display",proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		proveedor_webcontrol1.registrarEventosControles();
		
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				proveedor_webcontrol1.onLoad();
			
			//} else {
				//if(proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);	
	}
}

var proveedor_webcontrol1 = new proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {proveedor_webcontrol,proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.proveedor_webcontrol1 = proveedor_webcontrol1;


if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = proveedor_webcontrol1.onLoadWindow; 
}

//</script>