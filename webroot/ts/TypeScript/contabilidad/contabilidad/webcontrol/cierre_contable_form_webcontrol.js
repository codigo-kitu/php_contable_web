//<script type="text/javascript" language="javascript">



//var cierre_contableJQueryPaginaWebInteraccion= function (cierre_contable_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cierre_contable_constante,cierre_contable_constante1} from '../util/cierre_contable_constante.js';

import {cierre_contable_funcion,cierre_contable_funcion1} from '../util/cierre_contable_form_funcion.js';


class cierre_contable_webcontrol extends GeneralEntityWebControl {
	
	cierre_contable_control=null;
	cierre_contable_controlInicial=null;
	cierre_contable_controlAuxiliar=null;
		
	//if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cierre_contable_control) {
		super();
		
		this.cierre_contable_control=cierre_contable_control;
	}
		
	actualizarVariablesPagina(cierre_contable_control) {
		
		if(cierre_contable_control.action=="index" || cierre_contable_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cierre_contable_control);
			
		} 
		
		
		
	
		else if(cierre_contable_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cierre_contable_control);	
		
		} else if(cierre_contable_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_control);		
		}
	
		else if(cierre_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control);		
		}
	
		else if(cierre_contable_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cierre_contable_control);
		}
		
		
		else if(cierre_contable_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cierre_contable_control);		
		
		} else if(cierre_contable_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_control);		
		
		} 
		//else if(cierre_contable_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cierre_contable_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cierre_contable_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cierre_contable_control) {
		this.actualizarPaginaAccionesGenerales(cierre_contable_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cierre_contable_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_control);
		this.actualizarPaginaOrderBy(cierre_contable_control);
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cierre_contable_control) {
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cierre_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cierre_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cierre_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cierre_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_control);		
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cierre_contable_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.onLoadCombosDefectoFK(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_control) {
		//FORMULARIO
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cierre_contable_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		
		//COMBOS FK
		if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_control) {
		//FORMULARIO
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cierre_contable_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);	
		
		//COMBOS FK
		if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cierre_contable_control) {
		//FORMULARIO
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);	
		//COMBOS FK
		if(cierre_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cierre_contable_control) {
		
		if(cierre_contable_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cierre_contable_control);
		}
		
		if(cierre_contable_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cierre_contable_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cierre_contable_control) {
		if(cierre_contable_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cierre_contableReturnGeneral",JSON.stringify(cierre_contable_control.cierre_contableReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control) {
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cierre_contable_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cierre_contable_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cierre_contable_control, mostrar) {
		
		if(mostrar==true) {
			cierre_contable_funcion1.resaltarRestaurarDivsPagina(false,"cierre_contable");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cierre_contable_funcion1.resaltarRestaurarDivMantenimiento(false,"cierre_contable");
			}			
			
			cierre_contable_funcion1.mostrarDivMensaje(true,cierre_contable_control.strAuxiliarMensaje,cierre_contable_control.strAuxiliarCssMensaje);
		
		} else {
			cierre_contable_funcion1.mostrarDivMensaje(false,cierre_contable_control.strAuxiliarMensaje,cierre_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cierre_contable_control) {
		if(cierre_contable_funcion1.esPaginaForm(cierre_contable_constante1)==true) {
			window.opener.cierre_contable_webcontrol1.actualizarPaginaTablaDatos(cierre_contable_control);
		} else {
			this.actualizarPaginaTablaDatos(cierre_contable_control);
		}
	}
	
	actualizarPaginaAbrirLink(cierre_contable_control) {
		cierre_contable_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cierre_contable_control.strAuxiliarUrlPagina);
				
		cierre_contable_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cierre_contable_control.strAuxiliarTipo,cierre_contable_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cierre_contable_control) {
		cierre_contable_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_control.strAuxiliarMensajeAlert,cierre_contable_control.strAuxiliarCssMensaje);
			
		if(cierre_contable_funcion1.esPaginaForm(cierre_contable_constante1)==true) {
			window.opener.cierre_contable_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_control.strAuxiliarMensajeAlert,cierre_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cierre_contable_control) {
		this.cierre_contable_controlInicial=cierre_contable_control;
			
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cierre_contable_control.strStyleDivArbol,cierre_contable_control.strStyleDivContent
																,cierre_contable_control.strStyleDivOpcionesBanner,cierre_contable_control.strStyleDivExpandirColapsar
																,cierre_contable_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cierre_contable_control) {
		this.actualizarCssBotonesPagina(cierre_contable_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cierre_contable_control.tiposReportes,cierre_contable_control.tiposReporte
															 	,cierre_contable_control.tiposPaginacion,cierre_contable_control.tiposAcciones
																,cierre_contable_control.tiposColumnasSelect,cierre_contable_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cierre_contable_control.tiposRelaciones,cierre_contable_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cierre_contable_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cierre_contable_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cierre_contable_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cierre_contable_control) {
	
		var indexPosition=cierre_contable_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cierre_contable_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cierre_contable_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosempresasFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosejerciciosFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosperiodosFK(cierre_contable_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cierre_contable_control.strRecargarFkTiposNinguno!=null && cierre_contable_control.strRecargarFkTiposNinguno!='NINGUNO' && cierre_contable_control.strRecargarFkTiposNinguno!='') {
			
				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosempresasFK(cierre_contable_control);
				}

				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosejerciciosFK(cierre_contable_control);
				}

				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosperiodosFK(cierre_contable_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.periodosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cierre_contable_control) {
		jQuery("#tdcierre_contableNuevo").css("display",cierre_contable_control.strPermisoNuevo);
		jQuery("#trcierre_contableElementos").css("display",cierre_contable_control.strVisibleTablaElementos);
		jQuery("#trcierre_contableAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contableParametrosAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cierre_contable_control) {
	
		this.actualizarCssBotonesMantenimiento(cierre_contable_control);
				
		if(cierre_contable_control.cierre_contableActual!=null) {//form
			
			this.actualizarCamposFormulario(cierre_contable_control);			
		}
						
		this.actualizarSpanMensajesCampos(cierre_contable_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cierre_contable_control) {
	
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id").val(cierre_contable_control.cierre_contableActual.id);
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-version_row").val(cierre_contable_control.cierre_contableActual.versionRow);
		
		if(cierre_contable_control.cierre_contableActual.id_empresa!=null && cierre_contable_control.cierre_contableActual.id_empresa>-1){
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val() != cierre_contable_control.cierre_contableActual.id_empresa) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val(cierre_contable_control.cierre_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_ejercicio!=null && cierre_contable_control.cierre_contableActual.id_ejercicio>-1){
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val() != cierre_contable_control.cierre_contableActual.id_ejercicio) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val(cierre_contable_control.cierre_contableActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_periodo!=null && cierre_contable_control.cierre_contableActual.id_periodo>-1){
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val() != cierre_contable_control.cierre_contableActual.id_periodo) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val(cierre_contable_control.cierre_contableActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-fecha_cierre").val(cierre_contable_control.cierre_contableActual.fecha_cierre);
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-gan_per").val(cierre_contable_control.cierre_contableActual.gan_per);
		jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-total_cuentas").val(cierre_contable_control.cierre_contableActual.total_cuentas);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cierre_contable_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cierre_contable","contabilidad","","form_cierre_contable",formulario,"","",paraEventoTabla,idFilaTabla,cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	actualizarSpanMensajesCampos(cierre_contable_control) {
		jQuery("#spanstrMensajeid").text(cierre_contable_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cierre_contable_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cierre_contable_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_ejercicio").text(cierre_contable_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cierre_contable_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajefecha_cierre").text(cierre_contable_control.strMensajefecha_cierre);		
		jQuery("#spanstrMensajegan_per").text(cierre_contable_control.strMensajegan_per);		
		jQuery("#spanstrMensajetotal_cuentas").text(cierre_contable_control.strMensajetotal_cuentas);		
	}
	
	actualizarCssBotonesMantenimiento(cierre_contable_control) {
		jQuery("#tdbtnNuevocierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocierre_contable").css("display",cierre_contable_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcierre_contable").css("display",cierre_contable_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcierre_contable").css("display",cierre_contable_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscierre_contable").css("display",cierre_contable_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcierre_contable").css("visibility",cierre_contable_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa",cierre_contable_control.empresasFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_2",cierre_contable_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio",cierre_contable_control.ejerciciosFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_3",cierre_contable_control.ejerciciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio",cierre_contable_control.ejerciciosFK);

	};

	cargarCombosperiodosFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo",cierre_contable_control.periodosFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_4",cierre_contable_control.periodosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo",cierre_contable_control.periodosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cierre_contable_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cierre_contable_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cierre_contable_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idempresaDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val() != cierre_contable_control.idempresaDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val(cierre_contable_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idejercicioDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val() != cierre_contable_control.idejercicioDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val(cierre_contable_control.idejercicioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(cierre_contable_control.idejercicioDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idperiodoDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val() != cierre_contable_control.idperiodoDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val(cierre_contable_control.idperiodoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(cierre_contable_control.idperiodoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cierre_contable_control
		
	
	}
	
	onLoadCombosDefectoFK(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosempresasFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosejerciciosFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosperiodosFK(cierre_contable_control);
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
	onLoadCombosEventosFK(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosempresasFK(cierre_contable_control);
			//}

			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cierre_contable_control);
			//}

			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosperiodosFK(cierre_contable_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cierre_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_funcion1.validarFormularioJQuery(cierre_contable_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cierre_contable");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cierre_contable");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cierre_contable_funcion1,cierre_contable_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cierre_contable_funcion1,cierre_contable_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cierre_contable_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,"cierre_contable");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cierre_contable");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cierre_contable_control) {
		
		
		
		if(cierre_contable_control.strPermisoActualizar!=null) {
			jQuery("#tdcierre_contableActualizarToolBar").css("display",cierre_contable_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcierre_contableEliminarToolBar").css("display",cierre_contable_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcierre_contableElementos").css("display",cierre_contable_control.strVisibleTablaElementos);
		
		jQuery("#trcierre_contableAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contableParametrosAcciones").css("display",cierre_contable_control.strVisibleTablaAcciones);
		
		jQuery("#tdcierre_contableCerrarPagina").css("display",cierre_contable_control.strPermisoPopup);		
		jQuery("#tdcierre_contableCerrarPaginaToolBar").css("display",cierre_contable_control.strPermisoPopup);
		//jQuery("#trcierre_contableAccionesRelaciones").css("display",cierre_contable_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cierre_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cierre_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cierres Contableses";
		sTituloBanner+=" - " + cierre_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcierre_contableRelacionesToolBar").css("display",cierre_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscierre_contable").css("display",cierre_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cierre_contable_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cierre_contable_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cierre_contable_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cierre_contable_webcontrol1.registrarEventosControles();
		
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			cierre_contable_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cierre_contable_constante1.STR_ES_RELACIONES=="true") {
			if(cierre_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cierre_contable_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cierre_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cierre_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cierre_contable_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
						//cierre_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cierre_contable_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cierre_contable_constante1.BIG_ID_ACTUAL,"cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
						//cierre_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cierre_contable_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);	
	}
}

var cierre_contable_webcontrol1 = new cierre_contable_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cierre_contable_webcontrol,cierre_contable_webcontrol1};

//Para ser llamado desde window.opener
window.cierre_contable_webcontrol1 = cierre_contable_webcontrol1;


if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cierre_contable_webcontrol1.onLoadWindow; 
}

//</script>