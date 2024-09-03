//<script type="text/javascript" language="javascript">



//var cuentaJQueryPaginaWebInteraccion= function (cuenta_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_constante,cuenta_constante1} from '../util/cuenta_constante.js';

import {cuenta_funcion,cuenta_funcion1} from '../util/cuenta_funcion.js';


class cuenta_webcontrol extends GeneralEntityWebControl {
	
	cuenta_control=null;
	cuenta_controlInicial=null;
	cuenta_controlAuxiliar=null;
		
	//if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_control) {
		super();
		
		this.cuenta_control=cuenta_control;
	}
		
	actualizarVariablesPagina(cuenta_control) {
		
		if(cuenta_control.action=="index" || cuenta_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_control);
			
		} 
		
		
		else if(cuenta_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_control);
		
		} else if(cuenta_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_control);
		
		} else if(cuenta_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_control);
		
		} else if(cuenta_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_control);
			
		} else if(cuenta_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_control);
			
		} else if(cuenta_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_control);
		
		} else if(cuenta_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_control);		
		
		} else if(cuenta_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_control);
		
		} else if(cuenta_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_control);
		
		} else if(cuenta_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_control);
		
		} else if(cuenta_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_control);
		
		}  else if(cuenta_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_control);
		
		} else if(cuenta_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_control);
		
		} else if(cuenta_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_control);
		
		} else if(cuenta_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_control);
		
		} else if(cuenta_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_control);		
		
		} else if(cuenta_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_control);		
		
		} else if(cuenta_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_control);		
		
		} else if(cuenta_control.action.includes("Busqueda") ||
				  cuenta_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cuenta_control);
			
		} else if(cuenta_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_control)
		}
		
		
		
	
		else if(cuenta_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_control);	
		
		} else if(cuenta_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_control);		
		}
	
		else if(cuenta_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_control);		
		}
	
		else if(cuenta_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_control);
		this.actualizarPaginaOrderBy(cuenta_control);
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_control);
		this.actualizarPaginaAreaBusquedas(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_control) {
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_control);
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_control);
		this.actualizarPaginaAreaBusquedas(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_control) {
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_control) {
		this.actualizarPaginaAbrirLink(cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);				
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		//this.actualizarPaginaFormulario(cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		//this.actualizarPaginaFormulario(cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_control) {
		//this.actualizarPaginaFormulario(cuenta_control);
		this.onLoadCombosDefectoFK(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		//this.actualizarPaginaFormulario(cuenta_control);
		this.onLoadCombosDefectoFK(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_control) {
		this.actualizarPaginaAbrirLink(cuenta_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_control) {
					//super.actualizarPaginaImprimir(cuenta_control,"cuenta");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cuenta_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_control) {
		//super.actualizarPaginaImprimir(cuenta_control,"cuenta");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cuenta_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cuenta_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_control) {
		//super.actualizarPaginaImprimir(cuenta_control,"cuenta");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cuenta_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cuenta_control);
			
		this.actualizarPaginaAbrirLink(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_control) {
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_control) {
		
		if(cuenta_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_control);
		}
		
		if(cuenta_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_control) {
		if(cuenta_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuentaReturnGeneral",JSON.stringify(cuenta_control.cuentaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_control) {
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_funcion1.resaltarRestaurarDivsPagina(false,"cuenta");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta");
			}			
			
			cuenta_funcion1.mostrarDivMensaje(true,cuenta_control.strAuxiliarMensaje,cuenta_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_funcion1.mostrarDivMensaje(false,cuenta_control.strAuxiliarMensaje,cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_control) {
		if(cuenta_funcion1.esPaginaForm(cuenta_constante1)==true) {
			window.opener.cuenta_webcontrol1.actualizarPaginaTablaDatos(cuenta_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_control) {
		cuenta_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_control.strAuxiliarUrlPagina);
				
		cuenta_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_control.strAuxiliarTipo,cuenta_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_control) {
		cuenta_funcion1.resaltarRestaurarDivMensaje(true,cuenta_control.strAuxiliarMensajeAlert,cuenta_control.strAuxiliarCssMensaje);
			
		if(cuenta_funcion1.esPaginaForm(cuenta_constante1)==true) {
			window.opener.cuenta_funcion1.resaltarRestaurarDivMensaje(true,cuenta_control.strAuxiliarMensajeAlert,cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_control) {
		this.cuenta_controlInicial=cuenta_control;
			
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_control.strStyleDivArbol,cuenta_control.strStyleDivContent
																,cuenta_control.strStyleDivOpcionesBanner,cuenta_control.strStyleDivExpandirColapsar
																,cuenta_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_control) {
		this.actualizarCssBotonesPagina(cuenta_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_control.tiposReportes,cuenta_control.tiposReporte
															 	,cuenta_control.tiposPaginacion,cuenta_control.tiposAcciones
																,cuenta_control.tiposColumnasSelect,cuenta_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_control.tiposRelaciones,cuenta_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_control) {
	
		var indexPosition=cuenta_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombosempresasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombostipo_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarComboscuentasFK(cuenta_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_control.strRecargarFkTiposNinguno!=null && cuenta_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombosempresasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombostipo_cuentasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarComboscuentasFK(cuenta_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.empresasFK);
	}

	cargarComboEditarTablatipo_cuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.tipo_cuentasFK);
	}

	cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.tipo_nivel_cuentasFK);
	}

	cargarComboEditarTablacuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cuenta_control) {
		jQuery("#divBusquedacuentaAjaxWebPart").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trcuentaCabeceraBusquedas").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta").css("display",cuenta_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_control.htmlTablaOrderBy!=null
			&& cuenta_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuentaAjaxWebPart").html(cuenta_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_control.htmlTablaOrderByRel!=null
			&& cuenta_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuentaAjaxWebPart").html(cuenta_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuentaAjaxWebPart").css("display","none");
			jQuery("#trcuentaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cuenta_control) {
		
		if(!cuenta_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cuenta_control);
		} else {
			jQuery("#divTablaDatoscuentasAjaxWebPart").html(cuenta_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuentas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuentas=jQuery("#tblTablaDatoscuentas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_webcontrol1.registrarControlesTableEdition(cuenta_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cuenta_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cuenta_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscuentasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cuenta_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cuenta_control);
		
		const divOrderBy = document.getElementById("divOrderBycuentaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cuenta_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcuentaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cuenta_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_control.cuentaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_control);			
		}
	}
	
	actualizarCamposFilaTabla(cuenta_control) {
		var i=0;
		
		i=cuenta_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_control.cuentaActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_control.cuentaActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(cuenta_control.cuentaActual.versionRow);
		
		if(cuenta_control.cuentaActual.id_empresa!=null && cuenta_control.cuentaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_control.cuentaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_control.cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_cuenta!=null && cuenta_control.cuentaActual.id_tipo_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_control.cuentaActual.id_tipo_cuenta) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_control.cuentaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_nivel_cuenta!=null && cuenta_control.cuentaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_control.cuentaActual.id_tipo_nivel_cuenta) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_control.cuentaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_cuenta!=null && cuenta_control.cuentaActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cuenta_control.cuentaActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_6").val(cuenta_control.cuentaActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_6").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(cuenta_control.cuentaActual.codigo);
		jQuery("#t-cel_"+i+"_8").val(cuenta_control.cuentaActual.nombre);
		jQuery("#t-cel_"+i+"_9").val(cuenta_control.cuentaActual.nivel_cuenta);
		jQuery("#t-cel_"+i+"_10").prop('checked',cuenta_control.cuentaActual.usa_monto_base);
		jQuery("#t-cel_"+i+"_11").val(cuenta_control.cuentaActual.monto_base);
		jQuery("#t-cel_"+i+"_12").val(cuenta_control.cuentaActual.porcentaje_base);
		jQuery("#t-cel_"+i+"_13").prop('checked',cuenta_control.cuentaActual.con_centro_costos);
		jQuery("#t-cel_"+i+"_14").prop('checked',cuenta_control.cuentaActual.con_ruc);
		jQuery("#t-cel_"+i+"_15").val(cuenta_control.cuentaActual.balance);
		jQuery("#t-cel_"+i+"_16").val(cuenta_control.cuentaActual.descripcion);
		jQuery("#t-cel_"+i+"_17").prop('checked',cuenta_control.cuentaActual.con_retencion);
		jQuery("#t-cel_"+i+"_18").val(cuenta_control.cuentaActual.valor_retencion);
		jQuery("#t-cel_"+i+"_19").val(cuenta_control.cuentaActual.ultima_transaccion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncategoria_cheque").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncategoria_cheque", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacategoria_cheques(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionotro_impuesto_ventas").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionotro_impuesto_ventas", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventasParaotro_impuestos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimpuesto_ventas").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionimpuesto_ventas", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventasParaimpuestos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_corriente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_venta").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionproducto_venta", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventaParaproductos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioninstrumento_pago_ventas").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioninstrumento_pago_ventas", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventasParainstrumento_pagos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto_venta").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionlista_producto_venta", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventaParalista_productoes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_detalle").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionasiento_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretencion_compras").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionretencion_compras", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_comprasPararetenciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretencion_fuente_compras").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionretencion_fuente_compras", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_comprasPararetencion_fuentees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncuenta", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuentaes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionforma_pago_cliente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionforma_pago_cliente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_clientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionsaldo_cuenta").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionsaldo_cuenta", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParasaldo_cuentas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciontermino_pago_proveedor").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelaciontermino_pago_proveedor", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretencion_ica_ventas").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionretencion_ica_ventas", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesion_ventasPararetencion_icas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido_detalle").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionasiento_predefinido_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico_detalle").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionasiento_automatico_detalle", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionforma_pago_proveedor").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelacionforma_pago_proveedor", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_proveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciontermino_pago_cliente").click(function(){
		jQuery("#tblTablaDatoscuentas").on("click",".imgrelaciontermino_pago_cliente", function () {

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		});				
	}
		
	

	registrarSesionParacategoria_cheques(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","categoria_cheque","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}

	registrarSesion_ventasParaotro_impuestos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","otro_impuesto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","_ventas");
	}

	registrarSesion_ventasParaimpuestos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","impuesto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","_ventas");
	}

	registrarSesionParacuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","cuenta_corriente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}

	registrarSesion_ventaParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","producto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","_venta");
	}

	registrarSesion_ventasParainstrumento_pagos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","instrumento_pago","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","_ventas");
	}

	registrarSesion_ventaParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","lista_producto","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","_venta");
	}

	registrarSesionParaasiento_detallees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","asiento_detalle","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","");
	}

	registrarSesion_comprasPararetenciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","retencion","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","_compras");
	}

	registrarSesion_comprasPararetencion_fuentees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","retencion_fuente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","_compras");
	}

	registrarSesionParacuentaes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","proveedor","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","");
	}

	registrarSesionParaforma_pago_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","forma_pago_cliente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}

	registrarSesionParasaldo_cuentas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","saldo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}

	registrarSesionParatermino_pago_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","termino_pago_proveedor","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","");
	}

	registrarSesion_ventasPararetencion_icas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","retencion_ica","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","_ventas");
	}

	registrarSesionParaasiento_predefinido_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","asiento_predefinido_detalle","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","cliente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}

	registrarSesionParaasiento_automatico_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","asiento_automatico_detalle","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}

	registrarSesionParaforma_pago_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","forma_pago_proveedor","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"es","");
	}

	registrarSesionParatermino_pago_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta","termino_pago_cliente","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1,"s","");
	}
	
	registrarControlesTableEdition(cuenta_control) {
		cuenta_funcion1.registrarControlesTableValidacionEdition(cuenta_control,cuenta_webcontrol1,cuenta_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_control) {
		jQuery("#divResumencuentaActualAjaxWebPart").html(cuenta_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_control) {
		//jQuery("#divAccionesRelacionescuentaAjaxWebPart").html(cuenta_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cuenta_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescuentaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cuenta_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_control) {
		
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_control.strVisibleFK_Idcuenta);
		}

		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_control.strVisibleFK_Idempresa);
		}

		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_cuenta);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_cuenta);
		}

		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_nivel_cuenta);
			jQuery("#tblstrVisible"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_control.strVisibleFK_Idtipo_nivel_cuenta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta",id,"contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","empresa","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}

	abrirBusquedaParatipo_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","tipo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}

	abrirBusquedaParatipo_nivel_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","tipo_nivel_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		cuenta_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta","cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncategoria_cheque").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacategoria_cheques(idActual);
		});
		jQuery("#imgdivrelacionotro_impuesto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaotro_impuestos(idActual);
		});
		jQuery("#imgdivrelacionimpuesto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaimpuestos(idActual);
		});
		jQuery("#imgdivrelacioncuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuenta_corrientes(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaproductos(idActual);
		});
		jQuery("#imgdivrelacioninstrumento_pago").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParainstrumento_pagos(idActual);
		});
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		jQuery("#imgdivrelacionasiento_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		});
		jQuery("#imgdivrelacionretencion").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionPararetenciones(idActual);
		});
		jQuery("#imgdivrelacionretencion_fuente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionPararetencion_fuentees(idActual);
		});
		jQuery("#imgdivrelacioncuenta").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParacuentaes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacionforma_pago_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_clientes(idActual);
		});
		jQuery("#imgdivrelacionsaldo_cuenta").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParasaldo_cuentas(idActual);
		});
		jQuery("#imgdivrelaciontermino_pago_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		});
		jQuery("#imgdivrelacionretencion_ica").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionPararetencion_icas(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionasiento_automatico_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});
		jQuery("#imgdivrelacionforma_pago_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParaforma_pago_proveedores(idActual);
		});
		jQuery("#imgdivrelaciontermino_pago_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta");

			cuenta_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuentaConstante,strParametros);
		
		//cuenta_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa",cuenta_control.empresasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_3",cuenta_control.empresasFK);
		}
	};

	cargarCombostipo_cuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta",cuenta_control.tipo_cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_4",cuenta_control.tipo_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta",cuenta_control.tipo_cuentasFK);

	};

	cargarCombostipo_nivel_cuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta",cuenta_control.tipo_nivel_cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_5",cuenta_control.tipo_nivel_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta",cuenta_control.tipo_nivel_cuentasFK);

	};

	cargarComboscuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta",cuenta_control.cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_6",cuenta_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cuenta_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_control) {

	};

	registrarComboActionChangeCombostipo_cuentasFK(cuenta_control) {

	};

	registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_control) {

	};

	registrarComboActionChangeComboscuentasFK(cuenta_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idtipo_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_control.idtipo_cuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_control.idtipo_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(cuenta_control.idtipo_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_nivel_cuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idtipo_nivel_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_control.idtipo_nivel_cuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_control.idtipo_nivel_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(cuenta_control.idtipo_nivel_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idcuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_control.idcuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cuenta_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombosempresasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombostipo_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombostipo_nivel_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorComboscuentasFK(cuenta_control);
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
	onLoadCombosEventosFK(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombostipo_cuentasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeComboscuentasFK(cuenta_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idcuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idempresa","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idtipo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta","FK_Idtipo_nivel_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
		
			
			if(cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta");		
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_funcion1,cuenta_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_funcion1,cuenta_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"cuenta");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta","id_tipo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParatipo_cuenta("id_tipo_cuenta");
				//alert(jQuery('#form-id_tipo_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_nivel_cuenta","id_tipo_nivel_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParatipo_nivel_cuenta("id_tipo_nivel_cuenta");
				//alert(jQuery('#form-id_tipo_nivel_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_control) {
		
		jQuery("#divBusquedacuentaAjaxWebPart").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trcuentaCabeceraBusquedas").css("display",cuenta_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta").css("display",cuenta_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta").css("display",cuenta_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta").attr("style",cuenta_control.strPermisoMostrarTodos);		
		
		if(cuenta_control.strPermisoNuevo!=null) {
			jQuery("#tdcuentaNuevo").css("display",cuenta_control.strPermisoNuevo);
			jQuery("#tdcuentaNuevoToolBar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuentaDuplicar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuentaDuplicarToolBar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuentaNuevoGuardarCambios").css("display",cuenta_control.strPermisoNuevo);
			jQuery("#tdcuentaNuevoGuardarCambiosToolBar").css("display",cuenta_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_control.strPermisoActualizar!=null) {
			jQuery("#tdcuentaCopiar").css("display",cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuentaCopiarToolBar").css("display",cuenta_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuentaConEditar").css("display",cuenta_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuentaGuardarCambios").css("display",cuenta_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuentaGuardarCambiosToolBar").css("display",cuenta_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcuentaCerrarPagina").css("display",cuenta_control.strPermisoPopup);		
		jQuery("#tdcuentaCerrarPaginaToolBar").css("display",cuenta_control.strPermisoPopup);
		//jQuery("#trcuentaAccionesRelaciones").css("display",cuenta_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuentases";
		sTituloBanner+=" - " + cuenta_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuentaRelacionesToolBar").css("display",cuenta_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta").css("display",cuenta_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_webcontrol1.registrarEventosControles();
		
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_webcontrol1.onLoad();
			
			//} else {
				//if(cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cuenta_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);	
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

var cuenta_webcontrol1 = new cuenta_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_webcontrol,cuenta_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_webcontrol1 = cuenta_webcontrol1;


if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_webcontrol1.onLoadWindow; 
}

//</script>