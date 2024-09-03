//<script type="text/javascript" language="javascript">



//var parametro_general_sgJQueryPaginaWebInteraccion= function (parametro_general_sg_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_general_sg_constante,parametro_general_sg_constante1} from '../util/parametro_general_sg_constante.js';

import {parametro_general_sg_funcion,parametro_general_sg_funcion1} from '../util/parametro_general_sg_form_funcion.js';


class parametro_general_sg_webcontrol extends GeneralEntityWebControl {
	
	parametro_general_sg_control=null;
	parametro_general_sg_controlInicial=null;
	parametro_general_sg_controlAuxiliar=null;
		
	//if(parametro_general_sg_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_general_sg_control) {
		super();
		
		this.parametro_general_sg_control=parametro_general_sg_control;
	}
		
	actualizarVariablesPagina(parametro_general_sg_control) {
		
		if(parametro_general_sg_control.action=="index" || parametro_general_sg_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_general_sg_control);
			
		} 
		
		
		
	
		else if(parametro_general_sg_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_general_sg_control);	
		
		} else if(parametro_general_sg_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_sg_control);		
		}
	
	
		
		
		else if(parametro_general_sg_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_sg_control);
		
		} else if(parametro_general_sg_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_general_sg_control);		
		
		} else if(parametro_general_sg_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_sg_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_general_sg_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_general_sg_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_general_sg_control) {
		this.actualizarPaginaAccionesGenerales(parametro_general_sg_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_general_sg_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_sg_control);
		this.actualizarPaginaOrderBy(parametro_general_sg_control);
		this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
		//this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_sg_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_sg_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_general_sg_control) {
		//this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_sg_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_general_sg_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_sg_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_general_sg_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_sg_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_sg_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		this.actualizarPaginaFormulario(parametro_general_sg_control);
		this.onLoadCombosDefectoFK(parametro_general_sg_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_sg_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_sg_control) {
		//FORMULARIO
		if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_sg_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_general_sg_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);		
		
		//COMBOS FK
		if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_general_sg_control) {
		//FORMULARIO
		if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_sg_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control);	
		//COMBOS FK
		if(parametro_general_sg_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_sg_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_general_sg_control) {
		
		if(parametro_general_sg_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_general_sg_control);
		}
		
		if(parametro_general_sg_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_general_sg_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_general_sg_control) {
		if(parametro_general_sg_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_general_sgReturnGeneral",JSON.stringify(parametro_general_sg_control.parametro_general_sgReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_general_sg_control) {
		if(parametro_general_sg_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_sg_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_general_sg_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_general_sg_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_general_sg_control, mostrar) {
		
		if(mostrar==true) {
			parametro_general_sg_funcion1.resaltarRestaurarDivsPagina(false,"parametro_general_sg");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_general_sg_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_general_sg");
			}			
			
			parametro_general_sg_funcion1.mostrarDivMensaje(true,parametro_general_sg_control.strAuxiliarMensaje,parametro_general_sg_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_general_sg_funcion1.mostrarDivMensaje(false,parametro_general_sg_control.strAuxiliarMensaje,parametro_general_sg_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_general_sg_control) {
		if(parametro_general_sg_funcion1.esPaginaForm(parametro_general_sg_constante1)==true) {
			window.opener.parametro_general_sg_webcontrol1.actualizarPaginaTablaDatos(parametro_general_sg_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_general_sg_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_general_sg_control) {
		parametro_general_sg_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_general_sg_control.strAuxiliarUrlPagina);
				
		parametro_general_sg_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_general_sg_control.strAuxiliarTipo,parametro_general_sg_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_general_sg_control) {
		parametro_general_sg_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_sg_control.strAuxiliarMensajeAlert,parametro_general_sg_control.strAuxiliarCssMensaje);
			
		if(parametro_general_sg_funcion1.esPaginaForm(parametro_general_sg_constante1)==true) {
			window.opener.parametro_general_sg_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_sg_control.strAuxiliarMensajeAlert,parametro_general_sg_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_general_sg_control) {
		this.parametro_general_sg_controlInicial=parametro_general_sg_control;
			
		if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_general_sg_control.strStyleDivArbol,parametro_general_sg_control.strStyleDivContent
																,parametro_general_sg_control.strStyleDivOpcionesBanner,parametro_general_sg_control.strStyleDivExpandirColapsar
																,parametro_general_sg_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_general_sg_control) {
		this.actualizarCssBotonesPagina(parametro_general_sg_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_general_sg_control.tiposReportes,parametro_general_sg_control.tiposReporte
															 	,parametro_general_sg_control.tiposPaginacion,parametro_general_sg_control.tiposAcciones
																,parametro_general_sg_control.tiposColumnasSelect,parametro_general_sg_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_general_sg_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_general_sg_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_general_sg_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_general_sg_control) {
	
		var indexPosition=parametro_general_sg_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_general_sg_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_general_sg_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_general_sg_control.strRecargarFkTiposNinguno!=null && parametro_general_sg_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_general_sg_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_general_sg_control) {
		jQuery("#tdparametro_general_sgNuevo").css("display",parametro_general_sg_control.strPermisoNuevo);
		jQuery("#trparametro_general_sgElementos").css("display",parametro_general_sg_control.strVisibleTablaElementos);
		jQuery("#trparametro_general_sgAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);
		jQuery("#trparametro_general_sgParametrosAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_general_sg_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_general_sg_control);
				
		if(parametro_general_sg_control.parametro_general_sgActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_general_sg_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_general_sg_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_general_sg_control) {
	
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-id").val(parametro_general_sg_control.parametro_general_sgActual.id);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-created_at").val(parametro_general_sg_control.parametro_general_sgActual.versionRow);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-updated_at").val(parametro_general_sg_control.parametro_general_sgActual.versionRow);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-nombre_sistema").val(parametro_general_sg_control.parametro_general_sgActual.nombre_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-nombre_simple_sistema").val(parametro_general_sg_control.parametro_general_sgActual.nombre_simple_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-nombre_empresa").val(parametro_general_sg_control.parametro_general_sgActual.nombre_empresa);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-version_sistema").val(parametro_general_sg_control.parametro_general_sgActual.version_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-siglas_sistema").val(parametro_general_sg_control.parametro_general_sgActual.siglas_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-mail_sistema").val(parametro_general_sg_control.parametro_general_sgActual.mail_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-telefono_sistema").val(parametro_general_sg_control.parametro_general_sgActual.telefono_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-fax_sistema").val(parametro_general_sg_control.parametro_general_sgActual.fax_sistema);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-representante_nombre").val(parametro_general_sg_control.parametro_general_sgActual.representante_nombre);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-codigo_proceso_actualizacion").val(parametro_general_sg_control.parametro_general_sgActual.codigo_proceso_actualizacion);
		jQuery("#form"+parametro_general_sg_constante1.STR_SUFIJO+"-esta_activo").prop('checked',parametro_general_sg_control.parametro_general_sgActual.esta_activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_general_sg_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_general_sg","seguridad","","form_parametro_general_sg",formulario,"","",paraEventoTabla,idFilaTabla,parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_general_sg_control) {
		jQuery("#spanstrMensajeid").text(parametro_general_sg_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(parametro_general_sg_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(parametro_general_sg_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajenombre_sistema").text(parametro_general_sg_control.strMensajenombre_sistema);		
		jQuery("#spanstrMensajenombre_simple_sistema").text(parametro_general_sg_control.strMensajenombre_simple_sistema);		
		jQuery("#spanstrMensajenombre_empresa").text(parametro_general_sg_control.strMensajenombre_empresa);		
		jQuery("#spanstrMensajeversion_sistema").text(parametro_general_sg_control.strMensajeversion_sistema);		
		jQuery("#spanstrMensajesiglas_sistema").text(parametro_general_sg_control.strMensajesiglas_sistema);		
		jQuery("#spanstrMensajemail_sistema").text(parametro_general_sg_control.strMensajemail_sistema);		
		jQuery("#spanstrMensajetelefono_sistema").text(parametro_general_sg_control.strMensajetelefono_sistema);		
		jQuery("#spanstrMensajefax_sistema").text(parametro_general_sg_control.strMensajefax_sistema);		
		jQuery("#spanstrMensajerepresentante_nombre").text(parametro_general_sg_control.strMensajerepresentante_nombre);		
		jQuery("#spanstrMensajecodigo_proceso_actualizacion").text(parametro_general_sg_control.strMensajecodigo_proceso_actualizacion);		
		jQuery("#spanstrMensajeesta_activo").text(parametro_general_sg_control.strMensajeesta_activo);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_general_sg_control) {
		jQuery("#tdbtnNuevoparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_general_sg").css("display",parametro_general_sg_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_general_sg").css("display",parametro_general_sg_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_general_sg").css("display",parametro_general_sg_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_general_sg").css("display",parametro_general_sg_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_general_sg").css("visibility",parametro_general_sg_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_general_sg_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_general_sg_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_sg_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_general_sg_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_sg_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_general_sg_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_sg_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_general_sg_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_general_sg_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_sg_funcion1.validarFormularioJQuery(parametro_general_sg_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_general_sg");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_general_sg");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,"parametro_general_sg");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_general_sg_control) {
		
		
		
		if(parametro_general_sg_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_general_sgActualizarToolBar").css("display",parametro_general_sg_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_general_sgEliminarToolBar").css("display",parametro_general_sg_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_general_sgElementos").css("display",parametro_general_sg_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_general_sgAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);
		jQuery("#trparametro_general_sgParametrosAcciones").css("display",parametro_general_sg_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_general_sgCerrarPagina").css("display",parametro_general_sg_control.strPermisoPopup);		
		jQuery("#tdparametro_general_sgCerrarPaginaToolBar").css("display",parametro_general_sg_control.strPermisoPopup);
		//jQuery("#trparametro_general_sgAccionesRelaciones").css("display",parametro_general_sg_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_general_sg_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_sg_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_general_sg_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Generales";
		sTituloBanner+=" - " + parametro_general_sg_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_sg_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_general_sgRelacionesToolBar").css("display",parametro_general_sg_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_general_sg").css("display",parametro_general_sg_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_general_sg_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_general_sg_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_general_sg_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_general_sg_webcontrol1.registrarEventosControles();
		
		if(parametro_general_sg_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
			parametro_general_sg_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_general_sg_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_general_sg_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_sg_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_general_sg_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_general_sg_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_general_sg_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_general_sg_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
						//parametro_general_sg_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_general_sg_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_general_sg_constante1.BIG_ID_ACTUAL,"parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);
						//parametro_general_sg_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_general_sg_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_general_sg","seguridad","",parametro_general_sg_funcion1,parametro_general_sg_webcontrol1,parametro_general_sg_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina:actualizarVariablesPagina(AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionesGenerales)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevo,AccionActualizar,AccionEliminar,AccionSeleccionar)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevoPreparar,AccionRecargarFomulario,AccionManejarEventos)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla)
		Pagina: actualizarPagina(TablaDatos,AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles)
		Pagina: actualizarPagina(CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaMantenimiento,Formulario)
		Combos-Fk: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos-Fk: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Fk: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		Combos-Fk: onLoadCombosEventosFK,onLoadCombosDefectoPaginaGeneralControles
		Campos-Recargar: actualizarCamposFormulario,recargarFormularioGeneral
		SpanMensajes-CssBotones: actualizarSpanMensajesCampos,actualizarCssBotonesMantenimiento
		Eventos-CombosFk: onLoadRecargarRelacionado,registrarEventosControles,onLoadCombosDefectoFK
		AccioesEventos-CssBotones: registrarAccionesEventos,actualizarCssBotonesPagina
		PropiedadesPagina-FuncionesPagina: registrarPropiedadesPagina, registrarFuncionesPagina
		Load-Unload-Pagina: onLoad, onUnLoadWindow, onLoadWindow
		Eventos-OnLoad: registrarEventosOnLoadGlobal
	*/
}

var parametro_general_sg_webcontrol1 = new parametro_general_sg_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_general_sg_webcontrol,parametro_general_sg_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_general_sg_webcontrol1 = parametro_general_sg_webcontrol1;


if(parametro_general_sg_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_general_sg_webcontrol1.onLoadWindow; 
}

//</script>