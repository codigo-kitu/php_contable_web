//<script type="text/javascript" language="javascript">



//var cuenta_cobrar_detalleJQueryPaginaWebInteraccion= function (cuenta_cobrar_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_cobrar_detalle_constante,cuenta_cobrar_detalle_constante1} from '../util/cuenta_cobrar_detalle_constante.js';

import {cuenta_cobrar_detalle_funcion,cuenta_cobrar_detalle_funcion1} from '../util/cuenta_cobrar_detalle_form_funcion.js';


class cuenta_cobrar_detalle_webcontrol extends GeneralEntityWebControl {
	
	cuenta_cobrar_detalle_control=null;
	cuenta_cobrar_detalle_controlInicial=null;
	cuenta_cobrar_detalle_controlAuxiliar=null;
		
	//if(cuenta_cobrar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_cobrar_detalle_control) {
		super();
		
		this.cuenta_cobrar_detalle_control=cuenta_cobrar_detalle_control;
	}
		
	actualizarVariablesPagina(cuenta_cobrar_detalle_control) {
		
		if(cuenta_cobrar_detalle_control.action=="index" || cuenta_cobrar_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_cobrar_detalle_control);
			
		} 
		
		
		
	
		else if(cuenta_cobrar_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_cobrar_detalle_control);	
		
		} else if(cuenta_cobrar_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_cobrar_detalle_control);		
		}
	
	
		
		
		else if(cuenta_cobrar_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_cobrar_detalle_control);
		
		} else if(cuenta_cobrar_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_cobrar_detalle_control);
		
		} else if(cuenta_cobrar_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_cobrar_detalle_control);
		
		} else if(cuenta_cobrar_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_cobrar_detalle_control);
		
		} else if(cuenta_cobrar_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_cobrar_detalle_control);
		
		} else if(cuenta_cobrar_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_cobrar_detalle_control);		
		
		} else if(cuenta_cobrar_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_cobrar_detalle_control);		
		
		} 
		//else if(cuenta_cobrar_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_cobrar_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_cobrar_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_cobrar_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_cobrar_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_cobrar_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_cobrar_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_cobrar_detalle_control);
		this.actualizarPaginaOrderBy(cuenta_cobrar_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_cobrar_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_cobrar_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_cobrar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_cobrar_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_cobrar_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(cuenta_cobrar_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_cobrar_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_cobrar_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_cobrar_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cuenta_cobrar_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_cobrar_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_detalle_control);
		this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_cobrar_detalle_control) {
		//FORMULARIO
		if(cuenta_cobrar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_cobrar_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);		
		
		//COMBOS FK
		if(cuenta_cobrar_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_cobrar_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_cobrar_detalle_control) {
		//FORMULARIO
		if(cuenta_cobrar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_cobrar_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);	
		
		//COMBOS FK
		if(cuenta_cobrar_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_cobrar_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_cobrar_detalle_control) {
		//FORMULARIO
		if(cuenta_cobrar_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_cobrar_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control);	
		//COMBOS FK
		if(cuenta_cobrar_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_cobrar_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_cobrar_detalle_control) {
		
		if(cuenta_cobrar_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_cobrar_detalle_control);
		}
		
		if(cuenta_cobrar_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_cobrar_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_cobrar_detalle_control) {
		if(cuenta_cobrar_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_cobrar_detalleReturnGeneral",JSON.stringify(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_detalle_control) {
		if(cuenta_cobrar_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_cobrar_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_cobrar_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_cobrar_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_cobrar_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_cobrar_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_cobrar_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_cobrar_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_cobrar_detalle");
			}			
			
			cuenta_cobrar_detalle_funcion1.mostrarDivMensaje(true,cuenta_cobrar_detalle_control.strAuxiliarMensaje,cuenta_cobrar_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_cobrar_detalle_funcion1.mostrarDivMensaje(false,cuenta_cobrar_detalle_control.strAuxiliarMensaje,cuenta_cobrar_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_detalle_control) {
		if(cuenta_cobrar_detalle_funcion1.esPaginaForm(cuenta_cobrar_detalle_constante1)==true) {
			window.opener.cuenta_cobrar_detalle_webcontrol1.actualizarPaginaTablaDatos(cuenta_cobrar_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_cobrar_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_cobrar_detalle_control) {
		cuenta_cobrar_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_cobrar_detalle_control.strAuxiliarUrlPagina);
				
		cuenta_cobrar_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_cobrar_detalle_control.strAuxiliarTipo,cuenta_cobrar_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_cobrar_detalle_control) {
		cuenta_cobrar_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_cobrar_detalle_control.strAuxiliarMensajeAlert,cuenta_cobrar_detalle_control.strAuxiliarCssMensaje);
			
		if(cuenta_cobrar_detalle_funcion1.esPaginaForm(cuenta_cobrar_detalle_constante1)==true) {
			window.opener.cuenta_cobrar_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_cobrar_detalle_control.strAuxiliarMensajeAlert,cuenta_cobrar_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_cobrar_detalle_control) {
		this.cuenta_cobrar_detalle_controlInicial=cuenta_cobrar_detalle_control;
			
		if(cuenta_cobrar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_cobrar_detalle_control.strStyleDivArbol,cuenta_cobrar_detalle_control.strStyleDivContent
																,cuenta_cobrar_detalle_control.strStyleDivOpcionesBanner,cuenta_cobrar_detalle_control.strStyleDivExpandirColapsar
																,cuenta_cobrar_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_cobrar_detalle_control) {
		this.actualizarCssBotonesPagina(cuenta_cobrar_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_cobrar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_cobrar_detalle_control.tiposReportes,cuenta_cobrar_detalle_control.tiposReporte
															 	,cuenta_cobrar_detalle_control.tiposPaginacion,cuenta_cobrar_detalle_control.tiposAcciones
																,cuenta_cobrar_detalle_control.tiposColumnasSelect,cuenta_cobrar_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_cobrar_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_cobrar_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_cobrar_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_cobrar_detalle_control) {
	
		var indexPosition=cuenta_cobrar_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_cobrar_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_cobrar_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.cargarCombosempresasFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.cargarCombossucursalsFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.cargarComboscuenta_cobrarsFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.cargarCombosestadosFK(cuenta_cobrar_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!=null && cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_detalle_webcontrol1.cargarCombosempresasFK(cuenta_cobrar_detalle_control);
				}

				if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_detalle_webcontrol1.cargarCombossucursalsFK(cuenta_cobrar_detalle_control);
				}

				if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_cobrar_detalle_control);
				}

				if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_cobrar_detalle_control);
				}

				if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_cobrar_detalle_control);
				}

				if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_detalle_webcontrol1.cargarComboscuenta_cobrarsFK(cuenta_cobrar_detalle_control);
				}

				if(cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",cuenta_cobrar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_detalle_webcontrol1.cargarCombosestadosFK(cuenta_cobrar_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_cobrar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cuenta_cobrar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_cobrar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_cobrar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_cobrar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(cuenta_cobrar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_control.cuenta_cobrarsFK);
	}

	cargarComboEditarTablaestadoFK(cuenta_cobrar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cuenta_cobrar_detalle_control) {
		jQuery("#tdcuenta_cobrar_detalleNuevo").css("display",cuenta_cobrar_detalle_control.strPermisoNuevo);
		jQuery("#trcuenta_cobrar_detalleElementos").css("display",cuenta_cobrar_detalle_control.strVisibleTablaElementos);
		jQuery("#trcuenta_cobrar_detalleAcciones").css("display",cuenta_cobrar_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_cobrar_detalleParametrosAcciones").css("display",cuenta_cobrar_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_cobrar_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_cobrar_detalle_control);
				
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_cobrar_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_cobrar_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_cobrar_detalle_control) {
	
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-created_at").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.versionRow);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-updated_at").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.versionRow);
		
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_empresa!=null && cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_empresa) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_sucursal!=null && cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_sucursal>-1){
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_sucursal) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_ejercicio!=null && cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_ejercicio>-1){
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_ejercicio) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_periodo!=null && cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_periodo>-1){
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_periodo) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_usuario!=null && cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_usuario) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_cuenta_cobrar!=null && cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_cuenta_cobrar>-1){
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_cuenta_cobrar) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-numero").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.numero);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.fecha_emision);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-fecha_vence").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.fecha_vence);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-referencia").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.referencia);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-monto").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.monto);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-debito").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.debito);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-credito").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.credito);
		jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-descripcion").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.descripcion);
		
		if(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_estado!=null && cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_estado>-1){
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_estado) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_cobrar_detalle_control.cuenta_cobrar_detalleActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_cobrar_detalle","cuentascobrar","","form_cuenta_cobrar_detalle",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(cuenta_cobrar_detalle_control) {
		jQuery("#spanstrMensajeid").text(cuenta_cobrar_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(cuenta_cobrar_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(cuenta_cobrar_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_cobrar_detalle_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cuenta_cobrar_detalle_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cuenta_cobrar_detalle_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cuenta_cobrar_detalle_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_cobrar_detalle_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_cobrar").text(cuenta_cobrar_detalle_control.strMensajeid_cuenta_cobrar);		
		jQuery("#spanstrMensajenumero").text(cuenta_cobrar_detalle_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(cuenta_cobrar_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(cuenta_cobrar_detalle_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajereferencia").text(cuenta_cobrar_detalle_control.strMensajereferencia);		
		jQuery("#spanstrMensajemonto").text(cuenta_cobrar_detalle_control.strMensajemonto);		
		jQuery("#spanstrMensajedebito").text(cuenta_cobrar_detalle_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(cuenta_cobrar_detalle_control.strMensajecredito);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_cobrar_detalle_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado").text(cuenta_cobrar_detalle_control.strMensajeid_estado);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_cobrar_detalle_control) {
		jQuery("#tdbtnNuevocuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_cobrar_detalle").css("display",cuenta_cobrar_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_cobrar_detalle").css("display",cuenta_cobrar_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_cobrar_detalle").css("display",cuenta_cobrar_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_cobrar_detalle").css("display",cuenta_cobrar_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_cobrar_detalle").css("visibility",cuenta_cobrar_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_cobrar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa",cuenta_cobrar_detalle_control.empresasFK);

		if(cuenta_cobrar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_detalle_control.idFilaTablaActual+"_3",cuenta_cobrar_detalle_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cuenta_cobrar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal",cuenta_cobrar_detalle_control.sucursalsFK);

		if(cuenta_cobrar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_detalle_control.idFilaTablaActual+"_4",cuenta_cobrar_detalle_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_cobrar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_cobrar_detalle_control.ejerciciosFK);

		if(cuenta_cobrar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_detalle_control.idFilaTablaActual+"_5",cuenta_cobrar_detalle_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_cobrar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo",cuenta_cobrar_detalle_control.periodosFK);

		if(cuenta_cobrar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_detalle_control.idFilaTablaActual+"_6",cuenta_cobrar_detalle_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_cobrar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario",cuenta_cobrar_detalle_control.usuariosFK);

		if(cuenta_cobrar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_detalle_control.idFilaTablaActual+"_7",cuenta_cobrar_detalle_control.usuariosFK);
		}
	};

	cargarComboscuenta_cobrarsFK(cuenta_cobrar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar",cuenta_cobrar_detalle_control.cuenta_cobrarsFK);

		if(cuenta_cobrar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_detalle_control.idFilaTablaActual+"_8",cuenta_cobrar_detalle_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar",cuenta_cobrar_detalle_control.cuenta_cobrarsFK);

	};

	cargarCombosestadosFK(cuenta_cobrar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado",cuenta_cobrar_detalle_control.estadosFK);

		if(cuenta_cobrar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_detalle_control.idFilaTablaActual+"_17",cuenta_cobrar_detalle_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",cuenta_cobrar_detalle_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_cobrar_detalle_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cuenta_cobrar_detalle_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_cobrar_detalle_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_cobrar_detalle_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_cobrar_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(cuenta_cobrar_detalle_control) {

	};

	registrarComboActionChangeCombosestadosFK(cuenta_cobrar_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_cobrar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_cobrar_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_cobrar_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cuenta_cobrar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_detalle_control.idsucursalDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_cobrar_detalle_control.idsucursalDefaultFK) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_cobrar_detalle_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_cobrar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_detalle_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_cobrar_detalle_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_cobrar_detalle_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_cobrar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_detalle_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_cobrar_detalle_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_cobrar_detalle_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_cobrar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_detalle_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_cobrar_detalle_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_cobrar_detalle_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(cuenta_cobrar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_detalle_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != cuenta_cobrar_detalle_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(cuenta_cobrar_detalle_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(cuenta_cobrar_detalle_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(cuenta_cobrar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_detalle_control.idestadoDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_cobrar_detalle_control.idestadoDefaultFK) {
				jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_cobrar_detalle_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(cuenta_cobrar_detalle_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_cobrar_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_cobrar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.setDefectoValorCombosempresasFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.setDefectoValorCombossucursalsFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(cuenta_cobrar_detalle_control);
			}

			if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_detalle_webcontrol1.setDefectoValorCombosestadosFK(cuenta_cobrar_detalle_control);
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
	onLoadCombosEventosFK(cuenta_cobrar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_cobrar_detalle_control);
			//}

			//if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_detalle_webcontrol1.registrarComboActionChangeCombossucursalsFK(cuenta_cobrar_detalle_control);
			//}

			//if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_detalle_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_cobrar_detalle_control);
			//}

			//if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_detalle_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_cobrar_detalle_control);
			//}

			//if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_detalle_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_cobrar_detalle_control);
			//}

			//if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_detalle_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(cuenta_cobrar_detalle_control);
			//}

			//if(cuenta_cobrar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_cobrar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_detalle_webcontrol1.registrarComboActionChangeCombosestadosFK(cuenta_cobrar_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_cobrar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_cobrar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cuenta_cobrar_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_cobrar_detalle_funcion1.validarFormularioJQuery(cuenta_cobrar_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_cobrar_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_cobrar_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cuenta_cobrar_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,"cuenta_cobrar_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_detalle_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_cobrar_detalle_control) {
		
		
		
		if(cuenta_cobrar_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_cobrar_detalleActualizarToolBar").css("display",cuenta_cobrar_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcuenta_cobrar_detalleEliminarToolBar").css("display",cuenta_cobrar_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcuenta_cobrar_detalleElementos").css("display",cuenta_cobrar_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_cobrar_detalleAcciones").css("display",cuenta_cobrar_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_cobrar_detalleParametrosAcciones").css("display",cuenta_cobrar_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdcuenta_cobrar_detalleCerrarPagina").css("display",cuenta_cobrar_detalle_control.strPermisoPopup);		
		jQuery("#tdcuenta_cobrar_detalleCerrarPaginaToolBar").css("display",cuenta_cobrar_detalle_control.strPermisoPopup);
		//jQuery("#trcuenta_cobrar_detalleAccionesRelaciones").css("display",cuenta_cobrar_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_cobrar_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_cobrar_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_cobrar_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Detalle Cuenta Cobrars";
		sTituloBanner+=" - " + cuenta_cobrar_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_cobrar_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_cobrar_detalleRelacionesToolBar").css("display",cuenta_cobrar_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_cobrar_detalle").css("display",cuenta_cobrar_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_cobrar_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_cobrar_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_cobrar_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_cobrar_detalle_webcontrol1.registrarEventosControles();
		
		if(cuenta_cobrar_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_cobrar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_cobrar_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_cobrar_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_cobrar_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_cobrar_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_cobrar_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_cobrar_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cuenta_cobrar_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cuenta_cobrar_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
						//cuenta_cobrar_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cuenta_cobrar_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_cobrar_detalle_constante1.BIG_ID_ACTUAL,"cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);
						//cuenta_cobrar_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cuenta_cobrar_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_cobrar_detalle","cuentascobrar","",cuenta_cobrar_detalle_funcion1,cuenta_cobrar_detalle_webcontrol1,cuenta_cobrar_detalle_constante1);	
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

var cuenta_cobrar_detalle_webcontrol1 = new cuenta_cobrar_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_cobrar_detalle_webcontrol,cuenta_cobrar_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_cobrar_detalle_webcontrol1 = cuenta_cobrar_detalle_webcontrol1;


if(cuenta_cobrar_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_cobrar_detalle_webcontrol1.onLoadWindow; 
}

//</script>