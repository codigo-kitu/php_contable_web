//<script type="text/javascript" language="javascript">



//var clienteJQueryPaginaWebInteraccion= function (cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cliente_constante,cliente_constante1} from '../util/cliente_constante.js';

import {cliente_funcion,cliente_funcion1} from '../util/cliente_funcion.js';


class cliente_webcontrol extends GeneralEntityWebControl {
	
	cliente_control=null;
	cliente_controlInicial=null;
	cliente_controlAuxiliar=null;
		
	//if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cliente_control) {
		super();
		
		this.cliente_control=cliente_control;
	}
		
	actualizarVariablesPagina(cliente_control) {
		
		if(cliente_control.action=="index" || cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cliente_control);
			
		} 
		
		
		else if(cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cliente_control);
		
		} else if(cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cliente_control);
		
		} else if(cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cliente_control);
		
		} else if(cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cliente_control);
			
		} else if(cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cliente_control);
			
		} else if(cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cliente_control);
		
		} else if(cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cliente_control);		
		
		} else if(cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cliente_control);
		
		} else if(cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cliente_control);
		
		} else if(cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cliente_control);
		
		} else if(cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cliente_control);
		
		}  else if(cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cliente_control);
		
		} else if(cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cliente_control);
		
		} else if(cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cliente_control);
		
		} else if(cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cliente_control);
		
		} else if(cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cliente_control);
		
		} else if(cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cliente_control);
		
		} else if(cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cliente_control);
		
		} else if(cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cliente_control);
		
		} else if(cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cliente_control);		
		
		} else if(cliente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cliente_control);		
		
		} else if(cliente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cliente_control);		
		
		} else if(cliente_control.action.includes("Busqueda") ||
				  cliente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cliente_control);
			
		} else if(cliente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cliente_control)
		}
		
		
		
	
		else if(cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cliente_control);	
		
		} else if(cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cliente_control);		
		}
	
		else if(cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cliente_control);		
		}
	
		else if(cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cliente_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cliente_control) {
		this.actualizarPaginaAccionesGenerales(cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cliente_control) {
		
		this.actualizarPaginaCargaGeneral(cliente_control);
		this.actualizarPaginaOrderBy(cliente_control);
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cliente_control);
		this.actualizarPaginaAreaBusquedas(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cliente_control) {
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cliente_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cliente_control) {
		
		this.actualizarPaginaCargaGeneral(cliente_control);
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaCargaGeneralControles(cliente_control);
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cliente_control);
		this.actualizarPaginaAreaBusquedas(cliente_control);
		this.actualizarPaginaCargaCombosFK(cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cliente_control) {
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cliente_control) {
		this.actualizarPaginaAbrirLink(cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);				
		//this.actualizarPaginaFormulario(cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		//this.actualizarPaginaFormulario(cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		//this.actualizarPaginaFormulario(cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cliente_control) {
		//this.actualizarPaginaFormulario(cliente_control);
		this.onLoadCombosDefectoFK(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		//this.actualizarPaginaFormulario(cliente_control);
		this.onLoadCombosDefectoFK(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cliente_control) {
		this.actualizarPaginaAbrirLink(cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cliente_control) {
					//super.actualizarPaginaImprimir(cliente_control,"cliente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cliente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cliente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cliente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cliente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cliente_control) {
		//super.actualizarPaginaImprimir(cliente_control,"cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cliente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cliente_control) {
		//super.actualizarPaginaImprimir(cliente_control,"cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cliente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cliente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cliente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cliente_control);
			
		this.actualizarPaginaAbrirLink(cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cliente_control) {
		this.actualizarPaginaTablaDatos(cliente_control);
		this.actualizarPaginaFormulario(cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cliente_control);		
		this.actualizarPaginaAreaMantenimiento(cliente_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cliente_control) {
		
		if(cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cliente_control);
		}
		
		if(cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cliente_control) {
		if(cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("clienteReturnGeneral",JSON.stringify(cliente_control.clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cliente_control) {
		if(cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cliente_control, mostrar) {
		
		if(mostrar==true) {
			cliente_funcion1.resaltarRestaurarDivsPagina(false,"cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"cliente");
			}			
			
			cliente_funcion1.mostrarDivMensaje(true,cliente_control.strAuxiliarMensaje,cliente_control.strAuxiliarCssMensaje);
		
		} else {
			cliente_funcion1.mostrarDivMensaje(false,cliente_control.strAuxiliarMensaje,cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cliente_control) {
		if(cliente_funcion1.esPaginaForm(cliente_constante1)==true) {
			window.opener.cliente_webcontrol1.actualizarPaginaTablaDatos(cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cliente_control) {
		cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cliente_control.strAuxiliarUrlPagina);
				
		cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cliente_control.strAuxiliarTipo,cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cliente_control) {
		cliente_funcion1.resaltarRestaurarDivMensaje(true,cliente_control.strAuxiliarMensajeAlert,cliente_control.strAuxiliarCssMensaje);
			
		if(cliente_funcion1.esPaginaForm(cliente_constante1)==true) {
			window.opener.cliente_funcion1.resaltarRestaurarDivMensaje(true,cliente_control.strAuxiliarMensajeAlert,cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cliente_control) {
		this.cliente_controlInicial=cliente_control;
			
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cliente_control.strStyleDivArbol,cliente_control.strStyleDivContent
																,cliente_control.strStyleDivOpcionesBanner,cliente_control.strStyleDivExpandirColapsar
																,cliente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cliente_control) {
		this.actualizarCssBotonesPagina(cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cliente_control.tiposReportes,cliente_control.tiposReporte
															 	,cliente_control.tiposPaginacion,cliente_control.tiposAcciones
																,cliente_control.tiposColumnasSelect,cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cliente_control.tiposRelaciones,cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cliente_control) {
	
		var indexPosition=cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosempresasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostipo_personasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarComboscategoria_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostipo_preciosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosgiro_negocio_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombospaissFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosprovinciasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosciudadsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosvendedorsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombostermino_pago_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarComboscuentasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosimpuestosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosretencionsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosretencion_fuentesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosretencion_icasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.cargarCombosotro_impuestosFK(cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cliente_control.strRecargarFkTiposNinguno!=null && cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosempresasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostipo_personasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarComboscategoria_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostipo_preciosFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosgiro_negocio_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombospaissFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosprovinciasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosciudadsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosvendedorsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombostermino_pago_clientesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarComboscuentasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosimpuestosFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosretencionsFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosretencion_fuentesFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosretencion_icasFK(cliente_control);
				}

				if(cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTiposNinguno,",")) { 
					cliente_webcontrol1.cargarCombosotro_impuestosFK(cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.empresasFK);
	}

	cargarComboEditarTablatipo_personaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.tipo_personasFK);
	}

	cargarComboEditarTablacategoria_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.categoria_clientesFK);
	}

	cargarComboEditarTablatipo_precioFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.tipo_preciosFK);
	}

	cargarComboEditarTablagiro_negocio_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.giro_negocio_clientesFK);
	}

	cargarComboEditarTablapaisFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.ciudadsFK);
	}

	cargarComboEditarTablavendedorFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablacuentaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.cuentasFK);
	}

	cargarComboEditarTablaimpuestoFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.impuestosFK);
	}

	cargarComboEditarTablaretencionFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.retencionsFK);
	}

	cargarComboEditarTablaretencion_fuenteFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.retencion_fuentesFK);
	}

	cargarComboEditarTablaretencion_icaFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.retencion_icasFK);
	}

	cargarComboEditarTablaotro_impuestoFK(cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cliente_funcion1,cliente_control.otro_impuestosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cliente_control) {
		jQuery("#divBusquedaclienteAjaxWebPart").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trclienteCabeceraBusquedas").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacliente").css("display",cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cliente_control.htmlTablaOrderBy!=null
			&& cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByclienteAjaxWebPart").html(cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cliente_control.htmlTablaOrderByRel!=null
			&& cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelclienteAjaxWebPart").html(cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaclienteAjaxWebPart").css("display","none");
			jQuery("#trclienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacliente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cliente_control) {
		
		if(!cliente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cliente_control);
		} else {
			jQuery("#divTablaDatosclientesAjaxWebPart").html(cliente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosclientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosclientes=jQuery("#tblTablaDatosclientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cliente_webcontrol1.registrarControlesTableEdition(cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cliente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cliente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cliente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosclientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cliente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cliente_control);
		
		const divOrderBy = document.getElementById("divOrderByclienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cliente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelclienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cliente_control.clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cliente_control);			
		}
	}
	
	actualizarCamposFilaTabla(cliente_control) {
		var i=0;
		
		i=cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cliente_control.clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(cliente_control.clienteActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(cliente_control.clienteActual.versionRow);
		
		if(cliente_control.clienteActual.id_empresa!=null && cliente_control.clienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cliente_control.clienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(cliente_control.clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_tipo_persona!=null && cliente_control.clienteActual.id_tipo_persona>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cliente_control.clienteActual.id_tipo_persona) {
				jQuery("#t-cel_"+i+"_4").val(cliente_control.clienteActual.id_tipo_persona).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_categoria_cliente!=null && cliente_control.clienteActual.id_categoria_cliente>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cliente_control.clienteActual.id_categoria_cliente) {
				jQuery("#t-cel_"+i+"_5").val(cliente_control.clienteActual.id_categoria_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_tipo_precio!=null && cliente_control.clienteActual.id_tipo_precio>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cliente_control.clienteActual.id_tipo_precio) {
				jQuery("#t-cel_"+i+"_6").val(cliente_control.clienteActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_giro_negocio_cliente!=null && cliente_control.clienteActual.id_giro_negocio_cliente>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cliente_control.clienteActual.id_giro_negocio_cliente) {
				jQuery("#t-cel_"+i+"_7").val(cliente_control.clienteActual.id_giro_negocio_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(cliente_control.clienteActual.codigo);
		jQuery("#t-cel_"+i+"_9").val(cliente_control.clienteActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(cliente_control.clienteActual.primer_apellido);
		jQuery("#t-cel_"+i+"_11").val(cliente_control.clienteActual.segundo_apellido);
		jQuery("#t-cel_"+i+"_12").val(cliente_control.clienteActual.primer_nombre);
		jQuery("#t-cel_"+i+"_13").val(cliente_control.clienteActual.segundo_nombre);
		jQuery("#t-cel_"+i+"_14").val(cliente_control.clienteActual.nombre_completo);
		jQuery("#t-cel_"+i+"_15").val(cliente_control.clienteActual.direccion);
		jQuery("#t-cel_"+i+"_16").val(cliente_control.clienteActual.telefono);
		jQuery("#t-cel_"+i+"_17").val(cliente_control.clienteActual.telefono_movil);
		jQuery("#t-cel_"+i+"_18").val(cliente_control.clienteActual.e_mail);
		jQuery("#t-cel_"+i+"_19").val(cliente_control.clienteActual.e_mail2);
		jQuery("#t-cel_"+i+"_20").val(cliente_control.clienteActual.comentario);
		jQuery("#t-cel_"+i+"_21").val(cliente_control.clienteActual.imagen);
		jQuery("#t-cel_"+i+"_22").prop('checked',cliente_control.clienteActual.activo);
		
		if(cliente_control.clienteActual.id_pais!=null && cliente_control.clienteActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_23").val() != cliente_control.clienteActual.id_pais) {
				jQuery("#t-cel_"+i+"_23").val(cliente_control.clienteActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_23").select2("val", null);
			if(jQuery("#t-cel_"+i+"_23").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_23").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_provincia!=null && cliente_control.clienteActual.id_provincia>-1){
			if(jQuery("#t-cel_"+i+"_24").val() != cliente_control.clienteActual.id_provincia) {
				jQuery("#t-cel_"+i+"_24").val(cliente_control.clienteActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_24").select2("val", null);
			if(jQuery("#t-cel_"+i+"_24").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_24").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_ciudad!=null && cliente_control.clienteActual.id_ciudad>-1){
			if(jQuery("#t-cel_"+i+"_25").val() != cliente_control.clienteActual.id_ciudad) {
				jQuery("#t-cel_"+i+"_25").val(cliente_control.clienteActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_25").select2("val", null);
			if(jQuery("#t-cel_"+i+"_25").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_25").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_26").val(cliente_control.clienteActual.codigo_postal);
		jQuery("#t-cel_"+i+"_27").val(cliente_control.clienteActual.fax);
		jQuery("#t-cel_"+i+"_28").val(cliente_control.clienteActual.contacto);
		
		if(cliente_control.clienteActual.id_vendedor!=null && cliente_control.clienteActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_29").val() != cliente_control.clienteActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_29").val(cliente_control.clienteActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_29").select2("val", null);
			if(jQuery("#t-cel_"+i+"_29").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_29").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_30").val(cliente_control.clienteActual.maximo_credito);
		jQuery("#t-cel_"+i+"_31").val(cliente_control.clienteActual.maximo_descuento);
		jQuery("#t-cel_"+i+"_32").val(cliente_control.clienteActual.interes_anual);
		jQuery("#t-cel_"+i+"_33").val(cliente_control.clienteActual.balance);
		
		if(cliente_control.clienteActual.id_termino_pago_cliente!=null && cliente_control.clienteActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_34").val() != cliente_control.clienteActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_34").val(cliente_control.clienteActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_34").select2("val", null);
			if(jQuery("#t-cel_"+i+"_34").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_34").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cliente_control.clienteActual.id_cuenta!=null && cliente_control.clienteActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_35").val() != cliente_control.clienteActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_35").val(cliente_control.clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_35").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_35").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_36").val(cliente_control.clienteActual.facturar_con);
		jQuery("#t-cel_"+i+"_37").prop('checked',cliente_control.clienteActual.aplica_impuesto_ventas);
		
		if(cliente_control.clienteActual.id_impuesto!=null && cliente_control.clienteActual.id_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_38").val() != cliente_control.clienteActual.id_impuesto) {
				jQuery("#t-cel_"+i+"_38").val(cliente_control.clienteActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_38").select2("val", null);
			if(jQuery("#t-cel_"+i+"_38").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_38").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_39").prop('checked',cliente_control.clienteActual.aplica_retencion_impuesto);
		
		if(cliente_control.clienteActual.id_retencion!=null && cliente_control.clienteActual.id_retencion>-1){
			if(jQuery("#t-cel_"+i+"_40").val() != cliente_control.clienteActual.id_retencion) {
				jQuery("#t-cel_"+i+"_40").val(cliente_control.clienteActual.id_retencion).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_40").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_40").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_41").prop('checked',cliente_control.clienteActual.aplica_retencion_fuente);
		
		if(cliente_control.clienteActual.id_retencion_fuente!=null && cliente_control.clienteActual.id_retencion_fuente>-1){
			if(jQuery("#t-cel_"+i+"_42").val() != cliente_control.clienteActual.id_retencion_fuente) {
				jQuery("#t-cel_"+i+"_42").val(cliente_control.clienteActual.id_retencion_fuente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_42").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_42").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_43").prop('checked',cliente_control.clienteActual.aplica_retencion_ica);
		
		if(cliente_control.clienteActual.id_retencion_ica!=null && cliente_control.clienteActual.id_retencion_ica>-1){
			if(jQuery("#t-cel_"+i+"_44").val() != cliente_control.clienteActual.id_retencion_ica) {
				jQuery("#t-cel_"+i+"_44").val(cliente_control.clienteActual.id_retencion_ica).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_44").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_44").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_45").prop('checked',cliente_control.clienteActual.aplica_2do_impuesto);
		
		if(cliente_control.clienteActual.id_otro_impuesto!=null && cliente_control.clienteActual.id_otro_impuesto>-1){
			if(jQuery("#t-cel_"+i+"_46").val() != cliente_control.clienteActual.id_otro_impuesto) {
				jQuery("#t-cel_"+i+"_46").val(cliente_control.clienteActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_46").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_46").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_47").val(cliente_control.clienteActual.creado);
		jQuery("#t-cel_"+i+"_48").val(cliente_control.clienteActual.monto_ultima_transaccion);
		jQuery("#t-cel_"+i+"_49").val(cliente_control.clienteActual.fecha_ultima_transaccion);
		jQuery("#t-cel_"+i+"_50").val(cliente_control.clienteActual.descripcion_ultima_transaccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelaciondevolucion_factura", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_cobrar").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacioncuenta_cobrar", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_cliente").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelaciondocumento_cliente", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionestimado", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaestimados(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_cliente").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionimagen_cliente", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaimagen_clientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionfactura", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParafacturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacion").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionconsignacion", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_cliente").click(function(){
		jQuery("#tblTablaDatosclientes").on("click",".imgrelacionlista_cliente", function () {

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParalista_clientes(idActual);
		});				
	}
		
	

	registrarSesionParadevolucion_facturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","devolucion_factura","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"s","");
	}

	registrarSesionParacuenta_cobrars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","cuenta_cobrar","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"s","");
	}

	registrarSesionParadocumento_clientees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","documento_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"es","");
	}

	registrarSesionParaestimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","estimado","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"s","");
	}

	registrarSesionParaimagen_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","imagen_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"s","");
	}

	registrarSesionParafacturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","factura","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"s","");
	}

	registrarSesionParaconsignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","consignacion","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"es","");
	}

	registrarSesionParalista_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cliente","lista_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1,"s","");
	}
	
	registrarControlesTableEdition(cliente_control) {
		cliente_funcion1.registrarControlesTableValidacionEdition(cliente_control,cliente_webcontrol1,cliente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cliente_control) {
		jQuery("#divResumenclienteActualAjaxWebPart").html(cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cliente_control) {
		//jQuery("#divAccionesRelacionesclienteAjaxWebPart").html(cliente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cliente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cliente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesclienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cliente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cliente_control) {
		
		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente").attr("style",cliente_control.strVisibleFK_Idcategoria_cliente);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente").attr("style",cliente_control.strVisibleFK_Idcategoria_cliente);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",cliente_control.strVisibleFK_Idciudad);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idciudad").attr("style",cliente_control.strVisibleFK_Idciudad);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cliente_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cliente_control.strVisibleFK_Idcuenta);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cliente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cliente_control.strVisibleFK_Idempresa);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio").attr("style",cliente_control.strVisibleFK_Idgiro_negocio);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio").attr("style",cliente_control.strVisibleFK_Idgiro_negocio);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",cliente_control.strVisibleFK_Idimpuesto);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto").attr("style",cliente_control.strVisibleFK_Idimpuesto);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",cliente_control.strVisibleFK_Idotro_impuesto);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto").attr("style",cliente_control.strVisibleFK_Idotro_impuesto);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idpais").attr("style",cliente_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idpais").attr("style",cliente_control.strVisibleFK_Idpais);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",cliente_control.strVisibleFK_Idprovincia);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia").attr("style",cliente_control.strVisibleFK_Idprovincia);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",cliente_control.strVisibleFK_Idretencion);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idretencion").attr("style",cliente_control.strVisibleFK_Idretencion);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente").attr("style",cliente_control.strVisibleFK_Idretencion_fuente);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente").attr("style",cliente_control.strVisibleFK_Idretencion_fuente);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica").attr("style",cliente_control.strVisibleFK_Idretencion_ica);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica").attr("style",cliente_control.strVisibleFK_Idretencion_ica);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",cliente_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",cliente_control.strVisibleFK_Idtermino_pago);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona").attr("style",cliente_control.strVisibleFK_Idtipo_persona);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona").attr("style",cliente_control.strVisibleFK_Idtipo_persona);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",cliente_control.strVisibleFK_Idtipo_precio);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio").attr("style",cliente_control.strVisibleFK_Idtipo_precio);
		}

		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",cliente_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",cliente_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cliente",id,"cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","empresa","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParatipo_persona(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","tipo_persona","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParacategoria_cliente(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","categoria_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParatipo_precio(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","tipo_precio","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParagiro_negocio_cliente(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","giro_negocio_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","pais","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParaprovincia(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","provincia","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParaciudad(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","ciudad","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","vendedor","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","termino_pago_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","cuenta","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParaimpuesto(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","impuesto","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaPararetencion(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","retencion","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaPararetencion_fuente(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","retencion_fuente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaPararetencion_ica(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","retencion_ica","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}

	abrirBusquedaParaotro_impuesto(strNombreCampoBusqueda){//idActual
		cliente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cliente","otro_impuesto","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondevolucion_factura").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});
		jQuery("#imgdivrelacioncuenta_cobrar").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		});
		jQuery("#imgdivrelaciondocumento_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});
		jQuery("#imgdivrelacionestimado").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaestimados(idActual);
		});
		jQuery("#imgdivrelacionimagen_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaimagen_clientes(idActual);
		});
		jQuery("#imgdivrelacionfactura").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParafacturas(idActual);
		});
		jQuery("#imgdivrelacionconsignacion").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		});
		jQuery("#imgdivrelacionlista_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcliente");

			cliente_webcontrol1.registrarSesionParalista_clientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,clienteConstante,strParametros);
		
		//cliente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa",cliente_control.empresasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_3",cliente_control.empresasFK);
		}
	};

	cargarCombostipo_personasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona",cliente_control.tipo_personasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_4",cliente_control.tipo_personasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona",cliente_control.tipo_personasFK);

	};

	cargarComboscategoria_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente",cliente_control.categoria_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_5",cliente_control.categoria_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente",cliente_control.categoria_clientesFK);

	};

	cargarCombostipo_preciosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio",cliente_control.tipo_preciosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_6",cliente_control.tipo_preciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio",cliente_control.tipo_preciosFK);

	};

	cargarCombosgiro_negocio_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente",cliente_control.giro_negocio_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_7",cliente_control.giro_negocio_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente",cliente_control.giro_negocio_clientesFK);

	};

	cargarCombospaissFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_pais",cliente_control.paissFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_23",cliente_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",cliente_control.paissFK);

	};

	cargarCombosprovinciasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia",cliente_control.provinciasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_24",cliente_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",cliente_control.provinciasFK);

	};

	cargarCombosciudadsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad",cliente_control.ciudadsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_25",cliente_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",cliente_control.ciudadsFK);

	};

	cargarCombosvendedorsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor",cliente_control.vendedorsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_29",cliente_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",cliente_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente",cliente_control.termino_pago_clientesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_34",cliente_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",cliente_control.termino_pago_clientesFK);

	};

	cargarComboscuentasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta",cliente_control.cuentasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_35",cliente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cliente_control.cuentasFK);

	};

	cargarCombosimpuestosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto",cliente_control.impuestosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_38",cliente_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",cliente_control.impuestosFK);

	};

	cargarCombosretencionsFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion",cliente_control.retencionsFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_40",cliente_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",cliente_control.retencionsFK);

	};

	cargarCombosretencion_fuentesFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente",cliente_control.retencion_fuentesFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_42",cliente_control.retencion_fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente",cliente_control.retencion_fuentesFK);

	};

	cargarCombosretencion_icasFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica",cliente_control.retencion_icasFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_44",cliente_control.retencion_icasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica",cliente_control.retencion_icasFK);

	};

	cargarCombosotro_impuestosFK(cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto",cliente_control.otro_impuestosFK);

		if(cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cliente_control.idFilaTablaActual+"_46",cliente_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",cliente_control.otro_impuestosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cliente_control) {

	};

	registrarComboActionChangeCombostipo_personasFK(cliente_control) {

	};

	registrarComboActionChangeComboscategoria_clientesFK(cliente_control) {

	};

	registrarComboActionChangeCombostipo_preciosFK(cliente_control) {

	};

	registrarComboActionChangeCombosgiro_negocio_clientesFK(cliente_control) {

	};

	registrarComboActionChangeCombospaissFK(cliente_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(cliente_control) {

	};

	registrarComboActionChangeCombosciudadsFK(cliente_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(cliente_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(cliente_control) {

	};

	registrarComboActionChangeComboscuentasFK(cliente_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(cliente_control) {

	};

	registrarComboActionChangeCombosretencionsFK(cliente_control) {

	};

	registrarComboActionChangeCombosretencion_fuentesFK(cliente_control) {

	};

	registrarComboActionChangeCombosretencion_icasFK(cliente_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(cliente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idempresaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val() != cliente_control.idempresaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa").val(cliente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_personasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtipo_personaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val() != cliente_control.idtipo_personaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona").val(cliente_control.idtipo_personaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(cliente_control.idtipo_personaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idcategoria_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val() != cliente_control.idcategoria_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente").val(cliente_control.idcategoria_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val(cliente_control.idcategoria_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcategoria_cliente-cmbid_categoria_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_preciosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtipo_precioDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val() != cliente_control.idtipo_precioDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio").val(cliente_control.idtipo_precioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(cliente_control.idtipo_precioDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgiro_negocio_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idgiro_negocio_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val() != cliente_control.idgiro_negocio_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente").val(cliente_control.idgiro_negocio_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val(cliente_control.idgiro_negocio_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idgiro_negocio-cmbid_giro_negocio_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idpaisDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val() != cliente_control.idpaisDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais").val(cliente_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(cliente_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idprovinciaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val() != cliente_control.idprovinciaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia").val(cliente_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(cliente_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idciudadDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val() != cliente_control.idciudadDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad").val(cliente_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(cliente_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idvendedorDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val() != cliente_control.idvendedorDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor").val(cliente_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(cliente_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cliente_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cliente_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(cliente_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idcuentaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != cliente_control.idcuentaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta").val(cliente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cliente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idimpuestoDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val() != cliente_control.idimpuestoDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto").val(cliente_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(cliente_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idretencionDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val() != cliente_control.idretencionDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion").val(cliente_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(cliente_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_fuentesFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idretencion_fuenteDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val() != cliente_control.idretencion_fuenteDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente").val(cliente_control.idretencion_fuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(cliente_control.idretencion_fuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_icasFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idretencion_icaDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val() != cliente_control.idretencion_icaDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica").val(cliente_control.idretencion_icaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(cliente_control.idretencion_icaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cliente_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != cliente_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto").val(cliente_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(cliente_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cliente_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosempresasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostipo_personasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorComboscategoria_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostipo_preciosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosgiro_negocio_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombospaissFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosprovinciasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosciudadsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosvendedorsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorComboscuentasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosimpuestosFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosretencionsFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosretencion_fuentesFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosretencion_icasFK(cliente_control);
			}

			if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTipos,",")) { 
				cliente_webcontrol1.setDefectoValorCombosotro_impuestosFK(cliente_control);
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
	onLoadCombosEventosFK(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosempresasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostipo_personasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeComboscategoria_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostipo_preciosFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosgiro_negocio_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombospaissFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosprovinciasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosciudadsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosvendedorsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeComboscuentasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosimpuestosFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosretencionsFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosretencion_fuentesFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosretencion_icasFK(cliente_control);
			//}

			//if(cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cliente_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idcategoria_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idciudad","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idcuenta","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idempresa","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idgiro_negocio","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idimpuesto","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idotro_impuesto","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idpais","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idprovincia","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idretencion","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idretencion_fuente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idretencion_ica","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idtermino_pago","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idtipo_persona","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idtipo_precio","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cliente","FK_Idvendedor","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
		
			
			if(cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cliente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cliente_funcion1,cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cliente_funcion1,cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,"cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_persona","id_tipo_persona","general","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_persona_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatipo_persona("id_tipo_persona");
				//alert(jQuery('#form-id_tipo_persona_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cliente","id_categoria_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_categoria_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParacategoria_cliente("id_categoria_cliente");
				//alert(jQuery('#form-id_categoria_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_precio","id_tipo_precio","inventario","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_tipo_precio_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatipo_precio("id_tipo_precio");
				//alert(jQuery('#form-id_tipo_precio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("giro_negocio_cliente","id_giro_negocio_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_giro_negocio_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente("id_giro_negocio_cliente");
				//alert(jQuery('#form-id_giro_negocio_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_fuente","id_retencion_fuente","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_fuente_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaPararetencion_fuente("id_retencion_fuente");
				//alert(jQuery('#form-id_retencion_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_ica","id_retencion_ica","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_retencion_ica_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaPararetencion_ica("id_retencion_ica");
				//alert(jQuery('#form-id_retencion_ica_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cliente_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				cliente_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cliente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cliente_control) {
		
		jQuery("#divBusquedaclienteAjaxWebPart").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trclienteCabeceraBusquedas").css("display",cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacliente").css("display",cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecliente").css("display",cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscliente").attr("style",cliente_control.strPermisoMostrarTodos);		
		
		if(cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdclienteNuevo").css("display",cliente_control.strPermisoNuevo);
			jQuery("#tdclienteNuevoToolBar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdclienteDuplicar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclienteDuplicarToolBar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdclienteNuevoGuardarCambios").css("display",cliente_control.strPermisoNuevo);
			jQuery("#tdclienteNuevoGuardarCambiosToolBar").css("display",cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdclienteCopiar").css("display",cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclienteCopiarToolBar").css("display",cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdclienteConEditar").css("display",cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdclienteGuardarCambios").css("display",cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdclienteGuardarCambiosToolBar").css("display",cliente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdclienteCerrarPagina").css("display",cliente_control.strPermisoPopup);		
		jQuery("#tdclienteCerrarPaginaToolBar").css("display",cliente_control.strPermisoPopup);
		//jQuery("#trclienteAccionesRelaciones").css("display",cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Clientes";
		sTituloBanner+=" - " + cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdclienteRelacionesToolBar").css("display",cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscliente").css("display",cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cliente_webcontrol1.registrarEventosControles();
		
		if(cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cliente_constante1.STR_ES_RELACIONADO=="false") {
			cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cliente_constante1.STR_ES_RELACIONES=="true") {
			if(cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cliente_webcontrol1.onLoad();
			
			//} else {
				//if(cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cliente","cuentascobrar","",cliente_funcion1,cliente_webcontrol1,cliente_constante1);	
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

var cliente_webcontrol1 = new cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cliente_webcontrol,cliente_webcontrol1};

//Para ser llamado desde window.opener
window.cliente_webcontrol1 = cliente_webcontrol1;


if(cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cliente_webcontrol1.onLoadWindow; 
}

//</script>