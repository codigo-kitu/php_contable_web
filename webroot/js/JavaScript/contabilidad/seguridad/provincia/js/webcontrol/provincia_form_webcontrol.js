//<script type="text/javascript" language="javascript">



//var provinciaJQueryPaginaWebInteraccion= function (provincia_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {provincia_constante,provincia_constante1} from '../util/provincia_constante.js';

import {provincia_funcion,provincia_funcion1} from '../util/provincia_form_funcion.js';


class provincia_webcontrol extends GeneralEntityWebControl {
	
	provincia_control=null;
	provincia_controlInicial=null;
	provincia_controlAuxiliar=null;
		
	//if(provincia_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(provincia_control) {
		super();
		
		this.provincia_control=provincia_control;
	}
		
	actualizarVariablesPagina(provincia_control) {
		
		if(provincia_control.action=="index" || provincia_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(provincia_control);
			
		} 
		
		
		
	
		else if(provincia_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(provincia_control);	
		
		} else if(provincia_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(provincia_control);		
		}
	
		else if(provincia_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(provincia_control);		
		}
	
		else if(provincia_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(provincia_control);
		}
		
		
		else if(provincia_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(provincia_control);
		
		} else if(provincia_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(provincia_control);
		
		} else if(provincia_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(provincia_control);
		
		} else if(provincia_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(provincia_control);
		
		} else if(provincia_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(provincia_control);
		
		} else if(provincia_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(provincia_control);		
		
		} else if(provincia_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(provincia_control);		
		
		} 
		//else if(provincia_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(provincia_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + provincia_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(provincia_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(provincia_control) {
		this.actualizarPaginaAccionesGenerales(provincia_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(provincia_control) {
		
		this.actualizarPaginaCargaGeneral(provincia_control);
		this.actualizarPaginaOrderBy(provincia_control);
		this.actualizarPaginaTablaDatos(provincia_control);
		this.actualizarPaginaCargaGeneralControles(provincia_control);
		//this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(provincia_control);
		this.actualizarPaginaAreaBusquedas(provincia_control);
		this.actualizarPaginaCargaCombosFK(provincia_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(provincia_control) {
		//this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(provincia_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(provincia_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(provincia_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(provincia_control) {
		this.actualizarPaginaTablaDatosAuxiliar(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(provincia_control) {
		this.actualizarPaginaTablaDatosAuxiliar(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(provincia_control) {
		this.actualizarPaginaTablaDatosAuxiliar(provincia_control);		
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(provincia_control) {
		this.actualizarPaginaCargaGeneralControles(provincia_control);
		this.actualizarPaginaCargaCombosFK(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(provincia_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(provincia_control) {
		this.actualizarPaginaCargaGeneralControles(provincia_control);
		this.actualizarPaginaCargaCombosFK(provincia_control);
		this.actualizarPaginaFormulario(provincia_control);
		this.onLoadCombosDefectoFK(provincia_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		this.actualizarPaginaAreaMantenimiento(provincia_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(provincia_control) {
		//FORMULARIO
		if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(provincia_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(provincia_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);		
		
		//COMBOS FK
		if(provincia_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(provincia_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(provincia_control) {
		//FORMULARIO
		if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(provincia_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(provincia_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);	
		
		//COMBOS FK
		if(provincia_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(provincia_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(provincia_control) {
		//FORMULARIO
		if(provincia_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(provincia_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(provincia_control);	
		//COMBOS FK
		if(provincia_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(provincia_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(provincia_control) {
		
		if(provincia_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(provincia_control);
		}
		
		if(provincia_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(provincia_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(provincia_control) {
		if(provincia_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("provinciaReturnGeneral",JSON.stringify(provincia_control.provinciaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(provincia_control) {
		if(provincia_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && provincia_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(provincia_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(provincia_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(provincia_control, mostrar) {
		
		if(mostrar==true) {
			provincia_funcion1.resaltarRestaurarDivsPagina(false,"provincia");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				provincia_funcion1.resaltarRestaurarDivMantenimiento(false,"provincia");
			}			
			
			provincia_funcion1.mostrarDivMensaje(true,provincia_control.strAuxiliarMensaje,provincia_control.strAuxiliarCssMensaje);
		
		} else {
			provincia_funcion1.mostrarDivMensaje(false,provincia_control.strAuxiliarMensaje,provincia_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(provincia_control) {
		if(provincia_funcion1.esPaginaForm(provincia_constante1)==true) {
			window.opener.provincia_webcontrol1.actualizarPaginaTablaDatos(provincia_control);
		} else {
			this.actualizarPaginaTablaDatos(provincia_control);
		}
	}
	
	actualizarPaginaAbrirLink(provincia_control) {
		provincia_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(provincia_control.strAuxiliarUrlPagina);
				
		provincia_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(provincia_control.strAuxiliarTipo,provincia_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(provincia_control) {
		provincia_funcion1.resaltarRestaurarDivMensaje(true,provincia_control.strAuxiliarMensajeAlert,provincia_control.strAuxiliarCssMensaje);
			
		if(provincia_funcion1.esPaginaForm(provincia_constante1)==true) {
			window.opener.provincia_funcion1.resaltarRestaurarDivMensaje(true,provincia_control.strAuxiliarMensajeAlert,provincia_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(provincia_control) {
		this.provincia_controlInicial=provincia_control;
			
		if(provincia_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(provincia_control.strStyleDivArbol,provincia_control.strStyleDivContent
																,provincia_control.strStyleDivOpcionesBanner,provincia_control.strStyleDivExpandirColapsar
																,provincia_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(provincia_control) {
		this.actualizarCssBotonesPagina(provincia_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(provincia_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(provincia_control.tiposReportes,provincia_control.tiposReporte
															 	,provincia_control.tiposPaginacion,provincia_control.tiposAcciones
																,provincia_control.tiposColumnasSelect,provincia_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(provincia_control.tiposRelaciones,provincia_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(provincia_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(provincia_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(provincia_control);			
	}
	
	actualizarPaginaUsuarioInvitado(provincia_control) {
	
		var indexPosition=provincia_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=provincia_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(provincia_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(provincia_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTipos,",")) { 
				provincia_webcontrol1.cargarCombospaissFK(provincia_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(provincia_control.strRecargarFkTiposNinguno!=null && provincia_control.strRecargarFkTiposNinguno!='NINGUNO' && provincia_control.strRecargarFkTiposNinguno!='') {
			
				if(provincia_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTiposNinguno,",")) { 
					provincia_webcontrol1.cargarCombospaissFK(provincia_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablapaisFK(provincia_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,provincia_funcion1,provincia_control.paissFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(provincia_control) {
		jQuery("#tdprovinciaNuevo").css("display",provincia_control.strPermisoNuevo);
		jQuery("#trprovinciaElementos").css("display",provincia_control.strVisibleTablaElementos);
		jQuery("#trprovinciaAcciones").css("display",provincia_control.strVisibleTablaAcciones);
		jQuery("#trprovinciaParametrosAcciones").css("display",provincia_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(provincia_control) {
	
		this.actualizarCssBotonesMantenimiento(provincia_control);
				
		if(provincia_control.provinciaActual!=null) {//form
			
			this.actualizarCamposFormulario(provincia_control);			
		}
						
		this.actualizarSpanMensajesCampos(provincia_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(provincia_control) {
	
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id").val(provincia_control.provinciaActual.id);
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-created_at").val(provincia_control.provinciaActual.versionRow);
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-updated_at").val(provincia_control.provinciaActual.versionRow);
		
		if(provincia_control.provinciaActual.id_pais!=null && provincia_control.provinciaActual.id_pais>-1){
			if(jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val() != provincia_control.provinciaActual.id_pais) {
				jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val(provincia_control.provinciaActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-codigo").val(provincia_control.provinciaActual.codigo);
		jQuery("#form"+provincia_constante1.STR_SUFIJO+"-nombre").val(provincia_control.provinciaActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+provincia_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("provincia","seguridad","","form_provincia",formulario,"","",paraEventoTabla,idFilaTabla,provincia_funcion1,provincia_webcontrol1,provincia_constante1);
	}
	
	actualizarSpanMensajesCampos(provincia_control) {
		jQuery("#spanstrMensajeid").text(provincia_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(provincia_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(provincia_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_pais").text(provincia_control.strMensajeid_pais);		
		jQuery("#spanstrMensajecodigo").text(provincia_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(provincia_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(provincia_control) {
		jQuery("#tdbtnNuevoprovincia").css("visibility",provincia_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoprovincia").css("display",provincia_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarprovincia").css("visibility",provincia_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarprovincia").css("display",provincia_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarprovincia").css("visibility",provincia_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarprovincia").css("display",provincia_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarprovincia").css("visibility",provincia_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosprovincia").css("visibility",provincia_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosprovincia").css("display",provincia_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarprovincia").css("visibility",provincia_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarprovincia").css("visibility",provincia_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarprovincia").css("visibility",provincia_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombospaissFK(provincia_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+provincia_constante1.STR_SUFIJO+"-id_pais",provincia_control.paissFK);

		if(provincia_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+provincia_control.idFilaTablaActual+"_3",provincia_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",provincia_control.paissFK);

	};

	
	
	registrarComboActionChangeCombospaissFK(provincia_control) {

	};

	
	
	setDefectoValorCombospaissFK(provincia_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(provincia_control.idpaisDefaultFK>-1 && jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val() != provincia_control.idpaisDefaultFK) {
				jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais").val(provincia_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(provincia_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+provincia_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//provincia_control
		
	
	}
	
	onLoadCombosDefectoFK(provincia_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(provincia_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(provincia_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTipos,",")) { 
				provincia_webcontrol1.setDefectoValorCombospaissFK(provincia_control);
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
	onLoadCombosEventosFK(provincia_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(provincia_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(provincia_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",provincia_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				provincia_webcontrol1.registrarComboActionChangeCombospaissFK(provincia_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(provincia_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(provincia_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(provincia_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(provincia_constante1.BIT_ES_PAGINA_FORM==true) {
				provincia_funcion1.validarFormularioJQuery(provincia_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("provincia");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("provincia");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(provincia_funcion1,provincia_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(provincia_funcion1,provincia_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(provincia_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,"provincia");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+provincia_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				provincia_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("provincia");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(provincia_control) {
		
		
		
		if(provincia_control.strPermisoActualizar!=null) {
			jQuery("#tdprovinciaActualizarToolBar").css("display",provincia_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdprovinciaEliminarToolBar").css("display",provincia_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trprovinciaElementos").css("display",provincia_control.strVisibleTablaElementos);
		
		jQuery("#trprovinciaAcciones").css("display",provincia_control.strVisibleTablaAcciones);
		jQuery("#trprovinciaParametrosAcciones").css("display",provincia_control.strVisibleTablaAcciones);
		
		jQuery("#tdprovinciaCerrarPagina").css("display",provincia_control.strPermisoPopup);		
		jQuery("#tdprovinciaCerrarPaginaToolBar").css("display",provincia_control.strPermisoPopup);
		//jQuery("#trprovinciaAccionesRelaciones").css("display",provincia_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=provincia_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + provincia_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + provincia_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Provinciaes";
		sTituloBanner+=" - " + provincia_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + provincia_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdprovinciaRelacionesToolBar").css("display",provincia_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosprovincia").css("display",provincia_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		provincia_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		provincia_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		provincia_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		provincia_webcontrol1.registrarEventosControles();
		
		if(provincia_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(provincia_constante1.STR_ES_RELACIONADO=="false") {
			provincia_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(provincia_constante1.STR_ES_RELACIONES=="true") {
			if(provincia_constante1.BIT_ES_PAGINA_FORM==true) {
				provincia_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(provincia_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(provincia_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(provincia_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(provincia_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
						//provincia_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(provincia_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(provincia_constante1.BIG_ID_ACTUAL,"provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);
						//provincia_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			provincia_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("provincia","seguridad","",provincia_funcion1,provincia_webcontrol1,provincia_constante1);	
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

var provincia_webcontrol1 = new provincia_webcontrol();

//Para ser llamado desde otro archivo (import)
export {provincia_webcontrol,provincia_webcontrol1};

//Para ser llamado desde window.opener
window.provincia_webcontrol1 = provincia_webcontrol1;


if(provincia_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = provincia_webcontrol1.onLoadWindow; 
}

//</script>