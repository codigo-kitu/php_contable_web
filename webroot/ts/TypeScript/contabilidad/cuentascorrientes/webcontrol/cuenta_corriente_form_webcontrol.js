//<script type="text/javascript" language="javascript">



//var cuenta_corrienteJQueryPaginaWebInteraccion= function (cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_corriente_constante,cuenta_corriente_constante1} from '../util/cuenta_corriente_constante.js';

import {cuenta_corriente_funcion,cuenta_corriente_funcion1} from '../util/cuenta_corriente_form_funcion.js';


class cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	cuenta_corriente_control=null;
	cuenta_corriente_controlInicial=null;
	cuenta_corriente_controlAuxiliar=null;
		
	//if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_corriente_control) {
		super();
		
		this.cuenta_corriente_control=cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(cuenta_corriente_control) {
		
		if(cuenta_corriente_control.action=="index" || cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_corriente_control);
			
		} 
		
		
		
	
		else if(cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_corriente_control);	
		
		} else if(cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_control);		
		}
	
		else if(cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control);		
		}
	
		else if(cuenta_corriente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_control);
		}
		
		
		else if(cuenta_corriente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_corriente_control);		
		
		} 
		//else if(cuenta_corriente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_corriente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_control);
		this.actualizarPaginaOrderBy(cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cuenta_corriente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_corriente_control) {
		//FORMULARIO
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		
		//COMBOS FK
		if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_corriente_control) {
		//FORMULARIO
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_corriente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);	
		
		//COMBOS FK
		if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_corriente_control) {
		//FORMULARIO
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);	
		//COMBOS FK
		if(cuenta_corriente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_corriente_control) {
		
		if(cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_corriente_control);
		}
		
		if(cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_corriente_control) {
		if(cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_corrienteReturnGeneral",JSON.stringify(cuenta_corriente_control.cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control) {
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente");
			}			
			
			cuenta_corriente_funcion1.mostrarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensaje,cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_corriente_funcion1.mostrarDivMensaje(false,cuenta_corriente_control.strAuxiliarMensaje,cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control) {
		if(cuenta_corriente_funcion1.esPaginaForm(cuenta_corriente_constante1)==true) {
			window.opener.cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_corriente_control) {
		cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_corriente_control.strAuxiliarUrlPagina);
				
		cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_corriente_control.strAuxiliarTipo,cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_corriente_control) {
		cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensajeAlert,cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(cuenta_corriente_funcion1.esPaginaForm(cuenta_corriente_constante1)==true) {
			window.opener.cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensajeAlert,cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_corriente_control) {
		this.cuenta_corriente_controlInicial=cuenta_corriente_control;
			
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_corriente_control.strStyleDivArbol,cuenta_corriente_control.strStyleDivContent
																,cuenta_corriente_control.strStyleDivOpcionesBanner,cuenta_corriente_control.strStyleDivExpandirColapsar
																,cuenta_corriente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_corriente_control.tiposReportes,cuenta_corriente_control.tiposReporte
															 	,cuenta_corriente_control.tiposPaginacion,cuenta_corriente_control.tiposAcciones
																,cuenta_corriente_control.tiposColumnasSelect,cuenta_corriente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_corriente_control.tiposRelaciones,cuenta_corriente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_corriente_control) {
	
		var indexPosition=cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosempresasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosbancosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarComboscuentasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_corriente_control.strRecargarFkTiposNinguno!=null && cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosempresasFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosbancosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarComboscuentasFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablabancoFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.bancosFK);
	}

	cargarComboEditarTablacuentaFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.cuentasFK);
	}

	cargarComboEditarTablaestado_cuentas_corrientesFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.estado_cuentas_corrientessFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cuenta_corriente_control) {
		jQuery("#tdcuenta_corrienteNuevo").css("display",cuenta_corriente_control.strPermisoNuevo);
		jQuery("#trcuenta_corrienteElementos").css("display",cuenta_corriente_control.strVisibleTablaElementos);
		jQuery("#trcuenta_corrienteAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_corrienteParametrosAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_corriente_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_corriente_control);
				
		if(cuenta_corriente_control.cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_corriente_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_corriente_control) {
	
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id").val(cuenta_corriente_control.cuenta_corrienteActual.id);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-version_row").val(cuenta_corriente_control.cuenta_corrienteActual.versionRow);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_empresa!=null && cuenta_corriente_control.cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_control.cuenta_corrienteActual.id_empresa) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_control.cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_usuario!=null && cuenta_corriente_control.cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_control.cuenta_corrienteActual.id_usuario) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_control.cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_banco!=null && cuenta_corriente_control.cuenta_corrienteActual.id_banco>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val() != cuenta_corriente_control.cuenta_corrienteActual.id_banco) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val(cuenta_corriente_control.cuenta_corrienteActual.id_banco).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-numero_cuenta").val(cuenta_corriente_control.cuenta_corrienteActual.numero_cuenta);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-balance_inicial").val(cuenta_corriente_control.cuenta_corrienteActual.balance_inicial);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-saldo").val(cuenta_corriente_control.cuenta_corrienteActual.saldo);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-contador_cheque").val(cuenta_corriente_control.cuenta_corrienteActual.contador_cheque);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta!=null && cuenta_corriente_control.cuenta_corrienteActual.id_cuenta>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_corriente_control.cuenta_corrienteActual.id_cuenta) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-descripcion").val(cuenta_corriente_control.cuenta_corrienteActual.descripcion);
		jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-icono").val(cuenta_corriente_control.cuenta_corrienteActual.icono);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes!=null && cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes>-1){
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val() != cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_corriente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_corriente","cuentascorrientes","","form_cuenta_corriente",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	actualizarSpanMensajesCampos(cuenta_corriente_control) {
		jQuery("#spanstrMensajeid").text(cuenta_corriente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_corriente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_corriente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_corriente_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_banco").text(cuenta_corriente_control.strMensajeid_banco);		
		jQuery("#spanstrMensajenumero_cuenta").text(cuenta_corriente_control.strMensajenumero_cuenta);		
		jQuery("#spanstrMensajebalance_inicial").text(cuenta_corriente_control.strMensajebalance_inicial);		
		jQuery("#spanstrMensajesaldo").text(cuenta_corriente_control.strMensajesaldo);		
		jQuery("#spanstrMensajecontador_cheque").text(cuenta_corriente_control.strMensajecontador_cheque);		
		jQuery("#spanstrMensajeid_cuenta").text(cuenta_corriente_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_corriente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeicono").text(cuenta_corriente_control.strMensajeicono);		
		jQuery("#spanstrMensajeid_estado_cuentas_corrientes").text(cuenta_corriente_control.strMensajeid_estado_cuentas_corrientes);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_corriente_control) {
		jQuery("#tdbtnNuevocuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_corriente").css("display",cuenta_corriente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_corriente").css("display",cuenta_corriente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_corriente").css("display",cuenta_corriente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_corriente").css("display",cuenta_corriente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_corriente").css("visibility",cuenta_corriente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",cuenta_corriente_control.empresasFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_2",cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombosusuariosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",cuenta_corriente_control.usuariosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_3",cuenta_corriente_control.usuariosFK);
		}
	};

	cargarCombosbancosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco",cuenta_corriente_control.bancosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_4",cuenta_corriente_control.bancosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco",cuenta_corriente_control.bancosFK);

	};

	cargarComboscuentasFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta",cuenta_corriente_control.cuentasFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_9",cuenta_corriente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cuenta_corriente_control.cuentasFK);

	};

	cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes",cuenta_corriente_control.estado_cuentas_corrientessFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_12",cuenta_corriente_control.estado_cuentas_corrientessFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes",cuenta_corriente_control.estado_cuentas_corrientessFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosbancosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuentasFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosbancosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idbancoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val() != cuenta_corriente_control.idbancoDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val(cuenta_corriente_control.idbancoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(cuenta_corriente_control.idbancoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idcuentaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_corriente_control.idcuentaDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_corriente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cuenta_corriente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val() != cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val(cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val(cuenta_corriente_control.idestado_cuentas_corrientesDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	



		jQuery("#form-id_estado_cuentas_corrientes").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosbancosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorComboscuentasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
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
	onLoadCombosEventosFK(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosbancosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuentasFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_corriente_funcion1.validarFormularioJQuery(cuenta_corriente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_corriente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,"cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("banco","id_banco","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParabanco("id_banco");
				//alert(jQuery('#form-id_banco_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_cuentas_corrientes","id_estado_cuentas_corrientes","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaestado_cuentas_corrientes("id_estado_cuentas_corrientes");
				//alert(jQuery('#form-id_estado_cuentas_corrientes_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_corriente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_corriente_control) {
		
		
		
		if(cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_corrienteActualizarToolBar").css("display",cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcuenta_corrienteEliminarToolBar").css("display",cuenta_corriente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcuenta_corrienteElementos").css("display",cuenta_corriente_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_corrienteAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_corrienteParametrosAcciones").css("display",cuenta_corriente_control.strVisibleTablaAcciones);
		
		jQuery("#tdcuenta_corrienteCerrarPagina").css("display",cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tdcuenta_corrienteCerrarPaginaToolBar").css("display",cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trcuenta_corrienteAccionesRelaciones").css("display",cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuenta Corrientes";
		sTituloBanner+=" - " + cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_corrienteRelacionesToolBar").css("display",cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_corriente").css("display",cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cuenta_corriente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
						//cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cuenta_corriente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_corriente_constante1.BIG_ID_ACTUAL,"cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
						//cuenta_corriente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);	
	}
}

var cuenta_corriente_webcontrol1 = new cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_corriente_webcontrol,cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_corriente_webcontrol1 = cuenta_corriente_webcontrol1;


if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>