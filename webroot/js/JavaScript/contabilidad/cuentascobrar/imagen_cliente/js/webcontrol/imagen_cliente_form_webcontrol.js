//<script type="text/javascript" language="javascript">



//var imagen_clienteJQueryPaginaWebInteraccion= function (imagen_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_cliente_constante,imagen_cliente_constante1} from '../util/imagen_cliente_constante.js';

import {imagen_cliente_funcion,imagen_cliente_funcion1} from '../util/imagen_cliente_form_funcion.js';


class imagen_cliente_webcontrol extends GeneralEntityWebControl {
	
	imagen_cliente_control=null;
	imagen_cliente_controlInicial=null;
	imagen_cliente_controlAuxiliar=null;
		
	//if(imagen_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_cliente_control) {
		super();
		
		this.imagen_cliente_control=imagen_cliente_control;
	}
		
	actualizarVariablesPagina(imagen_cliente_control) {
		
		if(imagen_cliente_control.action=="index" || imagen_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_cliente_control);
			
		} 
		
		
		
	
		else if(imagen_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_cliente_control);	
		
		} else if(imagen_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cliente_control);		
		}
	
	
		
		
		else if(imagen_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_cliente_control);
		
		} else if(imagen_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_cliente_control);		
		
		} else if(imagen_cliente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_cliente_control);		
		
		} 
		//else if(imagen_cliente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_cliente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_cliente_control) {
		this.actualizarPaginaAccionesGenerales(imagen_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cliente_control);
		this.actualizarPaginaOrderBy(imagen_cliente_control);
		this.actualizarPaginaTablaDatos(imagen_cliente_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cliente_control);
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cliente_control);
		this.actualizarPaginaAreaBusquedas(imagen_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_cliente_control) {
		//this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cliente_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_cliente_control);
		this.actualizarPaginaFormulario(imagen_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_cliente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_cliente_control);
		this.actualizarPaginaFormulario(imagen_cliente_control);
		this.onLoadCombosDefectoFK(imagen_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cliente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_cliente_control) {
		//FORMULARIO
		if(imagen_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);		
		
		//COMBOS FK
		if(imagen_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_cliente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_cliente_control) {
		//FORMULARIO
		if(imagen_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);	
		
		//COMBOS FK
		if(imagen_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_cliente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_cliente_control) {
		//FORMULARIO
		if(imagen_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control);	
		//COMBOS FK
		if(imagen_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_cliente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_cliente_control) {
		
		if(imagen_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_cliente_control);
		}
		
		if(imagen_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_cliente_control) {
		if(imagen_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_clienteReturnGeneral",JSON.stringify(imagen_cliente_control.imagen_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_cliente_control) {
		if(imagen_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_cliente_control, mostrar) {
		
		if(mostrar==true) {
			imagen_cliente_funcion1.resaltarRestaurarDivsPagina(false,"imagen_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_cliente");
			}			
			
			imagen_cliente_funcion1.mostrarDivMensaje(true,imagen_cliente_control.strAuxiliarMensaje,imagen_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_cliente_funcion1.mostrarDivMensaje(false,imagen_cliente_control.strAuxiliarMensaje,imagen_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_cliente_control) {
		if(imagen_cliente_funcion1.esPaginaForm(imagen_cliente_constante1)==true) {
			window.opener.imagen_cliente_webcontrol1.actualizarPaginaTablaDatos(imagen_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_cliente_control) {
		imagen_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_cliente_control.strAuxiliarUrlPagina);
				
		imagen_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_cliente_control.strAuxiliarTipo,imagen_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_cliente_control) {
		imagen_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_cliente_control.strAuxiliarMensajeAlert,imagen_cliente_control.strAuxiliarCssMensaje);
			
		if(imagen_cliente_funcion1.esPaginaForm(imagen_cliente_constante1)==true) {
			window.opener.imagen_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_cliente_control.strAuxiliarMensajeAlert,imagen_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_cliente_control) {
		this.imagen_cliente_controlInicial=imagen_cliente_control;
			
		if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_cliente_control.strStyleDivArbol,imagen_cliente_control.strStyleDivContent
																,imagen_cliente_control.strStyleDivOpcionesBanner,imagen_cliente_control.strStyleDivExpandirColapsar
																,imagen_cliente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_cliente_control) {
		this.actualizarCssBotonesPagina(imagen_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_cliente_control.tiposReportes,imagen_cliente_control.tiposReporte
															 	,imagen_cliente_control.tiposPaginacion,imagen_cliente_control.tiposAcciones
																,imagen_cliente_control.tiposColumnasSelect,imagen_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_cliente_control) {
	
		var indexPosition=imagen_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTipos,",")) { 
				imagen_cliente_webcontrol1.cargarCombosclientesFK(imagen_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_cliente_control.strRecargarFkTiposNinguno!=null && imagen_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTiposNinguno,",")) { 
					imagen_cliente_webcontrol1.cargarCombosclientesFK(imagen_cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaclienteFK(imagen_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_cliente_funcion1,imagen_cliente_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_cliente_control) {
		jQuery("#tdimagen_clienteNuevo").css("display",imagen_cliente_control.strPermisoNuevo);
		jQuery("#trimagen_clienteElementos").css("display",imagen_cliente_control.strVisibleTablaElementos);
		jQuery("#trimagen_clienteAcciones").css("display",imagen_cliente_control.strVisibleTablaAcciones);
		jQuery("#trimagen_clienteParametrosAcciones").css("display",imagen_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_cliente_control);
				
		if(imagen_cliente_control.imagen_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_cliente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_cliente_control) {
	
		jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id").val(imagen_cliente_control.imagen_clienteActual.id);
		jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-created_at").val(imagen_cliente_control.imagen_clienteActual.versionRow);
		jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-updated_at").val(imagen_cliente_control.imagen_clienteActual.versionRow);
		jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_imagen").val(imagen_cliente_control.imagen_clienteActual.id_imagen);
		
		if(imagen_cliente_control.imagen_clienteActual.id_cliente!=null && imagen_cliente_control.imagen_clienteActual.id_cliente>-1){
			if(jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != imagen_cliente_control.imagen_clienteActual.id_cliente) {
				jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val(imagen_cliente_control.imagen_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-imagen").val(imagen_cliente_control.imagen_clienteActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_cliente","cuentascobrar","","form_imagen_cliente",formulario,"","",paraEventoTabla,idFilaTabla,imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_cliente_control) {
		jQuery("#spanstrMensajeid").text(imagen_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(imagen_cliente_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(imagen_cliente_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_imagen").text(imagen_cliente_control.strMensajeid_imagen);		
		jQuery("#spanstrMensajeid_cliente").text(imagen_cliente_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeimagen").text(imagen_cliente_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_cliente_control) {
		jQuery("#tdbtnNuevoimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_cliente").css("display",imagen_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_cliente").css("display",imagen_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_cliente").css("display",imagen_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_cliente").css("display",imagen_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_cliente").css("visibility",imagen_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosclientesFK(imagen_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente",imagen_cliente_control.clientesFK);

		if(imagen_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_cliente_control.idFilaTablaActual+"_4",imagen_cliente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",imagen_cliente_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosclientesFK(imagen_cliente_control) {

	};

	
	
	setDefectoValorCombosclientesFK(imagen_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_cliente_control.idclienteDefaultFK>-1 && jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != imagen_cliente_control.idclienteDefaultFK) {
				jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente").val(imagen_cliente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(imagen_cliente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTipos,",")) { 
				imagen_cliente_webcontrol1.setDefectoValorCombosclientesFK(imagen_cliente_control);
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
	onLoadCombosEventosFK(imagen_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",imagen_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_cliente_webcontrol1.registrarComboActionChangeCombosclientesFK(imagen_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_cliente_funcion1.validarFormularioJQuery(imagen_cliente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_cliente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,"imagen_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_cliente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				imagen_cliente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_cliente_control) {
		
		
		
		if(imagen_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_clienteActualizarToolBar").css("display",imagen_cliente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_clienteEliminarToolBar").css("display",imagen_cliente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_clienteElementos").css("display",imagen_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_clienteAcciones").css("display",imagen_cliente_control.strVisibleTablaAcciones);
		jQuery("#trimagen_clienteParametrosAcciones").css("display",imagen_cliente_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_clienteCerrarPagina").css("display",imagen_cliente_control.strPermisoPopup);		
		jQuery("#tdimagen_clienteCerrarPaginaToolBar").css("display",imagen_cliente_control.strPermisoPopup);
		//jQuery("#trimagen_clienteAccionesRelaciones").css("display",imagen_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Clientes";
		sTituloBanner+=" - " + imagen_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_clienteRelacionesToolBar").css("display",imagen_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_cliente").css("display",imagen_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_cliente_webcontrol1.registrarEventosControles();
		
		if(imagen_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
			imagen_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
						//imagen_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_cliente_constante1.BIG_ID_ACTUAL,"imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);
						//imagen_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_cliente","cuentascobrar","",imagen_cliente_funcion1,imagen_cliente_webcontrol1,imagen_cliente_constante1);	
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

var imagen_cliente_webcontrol1 = new imagen_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_cliente_webcontrol,imagen_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_cliente_webcontrol1 = imagen_cliente_webcontrol1;


if(imagen_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_cliente_webcontrol1.onLoadWindow; 
}

//</script>