//<script type="text/javascript" language="javascript">



//var perfil_usuarioJQueryPaginaWebInteraccion= function (perfil_usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_usuario_constante,perfil_usuario_constante1} from '../util/perfil_usuario_constante.js';

import {perfil_usuario_funcion,perfil_usuario_funcion1} from '../util/perfil_usuario_form_funcion.js';


class perfil_usuario_webcontrol extends GeneralEntityWebControl {
	
	perfil_usuario_control=null;
	perfil_usuario_controlInicial=null;
	perfil_usuario_controlAuxiliar=null;
		
	//if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_usuario_control) {
		super();
		
		this.perfil_usuario_control=perfil_usuario_control;
	}
		
	actualizarVariablesPagina(perfil_usuario_control) {
		
		if(perfil_usuario_control.action=="index" || perfil_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_usuario_control);
			
		} 
		
		
		
	
		else if(perfil_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_usuario_control);	
		
		} else if(perfil_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_usuario_control);		
		}
	
	
		
		
		else if(perfil_usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_usuario_control);
		
		} else if(perfil_usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_usuario_control);		
		
		} else if(perfil_usuario_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_usuario_control);		
		
		} 
		//else if(perfil_usuario_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_usuario_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_usuario_control) {
		this.actualizarPaginaAccionesGenerales(perfil_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_usuario_control);
		this.actualizarPaginaOrderBy(perfil_usuario_control);
		this.actualizarPaginaTablaDatos(perfil_usuario_control);
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_usuario_control);
		this.actualizarPaginaAreaBusquedas(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_usuario_control) {
		//this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_usuario_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(perfil_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(perfil_usuario_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_usuario_control);
		this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		this.actualizarPaginaFormulario(perfil_usuario_control);
		this.onLoadCombosDefectoFK(perfil_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_usuario_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_usuario_control) {
		//FORMULARIO
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);		
		
		//COMBOS FK
		if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_usuario_control) {
		//FORMULARIO
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);	
		
		//COMBOS FK
		if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_usuario_control) {
		//FORMULARIO
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control);	
		//COMBOS FK
		if(perfil_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_usuario_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_usuario_control) {
		
		if(perfil_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_usuario_control);
		}
		
		if(perfil_usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_usuario_control) {
		if(perfil_usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_usuarioReturnGeneral",JSON.stringify(perfil_usuario_control.perfil_usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_usuario_control) {
		if(perfil_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_usuario_control, mostrar) {
		
		if(mostrar==true) {
			perfil_usuario_funcion1.resaltarRestaurarDivsPagina(false,"perfil_usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_usuario");
			}			
			
			perfil_usuario_funcion1.mostrarDivMensaje(true,perfil_usuario_control.strAuxiliarMensaje,perfil_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_usuario_funcion1.mostrarDivMensaje(false,perfil_usuario_control.strAuxiliarMensaje,perfil_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_usuario_control) {
		if(perfil_usuario_funcion1.esPaginaForm(perfil_usuario_constante1)==true) {
			window.opener.perfil_usuario_webcontrol1.actualizarPaginaTablaDatos(perfil_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_usuario_control) {
		perfil_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_usuario_control.strAuxiliarUrlPagina);
				
		perfil_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_usuario_control.strAuxiliarTipo,perfil_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_usuario_control) {
		perfil_usuario_funcion1.resaltarRestaurarDivMensaje(true,perfil_usuario_control.strAuxiliarMensajeAlert,perfil_usuario_control.strAuxiliarCssMensaje);
			
		if(perfil_usuario_funcion1.esPaginaForm(perfil_usuario_constante1)==true) {
			window.opener.perfil_usuario_funcion1.resaltarRestaurarDivMensaje(true,perfil_usuario_control.strAuxiliarMensajeAlert,perfil_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_usuario_control) {
		this.perfil_usuario_controlInicial=perfil_usuario_control;
			
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_usuario_control.strStyleDivArbol,perfil_usuario_control.strStyleDivContent
																,perfil_usuario_control.strStyleDivOpcionesBanner,perfil_usuario_control.strStyleDivExpandirColapsar
																,perfil_usuario_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_usuario_control) {
		this.actualizarCssBotonesPagina(perfil_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_usuario_control.tiposReportes,perfil_usuario_control.tiposReporte
															 	,perfil_usuario_control.tiposPaginacion,perfil_usuario_control.tiposAcciones
																,perfil_usuario_control.tiposColumnasSelect,perfil_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_usuario_control) {
	
		var indexPosition=perfil_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.cargarCombosperfilsFK(perfil_usuario_control);
			}

			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.cargarCombosusuariosFK(perfil_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_usuario_control.strRecargarFkTiposNinguno!=null && perfil_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTiposNinguno,",")) { 
					perfil_usuario_webcontrol1.cargarCombosperfilsFK(perfil_usuario_control);
				}

				if(perfil_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTiposNinguno,",")) { 
					perfil_usuario_webcontrol1.cargarCombosusuariosFK(perfil_usuario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_usuario_funcion1,perfil_usuario_control.perfilsFK);
	}

	cargarComboEditarTablausuarioFK(perfil_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_usuario_funcion1,perfil_usuario_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(perfil_usuario_control) {
		jQuery("#tdperfil_usuarioNuevo").css("display",perfil_usuario_control.strPermisoNuevo);
		jQuery("#trperfil_usuarioElementos").css("display",perfil_usuario_control.strVisibleTablaElementos);
		jQuery("#trperfil_usuarioAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);
		jQuery("#trperfil_usuarioParametrosAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_usuario_control);
				
		if(perfil_usuario_control.perfil_usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_usuario_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_usuario_control) {
	
		jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id").val(perfil_usuario_control.perfil_usuarioActual.id);
		jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-version_row").val(perfil_usuario_control.perfil_usuarioActual.versionRow);
		
		if(perfil_usuario_control.perfil_usuarioActual.id_perfil!=null && perfil_usuario_control.perfil_usuarioActual.id_perfil>-1){
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_usuario_control.perfil_usuarioActual.id_perfil) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val(perfil_usuario_control.perfil_usuarioActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").select2("val", null);
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_usuario_control.perfil_usuarioActual.id_usuario!=null && perfil_usuario_control.perfil_usuarioActual.id_usuario>-1){
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != perfil_usuario_control.perfil_usuarioActual.id_usuario) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(perfil_usuario_control.perfil_usuarioActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_usuario_control.perfil_usuarioActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil_usuario","seguridad","","form_perfil_usuario",formulario,"","",paraEventoTabla,idFilaTabla,perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	actualizarSpanMensajesCampos(perfil_usuario_control) {
		jQuery("#spanstrMensajeid").text(perfil_usuario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_usuario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_perfil").text(perfil_usuario_control.strMensajeid_perfil);		
		jQuery("#spanstrMensajeid_usuario").text(perfil_usuario_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeestado").text(perfil_usuario_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_usuario_control) {
		jQuery("#tdbtnNuevoperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil_usuario").css("display",perfil_usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil_usuario").css("display",perfil_usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil_usuario").css("display",perfil_usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil_usuario").css("display",perfil_usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil_usuario").css("visibility",perfil_usuario_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil",perfil_usuario_control.perfilsFK);

		if(perfil_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_usuario_control.idFilaTablaActual+"_2",perfil_usuario_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_usuario_control.perfilsFK);

	};

	cargarCombosusuariosFK(perfil_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario",perfil_usuario_control.usuariosFK);

		if(perfil_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_usuario_control.idFilaTablaActual+"_3",perfil_usuario_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_usuario_control) {

	};

	registrarComboActionChangeCombosusuariosFK(perfil_usuario_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_usuario_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_usuario_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil").val(perfil_usuario_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_usuario_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_usuario_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(perfil_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val() != perfil_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario").val(perfil_usuario_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.setDefectoValorCombosperfilsFK(perfil_usuario_control);
			}

			if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 
				perfil_usuario_webcontrol1.setDefectoValorCombosusuariosFK(perfil_usuario_control);
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
	onLoadCombosEventosFK(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_usuario_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_usuario_control);
			//}

			//if(perfil_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",perfil_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(perfil_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(perfil_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_usuario_funcion1.validarFormularioJQuery(perfil_usuario_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_usuario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,"perfil_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_usuario_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_usuario_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				perfil_usuario_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_usuario_control) {
		
		
		
		if(perfil_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_usuarioActualizarToolBar").css("display",perfil_usuario_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdperfil_usuarioEliminarToolBar").css("display",perfil_usuario_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trperfil_usuarioElementos").css("display",perfil_usuario_control.strVisibleTablaElementos);
		
		jQuery("#trperfil_usuarioAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);
		jQuery("#trperfil_usuarioParametrosAcciones").css("display",perfil_usuario_control.strVisibleTablaAcciones);
		
		jQuery("#tdperfil_usuarioCerrarPagina").css("display",perfil_usuario_control.strPermisoPopup);		
		jQuery("#tdperfil_usuarioCerrarPaginaToolBar").css("display",perfil_usuario_control.strPermisoPopup);
		//jQuery("#trperfil_usuarioAccionesRelaciones").css("display",perfil_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Usuarios Perfiles s";
		sTituloBanner+=" - " + perfil_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_usuarioRelacionesToolBar").css("display",perfil_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_usuario").css("display",perfil_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_usuario_webcontrol1.registrarEventosControles();
		
		if(perfil_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
			perfil_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(perfil_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(perfil_usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
						//perfil_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(perfil_usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_usuario_constante1.BIG_ID_ACTUAL,"perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);
						//perfil_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			perfil_usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_usuario","seguridad","",perfil_usuario_funcion1,perfil_usuario_webcontrol1,perfil_usuario_constante1);	
	}
}

var perfil_usuario_webcontrol1 = new perfil_usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_usuario_webcontrol,perfil_usuario_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_usuario_webcontrol1 = perfil_usuario_webcontrol1;


if(perfil_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_usuario_webcontrol1.onLoadWindow; 
}

//</script>