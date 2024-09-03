//<script type="text/javascript" language="javascript">



//var cuenta_cobrarJQueryPaginaWebInteraccion= function (cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_cobrar_constante,cuenta_cobrar_constante1} from '../util/cuenta_cobrar_constante.js';

import {cuenta_cobrar_funcion,cuenta_cobrar_funcion1} from '../util/cuenta_cobrar_form_funcion.js';


class cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	cuenta_cobrar_control=null;
	cuenta_cobrar_controlInicial=null;
	cuenta_cobrar_controlAuxiliar=null;
		
	//if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_cobrar_control) {
		super();
		
		this.cuenta_cobrar_control=cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(cuenta_cobrar_control) {
		
		if(cuenta_cobrar_control.action=="index" || cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_cobrar_control);
			
		} 
		
		
		
	
		else if(cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_cobrar_control);	
		
		} else if(cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_cobrar_control);		
		}
	
		else if(cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_cobrar_control);		
		}
	
		else if(cuenta_cobrar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_cobrar_control);
		}
		
		
		else if(cuenta_cobrar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_cobrar_control);		
		
		} else if(cuenta_cobrar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_cobrar_control);		
		
		} 
		//else if(cuenta_cobrar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_cobrar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_cobrar_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_cobrar_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);
		this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cuenta_cobrar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_cobrar_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);
		this.actualizarPaginaFormulario(cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_cobrar_control) {
		//FORMULARIO
		if(cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		
		//COMBOS FK
		if(cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_cobrar_control) {
		//FORMULARIO
		if(cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_cobrar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_cobrar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);	
		
		//COMBOS FK
		if(cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_cobrar_control) {
		//FORMULARIO
		if(cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_cobrar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);	
		//COMBOS FK
		if(cuenta_cobrar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_cobrar_control) {
		
		if(cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_cobrar_control);
		}
		
		if(cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_cobrar_control) {
		if(cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_cobrarReturnGeneral",JSON.stringify(cuenta_cobrar_control.cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control) {
		if(cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_cobrar");
			}			
			
			cuenta_cobrar_funcion1.mostrarDivMensaje(true,cuenta_cobrar_control.strAuxiliarMensaje,cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_cobrar_funcion1.mostrarDivMensaje(false,cuenta_cobrar_control.strAuxiliarMensaje,cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_control) {
		if(cuenta_cobrar_funcion1.esPaginaForm(cuenta_cobrar_constante1)==true) {
			window.opener.cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_cobrar_control) {
		cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_cobrar_control.strAuxiliarTipo,cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_cobrar_control) {
		cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_cobrar_control.strAuxiliarMensajeAlert,cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(cuenta_cobrar_funcion1.esPaginaForm(cuenta_cobrar_constante1)==true) {
			window.opener.cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_cobrar_control.strAuxiliarMensajeAlert,cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_cobrar_control) {
		this.cuenta_cobrar_controlInicial=cuenta_cobrar_control;
			
		if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_cobrar_control.strStyleDivArbol,cuenta_cobrar_control.strStyleDivContent
																,cuenta_cobrar_control.strStyleDivOpcionesBanner,cuenta_cobrar_control.strStyleDivExpandirColapsar
																,cuenta_cobrar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_cobrar_control.tiposReportes,cuenta_cobrar_control.tiposReporte
															 	,cuenta_cobrar_control.tiposPaginacion,cuenta_cobrar_control.tiposAcciones
																,cuenta_cobrar_control.tiposColumnasSelect,cuenta_cobrar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_cobrar_control.tiposRelaciones,cuenta_cobrar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_cobrar_control) {
	
		var indexPosition=cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosempresasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosfacturasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosclientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombostermino_pago_clientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosempresasFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosfacturasFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosclientesFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombostermino_pago_clientesFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_factura") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cuenta_cobrarActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cuenta_cobrarActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cuenta_cobrarActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablafacturaFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.facturasFK);
	}

	cargarComboEditarTablaclienteFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.clientesFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablaestado_cuentas_cobrarFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.estado_cuentas_cobrarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cuenta_cobrar_control) {
		jQuery("#tdcuenta_cobrarNuevo").css("display",cuenta_cobrar_control.strPermisoNuevo);
		jQuery("#trcuenta_cobrarElementos").css("display",cuenta_cobrar_control.strVisibleTablaElementos);
		jQuery("#trcuenta_cobrarAcciones").css("display",cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_cobrarParametrosAcciones").css("display",cuenta_cobrar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_cobrar_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_cobrar_control);
				
		if(cuenta_cobrar_control.cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_cobrar_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_cobrar_control) {
	
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id").val(cuenta_cobrar_control.cuenta_cobrarActual.id);
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-version_row").val(cuenta_cobrar_control.cuenta_cobrarActual.versionRow);
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_empresa!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_empresa) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_cobrar_control.cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_periodo!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_periodo) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_cobrar_control.cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_usuario!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_usuario) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_cobrar_control.cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_factura!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_factura>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_factura) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val(cuenta_cobrar_control.cuenta_cobrarActual.id_factura).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_cliente!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_cliente>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_cliente) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val(cuenta_cobrar_control.cuenta_cobrarActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-numero").val(cuenta_cobrar_control.cuenta_cobrarActual.numero);
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_emision").val(cuenta_cobrar_control.cuenta_cobrarActual.fecha_emision);
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_vence").val(cuenta_cobrar_control.cuenta_cobrarActual.fecha_vence);
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-fecha_ultimo_movimiento").val(cuenta_cobrar_control.cuenta_cobrarActual.fecha_ultimo_movimiento);
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-monto").val(cuenta_cobrar_control.cuenta_cobrarActual.monto);
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-saldo").val(cuenta_cobrar_control.cuenta_cobrarActual.saldo);
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-porcentaje").val(cuenta_cobrar_control.cuenta_cobrarActual.porcentaje);
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-descripcion").val(cuenta_cobrar_control.cuenta_cobrarActual.descripcion);
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar>-1){
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val(cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").select2("val", null);
			if(jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-referencia").val(cuenta_cobrar_control.cuenta_cobrarActual.referencia);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_cobrar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_cobrar","cuentascobrar","","form_cuenta_cobrar",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}
	
	actualizarSpanMensajesCampos(cuenta_cobrar_control) {
		jQuery("#spanstrMensajeid").text(cuenta_cobrar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_cobrar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_cobrar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cuenta_cobrar_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cuenta_cobrar_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cuenta_cobrar_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_cobrar_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_factura").text(cuenta_cobrar_control.strMensajeid_factura);		
		jQuery("#spanstrMensajeid_cliente").text(cuenta_cobrar_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajenumero").text(cuenta_cobrar_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(cuenta_cobrar_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajefecha_vence").text(cuenta_cobrar_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajefecha_ultimo_movimiento").text(cuenta_cobrar_control.strMensajefecha_ultimo_movimiento);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(cuenta_cobrar_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajemonto").text(cuenta_cobrar_control.strMensajemonto);		
		jQuery("#spanstrMensajesaldo").text(cuenta_cobrar_control.strMensajesaldo);		
		jQuery("#spanstrMensajeporcentaje").text(cuenta_cobrar_control.strMensajeporcentaje);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_cobrar_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado_cuentas_cobrar").text(cuenta_cobrar_control.strMensajeid_estado_cuentas_cobrar);		
		jQuery("#spanstrMensajereferencia").text(cuenta_cobrar_control.strMensajereferencia);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_cobrar_control) {
		jQuery("#tdbtnNuevocuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_cobrar").css("display",cuenta_cobrar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_cobrar").css("display",cuenta_cobrar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_cobrar").css("display",cuenta_cobrar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_cobrar").css("display",cuenta_cobrar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_cobrar").css("visibility",cuenta_cobrar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",cuenta_cobrar_control.empresasFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_2",cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",cuenta_cobrar_control.sucursalsFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_3",cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_cobrar_control.ejerciciosFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_4",cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",cuenta_cobrar_control.periodosFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_5",cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",cuenta_cobrar_control.usuariosFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_6",cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarCombosfacturasFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura",cuenta_cobrar_control.facturasFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_7",cuenta_cobrar_control.facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",cuenta_cobrar_control.facturasFK);

	};

	cargarCombosclientesFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente",cuenta_cobrar_control.clientesFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_8",cuenta_cobrar_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente",cuenta_cobrar_control.clientesFK);

	};

	cargarCombostermino_pago_clientesFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente",cuenta_cobrar_control.termino_pago_clientesFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_13",cuenta_cobrar_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente",cuenta_cobrar_control.termino_pago_clientesFK);

	};

	cargarCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar",cuenta_cobrar_control.estado_cuentas_cobrarsFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_18",cuenta_cobrar_control.estado_cuentas_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar",cuenta_cobrar_control.estado_cuentas_cobrarsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosfacturasFK(cuenta_cobrar_control) {
		this.registrarComboActionChangeid_factura("form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura",false,0);


		this.registrarComboActionChangeid_factura(""+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",false,0);


	};

	registrarComboActionChangeCombosclientesFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosfacturasFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idfacturaDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val() != cuenta_cobrar_control.idfacturaDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val(cuenta_cobrar_control.idfacturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(cuenta_cobrar_control.idfacturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idclienteDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val() != cuenta_cobrar_control.idclienteDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val(cuenta_cobrar_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente").val(cuenta_cobrar_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cuenta_cobrar_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cuenta_cobrar_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val(cuenta_cobrar_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idestado_cuentas_cobrarDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val() != cuenta_cobrar_control.idestado_cuentas_cobrarDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val(cuenta_cobrar_control.idestado_cuentas_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar").val(cuenta_cobrar_control.idestado_cuentas_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_factura(id_factura,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cuenta_cobrar","cuentascobrar","","id_factura",id_factura,"NINGUNO","",paraEventoTabla,idFilaTabla,cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_estado_cuentas_cobrar").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosfacturasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosclientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
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
	onLoadCombosEventosFK(cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosfacturasFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosclientesFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_cobrar_funcion1.validarFormularioJQuery(cuenta_cobrar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_cobrar");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,"cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura","id_factura","facturacion","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParafactura("id_factura");
				//alert(jQuery('#form-id_factura_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_cuentas_cobrar","id_estado_cuentas_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaestado_cuentas_cobrar("id_estado_cuentas_cobrar");
				//alert(jQuery('#form-id_estado_cuentas_cobrar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_cobrar");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_cobrar_control) {
		
		
		
		if(cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_cobrarActualizarToolBar").css("display",cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcuenta_cobrarEliminarToolBar").css("display",cuenta_cobrar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcuenta_cobrarElementos").css("display",cuenta_cobrar_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_cobrarAcciones").css("display",cuenta_cobrar_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_cobrarParametrosAcciones").css("display",cuenta_cobrar_control.strVisibleTablaAcciones);
		
		jQuery("#tdcuenta_cobrarCerrarPagina").css("display",cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdcuenta_cobrarCerrarPaginaToolBar").css("display",cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trcuenta_cobrarAccionesRelaciones").css("display",cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuenta Cobrars";
		sTituloBanner+=" - " + cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_cobrarRelacionesToolBar").css("display",cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_cobrar").css("display",cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cuenta_cobrar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
						//cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cuenta_cobrar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_cobrar_constante1.BIG_ID_ACTUAL,"cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
						//cuenta_cobrar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);	
	}
}

var cuenta_cobrar_webcontrol1 = new cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_cobrar_webcontrol,cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_cobrar_webcontrol1 = cuenta_cobrar_webcontrol1;


if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>