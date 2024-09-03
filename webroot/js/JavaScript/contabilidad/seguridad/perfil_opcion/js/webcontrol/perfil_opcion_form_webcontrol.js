//<script type="text/javascript" language="javascript">



//var perfil_opcionJQueryPaginaWebInteraccion= function (perfil_opcion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_opcion_constante,perfil_opcion_constante1} from '../util/perfil_opcion_constante.js';

import {perfil_opcion_funcion,perfil_opcion_funcion1} from '../util/perfil_opcion_form_funcion.js';


class perfil_opcion_webcontrol extends GeneralEntityWebControl {
	
	perfil_opcion_control=null;
	perfil_opcion_controlInicial=null;
	perfil_opcion_controlAuxiliar=null;
		
	//if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_opcion_control) {
		super();
		
		this.perfil_opcion_control=perfil_opcion_control;
	}
		
	actualizarVariablesPagina(perfil_opcion_control) {
		
		if(perfil_opcion_control.action=="index" || perfil_opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_opcion_control);
			
		} 
		
		
		
	
		else if(perfil_opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_opcion_control);	
		
		} else if(perfil_opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_opcion_control);		
		}
	
	
		
		
		else if(perfil_opcion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_opcion_control);
		
		} else if(perfil_opcion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_opcion_control);		
		
		} else if(perfil_opcion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_opcion_control);		
		
		} 
		//else if(perfil_opcion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_opcion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_opcion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_opcion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_opcion_control) {
		this.actualizarPaginaAccionesGenerales(perfil_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_opcion_control);
		this.actualizarPaginaOrderBy(perfil_opcion_control);
		this.actualizarPaginaTablaDatos(perfil_opcion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_opcion_control);
		this.actualizarPaginaAreaBusquedas(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_opcion_control) {
		//this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_opcion_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(perfil_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(perfil_opcion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_opcion_control);
		this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		this.actualizarPaginaFormulario(perfil_opcion_control);
		this.onLoadCombosDefectoFK(perfil_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_opcion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_opcion_control) {
		//FORMULARIO
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_opcion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);		
		
		//COMBOS FK
		if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_opcion_control) {
		//FORMULARIO
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_opcion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);	
		
		//COMBOS FK
		if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_opcion_control) {
		//FORMULARIO
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_opcion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control);	
		//COMBOS FK
		if(perfil_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_opcion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_opcion_control) {
		
		if(perfil_opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_opcion_control);
		}
		
		if(perfil_opcion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_opcion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_opcion_control) {
		if(perfil_opcion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_opcionReturnGeneral",JSON.stringify(perfil_opcion_control.perfil_opcionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_opcion_control) {
		if(perfil_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_opcion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_opcion_control, mostrar) {
		
		if(mostrar==true) {
			perfil_opcion_funcion1.resaltarRestaurarDivsPagina(false,"perfil_opcion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_opcion_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_opcion");
			}			
			
			perfil_opcion_funcion1.mostrarDivMensaje(true,perfil_opcion_control.strAuxiliarMensaje,perfil_opcion_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_opcion_funcion1.mostrarDivMensaje(false,perfil_opcion_control.strAuxiliarMensaje,perfil_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_opcion_control) {
		if(perfil_opcion_funcion1.esPaginaForm(perfil_opcion_constante1)==true) {
			window.opener.perfil_opcion_webcontrol1.actualizarPaginaTablaDatos(perfil_opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_opcion_control) {
		perfil_opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_opcion_control.strAuxiliarUrlPagina);
				
		perfil_opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_opcion_control.strAuxiliarTipo,perfil_opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_opcion_control) {
		perfil_opcion_funcion1.resaltarRestaurarDivMensaje(true,perfil_opcion_control.strAuxiliarMensajeAlert,perfil_opcion_control.strAuxiliarCssMensaje);
			
		if(perfil_opcion_funcion1.esPaginaForm(perfil_opcion_constante1)==true) {
			window.opener.perfil_opcion_funcion1.resaltarRestaurarDivMensaje(true,perfil_opcion_control.strAuxiliarMensajeAlert,perfil_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_opcion_control) {
		this.perfil_opcion_controlInicial=perfil_opcion_control;
			
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_opcion_control.strStyleDivArbol,perfil_opcion_control.strStyleDivContent
																,perfil_opcion_control.strStyleDivOpcionesBanner,perfil_opcion_control.strStyleDivExpandirColapsar
																,perfil_opcion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_opcion_control) {
		this.actualizarCssBotonesPagina(perfil_opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_opcion_control.tiposReportes,perfil_opcion_control.tiposReporte
															 	,perfil_opcion_control.tiposPaginacion,perfil_opcion_control.tiposAcciones
																,perfil_opcion_control.tiposColumnasSelect,perfil_opcion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_opcion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_opcion_control) {
	
		var indexPosition=perfil_opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.cargarCombosperfilsFK(perfil_opcion_control);
			}

			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.cargarCombosopcionsFK(perfil_opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_opcion_control.strRecargarFkTiposNinguno!=null && perfil_opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_opcion_webcontrol1.cargarCombosperfilsFK(perfil_opcion_control);
				}

				if(perfil_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_opcion_webcontrol1.cargarCombosopcionsFK(perfil_opcion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_opcion_funcion1,perfil_opcion_control.perfilsFK);
	}

	cargarComboEditarTablaopcionFK(perfil_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_opcion_funcion1,perfil_opcion_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(perfil_opcion_control) {
		jQuery("#tdperfil_opcionNuevo").css("display",perfil_opcion_control.strPermisoNuevo);
		jQuery("#trperfil_opcionElementos").css("display",perfil_opcion_control.strVisibleTablaElementos);
		jQuery("#trperfil_opcionAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);
		jQuery("#trperfil_opcionParametrosAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_opcion_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_opcion_control);
				
		if(perfil_opcion_control.perfil_opcionActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_opcion_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_opcion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_opcion_control) {
	
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id").val(perfil_opcion_control.perfil_opcionActual.id);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-created_at").val(perfil_opcion_control.perfil_opcionActual.versionRow);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-updated_at").val(perfil_opcion_control.perfil_opcionActual.versionRow);
		
		if(perfil_opcion_control.perfil_opcionActual.id_perfil!=null && perfil_opcion_control.perfil_opcionActual.id_perfil>-1){
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_opcion_control.perfil_opcionActual.id_perfil) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_opcion_control.perfil_opcionActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").select2("val", null);
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_opcion_control.perfil_opcionActual.id_opcion!=null && perfil_opcion_control.perfil_opcionActual.id_opcion>-1){
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != perfil_opcion_control.perfil_opcionActual.id_opcion) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(perfil_opcion_control.perfil_opcionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").select2("val", null);
			if(jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-todo").prop('checked',perfil_opcion_control.perfil_opcionActual.todo);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-ingreso").prop('checked',perfil_opcion_control.perfil_opcionActual.ingreso);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-modificacion").prop('checked',perfil_opcion_control.perfil_opcionActual.modificacion);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-eliminacion").prop('checked',perfil_opcion_control.perfil_opcionActual.eliminacion);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-consulta").prop('checked',perfil_opcion_control.perfil_opcionActual.consulta);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-busqueda").prop('checked',perfil_opcion_control.perfil_opcionActual.busqueda);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-reporte").prop('checked',perfil_opcion_control.perfil_opcionActual.reporte);
		jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_opcion_control.perfil_opcionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_opcion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil_opcion","seguridad","","form_perfil_opcion",formulario,"","",paraEventoTabla,idFilaTabla,perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	actualizarSpanMensajesCampos(perfil_opcion_control) {
		jQuery("#spanstrMensajeid").text(perfil_opcion_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(perfil_opcion_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(perfil_opcion_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_perfil").text(perfil_opcion_control.strMensajeid_perfil);		
		jQuery("#spanstrMensajeid_opcion").text(perfil_opcion_control.strMensajeid_opcion);		
		jQuery("#spanstrMensajetodo").text(perfil_opcion_control.strMensajetodo);		
		jQuery("#spanstrMensajeingreso").text(perfil_opcion_control.strMensajeingreso);		
		jQuery("#spanstrMensajemodificacion").text(perfil_opcion_control.strMensajemodificacion);		
		jQuery("#spanstrMensajeeliminacion").text(perfil_opcion_control.strMensajeeliminacion);		
		jQuery("#spanstrMensajeconsulta").text(perfil_opcion_control.strMensajeconsulta);		
		jQuery("#spanstrMensajebusqueda").text(perfil_opcion_control.strMensajebusqueda);		
		jQuery("#spanstrMensajereporte").text(perfil_opcion_control.strMensajereporte);		
		jQuery("#spanstrMensajeestado").text(perfil_opcion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_opcion_control) {
		jQuery("#tdbtnNuevoperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil_opcion").css("display",perfil_opcion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil_opcion").css("display",perfil_opcion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil_opcion").css("display",perfil_opcion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil_opcion").css("display",perfil_opcion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil_opcion").css("visibility",perfil_opcion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil",perfil_opcion_control.perfilsFK);

		if(perfil_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_opcion_control.idFilaTablaActual+"_3",perfil_opcion_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil",perfil_opcion_control.perfilsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_opcion_control.perfilsFK);

	};

	cargarCombosopcionsFK(perfil_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion",perfil_opcion_control.opcionsFK);

		if(perfil_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_opcion_control.idFilaTablaActual+"_4",perfil_opcion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion",perfil_opcion_control.opcionsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",perfil_opcion_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_opcion_control) {

	};

	registrarComboActionChangeCombosopcionsFK(perfil_opcion_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_opcion_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_opcion_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_opcion_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val(perfil_opcion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_opcion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosopcionsFK(perfil_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_opcion_control.idopcionDefaultFK>-1 && jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val() != perfil_opcion_control.idopcionDefaultFK) {
				jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion").val(perfil_opcion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(perfil_opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"BusquedaPorIdPerfilPorIdOpcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(perfil_opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.setDefectoValorCombosperfilsFK(perfil_opcion_control);
			}

			if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 
				perfil_opcion_webcontrol1.setDefectoValorCombosopcionsFK(perfil_opcion_control);
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
	onLoadCombosEventosFK(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_opcion_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_opcion_control);
			//}

			//if(perfil_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",perfil_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_opcion_webcontrol1.registrarComboActionChangeCombosopcionsFK(perfil_opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_opcion_funcion1.validarFormularioJQuery(perfil_opcion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_opcion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_opcion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,"perfil_opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_opcion_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_opcion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				perfil_opcion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_opcion_control) {
		
		
		
		if(perfil_opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_opcionActualizarToolBar").css("display",perfil_opcion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdperfil_opcionEliminarToolBar").css("display",perfil_opcion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trperfil_opcionElementos").css("display",perfil_opcion_control.strVisibleTablaElementos);
		
		jQuery("#trperfil_opcionAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);
		jQuery("#trperfil_opcionParametrosAcciones").css("display",perfil_opcion_control.strVisibleTablaAcciones);
		
		jQuery("#tdperfil_opcionCerrarPagina").css("display",perfil_opcion_control.strPermisoPopup);		
		jQuery("#tdperfil_opcionCerrarPaginaToolBar").css("display",perfil_opcion_control.strPermisoPopup);
		//jQuery("#trperfil_opcionAccionesRelaciones").css("display",perfil_opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfil Opciones";
		sTituloBanner+=" - " + perfil_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_opcion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_opcionRelacionesToolBar").css("display",perfil_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_opcion").css("display",perfil_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_opcion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_opcion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_opcion_webcontrol1.registrarEventosControles();
		
		if(perfil_opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
			perfil_opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_opcion_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(perfil_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(perfil_opcion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
						//perfil_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(perfil_opcion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_opcion_constante1.BIG_ID_ACTUAL,"perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);
						//perfil_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			perfil_opcion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_opcion","seguridad","",perfil_opcion_funcion1,perfil_opcion_webcontrol1,perfil_opcion_constante1);	
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

var perfil_opcion_webcontrol1 = new perfil_opcion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_opcion_webcontrol,perfil_opcion_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_opcion_webcontrol1 = perfil_opcion_webcontrol1;


if(perfil_opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_opcion_webcontrol1.onLoadWindow; 
}

//</script>