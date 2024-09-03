//<script type="text/javascript" language="javascript">



//var cuentaJQueryPaginaWebInteraccion= function (cuenta_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_constante,cuenta_constante1} from '../util/cuenta_constante.js';

import {cuenta_funcion,cuenta_funcion1} from '../util/cuenta_form_funcion.js';


class cuenta_webcontrol extends GeneralEntityWebControl {
	
	cuenta_control=null;
	cuenta_controlInicial=null;
	cuenta_controlAuxiliar=null;
		
	//if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_control) {
		super();
		
		this.cuenta_control=cuenta_control;
	}
		
	actualizarVariablesPagina(cuenta_control) {
		
		if(cuenta_control.action=="index" || cuenta_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_control);
			
		} 
		
		
		
	
		else if(cuenta_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_control);	
		
		} else if(cuenta_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_control);		
		}
	
		else if(cuenta_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_control);		
		}
	
		else if(cuenta_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_control);
		}
		
		
		else if(cuenta_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_control);
		
		} else if(cuenta_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_control);
		
		} else if(cuenta_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_control);
		
		} else if(cuenta_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_control);
		
		} else if(cuenta_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_control);		
		
		} else if(cuenta_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_control);		
		
		} 
		//else if(cuenta_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_control);		
		//}

		else if(cuenta_control.action=="abrirArbol") {
			this.actualizarVariablesPaginaAccionAbrirArbol(cuenta_control);
		}
		else if(cuenta_control.action=="cargarArbol") {
			this.actualizarVariablesPaginaAccionCargarArbol(cuenta_control);
		}
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_control);
		this.actualizarPaginaOrderBy(cuenta_control);
		this.actualizarPaginaTablaDatos(cuenta_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_control);
		this.actualizarPaginaAreaBusquedas(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_control) {
		//this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_control);		
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cuenta_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_control);
		this.actualizarPaginaCargaCombosFK(cuenta_control);
		this.actualizarPaginaFormulario(cuenta_control);
		this.onLoadCombosDefectoFK(cuenta_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_control) {
		//FORMULARIO
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);		
		
		//COMBOS FK
		if(cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_control) {
		//FORMULARIO
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);	
		
		//COMBOS FK
		if(cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_control) {
		//FORMULARIO
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_control);	
		//COMBOS FK
		if(cuenta_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_control);
		}
	}
	
	actualizarVariablesPaginaAccionAbrirArbol(cuenta_control) {
		
	}
	
	actualizarVariablesPaginaAccionCargarArbol(cuenta_control) {
		
	}
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_control) {
		
		if(cuenta_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_control);
		}
		
		if(cuenta_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_control) {
		if(cuenta_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuentaReturnGeneral",JSON.stringify(cuenta_control.cuentaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_control) {
		if(cuenta_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_funcion1.resaltarRestaurarDivsPagina(false,"cuenta");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta");
			}			
			
			cuenta_funcion1.mostrarDivMensaje(true,cuenta_control.strAuxiliarMensaje,cuenta_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_funcion1.mostrarDivMensaje(false,cuenta_control.strAuxiliarMensaje,cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_control) {
		if(cuenta_funcion1.esPaginaForm(cuenta_constante1)==true) {
			window.opener.cuenta_webcontrol1.actualizarPaginaTablaDatos(cuenta_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_control) {
		cuenta_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_control.strAuxiliarUrlPagina);
				
		cuenta_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_control.strAuxiliarTipo,cuenta_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_control) {
		cuenta_funcion1.resaltarRestaurarDivMensaje(true,cuenta_control.strAuxiliarMensajeAlert,cuenta_control.strAuxiliarCssMensaje);
			
		if(cuenta_funcion1.esPaginaForm(cuenta_constante1)==true) {
			window.opener.cuenta_funcion1.resaltarRestaurarDivMensaje(true,cuenta_control.strAuxiliarMensajeAlert,cuenta_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_control) {
		this.cuenta_controlInicial=cuenta_control;
			
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_control.strStyleDivArbol,cuenta_control.strStyleDivContent
																,cuenta_control.strStyleDivOpcionesBanner,cuenta_control.strStyleDivExpandirColapsar
																,cuenta_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_control) {
		this.actualizarCssBotonesPagina(cuenta_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_control.tiposReportes,cuenta_control.tiposReporte
															 	,cuenta_control.tiposPaginacion,cuenta_control.tiposAcciones
																,cuenta_control.tiposColumnasSelect,cuenta_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_control.tiposRelaciones,cuenta_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_control) {
	
		var indexPosition=cuenta_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombosempresasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombostipo_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.cargarComboscuentasFK(cuenta_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_control.strRecargarFkTiposNinguno!=null && cuenta_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombosempresasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombostipo_cuentasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_control);
				}

				if(cuenta_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_webcontrol1.cargarComboscuentasFK(cuenta_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.empresasFK);
	}

	cargarComboEditarTablatipo_cuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.tipo_cuentasFK);
	}

	cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.tipo_nivel_cuentasFK);
	}

	cargarComboEditarTablacuentaFK(cuenta_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_funcion1,cuenta_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cuenta_control) {
		jQuery("#tdcuentaNuevo").css("display",cuenta_control.strPermisoNuevo);
		jQuery("#trcuentaElementos").css("display",cuenta_control.strVisibleTablaElementos);
		jQuery("#trcuentaAcciones").css("display",cuenta_control.strVisibleTablaAcciones);
		jQuery("#trcuentaParametrosAcciones").css("display",cuenta_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_control);
				
		if(cuenta_control.cuentaActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_control) {
	
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id").val(cuenta_control.cuentaActual.id);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-version_row").val(cuenta_control.cuentaActual.versionRow);
		
		if(cuenta_control.cuentaActual.id_empresa!=null && cuenta_control.cuentaActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_control.cuentaActual.id_empresa) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_control.cuentaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_cuenta!=null && cuenta_control.cuentaActual.id_tipo_cuenta>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_control.cuentaActual.id_tipo_cuenta) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_control.cuentaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_tipo_nivel_cuenta!=null && cuenta_control.cuentaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_control.cuentaActual.id_tipo_nivel_cuenta) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_control.cuentaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_control.cuentaActual.id_cuenta!=null && cuenta_control.cuentaActual.id_cuenta>-1){
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_control.cuentaActual.id_cuenta) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_control.cuentaActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-codigo").val(cuenta_control.cuentaActual.codigo);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-nombre").val(cuenta_control.cuentaActual.nombre);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-nivel_cuenta").val(cuenta_control.cuentaActual.nivel_cuenta);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-usa_monto_base").prop('checked',cuenta_control.cuentaActual.usa_monto_base);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-monto_base").val(cuenta_control.cuentaActual.monto_base);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-porcentaje_base").val(cuenta_control.cuentaActual.porcentaje_base);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-con_centro_costos").prop('checked',cuenta_control.cuentaActual.con_centro_costos);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-con_ruc").prop('checked',cuenta_control.cuentaActual.con_ruc);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-balance").val(cuenta_control.cuentaActual.balance);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-descripcion").val(cuenta_control.cuentaActual.descripcion);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-con_retencion").prop('checked',cuenta_control.cuentaActual.con_retencion);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-valor_retencion").val(cuenta_control.cuentaActual.valor_retencion);
		jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-ultima_transaccion").val(cuenta_control.cuentaActual.ultima_transaccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta","contabilidad","","form_cuenta",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	actualizarSpanMensajesCampos(cuenta_control) {
		jQuery("#spanstrMensajeid").text(cuenta_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_cuenta").text(cuenta_control.strMensajeid_tipo_cuenta);		
		jQuery("#spanstrMensajeid_tipo_nivel_cuenta").text(cuenta_control.strMensajeid_tipo_nivel_cuenta);		
		jQuery("#spanstrMensajeid_cuenta").text(cuenta_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajecodigo").text(cuenta_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(cuenta_control.strMensajenombre);		
		jQuery("#spanstrMensajenivel_cuenta").text(cuenta_control.strMensajenivel_cuenta);		
		jQuery("#spanstrMensajeusa_monto_base").text(cuenta_control.strMensajeusa_monto_base);		
		jQuery("#spanstrMensajemonto_base").text(cuenta_control.strMensajemonto_base);		
		jQuery("#spanstrMensajeporcentaje_base").text(cuenta_control.strMensajeporcentaje_base);		
		jQuery("#spanstrMensajecon_centro_costos").text(cuenta_control.strMensajecon_centro_costos);		
		jQuery("#spanstrMensajecon_ruc").text(cuenta_control.strMensajecon_ruc);		
		jQuery("#spanstrMensajebalance").text(cuenta_control.strMensajebalance);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_control.strMensajedescripcion);		
		jQuery("#spanstrMensajecon_retencion").text(cuenta_control.strMensajecon_retencion);		
		jQuery("#spanstrMensajevalor_retencion").text(cuenta_control.strMensajevalor_retencion);		
		jQuery("#spanstrMensajeultima_transaccion").text(cuenta_control.strMensajeultima_transaccion);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_control) {
		jQuery("#tdbtnNuevocuenta").css("visibility",cuenta_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta").css("display",cuenta_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta").css("visibility",cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta").css("display",cuenta_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta").css("visibility",cuenta_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta").css("display",cuenta_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta").css("visibility",cuenta_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta").css("visibility",cuenta_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta").css("display",cuenta_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta").css("visibility",cuenta_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta").css("visibility",cuenta_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta").css("visibility",cuenta_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa",cuenta_control.empresasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_2",cuenta_control.empresasFK);
		}
	};

	cargarCombostipo_cuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta",cuenta_control.tipo_cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_3",cuenta_control.tipo_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta",cuenta_control.tipo_cuentasFK);

	};

	cargarCombostipo_nivel_cuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta",cuenta_control.tipo_nivel_cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_4",cuenta_control.tipo_nivel_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta",cuenta_control.tipo_nivel_cuentasFK);

	};

	cargarComboscuentasFK(cuenta_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta",cuenta_control.cuentasFK);

		if(cuenta_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_control.idFilaTablaActual+"_5",cuenta_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cuenta_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_control) {

	};

	registrarComboActionChangeCombostipo_cuentasFK(cuenta_control) {

	};

	registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_control) {

	};

	registrarComboActionChangeComboscuentasFK(cuenta_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idtipo_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_control.idtipo_cuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_control.idtipo_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(cuenta_control.idtipo_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_nivel_cuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idtipo_nivel_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_control.idtipo_nivel_cuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_control.idtipo_nivel_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(cuenta_control.idtipo_nivel_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cuenta_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_control.idcuentaDefaultFK>-1 && jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_control.idcuentaDefaultFK) {
				jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cuenta_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombosempresasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombostipo_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorCombostipo_nivel_cuentasFK(cuenta_control);
			}

			if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 
				cuenta_webcontrol1.setDefectoValorComboscuentasFK(cuenta_control);
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
	onLoadCombosEventosFK(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombostipo_cuentasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_control);
			//}

			//if(cuenta_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_webcontrol1.registrarComboActionChangeComboscuentasFK(cuenta_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_funcion1.validarFormularioJQuery(cuenta_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta");		
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_funcion1,cuenta_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_funcion1,cuenta_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,"cuenta");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta","id_tipo_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParatipo_cuenta("id_tipo_cuenta");
				//alert(jQuery('#form-id_tipo_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_nivel_cuenta","id_tipo_nivel_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParatipo_nivel_cuenta("id_tipo_nivel_cuenta");
				//alert(jQuery('#form-id_tipo_nivel_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cuenta_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_control) {
		
		
		
		if(cuenta_control.strPermisoActualizar!=null) {
			jQuery("#tdcuentaActualizarToolBar").css("display",cuenta_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcuentaEliminarToolBar").css("display",cuenta_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcuentaElementos").css("display",cuenta_control.strVisibleTablaElementos);
		
		jQuery("#trcuentaAcciones").css("display",cuenta_control.strVisibleTablaAcciones);
		jQuery("#trcuentaParametrosAcciones").css("display",cuenta_control.strVisibleTablaAcciones);
		
		jQuery("#tdcuentaCerrarPagina").css("display",cuenta_control.strPermisoPopup);		
		jQuery("#tdcuentaCerrarPaginaToolBar").css("display",cuenta_control.strPermisoPopup);
		//jQuery("#trcuentaAccionesRelaciones").css("display",cuenta_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuentases";
		sTituloBanner+=" - " + cuenta_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuentaRelacionesToolBar").css("display",cuenta_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta").css("display",cuenta_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_webcontrol1.registrarEventosControles();
		
		if(cuenta_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cuenta_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cuenta_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
						//cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cuenta_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_constante1.BIG_ID_ACTUAL,"cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);
						//cuenta_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cuenta_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta","contabilidad","",cuenta_funcion1,cuenta_webcontrol1,cuenta_constante1);	
	}
}

var cuenta_webcontrol1 = new cuenta_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_webcontrol,cuenta_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_webcontrol1 = cuenta_webcontrol1;


if(cuenta_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_webcontrol1.onLoadWindow; 
}

//</script>