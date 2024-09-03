//<script type="text/javascript" language="javascript">



//var sistemaJQueryPaginaWebInteraccion= function (sistema_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {sistema_constante,sistema_constante1} from '../util/sistema_constante.js';

import {sistema_funcion,sistema_funcion1} from '../util/sistema_form_funcion.js';


class sistema_webcontrol extends GeneralEntityWebControl {
	
	sistema_control=null;
	sistema_controlInicial=null;
	sistema_controlAuxiliar=null;
		
	//if(sistema_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(sistema_control) {
		super();
		
		this.sistema_control=sistema_control;
	}
		
	actualizarVariablesPagina(sistema_control) {
		
		if(sistema_control.action=="index" || sistema_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(sistema_control);
			
		} 
		
		
		
	
		else if(sistema_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(sistema_control);	
		
		} else if(sistema_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(sistema_control);		
		}
	
		else if(sistema_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(sistema_control);		
		}
	
		else if(sistema_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sistema_control);
		}
		
		
		else if(sistema_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(sistema_control);
		
		} else if(sistema_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(sistema_control);
		
		} else if(sistema_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(sistema_control);
		
		} else if(sistema_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(sistema_control);
		
		} else if(sistema_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(sistema_control);
		
		} else if(sistema_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(sistema_control);		
		
		} else if(sistema_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(sistema_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + sistema_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(sistema_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(sistema_control) {
		this.actualizarPaginaAccionesGenerales(sistema_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(sistema_control) {
		
		this.actualizarPaginaCargaGeneral(sistema_control);
		this.actualizarPaginaOrderBy(sistema_control);
		this.actualizarPaginaTablaDatos(sistema_control);
		this.actualizarPaginaCargaGeneralControles(sistema_control);
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sistema_control);
		this.actualizarPaginaAreaBusquedas(sistema_control);
		this.actualizarPaginaCargaCombosFK(sistema_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(sistema_control) {
		//this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(sistema_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sistema_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(sistema_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(sistema_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sistema_control);		
		this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(sistema_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sistema_control);		
		this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(sistema_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sistema_control);		
		this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(sistema_control) {
		this.actualizarPaginaCargaGeneralControles(sistema_control);
		this.actualizarPaginaCargaCombosFK(sistema_control);
		this.actualizarPaginaFormulario(sistema_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(sistema_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(sistema_control) {
		this.actualizarPaginaCargaGeneralControles(sistema_control);
		this.actualizarPaginaCargaCombosFK(sistema_control);
		this.actualizarPaginaFormulario(sistema_control);
		this.onLoadCombosDefectoFK(sistema_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		this.actualizarPaginaAreaMantenimiento(sistema_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(sistema_control) {
		//FORMULARIO
		if(sistema_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sistema_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(sistema_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);		
		
		//COMBOS FK
		if(sistema_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sistema_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(sistema_control) {
		//FORMULARIO
		if(sistema_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sistema_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sistema_control);	
		//COMBOS FK
		if(sistema_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sistema_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(sistema_control) {
		
		if(sistema_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(sistema_control);
		}
		
		if(sistema_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(sistema_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(sistema_control) {
		if(sistema_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("sistemaReturnGeneral",JSON.stringify(sistema_control.sistemaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(sistema_control) {
		if(sistema_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && sistema_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(sistema_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(sistema_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(sistema_control, mostrar) {
		
		if(mostrar==true) {
			sistema_funcion1.resaltarRestaurarDivsPagina(false,"sistema");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				sistema_funcion1.resaltarRestaurarDivMantenimiento(false,"sistema");
			}			
			
			sistema_funcion1.mostrarDivMensaje(true,sistema_control.strAuxiliarMensaje,sistema_control.strAuxiliarCssMensaje);
		
		} else {
			sistema_funcion1.mostrarDivMensaje(false,sistema_control.strAuxiliarMensaje,sistema_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(sistema_control) {
		if(sistema_funcion1.esPaginaForm(sistema_constante1)==true) {
			window.opener.sistema_webcontrol1.actualizarPaginaTablaDatos(sistema_control);
		} else {
			this.actualizarPaginaTablaDatos(sistema_control);
		}
	}
	
	actualizarPaginaAbrirLink(sistema_control) {
		sistema_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(sistema_control.strAuxiliarUrlPagina);
				
		sistema_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(sistema_control.strAuxiliarTipo,sistema_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(sistema_control) {
		sistema_funcion1.resaltarRestaurarDivMensaje(true,sistema_control.strAuxiliarMensajeAlert,sistema_control.strAuxiliarCssMensaje);
			
		if(sistema_funcion1.esPaginaForm(sistema_constante1)==true) {
			window.opener.sistema_funcion1.resaltarRestaurarDivMensaje(true,sistema_control.strAuxiliarMensajeAlert,sistema_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(sistema_control) {
		this.sistema_controlInicial=sistema_control;
			
		if(sistema_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(sistema_control.strStyleDivArbol,sistema_control.strStyleDivContent
																,sistema_control.strStyleDivOpcionesBanner,sistema_control.strStyleDivExpandirColapsar
																,sistema_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(sistema_control) {
		this.actualizarCssBotonesPagina(sistema_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(sistema_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(sistema_control.tiposReportes,sistema_control.tiposReporte
															 	,sistema_control.tiposPaginacion,sistema_control.tiposAcciones
																,sistema_control.tiposColumnasSelect,sistema_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(sistema_control.tiposRelaciones,sistema_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(sistema_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(sistema_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(sistema_control);			
	}
	
	actualizarPaginaUsuarioInvitado(sistema_control) {
	
		var indexPosition=sistema_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=sistema_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(sistema_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(sistema_control.strRecargarFkTiposNinguno!=null && sistema_control.strRecargarFkTiposNinguno!='NINGUNO' && sistema_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(sistema_control) {
		jQuery("#tdsistemaNuevo").css("display",sistema_control.strPermisoNuevo);
		jQuery("#trsistemaElementos").css("display",sistema_control.strVisibleTablaElementos);
		jQuery("#trsistemaAcciones").css("display",sistema_control.strVisibleTablaAcciones);
		jQuery("#trsistemaParametrosAcciones").css("display",sistema_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(sistema_control) {
	
		this.actualizarCssBotonesMantenimiento(sistema_control);
				
		if(sistema_control.sistemaActual!=null) {//form
			
			this.actualizarCamposFormulario(sistema_control);			
		}
						
		this.actualizarSpanMensajesCampos(sistema_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(sistema_control) {
	
		jQuery("#form"+sistema_constante1.STR_SUFIJO+"-id").val(sistema_control.sistemaActual.id);
		jQuery("#form"+sistema_constante1.STR_SUFIJO+"-version_row").val(sistema_control.sistemaActual.versionRow);
		jQuery("#form"+sistema_constante1.STR_SUFIJO+"-codigo").val(sistema_control.sistemaActual.codigo);
		jQuery("#form"+sistema_constante1.STR_SUFIJO+"-nombre_principal").val(sistema_control.sistemaActual.nombre_principal);
		jQuery("#form"+sistema_constante1.STR_SUFIJO+"-nombre_secundario").val(sistema_control.sistemaActual.nombre_secundario);
		jQuery("#form"+sistema_constante1.STR_SUFIJO+"-estado").prop('checked',sistema_control.sistemaActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+sistema_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("sistema","seguridad","","form_sistema",formulario,"","",paraEventoTabla,idFilaTabla,sistema_funcion1,sistema_webcontrol1,sistema_constante1);
	}
	
	actualizarSpanMensajesCampos(sistema_control) {
		jQuery("#spanstrMensajeid").text(sistema_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(sistema_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(sistema_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre_principal").text(sistema_control.strMensajenombre_principal);		
		jQuery("#spanstrMensajenombre_secundario").text(sistema_control.strMensajenombre_secundario);		
		jQuery("#spanstrMensajeestado").text(sistema_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(sistema_control) {
		jQuery("#tdbtnNuevosistema").css("visibility",sistema_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevosistema").css("display",sistema_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarsistema").css("visibility",sistema_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarsistema").css("display",sistema_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarsistema").css("visibility",sistema_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarsistema").css("display",sistema_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarsistema").css("visibility",sistema_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiossistema").css("visibility",sistema_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiossistema").css("display",sistema_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarsistema").css("visibility",sistema_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarsistema").css("visibility",sistema_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarsistema").css("visibility",sistema_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//sistema_control
		
	
	}
	
	onLoadCombosDefectoFK(sistema_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sistema_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(sistema_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sistema_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(sistema_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sistema_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(sistema_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(sistema_constante1.BIT_ES_PAGINA_FORM==true) {
				sistema_funcion1.validarFormularioJQuery(sistema_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("sistema");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("sistema");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(sistema_funcion1,sistema_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(sistema_funcion1,sistema_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(sistema_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,"sistema");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("sistema");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(sistema_control) {
		
		
		
		if(sistema_control.strPermisoActualizar!=null) {
			jQuery("#tdsistemaActualizarToolBar").css("display",sistema_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdsistemaEliminarToolBar").css("display",sistema_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trsistemaElementos").css("display",sistema_control.strVisibleTablaElementos);
		
		jQuery("#trsistemaAcciones").css("display",sistema_control.strVisibleTablaAcciones);
		jQuery("#trsistemaParametrosAcciones").css("display",sistema_control.strVisibleTablaAcciones);
		
		jQuery("#tdsistemaCerrarPagina").css("display",sistema_control.strPermisoPopup);		
		jQuery("#tdsistemaCerrarPaginaToolBar").css("display",sistema_control.strPermisoPopup);
		//jQuery("#trsistemaAccionesRelaciones").css("display",sistema_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=sistema_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sistema_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + sistema_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Sistemas";
		sTituloBanner+=" - " + sistema_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sistema_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdsistemaRelacionesToolBar").css("display",sistema_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultossistema").css("display",sistema_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		sistema_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		sistema_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		sistema_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		sistema_webcontrol1.registrarEventosControles();
		
		if(sistema_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(sistema_constante1.STR_ES_RELACIONADO=="false") {
			sistema_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(sistema_constante1.STR_ES_RELACIONES=="true") {
			if(sistema_constante1.BIT_ES_PAGINA_FORM==true) {
				sistema_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(sistema_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(sistema_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(sistema_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(sistema_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
						//sistema_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(sistema_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(sistema_constante1.BIG_ID_ACTUAL,"sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);
						//sistema_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			sistema_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("sistema","seguridad","",sistema_funcion1,sistema_webcontrol1,sistema_constante1);	
	}
}

var sistema_webcontrol1 = new sistema_webcontrol();

//Para ser llamado desde otro archivo (import)
export {sistema_webcontrol,sistema_webcontrol1};

//Para ser llamado desde window.opener
window.sistema_webcontrol1 = sistema_webcontrol1;


if(sistema_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = sistema_webcontrol1.onLoadWindow; 
}

//</script>