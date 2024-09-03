//<script type="text/javascript" language="javascript">



//var accionJQueryPaginaWebInteraccion= function (accion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {accion_constante,accion_constante1} from '../util/accion_constante.js';

import {accion_funcion,accion_funcion1} from '../util/accion_form_funcion.js';


class accion_webcontrol extends GeneralEntityWebControl {
	
	accion_control=null;
	accion_controlInicial=null;
	accion_controlAuxiliar=null;
		
	//if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(accion_control) {
		super();
		
		this.accion_control=accion_control;
	}
		
	actualizarVariablesPagina(accion_control) {
		
		if(accion_control.action=="index" || accion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(accion_control);
			
		} 
		
		
		
	
		else if(accion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(accion_control);	
		
		} else if(accion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(accion_control);		
		}
	
		else if(accion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(accion_control);		
		}
	
		else if(accion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(accion_control);
		}
		
		
		else if(accion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(accion_control);
		
		} else if(accion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(accion_control);
		
		} else if(accion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(accion_control);
		
		} else if(accion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(accion_control);
		
		} else if(accion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(accion_control);
		
		} else if(accion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(accion_control);		
		
		} else if(accion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(accion_control);		
		
		} 
		//else if(accion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(accion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + accion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(accion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(accion_control) {
		this.actualizarPaginaAccionesGenerales(accion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(accion_control) {
		
		this.actualizarPaginaCargaGeneral(accion_control);
		this.actualizarPaginaOrderBy(accion_control);
		this.actualizarPaginaTablaDatos(accion_control);
		this.actualizarPaginaCargaGeneralControles(accion_control);
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(accion_control);
		this.actualizarPaginaAreaBusquedas(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(accion_control) {
		//this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(accion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(accion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(accion_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(accion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(accion_control);		
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(accion_control) {
		this.actualizarPaginaCargaGeneralControles(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);
		this.actualizarPaginaFormulario(accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(accion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(accion_control) {
		this.actualizarPaginaCargaGeneralControles(accion_control);
		this.actualizarPaginaCargaCombosFK(accion_control);
		this.actualizarPaginaFormulario(accion_control);
		this.onLoadCombosDefectoFK(accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		this.actualizarPaginaAreaMantenimiento(accion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(accion_control) {
		//FORMULARIO
		if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(accion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(accion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);		
		
		//COMBOS FK
		if(accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(accion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(accion_control) {
		//FORMULARIO
		if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(accion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(accion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);	
		
		//COMBOS FK
		if(accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(accion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(accion_control) {
		//FORMULARIO
		if(accion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(accion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(accion_control);	
		//COMBOS FK
		if(accion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(accion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(accion_control) {
		
		if(accion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(accion_control);
		}
		
		if(accion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(accion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(accion_control) {
		if(accion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("accionReturnGeneral",JSON.stringify(accion_control.accionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(accion_control) {
		if(accion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && accion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(accion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(accion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(accion_control, mostrar) {
		
		if(mostrar==true) {
			accion_funcion1.resaltarRestaurarDivsPagina(false,"accion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				accion_funcion1.resaltarRestaurarDivMantenimiento(false,"accion");
			}			
			
			accion_funcion1.mostrarDivMensaje(true,accion_control.strAuxiliarMensaje,accion_control.strAuxiliarCssMensaje);
		
		} else {
			accion_funcion1.mostrarDivMensaje(false,accion_control.strAuxiliarMensaje,accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(accion_control) {
		if(accion_funcion1.esPaginaForm(accion_constante1)==true) {
			window.opener.accion_webcontrol1.actualizarPaginaTablaDatos(accion_control);
		} else {
			this.actualizarPaginaTablaDatos(accion_control);
		}
	}
	
	actualizarPaginaAbrirLink(accion_control) {
		accion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(accion_control.strAuxiliarUrlPagina);
				
		accion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(accion_control.strAuxiliarTipo,accion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(accion_control) {
		accion_funcion1.resaltarRestaurarDivMensaje(true,accion_control.strAuxiliarMensajeAlert,accion_control.strAuxiliarCssMensaje);
			
		if(accion_funcion1.esPaginaForm(accion_constante1)==true) {
			window.opener.accion_funcion1.resaltarRestaurarDivMensaje(true,accion_control.strAuxiliarMensajeAlert,accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(accion_control) {
		this.accion_controlInicial=accion_control;
			
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(accion_control.strStyleDivArbol,accion_control.strStyleDivContent
																,accion_control.strStyleDivOpcionesBanner,accion_control.strStyleDivExpandirColapsar
																,accion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(accion_control) {
		this.actualizarCssBotonesPagina(accion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(accion_control.tiposReportes,accion_control.tiposReporte
															 	,accion_control.tiposPaginacion,accion_control.tiposAcciones
																,accion_control.tiposColumnasSelect,accion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(accion_control.tiposRelaciones,accion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(accion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(accion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(accion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(accion_control) {
	
		var indexPosition=accion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=accion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(accion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 
				accion_webcontrol1.cargarCombosopcionsFK(accion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(accion_control.strRecargarFkTiposNinguno!=null && accion_control.strRecargarFkTiposNinguno!='NINGUNO' && accion_control.strRecargarFkTiposNinguno!='') {
			
				if(accion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTiposNinguno,",")) { 
					accion_webcontrol1.cargarCombosopcionsFK(accion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaopcionFK(accion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,accion_funcion1,accion_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(accion_control) {
		jQuery("#tdaccionNuevo").css("display",accion_control.strPermisoNuevo);
		jQuery("#traccionElementos").css("display",accion_control.strVisibleTablaElementos);
		jQuery("#traccionAcciones").css("display",accion_control.strVisibleTablaAcciones);
		jQuery("#traccionParametrosAcciones").css("display",accion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(accion_control) {
	
		this.actualizarCssBotonesMantenimiento(accion_control);
				
		if(accion_control.accionActual!=null) {//form
			
			this.actualizarCamposFormulario(accion_control);			
		}
						
		this.actualizarSpanMensajesCampos(accion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(accion_control) {
	
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-id").val(accion_control.accionActual.id);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-created_at").val(accion_control.accionActual.versionRow);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-updated_at").val(accion_control.accionActual.versionRow);
		
		if(accion_control.accionActual.id_opcion!=null && accion_control.accionActual.id_opcion>-1){
			if(jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val() != accion_control.accionActual.id_opcion) {
				jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val(accion_control.accionActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").select2("val", null);
			if(jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-codigo").val(accion_control.accionActual.codigo);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-nombre").val(accion_control.accionActual.nombre);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-descripcion").val(accion_control.accionActual.descripcion);
		jQuery("#form"+accion_constante1.STR_SUFIJO+"-estado").prop('checked',accion_control.accionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+accion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("accion","seguridad","","form_accion",formulario,"","",paraEventoTabla,idFilaTabla,accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	actualizarSpanMensajesCampos(accion_control) {
		jQuery("#spanstrMensajeid").text(accion_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(accion_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(accion_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_opcion").text(accion_control.strMensajeid_opcion);		
		jQuery("#spanstrMensajecodigo").text(accion_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(accion_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(accion_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeestado").text(accion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(accion_control) {
		jQuery("#tdbtnNuevoaccion").css("visibility",accion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoaccion").css("display",accion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizaraccion").css("visibility",accion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizaraccion").css("display",accion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminaraccion").css("visibility",accion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminaraccion").css("display",accion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelaraccion").css("visibility",accion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosaccion").css("visibility",accion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosaccion").css("display",accion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBaraccion").css("visibility",accion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBaraccion").css("visibility",accion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBaraccion").css("visibility",accion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosopcionsFK(accion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+accion_constante1.STR_SUFIJO+"-id_opcion",accion_control.opcionsFK);

		if(accion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+accion_control.idFilaTablaActual+"_3",accion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",accion_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosopcionsFK(accion_control) {

	};

	
	
	setDefectoValorCombosopcionsFK(accion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(accion_control.idopcionDefaultFK>-1 && jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val() != accion_control.idopcionDefaultFK) {
				jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion").val(accion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(accion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+accion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//accion_control
		
	
	}
	
	onLoadCombosDefectoFK(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 
				accion_webcontrol1.setDefectoValorCombosopcionsFK(accion_control);
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
	onLoadCombosEventosFK(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",accion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				accion_webcontrol1.registrarComboActionChangeCombosopcionsFK(accion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(accion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(accion_constante1.BIT_ES_PAGINA_FORM==true) {
				accion_funcion1.validarFormularioJQuery(accion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("accion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("accion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(accion_funcion1,accion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(accion_funcion1,accion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(accion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("accion","seguridad","",accion_funcion1,accion_webcontrol1,"accion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+accion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				accion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("accion","seguridad","",accion_funcion1,accion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("accion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(accion_control) {
		
		
		
		if(accion_control.strPermisoActualizar!=null) {
			jQuery("#tdaccionActualizarToolBar").css("display",accion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdaccionEliminarToolBar").css("display",accion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#traccionElementos").css("display",accion_control.strVisibleTablaElementos);
		
		jQuery("#traccionAcciones").css("display",accion_control.strVisibleTablaAcciones);
		jQuery("#traccionParametrosAcciones").css("display",accion_control.strVisibleTablaAcciones);
		
		jQuery("#tdaccionCerrarPagina").css("display",accion_control.strPermisoPopup);		
		jQuery("#tdaccionCerrarPaginaToolBar").css("display",accion_control.strPermisoPopup);
		//jQuery("#traccionAccionesRelaciones").css("display",accion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Acciones";
		sTituloBanner+=" - " + accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + accion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdaccionRelacionesToolBar").css("display",accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosaccion").css("display",accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("accion","seguridad","",accion_funcion1,accion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		accion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		accion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		accion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		accion_webcontrol1.registrarEventosControles();
		
		if(accion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(accion_constante1.STR_ES_RELACIONADO=="false") {
			accion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(accion_constante1.STR_ES_RELACIONES=="true") {
			if(accion_constante1.BIT_ES_PAGINA_FORM==true) {
				accion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(accion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(accion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(accion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
						//accion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(accion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(accion_constante1.BIG_ID_ACTUAL,"accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);
						//accion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			accion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("accion","seguridad","",accion_funcion1,accion_webcontrol1,accion_constante1);	
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

var accion_webcontrol1 = new accion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {accion_webcontrol,accion_webcontrol1};

//Para ser llamado desde window.opener
window.accion_webcontrol1 = accion_webcontrol1;


if(accion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = accion_webcontrol1.onLoadWindow; 
}

//</script>