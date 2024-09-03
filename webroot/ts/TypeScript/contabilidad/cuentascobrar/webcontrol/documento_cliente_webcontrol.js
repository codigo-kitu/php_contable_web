//<script type="text/javascript" language="javascript">



//var documento_clienteJQueryPaginaWebInteraccion= function (documento_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_cliente_constante,documento_cliente_constante1} from '../util/documento_cliente_constante.js';

import {documento_cliente_funcion,documento_cliente_funcion1} from '../util/documento_cliente_funcion.js';


class documento_cliente_webcontrol extends GeneralEntityWebControl {
	
	documento_cliente_control=null;
	documento_cliente_controlInicial=null;
	documento_cliente_controlAuxiliar=null;
		
	//if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_cliente_control) {
		super();
		
		this.documento_cliente_control=documento_cliente_control;
	}
		
	actualizarVariablesPagina(documento_cliente_control) {
		
		if(documento_cliente_control.action=="index" || documento_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_cliente_control);
			
		} 
		
		
		else if(documento_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_cliente_control);
			
		} else if(documento_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_cliente_control);
			
		} else if(documento_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cliente_control);		
		
		} else if(documento_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_cliente_control);
		
		}  else if(documento_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cliente_control);		
		
		} else if(documento_cliente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_cliente_control);		
		
		} else if(documento_cliente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_cliente_control);		
		
		} else if(documento_cliente_control.action.includes("Busqueda") ||
				  documento_cliente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(documento_cliente_control);
			
		} else if(documento_cliente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_cliente_control)
		}
		
		
		
	
		else if(documento_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_cliente_control);	
		
		} else if(documento_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cliente_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_cliente_control) {
		this.actualizarPaginaAccionesGenerales(documento_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cliente_control);
		this.actualizarPaginaOrderBy(documento_cliente_control);
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control);
		this.actualizarPaginaAreaBusquedas(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_cliente_control) {
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cliente_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cliente_control);
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control);
		this.actualizarPaginaAreaBusquedas(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_cliente_control) {
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cliente_control) {
		this.actualizarPaginaAbrirLink(documento_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);				
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		//this.actualizarPaginaFormulario(documento_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		//this.actualizarPaginaFormulario(documento_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_cliente_control) {
		//this.actualizarPaginaFormulario(documento_cliente_control);
		this.onLoadCombosDefectoFK(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		//this.actualizarPaginaFormulario(documento_cliente_control);
		this.onLoadCombosDefectoFK(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cliente_control) {
		this.actualizarPaginaAbrirLink(documento_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_cliente_control) {
		this.actualizarPaginaTablaDatos(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cliente_control) {
					//super.actualizarPaginaImprimir(documento_cliente_control,"documento_cliente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cliente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("documento_cliente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_cliente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cliente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cliente_control) {
		//super.actualizarPaginaImprimir(documento_cliente_control,"documento_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("documento_cliente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(documento_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_cliente_control) {
		//super.actualizarPaginaImprimir(documento_cliente_control,"documento_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("documento_cliente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cliente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_cliente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(documento_cliente_control);
			
		this.actualizarPaginaAbrirLink(documento_cliente_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_cliente_control) {
		
		if(documento_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_cliente_control);
		}
		
		if(documento_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_cliente_control) {
		if(documento_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_clienteReturnGeneral",JSON.stringify(documento_cliente_control.documento_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control) {
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_cliente_control, mostrar) {
		
		if(mostrar==true) {
			documento_cliente_funcion1.resaltarRestaurarDivsPagina(false,"documento_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_cliente");
			}			
			
			documento_cliente_funcion1.mostrarDivMensaje(true,documento_cliente_control.strAuxiliarMensaje,documento_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			documento_cliente_funcion1.mostrarDivMensaje(false,documento_cliente_control.strAuxiliarMensaje,documento_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_cliente_control) {
		if(documento_cliente_funcion1.esPaginaForm(documento_cliente_constante1)==true) {
			window.opener.documento_cliente_webcontrol1.actualizarPaginaTablaDatos(documento_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_cliente_control) {
		documento_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_cliente_control.strAuxiliarUrlPagina);
				
		documento_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_cliente_control.strAuxiliarTipo,documento_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_cliente_control) {
		documento_cliente_funcion1.resaltarRestaurarDivMensaje(true,documento_cliente_control.strAuxiliarMensajeAlert,documento_cliente_control.strAuxiliarCssMensaje);
			
		if(documento_cliente_funcion1.esPaginaForm(documento_cliente_constante1)==true) {
			window.opener.documento_cliente_funcion1.resaltarRestaurarDivMensaje(true,documento_cliente_control.strAuxiliarMensajeAlert,documento_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_cliente_control) {
		this.documento_cliente_controlInicial=documento_cliente_control;
			
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_cliente_control.strStyleDivArbol,documento_cliente_control.strStyleDivContent
																,documento_cliente_control.strStyleDivOpcionesBanner,documento_cliente_control.strStyleDivExpandirColapsar
																,documento_cliente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_cliente_control) {
		this.actualizarCssBotonesPagina(documento_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_cliente_control.tiposReportes,documento_cliente_control.tiposReporte
															 	,documento_cliente_control.tiposPaginacion,documento_cliente_control.tiposAcciones
																,documento_cliente_control.tiposColumnasSelect,documento_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_cliente_control) {
	
		var indexPosition=documento_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.cargarCombosdocumento_proveedorsFK(documento_cliente_control);
			}

			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.cargarCombosclientesFK(documento_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_cliente_control.strRecargarFkTiposNinguno!=null && documento_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTiposNinguno,",")) { 
					documento_cliente_webcontrol1.cargarCombosdocumento_proveedorsFK(documento_cliente_control);
				}

				if(documento_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTiposNinguno,",")) { 
					documento_cliente_webcontrol1.cargarCombosclientesFK(documento_cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladocumento_proveedorFK(documento_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cliente_funcion1,documento_cliente_control.documento_proveedorsFK);
	}

	cargarComboEditarTablaclienteFK(documento_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cliente_funcion1,documento_cliente_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(documento_cliente_control) {
		jQuery("#divBusquedadocumento_clienteAjaxWebPart").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trdocumento_clienteCabeceraBusquedas").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cliente").css("display",documento_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_cliente_control.htmlTablaOrderBy!=null
			&& documento_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_clienteAjaxWebPart").html(documento_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_cliente_control.htmlTablaOrderByRel!=null
			&& documento_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_clienteAjaxWebPart").html(documento_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_clienteAjaxWebPart").css("display","none");
			jQuery("#trdocumento_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_cliente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(documento_cliente_control) {
		
		if(!documento_cliente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(documento_cliente_control);
		} else {
			jQuery("#divTablaDatosdocumento_clientesAjaxWebPart").html(documento_cliente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_clientes=jQuery("#tblTablaDatosdocumento_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_cliente_webcontrol1.registrarControlesTableEdition(documento_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(documento_cliente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("documento_cliente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_cliente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdocumento_clientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(documento_cliente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(documento_cliente_control);
		
		const divOrderBy = document.getElementById("divOrderBydocumento_clienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(documento_cliente_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldocumento_clienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(documento_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_cliente_control.documento_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_cliente_control);			
		}
	}
	
	actualizarCamposFilaTabla(documento_cliente_control) {
		var i=0;
		
		i=documento_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_cliente_control.documento_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_cliente_control.documento_clienteActual.versionRow);
		
		if(documento_cliente_control.documento_clienteActual.id_documento_proveedor!=null && documento_cliente_control.documento_clienteActual.id_documento_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_cliente_control.documento_clienteActual.id_documento_proveedor) {
				jQuery("#t-cel_"+i+"_2").val(documento_cliente_control.documento_clienteActual.id_documento_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cliente_control.documento_clienteActual.id_cliente!=null && documento_cliente_control.documento_clienteActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != documento_cliente_control.documento_clienteActual.id_cliente) {
				jQuery("#t-cel_"+i+"_3").val(documento_cliente_control.documento_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(documento_cliente_control.documento_clienteActual.documento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(documento_cliente_control) {
		documento_cliente_funcion1.registrarControlesTableValidacionEdition(documento_cliente_control,documento_cliente_webcontrol1,documento_cliente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_cliente_control) {
		jQuery("#divResumendocumento_clienteActualAjaxWebPart").html(documento_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cliente_control) {
		//jQuery("#divAccionesRelacionesdocumento_clienteAjaxWebPart").html(documento_cliente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("documento_cliente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_cliente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdocumento_clienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		documento_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_cliente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_cliente_control) {
		
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",documento_cliente_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",documento_cliente_control.strVisibleFK_Idcliente);
		}

		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor").attr("style",documento_cliente_control.strVisibleFK_Iddocumento_proveedor);
			jQuery("#tblstrVisible"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor").attr("style",documento_cliente_control.strVisibleFK_Iddocumento_proveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_cliente",id,"cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);		
	}
	
	

	abrirBusquedaParadocumento_proveedor(strNombreCampoBusqueda){//idActual
		documento_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cliente","documento_proveedor","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		documento_cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cliente","cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_clienteConstante,strParametros);
		
		//documento_cliente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdocumento_proveedorsFK(documento_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor",documento_cliente_control.documento_proveedorsFK);

		if(documento_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cliente_control.idFilaTablaActual+"_2",documento_cliente_control.documento_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor",documento_cliente_control.documento_proveedorsFK);

	};

	cargarCombosclientesFK(documento_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente",documento_cliente_control.clientesFK);

		if(documento_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cliente_control.idFilaTablaActual+"_3",documento_cliente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",documento_cliente_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_proveedorsFK(documento_cliente_control) {

	};

	registrarComboActionChangeCombosclientesFK(documento_cliente_control) {

	};

	
	
	setDefectoValorCombosdocumento_proveedorsFK(documento_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cliente_control.iddocumento_proveedorDefaultFK>-1 && jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val() != documento_cliente_control.iddocumento_proveedorDefaultFK) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val(documento_cliente_control.iddocumento_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val(documento_cliente_control.iddocumento_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(documento_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cliente_control.idclienteDefaultFK>-1 && jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != documento_cliente_control.idclienteDefaultFK) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val(documento_cliente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(documento_cliente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.setDefectoValorCombosdocumento_proveedorsFK(documento_cliente_control);
			}

			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.setDefectoValorCombosclientesFK(documento_cliente_control);
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
	onLoadCombosEventosFK(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cliente_webcontrol1.registrarComboActionChangeCombosdocumento_proveedorsFK(documento_cliente_control);
			//}

			//if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cliente_webcontrol1.registrarComboActionChangeCombosclientesFK(documento_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cliente","FK_Idcliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cliente","FK_Iddocumento_proveedor","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
		
			
			if(documento_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_cliente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(documento_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,"documento_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_proveedor","id_documento_proveedor","cuentaspagar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor_img_busqueda").click(function(){
				documento_cliente_webcontrol1.abrirBusquedaParadocumento_proveedor("id_documento_proveedor");
				//alert(jQuery('#form-id_documento_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				documento_cliente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_cliente_control) {
		
		jQuery("#divBusquedadocumento_clienteAjaxWebPart").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trdocumento_clienteCabeceraBusquedas").css("display",documento_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cliente").css("display",documento_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_cliente").css("display",documento_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_cliente").attr("style",documento_cliente_control.strPermisoMostrarTodos);		
		
		if(documento_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_clienteNuevo").css("display",documento_cliente_control.strPermisoNuevo);
			jQuery("#tddocumento_clienteNuevoToolBar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_clienteDuplicar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_clienteDuplicarToolBar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_clienteNuevoGuardarCambios").css("display",documento_cliente_control.strPermisoNuevo);
			jQuery("#tddocumento_clienteNuevoGuardarCambiosToolBar").css("display",documento_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_clienteCopiar").css("display",documento_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_clienteCopiarToolBar").css("display",documento_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_clienteConEditar").css("display",documento_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_clienteGuardarCambios").css("display",documento_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_clienteGuardarCambiosToolBar").css("display",documento_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddocumento_clienteCerrarPagina").css("display",documento_cliente_control.strPermisoPopup);		
		jQuery("#tddocumento_clienteCerrarPaginaToolBar").css("display",documento_cliente_control.strPermisoPopup);
		//jQuery("#trdocumento_clienteAccionesRelaciones").css("display",documento_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documentos Clienteses";
		sTituloBanner+=" - " + documento_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_clienteRelacionesToolBar").css("display",documento_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_cliente").css("display",documento_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_cliente_webcontrol1.registrarEventosControles();
		
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			documento_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(documento_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_cliente_webcontrol1.onLoad();
			
			//} else {
				//if(documento_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			documento_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);	
	}
}

var documento_cliente_webcontrol1 = new documento_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_cliente_webcontrol,documento_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.documento_cliente_webcontrol1 = documento_cliente_webcontrol1;


if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_cliente_webcontrol1.onLoadWindow; 
}

//</script>