//<script type="text/javascript" language="javascript">



//var moduloJQueryPaginaWebInteraccion= function (modulo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {modulo_constante,modulo_constante1} from '../util/modulo_constante.js';

import {modulo_funcion,modulo_funcion1} from '../util/modulo_form_funcion.js';


class modulo_webcontrol extends GeneralEntityWebControl {
	
	modulo_control=null;
	modulo_controlInicial=null;
	modulo_controlAuxiliar=null;
		
	//if(modulo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(modulo_control) {
		super();
		
		this.modulo_control=modulo_control;
	}
		
	actualizarVariablesPagina(modulo_control) {
		
		if(modulo_control.action=="index" || modulo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(modulo_control);
			
		} 
		
		
		
	
		else if(modulo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(modulo_control);	
		
		} else if(modulo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(modulo_control);		
		}
	
	
		
		
		else if(modulo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(modulo_control);
		
		} else if(modulo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(modulo_control);
		
		} else if(modulo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(modulo_control);
		
		} else if(modulo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(modulo_control);
		
		} else if(modulo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(modulo_control);
		
		} else if(modulo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(modulo_control);		
		
		} else if(modulo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(modulo_control);		
		
		} 
		//else if(modulo_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(modulo_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + modulo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(modulo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(modulo_control) {
		this.actualizarPaginaAccionesGenerales(modulo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(modulo_control) {
		
		this.actualizarPaginaCargaGeneral(modulo_control);
		this.actualizarPaginaOrderBy(modulo_control);
		this.actualizarPaginaTablaDatos(modulo_control);
		this.actualizarPaginaCargaGeneralControles(modulo_control);
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(modulo_control);
		this.actualizarPaginaAreaBusquedas(modulo_control);
		this.actualizarPaginaCargaCombosFK(modulo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(modulo_control) {
		//this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(modulo_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(modulo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(modulo_control);		
		this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(modulo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(modulo_control);		
		this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(modulo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(modulo_control);		
		this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(modulo_control) {
		this.actualizarPaginaCargaGeneralControles(modulo_control);
		this.actualizarPaginaCargaCombosFK(modulo_control);
		this.actualizarPaginaFormulario(modulo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(modulo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(modulo_control) {
		this.actualizarPaginaCargaGeneralControles(modulo_control);
		this.actualizarPaginaCargaCombosFK(modulo_control);
		this.actualizarPaginaFormulario(modulo_control);
		this.onLoadCombosDefectoFK(modulo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		this.actualizarPaginaAreaMantenimiento(modulo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(modulo_control) {
		//FORMULARIO
		if(modulo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(modulo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(modulo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);		
		
		//COMBOS FK
		if(modulo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(modulo_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(modulo_control) {
		//FORMULARIO
		if(modulo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(modulo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(modulo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);	
		
		//COMBOS FK
		if(modulo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(modulo_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(modulo_control) {
		//FORMULARIO
		if(modulo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(modulo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(modulo_control);	
		//COMBOS FK
		if(modulo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(modulo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(modulo_control) {
		
		if(modulo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(modulo_control);
		}
		
		if(modulo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(modulo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(modulo_control) {
		if(modulo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("moduloReturnGeneral",JSON.stringify(modulo_control.moduloReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(modulo_control) {
		if(modulo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && modulo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(modulo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(modulo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(modulo_control, mostrar) {
		
		if(mostrar==true) {
			modulo_funcion1.resaltarRestaurarDivsPagina(false,"modulo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				modulo_funcion1.resaltarRestaurarDivMantenimiento(false,"modulo");
			}			
			
			modulo_funcion1.mostrarDivMensaje(true,modulo_control.strAuxiliarMensaje,modulo_control.strAuxiliarCssMensaje);
		
		} else {
			modulo_funcion1.mostrarDivMensaje(false,modulo_control.strAuxiliarMensaje,modulo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(modulo_control) {
		if(modulo_funcion1.esPaginaForm(modulo_constante1)==true) {
			window.opener.modulo_webcontrol1.actualizarPaginaTablaDatos(modulo_control);
		} else {
			this.actualizarPaginaTablaDatos(modulo_control);
		}
	}
	
	actualizarPaginaAbrirLink(modulo_control) {
		modulo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(modulo_control.strAuxiliarUrlPagina);
				
		modulo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(modulo_control.strAuxiliarTipo,modulo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(modulo_control) {
		modulo_funcion1.resaltarRestaurarDivMensaje(true,modulo_control.strAuxiliarMensajeAlert,modulo_control.strAuxiliarCssMensaje);
			
		if(modulo_funcion1.esPaginaForm(modulo_constante1)==true) {
			window.opener.modulo_funcion1.resaltarRestaurarDivMensaje(true,modulo_control.strAuxiliarMensajeAlert,modulo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(modulo_control) {
		this.modulo_controlInicial=modulo_control;
			
		if(modulo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(modulo_control.strStyleDivArbol,modulo_control.strStyleDivContent
																,modulo_control.strStyleDivOpcionesBanner,modulo_control.strStyleDivExpandirColapsar
																,modulo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(modulo_control) {
		this.actualizarCssBotonesPagina(modulo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(modulo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(modulo_control.tiposReportes,modulo_control.tiposReporte
															 	,modulo_control.tiposPaginacion,modulo_control.tiposAcciones
																,modulo_control.tiposColumnasSelect,modulo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(modulo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(modulo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(modulo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(modulo_control) {
	
		var indexPosition=modulo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=modulo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(modulo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.cargarCombossistemasFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.cargarCombospaquetesFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.cargarCombostipo_tecla_mascarasFK(modulo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(modulo_control.strRecargarFkTiposNinguno!=null && modulo_control.strRecargarFkTiposNinguno!='NINGUNO' && modulo_control.strRecargarFkTiposNinguno!='') {
			
				if(modulo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTiposNinguno,",")) { 
					modulo_webcontrol1.cargarCombossistemasFK(modulo_control);
				}

				if(modulo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTiposNinguno,",")) { 
					modulo_webcontrol1.cargarCombospaquetesFK(modulo_control);
				}

				if(modulo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTiposNinguno,",")) { 
					modulo_webcontrol1.cargarCombostipo_tecla_mascarasFK(modulo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_sistema") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+modulo_constante1.STR_SUFIJO+"-id_sistema" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.moduloActual.id_paquete!=null){
					if(jQuery("#form-id_paquete").val() != objetoController.moduloActual.id_paquete) {
						jQuery("#form-id_paquete").val(objetoController.moduloActual.id_paquete).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(modulo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,modulo_funcion1,modulo_control.sistemasFK);
	}

	cargarComboEditarTablapaqueteFK(modulo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,modulo_funcion1,modulo_control.paquetesFK);
	}

	cargarComboEditarTablatipo_tecla_mascaraFK(modulo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,modulo_funcion1,modulo_control.tipo_tecla_mascarasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(modulo_control) {
		jQuery("#tdmoduloNuevo").css("display",modulo_control.strPermisoNuevo);
		jQuery("#trmoduloElementos").css("display",modulo_control.strVisibleTablaElementos);
		jQuery("#trmoduloAcciones").css("display",modulo_control.strVisibleTablaAcciones);
		jQuery("#trmoduloParametrosAcciones").css("display",modulo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(modulo_control) {
	
		this.actualizarCssBotonesMantenimiento(modulo_control);
				
		if(modulo_control.moduloActual!=null) {//form
			
			this.actualizarCamposFormulario(modulo_control);			
		}
						
		this.actualizarSpanMensajesCampos(modulo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(modulo_control) {
	
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id").val(modulo_control.moduloActual.id);
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-created_at").val(modulo_control.moduloActual.versionRow);
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-updated_at").val(modulo_control.moduloActual.versionRow);
		
		if(modulo_control.moduloActual.id_sistema!=null && modulo_control.moduloActual.id_sistema>-1){
			if(jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val() != modulo_control.moduloActual.id_sistema) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val(modulo_control.moduloActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").select2("val", null);
			if(jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(modulo_control.moduloActual.id_paquete!=null && modulo_control.moduloActual.id_paquete>-1){
			if(jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val() != modulo_control.moduloActual.id_paquete) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val(modulo_control.moduloActual.id_paquete).trigger("change");
			}
		} else { 
			//jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").select2("val", null);
			if(jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-codigo").val(modulo_control.moduloActual.codigo);
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-nombre").val(modulo_control.moduloActual.nombre);
		
		if(modulo_control.moduloActual.id_tipo_tecla_mascara!=null && modulo_control.moduloActual.id_tipo_tecla_mascara>-1){
			if(jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val() != modulo_control.moduloActual.id_tipo_tecla_mascara) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val(modulo_control.moduloActual.id_tipo_tecla_mascara).trigger("change");
			}
		} else { 
			//jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").select2("val", null);
			if(jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-tecla").val(modulo_control.moduloActual.tecla);
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-estado").prop('checked',modulo_control.moduloActual.estado);
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-orden").val(modulo_control.moduloActual.orden);
		jQuery("#form"+modulo_constante1.STR_SUFIJO+"-descripcion").val(modulo_control.moduloActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+modulo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("modulo","seguridad","","form_modulo",formulario,"","",paraEventoTabla,idFilaTabla,modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}
	
	actualizarSpanMensajesCampos(modulo_control) {
		jQuery("#spanstrMensajeid").text(modulo_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(modulo_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(modulo_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_sistema").text(modulo_control.strMensajeid_sistema);		
		jQuery("#spanstrMensajeid_paquete").text(modulo_control.strMensajeid_paquete);		
		jQuery("#spanstrMensajecodigo").text(modulo_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(modulo_control.strMensajenombre);		
		jQuery("#spanstrMensajeid_tipo_tecla_mascara").text(modulo_control.strMensajeid_tipo_tecla_mascara);		
		jQuery("#spanstrMensajetecla").text(modulo_control.strMensajetecla);		
		jQuery("#spanstrMensajeestado").text(modulo_control.strMensajeestado);		
		jQuery("#spanstrMensajeorden").text(modulo_control.strMensajeorden);		
		jQuery("#spanstrMensajedescripcion").text(modulo_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(modulo_control) {
		jQuery("#tdbtnNuevomodulo").css("visibility",modulo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevomodulo").css("display",modulo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarmodulo").css("visibility",modulo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarmodulo").css("display",modulo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarmodulo").css("visibility",modulo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarmodulo").css("display",modulo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarmodulo").css("visibility",modulo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosmodulo").css("visibility",modulo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosmodulo").css("display",modulo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarmodulo").css("visibility",modulo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarmodulo").css("visibility",modulo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarmodulo").css("visibility",modulo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(modulo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema",modulo_control.sistemasFK);

		if(modulo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+modulo_control.idFilaTablaActual+"_3",modulo_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",modulo_control.sistemasFK);

	};

	cargarCombospaquetesFK(modulo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete",modulo_control.paquetesFK);

		if(modulo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+modulo_control.idFilaTablaActual+"_4",modulo_control.paquetesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete",modulo_control.paquetesFK);

	};

	cargarCombostipo_tecla_mascarasFK(modulo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara",modulo_control.tipo_tecla_mascarasFK);

		if(modulo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+modulo_control.idFilaTablaActual+"_7",modulo_control.tipo_tecla_mascarasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara",modulo_control.tipo_tecla_mascarasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(modulo_control) {
		this.registrarComboActionChangeid_sistema("form"+modulo_constante1.STR_SUFIJO+"-id_sistema",false,0);


		this.registrarComboActionChangeid_sistema(""+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",false,0);


	};

	registrarComboActionChangeCombospaquetesFK(modulo_control) {

	};

	registrarComboActionChangeCombostipo_tecla_mascarasFK(modulo_control) {

	};

	
	
	setDefectoValorCombossistemasFK(modulo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(modulo_control.idsistemaDefaultFK>-1 && jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val() != modulo_control.idsistemaDefaultFK) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema").val(modulo_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(modulo_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaquetesFK(modulo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(modulo_control.idpaqueteDefaultFK>-1 && jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val() != modulo_control.idpaqueteDefaultFK) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete").val(modulo_control.idpaqueteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete").val(modulo_control.idpaqueteDefaultForeignKey).trigger("change");
			if(jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idpaquete-cmbid_paquete").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_tecla_mascarasFK(modulo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(modulo_control.idtipo_tecla_mascaraDefaultFK>-1 && jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val() != modulo_control.idtipo_tecla_mascaraDefaultFK) {
				jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara").val(modulo_control.idtipo_tecla_mascaraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara").val(modulo_control.idtipo_tecla_mascaraDefaultForeignKey).trigger("change");
			if(jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+modulo_constante1.STR_SUFIJO+"FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_sistema(id_sistema,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("modulo","seguridad","","id_sistema",id_sistema,"id_paquete","",paraEventoTabla,idFilaTabla,modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	



	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//modulo_control
		
	
	}
	
	onLoadCombosDefectoFK(modulo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(modulo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.setDefectoValorCombossistemasFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.setDefectoValorCombospaquetesFK(modulo_control);
			}

			if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTipos,",")) { 
				modulo_webcontrol1.setDefectoValorCombostipo_tecla_mascarasFK(modulo_control);
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
	onLoadCombosEventosFK(modulo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(modulo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",modulo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				modulo_webcontrol1.registrarComboActionChangeCombossistemasFK(modulo_control);
			//}

			//if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_paquete",modulo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				modulo_webcontrol1.registrarComboActionChangeCombospaquetesFK(modulo_control);
			//}

			//if(modulo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_tecla_mascara",modulo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				modulo_webcontrol1.registrarComboActionChangeCombostipo_tecla_mascarasFK(modulo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(modulo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(modulo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(modulo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(modulo_constante1.BIT_ES_PAGINA_FORM==true) {
				modulo_funcion1.validarFormularioJQuery(modulo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("modulo");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("modulo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(modulo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,"modulo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				modulo_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("paquete","id_paquete","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_paquete_img_busqueda").click(function(){
				modulo_webcontrol1.abrirBusquedaParapaquete("id_paquete");
				//alert(jQuery('#form-id_paquete_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_tecla_mascara","id_tipo_tecla_mascara","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+modulo_constante1.STR_SUFIJO+"-id_tipo_tecla_mascara_img_busqueda").click(function(){
				modulo_webcontrol1.abrirBusquedaParatipo_tecla_mascara("id_tipo_tecla_mascara");
				//alert(jQuery('#form-id_tipo_tecla_mascara_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(modulo_control) {
		
		
		
		if(modulo_control.strPermisoActualizar!=null) {
			jQuery("#tdmoduloActualizarToolBar").css("display",modulo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdmoduloEliminarToolBar").css("display",modulo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trmoduloElementos").css("display",modulo_control.strVisibleTablaElementos);
		
		jQuery("#trmoduloAcciones").css("display",modulo_control.strVisibleTablaAcciones);
		jQuery("#trmoduloParametrosAcciones").css("display",modulo_control.strVisibleTablaAcciones);
		
		jQuery("#tdmoduloCerrarPagina").css("display",modulo_control.strPermisoPopup);		
		jQuery("#tdmoduloCerrarPaginaToolBar").css("display",modulo_control.strPermisoPopup);
		//jQuery("#trmoduloAccionesRelaciones").css("display",modulo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=modulo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + modulo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + modulo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Modulos";
		sTituloBanner+=" - " + modulo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + modulo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdmoduloRelacionesToolBar").css("display",modulo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosmodulo").css("display",modulo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		modulo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		modulo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		modulo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		modulo_webcontrol1.registrarEventosControles();
		
		if(modulo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(modulo_constante1.STR_ES_RELACIONADO=="false") {
			modulo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(modulo_constante1.STR_ES_RELACIONES=="true") {
			if(modulo_constante1.BIT_ES_PAGINA_FORM==true) {
				modulo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(modulo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(modulo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(modulo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(modulo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
						//modulo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(modulo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(modulo_constante1.BIG_ID_ACTUAL,"modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);
						//modulo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			modulo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("modulo","seguridad","",modulo_funcion1,modulo_webcontrol1,modulo_constante1);	
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

var modulo_webcontrol1 = new modulo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {modulo_webcontrol,modulo_webcontrol1};

//Para ser llamado desde window.opener
window.modulo_webcontrol1 = modulo_webcontrol1;


if(modulo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = modulo_webcontrol1.onLoadWindow; 
}

//</script>