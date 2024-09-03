//<script type="text/javascript" language="javascript">



//var moduloJQueryPaginaWebInteraccion= function (modulo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {modulo_constante,modulo_constante1} from '../util/modulo_constante.js';

import {modulo_funcion,modulo_funcion1} from '../util/modulo_funcion.js';


class modulo_webcontrol extends GeneralEntityWebControl {
	
	modulo_control=null;
	modulo_controlInicial=null;
	modulo_controlAuxiliar=null;
		
	//if(modulo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(modulo_control) {
		super();
		
		this.modulo_control=modulo_control;
	}
		
	actualizarVariablesPagina(modulo_control) {
		
		if(modulo_control.action=="index" || modulo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(modulo_control);
			
		} 
		
		
		else if(modulo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(modulo_control);
		
		} else if(modulo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(modulo_control);
		
		} else if(modulo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(modulo_control);
		
		} else if(modulo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(modulo_control);
			
		} else if(modulo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(modulo_control);
			
		} else if(modulo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(modulo_control);
		
		} else if(modulo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(modulo_control);		
		
		} else if(modulo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(modulo_control);
		
		} else if(modulo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(modulo_control);
		
		} else if(modulo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(modulo_control);
		
		} else if(modulo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(modulo_control);
		
		}  else if(modulo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(modulo_control);
		
		} else if(modulo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(modulo_control);
		
		} else if(modulo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(modulo_control);
		
		} else if(modulo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(modulo_control);
		
		} else if(modulo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(modulo_control);
		
		} else if(modulo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(modulo_control);
		
		} else if(modulo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(modulo_control);
		
		} else if(modulo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(modulo_control);
		
		} else if(modulo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(modulo_control);
		
		} else if(modulo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(modulo_control);		
		
		} else if(modulo_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(modulo_control);		
		
		} else if(modulo_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(modulo_control);		
		
		} else if(modulo_control.action.includes("Busqueda") ||
				  modulo_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(modulo_control);
			
		} else if(modulo_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(modulo_control)
		}
		
		
		
	
		else if(modulo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(modulo_control);	
		
		} else if(modulo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(modulo_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + modulo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(modulo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(modulo_control) {
		this.actualizarPaginaAccionesGenerales(modulo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(modulo_control) {
		
		this.actualizarPaginaCargaGeneral(modulo_control);
		this.actualizarPaginaOrderBy(modulo_control);
		this.actualizarPaginaTablaDatos(modulo_control);
		this.actualizarPaginaCargaGeneralControles(modulo_control);
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(modulo_control);
		this.actualizarPaginaAreaBusquedas(modulo_control);
		this.actualizarPaginaCargaCombosFK(modulo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(modulo_control) {
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(modulo_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(modulo_control) {
		
		this.actualizarPaginaCargaGeneral(modulo_control);
		this.actualizarPaginaTablaDatos(modulo_control);
		this.actualizarPaginaCargaGeneralControles(modulo_control);
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(modulo_control);
		this.actualizarPaginaAreaBusquedas(modulo_control);
		this.actualizarPaginaCargaCombosFK(modulo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		//this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		//this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		//this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(modulo_control) {
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(modulo_control) {
		this.actualizarPaginaAbrirLink(modulo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);				
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);
		//this.actualizarPaginaFormulario(modulo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		//this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);
		//this.actualizarPaginaFormulario(modulo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(modulo_control) {
		//this.actualizarPaginaFormulario(modulo_control);
		this.onLoadCombosDefectoFK(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);
		//this.actualizarPaginaFormulario(modulo_control);
		this.onLoadCombosDefectoFK(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		//this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(modulo_control) {
		this.actualizarPaginaAbrirLink(modulo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(modulo_control) {
		this.actualizarPaginaTablaDatos(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(modulo_control) {
					//super.actualizarPaginaImprimir(modulo_control,"modulo");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",modulo_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("modulo_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(modulo_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(modulo_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(modulo_control) {
		//super.actualizarPaginaImprimir(modulo_control,"modulo");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("modulo_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(modulo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",modulo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(modulo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(modulo_control) {
		//super.actualizarPaginaImprimir(modulo_control,"modulo");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("modulo_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(modulo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",modulo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(modulo_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(modulo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(modulo_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(modulo_control);
			
		this.actualizarPaginaAbrirLink(modulo_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(modulo_control) {
		
		if(modulo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(modulo_control);
		}
		
		if(modulo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(modulo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(modulo_control) {
		if(modulo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("moduloReturnGeneral",JSON.stringify(modulo_control.moduloReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(modulo_control) {
		if(modulo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && modulo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(modulo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(modulo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(modulo_control, mostrar) {
		
		if(mostrar==true) {
			modulo_funcion1.resaltarRestaurarDivsPagina(false,"modulo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				modulo_funcion1.resaltarRestaurarDivMantenimiento(false,"modulo");
			}			
			
			modulo_funcion1.mostrarDivMensaje(true,modulo_control.strAuxiliarMensaje,modulo_control.strAuxiliarCssMensaje);
		
		} else {
			modulo_funcion1.mostrarDivMensaje(false,modulo_control.strAuxiliarMensaje,modulo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(modulo_control) {
		if(modulo_funcion1.esPaginaForm(modulo_constante1)==true) {
			window.opener.modulo_webcontrol1.actualizarPaginaTablaDatos(modulo_control);
		} else {
			this.actualizarPaginaTablaDatos(modulo_control);
		}
	}
	
	actualizarPaginaAbrirLink(modulo_control) {
		modulo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(modulo_control.strAuxiliarUrlPagina);
				
		modulo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(modulo_control.strAuxiliarTipo,modulo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(modulo_control) {
		modulo_funcion1.resaltarRestaurarDivMensaje(true,modulo_control.strAuxiliarMensajeAlert,modulo_control.strAuxiliarCssMensaje);
			
		if(modulo_funcion1.esPaginaForm(modulo_constante1)==true) {
			window.opener.modulo_funcion1.resaltarRestaurarDivMensaje(true,modulo_control.strAuxiliarMensajeAlert,modulo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(modulo_control) {
		this.modulo_controlInicial=modulo_control;
			
		if(modulo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(modulo_control.strStyleDivArbol,modulo_control.strStyleDivContent
																,modulo_control.strStyleDivOpcionesBanner,modulo_control.strStyleDivExpandirColapsar
																,modulo_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=modulo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",modulo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(modulo_control) {
		this.actualizarCssBotonesPagina(modulo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(modulo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(modulo_control.tiposReportes,modulo_control.tiposReporte
															 	,modulo_control.tiposPaginacion,modulo_control.tiposAcciones
																,modulo_control.tiposColumnasSelect,modulo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(modulo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(modulo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(modulo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(modulo_control) {
	
		var indexPosition=modulo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=modulo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(modulo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.cargarCombossistemasFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.cargarCombospaquetesFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.cargarCombostipo_tecla_mascarasFK(modulo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(modulo_control.strRecargarFkTiposNinguno!=null && modulo_control.strRecargarFkTiposNinguno!='NINGUNO' && modulo_control.strRecargarFkTiposNinguno!='') {
			
				if(modulo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTiposNinguno,",")) { 
					modulo_webcontrol1.cargarCombossistemasFK(modulo_control);
				}

				if(modulo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTiposNinguno,",")) { 
					modulo_webcontrol1.cargarCombospaquetesFK(modulo_control);
				}

				if(modulo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTiposNinguno,",")) { 
					modulo_webcontrol1.cargarCombostipo_tecla_mascarasFK(modulo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_sistema") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+modulo_constante1.STR_SUFIJO+"-id_sistema" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.moduloActual.id_paquete!=null){
					if(jQuery("#form-id_paquete").val() != objetoController.moduloActual.id_paquete) {
						jQuery("#form-id_paquete").val(objetoController.moduloActual.id_paquete).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(modulo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,modulo_funcion1,modulo_control.sistemasFK);
	}

	cargarComboEditarTablapaqueteFK(modulo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,modulo_funcion1,modulo_control.paquetesFK);
	}

	cargarComboEditarTablatipo_tecla_mascaraFK(modulo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,modulo_funcion1,modulo_control.tipo_tecla_mascarasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(modulo_control) {
		jQuery("#divBusquedamoduloAjaxWebPart").css("display",modulo_control.strPermisoBusqueda);
		jQuery("#trmoduloCabeceraBusquedas").css("display",modulo_control.strPermisoBusqueda);
		jQuery("#trBusquedamodulo").css("display",modulo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(modulo_control.htmlTablaOrderBy!=null
			&& modulo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBymoduloAjaxWebPart").html(modulo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//modulo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(modulo_control.htmlTablaOrderByRel!=null
			&& modulo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelmoduloAjaxWebPart").html(modulo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(modulo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedamoduloAjaxWebPart").css("display","none");
			jQuery("#trmoduloCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedamodulo").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(modulo_control) {
		
		if(!modulo_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(modulo_control);
		} else {
			jQuery("#divTablaDatosmodulosAjaxWebPart").html(modulo_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosmodulos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(modulo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosmodulos=jQuery("#tblTablaDatosmodulos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("modulo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',modulo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			modulo_webcontrol1.registrarControlesTableEdition(modulo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		modulo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(modulo_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("modulo_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(modulo_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosmodulosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(modulo_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(modulo_control);
		
		const divOrderBy = document.getElementById("divOrderBymoduloAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(modulo_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelmoduloAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(modulo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(modulo_control.moduloActual!=null) {//form
			
			this.actualizarCamposFilaTabla(modulo_control);			
		}
	}
	
	actualizarCamposFilaTabla(modulo_control) {
		var i=0;
		
		i=modulo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(modulo_control.moduloActual.id);
		jQuery("#t-version_row_"+i+"").val(modulo_control.moduloActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(modulo_control.moduloActual.versionRow);
		
		if(modulo_control.moduloActual.id_sistema!=null && modulo_control.moduloActual.id_sistema>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != modulo_control.moduloActual.id_sistema) {
				jQuery("#t-cel_"+i+"_3").val(modulo_control.moduloActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(modulo_control.moduloActual.id_paquete!=null && modulo_control.moduloActual.id_paquete>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != modulo_control.moduloActual.id_paquete) {
				jQuery("#t-cel_"+i+"_4").val(modulo_control.moduloActual.id_paquete).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(modulo_control.moduloActual.codigo);
		jQuery("#t-cel_"+i+"_6").val(modulo_control.moduloActual.nombre);
		
		if(modulo_control.moduloActual.id_tipo_tecla_mascara!=null && modulo_control.moduloActual.id_tipo_tecla_mascara>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != modulo_control.moduloActual.id_tipo_tecla_mascara) {
				jQuery("#t-cel_"+i+"_7").val(modulo_control.moduloActual.id_tipo_tecla_mascara).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(modulo_control.moduloActual.tecla);
		jQuery("#t-cel_"+i+"_9").prop('checked',modulo_control.moduloActual.estado);
		jQuery("#t-cel_"+i+"_10").val(modulo_control.moduloActual.orden);
		jQuery("#t-cel_"+i+"_11").val(modulo_control.moduloActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(modulo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(modulo_control) {
		modulo_funcion1.registrarControlesTableValidacionEdition(modulo_control,modulo_webcontrol1,modulo_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(modulo_control) {
		jQuery("#divResumenmoduloActualAjaxWebPart").html(modulo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(modulo_control) {
		//jQuery("#divAccionesRelacionesmoduloAjaxWebPart").html(modulo_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("modulo_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(modulo_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesmoduloAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		modulo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(modulo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(modulo_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(modulo_control) {
		
		if(modulo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete").attr("style",modulo_control.strVisibleFK_Idpaquete);
			jQuery("#tblstrVisible"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete").attr("style",modulo_control.strVisibleFK_Idpaquete);
		}

		if(modulo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+modulo_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",modulo_control.strVisibleFK_Idsistema);
			jQuery("#tblstrVisible"+modulo_constante1.STR_SUFIJO+"FK_Idsistema").attr("style",modulo_control.strVisibleFK_Idsistema);
		}

		if(modulo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara").attr("style",modulo_control.strVisibleFK_Idtipo_tecla_mascara);
			jQuery("#tblstrVisible"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara").attr("style",modulo_control.strVisibleFK_Idtipo_tecla_mascara);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionmodulo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("modulo",id,"seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);		
	}
	
	

	abrirBusquedaParasistema(strNombreCampoBusqueda){//idActual
		modulo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("modulo","sistema","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}

	abrirBusquedaParapaquete(strNombreCampoBusqueda){//idActual
		modulo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("modulo","paquete","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}

	abrirBusquedaParatipo_tecla_mascara(strNombreCampoBusqueda){//idActual
		modulo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("modulo","tipo_tecla_mascara","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,moduloConstante,strParametros);
		
		//modulo_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(modulo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema",modulo_control.sistemasFK);

		if(modulo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+modulo_control.idFilaTablaActual+"_3",modulo_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",modulo_control.sistemasFK);

	};

	cargarCombospaquetesFK(modulo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete",modulo_control.paquetesFK);

		if(modulo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+modulo_control.idFilaTablaActual+"_4",modulo_control.paquetesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete",modulo_control.paquetesFK);

	};

	cargarCombostipo_tecla_mascarasFK(modulo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara",modulo_control.tipo_tecla_mascarasFK);

		if(modulo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+modulo_control.idFilaTablaActual+"_7",modulo_control.tipo_tecla_mascarasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara",modulo_control.tipo_tecla_mascarasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(modulo_control) {
		this.registrarComboActionChangeid_sistema("form"+modulo_constante1.STR_SUFIJO+"-id_sistema",false,0);


		this.registrarComboActionChangeid_sistema(""+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",false,0);


	};

	registrarComboActionChangeCombospaquetesFK(modulo_control) {

	};

	registrarComboActionChangeCombostipo_tecla_mascarasFK(modulo_control) {

	};

	
	
	setDefectoValorCombossistemasFK(modulo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(modulo_control.idsistemaDefaultFK>-1 && jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val() != modulo_control.idsistemaDefaultFK) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val(modulo_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(modulo_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaquetesFK(modulo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(modulo_control.idpaqueteDefaultFK>-1 && jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val() != modulo_control.idpaqueteDefaultFK) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val(modulo_control.idpaqueteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete").val(modulo_control.idpaqueteDefaultForeignKey).trigger("change");
			if(jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_tecla_mascarasFK(modulo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(modulo_control.idtipo_tecla_mascaraDefaultFK>-1 && jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val() != modulo_control.idtipo_tecla_mascaraDefaultFK) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val(modulo_control.idtipo_tecla_mascaraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara").val(modulo_control.idtipo_tecla_mascaraDefaultForeignKey).trigger("change");
			if(jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_sistema(id_sistema,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("modulo","seguridad","","id_sistema",id_sistema,"id_paquete","",paraEventoTabla,idFilaTabla,modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	



	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//modulo_control
		
	
	}
	
	onLoadCombosDefectoFK(modulo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(modulo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.setDefectoValorCombossistemasFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.setDefectoValorCombospaquetesFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.setDefectoValorCombostipo_tecla_mascarasFK(modulo_control);
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
	onLoadCombosEventosFK(modulo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(modulo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				modulo_webcontrol1.registrarComboActionChangeCombossistemasFK(modulo_control);
			//}

			//if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				modulo_webcontrol1.registrarComboActionChangeCombospaquetesFK(modulo_control);
			//}

			//if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				modulo_webcontrol1.registrarComboActionChangeCombostipo_tecla_mascarasFK(modulo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(modulo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(modulo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(modulo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(modulo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("modulo","FK_Idpaquete","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("modulo","FK_Idsistema","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("modulo","FK_Idtipo_tecla_mascara","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
		
			
			if(modulo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("modulo");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("modulo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(modulo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,"modulo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				modulo_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("paquete","id_paquete","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete_img_busqueda").click(function(){
				modulo_webcontrol1.abrirBusquedaParapaquete("id_paquete");
				//alert(jQuery('#form-id_paquete_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_tecla_mascara","id_tipo_tecla_mascara","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara_img_busqueda").click(function(){
				modulo_webcontrol1.abrirBusquedaParatipo_tecla_mascara("id_tipo_tecla_mascara");
				//alert(jQuery('#form-id_tipo_tecla_mascara_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(modulo_control) {
		
		jQuery("#divBusquedamoduloAjaxWebPart").css("display",modulo_control.strPermisoBusqueda);
		jQuery("#trmoduloCabeceraBusquedas").css("display",modulo_control.strPermisoBusqueda);
		jQuery("#trBusquedamodulo").css("display",modulo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportemodulo").css("display",modulo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosmodulo").attr("style",modulo_control.strPermisoMostrarTodos);		
		
		if(modulo_control.strPermisoNuevo!=null) {
			jQuery("#tdmoduloNuevo").css("display",modulo_control.strPermisoNuevo);
			jQuery("#tdmoduloNuevoToolBar").css("display",modulo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdmoduloDuplicar").css("display",modulo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmoduloDuplicarToolBar").css("display",modulo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdmoduloNuevoGuardarCambios").css("display",modulo_control.strPermisoNuevo);
			jQuery("#tdmoduloNuevoGuardarCambiosToolBar").css("display",modulo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(modulo_control.strPermisoActualizar!=null) {
			jQuery("#tdmoduloCopiar").css("display",modulo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmoduloCopiarToolBar").css("display",modulo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdmoduloConEditar").css("display",modulo_control.strPermisoActualizar);
		}
		
		jQuery("#tdmoduloGuardarCambios").css("display",modulo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdmoduloGuardarCambiosToolBar").css("display",modulo_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdmoduloCerrarPagina").css("display",modulo_control.strPermisoPopup);		
		jQuery("#tdmoduloCerrarPaginaToolBar").css("display",modulo_control.strPermisoPopup);
		//jQuery("#trmoduloAccionesRelaciones").css("display",modulo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=modulo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + modulo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + modulo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Modulos";
		sTituloBanner+=" - " + modulo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + modulo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdmoduloRelacionesToolBar").css("display",modulo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosmodulo").css("display",modulo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		modulo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		modulo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		modulo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		modulo_webcontrol1.registrarEventosControles();
		
		if(modulo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(modulo_constante1.STR_ES_RELACIONADO=="false") {
			modulo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(modulo_constante1.STR_ES_RELACIONES=="true") {
			if(modulo_constante1.BIT_ES_PAGINA_FORM==true) {
				modulo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(modulo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(modulo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				modulo_webcontrol1.onLoad();
			
			//} else {
				//if(modulo_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			modulo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);	
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

var modulo_webcontrol1 = new modulo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {modulo_webcontrol,modulo_webcontrol1};

//Para ser llamado desde window.opener
window.modulo_webcontrol1 = modulo_webcontrol1;


if(modulo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = modulo_webcontrol1.onLoadWindow; 
}

//</script>