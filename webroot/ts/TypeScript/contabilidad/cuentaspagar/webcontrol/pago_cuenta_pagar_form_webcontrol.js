//<script type="text/javascript" language="javascript">



//var pago_cuenta_pagarJQueryPaginaWebInteraccion= function (pago_cuenta_pagar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {pago_cuenta_pagar_constante,pago_cuenta_pagar_constante1} from '../util/pago_cuenta_pagar_constante.js';

import {pago_cuenta_pagar_funcion,pago_cuenta_pagar_funcion1} from '../util/pago_cuenta_pagar_form_funcion.js';


class pago_cuenta_pagar_webcontrol extends GeneralEntityWebControl {
	
	pago_cuenta_pagar_control=null;
	pago_cuenta_pagar_controlInicial=null;
	pago_cuenta_pagar_controlAuxiliar=null;
		
	//if(pago_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(pago_cuenta_pagar_control) {
		super();
		
		this.pago_cuenta_pagar_control=pago_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(pago_cuenta_pagar_control) {
		
		if(pago_cuenta_pagar_control.action=="index" || pago_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(pago_cuenta_pagar_control);
			
		} 
		
		
		
	
		else if(pago_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(pago_cuenta_pagar_control);	
		
		} else if(pago_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(pago_cuenta_pagar_control);		
		}
	
	
		
		
		else if(pago_cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(pago_cuenta_pagar_control);
		
		} else if(pago_cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(pago_cuenta_pagar_control);
		
		} else if(pago_cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(pago_cuenta_pagar_control);
		
		} else if(pago_cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(pago_cuenta_pagar_control);
		
		} else if(pago_cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(pago_cuenta_pagar_control);
		
		} else if(pago_cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(pago_cuenta_pagar_control);		
		
		} else if(pago_cuenta_pagar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(pago_cuenta_pagar_control);		
		
		} 
		//else if(pago_cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(pago_cuenta_pagar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + pago_cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(pago_cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(pago_cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(pago_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(pago_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(pago_cuenta_pagar_control);
		this.actualizarPaginaOrderBy(pago_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(pago_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(pago_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(pago_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pago_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(pago_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(pago_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(pago_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(pago_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(pago_cuenta_pagar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(pago_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(pago_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(pago_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(pago_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(pago_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaFormulario(pago_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(pago_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(pago_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(pago_cuenta_pagar_control);
		this.actualizarPaginaFormulario(pago_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_pagar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(pago_cuenta_pagar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(pago_cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(pago_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(pago_cuenta_pagar_control);
		this.actualizarPaginaFormulario(pago_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(pago_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_pagar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(pago_cuenta_pagar_control) {
		//FORMULARIO
		if(pago_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(pago_cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(pago_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);		
		
		//COMBOS FK
		if(pago_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(pago_cuenta_pagar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(pago_cuenta_pagar_control) {
		//FORMULARIO
		if(pago_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(pago_cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(pago_cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);	
		
		//COMBOS FK
		if(pago_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(pago_cuenta_pagar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(pago_cuenta_pagar_control) {
		//FORMULARIO
		if(pago_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(pago_cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control);	
		//COMBOS FK
		if(pago_cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(pago_cuenta_pagar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(pago_cuenta_pagar_control) {
		
		if(pago_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(pago_cuenta_pagar_control);
		}
		
		if(pago_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(pago_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(pago_cuenta_pagar_control) {
		if(pago_cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("pago_cuenta_pagarReturnGeneral",JSON.stringify(pago_cuenta_pagar_control.pago_cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_pagar_control) {
		if(pago_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && pago_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(pago_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(pago_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(pago_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			pago_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"pago_cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				pago_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"pago_cuenta_pagar");
			}			
			
			pago_cuenta_pagar_funcion1.mostrarDivMensaje(true,pago_cuenta_pagar_control.strAuxiliarMensaje,pago_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			pago_cuenta_pagar_funcion1.mostrarDivMensaje(false,pago_cuenta_pagar_control.strAuxiliarMensaje,pago_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(pago_cuenta_pagar_control) {
		if(pago_cuenta_pagar_funcion1.esPaginaForm(pago_cuenta_pagar_constante1)==true) {
			window.opener.pago_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(pago_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(pago_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(pago_cuenta_pagar_control) {
		pago_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(pago_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		pago_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(pago_cuenta_pagar_control.strAuxiliarTipo,pago_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(pago_cuenta_pagar_control) {
		pago_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,pago_cuenta_pagar_control.strAuxiliarMensajeAlert,pago_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(pago_cuenta_pagar_funcion1.esPaginaForm(pago_cuenta_pagar_constante1)==true) {
			window.opener.pago_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,pago_cuenta_pagar_control.strAuxiliarMensajeAlert,pago_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(pago_cuenta_pagar_control) {
		this.pago_cuenta_pagar_controlInicial=pago_cuenta_pagar_control;
			
		if(pago_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(pago_cuenta_pagar_control.strStyleDivArbol,pago_cuenta_pagar_control.strStyleDivContent
																,pago_cuenta_pagar_control.strStyleDivOpcionesBanner,pago_cuenta_pagar_control.strStyleDivExpandirColapsar
																,pago_cuenta_pagar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(pago_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(pago_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(pago_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(pago_cuenta_pagar_control.tiposReportes,pago_cuenta_pagar_control.tiposReporte
															 	,pago_cuenta_pagar_control.tiposPaginacion,pago_cuenta_pagar_control.tiposAcciones
																,pago_cuenta_pagar_control.tiposColumnasSelect,pago_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(pago_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(pago_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(pago_cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(pago_cuenta_pagar_control) {
	
		var indexPosition=pago_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=pago_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(pago_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarCombosempresasFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.cargarCombosestadosFK(pago_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && pago_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && pago_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarCombosempresasFK(pago_cuenta_pagar_control);
				}

				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(pago_cuenta_pagar_control);
				}

				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(pago_cuenta_pagar_control);
				}

				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(pago_cuenta_pagar_control);
				}

				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(pago_cuenta_pagar_control);
				}

				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(pago_cuenta_pagar_control);
				}

				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(pago_cuenta_pagar_control);
				}

				if(pago_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_pagar_webcontrol1.cargarCombosestadosFK(pago_cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablaforma_pago_proveedorFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.forma_pago_proveedorsFK);
	}

	cargarComboEditarTablaestadoFK(pago_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(pago_cuenta_pagar_control) {
		jQuery("#tdpago_cuenta_pagarNuevo").css("display",pago_cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trpago_cuenta_pagarElementos").css("display",pago_cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trpago_cuenta_pagarAcciones").css("display",pago_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trpago_cuenta_pagarParametrosAcciones").css("display",pago_cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(pago_cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(pago_cuenta_pagar_control);
				
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(pago_cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(pago_cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(pago_cuenta_pagar_control) {
	
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-version_row").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.versionRow);
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_empresa!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_empresa) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_sucursal!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_sucursal) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_ejercicio!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_ejercicio) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_periodo!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_periodo) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_usuario!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_usuario) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_cuenta_pagar!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_cuenta_pagar>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_cuenta_pagar) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_forma_pago_proveedor!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_forma_pago_proveedor>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_forma_pago_proveedor) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_forma_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-numero").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.numero);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_emision").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.fecha_emision);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-fecha_vence").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.fecha_vence);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-abono").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.abono);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-saldo").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.saldo);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-descripcion").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.descripcion);
		
		if(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_estado!=null && pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_estado>-1){
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_estado) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-referencia").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.referencia);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-debito").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.debito);
		jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-credito").val(pago_cuenta_pagar_control.pago_cuenta_pagarActual.credito);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+pago_cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("pago_cuenta_pagar","cuentaspagar","","form_pago_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
	}
	
	actualizarSpanMensajesCampos(pago_cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(pago_cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(pago_cuenta_pagar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(pago_cuenta_pagar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(pago_cuenta_pagar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(pago_cuenta_pagar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(pago_cuenta_pagar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(pago_cuenta_pagar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_pagar").text(pago_cuenta_pagar_control.strMensajeid_cuenta_pagar);		
		jQuery("#spanstrMensajeid_forma_pago_proveedor").text(pago_cuenta_pagar_control.strMensajeid_forma_pago_proveedor);		
		jQuery("#spanstrMensajenumero").text(pago_cuenta_pagar_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(pago_cuenta_pagar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(pago_cuenta_pagar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeabono").text(pago_cuenta_pagar_control.strMensajeabono);		
		jQuery("#spanstrMensajesaldo").text(pago_cuenta_pagar_control.strMensajesaldo);		
		jQuery("#spanstrMensajedescripcion").text(pago_cuenta_pagar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado").text(pago_cuenta_pagar_control.strMensajeid_estado);		
		jQuery("#spanstrMensajereferencia").text(pago_cuenta_pagar_control.strMensajereferencia);		
		jQuery("#spanstrMensajedebito").text(pago_cuenta_pagar_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(pago_cuenta_pagar_control.strMensajecredito);		
	}
	
	actualizarCssBotonesMantenimiento(pago_cuenta_pagar_control) {
		jQuery("#tdbtnNuevopago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevopago_cuenta_pagar").css("display",pago_cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarpago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarpago_cuenta_pagar").css("display",pago_cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarpago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarpago_cuenta_pagar").css("display",pago_cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarpago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiospago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiospago_cuenta_pagar").css("display",pago_cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarpago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarpago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarpago_cuenta_pagar").css("visibility",pago_cuenta_pagar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",pago_cuenta_pagar_control.empresasFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_2",pago_cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",pago_cuenta_pagar_control.sucursalsFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_3",pago_cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",pago_cuenta_pagar_control.ejerciciosFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_4",pago_cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",pago_cuenta_pagar_control.periodosFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_5",pago_cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",pago_cuenta_pagar_control.usuariosFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_6",pago_cuenta_pagar_control.usuariosFK);
		}
	};

	cargarComboscuenta_pagarsFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar",pago_cuenta_pagar_control.cuenta_pagarsFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_7",pago_cuenta_pagar_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar",pago_cuenta_pagar_control.cuenta_pagarsFK);

	};

	cargarCombosforma_pago_proveedorsFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor",pago_cuenta_pagar_control.forma_pago_proveedorsFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_8",pago_cuenta_pagar_control.forma_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor",pago_cuenta_pagar_control.forma_pago_proveedorsFK);

	};

	cargarCombosestadosFK(pago_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado",pago_cuenta_pagar_control.estadosFK);

		if(pago_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_pagar_control.idFilaTablaActual+"_15",pago_cuenta_pagar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",pago_cuenta_pagar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(pago_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(pago_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(pago_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(pago_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(pago_cuenta_pagar_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(pago_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosforma_pago_proveedorsFK(pago_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosestadosFK(pago_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != pago_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(pago_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != pago_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(pago_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != pago_cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(pago_cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != pago_cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(pago_cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != pago_cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(pago_cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != pago_cuenta_pagar_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(pago_cuenta_pagar_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(pago_cuenta_pagar_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_proveedorsFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idforma_pago_proveedorDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != pago_cuenta_pagar_control.idforma_pago_proveedorDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(pago_cuenta_pagar_control.idforma_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(pago_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(pago_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_pagar_control.idestadoDefaultFK>-1 && jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != pago_cuenta_pagar_control.idestadoDefaultFK) {
				jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(pago_cuenta_pagar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(pago_cuenta_pagar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+pago_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//pago_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(pago_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pago_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorComboscuenta_pagarsFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorCombosforma_pago_proveedorsFK(pago_cuenta_pagar_control);
			}

			if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_pagar_webcontrol1.setDefectoValorCombosestadosFK(pago_cuenta_pagar_control);
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
	onLoadCombosEventosFK(pago_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pago_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(pago_cuenta_pagar_control);
			//}

			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(pago_cuenta_pagar_control);
			//}

			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(pago_cuenta_pagar_control);
			//}

			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(pago_cuenta_pagar_control);
			//}

			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(pago_cuenta_pagar_control);
			//}

			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(pago_cuenta_pagar_control);
			//}

			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosforma_pago_proveedorsFK(pago_cuenta_pagar_control);
			//}

			//if(pago_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosestadosFK(pago_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(pago_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pago_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(pago_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(pago_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				pago_cuenta_pagar_funcion1.validarFormularioJQuery(pago_cuenta_pagar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("pago_cuenta_pagar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("pago_cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(pago_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,"pago_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_proveedor","id_forma_pago_proveedor","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParaforma_pago_proveedor("id_forma_pago_proveedor");
				//alert(jQuery('#form-id_forma_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				pago_cuenta_pagar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(pago_cuenta_pagar_control) {
		
		
		
		if(pago_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdpago_cuenta_pagarActualizarToolBar").css("display",pago_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdpago_cuenta_pagarEliminarToolBar").css("display",pago_cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trpago_cuenta_pagarElementos").css("display",pago_cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trpago_cuenta_pagarAcciones").css("display",pago_cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trpago_cuenta_pagarParametrosAcciones").css("display",pago_cuenta_pagar_control.strVisibleTablaAcciones);
		
		jQuery("#tdpago_cuenta_pagarCerrarPagina").css("display",pago_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tdpago_cuenta_pagarCerrarPaginaToolBar").css("display",pago_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trpago_cuenta_pagarAccionesRelaciones").css("display",pago_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=pago_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pago_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + pago_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Pago Cuenta Pagars";
		sTituloBanner+=" - " + pago_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pago_cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpago_cuenta_pagarRelacionesToolBar").css("display",pago_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospago_cuenta_pagar").css("display",pago_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		pago_cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		pago_cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		pago_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		pago_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(pago_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(pago_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			pago_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(pago_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(pago_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				pago_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(pago_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(pago_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(pago_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(pago_cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
						//pago_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(pago_cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(pago_cuenta_pagar_constante1.BIG_ID_ACTUAL,"pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);
						//pago_cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			pago_cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("pago_cuenta_pagar","cuentaspagar","",pago_cuenta_pagar_funcion1,pago_cuenta_pagar_webcontrol1,pago_cuenta_pagar_constante1);	
	}
}

var pago_cuenta_pagar_webcontrol1 = new pago_cuenta_pagar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {pago_cuenta_pagar_webcontrol,pago_cuenta_pagar_webcontrol1};

//Para ser llamado desde window.opener
window.pago_cuenta_pagar_webcontrol1 = pago_cuenta_pagar_webcontrol1;


if(pago_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = pago_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>