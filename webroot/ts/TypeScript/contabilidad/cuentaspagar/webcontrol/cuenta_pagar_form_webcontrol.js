//<script type="text/javascript" language="javascript">



//var cuenta_pagarJQueryPaginaWebInteraccion= function (cuenta_pagar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_pagar_constante,cuenta_pagar_constante1} from '../util/cuenta_pagar_constante.js';

import {cuenta_pagar_funcion,cuenta_pagar_funcion1} from '../util/cuenta_pagar_form_funcion.js';


class cuenta_pagar_webcontrol extends GeneralEntityWebControl {
	
	cuenta_pagar_control=null;
	cuenta_pagar_controlInicial=null;
	cuenta_pagar_controlAuxiliar=null;
		
	//if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_pagar_control) {
		super();
		
		this.cuenta_pagar_control=cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(cuenta_pagar_control) {
		
		if(cuenta_pagar_control.action=="index" || cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_pagar_control);
			
		} 
		
		
		
	
		else if(cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_pagar_control);	
		
		} else if(cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_control);		
		}
	
		else if(cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_control);		
		}
	
		else if(cuenta_pagar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_pagar_control);
		}
		
		
		else if(cuenta_pagar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_pagar_control);
		
		} else if(cuenta_pagar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_pagar_control);		
		
		} else if(cuenta_pagar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_pagar_control);		
		
		} 
		//else if(cuenta_pagar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_pagar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_pagar_control);
		this.actualizarPaginaOrderBy(cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
		//this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_pagar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_pagar_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_pagar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cuenta_pagar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_pagar_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		this.actualizarPaginaFormulario(cuenta_pagar_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_pagar_control) {
		//FORMULARIO
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);		
		
		//COMBOS FK
		if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_pagar_control) {
		//FORMULARIO
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_pagar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);	
		
		//COMBOS FK
		if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_pagar_control) {
		//FORMULARIO
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_pagar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control);	
		//COMBOS FK
		if(cuenta_pagar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_pagar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_pagar_control) {
		
		if(cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_pagar_control);
		}
		
		if(cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_pagar_control) {
		if(cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_pagarReturnGeneral",JSON.stringify(cuenta_pagar_control.cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_control) {
		if(cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_pagar");
			}			
			
			cuenta_pagar_funcion1.mostrarDivMensaje(true,cuenta_pagar_control.strAuxiliarMensaje,cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_pagar_funcion1.mostrarDivMensaje(false,cuenta_pagar_control.strAuxiliarMensaje,cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_control) {
		if(cuenta_pagar_funcion1.esPaginaForm(cuenta_pagar_constante1)==true) {
			window.opener.cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_pagar_control) {
		cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_pagar_control.strAuxiliarUrlPagina);
				
		cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_pagar_control.strAuxiliarTipo,cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_pagar_control) {
		cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_control.strAuxiliarMensajeAlert,cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(cuenta_pagar_funcion1.esPaginaForm(cuenta_pagar_constante1)==true) {
			window.opener.cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_control.strAuxiliarMensajeAlert,cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_pagar_control) {
		this.cuenta_pagar_controlInicial=cuenta_pagar_control;
			
		if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_pagar_control.strStyleDivArbol,cuenta_pagar_control.strStyleDivContent
																,cuenta_pagar_control.strStyleDivOpcionesBanner,cuenta_pagar_control.strStyleDivExpandirColapsar
																,cuenta_pagar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_pagar_control.tiposReportes,cuenta_pagar_control.tiposReporte
															 	,cuenta_pagar_control.tiposPaginacion,cuenta_pagar_control.tiposAcciones
																,cuenta_pagar_control.tiposColumnasSelect,cuenta_pagar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_pagar_control.tiposRelaciones,cuenta_pagar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_pagar_control) {
	
		var indexPosition=cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosempresasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosorden_comprasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombostermino_pago_proveedorsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.cargarCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_pagar_control.strRecargarFkTiposNinguno!=null && cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosempresasFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosorden_comprasFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombostermino_pago_proveedorsFK(cuenta_pagar_control);
				}

				if(cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_webcontrol1.cargarCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_orden_compra") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cuenta_pagarActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cuenta_pagarActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cuenta_pagarActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablaorden_compraFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.orden_comprasFK);
	}

	cargarComboEditarTablaproveedorFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.proveedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablaestado_cuentas_pagarFK(cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_funcion1,cuenta_pagar_control.estado_cuentas_pagarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cuenta_pagar_control) {
		jQuery("#tdcuenta_pagarNuevo").css("display",cuenta_pagar_control.strPermisoNuevo);
		jQuery("#trcuenta_pagarElementos").css("display",cuenta_pagar_control.strVisibleTablaElementos);
		jQuery("#trcuenta_pagarAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_pagarParametrosAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_pagar_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_pagar_control);
				
		if(cuenta_pagar_control.cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_pagar_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_pagar_control) {
	
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id").val(cuenta_pagar_control.cuenta_pagarActual.id);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-version_row").val(cuenta_pagar_control.cuenta_pagarActual.versionRow);
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_empresa!=null && cuenta_pagar_control.cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_pagar_control.cuenta_pagarActual.id_empresa) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_pagar_control.cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_sucursal!=null && cuenta_pagar_control.cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_pagar_control.cuenta_pagarActual.id_sucursal) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_pagar_control.cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_ejercicio!=null && cuenta_pagar_control.cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_pagar_control.cuenta_pagarActual.id_ejercicio) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_pagar_control.cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_periodo!=null && cuenta_pagar_control.cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_pagar_control.cuenta_pagarActual.id_periodo) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_pagar_control.cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_usuario!=null && cuenta_pagar_control.cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_pagar_control.cuenta_pagarActual.id_usuario) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_pagar_control.cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_orden_compra!=null && cuenta_pagar_control.cuenta_pagarActual.id_orden_compra>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val() != cuenta_pagar_control.cuenta_pagarActual.id_orden_compra) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val(cuenta_pagar_control.cuenta_pagarActual.id_orden_compra).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_proveedor!=null && cuenta_pagar_control.cuenta_pagarActual.id_proveedor>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != cuenta_pagar_control.cuenta_pagarActual.id_proveedor) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(cuenta_pagar_control.cuenta_pagarActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_termino_pago_proveedor!=null && cuenta_pagar_control.cuenta_pagarActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != cuenta_pagar_control.cuenta_pagarActual.id_termino_pago_proveedor) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(cuenta_pagar_control.cuenta_pagarActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-numero").val(cuenta_pagar_control.cuenta_pagarActual.numero);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-fecha_emision").val(cuenta_pagar_control.cuenta_pagarActual.fecha_emision);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-fecha_vence").val(cuenta_pagar_control.cuenta_pagarActual.fecha_vence);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-fecha_ultimo_movimiento").val(cuenta_pagar_control.cuenta_pagarActual.fecha_ultimo_movimiento);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-monto").val(cuenta_pagar_control.cuenta_pagarActual.monto);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-saldo").val(cuenta_pagar_control.cuenta_pagarActual.saldo);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-porcentaje").val(cuenta_pagar_control.cuenta_pagarActual.porcentaje);
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-descripcion").val(cuenta_pagar_control.cuenta_pagarActual.descripcion);
		
		if(cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar!=null && cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar>-1){
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val() != cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val(cuenta_pagar_control.cuenta_pagarActual.id_estado_cuentas_pagar).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").select2("val", null);
			if(jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-referencia").val(cuenta_pagar_control.cuenta_pagarActual.referencia);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_pagar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_pagar","cuentaspagar","","form_cuenta_pagar",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}
	
	actualizarSpanMensajesCampos(cuenta_pagar_control) {
		jQuery("#spanstrMensajeid").text(cuenta_pagar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_pagar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_pagar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cuenta_pagar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cuenta_pagar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cuenta_pagar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_pagar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_orden_compra").text(cuenta_pagar_control.strMensajeid_orden_compra);		
		jQuery("#spanstrMensajeid_proveedor").text(cuenta_pagar_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(cuenta_pagar_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajenumero").text(cuenta_pagar_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(cuenta_pagar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(cuenta_pagar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajefecha_ultimo_movimiento").text(cuenta_pagar_control.strMensajefecha_ultimo_movimiento);		
		jQuery("#spanstrMensajemonto").text(cuenta_pagar_control.strMensajemonto);		
		jQuery("#spanstrMensajesaldo").text(cuenta_pagar_control.strMensajesaldo);		
		jQuery("#spanstrMensajeporcentaje").text(cuenta_pagar_control.strMensajeporcentaje);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_pagar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado_cuentas_pagar").text(cuenta_pagar_control.strMensajeid_estado_cuentas_pagar);		
		jQuery("#spanstrMensajereferencia").text(cuenta_pagar_control.strMensajereferencia);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_pagar_control) {
		jQuery("#tdbtnNuevocuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_pagar").css("display",cuenta_pagar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_pagar").css("display",cuenta_pagar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_pagar").css("display",cuenta_pagar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_pagar").css("display",cuenta_pagar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_pagar").css("visibility",cuenta_pagar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",cuenta_pagar_control.empresasFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_2",cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",cuenta_pagar_control.sucursalsFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_3",cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_pagar_control.ejerciciosFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_4",cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",cuenta_pagar_control.periodosFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_5",cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",cuenta_pagar_control.usuariosFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_6",cuenta_pagar_control.usuariosFK);
		}
	};

	cargarCombosorden_comprasFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra",cuenta_pagar_control.orden_comprasFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_7",cuenta_pagar_control.orden_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra",cuenta_pagar_control.orden_comprasFK);

	};

	cargarCombosproveedorsFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor",cuenta_pagar_control.proveedorsFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_8",cuenta_pagar_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cuenta_pagar_control.proveedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",cuenta_pagar_control.termino_pago_proveedorsFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_9",cuenta_pagar_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",cuenta_pagar_control.termino_pago_proveedorsFK);

	};

	cargarCombosestado_cuentas_pagarsFK(cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar",cuenta_pagar_control.estado_cuentas_pagarsFK);

		if(cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_control.idFilaTablaActual+"_18",cuenta_pagar_control.estado_cuentas_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar",cuenta_pagar_control.estado_cuentas_pagarsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosorden_comprasFK(cuenta_pagar_control) {
		this.registrarComboActionChangeid_orden_compra("form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra",false,0);


		this.registrarComboActionChangeid_orden_compra(""+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra",false,0);


	};

	registrarComboActionChangeCombosproveedorsFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosestado_cuentas_pagarsFK(cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosorden_comprasFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idorden_compraDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val() != cuenta_pagar_control.idorden_compraDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra").val(cuenta_pagar_control.idorden_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(cuenta_pagar_control.idorden_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idproveedorDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != cuenta_pagar_control.idproveedorDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(cuenta_pagar_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cuenta_pagar_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != cuenta_pagar_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(cuenta_pagar_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(cuenta_pagar_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_cuentas_pagarsFK(cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_control.idestado_cuentas_pagarDefaultFK>-1 && jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val() != cuenta_pagar_control.idestado_cuentas_pagarDefaultFK) {
				jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar").val(cuenta_pagar_control.idestado_cuentas_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar").val(cuenta_pagar_control.idestado_cuentas_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_orden_compra(id_orden_compra,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cuenta_pagar","cuentaspagar","","id_orden_compra",id_orden_compra,"NINGUNO","",paraEventoTabla,idFilaTabla,cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_estado_cuentas_pagar").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosorden_comprasFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosproveedorsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(cuenta_pagar_control);
			}

			if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_webcontrol1.setDefectoValorCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
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
	onLoadCombosEventosFK(cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosorden_comprasFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(cuenta_pagar_control);
			//}

			//if(cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_pagar",cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_webcontrol1.registrarComboActionChangeCombosestado_cuentas_pagarsFK(cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_pagar_funcion1.validarFormularioJQuery(cuenta_pagar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_pagar");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,"cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("orden_compra","id_orden_compra","inventario","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_orden_compra_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaorden_compra("id_orden_compra");
				//alert(jQuery('#form-id_orden_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_cuentas_pagar","id_estado_cuentas_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_cuentas_pagar_img_busqueda").click(function(){
				cuenta_pagar_webcontrol1.abrirBusquedaParaestado_cuentas_pagar("id_estado_cuentas_pagar");
				//alert(jQuery('#form-id_estado_cuentas_pagar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_pagar");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_pagar_control) {
		
		
		
		if(cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_pagarActualizarToolBar").css("display",cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcuenta_pagarEliminarToolBar").css("display",cuenta_pagar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcuenta_pagarElementos").css("display",cuenta_pagar_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_pagarAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_pagarParametrosAcciones").css("display",cuenta_pagar_control.strVisibleTablaAcciones);
		
		jQuery("#tdcuenta_pagarCerrarPagina").css("display",cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tdcuenta_pagarCerrarPaginaToolBar").css("display",cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trcuenta_pagarAccionesRelaciones").css("display",cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuenta Pagars";
		sTituloBanner+=" - " + cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_pagarRelacionesToolBar").css("display",cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_pagar").css("display",cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cuenta_pagar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
						//cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cuenta_pagar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_pagar_constante1.BIG_ID_ACTUAL,"cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);
						//cuenta_pagar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_pagar","cuentaspagar","",cuenta_pagar_funcion1,cuenta_pagar_webcontrol1,cuenta_pagar_constante1);	
	}
}

var cuenta_pagar_webcontrol1 = new cuenta_pagar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_pagar_webcontrol,cuenta_pagar_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_pagar_webcontrol1 = cuenta_pagar_webcontrol1;


if(cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>