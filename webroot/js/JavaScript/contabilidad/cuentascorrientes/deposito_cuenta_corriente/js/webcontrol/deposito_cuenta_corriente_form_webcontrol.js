//<script type="text/javascript" language="javascript">



//var deposito_cuenta_corrienteJQueryPaginaWebInteraccion= function (deposito_cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {deposito_cuenta_corriente_constante,deposito_cuenta_corriente_constante1} from '../util/deposito_cuenta_corriente_constante.js';

import {deposito_cuenta_corriente_funcion,deposito_cuenta_corriente_funcion1} from '../util/deposito_cuenta_corriente_form_funcion.js';


class deposito_cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	deposito_cuenta_corriente_control=null;
	deposito_cuenta_corriente_controlInicial=null;
	deposito_cuenta_corriente_controlAuxiliar=null;
		
	//if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(deposito_cuenta_corriente_control) {
		super();
		
		this.deposito_cuenta_corriente_control=deposito_cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(deposito_cuenta_corriente_control) {
		
		if(deposito_cuenta_corriente_control.action=="index" || deposito_cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(deposito_cuenta_corriente_control);
			
		} 
		
		
		
	
		else if(deposito_cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(deposito_cuenta_corriente_control);	
		
		} else if(deposito_cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(deposito_cuenta_corriente_control);		
		}
	
	
		
		
		else if(deposito_cuenta_corriente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(deposito_cuenta_corriente_control);		
		
		} else if(deposito_cuenta_corriente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(deposito_cuenta_corriente_control);		
		
		} 
		//else if(deposito_cuenta_corriente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(deposito_cuenta_corriente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + deposito_cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(deposito_cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(deposito_cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(deposito_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(deposito_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(deposito_cuenta_corriente_control);
		this.actualizarPaginaOrderBy(deposito_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(deposito_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(deposito_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(deposito_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(deposito_cuenta_corriente_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(deposito_cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);
		this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(deposito_cuenta_corriente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(deposito_cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);
		this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(deposito_cuenta_corriente_control) {
		//FORMULARIO
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(deposito_cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		
		//COMBOS FK
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(deposito_cuenta_corriente_control) {
		//FORMULARIO
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(deposito_cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);	
		
		//COMBOS FK
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(deposito_cuenta_corriente_control) {
		//FORMULARIO
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);	
		//COMBOS FK
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(deposito_cuenta_corriente_control) {
		
		if(deposito_cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(deposito_cuenta_corriente_control);
		}
		
		if(deposito_cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(deposito_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(deposito_cuenta_corriente_control) {
		if(deposito_cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("deposito_cuenta_corrienteReturnGeneral",JSON.stringify(deposito_cuenta_corriente_control.deposito_cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control) {
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && deposito_cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(deposito_cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(deposito_cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(deposito_cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			deposito_cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"deposito_cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"deposito_cuenta_corriente");
			}			
			
			deposito_cuenta_corriente_funcion1.mostrarDivMensaje(true,deposito_cuenta_corriente_control.strAuxiliarMensaje,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			deposito_cuenta_corriente_funcion1.mostrarDivMensaje(false,deposito_cuenta_corriente_control.strAuxiliarMensaje,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(deposito_cuenta_corriente_control) {
		if(deposito_cuenta_corriente_funcion1.esPaginaForm(deposito_cuenta_corriente_constante1)==true) {
			window.opener.deposito_cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(deposito_cuenta_corriente_control) {
		deposito_cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(deposito_cuenta_corriente_control.strAuxiliarUrlPagina);
				
		deposito_cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(deposito_cuenta_corriente_control.strAuxiliarTipo,deposito_cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(deposito_cuenta_corriente_control) {
		deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,deposito_cuenta_corriente_control.strAuxiliarMensajeAlert,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(deposito_cuenta_corriente_funcion1.esPaginaForm(deposito_cuenta_corriente_constante1)==true) {
			window.opener.deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,deposito_cuenta_corriente_control.strAuxiliarMensajeAlert,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(deposito_cuenta_corriente_control) {
		this.deposito_cuenta_corriente_controlInicial=deposito_cuenta_corriente_control;
			
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(deposito_cuenta_corriente_control.strStyleDivArbol,deposito_cuenta_corriente_control.strStyleDivContent
																,deposito_cuenta_corriente_control.strStyleDivOpcionesBanner,deposito_cuenta_corriente_control.strStyleDivExpandirColapsar
																,deposito_cuenta_corriente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(deposito_cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(deposito_cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(deposito_cuenta_corriente_control.tiposReportes,deposito_cuenta_corriente_control.tiposReporte
															 	,deposito_cuenta_corriente_control.tiposPaginacion,deposito_cuenta_corriente_control.tiposAcciones
																,deposito_cuenta_corriente_control.tiposColumnasSelect,deposito_cuenta_corriente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(deposito_cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(deposito_cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(deposito_cuenta_corriente_control) {
	
		var indexPosition=deposito_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=deposito_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(deposito_cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosempresasFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!=null && deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosempresasFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablaestado_deposito_retiroFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.estado_deposito_retirosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control) {
		jQuery("#tddeposito_cuenta_corrienteNuevo").css("display",deposito_cuenta_corriente_control.strPermisoNuevo);
		jQuery("#trdeposito_cuenta_corrienteElementos").css("display",deposito_cuenta_corriente_control.strVisibleTablaElementos);
		jQuery("#trdeposito_cuenta_corrienteAcciones").css("display",deposito_cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trdeposito_cuenta_corrienteParametrosAcciones").css("display",deposito_cuenta_corriente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(deposito_cuenta_corriente_control) {
	
		this.actualizarCssBotonesMantenimiento(deposito_cuenta_corriente_control);
				
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFormulario(deposito_cuenta_corriente_control);			
		}
						
		this.actualizarSpanMensajesCampos(deposito_cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(deposito_cuenta_corriente_control) {
	
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-created_at").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.versionRow);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-updated_at").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.versionRow);
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal>-1){
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-fecha_emision").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.fecha_emision);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-monto").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.monto);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-monto_texto").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.monto_texto);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-saldo").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.saldo);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-descripcion").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.descripcion);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-es_balance_inicial").prop('checked',deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.es_balance_inicial);
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro>-1){
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").select2("val", null);
			if(jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-debito").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.debito);
		jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-credito").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+deposito_cuenta_corriente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("deposito_cuenta_corriente","cuentascorrientes","","form_deposito_cuenta_corriente",formulario,"","",paraEventoTabla,idFilaTabla,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}
	
	actualizarSpanMensajesCampos(deposito_cuenta_corriente_control) {
		jQuery("#spanstrMensajeid").text(deposito_cuenta_corriente_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(deposito_cuenta_corriente_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(deposito_cuenta_corriente_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(deposito_cuenta_corriente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(deposito_cuenta_corriente_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(deposito_cuenta_corriente_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(deposito_cuenta_corriente_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(deposito_cuenta_corriente_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(deposito_cuenta_corriente_control.strMensajeid_cuenta_corriente);		
		jQuery("#spanstrMensajefecha_emision").text(deposito_cuenta_corriente_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajemonto").text(deposito_cuenta_corriente_control.strMensajemonto);		
		jQuery("#spanstrMensajemonto_texto").text(deposito_cuenta_corriente_control.strMensajemonto_texto);		
		jQuery("#spanstrMensajesaldo").text(deposito_cuenta_corriente_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(deposito_cuenta_corriente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajees_balance_inicial").text(deposito_cuenta_corriente_control.strMensajees_balance_inicial);		
		jQuery("#spanstrMensajeid_estado_deposito_retiro").text(deposito_cuenta_corriente_control.strMensajeid_estado_deposito_retiro);		
		jQuery("#spanstrMensajedebito").text(deposito_cuenta_corriente_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(deposito_cuenta_corriente_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(deposito_cuenta_corriente_control) {
		jQuery("#tdbtnNuevodeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardeposito_cuenta_corriente").css("visibility",deposito_cuenta_corriente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",deposito_cuenta_corriente_control.empresasFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_3",deposito_cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal",deposito_cuenta_corriente_control.sucursalsFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_4",deposito_cuenta_corriente_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio",deposito_cuenta_corriente_control.ejerciciosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_5",deposito_cuenta_corriente_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo",deposito_cuenta_corriente_control.periodosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_6",deposito_cuenta_corriente_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",deposito_cuenta_corriente_control.usuariosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_7",deposito_cuenta_corriente_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente",deposito_cuenta_corriente_control.cuenta_corrientesFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_8",deposito_cuenta_corriente_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",deposito_cuenta_corriente_control.cuenta_corrientesFK);

	};

	cargarCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro",deposito_cuenta_corriente_control.estado_deposito_retirosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_15",deposito_cuenta_corriente_control.estado_deposito_retirosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro",deposito_cuenta_corriente_control.estado_deposito_retirosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombossucursalsFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosperiodosFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != deposito_cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(deposito_cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idsucursalDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != deposito_cuenta_corriente_control.idsucursalDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(deposito_cuenta_corriente_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idejercicioDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != deposito_cuenta_corriente_control.idejercicioDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(deposito_cuenta_corriente_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idperiodoDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != deposito_cuenta_corriente_control.idperiodoDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(deposito_cuenta_corriente_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != deposito_cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(deposito_cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != deposito_cuenta_corriente_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(deposito_cuenta_corriente_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(deposito_cuenta_corriente_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultForeignKey).trigger("change");
			if(jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//deposito_cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(deposito_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(deposito_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombossucursalsFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosejerciciosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosperiodosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
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
	onLoadCombosEventosFK(deposito_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(deposito_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombossucursalsFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosejerciciosFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosperiodosFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(deposito_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(deposito_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				deposito_cuenta_corriente_funcion1.validarFormularioJQuery(deposito_cuenta_corriente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("deposito_cuenta_corriente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("deposito_cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,"deposito_cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_deposito_retiro","id_estado_deposito_retiro","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro("id_estado_deposito_retiro");
				//alert(jQuery('#form-id_estado_deposito_retiro_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(deposito_cuenta_corriente_control) {
		
		
		
		if(deposito_cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tddeposito_cuenta_corrienteActualizarToolBar").css("display",deposito_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddeposito_cuenta_corrienteEliminarToolBar").css("display",deposito_cuenta_corriente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdeposito_cuenta_corrienteElementos").css("display",deposito_cuenta_corriente_control.strVisibleTablaElementos);
		
		jQuery("#trdeposito_cuenta_corrienteAcciones").css("display",deposito_cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trdeposito_cuenta_corrienteParametrosAcciones").css("display",deposito_cuenta_corriente_control.strVisibleTablaAcciones);
		
		jQuery("#tddeposito_cuenta_corrienteCerrarPagina").css("display",deposito_cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tddeposito_cuenta_corrienteCerrarPaginaToolBar").css("display",deposito_cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trdeposito_cuenta_corrienteAccionesRelaciones").css("display",deposito_cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=deposito_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + deposito_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + deposito_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Deposito Cta Corrientes";
		sTituloBanner+=" - " + deposito_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + deposito_cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddeposito_cuenta_corrienteRelacionesToolBar").css("display",deposito_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		deposito_cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		deposito_cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		deposito_cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		deposito_cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			deposito_cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				deposito_cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(deposito_cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(deposito_cuenta_corriente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
						//deposito_cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(deposito_cuenta_corriente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(deposito_cuenta_corriente_constante1.BIG_ID_ACTUAL,"deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
						//deposito_cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			deposito_cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);	
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

var deposito_cuenta_corriente_webcontrol1 = new deposito_cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {deposito_cuenta_corriente_webcontrol,deposito_cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.deposito_cuenta_corriente_webcontrol1 = deposito_cuenta_corriente_webcontrol1;


if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = deposito_cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>