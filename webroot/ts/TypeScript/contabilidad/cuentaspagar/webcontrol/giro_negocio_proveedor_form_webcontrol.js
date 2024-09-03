//<script type="text/javascript" language="javascript">



//var giro_negocio_proveedorJQueryPaginaWebInteraccion= function (giro_negocio_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {giro_negocio_proveedor_constante,giro_negocio_proveedor_constante1} from '../util/giro_negocio_proveedor_constante.js';

import {giro_negocio_proveedor_funcion,giro_negocio_proveedor_funcion1} from '../util/giro_negocio_proveedor_form_funcion.js';


class giro_negocio_proveedor_webcontrol extends GeneralEntityWebControl {
	
	giro_negocio_proveedor_control=null;
	giro_negocio_proveedor_controlInicial=null;
	giro_negocio_proveedor_controlAuxiliar=null;
		
	//if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(giro_negocio_proveedor_control) {
		super();
		
		this.giro_negocio_proveedor_control=giro_negocio_proveedor_control;
	}
		
	actualizarVariablesPagina(giro_negocio_proveedor_control) {
		
		if(giro_negocio_proveedor_control.action=="index" || giro_negocio_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(giro_negocio_proveedor_control);
			
		} 
		
		
		
	
		else if(giro_negocio_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(giro_negocio_proveedor_control);	
		
		} else if(giro_negocio_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_proveedor_control);		
		}
	
		else if(giro_negocio_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control);		
		}
	
		else if(giro_negocio_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_proveedor_control);
		}
		
		
		else if(giro_negocio_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(giro_negocio_proveedor_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + giro_negocio_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(giro_negocio_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(giro_negocio_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(giro_negocio_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(giro_negocio_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(giro_negocio_proveedor_control);
		this.actualizarPaginaOrderBy(giro_negocio_proveedor_control);
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(giro_negocio_proveedor_control) {
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(giro_negocio_proveedor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(giro_negocio_proveedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.onLoadCombosDefectoFK(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(giro_negocio_proveedor_control) {
		//FORMULARIO
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(giro_negocio_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(giro_negocio_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		
		//COMBOS FK
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(giro_negocio_proveedor_control) {
		//FORMULARIO
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);	
		//COMBOS FK
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(giro_negocio_proveedor_control) {
		
		if(giro_negocio_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(giro_negocio_proveedor_control);
		}
		
		if(giro_negocio_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(giro_negocio_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("giro_negocio_proveedorReturnGeneral",JSON.stringify(giro_negocio_proveedor_control.giro_negocio_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && giro_negocio_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			giro_negocio_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"giro_negocio_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				giro_negocio_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"giro_negocio_proveedor");
			}			
			
			giro_negocio_proveedor_funcion1.mostrarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensaje,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			giro_negocio_proveedor_funcion1.mostrarDivMensaje(false,giro_negocio_proveedor_control.strAuxiliarMensaje,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_funcion1.esPaginaForm(giro_negocio_proveedor_constante1)==true) {
			window.opener.giro_negocio_proveedor_webcontrol1.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(giro_negocio_proveedor_control.strAuxiliarUrlPagina);
				
		giro_negocio_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(giro_negocio_proveedor_control.strAuxiliarTipo,giro_negocio_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensajeAlert,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
			
		if(giro_negocio_proveedor_funcion1.esPaginaForm(giro_negocio_proveedor_constante1)==true) {
			window.opener.giro_negocio_proveedor_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensajeAlert,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(giro_negocio_proveedor_control) {
		this.giro_negocio_proveedor_controlInicial=giro_negocio_proveedor_control;
			
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(giro_negocio_proveedor_control.strStyleDivArbol,giro_negocio_proveedor_control.strStyleDivContent
																,giro_negocio_proveedor_control.strStyleDivOpcionesBanner,giro_negocio_proveedor_control.strStyleDivExpandirColapsar
																,giro_negocio_proveedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control) {
		this.actualizarCssBotonesPagina(giro_negocio_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(giro_negocio_proveedor_control.tiposReportes,giro_negocio_proveedor_control.tiposReporte
															 	,giro_negocio_proveedor_control.tiposPaginacion,giro_negocio_proveedor_control.tiposAcciones
																,giro_negocio_proveedor_control.tiposColumnasSelect,giro_negocio_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(giro_negocio_proveedor_control.tiposRelaciones,giro_negocio_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(giro_negocio_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(giro_negocio_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(giro_negocio_proveedor_control) {
	
		var indexPosition=giro_negocio_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=giro_negocio_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(giro_negocio_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(giro_negocio_proveedor_control.strRecargarFkTiposNinguno!=null && giro_negocio_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && giro_negocio_proveedor_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control) {
		jQuery("#tdgiro_negocio_proveedorNuevo").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
		jQuery("#trgiro_negocio_proveedorElementos").css("display",giro_negocio_proveedor_control.strVisibleTablaElementos);
		jQuery("#trgiro_negocio_proveedorAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trgiro_negocio_proveedorParametrosAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(giro_negocio_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(giro_negocio_proveedor_control);
				
		if(giro_negocio_proveedor_control.giro_negocio_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(giro_negocio_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(giro_negocio_proveedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(giro_negocio_proveedor_control) {
	
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-id").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.id);
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-version_row").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.versionRow);
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-nombre").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.nombre);
		jQuery("#form"+giro_negocio_proveedor_constante1.STR_SUFIJO+"-predeterminado").prop('checked',giro_negocio_proveedor_control.giro_negocio_proveedorActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+giro_negocio_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("giro_negocio_proveedor","cuentaspagar","","form_giro_negocio_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
	}
	
	actualizarSpanMensajesCampos(giro_negocio_proveedor_control) {
		jQuery("#spanstrMensajeid").text(giro_negocio_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(giro_negocio_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre").text(giro_negocio_proveedor_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(giro_negocio_proveedor_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(giro_negocio_proveedor_control) {
		jQuery("#tdbtnNuevogiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevogiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizargiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminargiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosgiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosgiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBargiro_negocio_proveedor").css("visibility",giro_negocio_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//giro_negocio_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				giro_negocio_proveedor_funcion1.validarFormularioJQuery(giro_negocio_proveedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("giro_negocio_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("giro_negocio_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,"giro_negocio_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("giro_negocio_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(giro_negocio_proveedor_control) {
		
		
		
		if(giro_negocio_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdgiro_negocio_proveedorActualizarToolBar").css("display",giro_negocio_proveedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdgiro_negocio_proveedorEliminarToolBar").css("display",giro_negocio_proveedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trgiro_negocio_proveedorElementos").css("display",giro_negocio_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trgiro_negocio_proveedorAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trgiro_negocio_proveedorParametrosAcciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAcciones);
		
		jQuery("#tdgiro_negocio_proveedorCerrarPagina").css("display",giro_negocio_proveedor_control.strPermisoPopup);		
		jQuery("#tdgiro_negocio_proveedorCerrarPaginaToolBar").css("display",giro_negocio_proveedor_control.strPermisoPopup);
		//jQuery("#trgiro_negocio_proveedorAccionesRelaciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=giro_negocio_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + giro_negocio_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + giro_negocio_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Giro Negocios Proveedores";
		sTituloBanner+=" - " + giro_negocio_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + giro_negocio_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdgiro_negocio_proveedorRelacionesToolBar").css("display",giro_negocio_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosgiro_negocio_proveedor").css("display",giro_negocio_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		giro_negocio_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		giro_negocio_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		giro_negocio_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		giro_negocio_proveedor_webcontrol1.registrarEventosControles();
		
		if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			giro_negocio_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				giro_negocio_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(giro_negocio_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(giro_negocio_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
						//giro_negocio_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(giro_negocio_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(giro_negocio_proveedor_constante1.BIG_ID_ACTUAL,"giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
						//giro_negocio_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			giro_negocio_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);	
	}
}

var giro_negocio_proveedor_webcontrol1 = new giro_negocio_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {giro_negocio_proveedor_webcontrol,giro_negocio_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.giro_negocio_proveedor_webcontrol1 = giro_negocio_proveedor_webcontrol1;


if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = giro_negocio_proveedor_webcontrol1.onLoadWindow; 
}

//</script>