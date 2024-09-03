//<script type="text/javascript" language="javascript">



//var imagen_clienteJQueryPaginaWebInteraccion= function (imagen_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_cliente_constante,imagen_cliente_constante1} from '../util/imagen_cliente_constante.js';

import {imagen_cliente_funcion,imagen_cliente_funcion1} from '../util/imagen_cliente_funcion.js';


class imagen_cliente_webcontrol extends GeneralEntityWebControl {
	
	imagen_cliente_control=null;
	imagen_cliente_controlInicial=null;
	imagen_cliente_controlAuxiliar=null;
		
	//if(imagen_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_cliente_control) {
		super();
		
		this.imagen_cliente_control=imagen_cliente_control;
	}
		
	actualizarVariablesPagina(imagen_cliente_control) {
		
		if(imagen_cliente_control.action=="index" || imagen_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_cliente_control);
			
		} 
		
		
		else if(imagen_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_cliente_control);
			
		} else if(imagen_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_cliente_control);
			
		} else if(imagen_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_cliente_control);		
		
		} else if(imagen_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_cliente_control);
		
		}  else if(imagen_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_cliente_control);		
		
		} else if(imagen_cliente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_cliente_control);		
		
		} else if(imagen_cliente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_cliente_control);		
		
		} else if(imagen_cliente_control.action.includes("Busqueda") ||
				  imagen_cliente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_cliente_control);
			
		} else if(imagen_cliente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_cliente_control)
		}
		
		
		
	
		else if(imagen_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_cliente_control);	
		
		} else if(imagen_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cliente_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_cliente_control) {
		this.actualizarPaginaAccionesGenerales(imagen_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cliente_control);
		this.actualizarPaginaOrderBy(imagen_cliente_control);
		this.actualizarPaginaTablaDatos(imagen_cliente_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cliente_control);
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cliente_control);
		this.actualizarPaginaAreaBusquedas(imagen_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_cliente_control) {
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cliente_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cliente_control);
		this.actualizarPaginaTablaDatos(imagen_cliente_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cliente_control);
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cliente_control);
		this.actualizarPaginaAreaBusquedas(imagen_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_cliente_control) {
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_cliente_control) {
		this.actualizarPaginaAbrirLink(imagen_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);				
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);
		//this.actualizarPaginaFormulario(imagen_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);
		//this.actualizarPaginaFormulario(imagen_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_cliente_control) {
		//this.actualizarPaginaFormulario(imagen_cliente_control);
		this.onLoadCombosDefectoFK(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);
		//this.actualizarPaginaFormulario(imagen_cliente_control);
		this.onLoadCombosDefectoFK(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_cliente_control) {
		this.actualizarPaginaAbrirLink(imagen_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_cliente_control) {
					//super.actualizarPaginaImprimir(imagen_cliente_control,"imagen_cliente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_cliente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_cliente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_cliente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_cliente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_cliente_control) {
		//super.actualizarPaginaImprimir(imagen_cliente_control,"imagen_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_cliente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_cliente_control) {
		//super.actualizarPaginaImprimir(imagen_cliente_control,"imagen_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_cliente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_cliente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_cliente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_cliente_control);
			
		this.actualizarPaginaAbrirLink(imagen_cliente_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_cliente_control) {
		
		if(imagen_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_cliente_control);
		}
		
		if(imagen_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_cliente_control) {
		if(imagen_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_clienteReturnGeneral",JSON.stringify(imagen_cliente_control.imagen_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control) {
		if(imagen_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_cliente_control, mostrar) {
		
		if(mostrar==true) {
			imagen_cliente_funcion1.resaltarRestaurarDivsPagina(false,"imagen_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_cliente");
			}			
			
			imagen_cliente_funcion1.mostrarDivMensaje(true,imagen_cliente_control.strAuxiliarMensaje,imagen_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_cliente_funcion1.mostrarDivMensaje(false,imagen_cliente_control.strAuxiliarMensaje,imagen_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_cliente_control) {
		if(imagen_cliente_funcion1.esPaginaForm(imagen_cliente_constante1)==true) {
			window.opener.imagen_cliente_webcontrol1.actualizarPaginaTablaDatos(imagen_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_cliente_control) {
		imagen_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_cliente_control.strAuxiliarUrlPagina);
				
		imagen_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_cliente_control.strAuxiliarTipo,imagen_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_cliente_control) {
		imagen_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_cliente_control.strAuxiliarMensajeAlert,imagen_cliente_control.strAuxiliarCssMensaje);
			
		if(imagen_cliente_funcion1.esPaginaForm(imagen_cliente_constante1)==true) {
			window.opener.imagen_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_cliente_control.strAuxiliarMensajeAlert,imagen_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_cliente_control) {
		this.imagen_cliente_controlInicial=imagen_cliente_control;
			
		if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_cliente_control.strStyleDivArbol,imagen_cliente_control.strStyleDivContent
																,imagen_cliente_control.strStyleDivOpcionesBanner,imagen_cliente_control.strStyleDivExpandirColapsar
																,imagen_cliente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_cliente_control) {
		this.actualizarCssBotonesPagina(imagen_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_cliente_control.tiposReportes,imagen_cliente_control.tiposReporte
															 	,imagen_cliente_control.tiposPaginacion,imagen_cliente_control.tiposAcciones
																,imagen_cliente_control.tiposColumnasSelect,imagen_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_cliente_control) {
	
		var indexPosition=imagen_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTipos,",")) { 
				imagen_cliente_webcontrol1.cargarCombosclientesFK(imagen_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_cliente_control.strRecargarFkTiposNinguno!=null && imagen_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTiposNinguno,",")) { 
					imagen_cliente_webcontrol1.cargarCombosclientesFK(imagen_cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaclienteFK(imagen_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_cliente_funcion1,imagen_cliente_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_cliente_control) {
		jQuery("#divBusquedaimagen_clienteAjaxWebPart").css("display",imagen_cliente_control.strPermisoBusqueda);
		jQuery("#trimagen_clienteCabeceraBusquedas").css("display",imagen_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_cliente").css("display",imagen_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_cliente_control.htmlTablaOrderBy!=null
			&& imagen_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_clienteAjaxWebPart").html(imagen_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_cliente_control.htmlTablaOrderByRel!=null
			&& imagen_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_clienteAjaxWebPart").html(imagen_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_clienteAjaxWebPart").css("display","none");
			jQuery("#trimagen_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_cliente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_cliente_control) {
		
		if(!imagen_cliente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_cliente_control);
		} else {
			jQuery("#divTablaDatosimagen_clientesAjaxWebPart").html(imagen_cliente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_clientes=jQuery("#tblTablaDatosimagen_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_cliente_webcontrol1.registrarControlesTableEdition(imagen_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_cliente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_cliente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_cliente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_clientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_cliente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_cliente_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_clienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_cliente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_clienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_cliente_control.imagen_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_cliente_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_cliente_control) {
		var i=0;
		
		i=imagen_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_cliente_control.imagen_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_cliente_control.imagen_clienteActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(imagen_cliente_control.imagen_clienteActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(imagen_cliente_control.imagen_clienteActual.id_imagen);
		
		if(imagen_cliente_control.imagen_clienteActual.id_cliente!=null && imagen_cliente_control.imagen_clienteActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != imagen_cliente_control.imagen_clienteActual.id_cliente) {
				jQuery("#t-cel_"+i+"_4").val(imagen_cliente_control.imagen_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(imagen_cliente_control.imagen_clienteActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_cliente_control) {
		imagen_cliente_funcion1.registrarControlesTableValidacionEdition(imagen_cliente_control,imagen_cliente_webcontrol1,imagen_cliente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_cliente_control) {
		jQuery("#divResumenimagen_clienteActualAjaxWebPart").html(imagen_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_cliente_control) {
		//jQuery("#divAccionesRelacionesimagen_clienteAjaxWebPart").html(imagen_cliente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_cliente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_cliente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_clienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_cliente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_cliente_control) {
		
		if(imagen_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",imagen_cliente_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",imagen_cliente_control.strVisibleFK_Idcliente);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_cliente",id,"cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);		
	}
	
	

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		imagen_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_cliente","cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_clienteConstante,strParametros);
		
		//imagen_cliente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosclientesFK(imagen_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente",imagen_cliente_control.clientesFK);

		if(imagen_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_cliente_control.idFilaTablaActual+"_4",imagen_cliente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",imagen_cliente_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosclientesFK(imagen_cliente_control) {

	};

	
	
	setDefectoValorCombosclientesFK(imagen_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_cliente_control.idclienteDefaultFK>-1 && jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != imagen_cliente_control.idclienteDefaultFK) {
				jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val(imagen_cliente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(imagen_cliente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTipos,",")) { 
				imagen_cliente_webcontrol1.setDefectoValorCombosclientesFK(imagen_cliente_control);
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
	onLoadCombosEventosFK(imagen_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_cliente_webcontrol1.registrarComboActionChangeCombosclientesFK(imagen_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_cliente","FK_Idcliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
		
			
			if(imagen_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_cliente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,"imagen_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				imagen_cliente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_cliente_control) {
		
		jQuery("#divBusquedaimagen_clienteAjaxWebPart").css("display",imagen_cliente_control.strPermisoBusqueda);
		jQuery("#trimagen_clienteCabeceraBusquedas").css("display",imagen_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_cliente").css("display",imagen_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_cliente").css("display",imagen_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_cliente").attr("style",imagen_cliente_control.strPermisoMostrarTodos);		
		
		if(imagen_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_clienteNuevo").css("display",imagen_cliente_control.strPermisoNuevo);
			jQuery("#tdimagen_clienteNuevoToolBar").css("display",imagen_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_clienteDuplicar").css("display",imagen_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_clienteDuplicarToolBar").css("display",imagen_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_clienteNuevoGuardarCambios").css("display",imagen_cliente_control.strPermisoNuevo);
			jQuery("#tdimagen_clienteNuevoGuardarCambiosToolBar").css("display",imagen_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_clienteCopiar").css("display",imagen_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_clienteCopiarToolBar").css("display",imagen_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_clienteConEditar").css("display",imagen_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_clienteGuardarCambios").css("display",imagen_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_clienteGuardarCambiosToolBar").css("display",imagen_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_clienteCerrarPagina").css("display",imagen_cliente_control.strPermisoPopup);		
		jQuery("#tdimagen_clienteCerrarPaginaToolBar").css("display",imagen_cliente_control.strPermisoPopup);
		//jQuery("#trimagen_clienteAccionesRelaciones").css("display",imagen_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Clientes";
		sTituloBanner+=" - " + imagen_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_clienteRelacionesToolBar").css("display",imagen_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_cliente").css("display",imagen_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_cliente_webcontrol1.registrarEventosControles();
		
		if(imagen_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
			imagen_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_cliente_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);	
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

var imagen_cliente_webcontrol1 = new imagen_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_cliente_webcontrol,imagen_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_cliente_webcontrol1 = imagen_cliente_webcontrol1;


if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_cliente_webcontrol1.onLoadWindow; 
}

//</script>