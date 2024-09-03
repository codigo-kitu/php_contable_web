//<script type="text/javascript" language="javascript">



//var usuarioJQueryPaginaWebInteraccion= function (usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {usuario_constante,usuario_constante1} from '../util/usuario_constante.js';

import {usuario_funcion,usuario_funcion1} from '../util/usuario_form_funcion.js';


class usuario_webcontrol extends GeneralEntityWebControl {
	
	usuario_control=null;
	usuario_controlInicial=null;
	usuario_controlAuxiliar=null;
		
	//if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(usuario_control) {
		super();
		
		this.usuario_control=usuario_control;
	}
		
	actualizarVariablesPagina(usuario_control) {
		
		if(usuario_control.action=="index" || usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(usuario_control);
			
		} 
		
		
		
	
		else if(usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(usuario_control);	
		
		} else if(usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(usuario_control);		
		}
	
		else if(usuario_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(usuario_control);		
		}
	
		else if(usuario_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(usuario_control);
		}
		
		
		else if(usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(usuario_control);
		
		} else if(usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(usuario_control);
		
		} else if(usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(usuario_control);
		
		} else if(usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(usuario_control);
		
		} else if(usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(usuario_control);		
		
		} else if(usuario_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(usuario_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(usuario_control) {
		this.actualizarPaginaAccionesGenerales(usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(usuario_control) {
		
		this.actualizarPaginaCargaGeneral(usuario_control);
		this.actualizarPaginaOrderBy(usuario_control);
		this.actualizarPaginaTablaDatos(usuario_control);
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(usuario_control);
		this.actualizarPaginaAreaBusquedas(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(usuario_control) {
		//this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(usuario_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(usuario_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(usuario_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(usuario_control);		
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(usuario_control) {
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(usuario_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(usuario_control) {
		this.actualizarPaginaCargaGeneralControles(usuario_control);
		this.actualizarPaginaCargaCombosFK(usuario_control);
		this.actualizarPaginaFormulario(usuario_control);
		this.onLoadCombosDefectoFK(usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		this.actualizarPaginaAreaMantenimiento(usuario_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(usuario_control) {
		//FORMULARIO
		if(usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);		
		
		//COMBOS FK
		if(usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(usuario_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(usuario_control) {
		//FORMULARIO
		if(usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(usuario_control);	
		//COMBOS FK
		if(usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(usuario_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(usuario_control) {
		
		if(usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(usuario_control);
		}
		
		if(usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(usuario_control) {
		if(usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("usuarioReturnGeneral",JSON.stringify(usuario_control.usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(usuario_control) {
		if(usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(usuario_control, mostrar) {
		
		if(mostrar==true) {
			usuario_funcion1.resaltarRestaurarDivsPagina(false,"usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"usuario");
			}			
			
			usuario_funcion1.mostrarDivMensaje(true,usuario_control.strAuxiliarMensaje,usuario_control.strAuxiliarCssMensaje);
		
		} else {
			usuario_funcion1.mostrarDivMensaje(false,usuario_control.strAuxiliarMensaje,usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(usuario_control) {
		if(usuario_funcion1.esPaginaForm(usuario_constante1)==true) {
			window.opener.usuario_webcontrol1.actualizarPaginaTablaDatos(usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(usuario_control) {
		usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(usuario_control.strAuxiliarUrlPagina);
				
		usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(usuario_control.strAuxiliarTipo,usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(usuario_control) {
		usuario_funcion1.resaltarRestaurarDivMensaje(true,usuario_control.strAuxiliarMensajeAlert,usuario_control.strAuxiliarCssMensaje);
			
		if(usuario_funcion1.esPaginaForm(usuario_constante1)==true) {
			window.opener.usuario_funcion1.resaltarRestaurarDivMensaje(true,usuario_control.strAuxiliarMensajeAlert,usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(usuario_control) {
		this.usuario_controlInicial=usuario_control;
			
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(usuario_control.strStyleDivArbol,usuario_control.strStyleDivContent
																,usuario_control.strStyleDivOpcionesBanner,usuario_control.strStyleDivExpandirColapsar
																,usuario_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(usuario_control) {
		this.actualizarCssBotonesPagina(usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(usuario_control.tiposReportes,usuario_control.tiposReporte
															 	,usuario_control.tiposPaginacion,usuario_control.tiposAcciones
																,usuario_control.tiposColumnasSelect,usuario_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(usuario_control.tiposRelaciones,usuario_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(usuario_control) {
	
		var indexPosition=usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(usuario_control.strRecargarFkTiposNinguno!=null && usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && usuario_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(usuario_control) {
		jQuery("#tdusuarioNuevo").css("display",usuario_control.strPermisoNuevo);
		jQuery("#trusuarioElementos").css("display",usuario_control.strVisibleTablaElementos);
		jQuery("#trusuarioAcciones").css("display",usuario_control.strVisibleTablaAcciones);
		jQuery("#trusuarioParametrosAcciones").css("display",usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(usuario_control);
				
		if(usuario_control.usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(usuario_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(usuario_control) {
	
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-id").val(usuario_control.usuarioActual.id);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-created_at").val(usuario_control.usuarioActual.versionRow);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-updated_at").val(usuario_control.usuarioActual.versionRow);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-user_name").val(usuario_control.usuarioActual.user_name);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-clave").val(usuario_control.usuarioActual.clave);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-confirmar_clave").val(usuario_control.usuarioActual.confirmar_clave);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-nombre").val(usuario_control.usuarioActual.nombre);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-codigo_alterno").val(usuario_control.usuarioActual.codigo_alterno);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-tipo").prop('checked',usuario_control.usuarioActual.tipo);
		jQuery("#form"+usuario_constante1.STR_SUFIJO+"-estado").prop('checked',usuario_control.usuarioActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("usuario","seguridad","","form_usuario",formulario,"","",paraEventoTabla,idFilaTabla,usuario_funcion1,usuario_webcontrol1,usuario_constante1);
	}
	
	actualizarSpanMensajesCampos(usuario_control) {
		jQuery("#spanstrMensajeid").text(usuario_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(usuario_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(usuario_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeuser_name").text(usuario_control.strMensajeuser_name);		
		jQuery("#spanstrMensajeclave").text(usuario_control.strMensajeclave);		
		jQuery("#spanstrMensajeconfirmar_clave").text(usuario_control.strMensajeconfirmar_clave);		
		jQuery("#spanstrMensajenombre").text(usuario_control.strMensajenombre);		
		jQuery("#spanstrMensajecodigo_alterno").text(usuario_control.strMensajecodigo_alterno);		
		jQuery("#spanstrMensajetipo").text(usuario_control.strMensajetipo);		
		jQuery("#spanstrMensajeestado").text(usuario_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(usuario_control) {
		jQuery("#tdbtnNuevousuario").css("visibility",usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevousuario").css("display",usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarusuario").css("visibility",usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarusuario").css("display",usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarusuario").css("visibility",usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarusuario").css("display",usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarusuario").css("visibility",usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosusuario").css("visibility",usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosusuario").css("display",usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarusuario").css("visibility",usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarusuario").css("visibility",usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarusuario").css("visibility",usuario_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				usuario_funcion1.validarFormularioJQuery(usuario_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("usuario");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(usuario_funcion1,usuario_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(usuario_funcion1,usuario_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,"usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("usuario");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(usuario_control) {
		
		
		
		if(usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdusuarioActualizarToolBar").css("display",usuario_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdusuarioEliminarToolBar").css("display",usuario_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trusuarioElementos").css("display",usuario_control.strVisibleTablaElementos);
		
		jQuery("#trusuarioAcciones").css("display",usuario_control.strVisibleTablaAcciones);
		jQuery("#trusuarioParametrosAcciones").css("display",usuario_control.strVisibleTablaAcciones);
		
		jQuery("#tdusuarioCerrarPagina").css("display",usuario_control.strPermisoPopup);		
		jQuery("#tdusuarioCerrarPaginaToolBar").css("display",usuario_control.strPermisoPopup);
		//jQuery("#trusuarioAccionesRelaciones").css("display",usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Usuarios";
		sTituloBanner+=" - " + usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdusuarioRelacionesToolBar").css("display",usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosusuario").css("display",usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		usuario_webcontrol1.registrarEventosControles();
		
		if(usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(usuario_constante1.STR_ES_RELACIONADO=="false") {
			usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(usuario_constante1.STR_ES_RELACIONES=="true") {
			if(usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
						//usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(usuario_constante1.BIG_ID_ACTUAL,"usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);
						//usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("usuario","seguridad","",usuario_funcion1,usuario_webcontrol1,usuario_constante1);	
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

var usuario_webcontrol1 = new usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {usuario_webcontrol,usuario_webcontrol1};

//Para ser llamado desde window.opener
window.usuario_webcontrol1 = usuario_webcontrol1;


if(usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = usuario_webcontrol1.onLoadWindow; 
}

//</script>