//<script type="text/javascript" language="javascript">



//var perfilJQueryPaginaWebInteraccion= function (perfil_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_constante,perfil_constante1} from '../util/perfil_constante.js';

import {perfil_funcion,perfil_funcion1} from '../util/perfil_funcion.js';


class perfil_webcontrol extends GeneralEntityWebControl {
	
	perfil_control=null;
	perfil_controlInicial=null;
	perfil_controlAuxiliar=null;
		
	//if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_control) {
		super();
		
		this.perfil_control=perfil_control;
	}
		
	actualizarVariablesPagina(perfil_control) {
		
		if(perfil_control.action=="index" || perfil_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_control);
			
		} 
		
		
		else if(perfil_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_control);
		
		} else if(perfil_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_control);
		
		} else if(perfil_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_control);
		
		} else if(perfil_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_control);
			
		} else if(perfil_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_control);
			
		} else if(perfil_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_control);
		
		} else if(perfil_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_control);		
		
		} else if(perfil_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_control);
		
		} else if(perfil_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_control);
		
		} else if(perfil_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_control);
		
		} else if(perfil_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_control);
		
		}  else if(perfil_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_control);
		
		} else if(perfil_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_control);
		
		} else if(perfil_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_control);
		
		} else if(perfil_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_control);
		
		} else if(perfil_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_control);
		
		} else if(perfil_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_control);
		
		} else if(perfil_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_control);
		
		} else if(perfil_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_control);		
		
		} else if(perfil_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_control);		
		
		} else if(perfil_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_control);		
		
		} else if(perfil_control.action.includes("Busqueda") ||
				  perfil_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(perfil_control);
			
		} else if(perfil_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_control)
		}
		
		
		
	
		else if(perfil_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_control);	
		
		} else if(perfil_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_control);		
		}
	
		else if(perfil_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_control);		
		}
	
		else if(perfil_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(perfil_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_control) {
		this.actualizarPaginaAccionesGenerales(perfil_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_control);
		this.actualizarPaginaOrderBy(perfil_control);
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_control);
		this.actualizarPaginaAreaBusquedas(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_control) {
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(perfil_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_control);
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_control);
		this.actualizarPaginaAreaBusquedas(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_control) {
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_control) {
		this.actualizarPaginaAbrirLink(perfil_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);				
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		//this.actualizarPaginaFormulario(perfil_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		//this.actualizarPaginaFormulario(perfil_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_control) {
		//this.actualizarPaginaFormulario(perfil_control);
		this.onLoadCombosDefectoFK(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		//this.actualizarPaginaFormulario(perfil_control);
		this.onLoadCombosDefectoFK(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_control) {
		this.actualizarPaginaAbrirLink(perfil_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_control) {
					//super.actualizarPaginaImprimir(perfil_control,"perfil");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("perfil_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_control) {
		//super.actualizarPaginaImprimir(perfil_control,"perfil");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("perfil_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(perfil_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_control) {
		//super.actualizarPaginaImprimir(perfil_control,"perfil");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("perfil_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(perfil_control);
			
		this.actualizarPaginaAbrirLink(perfil_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(perfil_control) {
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_control) {
		
		if(perfil_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_control);
		}
		
		if(perfil_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_control) {
		if(perfil_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfilReturnGeneral",JSON.stringify(perfil_control.perfilReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_control) {
		if(perfil_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_control, mostrar) {
		
		if(mostrar==true) {
			perfil_funcion1.resaltarRestaurarDivsPagina(false,"perfil");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil");
			}			
			
			perfil_funcion1.mostrarDivMensaje(true,perfil_control.strAuxiliarMensaje,perfil_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_funcion1.mostrarDivMensaje(false,perfil_control.strAuxiliarMensaje,perfil_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_control) {
		if(perfil_funcion1.esPaginaForm(perfil_constante1)==true) {
			window.opener.perfil_webcontrol1.actualizarPaginaTablaDatos(perfil_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_control) {
		perfil_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_control.strAuxiliarUrlPagina);
				
		perfil_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_control.strAuxiliarTipo,perfil_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_control) {
		perfil_funcion1.resaltarRestaurarDivMensaje(true,perfil_control.strAuxiliarMensajeAlert,perfil_control.strAuxiliarCssMensaje);
			
		if(perfil_funcion1.esPaginaForm(perfil_constante1)==true) {
			window.opener.perfil_funcion1.resaltarRestaurarDivMensaje(true,perfil_control.strAuxiliarMensajeAlert,perfil_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_control) {
		this.perfil_controlInicial=perfil_control;
			
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_control.strStyleDivArbol,perfil_control.strStyleDivContent
																,perfil_control.strStyleDivOpcionesBanner,perfil_control.strStyleDivExpandirColapsar
																,perfil_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_control) {
		this.actualizarCssBotonesPagina(perfil_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_control.tiposReportes,perfil_control.tiposReporte
															 	,perfil_control.tiposPaginacion,perfil_control.tiposAcciones
																,perfil_control.tiposColumnasSelect,perfil_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(perfil_control.tiposRelaciones,perfil_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_control) {
	
		var indexPosition=perfil_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 
				perfil_webcontrol1.cargarCombossistemasFK(perfil_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_control.strRecargarFkTiposNinguno!=null && perfil_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTiposNinguno,",")) { 
					perfil_webcontrol1.cargarCombossistemasFK(perfil_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(perfil_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_funcion1,perfil_control.sistemasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(perfil_control) {
		jQuery("#divBusquedaperfilAjaxWebPart").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trperfilCabeceraBusquedas").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil").css("display",perfil_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_control.htmlTablaOrderBy!=null
			&& perfil_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfilAjaxWebPart").html(perfil_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_control.htmlTablaOrderByRel!=null
			&& perfil_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfilAjaxWebPart").html(perfil_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfilAjaxWebPart").css("display","none");
			jQuery("#trperfilCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(perfil_control) {
		
		if(!perfil_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(perfil_control);
		} else {
			jQuery("#divTablaDatosperfilsAjaxWebPart").html(perfil_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfils=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfils=jQuery("#tblTablaDatosperfils").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_webcontrol1.registrarControlesTableEdition(perfil_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(perfil_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("perfil_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosperfilsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(perfil_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(perfil_control);
		
		const divOrderBy = document.getElementById("divOrderByperfilAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(perfil_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelperfilAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(perfil_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_control.perfilActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_control);			
		}
	}
	
	actualizarCamposFilaTabla(perfil_control) {
		var i=0;
		
		i=perfil_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_control.perfilActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_control.perfilActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(perfil_control.perfilActual.versionRow);
		
		if(perfil_control.perfilActual.id_sistema!=null && perfil_control.perfilActual.id_sistema>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_control.perfilActual.id_sistema) {
				jQuery("#t-cel_"+i+"_3").val(perfil_control.perfilActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(perfil_control.perfilActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(perfil_control.perfilActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(perfil_control.perfilActual.nombre2);
		jQuery("#t-cel_"+i+"_7").prop('checked',perfil_control.perfilActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_accion").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_accion", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_campo").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_campo", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_opcion").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_opcion", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_usuario").click(function(){
		jQuery("#tblTablaDatosperfils").on("click",".imgrelacionperfil_usuario", function () {

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_acciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_accion","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1,"es","");
	}

	registrarSesionParaperfil_campos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_campo","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1,"s","");
	}

	registrarSesionParaperfil_opciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_opcion","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1,"es","");
	}

	registrarSesionParaperfil_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"perfil","perfil_usuario","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1,"s","");
	}
	
	registrarControlesTableEdition(perfil_control) {
		perfil_funcion1.registrarControlesTableValidacionEdition(perfil_control,perfil_webcontrol1,perfil_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_control) {
		jQuery("#divResumenperfilActualAjaxWebPart").html(perfil_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_control) {
		//jQuery("#divAccionesRelacionesperfilAjaxWebPart").html(perfil_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("perfil_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesperfilAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		perfil_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_control) {
		
		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",perfil_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",perfil_control.strVisibleBusquedaPorNombre);
		}

		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre2").attr("style",perfil_control.strVisibleBusquedaPorNombre2);
			jQuery("#tblstrVisible"+perfil_constante1.STR_SUFIJO+"BusquedaPorNombre2").attr("style",perfil_control.strVisibleBusquedaPorNombre2);
		}

		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",perfil_control.strVisibleFK_Idsistema);
			jQuery("#tblstrVisible"+perfil_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",perfil_control.strVisibleFK_Idsistema);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil",id,"seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);		
	}
	
	

	abrirBusquedaParasistema(strNombreCampoBusqueda){//idActual
		perfil_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil","sistema","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_accion").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_acciones(idActual);
		});
		jQuery("#imgdivrelacionperfil_campo").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});
		jQuery("#imgdivrelacionperfil_opcion").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_opciones(idActual);
		});
		jQuery("#imgdivrelacionperfil_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualperfil");

			perfil_webcontrol1.registrarSesionParaperfil_usuarios(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfilConstante,strParametros);
		
		//perfil_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(perfil_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema",perfil_control.sistemasFK);

		if(perfil_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_control.idFilaTablaActual+"_3",perfil_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",perfil_control.sistemasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(perfil_control) {

	};

	
	
	setDefectoValorCombossistemasFK(perfil_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_control.idsistemaDefaultFK>-1 && jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val() != perfil_control.idsistemaDefaultFK) {
				jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val(perfil_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(perfil_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 
				perfil_webcontrol1.setDefectoValorCombossistemasFK(perfil_control);
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
	onLoadCombosEventosFK(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_webcontrol1.registrarComboActionChangeCombossistemasFK(perfil_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil","BusquedaPorNombre","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil","BusquedaPorNombre2","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil","FK_Idsistema","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
		
			
			if(perfil_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(perfil_funcion1,perfil_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(perfil_funcion1,perfil_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(perfil_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,"perfil");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				perfil_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("perfil");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_control) {
		
		jQuery("#divBusquedaperfilAjaxWebPart").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trperfilCabeceraBusquedas").css("display",perfil_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil").css("display",perfil_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil").css("display",perfil_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil").attr("style",perfil_control.strPermisoMostrarTodos);		
		
		if(perfil_control.strPermisoNuevo!=null) {
			jQuery("#tdperfilNuevo").css("display",perfil_control.strPermisoNuevo);
			jQuery("#tdperfilNuevoToolBar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfilDuplicar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfilDuplicarToolBar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfilNuevoGuardarCambios").css("display",perfil_control.strPermisoNuevo);
			jQuery("#tdperfilNuevoGuardarCambiosToolBar").css("display",perfil_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_control.strPermisoActualizar!=null) {
			jQuery("#tdperfilCopiar").css("display",perfil_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfilCopiarToolBar").css("display",perfil_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfilConEditar").css("display",perfil_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfilGuardarCambios").css("display",perfil_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfilGuardarCambiosToolBar").css("display",perfil_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdperfilCerrarPagina").css("display",perfil_control.strPermisoPopup);		
		jQuery("#tdperfilCerrarPaginaToolBar").css("display",perfil_control.strPermisoPopup);
		//jQuery("#trperfilAccionesRelaciones").css("display",perfil_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfiles";
		sTituloBanner+=" - " + perfil_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfilRelacionesToolBar").css("display",perfil_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil").css("display",perfil_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_webcontrol1.registrarEventosControles();
		
		if(perfil_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			perfil_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_webcontrol1.onLoad();
			
			//} else {
				//if(perfil_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			perfil_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);	
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

var perfil_webcontrol1 = new perfil_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_webcontrol,perfil_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_webcontrol1 = perfil_webcontrol1;


if(perfil_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_webcontrol1.onLoadWindow; 
}

//</script>