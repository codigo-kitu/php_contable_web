//<script type="text/javascript" language="javascript">



//var tipo_fondoJQueryPaginaWebInteraccion= function (tipo_fondo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_fondo_constante,tipo_fondo_constante1} from '../util/tipo_fondo_constante.js';

import {tipo_fondo_funcion,tipo_fondo_funcion1} from '../util/tipo_fondo_form_funcion.js';


class tipo_fondo_webcontrol extends GeneralEntityWebControl {
	
	tipo_fondo_control=null;
	tipo_fondo_controlInicial=null;
	tipo_fondo_controlAuxiliar=null;
		
	//if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_fondo_control) {
		super();
		
		this.tipo_fondo_control=tipo_fondo_control;
	}
		
	actualizarVariablesPagina(tipo_fondo_control) {
		
		if(tipo_fondo_control.action=="index" || tipo_fondo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_fondo_control);
			
		} 
		
		
		
	
		else if(tipo_fondo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_fondo_control);	
		
		} else if(tipo_fondo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_fondo_control);		
		}
	
		else if(tipo_fondo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control);		
		}
	
		
		
		else if(tipo_fondo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_fondo_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_fondo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_fondo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_fondo_control) {
		this.actualizarPaginaAccionesGenerales(tipo_fondo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_fondo_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_fondo_control);
		this.actualizarPaginaOrderBy(tipo_fondo_control);
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control);
		this.actualizarPaginaAreaBusquedas(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_fondo_control) {
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_fondo_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(tipo_fondo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tipo_fondo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.onLoadCombosDefectoFK(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_fondo_control) {
		//FORMULARIO
		if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_fondo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_fondo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		
		//COMBOS FK
		if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_fondo_control) {
		//FORMULARIO
		if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_fondo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);	
		//COMBOS FK
		if(tipo_fondo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_fondo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_fondo_control) {
		
		if(tipo_fondo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_fondo_control);
		}
		
		if(tipo_fondo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_fondo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_fondo_control) {
		if(tipo_fondo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_fondoReturnGeneral",JSON.stringify(tipo_fondo_control.tipo_fondoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control) {
		if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_fondo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_fondo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_fondo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_fondo_control, mostrar) {
		
		if(mostrar==true) {
			tipo_fondo_funcion1.resaltarRestaurarDivsPagina(false,"tipo_fondo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_fondo_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_fondo");
			}			
			
			tipo_fondo_funcion1.mostrarDivMensaje(true,tipo_fondo_control.strAuxiliarMensaje,tipo_fondo_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_fondo_funcion1.mostrarDivMensaje(false,tipo_fondo_control.strAuxiliarMensaje,tipo_fondo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control) {
		if(tipo_fondo_funcion1.esPaginaForm(tipo_fondo_constante1)==true) {
			window.opener.tipo_fondo_webcontrol1.actualizarPaginaTablaDatos(tipo_fondo_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_fondo_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_fondo_control) {
		tipo_fondo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_fondo_control.strAuxiliarUrlPagina);
				
		tipo_fondo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_fondo_control.strAuxiliarTipo,tipo_fondo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_fondo_control) {
		tipo_fondo_funcion1.resaltarRestaurarDivMensaje(true,tipo_fondo_control.strAuxiliarMensajeAlert,tipo_fondo_control.strAuxiliarCssMensaje);
			
		if(tipo_fondo_funcion1.esPaginaForm(tipo_fondo_constante1)==true) {
			window.opener.tipo_fondo_funcion1.resaltarRestaurarDivMensaje(true,tipo_fondo_control.strAuxiliarMensajeAlert,tipo_fondo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_fondo_control) {
		this.tipo_fondo_controlInicial=tipo_fondo_control;
			
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_fondo_control.strStyleDivArbol,tipo_fondo_control.strStyleDivContent
																,tipo_fondo_control.strStyleDivOpcionesBanner,tipo_fondo_control.strStyleDivExpandirColapsar
																,tipo_fondo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_fondo_control) {
		this.actualizarCssBotonesPagina(tipo_fondo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_fondo_control.tiposReportes,tipo_fondo_control.tiposReporte
															 	,tipo_fondo_control.tiposPaginacion,tipo_fondo_control.tiposAcciones
																,tipo_fondo_control.tiposColumnasSelect,tipo_fondo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_fondo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_fondo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_fondo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_fondo_control) {
	
		var indexPosition=tipo_fondo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_fondo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_fondo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_fondo_control.strRecargarFkTiposNinguno!=null && tipo_fondo_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_fondo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tipo_fondo_control) {
		jQuery("#tdtipo_fondoNuevo").css("display",tipo_fondo_control.strPermisoNuevo);
		jQuery("#trtipo_fondoElementos").css("display",tipo_fondo_control.strVisibleTablaElementos);
		jQuery("#trtipo_fondoAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);
		jQuery("#trtipo_fondoParametrosAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_fondo_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_fondo_control);
				
		if(tipo_fondo_control.tipo_fondoActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_fondo_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_fondo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_fondo_control) {
	
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-id").val(tipo_fondo_control.tipo_fondoActual.id);
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-version_row").val(tipo_fondo_control.tipo_fondoActual.versionRow);
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-codigo").val(tipo_fondo_control.tipo_fondoActual.codigo);
		jQuery("#form"+tipo_fondo_constante1.STR_SUFIJO+"-nombre").val(tipo_fondo_control.tipo_fondoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_fondo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_fondo","seguridad","","form_tipo_fondo",formulario,"","",paraEventoTabla,idFilaTabla,tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
	}
	
	actualizarSpanMensajesCampos(tipo_fondo_control) {
		jQuery("#spanstrMensajeid").text(tipo_fondo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_fondo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_fondo_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_fondo_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_fondo_control) {
		jQuery("#tdbtnNuevotipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_fondo").css("display",tipo_fondo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_fondo").css("display",tipo_fondo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_fondo").css("display",tipo_fondo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_fondo").css("display",tipo_fondo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_fondo").css("visibility",tipo_fondo_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_fondo_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_fondo_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_fondo_funcion1.validarFormularioJQuery(tipo_fondo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_fondo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_fondo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(tipo_fondo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,"tipo_fondo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_fondo_control) {
		
		
		
		if(tipo_fondo_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_fondoActualizarToolBar").css("display",tipo_fondo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_fondoEliminarToolBar").css("display",tipo_fondo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_fondoElementos").css("display",tipo_fondo_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_fondoAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);
		jQuery("#trtipo_fondoParametrosAcciones").css("display",tipo_fondo_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_fondoCerrarPagina").css("display",tipo_fondo_control.strPermisoPopup);		
		jQuery("#tdtipo_fondoCerrarPaginaToolBar").css("display",tipo_fondo_control.strPermisoPopup);
		//jQuery("#trtipo_fondoAccionesRelaciones").css("display",tipo_fondo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_fondo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_fondo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_fondo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Fondos";
		sTituloBanner+=" - " + tipo_fondo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_fondo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_fondoRelacionesToolBar").css("display",tipo_fondo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_fondo").css("display",tipo_fondo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_fondo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_fondo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_fondo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_fondo_webcontrol1.registrarEventosControles();
		
		if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			tipo_fondo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_fondo_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_fondo_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_fondo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_fondo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_fondo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tipo_fondo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_fondo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
						//tipo_fondo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_fondo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_fondo_constante1.BIG_ID_ACTUAL,"tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
						//tipo_fondo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_fondo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);	
	}
}

var tipo_fondo_webcontrol1 = new tipo_fondo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_fondo_webcontrol,tipo_fondo_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_fondo_webcontrol1 = tipo_fondo_webcontrol1;


if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_fondo_webcontrol1.onLoadWindow; 
}

//</script>