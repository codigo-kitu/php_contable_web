//<script type="text/javascript" language="javascript">



//var vendedorJQueryPaginaWebInteraccion= function (vendedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {vendedor_constante,vendedor_constante1} from '../util/vendedor_constante.js';

import {vendedor_funcion,vendedor_funcion1} from '../util/vendedor_funcion.js';


class vendedor_webcontrol extends GeneralEntityWebControl {
	
	vendedor_control=null;
	vendedor_controlInicial=null;
	vendedor_controlAuxiliar=null;
		
	//if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(vendedor_control) {
		super();
		
		this.vendedor_control=vendedor_control;
	}
		
	actualizarVariablesPagina(vendedor_control) {
		
		if(vendedor_control.action=="index" || vendedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(vendedor_control);
			
		} 
		
		
		else if(vendedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(vendedor_control);
		
		} else if(vendedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(vendedor_control);
		
		} else if(vendedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(vendedor_control);
		
		} else if(vendedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(vendedor_control);
			
		} else if(vendedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(vendedor_control);
			
		} else if(vendedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(vendedor_control);
		
		} else if(vendedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(vendedor_control);		
		
		} else if(vendedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(vendedor_control);
		
		} else if(vendedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(vendedor_control);
		
		} else if(vendedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(vendedor_control);
		
		} else if(vendedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(vendedor_control);
		
		}  else if(vendedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(vendedor_control);
		
		} else if(vendedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(vendedor_control);
		
		} else if(vendedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(vendedor_control);
		
		} else if(vendedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(vendedor_control);
		
		} else if(vendedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(vendedor_control);
		
		} else if(vendedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(vendedor_control);
		
		} else if(vendedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(vendedor_control);		
		
		} else if(vendedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(vendedor_control);		
		
		} else if(vendedor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(vendedor_control);		
		
		} else if(vendedor_control.action.includes("Busqueda") ||
				  vendedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(vendedor_control);
			
		} else if(vendedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(vendedor_control)
		}
		
		
		
	
		else if(vendedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(vendedor_control);	
		
		} else if(vendedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(vendedor_control);		
		}
	
		else if(vendedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(vendedor_control);		
		}
	
		else if(vendedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(vendedor_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + vendedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(vendedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(vendedor_control) {
		this.actualizarPaginaAccionesGenerales(vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(vendedor_control) {
		
		this.actualizarPaginaCargaGeneral(vendedor_control);
		this.actualizarPaginaOrderBy(vendedor_control);
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(vendedor_control);
		this.actualizarPaginaAreaBusquedas(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(vendedor_control) {
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(vendedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(vendedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(vendedor_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(vendedor_control) {
		
		this.actualizarPaginaCargaGeneral(vendedor_control);
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaCargaGeneralControles(vendedor_control);
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(vendedor_control);
		this.actualizarPaginaAreaBusquedas(vendedor_control);
		this.actualizarPaginaCargaCombosFK(vendedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(vendedor_control) {
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(vendedor_control) {
		this.actualizarPaginaAbrirLink(vendedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);				
		//this.actualizarPaginaFormulario(vendedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		//this.actualizarPaginaFormulario(vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		//this.actualizarPaginaFormulario(vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(vendedor_control) {
		//this.actualizarPaginaFormulario(vendedor_control);
		this.onLoadCombosDefectoFK(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		//this.actualizarPaginaFormulario(vendedor_control);
		this.onLoadCombosDefectoFK(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		//this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(vendedor_control) {
		this.actualizarPaginaAbrirLink(vendedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(vendedor_control) {
					//super.actualizarPaginaImprimir(vendedor_control,"vendedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",vendedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("vendedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(vendedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(vendedor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(vendedor_control) {
		//super.actualizarPaginaImprimir(vendedor_control,"vendedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("vendedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(vendedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",vendedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(vendedor_control) {
		//super.actualizarPaginaImprimir(vendedor_control,"vendedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("vendedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(vendedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",vendedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(vendedor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(vendedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(vendedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(vendedor_control);
			
		this.actualizarPaginaAbrirLink(vendedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(vendedor_control) {
		this.actualizarPaginaTablaDatos(vendedor_control);
		this.actualizarPaginaFormulario(vendedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(vendedor_control);		
		this.actualizarPaginaAreaMantenimiento(vendedor_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(vendedor_control) {
		
		if(vendedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(vendedor_control);
		}
		
		if(vendedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(vendedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(vendedor_control) {
		if(vendedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("vendedorReturnGeneral",JSON.stringify(vendedor_control.vendedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(vendedor_control) {
		if(vendedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && vendedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(vendedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(vendedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(vendedor_control, mostrar) {
		
		if(mostrar==true) {
			vendedor_funcion1.resaltarRestaurarDivsPagina(false,"vendedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				vendedor_funcion1.resaltarRestaurarDivMantenimiento(false,"vendedor");
			}			
			
			vendedor_funcion1.mostrarDivMensaje(true,vendedor_control.strAuxiliarMensaje,vendedor_control.strAuxiliarCssMensaje);
		
		} else {
			vendedor_funcion1.mostrarDivMensaje(false,vendedor_control.strAuxiliarMensaje,vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(vendedor_control) {
		if(vendedor_funcion1.esPaginaForm(vendedor_constante1)==true) {
			window.opener.vendedor_webcontrol1.actualizarPaginaTablaDatos(vendedor_control);
		} else {
			this.actualizarPaginaTablaDatos(vendedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(vendedor_control) {
		vendedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(vendedor_control.strAuxiliarUrlPagina);
				
		vendedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(vendedor_control.strAuxiliarTipo,vendedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(vendedor_control) {
		vendedor_funcion1.resaltarRestaurarDivMensaje(true,vendedor_control.strAuxiliarMensajeAlert,vendedor_control.strAuxiliarCssMensaje);
			
		if(vendedor_funcion1.esPaginaForm(vendedor_constante1)==true) {
			window.opener.vendedor_funcion1.resaltarRestaurarDivMensaje(true,vendedor_control.strAuxiliarMensajeAlert,vendedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(vendedor_control) {
		this.vendedor_controlInicial=vendedor_control;
			
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(vendedor_control.strStyleDivArbol,vendedor_control.strStyleDivContent
																,vendedor_control.strStyleDivOpcionesBanner,vendedor_control.strStyleDivExpandirColapsar
																,vendedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=vendedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",vendedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(vendedor_control) {
		this.actualizarCssBotonesPagina(vendedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(vendedor_control.tiposReportes,vendedor_control.tiposReporte
															 	,vendedor_control.tiposPaginacion,vendedor_control.tiposAcciones
																,vendedor_control.tiposColumnasSelect,vendedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(vendedor_control.tiposRelaciones,vendedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(vendedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(vendedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(vendedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(vendedor_control) {
	
		var indexPosition=vendedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=vendedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(vendedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 
				vendedor_webcontrol1.cargarCombosempresasFK(vendedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(vendedor_control.strRecargarFkTiposNinguno!=null && vendedor_control.strRecargarFkTiposNinguno!='NINGUNO' && vendedor_control.strRecargarFkTiposNinguno!='') {
			
				if(vendedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTiposNinguno,",")) { 
					vendedor_webcontrol1.cargarCombosempresasFK(vendedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(vendedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,vendedor_funcion1,vendedor_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(vendedor_control) {
		jQuery("#divBusquedavendedorAjaxWebPart").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trvendedorCabeceraBusquedas").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trBusquedavendedor").css("display",vendedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(vendedor_control.htmlTablaOrderBy!=null
			&& vendedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByvendedorAjaxWebPart").html(vendedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//vendedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(vendedor_control.htmlTablaOrderByRel!=null
			&& vendedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelvendedorAjaxWebPart").html(vendedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(vendedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedavendedorAjaxWebPart").css("display","none");
			jQuery("#trvendedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedavendedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(vendedor_control) {
		
		if(!vendedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(vendedor_control);
		} else {
			jQuery("#divTablaDatosvendedorsAjaxWebPart").html(vendedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosvendedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosvendedors=jQuery("#tblTablaDatosvendedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("vendedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',vendedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			vendedor_webcontrol1.registrarControlesTableEdition(vendedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		vendedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(vendedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("vendedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(vendedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosvendedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(vendedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(vendedor_control);
		
		const divOrderBy = document.getElementById("divOrderByvendedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(vendedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelvendedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(vendedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(vendedor_control.vendedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(vendedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(vendedor_control) {
		var i=0;
		
		i=vendedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(vendedor_control.vendedorActual.id);
		jQuery("#t-version_row_"+i+"").val(vendedor_control.vendedorActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(vendedor_control.vendedorActual.versionRow);
		
		if(vendedor_control.vendedorActual.id_empresa!=null && vendedor_control.vendedorActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != vendedor_control.vendedorActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(vendedor_control.vendedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(vendedor_control.vendedorActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(vendedor_control.vendedorActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(vendedor_control.vendedorActual.direccion1);
		jQuery("#t-cel_"+i+"_7").val(vendedor_control.vendedorActual.direccion2);
		jQuery("#t-cel_"+i+"_8").val(vendedor_control.vendedorActual.comision);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(vendedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_lote").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionfactura_lote", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelaciondevolucion_factura", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionestimado", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaestimados(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelaciondevolucion", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionfactura", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafacturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacioncotizacion", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacion").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionconsignacion", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosvendedors").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","cliente","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"s","");
	}

	registrarSesionParafactura_lotees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","factura_lote","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"es","");
	}

	registrarSesionParadevolucion_facturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","devolucion_factura","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"s","");
	}

	registrarSesionParaestimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","estimado","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"s","");
	}

	registrarSesionParadevoluciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","devolucion","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"es","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","orden_compra","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"s","");
	}

	registrarSesionParafacturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","factura","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"s","");
	}

	registrarSesionParacotizaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","cotizacion","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"es","");
	}

	registrarSesionParaconsignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","consignacion","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"es","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"vendedor","proveedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1,"es","");
	}
	
	registrarControlesTableEdition(vendedor_control) {
		vendedor_funcion1.registrarControlesTableValidacionEdition(vendedor_control,vendedor_webcontrol1,vendedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(vendedor_control) {
		jQuery("#divResumenvendedorActualAjaxWebPart").html(vendedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(vendedor_control) {
		//jQuery("#divAccionesRelacionesvendedorAjaxWebPart").html(vendedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("vendedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(vendedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesvendedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		vendedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(vendedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(vendedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(vendedor_control) {
		
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+vendedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",vendedor_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+vendedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",vendedor_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionvendedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("vendedor",id,"facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		vendedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("vendedor","empresa","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionfactura_lote").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});
		jQuery("#imgdivrelaciondevolucion_factura").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});
		jQuery("#imgdivrelacionestimado").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaestimados(idActual);
		});
		jQuery("#imgdivrelaciondevolucion").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelacionfactura").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParafacturas(idActual);
		});
		jQuery("#imgdivrelacioncotizacion").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});
		jQuery("#imgdivrelacionconsignacion").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualvendedor");

			vendedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedorConstante,strParametros);
		
		//vendedor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(vendedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa",vendedor_control.empresasFK);

		if(vendedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+vendedor_control.idFilaTablaActual+"_3",vendedor_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(vendedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(vendedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(vendedor_control.idempresaDefaultFK>-1 && jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val() != vendedor_control.idempresaDefaultFK) {
				jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa").val(vendedor_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//vendedor_control
		
	
	}
	
	onLoadCombosDefectoFK(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 
				vendedor_webcontrol1.setDefectoValorCombosempresasFK(vendedor_control);
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
	onLoadCombosEventosFK(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(vendedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",vendedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				vendedor_webcontrol1.registrarComboActionChangeCombosempresasFK(vendedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(vendedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(vendedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(vendedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("vendedor","FK_Idempresa","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
		
			
			if(vendedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("vendedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("vendedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(vendedor_funcion1,vendedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(vendedor_funcion1,vendedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(vendedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,"vendedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+vendedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				vendedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("vendedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(vendedor_control) {
		
		jQuery("#divBusquedavendedorAjaxWebPart").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trvendedorCabeceraBusquedas").css("display",vendedor_control.strPermisoBusqueda);
		jQuery("#trBusquedavendedor").css("display",vendedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportevendedor").css("display",vendedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosvendedor").attr("style",vendedor_control.strPermisoMostrarTodos);		
		
		if(vendedor_control.strPermisoNuevo!=null) {
			jQuery("#tdvendedorNuevo").css("display",vendedor_control.strPermisoNuevo);
			jQuery("#tdvendedorNuevoToolBar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdvendedorDuplicar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdvendedorDuplicarToolBar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdvendedorNuevoGuardarCambios").css("display",vendedor_control.strPermisoNuevo);
			jQuery("#tdvendedorNuevoGuardarCambiosToolBar").css("display",vendedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(vendedor_control.strPermisoActualizar!=null) {
			jQuery("#tdvendedorCopiar").css("display",vendedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdvendedorCopiarToolBar").css("display",vendedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdvendedorConEditar").css("display",vendedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdvendedorGuardarCambios").css("display",vendedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdvendedorGuardarCambiosToolBar").css("display",vendedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdvendedorCerrarPagina").css("display",vendedor_control.strPermisoPopup);		
		jQuery("#tdvendedorCerrarPaginaToolBar").css("display",vendedor_control.strPermisoPopup);
		//jQuery("#trvendedorAccionesRelaciones").css("display",vendedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=vendedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + vendedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + vendedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Vendedores";
		sTituloBanner+=" - " + vendedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + vendedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdvendedorRelacionesToolBar").css("display",vendedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosvendedor").css("display",vendedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		vendedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		vendedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		vendedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		vendedor_webcontrol1.registrarEventosControles();
		
		if(vendedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
			vendedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(vendedor_constante1.STR_ES_RELACIONES=="true") {
			if(vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				vendedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(vendedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(vendedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				vendedor_webcontrol1.onLoad();
			
			//} else {
				//if(vendedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			vendedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("vendedor","facturacion","",vendedor_funcion1,vendedor_webcontrol1,vendedor_constante1);	
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

var vendedor_webcontrol1 = new vendedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {vendedor_webcontrol,vendedor_webcontrol1};

//Para ser llamado desde window.opener
window.vendedor_webcontrol1 = vendedor_webcontrol1;


if(vendedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = vendedor_webcontrol1.onLoadWindow; 
}

//</script>