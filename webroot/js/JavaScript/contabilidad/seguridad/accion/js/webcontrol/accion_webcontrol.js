//<script type="text/javascript" language="javascript">



//var accionJQueryPaginaWebInteraccion= function (accion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {accion_constante,accion_constante1} from '../util/accion_constante.js';

import {accion_funcion,accion_funcion1} from '../util/accion_funcion.js';


class accion_webcontrol extends GeneralEntityWebControl {
	
	accion_control=null;
	accion_controlInicial=null;
	accion_controlAuxiliar=null;
		
	//if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(accion_control) {
		super();
		
		this.accion_control=accion_control;
	}
		
	actualizarVariablesPagina(accion_control) {
		
		if(accion_control.action=="index" || accion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(accion_control);
			
		} 
		
		
		else if(accion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(accion_control);
		
		} else if(accion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(accion_control);
		
		} else if(accion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(accion_control);
		
		} else if(accion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(accion_control);
			
		} else if(accion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(accion_control);
			
		} else if(accion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(accion_control);
		
		} else if(accion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(accion_control);		
		
		} else if(accion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(accion_control);
		
		} else if(accion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(accion_control);
		
		} else if(accion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(accion_control);
		
		} else if(accion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(accion_control);
		
		}  else if(accion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(accion_control);
		
		} else if(accion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(accion_control);
		
		} else if(accion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(accion_control);
		
		} else if(accion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(accion_control);
		
		} else if(accion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(accion_control);
		
		} else if(accion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(accion_control);
		
		} else if(accion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(accion_control);
		
		} else if(accion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(accion_control);
		
		} else if(accion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(accion_control);
		
		} else if(accion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(accion_control);		
		
		} else if(accion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(accion_control);		
		
		} else if(accion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(accion_control);		
		
		} else if(accion_control.action.includes("Busqueda") ||
				  accion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(accion_control);
			
		} else if(accion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(accion_control)
		}
		
		
		
	
		else if(accion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(accion_control);	
		
		} else if(accion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(accion_control);		
		}
	
		else if(accion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(accion_control);		
		}
	
		else if(accion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(accion_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + accion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(accion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(accion_control) {
		this.actualizarPaginaAccionesGenerales(accion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(accion_control) {
		
		this.actualizarPaginaCargaGeneral(accion_control);
		this.actualizarPaginaOrderBy(accion_control);
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaCargaGeneralControles(accion_control);
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(accion_control);
		this.actualizarPaginaAreaBusquedas(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(accion_control) {
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(accion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(accion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(accion_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(accion_control) {
		
		this.actualizarPaginaCargaGeneral(accion_control);
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaCargaGeneralControles(accion_control);
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(accion_control);
		this.actualizarPaginaAreaBusquedas(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		//this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		//this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		//this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(accion_control) {
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(accion_control) {
		this.actualizarPaginaAbrirLink(accion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);				
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		//this.actualizarPaginaFormulario(accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		//this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		//this.actualizarPaginaFormulario(accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(accion_control) {
		//this.actualizarPaginaFormulario(accion_control);
		this.onLoadCombosDefectoFK(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		//this.actualizarPaginaFormulario(accion_control);
		this.onLoadCombosDefectoFK(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		//this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(accion_control) {
		this.actualizarPaginaAbrirLink(accion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(accion_control) {
					//super.actualizarPaginaImprimir(accion_control,"accion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",accion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("accion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(accion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(accion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(accion_control) {
		//super.actualizarPaginaImprimir(accion_control,"accion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("accion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(accion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",accion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(accion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(accion_control) {
		//super.actualizarPaginaImprimir(accion_control,"accion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("accion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(accion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",accion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(accion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(accion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(accion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(accion_control);
			
		this.actualizarPaginaAbrirLink(accion_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(accion_control) {
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaFormulario(accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(accion_control) {
		
		if(accion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(accion_control);
		}
		
		if(accion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(accion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(accion_control) {
		if(accion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("accionReturnGeneral",JSON.stringify(accion_control.accionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(accion_control) {
		if(accion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && accion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(accion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(accion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(accion_control, mostrar) {
		
		if(mostrar==true) {
			accion_funcion1.resaltarRestaurarDivsPagina(false,"accion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				accion_funcion1.resaltarRestaurarDivMantenimiento(false,"accion");
			}			
			
			accion_funcion1.mostrarDivMensaje(true,accion_control.strAuxiliarMensaje,accion_control.strAuxiliarCssMensaje);
		
		} else {
			accion_funcion1.mostrarDivMensaje(false,accion_control.strAuxiliarMensaje,accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(accion_control) {
		if(accion_funcion1.esPaginaForm(accion_constante1)==true) {
			window.opener.accion_webcontrol1.actualizarPaginaTablaDatos(accion_control);
		} else {
			this.actualizarPaginaTablaDatos(accion_control);
		}
	}
	
	actualizarPaginaAbrirLink(accion_control) {
		accion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(accion_control.strAuxiliarUrlPagina);
				
		accion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(accion_control.strAuxiliarTipo,accion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(accion_control) {
		accion_funcion1.resaltarRestaurarDivMensaje(true,accion_control.strAuxiliarMensajeAlert,accion_control.strAuxiliarCssMensaje);
			
		if(accion_funcion1.esPaginaForm(accion_constante1)==true) {
			window.opener.accion_funcion1.resaltarRestaurarDivMensaje(true,accion_control.strAuxiliarMensajeAlert,accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(accion_control) {
		this.accion_controlInicial=accion_control;
			
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(accion_control.strStyleDivArbol,accion_control.strStyleDivContent
																,accion_control.strStyleDivOpcionesBanner,accion_control.strStyleDivExpandirColapsar
																,accion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=accion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",accion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(accion_control) {
		this.actualizarCssBotonesPagina(accion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(accion_control.tiposReportes,accion_control.tiposReporte
															 	,accion_control.tiposPaginacion,accion_control.tiposAcciones
																,accion_control.tiposColumnasSelect,accion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(accion_control.tiposRelaciones,accion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(accion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(accion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(accion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(accion_control) {
	
		var indexPosition=accion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=accion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(accion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 
				accion_webcontrol1.cargarCombosopcionsFK(accion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(accion_control.strRecargarFkTiposNinguno!=null && accion_control.strRecargarFkTiposNinguno!='NINGUNO' && accion_control.strRecargarFkTiposNinguno!='') {
			
				if(accion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTiposNinguno,",")) { 
					accion_webcontrol1.cargarCombosopcionsFK(accion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaopcionFK(accion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,accion_funcion1,accion_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(accion_control) {
		jQuery("#divBusquedaaccionAjaxWebPart").css("display",accion_control.strPermisoBusqueda);
		jQuery("#traccionCabeceraBusquedas").css("display",accion_control.strPermisoBusqueda);
		jQuery("#trBusquedaaccion").css("display",accion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(accion_control.htmlTablaOrderBy!=null
			&& accion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByaccionAjaxWebPart").html(accion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//accion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(accion_control.htmlTablaOrderByRel!=null
			&& accion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelaccionAjaxWebPart").html(accion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(accion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaaccionAjaxWebPart").css("display","none");
			jQuery("#traccionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaaccion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(accion_control) {
		
		if(!accion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(accion_control);
		} else {
			jQuery("#divTablaDatosaccionsAjaxWebPart").html(accion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosaccions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(accion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosaccions=jQuery("#tblTablaDatosaccions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("accion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',accion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			accion_webcontrol1.registrarControlesTableEdition(accion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		accion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(accion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("accion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(accion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosaccionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(accion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(accion_control);
		
		const divOrderBy = document.getElementById("divOrderByaccionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(accion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelaccionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(accion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(accion_control.accionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(accion_control);			
		}
	}
	
	actualizarCamposFilaTabla(accion_control) {
		var i=0;
		
		i=accion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(accion_control.accionActual.id);
		jQuery("#t-version_row_"+i+"").val(accion_control.accionActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(accion_control.accionActual.versionRow);
		
		if(accion_control.accionActual.id_opcion!=null && accion_control.accionActual.id_opcion>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != accion_control.accionActual.id_opcion) {
				jQuery("#t-cel_"+i+"_3").val(accion_control.accionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(accion_control.accionActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(accion_control.accionActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(accion_control.accionActual.descripcion);
		jQuery("#t-cel_"+i+"_7").prop('checked',accion_control.accionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(accion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_accion").click(function(){
		jQuery("#tblTablaDatosaccions").on("click",".imgrelacionperfil_accion", function () {

			var idActual=jQuery(this).attr("idactualaccion");

			accion_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_acciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"accion","perfil_accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1,"es","");
	}
	
	registrarControlesTableEdition(accion_control) {
		accion_funcion1.registrarControlesTableValidacionEdition(accion_control,accion_webcontrol1,accion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(accion_control) {
		jQuery("#divResumenaccionActualAjaxWebPart").html(accion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(accion_control) {
		//jQuery("#divAccionesRelacionesaccionAjaxWebPart").html(accion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("accion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(accion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesaccionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		accion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(accion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(accion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(accion_control) {
		
		if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+accion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",accion_control.strVisibleFK_Idopcion);
			jQuery("#tblstrVisible"+accion_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",accion_control.strVisibleFK_Idopcion);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionaccion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("accion","seguridad","",accion_funcion1,accion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("accion",id,"seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);		
	}
	
	

	abrirBusquedaParaopcion(strNombreCampoBusqueda){//idActual
		accion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("accion","opcion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_accion").click(function(){

			var idActual=jQuery(this).attr("idactualaccion");

			accion_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accionConstante,strParametros);
		
		//accion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosopcionsFK(accion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+accion_constante1.STR_SUFIJO+"-id_opcion",accion_control.opcionsFK);

		if(accion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+accion_control.idFilaTablaActual+"_3",accion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",accion_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosopcionsFK(accion_control) {

	};

	
	
	setDefectoValorCombosopcionsFK(accion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(accion_control.idopcionDefaultFK>-1 && jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val() != accion_control.idopcionDefaultFK) {
				jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val(accion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(accion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//accion_control
		
	
	}
	
	onLoadCombosDefectoFK(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 
				accion_webcontrol1.setDefectoValorCombosopcionsFK(accion_control);
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
	onLoadCombosEventosFK(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				accion_webcontrol1.registrarComboActionChangeCombosopcionsFK(accion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(accion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("accion","FK_Idopcion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
		
			
			if(accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("accion","seguridad","",accion_funcion1,accion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("accion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("accion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(accion_funcion1,accion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(accion_funcion1,accion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(accion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("accion","seguridad","",accion_funcion1,accion_webcontrol1,"accion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				accion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("accion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(accion_control) {
		
		jQuery("#divBusquedaaccionAjaxWebPart").css("display",accion_control.strPermisoBusqueda);
		jQuery("#traccionCabeceraBusquedas").css("display",accion_control.strPermisoBusqueda);
		jQuery("#trBusquedaaccion").css("display",accion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteaccion").css("display",accion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosaccion").attr("style",accion_control.strPermisoMostrarTodos);		
		
		if(accion_control.strPermisoNuevo!=null) {
			jQuery("#tdaccionNuevo").css("display",accion_control.strPermisoNuevo);
			jQuery("#tdaccionNuevoToolBar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdaccionDuplicar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdaccionDuplicarToolBar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdaccionNuevoGuardarCambios").css("display",accion_control.strPermisoNuevo);
			jQuery("#tdaccionNuevoGuardarCambiosToolBar").css("display",accion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(accion_control.strPermisoActualizar!=null) {
			jQuery("#tdaccionCopiar").css("display",accion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdaccionCopiarToolBar").css("display",accion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdaccionConEditar").css("display",accion_control.strPermisoActualizar);
		}
		
		jQuery("#tdaccionGuardarCambios").css("display",accion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdaccionGuardarCambiosToolBar").css("display",accion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdaccionCerrarPagina").css("display",accion_control.strPermisoPopup);		
		jQuery("#tdaccionCerrarPaginaToolBar").css("display",accion_control.strPermisoPopup);
		//jQuery("#traccionAccionesRelaciones").css("display",accion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Acciones";
		sTituloBanner+=" - " + accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + accion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdaccionRelacionesToolBar").css("display",accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosaccion").css("display",accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("accion","seguridad","",accion_funcion1,accion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		accion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		accion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		accion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		accion_webcontrol1.registrarEventosControles();
		
		if(accion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			accion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(accion_constante1.STR_ES_RELACIONES=="true") {
			if(accion_constante1.BIT_ES_PAGINA_FORM==true) {
				accion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(accion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				accion_webcontrol1.onLoad();
			
			//} else {
				//if(accion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			accion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);	
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

var accion_webcontrol1 = new accion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {accion_webcontrol,accion_webcontrol1};

//Para ser llamado desde window.opener
window.accion_webcontrol1 = accion_webcontrol1;


if(accion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = accion_webcontrol1.onLoadWindow; 
}

//</script>