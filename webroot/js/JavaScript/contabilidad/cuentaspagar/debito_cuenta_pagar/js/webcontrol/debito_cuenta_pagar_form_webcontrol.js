//<script type="text/javascript" language="javascript">



//var debito_cuenta_pagarJQueryPaginaWebInteraccion= function (debito_cuenta_pagar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {debito_cuenta_pagar_constante,debito_cuenta_pagar_constante1} from '../util/debito_cuenta_pagar_constante.js';

import {debito_cuenta_pagar_funcion,debito_cuenta_pagar_funcion1} from '../util/debito_cuenta_pagar_form_funcion.js';


class debito_cuenta_pagar_webcontrol extends GeneralEntityWebControl {
	
	debito_cuenta_pagar_control=null;
	debito_cuenta_pagar_controlInicial=null;
	debito_cuenta_pagar_controlAuxiliar=null;
		
	//if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(debito_cuenta_pagar_control) {
		super();
		
		this.debito_cuenta_pagar_control=debito_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(debito_cuenta_pagar_control) {
		
		if(debito_cuenta_pagar_control.action=="index" || debito_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(debito_cuenta_pagar_control);
			
		} 
		
		
		
	
		else if(debito_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(debito_cuenta_pagar_control);	
		
		} else if(debito_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_pagar_control);		
		}
	
	
		
		
		else if(debito_cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(debito_cuenta_pagar_control);		
		
		} 
		//else if(debito_cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(debito_cuenta_pagar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + debito_cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(debito_cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(debito_cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(debito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(debito_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_pagar_control);
		this.actualizarPaginaOrderBy(debito_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(debito_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_pagar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(debito_cuenta_pagar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(debito_cuenta_pagar_control) {
		//FORMULARIO
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(debito_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		
		//COMBOS FK
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(debito_cuenta_pagar_control) {
		//FORMULARIO
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(debito_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);	
		
		//COMBOS FK
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(debito_cuenta_pagar_control) {
		//FORMULARIO
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);	
		//COMBOS FK
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(debito_cuenta_pagar_control) {
		
		if(debito_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(debito_cuenta_pagar_control);
		}
		
		if(debito_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(debito_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("debito_cuenta_pagarReturnGeneral",JSON.stringify(debito_cuenta_pagar_control.debito_cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && debito_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			debito_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"debito_cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				debito_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"debito_cuenta_pagar");
			}			
			
			debito_cuenta_pagar_funcion1.mostrarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensaje,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			debito_cuenta_pagar_funcion1.mostrarDivMensaje(false,debito_cuenta_pagar_control.strAuxiliarMensaje,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_funcion1.esPaginaForm(debito_cuenta_pagar_constante1)==true) {
			window.opener.debito_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(debito_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		debito_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(debito_cuenta_pagar_control.strAuxiliarTipo,debito_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensajeAlert,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(debito_cuenta_pagar_funcion1.esPaginaForm(debito_cuenta_pagar_constante1)==true) {
			window.opener.debito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensajeAlert,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(debito_cuenta_pagar_control) {
		this.debito_cuenta_pagar_controlInicial=debito_cuenta_pagar_control;
			
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(debito_cuenta_pagar_control.strStyleDivArbol,debito_cuenta_pagar_control.strStyleDivContent
																,debito_cuenta_pagar_control.strStyleDivOpcionesBanner,debito_cuenta_pagar_control.strStyleDivExpandirColapsar
																,debito_cuenta_pagar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(debito_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(debito_cuenta_pagar_control.tiposReportes,debito_cuenta_pagar_control.tiposReporte
															 	,debito_cuenta_pagar_control.tiposPaginacion,debito_cuenta_pagar_control.tiposAcciones
																,debito_cuenta_pagar_control.tiposColumnasSelect,debito_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(debito_cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(debito_cuenta_pagar_control) {
	
		var indexPosition=debito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=debito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(debito_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(debito_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && debito_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && debito_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(debito_cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablaforma_pago_proveedorFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.forma_pago_proveedorsFK);
	}

	cargarComboEditarTablaestadoFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control) {
		jQuery("#tddebito_cuenta_pagarNuevo").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trdebito_cuenta_pagarElementos").css("display",debito_cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trdebito_cuenta_pagarAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trdebito_cuenta_pagarParametrosAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(debito_cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(debito_cuenta_pagar_control);
				
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(debito_cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(debito_cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(debito_cuenta_pagar_control) {
	
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-created_at").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.versionRow);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-updated_at").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.versionRow);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-numero").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.numero);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_emision").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_emision);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_vence").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_vence);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-abono").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.abono);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-saldo").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.saldo);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-descripcion").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.descripcion);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado>-1){
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-referencia").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.referencia);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-debito").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.debito);
		jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-credito").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+debito_cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("debito_cuenta_pagar","cuentaspagar","","form_debito_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	actualizarSpanMensajesCampos(debito_cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(debito_cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(debito_cuenta_pagar_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(debito_cuenta_pagar_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(debito_cuenta_pagar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(debito_cuenta_pagar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(debito_cuenta_pagar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(debito_cuenta_pagar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(debito_cuenta_pagar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_pagar").text(debito_cuenta_pagar_control.strMensajeid_cuenta_pagar);		
		jQuery("#spanstrMensajeid_forma_pago_proveedor").text(debito_cuenta_pagar_control.strMensajeid_forma_pago_proveedor);		
		jQuery("#spanstrMensajenumero").text(debito_cuenta_pagar_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(debito_cuenta_pagar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(debito_cuenta_pagar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeabono").text(debito_cuenta_pagar_control.strMensajeabono);		
		jQuery("#spanstrMensajesaldo").text(debito_cuenta_pagar_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(debito_cuenta_pagar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado").text(debito_cuenta_pagar_control.strMensajeid_estado);		
		jQuery("#spanstrMensajereferencia").text(debito_cuenta_pagar_control.strMensajereferencia);		
		jQuery("#spanstrMensajedebito").text(debito_cuenta_pagar_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(debito_cuenta_pagar_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(debito_cuenta_pagar_control) {
		jQuery("#tdbtnNuevodebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardebito_cuenta_pagar").css("visibility",debito_cuenta_pagar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",debito_cuenta_pagar_control.empresasFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_3",debito_cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",debito_cuenta_pagar_control.sucursalsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_4",debito_cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",debito_cuenta_pagar_control.ejerciciosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_5",debito_cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",debito_cuenta_pagar_control.periodosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_6",debito_cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",debito_cuenta_pagar_control.usuariosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_7",debito_cuenta_pagar_control.usuariosFK);
		}
	};

	cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar",debito_cuenta_pagar_control.cuenta_pagarsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_8",debito_cuenta_pagar_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar",debito_cuenta_pagar_control.cuenta_pagarsFK);

	};

	cargarCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor",debito_cuenta_pagar_control.forma_pago_proveedorsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_9",debito_cuenta_pagar_control.forma_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor",debito_cuenta_pagar_control.forma_pago_proveedorsFK);

	};

	cargarCombosestadosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado",debito_cuenta_pagar_control.estadosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_16",debito_cuenta_pagar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",debito_cuenta_pagar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosestadosFK(debito_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != debito_cuenta_pagar_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(debito_cuenta_pagar_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(debito_cuenta_pagar_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idforma_pago_proveedorDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != debito_cuenta_pagar_control.idforma_pago_proveedorDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(debito_cuenta_pagar_control.idforma_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(debito_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idestadoDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_pagar_control.idestadoDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_pagar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(debito_cuenta_pagar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//debito_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosestadosFK(debito_cuenta_pagar_control);
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
	onLoadCombosEventosFK(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosestadosFK(debito_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				debito_cuenta_pagar_funcion1.validarFormularioJQuery(debito_cuenta_pagar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("debito_cuenta_pagar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("debito_cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,"debito_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_proveedor","id_forma_pago_proveedor","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaforma_pago_proveedor("id_forma_pago_proveedor");
				//alert(jQuery('#form-id_forma_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(debito_cuenta_pagar_control) {
		
		
		
		if(debito_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tddebito_cuenta_pagarActualizarToolBar").css("display",debito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddebito_cuenta_pagarEliminarToolBar").css("display",debito_cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdebito_cuenta_pagarElementos").css("display",debito_cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trdebito_cuenta_pagarAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trdebito_cuenta_pagarParametrosAcciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAcciones);
		
		jQuery("#tddebito_cuenta_pagarCerrarPagina").css("display",debito_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tddebito_cuenta_pagarCerrarPaginaToolBar").css("display",debito_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trdebito_cuenta_pagarAccionesRelaciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=debito_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + debito_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + debito_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Debito Cuenta Pagars";
		sTituloBanner+=" - " + debito_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + debito_cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddebito_cuenta_pagarRelacionesToolBar").css("display",debito_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdebito_cuenta_pagar").css("display",debito_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		debito_cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		debito_cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			debito_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				debito_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(debito_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(debito_cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
						//debito_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(debito_cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(debito_cuenta_pagar_constante1.BIG_ID_ACTUAL,"debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
						//debito_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			debito_cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);	
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

var debito_cuenta_pagar_webcontrol1 = new debito_cuenta_pagar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {debito_cuenta_pagar_webcontrol,debito_cuenta_pagar_webcontrol1};

//Para ser llamado desde window.opener
window.debito_cuenta_pagar_webcontrol1 = debito_cuenta_pagar_webcontrol1;


if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = debito_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>