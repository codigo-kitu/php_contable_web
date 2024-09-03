//<script type="text/javascript" language="javascript">



//var paqueteJQueryPaginaWebInteraccion= function (paquete_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {paquete_constante,paquete_constante1} from '../util/paquete_constante.js';

import {paquete_funcion,paquete_funcion1} from '../util/paquete_form_funcion.js';


class paquete_webcontrol extends GeneralEntityWebControl {
	
	paquete_control=null;
	paquete_controlInicial=null;
	paquete_controlAuxiliar=null;
		
	//if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(paquete_control) {
		super();
		
		this.paquete_control=paquete_control;
	}
		
	actualizarVariablesPagina(paquete_control) {
		
		if(paquete_control.action=="index" || paquete_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(paquete_control);
			
		} 
		
		
		
	
		else if(paquete_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(paquete_control);	
		
		} else if(paquete_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(paquete_control);		
		}
	
		else if(paquete_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(paquete_control);		
		}
	
		else if(paquete_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(paquete_control);
		}
		
		
		else if(paquete_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(paquete_control);
		
		} else if(paquete_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(paquete_control);
		
		} else if(paquete_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(paquete_control);
		
		} else if(paquete_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(paquete_control);
		
		} else if(paquete_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(paquete_control);		
		
		} else if(paquete_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(paquete_control);		
		
		} 
		//else if(paquete_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(paquete_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + paquete_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(paquete_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(paquete_control) {
		this.actualizarPaginaAccionesGenerales(paquete_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(paquete_control) {
		
		this.actualizarPaginaCargaGeneral(paquete_control);
		this.actualizarPaginaOrderBy(paquete_control);
		this.actualizarPaginaTablaDatos(paquete_control);
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(paquete_control);
		this.actualizarPaginaAreaBusquedas(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(paquete_control) {
		//this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(paquete_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(paquete_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(paquete_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(paquete_control) {
		this.actualizarPaginaTablaDatosAuxiliar(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(paquete_control) {
		this.actualizarPaginaTablaDatosAuxiliar(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(paquete_control) {
		this.actualizarPaginaTablaDatosAuxiliar(paquete_control);		
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(paquete_control) {
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(paquete_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(paquete_control) {
		this.actualizarPaginaCargaGeneralControles(paquete_control);
		this.actualizarPaginaCargaCombosFK(paquete_control);
		this.actualizarPaginaFormulario(paquete_control);
		this.onLoadCombosDefectoFK(paquete_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		this.actualizarPaginaAreaMantenimiento(paquete_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(paquete_control) {
		//FORMULARIO
		if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(paquete_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(paquete_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);		
		
		//COMBOS FK
		if(paquete_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(paquete_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(paquete_control) {
		//FORMULARIO
		if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(paquete_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(paquete_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);	
		
		//COMBOS FK
		if(paquete_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(paquete_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(paquete_control) {
		//FORMULARIO
		if(paquete_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(paquete_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(paquete_control);	
		//COMBOS FK
		if(paquete_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(paquete_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(paquete_control) {
		
		if(paquete_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(paquete_control);
		}
		
		if(paquete_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(paquete_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(paquete_control) {
		if(paquete_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("paqueteReturnGeneral",JSON.stringify(paquete_control.paqueteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(paquete_control) {
		if(paquete_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && paquete_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(paquete_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(paquete_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(paquete_control, mostrar) {
		
		if(mostrar==true) {
			paquete_funcion1.resaltarRestaurarDivsPagina(false,"paquete");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				paquete_funcion1.resaltarRestaurarDivMantenimiento(false,"paquete");
			}			
			
			paquete_funcion1.mostrarDivMensaje(true,paquete_control.strAuxiliarMensaje,paquete_control.strAuxiliarCssMensaje);
		
		} else {
			paquete_funcion1.mostrarDivMensaje(false,paquete_control.strAuxiliarMensaje,paquete_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(paquete_control) {
		if(paquete_funcion1.esPaginaForm(paquete_constante1)==true) {
			window.opener.paquete_webcontrol1.actualizarPaginaTablaDatos(paquete_control);
		} else {
			this.actualizarPaginaTablaDatos(paquete_control);
		}
	}
	
	actualizarPaginaAbrirLink(paquete_control) {
		paquete_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(paquete_control.strAuxiliarUrlPagina);
				
		paquete_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(paquete_control.strAuxiliarTipo,paquete_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(paquete_control) {
		paquete_funcion1.resaltarRestaurarDivMensaje(true,paquete_control.strAuxiliarMensajeAlert,paquete_control.strAuxiliarCssMensaje);
			
		if(paquete_funcion1.esPaginaForm(paquete_constante1)==true) {
			window.opener.paquete_funcion1.resaltarRestaurarDivMensaje(true,paquete_control.strAuxiliarMensajeAlert,paquete_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(paquete_control) {
		this.paquete_controlInicial=paquete_control;
			
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(paquete_control.strStyleDivArbol,paquete_control.strStyleDivContent
																,paquete_control.strStyleDivOpcionesBanner,paquete_control.strStyleDivExpandirColapsar
																,paquete_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(paquete_control) {
		this.actualizarCssBotonesPagina(paquete_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(paquete_control.tiposReportes,paquete_control.tiposReporte
															 	,paquete_control.tiposPaginacion,paquete_control.tiposAcciones
																,paquete_control.tiposColumnasSelect,paquete_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(paquete_control.tiposRelaciones,paquete_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(paquete_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(paquete_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(paquete_control);			
	}
	
	actualizarPaginaUsuarioInvitado(paquete_control) {
	
		var indexPosition=paquete_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=paquete_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(paquete_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 
				paquete_webcontrol1.cargarCombossistemasFK(paquete_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(paquete_control.strRecargarFkTiposNinguno!=null && paquete_control.strRecargarFkTiposNinguno!='NINGUNO' && paquete_control.strRecargarFkTiposNinguno!='') {
			
				if(paquete_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTiposNinguno,",")) { 
					paquete_webcontrol1.cargarCombossistemasFK(paquete_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(paquete_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,paquete_funcion1,paquete_control.sistemasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(paquete_control) {
		jQuery("#tdpaqueteNuevo").css("display",paquete_control.strPermisoNuevo);
		jQuery("#trpaqueteElementos").css("display",paquete_control.strVisibleTablaElementos);
		jQuery("#trpaqueteAcciones").css("display",paquete_control.strVisibleTablaAcciones);
		jQuery("#trpaqueteParametrosAcciones").css("display",paquete_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(paquete_control) {
	
		this.actualizarCssBotonesMantenimiento(paquete_control);
				
		if(paquete_control.paqueteActual!=null) {//form
			
			this.actualizarCamposFormulario(paquete_control);			
		}
						
		this.actualizarSpanMensajesCampos(paquete_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(paquete_control) {
	
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id").val(paquete_control.paqueteActual.id);
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-created_at").val(paquete_control.paqueteActual.versionRow);
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-updated_at").val(paquete_control.paqueteActual.versionRow);
		
		if(paquete_control.paqueteActual.id_sistema!=null && paquete_control.paqueteActual.id_sistema>-1){
			if(jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val() != paquete_control.paqueteActual.id_sistema) {
				jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val(paquete_control.paqueteActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").select2("val", null);
			if(jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-nombre").val(paquete_control.paqueteActual.nombre);
		jQuery("#form"+paquete_constante1.STR_SUFIJO+"-descripcion").val(paquete_control.paqueteActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+paquete_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("paquete","seguridad","","form_paquete",formulario,"","",paraEventoTabla,idFilaTabla,paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	actualizarSpanMensajesCampos(paquete_control) {
		jQuery("#spanstrMensajeid").text(paquete_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(paquete_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(paquete_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_sistema").text(paquete_control.strMensajeid_sistema);		
		jQuery("#spanstrMensajenombre").text(paquete_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(paquete_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(paquete_control) {
		jQuery("#tdbtnNuevopaquete").css("visibility",paquete_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevopaquete").css("display",paquete_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarpaquete").css("visibility",paquete_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarpaquete").css("display",paquete_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarpaquete").css("visibility",paquete_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarpaquete").css("display",paquete_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarpaquete").css("visibility",paquete_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiospaquete").css("visibility",paquete_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiospaquete").css("display",paquete_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarpaquete").css("visibility",paquete_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarpaquete").css("visibility",paquete_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarpaquete").css("visibility",paquete_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(paquete_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema",paquete_control.sistemasFK);

		if(paquete_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+paquete_control.idFilaTablaActual+"_3",paquete_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",paquete_control.sistemasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(paquete_control) {

	};

	
	
	setDefectoValorCombossistemasFK(paquete_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(paquete_control.idsistemaDefaultFK>-1 && jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val() != paquete_control.idsistemaDefaultFK) {
				jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema").val(paquete_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(paquete_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+paquete_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//paquete_control
		
	
	}
	
	onLoadCombosDefectoFK(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 
				paquete_webcontrol1.setDefectoValorCombossistemasFK(paquete_control);
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
	onLoadCombosEventosFK(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(paquete_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",paquete_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				paquete_webcontrol1.registrarComboActionChangeCombossistemasFK(paquete_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(paquete_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(paquete_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(paquete_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(paquete_constante1.BIT_ES_PAGINA_FORM==true) {
				paquete_funcion1.validarFormularioJQuery(paquete_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("paquete");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("paquete");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(paquete_funcion1,paquete_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(paquete_funcion1,paquete_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(paquete_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,"paquete");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+paquete_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				paquete_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("paquete");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(paquete_control) {
		
		
		
		if(paquete_control.strPermisoActualizar!=null) {
			jQuery("#tdpaqueteActualizarToolBar").css("display",paquete_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdpaqueteEliminarToolBar").css("display",paquete_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trpaqueteElementos").css("display",paquete_control.strVisibleTablaElementos);
		
		jQuery("#trpaqueteAcciones").css("display",paquete_control.strVisibleTablaAcciones);
		jQuery("#trpaqueteParametrosAcciones").css("display",paquete_control.strVisibleTablaAcciones);
		
		jQuery("#tdpaqueteCerrarPagina").css("display",paquete_control.strPermisoPopup);		
		jQuery("#tdpaqueteCerrarPaginaToolBar").css("display",paquete_control.strPermisoPopup);
		//jQuery("#trpaqueteAccionesRelaciones").css("display",paquete_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=paquete_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + paquete_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + paquete_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Paquetes";
		sTituloBanner+=" - " + paquete_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + paquete_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpaqueteRelacionesToolBar").css("display",paquete_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospaquete").css("display",paquete_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		paquete_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		paquete_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		paquete_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		paquete_webcontrol1.registrarEventosControles();
		
		if(paquete_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(paquete_constante1.STR_ES_RELACIONADO=="false") {
			paquete_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(paquete_constante1.STR_ES_RELACIONES=="true") {
			if(paquete_constante1.BIT_ES_PAGINA_FORM==true) {
				paquete_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(paquete_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(paquete_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(paquete_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(paquete_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
						//paquete_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(paquete_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(paquete_constante1.BIG_ID_ACTUAL,"paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);
						//paquete_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			paquete_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("paquete","seguridad","",paquete_funcion1,paquete_webcontrol1,paquete_constante1);	
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

var paquete_webcontrol1 = new paquete_webcontrol();

//Para ser llamado desde otro archivo (import)
export {paquete_webcontrol,paquete_webcontrol1};

//Para ser llamado desde window.opener
window.paquete_webcontrol1 = paquete_webcontrol1;


if(paquete_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = paquete_webcontrol1.onLoadWindow; 
}

//</script>