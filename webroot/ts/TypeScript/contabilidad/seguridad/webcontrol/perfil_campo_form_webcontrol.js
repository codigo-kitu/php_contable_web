//<script type="text/javascript" language="javascript">



//var perfil_campoJQueryPaginaWebInteraccion= function (perfil_campo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_campo_constante,perfil_campo_constante1} from '../util/perfil_campo_constante.js';

import {perfil_campo_funcion,perfil_campo_funcion1} from '../util/perfil_campo_form_funcion.js';


class perfil_campo_webcontrol extends GeneralEntityWebControl {
	
	perfil_campo_control=null;
	perfil_campo_controlInicial=null;
	perfil_campo_controlAuxiliar=null;
		
	//if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_campo_control) {
		super();
		
		this.perfil_campo_control=perfil_campo_control;
	}
		
	actualizarVariablesPagina(perfil_campo_control) {
		
		if(perfil_campo_control.action=="index" || perfil_campo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_campo_control);
			
		} 
		
		
		
	
		else if(perfil_campo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_campo_control);	
		
		} else if(perfil_campo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_campo_control);		
		}
	
	
		
		
		else if(perfil_campo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_campo_control);
		
		} else if(perfil_campo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_campo_control);		
		
		} else if(perfil_campo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_campo_control);		
		
		} 
		//else if(perfil_campo_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_campo_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_campo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_campo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_campo_control) {
		this.actualizarPaginaAccionesGenerales(perfil_campo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_campo_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_campo_control);
		this.actualizarPaginaOrderBy(perfil_campo_control);
		this.actualizarPaginaTablaDatos(perfil_campo_control);
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_campo_control);
		this.actualizarPaginaAreaBusquedas(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_campo_control) {
		//this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_campo_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(perfil_campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_campo_control);		
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_campo_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(perfil_campo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_campo_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_campo_control);
		this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		this.actualizarPaginaFormulario(perfil_campo_control);
		this.onLoadCombosDefectoFK(perfil_campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_campo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_campo_control) {
		//FORMULARIO
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_campo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_campo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);		
		
		//COMBOS FK
		if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_campo_control) {
		//FORMULARIO
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_campo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_campo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);	
		
		//COMBOS FK
		if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_campo_control) {
		//FORMULARIO
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_campo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control);	
		//COMBOS FK
		if(perfil_campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_campo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_campo_control) {
		
		if(perfil_campo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_campo_control);
		}
		
		if(perfil_campo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_campo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_campo_control) {
		if(perfil_campo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_campoReturnGeneral",JSON.stringify(perfil_campo_control.perfil_campoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_campo_control) {
		if(perfil_campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_campo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_campo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_campo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_campo_control, mostrar) {
		
		if(mostrar==true) {
			perfil_campo_funcion1.resaltarRestaurarDivsPagina(false,"perfil_campo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_campo_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_campo");
			}			
			
			perfil_campo_funcion1.mostrarDivMensaje(true,perfil_campo_control.strAuxiliarMensaje,perfil_campo_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_campo_funcion1.mostrarDivMensaje(false,perfil_campo_control.strAuxiliarMensaje,perfil_campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_campo_control) {
		if(perfil_campo_funcion1.esPaginaForm(perfil_campo_constante1)==true) {
			window.opener.perfil_campo_webcontrol1.actualizarPaginaTablaDatos(perfil_campo_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_campo_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_campo_control) {
		perfil_campo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_campo_control.strAuxiliarUrlPagina);
				
		perfil_campo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_campo_control.strAuxiliarTipo,perfil_campo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_campo_control) {
		perfil_campo_funcion1.resaltarRestaurarDivMensaje(true,perfil_campo_control.strAuxiliarMensajeAlert,perfil_campo_control.strAuxiliarCssMensaje);
			
		if(perfil_campo_funcion1.esPaginaForm(perfil_campo_constante1)==true) {
			window.opener.perfil_campo_funcion1.resaltarRestaurarDivMensaje(true,perfil_campo_control.strAuxiliarMensajeAlert,perfil_campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_campo_control) {
		this.perfil_campo_controlInicial=perfil_campo_control;
			
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_campo_control.strStyleDivArbol,perfil_campo_control.strStyleDivContent
																,perfil_campo_control.strStyleDivOpcionesBanner,perfil_campo_control.strStyleDivExpandirColapsar
																,perfil_campo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_campo_control) {
		this.actualizarCssBotonesPagina(perfil_campo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_campo_control.tiposReportes,perfil_campo_control.tiposReporte
															 	,perfil_campo_control.tiposPaginacion,perfil_campo_control.tiposAcciones
																,perfil_campo_control.tiposColumnasSelect,perfil_campo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_campo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_campo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_campo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_campo_control) {
	
		var indexPosition=perfil_campo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_campo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_campo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.cargarCombosperfilsFK(perfil_campo_control);
			}

			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.cargarComboscamposFK(perfil_campo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_campo_control.strRecargarFkTiposNinguno!=null && perfil_campo_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_campo_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTiposNinguno,",")) { 
					perfil_campo_webcontrol1.cargarCombosperfilsFK(perfil_campo_control);
				}

				if(perfil_campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTiposNinguno,",")) { 
					perfil_campo_webcontrol1.cargarComboscamposFK(perfil_campo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_campo_funcion1,perfil_campo_control.perfilsFK);
	}

	cargarComboEditarTablacampoFK(perfil_campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_campo_funcion1,perfil_campo_control.camposFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(perfil_campo_control) {
		jQuery("#tdperfil_campoNuevo").css("display",perfil_campo_control.strPermisoNuevo);
		jQuery("#trperfil_campoElementos").css("display",perfil_campo_control.strVisibleTablaElementos);
		jQuery("#trperfil_campoAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);
		jQuery("#trperfil_campoParametrosAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_campo_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_campo_control);
				
		if(perfil_campo_control.perfil_campoActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_campo_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_campo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_campo_control) {
	
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id").val(perfil_campo_control.perfil_campoActual.id);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-version_row").val(perfil_campo_control.perfil_campoActual.versionRow);
		
		if(perfil_campo_control.perfil_campoActual.id_perfil!=null && perfil_campo_control.perfil_campoActual.id_perfil>-1){
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_campo_control.perfil_campoActual.id_perfil) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(perfil_campo_control.perfil_campoActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").select2("val", null);
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_campo_control.perfil_campoActual.id_campo!=null && perfil_campo_control.perfil_campoActual.id_campo>-1){
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val() != perfil_campo_control.perfil_campoActual.id_campo) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val(perfil_campo_control.perfil_campoActual.id_campo).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").select2("val", null);
			if(jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-todo").prop('checked',perfil_campo_control.perfil_campoActual.todo);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-ingreso").prop('checked',perfil_campo_control.perfil_campoActual.ingreso);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-modificacion").prop('checked',perfil_campo_control.perfil_campoActual.modificacion);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-eliminacion").prop('checked',perfil_campo_control.perfil_campoActual.eliminacion);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-consulta").prop('checked',perfil_campo_control.perfil_campoActual.consulta);
		jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_campo_control.perfil_campoActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_campo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil_campo","seguridad","","form_perfil_campo",formulario,"","",paraEventoTabla,idFilaTabla,perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	actualizarSpanMensajesCampos(perfil_campo_control) {
		jQuery("#spanstrMensajeid").text(perfil_campo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_campo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_perfil").text(perfil_campo_control.strMensajeid_perfil);		
		jQuery("#spanstrMensajeid_campo").text(perfil_campo_control.strMensajeid_campo);		
		jQuery("#spanstrMensajetodo").text(perfil_campo_control.strMensajetodo);		
		jQuery("#spanstrMensajeingreso").text(perfil_campo_control.strMensajeingreso);		
		jQuery("#spanstrMensajemodificacion").text(perfil_campo_control.strMensajemodificacion);		
		jQuery("#spanstrMensajeeliminacion").text(perfil_campo_control.strMensajeeliminacion);		
		jQuery("#spanstrMensajeconsulta").text(perfil_campo_control.strMensajeconsulta);		
		jQuery("#spanstrMensajeestado").text(perfil_campo_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_campo_control) {
		jQuery("#tdbtnNuevoperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil_campo").css("display",perfil_campo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil_campo").css("display",perfil_campo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil_campo").css("display",perfil_campo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil_campo").css("display",perfil_campo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil_campo").css("visibility",perfil_campo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil",perfil_campo_control.perfilsFK);

		if(perfil_campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_campo_control.idFilaTablaActual+"_2",perfil_campo_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_campo_control.perfilsFK);

	};

	cargarComboscamposFK(perfil_campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo",perfil_campo_control.camposFK);

		if(perfil_campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_campo_control.idFilaTablaActual+"_3",perfil_campo_control.camposFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo",perfil_campo_control.camposFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_campo_control) {

	};

	registrarComboActionChangeComboscamposFK(perfil_campo_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_campo_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_campo_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil").val(perfil_campo_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_campo_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscamposFK(perfil_campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_campo_control.idcampoDefaultFK>-1 && jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val() != perfil_campo_control.idcampoDefaultFK) {
				jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo").val(perfil_campo_control.idcampoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val(perfil_campo_control.idcampoDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_campo_constante1.STR_SUFIJO+"FK_Idcampo-cmbid_campo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_campo_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.setDefectoValorCombosperfilsFK(perfil_campo_control);
			}

			if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 
				perfil_campo_webcontrol1.setDefectoValorComboscamposFK(perfil_campo_control);
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
	onLoadCombosEventosFK(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_campo_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_campo_control);
			//}

			//if(perfil_campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_campo",perfil_campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_campo_webcontrol1.registrarComboActionChangeComboscamposFK(perfil_campo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(perfil_campo_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_campo_funcion1.validarFormularioJQuery(perfil_campo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_campo");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_campo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_campo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,"perfil_campo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_campo_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("campo","id_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_campo_constante1.STR_SUFIJO+"-id_campo_img_busqueda").click(function(){
				perfil_campo_webcontrol1.abrirBusquedaParacampo("id_campo");
				//alert(jQuery('#form-id_campo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_campo_control) {
		
		
		
		if(perfil_campo_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_campoActualizarToolBar").css("display",perfil_campo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdperfil_campoEliminarToolBar").css("display",perfil_campo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trperfil_campoElementos").css("display",perfil_campo_control.strVisibleTablaElementos);
		
		jQuery("#trperfil_campoAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);
		jQuery("#trperfil_campoParametrosAcciones").css("display",perfil_campo_control.strVisibleTablaAcciones);
		
		jQuery("#tdperfil_campoCerrarPagina").css("display",perfil_campo_control.strPermisoPopup);		
		jQuery("#tdperfil_campoCerrarPaginaToolBar").css("display",perfil_campo_control.strPermisoPopup);
		//jQuery("#trperfil_campoAccionesRelaciones").css("display",perfil_campo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfil Campos";
		sTituloBanner+=" - " + perfil_campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_campo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_campoRelacionesToolBar").css("display",perfil_campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_campo").css("display",perfil_campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_campo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_campo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_campo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_campo_webcontrol1.registrarEventosControles();
		
		if(perfil_campo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
			perfil_campo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_campo_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_campo_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_campo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_campo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(perfil_campo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(perfil_campo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
						//perfil_campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(perfil_campo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_campo_constante1.BIG_ID_ACTUAL,"perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);
						//perfil_campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			perfil_campo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_campo","seguridad","",perfil_campo_funcion1,perfil_campo_webcontrol1,perfil_campo_constante1);	
	}
}

var perfil_campo_webcontrol1 = new perfil_campo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_campo_webcontrol,perfil_campo_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_campo_webcontrol1 = perfil_campo_webcontrol1;


if(perfil_campo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_campo_webcontrol1.onLoadWindow; 
}

//</script>