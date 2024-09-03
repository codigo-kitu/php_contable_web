//<script type="text/javascript" language="javascript">



//var asiento_detalleJQueryPaginaWebInteraccion= function (asiento_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_detalle_constante,asiento_detalle_constante1} from '../util/asiento_detalle_constante.js';

import {asiento_detalle_funcion,asiento_detalle_funcion1} from '../util/asiento_detalle_form_funcion.js';


class asiento_detalle_webcontrol extends GeneralEntityWebControl {
	
	asiento_detalle_control=null;
	asiento_detalle_controlInicial=null;
	asiento_detalle_controlAuxiliar=null;
		
	//if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_detalle_control) {
		super();
		
		this.asiento_detalle_control=asiento_detalle_control;
	}
		
	actualizarVariablesPagina(asiento_detalle_control) {
		
		if(asiento_detalle_control.action=="index" || asiento_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_detalle_control);
			
		} 
		
		
		
	
		else if(asiento_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_detalle_control);	
		
		} else if(asiento_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_detalle_control);		
		}
	
	
		
		
		else if(asiento_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_detalle_control);
		
		} else if(asiento_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_detalle_control);		
		
		} else if(asiento_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_detalle_control);		
		
		} 
		//else if(asiento_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_detalle_control) {
		this.actualizarPaginaAccionesGenerales(asiento_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_detalle_control);
		this.actualizarPaginaOrderBy(asiento_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
		//this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_detalle_control) {
		//this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(asiento_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(asiento_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		this.actualizarPaginaFormulario(asiento_detalle_control);
		this.onLoadCombosDefectoFK(asiento_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_detalle_control) {
		//FORMULARIO
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);		
		
		//COMBOS FK
		if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_detalle_control) {
		//FORMULARIO
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);	
		
		//COMBOS FK
		if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_detalle_control) {
		//FORMULARIO
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control);	
		//COMBOS FK
		if(asiento_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_detalle_control) {
		
		if(asiento_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_detalle_control);
		}
		
		if(asiento_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_detalle_control) {
		if(asiento_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asiento_detalleReturnGeneral",JSON.stringify(asiento_detalle_control.asiento_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_detalle_control) {
		if(asiento_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_detalle_control, mostrar) {
		
		if(mostrar==true) {
			asiento_detalle_funcion1.resaltarRestaurarDivsPagina(false,"asiento_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento_detalle");
			}			
			
			asiento_detalle_funcion1.mostrarDivMensaje(true,asiento_detalle_control.strAuxiliarMensaje,asiento_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_detalle_funcion1.mostrarDivMensaje(false,asiento_detalle_control.strAuxiliarMensaje,asiento_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_detalle_control) {
		if(asiento_detalle_funcion1.esPaginaForm(asiento_detalle_constante1)==true) {
			window.opener.asiento_detalle_webcontrol1.actualizarPaginaTablaDatos(asiento_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_detalle_control) {
		asiento_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_detalle_control.strAuxiliarUrlPagina);
				
		asiento_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_detalle_control.strAuxiliarTipo,asiento_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_detalle_control) {
		asiento_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_detalle_control.strAuxiliarMensajeAlert,asiento_detalle_control.strAuxiliarCssMensaje);
			
		if(asiento_detalle_funcion1.esPaginaForm(asiento_detalle_constante1)==true) {
			window.opener.asiento_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_detalle_control.strAuxiliarMensajeAlert,asiento_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_detalle_control) {
		this.asiento_detalle_controlInicial=asiento_detalle_control;
			
		if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_detalle_control.strStyleDivArbol,asiento_detalle_control.strStyleDivContent
																,asiento_detalle_control.strStyleDivOpcionesBanner,asiento_detalle_control.strStyleDivExpandirColapsar
																,asiento_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_detalle_control) {
		this.actualizarCssBotonesPagina(asiento_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_detalle_control.tiposReportes,asiento_detalle_control.tiposReporte
															 	,asiento_detalle_control.tiposPaginacion,asiento_detalle_control.tiposAcciones
																,asiento_detalle_control.tiposColumnasSelect,asiento_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_detalle_control) {
	
		var indexPosition=asiento_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosempresasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombossucursalsFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosejerciciosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosperiodosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosusuariosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarCombosasientosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarComboscuentasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_detalle_control.strRecargarFkTiposNinguno!=null && asiento_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosempresasFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombossucursalsFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosejerciciosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosperiodosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosusuariosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarCombosasientosFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarComboscuentasFK(asiento_detalle_control);
				}

				if(asiento_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.usuariosFK);
	}

	cargarComboEditarTablaasientoFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.asientosFK);
	}

	cargarComboEditarTablacuentaFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.cuentasFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_detalle_funcion1,asiento_detalle_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(asiento_detalle_control) {
		jQuery("#tdasiento_detalleNuevo").css("display",asiento_detalle_control.strPermisoNuevo);
		jQuery("#trasiento_detalleElementos").css("display",asiento_detalle_control.strVisibleTablaElementos);
		jQuery("#trasiento_detalleAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_detalleParametrosAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_detalle_control);
				
		if(asiento_detalle_control.asiento_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_detalle_control) {
	
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id").val(asiento_detalle_control.asiento_detalleActual.id);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-version_row").val(asiento_detalle_control.asiento_detalleActual.versionRow);
		
		if(asiento_detalle_control.asiento_detalleActual.id_empresa!=null && asiento_detalle_control.asiento_detalleActual.id_empresa>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_detalle_control.asiento_detalleActual.id_empresa) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_detalle_control.asiento_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_sucursal!=null && asiento_detalle_control.asiento_detalleActual.id_sucursal>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_detalle_control.asiento_detalleActual.id_sucursal) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_detalle_control.asiento_detalleActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_ejercicio!=null && asiento_detalle_control.asiento_detalleActual.id_ejercicio>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_detalle_control.asiento_detalleActual.id_ejercicio) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_detalle_control.asiento_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_periodo!=null && asiento_detalle_control.asiento_detalleActual.id_periodo>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_detalle_control.asiento_detalleActual.id_periodo) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val(asiento_detalle_control.asiento_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_usuario!=null && asiento_detalle_control.asiento_detalleActual.id_usuario>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_detalle_control.asiento_detalleActual.id_usuario) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val(asiento_detalle_control.asiento_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_asiento!=null && asiento_detalle_control.asiento_detalleActual.id_asiento>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != asiento_detalle_control.asiento_detalleActual.id_asiento) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val(asiento_detalle_control.asiento_detalleActual.id_asiento).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_cuenta!=null && asiento_detalle_control.asiento_detalleActual.id_cuenta>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_detalle_control.asiento_detalleActual.id_cuenta) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_detalle_control.asiento_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_detalle_control.asiento_detalleActual.id_centro_costo!=null && asiento_detalle_control.asiento_detalleActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_detalle_control.asiento_detalleActual.id_centro_costo) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_detalle_control.asiento_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-orden").val(asiento_detalle_control.asiento_detalleActual.orden);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-debito").val(asiento_detalle_control.asiento_detalleActual.debito);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-credito").val(asiento_detalle_control.asiento_detalleActual.credito);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-valor_base").val(asiento_detalle_control.asiento_detalleActual.valor_base);
		jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-cuenta_contable").val(asiento_detalle_control.asiento_detalleActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_detalle","contabilidad","","form_asiento_detalle",formulario,"","",paraEventoTabla,idFilaTabla,asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(asiento_detalle_control) {
		jQuery("#spanstrMensajeid").text(asiento_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(asiento_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_detalle_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(asiento_detalle_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(asiento_detalle_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(asiento_detalle_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(asiento_detalle_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_asiento").text(asiento_detalle_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_cuenta").text(asiento_detalle_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_detalle_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajeorden").text(asiento_detalle_control.strMensajeorden);		
		jQuery("#spanstrMensajedebito").text(asiento_detalle_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(asiento_detalle_control.strMensajecredito);		
		jQuery("#spanstrMensajevalor_base").text(asiento_detalle_control.strMensajevalor_base);		
		jQuery("#spanstrMensajecuenta_contable").text(asiento_detalle_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_detalle_control) {
		jQuery("#tdbtnNuevoasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_detalle").css("display",asiento_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_detalle").css("display",asiento_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_detalle").css("display",asiento_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_detalle").css("display",asiento_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_detalle").css("visibility",asiento_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa",asiento_detalle_control.empresasFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_2",asiento_detalle_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal",asiento_detalle_control.sucursalsFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_3",asiento_detalle_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio",asiento_detalle_control.ejerciciosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_4",asiento_detalle_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo",asiento_detalle_control.periodosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_5",asiento_detalle_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario",asiento_detalle_control.usuariosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_6",asiento_detalle_control.usuariosFK);
		}
	};

	cargarCombosasientosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento",asiento_detalle_control.asientosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_7",asiento_detalle_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",asiento_detalle_control.asientosFK);

	};

	cargarComboscuentasFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta",asiento_detalle_control.cuentasFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_8",asiento_detalle_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",asiento_detalle_control.cuentasFK);

	};

	cargarComboscentro_costosFK(asiento_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo",asiento_detalle_control.centro_costosFK);

		if(asiento_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_detalle_control.idFilaTablaActual+"_9",asiento_detalle_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_detalle_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombossucursalsFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosperiodosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosusuariosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeCombosasientosFK(asiento_detalle_control) {

	};

	registrarComboActionChangeComboscuentasFK(asiento_detalle_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idsucursalDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_detalle_control.idsucursalDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_detalle_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idejercicioDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_detalle_control.idejercicioDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_detalle_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idperiodoDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_detalle_control.idperiodoDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo").val(asiento_detalle_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idusuarioDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_detalle_control.idusuarioDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario").val(asiento_detalle_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idasientoDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != asiento_detalle_control.idasientoDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento").val(asiento_detalle_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(asiento_detalle_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idcuentaDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_detalle_control.idcuentaDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_detalle_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(asiento_detalle_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_detalle_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_detalle_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_detalle_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_detalle_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosempresasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombossucursalsFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosejerciciosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosperiodosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosusuariosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorCombosasientosFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorComboscuentasFK(asiento_detalle_control);
			}

			if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTipos,",")) { 
				asiento_detalle_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_detalle_control);
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
	onLoadCombosEventosFK(asiento_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombossucursalsFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosejerciciosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosperiodosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosusuariosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeCombosasientosFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeComboscuentasFK(asiento_detalle_control);
			//}

			//if(asiento_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_detalle_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(asiento_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_detalle_funcion1.validarFormularioJQuery(asiento_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(asiento_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,"asiento_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_detalle_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_detalle_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_detalle_control) {
		
		
		
		if(asiento_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_detalleActualizarToolBar").css("display",asiento_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdasiento_detalleEliminarToolBar").css("display",asiento_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trasiento_detalleElementos").css("display",asiento_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_detalleAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_detalleParametrosAcciones").css("display",asiento_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdasiento_detalleCerrarPagina").css("display",asiento_detalle_control.strPermisoPopup);		
		jQuery("#tdasiento_detalleCerrarPaginaToolBar").css("display",asiento_detalle_control.strPermisoPopup);
		//jQuery("#trasiento_detalleAccionesRelaciones").css("display",asiento_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Detalle Asientoes";
		sTituloBanner+=" - " + asiento_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasiento_detalleRelacionesToolBar").css("display",asiento_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento_detalle").css("display",asiento_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_detalle_webcontrol1.registrarEventosControles();
		
		if(asiento_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
			asiento_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(asiento_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(asiento_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
						//asiento_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(asiento_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_detalle_constante1.BIG_ID_ACTUAL,"asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);
						//asiento_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			asiento_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_detalle","contabilidad","",asiento_detalle_funcion1,asiento_detalle_webcontrol1,asiento_detalle_constante1);	
	}
}

var asiento_detalle_webcontrol1 = new asiento_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_detalle_webcontrol,asiento_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_detalle_webcontrol1 = asiento_detalle_webcontrol1;


if(asiento_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_detalle_webcontrol1.onLoadWindow; 
}

//</script>