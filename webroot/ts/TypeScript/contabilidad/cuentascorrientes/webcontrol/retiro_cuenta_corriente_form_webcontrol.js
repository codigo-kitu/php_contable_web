//<script type="text/javascript" language="javascript">



//var retiro_cuenta_corrienteJQueryPaginaWebInteraccion= function (retiro_cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retiro_cuenta_corriente_constante,retiro_cuenta_corriente_constante1} from '../util/retiro_cuenta_corriente_constante.js';

import {retiro_cuenta_corriente_funcion,retiro_cuenta_corriente_funcion1} from '../util/retiro_cuenta_corriente_form_funcion.js';


class retiro_cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	retiro_cuenta_corriente_control=null;
	retiro_cuenta_corriente_controlInicial=null;
	retiro_cuenta_corriente_controlAuxiliar=null;
		
	//if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retiro_cuenta_corriente_control) {
		super();
		
		this.retiro_cuenta_corriente_control=retiro_cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(retiro_cuenta_corriente_control) {
		
		if(retiro_cuenta_corriente_control.action=="index" || retiro_cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retiro_cuenta_corriente_control);
			
		} 
		
		
		
	
		else if(retiro_cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retiro_cuenta_corriente_control);	
		
		} else if(retiro_cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retiro_cuenta_corriente_control);		
		}
	
	
		
		
		else if(retiro_cuenta_corriente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(retiro_cuenta_corriente_control);		
		
		} else if(retiro_cuenta_corriente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(retiro_cuenta_corriente_control);		
		
		} 
		//else if(retiro_cuenta_corriente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retiro_cuenta_corriente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retiro_cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retiro_cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retiro_cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(retiro_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retiro_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(retiro_cuenta_corriente_control);
		this.actualizarPaginaOrderBy(retiro_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(retiro_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retiro_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retiro_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retiro_cuenta_corriente_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retiro_cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);
		this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(retiro_cuenta_corriente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retiro_cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);
		this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(retiro_cuenta_corriente_control) {
		//FORMULARIO
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retiro_cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		
		//COMBOS FK
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retiro_cuenta_corriente_control) {
		//FORMULARIO
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retiro_cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);	
		
		//COMBOS FK
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(retiro_cuenta_corriente_control) {
		//FORMULARIO
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);	
		//COMBOS FK
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retiro_cuenta_corriente_control) {
		
		if(retiro_cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retiro_cuenta_corriente_control);
		}
		
		if(retiro_cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retiro_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retiro_cuenta_corriente_control) {
		if(retiro_cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retiro_cuenta_corrienteReturnGeneral",JSON.stringify(retiro_cuenta_corriente_control.retiro_cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control) {
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retiro_cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retiro_cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retiro_cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retiro_cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			retiro_cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"retiro_cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retiro_cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"retiro_cuenta_corriente");
			}			
			
			retiro_cuenta_corriente_funcion1.mostrarDivMensaje(true,retiro_cuenta_corriente_control.strAuxiliarMensaje,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			retiro_cuenta_corriente_funcion1.mostrarDivMensaje(false,retiro_cuenta_corriente_control.strAuxiliarMensaje,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retiro_cuenta_corriente_control) {
		if(retiro_cuenta_corriente_funcion1.esPaginaForm(retiro_cuenta_corriente_constante1)==true) {
			window.opener.retiro_cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(retiro_cuenta_corriente_control) {
		retiro_cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retiro_cuenta_corriente_control.strAuxiliarUrlPagina);
				
		retiro_cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retiro_cuenta_corriente_control.strAuxiliarTipo,retiro_cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retiro_cuenta_corriente_control) {
		retiro_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,retiro_cuenta_corriente_control.strAuxiliarMensajeAlert,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(retiro_cuenta_corriente_funcion1.esPaginaForm(retiro_cuenta_corriente_constante1)==true) {
			window.opener.retiro_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,retiro_cuenta_corriente_control.strAuxiliarMensajeAlert,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retiro_cuenta_corriente_control) {
		this.retiro_cuenta_corriente_controlInicial=retiro_cuenta_corriente_control;
			
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retiro_cuenta_corriente_control.strStyleDivArbol,retiro_cuenta_corriente_control.strStyleDivContent
																,retiro_cuenta_corriente_control.strStyleDivOpcionesBanner,retiro_cuenta_corriente_control.strStyleDivExpandirColapsar
																,retiro_cuenta_corriente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retiro_cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(retiro_cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retiro_cuenta_corriente_control.tiposReportes,retiro_cuenta_corriente_control.tiposReporte
															 	,retiro_cuenta_corriente_control.tiposPaginacion,retiro_cuenta_corriente_control.tiposAcciones
																,retiro_cuenta_corriente_control.tiposColumnasSelect,retiro_cuenta_corriente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(retiro_cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retiro_cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retiro_cuenta_corriente_control) {
	
		var indexPosition=retiro_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retiro_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retiro_cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosempresasFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!=null && retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosempresasFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablaestado_deposito_retiroFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.estado_deposito_retirosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control) {
		jQuery("#tdretiro_cuenta_corrienteNuevo").css("display",retiro_cuenta_corriente_control.strPermisoNuevo);
		jQuery("#trretiro_cuenta_corrienteElementos").css("display",retiro_cuenta_corriente_control.strVisibleTablaElementos);
		jQuery("#trretiro_cuenta_corrienteAcciones").css("display",retiro_cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trretiro_cuenta_corrienteParametrosAcciones").css("display",retiro_cuenta_corriente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(retiro_cuenta_corriente_control) {
	
		this.actualizarCssBotonesMantenimiento(retiro_cuenta_corriente_control);
				
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFormulario(retiro_cuenta_corriente_control);			
		}
						
		this.actualizarSpanMensajesCampos(retiro_cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(retiro_cuenta_corriente_control) {
	
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id);
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-version_row").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.versionRow);
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal>-1){
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-fecha_emision").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.fecha_emision);
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-monto").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.monto);
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-monto_texto").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.monto_texto);
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-saldo").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.saldo);
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-descripcion").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.descripcion);
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro>-1){
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").select2("val", null);
			if(jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-debito").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.debito);
		jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-credito").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+retiro_cuenta_corriente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("retiro_cuenta_corriente","cuentascorrientes","","form_retiro_cuenta_corriente",formulario,"","",paraEventoTabla,idFilaTabla,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}
	
	actualizarSpanMensajesCampos(retiro_cuenta_corriente_control) {
		jQuery("#spanstrMensajeid").text(retiro_cuenta_corriente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(retiro_cuenta_corriente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(retiro_cuenta_corriente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(retiro_cuenta_corriente_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(retiro_cuenta_corriente_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(retiro_cuenta_corriente_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(retiro_cuenta_corriente_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(retiro_cuenta_corriente_control.strMensajeid_cuenta_corriente);		
		jQuery("#spanstrMensajefecha_emision").text(retiro_cuenta_corriente_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajemonto").text(retiro_cuenta_corriente_control.strMensajemonto);		
		jQuery("#spanstrMensajemonto_texto").text(retiro_cuenta_corriente_control.strMensajemonto_texto);		
		jQuery("#spanstrMensajesaldo").text(retiro_cuenta_corriente_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(retiro_cuenta_corriente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado_deposito_retiro").text(retiro_cuenta_corriente_control.strMensajeid_estado_deposito_retiro);		
		jQuery("#spanstrMensajedebito").text(retiro_cuenta_corriente_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(retiro_cuenta_corriente_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(retiro_cuenta_corriente_control) {
		jQuery("#tdbtnNuevoretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarretiro_cuenta_corriente").css("visibility",retiro_cuenta_corriente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",retiro_cuenta_corriente_control.empresasFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_2",retiro_cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal",retiro_cuenta_corriente_control.sucursalsFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_3",retiro_cuenta_corriente_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio",retiro_cuenta_corriente_control.ejerciciosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_4",retiro_cuenta_corriente_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo",retiro_cuenta_corriente_control.periodosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_5",retiro_cuenta_corriente_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",retiro_cuenta_corriente_control.usuariosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_6",retiro_cuenta_corriente_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente",retiro_cuenta_corriente_control.cuenta_corrientesFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_7",retiro_cuenta_corriente_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",retiro_cuenta_corriente_control.cuenta_corrientesFK);

	};

	cargarCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro",retiro_cuenta_corriente_control.estado_deposito_retirosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_13",retiro_cuenta_corriente_control.estado_deposito_retirosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro",retiro_cuenta_corriente_control.estado_deposito_retirosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombossucursalsFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosperiodosFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != retiro_cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(retiro_cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idsucursalDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != retiro_cuenta_corriente_control.idsucursalDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(retiro_cuenta_corriente_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idejercicioDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != retiro_cuenta_corriente_control.idejercicioDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(retiro_cuenta_corriente_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idperiodoDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != retiro_cuenta_corriente_control.idperiodoDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(retiro_cuenta_corriente_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != retiro_cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(retiro_cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != retiro_cuenta_corriente_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(retiro_cuenta_corriente_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(retiro_cuenta_corriente_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultForeignKey).trigger("change");
			if(jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





		jQuery("#form-id_estado_deposito_retiro").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retiro_cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(retiro_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retiro_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombossucursalsFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosejerciciosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosperiodosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
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
	onLoadCombosEventosFK(retiro_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retiro_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombossucursalsFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosejerciciosFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosperiodosFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retiro_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retiro_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				retiro_cuenta_corriente_funcion1.validarFormularioJQuery(retiro_cuenta_corriente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retiro_cuenta_corriente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retiro_cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,"retiro_cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_deposito_retiro","id_estado_deposito_retiro","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro("id_estado_deposito_retiro");
				//alert(jQuery('#form-id_estado_deposito_retiro_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retiro_cuenta_corriente_control) {
		
		
		
		if(retiro_cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tdretiro_cuenta_corrienteActualizarToolBar").css("display",retiro_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdretiro_cuenta_corrienteEliminarToolBar").css("display",retiro_cuenta_corriente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trretiro_cuenta_corrienteElementos").css("display",retiro_cuenta_corriente_control.strVisibleTablaElementos);
		
		jQuery("#trretiro_cuenta_corrienteAcciones").css("display",retiro_cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trretiro_cuenta_corrienteParametrosAcciones").css("display",retiro_cuenta_corriente_control.strVisibleTablaAcciones);
		
		jQuery("#tdretiro_cuenta_corrienteCerrarPagina").css("display",retiro_cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tdretiro_cuenta_corrienteCerrarPaginaToolBar").css("display",retiro_cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trretiro_cuenta_corrienteAccionesRelaciones").css("display",retiro_cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retiro_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retiro_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retiro_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retiro Cta Corrientes";
		sTituloBanner+=" - " + retiro_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retiro_cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretiro_cuenta_corrienteRelacionesToolBar").css("display",retiro_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retiro_cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retiro_cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retiro_cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retiro_cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			retiro_cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				retiro_cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retiro_cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(retiro_cuenta_corriente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
						//retiro_cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(retiro_cuenta_corriente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(retiro_cuenta_corriente_constante1.BIG_ID_ACTUAL,"retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
						//retiro_cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			retiro_cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);	
	}
}

var retiro_cuenta_corriente_webcontrol1 = new retiro_cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retiro_cuenta_corriente_webcontrol,retiro_cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.retiro_cuenta_corriente_webcontrol1 = retiro_cuenta_corriente_webcontrol1;


if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retiro_cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>