//<script type="text/javascript" language="javascript">



//var perfilJQueryPaginaWebInteraccion= function (perfil_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_constante,perfil_constante1} from '../util/perfil_constante.js';

import {perfil_funcion,perfil_funcion1} from '../util/perfil_form_funcion.js';


class perfil_webcontrol extends GeneralEntityWebControl {
	
	perfil_control=null;
	perfil_controlInicial=null;
	perfil_controlAuxiliar=null;
		
	//if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_control) {
		super();
		
		this.perfil_control=perfil_control;
	}
		
	actualizarVariablesPagina(perfil_control) {
		
		if(perfil_control.action=="index" || perfil_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_control);
			
		} 
		
		
		
	
		else if(perfil_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_control);	
		
		} else if(perfil_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_control);		
		}
	
		else if(perfil_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_control);		
		}
	
		else if(perfil_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(perfil_control);
		}
		
		
		else if(perfil_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(perfil_control);
		
		} else if(perfil_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(perfil_control);
		
		} else if(perfil_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(perfil_control);
		
		} else if(perfil_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_control);
		
		} else if(perfil_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(perfil_control);		
		
		} else if(perfil_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_control);		
		
		} 
		//else if(perfil_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_control) {
		this.actualizarPaginaAccionesGenerales(perfil_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_control);
		this.actualizarPaginaOrderBy(perfil_control);
		this.actualizarPaginaTablaDatos(perfil_control);
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_control);
		this.actualizarPaginaAreaBusquedas(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_control) {
		//this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(perfil_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(perfil_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(perfil_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(perfil_control) {
		this.actualizarPaginaTablaDatosAuxiliar(perfil_control);		
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(perfil_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(perfil_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(perfil_control) {
		this.actualizarPaginaCargaGeneralControles(perfil_control);
		this.actualizarPaginaCargaCombosFK(perfil_control);
		this.actualizarPaginaFormulario(perfil_control);
		this.onLoadCombosDefectoFK(perfil_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(perfil_control) {
		//FORMULARIO
		if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);		
		
		//COMBOS FK
		if(perfil_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(perfil_control) {
		//FORMULARIO
		if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(perfil_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);	
		
		//COMBOS FK
		if(perfil_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(perfil_control) {
		//FORMULARIO
		if(perfil_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(perfil_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_control);	
		//COMBOS FK
		if(perfil_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(perfil_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_control) {
		
		if(perfil_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_control);
		}
		
		if(perfil_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_control) {
		if(perfil_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfilReturnGeneral",JSON.stringify(perfil_control.perfilReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_control) {
		if(perfil_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_control, mostrar) {
		
		if(mostrar==true) {
			perfil_funcion1.resaltarRestaurarDivsPagina(false,"perfil");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil");
			}			
			
			perfil_funcion1.mostrarDivMensaje(true,perfil_control.strAuxiliarMensaje,perfil_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_funcion1.mostrarDivMensaje(false,perfil_control.strAuxiliarMensaje,perfil_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_control) {
		if(perfil_funcion1.esPaginaForm(perfil_constante1)==true) {
			window.opener.perfil_webcontrol1.actualizarPaginaTablaDatos(perfil_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_control) {
		perfil_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_control.strAuxiliarUrlPagina);
				
		perfil_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_control.strAuxiliarTipo,perfil_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_control) {
		perfil_funcion1.resaltarRestaurarDivMensaje(true,perfil_control.strAuxiliarMensajeAlert,perfil_control.strAuxiliarCssMensaje);
			
		if(perfil_funcion1.esPaginaForm(perfil_constante1)==true) {
			window.opener.perfil_funcion1.resaltarRestaurarDivMensaje(true,perfil_control.strAuxiliarMensajeAlert,perfil_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_control) {
		this.perfil_controlInicial=perfil_control;
			
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_control.strStyleDivArbol,perfil_control.strStyleDivContent
																,perfil_control.strStyleDivOpcionesBanner,perfil_control.strStyleDivExpandirColapsar
																,perfil_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_control) {
		this.actualizarCssBotonesPagina(perfil_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_control.tiposReportes,perfil_control.tiposReporte
															 	,perfil_control.tiposPaginacion,perfil_control.tiposAcciones
																,perfil_control.tiposColumnasSelect,perfil_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(perfil_control.tiposRelaciones,perfil_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_control) {
	
		var indexPosition=perfil_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 
				perfil_webcontrol1.cargarCombossistemasFK(perfil_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_control.strRecargarFkTiposNinguno!=null && perfil_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTiposNinguno,",")) { 
					perfil_webcontrol1.cargarCombossistemasFK(perfil_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(perfil_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_funcion1,perfil_control.sistemasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(perfil_control) {
		jQuery("#tdperfilNuevo").css("display",perfil_control.strPermisoNuevo);
		jQuery("#trperfilElementos").css("display",perfil_control.strVisibleTablaElementos);
		jQuery("#trperfilAcciones").css("display",perfil_control.strVisibleTablaAcciones);
		jQuery("#trperfilParametrosAcciones").css("display",perfil_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(perfil_control) {
	
		this.actualizarCssBotonesMantenimiento(perfil_control);
				
		if(perfil_control.perfilActual!=null) {//form
			
			this.actualizarCamposFormulario(perfil_control);			
		}
						
		this.actualizarSpanMensajesCampos(perfil_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(perfil_control) {
	
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id").val(perfil_control.perfilActual.id);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-version_row").val(perfil_control.perfilActual.versionRow);
		
		if(perfil_control.perfilActual.id_sistema!=null && perfil_control.perfilActual.id_sistema>-1){
			if(jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val() != perfil_control.perfilActual.id_sistema) {
				jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val(perfil_control.perfilActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").select2("val", null);
			if(jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-codigo").val(perfil_control.perfilActual.codigo);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-nombre").val(perfil_control.perfilActual.nombre);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-nombre2").val(perfil_control.perfilActual.nombre2);
		jQuery("#form"+perfil_constante1.STR_SUFIJO+"-estado").prop('checked',perfil_control.perfilActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+perfil_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("perfil","seguridad","","form_perfil",formulario,"","",paraEventoTabla,idFilaTabla,perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	actualizarSpanMensajesCampos(perfil_control) {
		jQuery("#spanstrMensajeid").text(perfil_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(perfil_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_sistema").text(perfil_control.strMensajeid_sistema);		
		jQuery("#spanstrMensajecodigo").text(perfil_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(perfil_control.strMensajenombre);		
		jQuery("#spanstrMensajenombre2").text(perfil_control.strMensajenombre2);		
		jQuery("#spanstrMensajeestado").text(perfil_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(perfil_control) {
		jQuery("#tdbtnNuevoperfil").css("visibility",perfil_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperfil").css("display",perfil_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperfil").css("visibility",perfil_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperfil").css("display",perfil_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperfil").css("visibility",perfil_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperfil").css("display",perfil_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperfil").css("visibility",perfil_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperfil").css("visibility",perfil_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperfil").css("display",perfil_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperfil").css("visibility",perfil_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperfil").css("visibility",perfil_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperfil").css("visibility",perfil_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(perfil_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema",perfil_control.sistemasFK);

		if(perfil_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_control.idFilaTablaActual+"_2",perfil_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",perfil_control.sistemasFK);

	};

	
	
	registrarComboActionChangeCombossistemasFK(perfil_control) {

	};

	
	
	setDefectoValorCombossistemasFK(perfil_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_control.idsistemaDefaultFK>-1 && jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val() != perfil_control.idsistemaDefaultFK) {
				jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema").val(perfil_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(perfil_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 
				perfil_webcontrol1.setDefectoValorCombossistemasFK(perfil_control);
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
	onLoadCombosEventosFK(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",perfil_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_webcontrol1.registrarComboActionChangeCombossistemasFK(perfil_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(perfil_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_funcion1.validarFormularioJQuery(perfil_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(perfil_funcion1,perfil_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(perfil_funcion1,perfil_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(perfil_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,"perfil");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				perfil_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("perfil");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_control) {
		
		
		
		if(perfil_control.strPermisoActualizar!=null) {
			jQuery("#tdperfilActualizarToolBar").css("display",perfil_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdperfilEliminarToolBar").css("display",perfil_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trperfilElementos").css("display",perfil_control.strVisibleTablaElementos);
		
		jQuery("#trperfilAcciones").css("display",perfil_control.strVisibleTablaAcciones);
		jQuery("#trperfilParametrosAcciones").css("display",perfil_control.strVisibleTablaAcciones);
		
		jQuery("#tdperfilCerrarPagina").css("display",perfil_control.strPermisoPopup);		
		jQuery("#tdperfilCerrarPaginaToolBar").css("display",perfil_control.strPermisoPopup);
		//jQuery("#trperfilAccionesRelaciones").css("display",perfil_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfiles";
		sTituloBanner+=" - " + perfil_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfilRelacionesToolBar").css("display",perfil_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil").css("display",perfil_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_webcontrol1.registrarEventosControles();
		
		if(perfil_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_constante1.STR_ES_RELACIONADO=="false") {
			perfil_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(perfil_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(perfil_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
						//perfil_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(perfil_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(perfil_constante1.BIG_ID_ACTUAL,"perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);
						//perfil_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			perfil_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil","seguridad","",perfil_funcion1,perfil_webcontrol1,perfil_constante1);	
	}
}

var perfil_webcontrol1 = new perfil_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_webcontrol,perfil_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_webcontrol1 = perfil_webcontrol1;


if(perfil_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_webcontrol1.onLoadWindow; 
}

//</script>