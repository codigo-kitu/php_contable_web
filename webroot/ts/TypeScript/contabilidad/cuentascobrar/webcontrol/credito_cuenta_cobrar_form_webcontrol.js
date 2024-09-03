//<script type="text/javascript" language="javascript">



//var credito_cuenta_cobrarJQueryPaginaWebInteraccion= function (credito_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {credito_cuenta_cobrar_constante,credito_cuenta_cobrar_constante1} from '../util/credito_cuenta_cobrar_constante.js';

import {credito_cuenta_cobrar_funcion,credito_cuenta_cobrar_funcion1} from '../util/credito_cuenta_cobrar_form_funcion.js';


class credito_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	credito_cuenta_cobrar_control=null;
	credito_cuenta_cobrar_controlInicial=null;
	credito_cuenta_cobrar_controlAuxiliar=null;
		
	//if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(credito_cuenta_cobrar_control) {
		super();
		
		this.credito_cuenta_cobrar_control=credito_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(credito_cuenta_cobrar_control) {
		
		if(credito_cuenta_cobrar_control.action=="index" || credito_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(credito_cuenta_cobrar_control);
			
		} 
		
		
		
	
		else if(credito_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(credito_cuenta_cobrar_control);	
		
		} else if(credito_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(credito_cuenta_cobrar_control);		
		}
	
	
		
		
		else if(credito_cuenta_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(credito_cuenta_cobrar_control);		
		
		} else if(credito_cuenta_cobrar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(credito_cuenta_cobrar_control);		
		
		} 
		//else if(credito_cuenta_cobrar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(credito_cuenta_cobrar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + credito_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(credito_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(credito_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(credito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(credito_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(credito_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(credito_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(credito_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(credito_cuenta_cobrar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(credito_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(credito_cuenta_cobrar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(credito_cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(credito_cuenta_cobrar_control) {
		//FORMULARIO
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(credito_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		
		//COMBOS FK
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(credito_cuenta_cobrar_control) {
		//FORMULARIO
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(credito_cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);	
		
		//COMBOS FK
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(credito_cuenta_cobrar_control) {
		//FORMULARIO
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);	
		//COMBOS FK
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(credito_cuenta_cobrar_control) {
		
		if(credito_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(credito_cuenta_cobrar_control);
		}
		
		if(credito_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(credito_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(credito_cuenta_cobrar_control) {
		if(credito_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("credito_cuenta_cobrarReturnGeneral",JSON.stringify(credito_cuenta_cobrar_control.credito_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control) {
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && credito_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(credito_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(credito_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(credito_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			credito_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"credito_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				credito_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"credito_cuenta_cobrar");
			}			
			
			credito_cuenta_cobrar_funcion1.mostrarDivMensaje(true,credito_cuenta_cobrar_control.strAuxiliarMensaje,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			credito_cuenta_cobrar_funcion1.mostrarDivMensaje(false,credito_cuenta_cobrar_control.strAuxiliarMensaje,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(credito_cuenta_cobrar_control) {
		if(credito_cuenta_cobrar_funcion1.esPaginaForm(credito_cuenta_cobrar_constante1)==true) {
			window.opener.credito_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(credito_cuenta_cobrar_control) {
		credito_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(credito_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		credito_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(credito_cuenta_cobrar_control.strAuxiliarTipo,credito_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(credito_cuenta_cobrar_control) {
		credito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,credito_cuenta_cobrar_control.strAuxiliarMensajeAlert,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(credito_cuenta_cobrar_funcion1.esPaginaForm(credito_cuenta_cobrar_constante1)==true) {
			window.opener.credito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,credito_cuenta_cobrar_control.strAuxiliarMensajeAlert,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(credito_cuenta_cobrar_control) {
		this.credito_cuenta_cobrar_controlInicial=credito_cuenta_cobrar_control;
			
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(credito_cuenta_cobrar_control.strStyleDivArbol,credito_cuenta_cobrar_control.strStyleDivContent
																,credito_cuenta_cobrar_control.strStyleDivOpcionesBanner,credito_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,credito_cuenta_cobrar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(credito_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(credito_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(credito_cuenta_cobrar_control.tiposReportes,credito_cuenta_cobrar_control.tiposReporte
															 	,credito_cuenta_cobrar_control.tiposPaginacion,credito_cuenta_cobrar_control.tiposAcciones
																,credito_cuenta_cobrar_control.tiposColumnasSelect,credito_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(credito_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(credito_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(credito_cuenta_cobrar_control) {
	
		var indexPosition=credito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=credito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(credito_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(credito_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(credito_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.cuenta_cobrarsFK);
	}

	cargarComboEditarTablaforma_pago_clienteFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.forma_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control) {
		jQuery("#tdcredito_cuenta_cobrarNuevo").css("display",credito_cuenta_cobrar_control.strPermisoNuevo);
		jQuery("#trcredito_cuenta_cobrarElementos").css("display",credito_cuenta_cobrar_control.strVisibleTablaElementos);
		jQuery("#trcredito_cuenta_cobrarAcciones").css("display",credito_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trcredito_cuenta_cobrarParametrosAcciones").css("display",credito_cuenta_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(credito_cuenta_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(credito_cuenta_cobrar_control);
				
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(credito_cuenta_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(credito_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(credito_cuenta_cobrar_control) {
	
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id);
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-version_row").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.versionRow);
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-numero").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.numero);
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_emision").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.fecha_emision);
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_vence").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.fecha_vence);
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-abono").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.abono);
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-saldo").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.saldo);
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-descripcion").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.descripcion);
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado>-1){
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-referencia").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.referencia);
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-debito").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.debito);
		jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-credito").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+credito_cuenta_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("credito_cuenta_cobrar","cuentascobrar","","form_credito_cuenta_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}
	
	actualizarSpanMensajesCampos(credito_cuenta_cobrar_control) {
		jQuery("#spanstrMensajeid").text(credito_cuenta_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(credito_cuenta_cobrar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(credito_cuenta_cobrar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(credito_cuenta_cobrar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(credito_cuenta_cobrar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(credito_cuenta_cobrar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(credito_cuenta_cobrar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_cobrar").text(credito_cuenta_cobrar_control.strMensajeid_cuenta_cobrar);		
		jQuery("#spanstrMensajenumero").text(credito_cuenta_cobrar_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_forma_pago_cliente").text(credito_cuenta_cobrar_control.strMensajeid_forma_pago_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(credito_cuenta_cobrar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(credito_cuenta_cobrar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeabono").text(credito_cuenta_cobrar_control.strMensajeabono);		
		jQuery("#spanstrMensajesaldo").text(credito_cuenta_cobrar_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(credito_cuenta_cobrar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado").text(credito_cuenta_cobrar_control.strMensajeid_estado);		
		jQuery("#spanstrMensajereferencia").text(credito_cuenta_cobrar_control.strMensajereferencia);		
		jQuery("#spanstrMensajedebito").text(credito_cuenta_cobrar_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(credito_cuenta_cobrar_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(credito_cuenta_cobrar_control) {
		jQuery("#tdbtnNuevocredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcredito_cuenta_cobrar").css("visibility",credito_cuenta_cobrar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",credito_cuenta_cobrar_control.empresasFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_2",credito_cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",credito_cuenta_cobrar_control.sucursalsFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_3",credito_cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",credito_cuenta_cobrar_control.ejerciciosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_4",credito_cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",credito_cuenta_cobrar_control.periodosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_5",credito_cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",credito_cuenta_cobrar_control.usuariosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_6",credito_cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarComboscuenta_cobrarsFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar",credito_cuenta_cobrar_control.cuenta_cobrarsFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_7",credito_cuenta_cobrar_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar",credito_cuenta_cobrar_control.cuenta_cobrarsFK);

	};

	cargarCombosforma_pago_clientesFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente",credito_cuenta_cobrar_control.forma_pago_clientesFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_9",credito_cuenta_cobrar_control.forma_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente",credito_cuenta_cobrar_control.forma_pago_clientesFK);

	};

	cargarCombosestadosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado",credito_cuenta_cobrar_control.estadosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_15",credito_cuenta_cobrar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",credito_cuenta_cobrar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosforma_pago_clientesFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosestadosFK(credito_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != credito_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(credito_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != credito_cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(credito_cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != credito_cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(credito_cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != credito_cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(credito_cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != credito_cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(credito_cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != credito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(credito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(credito_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_clientesFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idforma_pago_clienteDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val() != credito_cuenta_cobrar_control.idforma_pago_clienteDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val(credito_cuenta_cobrar_control.idforma_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(credito_cuenta_cobrar_control.idforma_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idestadoDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != credito_cuenta_cobrar_control.idestadoDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(credito_cuenta_cobrar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(credito_cuenta_cobrar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	






		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//credito_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(credito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosestadosFK(credito_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(credito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosestadosFK(credito_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(credito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				credito_cuenta_cobrar_funcion1.validarFormularioJQuery(credito_cuenta_cobrar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("credito_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("credito_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,"credito_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_cliente","id_forma_pago_cliente","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaforma_pago_cliente("id_forma_pago_cliente");
				//alert(jQuery('#form-id_forma_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(credito_cuenta_cobrar_control) {
		
		
		
		if(credito_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdcredito_cuenta_cobrarActualizarToolBar").css("display",credito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcredito_cuenta_cobrarEliminarToolBar").css("display",credito_cuenta_cobrar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcredito_cuenta_cobrarElementos").css("display",credito_cuenta_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trcredito_cuenta_cobrarAcciones").css("display",credito_cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trcredito_cuenta_cobrarParametrosAcciones").css("display",credito_cuenta_cobrar_control.strVisibleTablaAcciones);
		
		jQuery("#tdcredito_cuenta_cobrarCerrarPagina").css("display",credito_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdcredito_cuenta_cobrarCerrarPaginaToolBar").css("display",credito_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trcredito_cuenta_cobrarAccionesRelaciones").css("display",credito_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=credito_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + credito_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + credito_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Credito Cuenta Cobrars";
		sTituloBanner+=" - " + credito_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + credito_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcredito_cuenta_cobrarRelacionesToolBar").css("display",credito_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		credito_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		credito_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		credito_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		credito_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			credito_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				credito_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(credito_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(credito_cuenta_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
						//credito_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(credito_cuenta_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(credito_cuenta_cobrar_constante1.BIG_ID_ACTUAL,"credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
						//credito_cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			credito_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);	
	}
}

var credito_cuenta_cobrar_webcontrol1 = new credito_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {credito_cuenta_cobrar_webcontrol,credito_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.credito_cuenta_cobrar_webcontrol1 = credito_cuenta_cobrar_webcontrol1;


if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = credito_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>