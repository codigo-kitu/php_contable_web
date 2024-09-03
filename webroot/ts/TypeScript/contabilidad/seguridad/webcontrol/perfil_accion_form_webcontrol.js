//<script type="text/javascript" language="javascript">



//var perfil_accionJQueryPaginaWebInteraccion= function (perfil_accion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_accion_constante,perfil_accion_constante1} from '../util/perfil_accion_constante.js';

import {perfil_accion_funcion,perfil_accion_funcion1} from '../util/perfil_accion_form_funcion.js';


class perfil_accion_webcontrol extends GeneralEntityWebControl {
	
	perfil_accion_control=null;
	perfil_accion_controlInicial=null;
	perfil_accion_controlAuxiliar=null;
		
	//if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_accion_control) {
		super();
		
		this.perfil_accion_control=perfil_accion_control;
	}
		
	actualizarVariablesPagina(perfil_accion_control) {
		
		if(perfil_accion_control.action=="index" || perfil_accion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_accion_control);
			
		} 
		
		
		
	
		else if(perfil_accion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_accion_control);	
		
		} else if(perfil_accion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_accion_control);		
		}
	
	
		
		
		else if(perfil_accion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_accion_control);		
		
		} else if(perfil_accion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_accion_control);		
		
		} 
		//else if(perfil_accion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_accion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_accion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_accion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_accion_control) {
		this.actualizarPaginaAccionesGenerales(perfil_accion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_accion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_accion_control);
		this.actualizarPaginaOrderBy(perfil_accion_control);
		this.actualizarPaginaTablaDatos(perfil_accion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_accion_control);
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_accion_control);
		this.actualizarPaginaAreaBusquedas(perfil_accion_control);
		this.actualizarPaginaCargaCombosFK(perfil_accion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_accion_control) {
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_accion_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(perfil_accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_accion_control);		
		this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_accion_control);		
		this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_accion_control);		
		this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_accion_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_accion_control);
		this.actualizarPaginaCargaCombosFK(perfil_accion_control);
		this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(perfil_accion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_accion_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_accion_control);
		this.actualizarPaginaCargaCombosFK(perfil_accion_control);
		this.actualizarPaginaFormulario(perfil_accion_control);
		this.onLoadCombosDefectoFK(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_accion_control) {
		//FORMULARIO
		if(perfil_accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_accion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_accion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		
		//COMBOS FK
		if(perfil_accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_accion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_accion_control) {
		//FORMULARIO
		if(perfil_accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_accion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_accion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);	
		
		//COMBOS FK
		if(perfil_accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_accion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_accion_control) {
		//FORMULARIO
		if(perfil_accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_accion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);	
		//COMBOS FK
		if(perfil_accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_accion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_accion_control) {
		
		if(perfil_accion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_accion_control);
		}
		
		if(perfil_accion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_accion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_accion_control) {
		if(perfil_accion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_accionReturnGeneral",JSON.stringify(perfil_accion_control.perfil_accionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control) {
		if(perfil_accion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_accion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_accion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_accion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_accion_control, mostrar) {
		
		if(mostrar==true) {
			perfil_accion_funcion1.resaltarRestaurarDivsPagina(false,"perfil_accion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_accion_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_accion");
			}			
			
			perfil_accion_funcion1.mostrarDivMensaje(true,perfil_accion_control.strAuxiliarMensaje,perfil_accion_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_accion_funcion1.mostrarDivMensaje(false,perfil_accion_control.strAuxiliarMensaje,perfil_accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_accion_control) {
		if(perfil_accion_funcion1.esPaginaForm(perfil_accion_constante1)==true) {
			window.opener.perfil_accion_webcontrol1.actualizarPaginaTablaDatos(perfil_accion_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_accion_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_accion_control) {
		perfil_accion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_accion_control.strAuxiliarUrlPagina);
				
		perfil_accion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_accion_control.strAuxiliarTipo,perfil_accion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_accion_control) {
		perfil_accion_funcion1.resaltarRestaurarDivMensaje(true,perfil_accion_control.strAuxiliarMensajeAlert,perfil_accion_control.strAuxiliarCssMensaje);
			
		if(perfil_accion_funcion1.esPaginaForm(perfil_accion_constante1)==true) {
			window.opener.perfil_accion_funcion1.resaltarRestaurarDivMensaje(true,perfil_accion_control.strAuxiliarMensajeAlert,perfil_accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_accion_control) {
		this.perfil_accion_controlInicial=perfil_accion_control;
			
		if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_accion_control.strStyleDivArbol,perfil_accion_control.strStyleDivContent
																,perfil_accion_control.strStyleDivOpcionesBanner,perfil_accion_control.strStyleDivExpandirColapsar
																,perfil_accion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_accion_control) {
		this.actualizarCssBotonesPagina(perfil_accion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_accion_control.tiposReportes,perfil_accion_control.tiposReporte
															 	,perfil_accion_control.tiposPaginacion,perfil_accion_control.tiposAcciones
																,perfil_accion_control.tiposColumnasSelect,perfil_accion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_accion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_accion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_accion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_accion_control) {
	
		var indexPosition=perfil_accion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_accion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_accion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.cargarCombosperfilsFK(perfil_accion_control);
			}

			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.cargarCombosaccionsFK(perfil_accion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_accion_control.strRecargarFkTiposNinguno!=null && perfil_accion_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_accion_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_accion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_accion_webcontrol1.cargarCombosperfilsFK(perfil_accion_control);
				}

				if(perfil_accion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_accion_webcontrol1.cargarCombosaccionsFK(perfil_accion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_accion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_accion_funcion1,perfil_accion_control.perfilsFK);
	}

	cargarComboEditarTablaaccionFK(perfil_accion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_accion_funcion1,perfil_accion_control.accionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(perfil_accion_control) {
		jQuery("#tdperfil_accionNuevo").css("display",perfil_accion_control.strPermisoNuevo);
		jQuery("#trperfil_accionElementos").css("display",perfil_accion_control.strVisibleTablaElementos);
		jQuery("#trperfil_accionAcciones").css("display",perfil_accion_control.strVisibleTablaAcciones);
		jQuery("#trperfil_accionParametrosAcciones").css("display",perfil_accion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_accion_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_accion_control);
				
		if(perfil_accion_control.perfil_accionActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_accion_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_accion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_accion_control) {
	
		jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id").val(perfil_accion_control.perfil_accionActual.id);
		jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-version_row").val(perfil_accion_control.perfil_accionActual.versionRow);
		
		if(perfil_accion_control.perfil_accionActual.id_perfil!=null && perfil_accion_control.perfil_accionActual.id_perfil>-1){
			if(jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_accion_control.perfil_accionActual.id_perfil) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_accion_control.perfil_accionActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").select2("val", null);
			if(jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_accion_control.perfil_accionActual.id_accion!=null && perfil_accion_control.perfil_accionActual.id_accion>-1){
			if(jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val() != perfil_accion_control.perfil_accionActual.id_accion) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val(perfil_accion_control.perfil_accionActual.id_accion).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").select2("val", null);
			if(jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-ejecusion").prop('checked',perfil_accion_control.perfil_accionActual.ejecusion);
		jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_accion_control.perfil_accionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_accion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil_accion","seguridad","","form_perfil_accion",formulario,"","",paraEventoTabla,idFilaTabla,perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
	}
	
	actualizarSpanMensajesCampos(perfil_accion_control) {
		jQuery("#spanstrMensajeid").text(perfil_accion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_accion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_perfil").text(perfil_accion_control.strMensajeid_perfil);		
		jQuery("#spanstrMensajeid_accion").text(perfil_accion_control.strMensajeid_accion);		
		jQuery("#spanstrMensajeejecusion").text(perfil_accion_control.strMensajeejecusion);		
		jQuery("#spanstrMensajeestado").text(perfil_accion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_accion_control) {
		jQuery("#tdbtnNuevoperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil_accion").css("display",perfil_accion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil_accion").css("display",perfil_accion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil_accion").css("display",perfil_accion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil_accion").css("display",perfil_accion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil_accion").css("visibility",perfil_accion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_accion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil",perfil_accion_control.perfilsFK);

		if(perfil_accion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_accion_control.idFilaTablaActual+"_2",perfil_accion_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_accion_control.perfilsFK);

	};

	cargarCombosaccionsFK(perfil_accion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion",perfil_accion_control.accionsFK);

		if(perfil_accion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_accion_control.idFilaTablaActual+"_3",perfil_accion_control.accionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion",perfil_accion_control.accionsFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_accion_control) {

	};

	registrarComboActionChangeCombosaccionsFK(perfil_accion_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_accion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_accion_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_accion_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_accion_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_accion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosaccionsFK(perfil_accion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_accion_control.idaccionDefaultFK>-1 && jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val() != perfil_accion_control.idaccionDefaultFK) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val(perfil_accion_control.idaccionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion").val(perfil_accion_control.idaccionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_accion_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.setDefectoValorCombosperfilsFK(perfil_accion_control);
			}

			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.setDefectoValorCombosaccionsFK(perfil_accion_control);
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
	onLoadCombosEventosFK(perfil_accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_accion_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_accion_control);
			//}

			//if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_accion_webcontrol1.registrarComboActionChangeCombosaccionsFK(perfil_accion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(perfil_accion_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_accion_funcion1.validarFormularioJQuery(perfil_accion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_accion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_accion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_accion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,"perfil_accion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_accion_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("accion","id_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion_img_busqueda").click(function(){
				perfil_accion_webcontrol1.abrirBusquedaParaaccion("id_accion");
				//alert(jQuery('#form-id_accion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_accion_control) {
		
		
		
		if(perfil_accion_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_accionActualizarToolBar").css("display",perfil_accion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdperfil_accionEliminarToolBar").css("display",perfil_accion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trperfil_accionElementos").css("display",perfil_accion_control.strVisibleTablaElementos);
		
		jQuery("#trperfil_accionAcciones").css("display",perfil_accion_control.strVisibleTablaAcciones);
		jQuery("#trperfil_accionParametrosAcciones").css("display",perfil_accion_control.strVisibleTablaAcciones);
		
		jQuery("#tdperfil_accionCerrarPagina").css("display",perfil_accion_control.strPermisoPopup);		
		jQuery("#tdperfil_accionCerrarPaginaToolBar").css("display",perfil_accion_control.strPermisoPopup);
		//jQuery("#trperfil_accionAccionesRelaciones").css("display",perfil_accion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfil Acciones";
		sTituloBanner+=" - " + perfil_accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_accion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_accionRelacionesToolBar").css("display",perfil_accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_accion").css("display",perfil_accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_accion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_accion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_accion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_accion_webcontrol1.registrarEventosControles();
		
		if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
			perfil_accion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_accion_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_accion_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_accion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_accion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(perfil_accion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(perfil_accion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
						//perfil_accion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(perfil_accion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_accion_constante1.BIG_ID_ACTUAL,"perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
						//perfil_accion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			perfil_accion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);	
	}
}

var perfil_accion_webcontrol1 = new perfil_accion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_accion_webcontrol,perfil_accion_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_accion_webcontrol1 = perfil_accion_webcontrol1;


if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_accion_webcontrol1.onLoadWindow; 
}

//</script>