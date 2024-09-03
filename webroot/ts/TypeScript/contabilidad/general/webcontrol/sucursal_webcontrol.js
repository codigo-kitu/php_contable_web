//<script type="text/javascript" language="javascript">



//var sucursalJQueryPaginaWebInteraccion= function (sucursal_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {sucursal_constante,sucursal_constante1} from '../util/sucursal_constante.js';

import {sucursal_funcion,sucursal_funcion1} from '../util/sucursal_funcion.js';


class sucursal_webcontrol extends GeneralEntityWebControl {
	
	sucursal_control=null;
	sucursal_controlInicial=null;
	sucursal_controlAuxiliar=null;
		
	//if(sucursal_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(sucursal_control) {
		super();
		
		this.sucursal_control=sucursal_control;
	}
		
	actualizarVariablesPagina(sucursal_control) {
		
		if(sucursal_control.action=="index" || sucursal_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(sucursal_control);
			
		} 
		
		
		else if(sucursal_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(sucursal_control);
		
		} else if(sucursal_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(sucursal_control);
		
		} else if(sucursal_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(sucursal_control);
		
		} else if(sucursal_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(sucursal_control);
			
		} else if(sucursal_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(sucursal_control);
			
		} else if(sucursal_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(sucursal_control);
		
		} else if(sucursal_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(sucursal_control);		
		
		} else if(sucursal_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(sucursal_control);
		
		} else if(sucursal_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(sucursal_control);
		
		} else if(sucursal_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(sucursal_control);
		
		} else if(sucursal_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(sucursal_control);
		
		}  else if(sucursal_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(sucursal_control);
		
		} else if(sucursal_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(sucursal_control);
		
		} else if(sucursal_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(sucursal_control);
		
		} else if(sucursal_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(sucursal_control);
		
		} else if(sucursal_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(sucursal_control);
		
		} else if(sucursal_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(sucursal_control);
		
		} else if(sucursal_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(sucursal_control);
		
		} else if(sucursal_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(sucursal_control);
		
		} else if(sucursal_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(sucursal_control);
		
		} else if(sucursal_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(sucursal_control);		
		
		} else if(sucursal_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(sucursal_control);		
		
		} else if(sucursal_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(sucursal_control);		
		
		} else if(sucursal_control.action.includes("Busqueda") ||
				  sucursal_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(sucursal_control);
			
		} else if(sucursal_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(sucursal_control)
		}
		
		
		
	
		else if(sucursal_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(sucursal_control);	
		
		} else if(sucursal_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(sucursal_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + sucursal_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(sucursal_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(sucursal_control) {
		this.actualizarPaginaAccionesGenerales(sucursal_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(sucursal_control) {
		
		this.actualizarPaginaCargaGeneral(sucursal_control);
		this.actualizarPaginaOrderBy(sucursal_control);
		this.actualizarPaginaTablaDatos(sucursal_control);
		this.actualizarPaginaCargaGeneralControles(sucursal_control);
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sucursal_control);
		this.actualizarPaginaAreaBusquedas(sucursal_control);
		this.actualizarPaginaCargaCombosFK(sucursal_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(sucursal_control) {
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(sucursal_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(sucursal_control) {
		
		this.actualizarPaginaCargaGeneral(sucursal_control);
		this.actualizarPaginaTablaDatos(sucursal_control);
		this.actualizarPaginaCargaGeneralControles(sucursal_control);
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sucursal_control);
		this.actualizarPaginaAreaBusquedas(sucursal_control);
		this.actualizarPaginaCargaCombosFK(sucursal_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		//this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		//this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		//this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(sucursal_control) {
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(sucursal_control) {
		this.actualizarPaginaAbrirLink(sucursal_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);				
		//this.actualizarPaginaFormulario(sucursal_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);
		//this.actualizarPaginaFormulario(sucursal_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		//this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);
		//this.actualizarPaginaFormulario(sucursal_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(sucursal_control) {
		//this.actualizarPaginaFormulario(sucursal_control);
		this.onLoadCombosDefectoFK(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);
		//this.actualizarPaginaFormulario(sucursal_control);
		this.onLoadCombosDefectoFK(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);		
		//this.actualizarPaginaAreaMantenimiento(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(sucursal_control) {
		this.actualizarPaginaAbrirLink(sucursal_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(sucursal_control) {
		this.actualizarPaginaTablaDatos(sucursal_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(sucursal_control) {
					//super.actualizarPaginaImprimir(sucursal_control,"sucursal");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sucursal_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("sucursal_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(sucursal_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sucursal_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(sucursal_control) {
		//super.actualizarPaginaImprimir(sucursal_control,"sucursal");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("sucursal_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(sucursal_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sucursal_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(sucursal_control) {
		//super.actualizarPaginaImprimir(sucursal_control,"sucursal");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("sucursal_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(sucursal_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sucursal_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sucursal_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(sucursal_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(sucursal_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(sucursal_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(sucursal_control);
			
		this.actualizarPaginaAbrirLink(sucursal_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(sucursal_control) {
		
		if(sucursal_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(sucursal_control);
		}
		
		if(sucursal_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(sucursal_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(sucursal_control) {
		if(sucursal_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("sucursalReturnGeneral",JSON.stringify(sucursal_control.sucursalReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(sucursal_control) {
		if(sucursal_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && sucursal_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(sucursal_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(sucursal_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(sucursal_control, mostrar) {
		
		if(mostrar==true) {
			sucursal_funcion1.resaltarRestaurarDivsPagina(false,"sucursal");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				sucursal_funcion1.resaltarRestaurarDivMantenimiento(false,"sucursal");
			}			
			
			sucursal_funcion1.mostrarDivMensaje(true,sucursal_control.strAuxiliarMensaje,sucursal_control.strAuxiliarCssMensaje);
		
		} else {
			sucursal_funcion1.mostrarDivMensaje(false,sucursal_control.strAuxiliarMensaje,sucursal_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(sucursal_control) {
		if(sucursal_funcion1.esPaginaForm(sucursal_constante1)==true) {
			window.opener.sucursal_webcontrol1.actualizarPaginaTablaDatos(sucursal_control);
		} else {
			this.actualizarPaginaTablaDatos(sucursal_control);
		}
	}
	
	actualizarPaginaAbrirLink(sucursal_control) {
		sucursal_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(sucursal_control.strAuxiliarUrlPagina);
				
		sucursal_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(sucursal_control.strAuxiliarTipo,sucursal_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(sucursal_control) {
		sucursal_funcion1.resaltarRestaurarDivMensaje(true,sucursal_control.strAuxiliarMensajeAlert,sucursal_control.strAuxiliarCssMensaje);
			
		if(sucursal_funcion1.esPaginaForm(sucursal_constante1)==true) {
			window.opener.sucursal_funcion1.resaltarRestaurarDivMensaje(true,sucursal_control.strAuxiliarMensajeAlert,sucursal_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(sucursal_control) {
		this.sucursal_controlInicial=sucursal_control;
			
		if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(sucursal_control.strStyleDivArbol,sucursal_control.strStyleDivContent
																,sucursal_control.strStyleDivOpcionesBanner,sucursal_control.strStyleDivExpandirColapsar
																,sucursal_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=sucursal_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",sucursal_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(sucursal_control) {
		this.actualizarCssBotonesPagina(sucursal_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(sucursal_control.tiposReportes,sucursal_control.tiposReporte
															 	,sucursal_control.tiposPaginacion,sucursal_control.tiposAcciones
																,sucursal_control.tiposColumnasSelect,sucursal_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(sucursal_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(sucursal_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(sucursal_control);			
	}
	
	actualizarPaginaUsuarioInvitado(sucursal_control) {
	
		var indexPosition=sucursal_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=sucursal_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(sucursal_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.cargarCombosempresasFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.cargarCombospaissFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.cargarCombosciudadsFK(sucursal_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(sucursal_control.strRecargarFkTiposNinguno!=null && sucursal_control.strRecargarFkTiposNinguno!='NINGUNO' && sucursal_control.strRecargarFkTiposNinguno!='') {
			
				if(sucursal_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTiposNinguno,",")) { 
					sucursal_webcontrol1.cargarCombosempresasFK(sucursal_control);
				}

				if(sucursal_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTiposNinguno,",")) { 
					sucursal_webcontrol1.cargarCombospaissFK(sucursal_control);
				}

				if(sucursal_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTiposNinguno,",")) { 
					sucursal_webcontrol1.cargarCombosciudadsFK(sucursal_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(sucursal_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sucursal_funcion1,sucursal_control.empresasFK);
	}

	cargarComboEditarTablapaisFK(sucursal_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sucursal_funcion1,sucursal_control.paissFK);
	}

	cargarComboEditarTablaciudadFK(sucursal_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sucursal_funcion1,sucursal_control.ciudadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(sucursal_control) {
		jQuery("#divBusquedasucursalAjaxWebPart").css("display",sucursal_control.strPermisoBusqueda);
		jQuery("#trsucursalCabeceraBusquedas").css("display",sucursal_control.strPermisoBusqueda);
		jQuery("#trBusquedasucursal").css("display",sucursal_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(sucursal_control.htmlTablaOrderBy!=null
			&& sucursal_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBysucursalAjaxWebPart").html(sucursal_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//sucursal_webcontrol1.registrarOrderByActions();
			
		}
			
		if(sucursal_control.htmlTablaOrderByRel!=null
			&& sucursal_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelsucursalAjaxWebPart").html(sucursal_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(sucursal_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedasucursalAjaxWebPart").css("display","none");
			jQuery("#trsucursalCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedasucursal").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(sucursal_control) {
		
		if(!sucursal_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(sucursal_control);
		} else {
			jQuery("#divTablaDatossucursalsAjaxWebPart").html(sucursal_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatossucursals=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatossucursals=jQuery("#tblTablaDatossucursals").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("sucursal",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',sucursal_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			sucursal_webcontrol1.registrarControlesTableEdition(sucursal_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		sucursal_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(sucursal_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("sucursal_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(sucursal_control);
		
		const divTablaDatos = document.getElementById("divTablaDatossucursalsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(sucursal_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(sucursal_control);
		
		const divOrderBy = document.getElementById("divOrderBysucursalAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(sucursal_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelsucursalAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(sucursal_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(sucursal_control.sucursalActual!=null) {//form
			
			this.actualizarCamposFilaTabla(sucursal_control);			
		}
	}
	
	actualizarCamposFilaTabla(sucursal_control) {
		var i=0;
		
		i=sucursal_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(sucursal_control.sucursalActual.id);
		jQuery("#t-version_row_"+i+"").val(sucursal_control.sucursalActual.versionRow);
		
		if(sucursal_control.sucursalActual.id_empresa!=null && sucursal_control.sucursalActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != sucursal_control.sucursalActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(sucursal_control.sucursalActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(sucursal_control.sucursalActual.id_pais!=null && sucursal_control.sucursalActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != sucursal_control.sucursalActual.id_pais) {
				jQuery("#t-cel_"+i+"_3").val(sucursal_control.sucursalActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(sucursal_control.sucursalActual.id_ciudad!=null && sucursal_control.sucursalActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != sucursal_control.sucursalActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_4").val(sucursal_control.sucursalActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(sucursal_control.sucursalActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(sucursal_control.sucursalActual.registro_tributario);
		jQuery("#t-cel_"+i+"_7").val(sucursal_control.sucursalActual.registro_sucursalrial);
		jQuery("#t-cel_"+i+"_8").val(sucursal_control.sucursalActual.direccion1);
		jQuery("#t-cel_"+i+"_9").val(sucursal_control.sucursalActual.direccion2);
		jQuery("#t-cel_"+i+"_10").val(sucursal_control.sucursalActual.direccion3);
		jQuery("#t-cel_"+i+"_11").val(sucursal_control.sucursalActual.telefono1);
		jQuery("#t-cel_"+i+"_12").val(sucursal_control.sucursalActual.celular);
		jQuery("#t-cel_"+i+"_13").val(sucursal_control.sucursalActual.correo_electronico);
		jQuery("#t-cel_"+i+"_14").val(sucursal_control.sucursalActual.sitio_web);
		jQuery("#t-cel_"+i+"_15").val(sucursal_control.sucursalActual.codigo_postal);
		jQuery("#t-cel_"+i+"_16").val(sucursal_control.sucursalActual.fax);
		jQuery("#t-cel_"+i+"_17").val(sucursal_control.sucursalActual.barrio_distrito);
		jQuery("#t-cel_"+i+"_18").val(sucursal_control.sucursalActual.logo);
		jQuery("#t-cel_"+i+"_19").val(sucursal_control.sucursalActual.base_de_datos);
		jQuery("#t-cel_"+i+"_20").val(sucursal_control.sucursalActual.condicion);
		jQuery("#t-cel_"+i+"_21").val(sucursal_control.sucursalActual.icono_asociado);
		jQuery("#t-cel_"+i+"_22").val(sucursal_control.sucursalActual.folder_sucursal);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(sucursal_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(sucursal_control) {
		sucursal_funcion1.registrarControlesTableValidacionEdition(sucursal_control,sucursal_webcontrol1,sucursal_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(sucursal_control) {
		jQuery("#divResumensucursalActualAjaxWebPart").html(sucursal_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(sucursal_control) {
		//jQuery("#divAccionesRelacionessucursalAjaxWebPart").html(sucursal_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("sucursal_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(sucursal_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionessucursalAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		sucursal_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(sucursal_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(sucursal_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(sucursal_control) {
		
		if(sucursal_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",sucursal_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",sucursal_control.strVisibleFK_Idciudad);
		}

		if(sucursal_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+sucursal_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",sucursal_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+sucursal_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",sucursal_control.strVisibleFK_Idempresa);
		}

		if(sucursal_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+sucursal_constante1.STR_SUFIJO+"FK_Idpais").attr("style",sucursal_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+sucursal_constante1.STR_SUFIJO+"FK_Idpais").attr("style",sucursal_control.strVisibleFK_Idpais);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionsucursal();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("sucursal",id,"general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		sucursal_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("sucursal","empresa","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		sucursal_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("sucursal","pais","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		sucursal_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("sucursal","ciudad","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursalConstante,strParametros);
		
		//sucursal_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(sucursal_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa",sucursal_control.empresasFK);

		if(sucursal_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sucursal_control.idFilaTablaActual+"_2",sucursal_control.empresasFK);
		}
	};

	cargarCombospaissFK(sucursal_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais",sucursal_control.paissFK);

		if(sucursal_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sucursal_control.idFilaTablaActual+"_3",sucursal_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",sucursal_control.paissFK);

	};

	cargarCombosciudadsFK(sucursal_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad",sucursal_control.ciudadsFK);

		if(sucursal_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sucursal_control.idFilaTablaActual+"_4",sucursal_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",sucursal_control.ciudadsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(sucursal_control) {

	};

	registrarComboActionChangeCombospaissFK(sucursal_control) {

	};

	registrarComboActionChangeCombosciudadsFK(sucursal_control) {

	};

	
	
	setDefectoValorCombosempresasFK(sucursal_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sucursal_control.idempresaDefaultFK>-1 && jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val() != sucursal_control.idempresaDefaultFK) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa").val(sucursal_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(sucursal_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sucursal_control.idpaisDefaultFK>-1 && jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val() != sucursal_control.idpaisDefaultFK) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais").val(sucursal_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(sucursal_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(sucursal_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sucursal_control.idciudadDefaultFK>-1 && jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val() != sucursal_control.idciudadDefaultFK) {
				jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad").val(sucursal_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(sucursal_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+sucursal_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//sucursal_control
		
	
	}
	
	onLoadCombosDefectoFK(sucursal_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sucursal_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.setDefectoValorCombosempresasFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.setDefectoValorCombospaissFK(sucursal_control);
			}

			if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTipos,",")) { 
				sucursal_webcontrol1.setDefectoValorCombosciudadsFK(sucursal_control);
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
	onLoadCombosEventosFK(sucursal_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sucursal_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sucursal_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sucursal_webcontrol1.registrarComboActionChangeCombosempresasFK(sucursal_control);
			//}

			//if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",sucursal_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sucursal_webcontrol1.registrarComboActionChangeCombospaissFK(sucursal_control);
			//}

			//if(sucursal_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",sucursal_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sucursal_webcontrol1.registrarComboActionChangeCombosciudadsFK(sucursal_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(sucursal_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sucursal_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(sucursal_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(sucursal_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("sucursal","FK_Idciudad","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("sucursal","FK_Idempresa","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("sucursal","FK_Idpais","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
		
			
			if(sucursal_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("sucursal");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("sucursal");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(sucursal_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,"sucursal");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				sucursal_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				sucursal_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sucursal_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				sucursal_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(sucursal_control) {
		
		jQuery("#divBusquedasucursalAjaxWebPart").css("display",sucursal_control.strPermisoBusqueda);
		jQuery("#trsucursalCabeceraBusquedas").css("display",sucursal_control.strPermisoBusqueda);
		jQuery("#trBusquedasucursal").css("display",sucursal_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportesucursal").css("display",sucursal_control.strPermisoReporte);			
		jQuery("#tdMostrarTodossucursal").attr("style",sucursal_control.strPermisoMostrarTodos);		
		
		if(sucursal_control.strPermisoNuevo!=null) {
			jQuery("#tdsucursalNuevo").css("display",sucursal_control.strPermisoNuevo);
			jQuery("#tdsucursalNuevoToolBar").css("display",sucursal_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdsucursalDuplicar").css("display",sucursal_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsucursalDuplicarToolBar").css("display",sucursal_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsucursalNuevoGuardarCambios").css("display",sucursal_control.strPermisoNuevo);
			jQuery("#tdsucursalNuevoGuardarCambiosToolBar").css("display",sucursal_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(sucursal_control.strPermisoActualizar!=null) {
			jQuery("#tdsucursalCopiar").css("display",sucursal_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsucursalCopiarToolBar").css("display",sucursal_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsucursalConEditar").css("display",sucursal_control.strPermisoActualizar);
		}
		
		jQuery("#tdsucursalGuardarCambios").css("display",sucursal_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdsucursalGuardarCambiosToolBar").css("display",sucursal_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdsucursalCerrarPagina").css("display",sucursal_control.strPermisoPopup);		
		jQuery("#tdsucursalCerrarPaginaToolBar").css("display",sucursal_control.strPermisoPopup);
		//jQuery("#trsucursalAccionesRelaciones").css("display",sucursal_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=sucursal_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sucursal_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + sucursal_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Sucursals";
		sTituloBanner+=" - " + sucursal_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sucursal_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdsucursalRelacionesToolBar").css("display",sucursal_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultossucursal").css("display",sucursal_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		sucursal_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		sucursal_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		sucursal_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		sucursal_webcontrol1.registrarEventosControles();
		
		if(sucursal_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
			sucursal_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(sucursal_constante1.STR_ES_RELACIONES=="true") {
			if(sucursal_constante1.BIT_ES_PAGINA_FORM==true) {
				sucursal_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(sucursal_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(sucursal_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				sucursal_webcontrol1.onLoad();
			
			//} else {
				//if(sucursal_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			sucursal_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("sucursal","general","",sucursal_funcion1,sucursal_webcontrol1,sucursal_constante1);	
	}
}

var sucursal_webcontrol1 = new sucursal_webcontrol();

//Para ser llamado desde otro archivo (import)
export {sucursal_webcontrol,sucursal_webcontrol1};

//Para ser llamado desde window.opener
window.sucursal_webcontrol1 = sucursal_webcontrol1;


if(sucursal_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = sucursal_webcontrol1.onLoadWindow; 
}

//</script>