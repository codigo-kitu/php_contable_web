//<script type="text/javascript" language="javascript">



//var imagen_proveedorJQueryPaginaWebInteraccion= function (imagen_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_proveedor_constante,imagen_proveedor_constante1} from '../util/imagen_proveedor_constante.js';

import {imagen_proveedor_funcion,imagen_proveedor_funcion1} from '../util/imagen_proveedor_form_funcion.js';


class imagen_proveedor_webcontrol extends GeneralEntityWebControl {
	
	imagen_proveedor_control=null;
	imagen_proveedor_controlInicial=null;
	imagen_proveedor_controlAuxiliar=null;
		
	//if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_proveedor_control) {
		super();
		
		this.imagen_proveedor_control=imagen_proveedor_control;
	}
		
	actualizarVariablesPagina(imagen_proveedor_control) {
		
		if(imagen_proveedor_control.action=="index" || imagen_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_proveedor_control);
			
		} 
		
		
		
	
		else if(imagen_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_proveedor_control);	
		
		} else if(imagen_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_proveedor_control);		
		}
	
	
		
		
		else if(imagen_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_proveedor_control);
		
		} else if(imagen_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_proveedor_control);		
		
		} else if(imagen_proveedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_proveedor_control);		
		
		} 
		//else if(imagen_proveedor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_proveedor_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(imagen_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_proveedor_control);
		this.actualizarPaginaOrderBy(imagen_proveedor_control);
		this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_proveedor_control);
		this.actualizarPaginaAreaBusquedas(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_proveedor_control) {
		//this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_proveedor_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_proveedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_proveedor_control);
		this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		this.actualizarPaginaFormulario(imagen_proveedor_control);
		this.onLoadCombosDefectoFK(imagen_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_proveedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_proveedor_control) {
		//FORMULARIO
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);		
		
		//COMBOS FK
		if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_proveedor_control) {
		//FORMULARIO
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);	
		
		//COMBOS FK
		if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_proveedor_control) {
		//FORMULARIO
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control);	
		//COMBOS FK
		if(imagen_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_proveedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_proveedor_control) {
		
		if(imagen_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_proveedor_control);
		}
		
		if(imagen_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_proveedor_control) {
		if(imagen_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_proveedorReturnGeneral",JSON.stringify(imagen_proveedor_control.imagen_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_proveedor_control) {
		if(imagen_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			imagen_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"imagen_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_proveedor");
			}			
			
			imagen_proveedor_funcion1.mostrarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensaje,imagen_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_proveedor_funcion1.mostrarDivMensaje(false,imagen_proveedor_control.strAuxiliarMensaje,imagen_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_proveedor_control) {
		if(imagen_proveedor_funcion1.esPaginaForm(imagen_proveedor_constante1)==true) {
			window.opener.imagen_proveedor_webcontrol1.actualizarPaginaTablaDatos(imagen_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_proveedor_control) {
		imagen_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_proveedor_control.strAuxiliarUrlPagina);
				
		imagen_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_proveedor_control.strAuxiliarTipo,imagen_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_proveedor_control) {
		imagen_proveedor_funcion1.resaltarRestaurarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensajeAlert,imagen_proveedor_control.strAuxiliarCssMensaje);
			
		if(imagen_proveedor_funcion1.esPaginaForm(imagen_proveedor_constante1)==true) {
			window.opener.imagen_proveedor_funcion1.resaltarRestaurarDivMensaje(true,imagen_proveedor_control.strAuxiliarMensajeAlert,imagen_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_proveedor_control) {
		this.imagen_proveedor_controlInicial=imagen_proveedor_control;
			
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_proveedor_control.strStyleDivArbol,imagen_proveedor_control.strStyleDivContent
																,imagen_proveedor_control.strStyleDivOpcionesBanner,imagen_proveedor_control.strStyleDivExpandirColapsar
																,imagen_proveedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_proveedor_control) {
		this.actualizarCssBotonesPagina(imagen_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_proveedor_control.tiposReportes,imagen_proveedor_control.tiposReporte
															 	,imagen_proveedor_control.tiposPaginacion,imagen_proveedor_control.tiposAcciones
																,imagen_proveedor_control.tiposColumnasSelect,imagen_proveedor_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_proveedor_control) {
	
		var indexPosition=imagen_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 
				imagen_proveedor_webcontrol1.cargarCombosproveedorsFK(imagen_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_proveedor_control.strRecargarFkTiposNinguno!=null && imagen_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					imagen_proveedor_webcontrol1.cargarCombosproveedorsFK(imagen_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproveedorFK(imagen_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_proveedor_funcion1,imagen_proveedor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_proveedor_control) {
		jQuery("#tdimagen_proveedorNuevo").css("display",imagen_proveedor_control.strPermisoNuevo);
		jQuery("#trimagen_proveedorElementos").css("display",imagen_proveedor_control.strVisibleTablaElementos);
		jQuery("#trimagen_proveedorAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trimagen_proveedorParametrosAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_proveedor_control);
				
		if(imagen_proveedor_control.imagen_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_proveedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_proveedor_control) {
	
		jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id").val(imagen_proveedor_control.imagen_proveedorActual.id);
		jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-created_at").val(imagen_proveedor_control.imagen_proveedorActual.versionRow);
		jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-updated_at").val(imagen_proveedor_control.imagen_proveedorActual.versionRow);
		
		if(imagen_proveedor_control.imagen_proveedorActual.id_proveedor!=null && imagen_proveedor_control.imagen_proveedorActual.id_proveedor>-1){
			if(jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != imagen_proveedor_control.imagen_proveedorActual.id_proveedor) {
				jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(imagen_proveedor_control.imagen_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-imagen").val(imagen_proveedor_control.imagen_proveedorActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_proveedor","cuentaspagar","","form_imagen_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_proveedor_control) {
		jQuery("#spanstrMensajeid").text(imagen_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(imagen_proveedor_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(imagen_proveedor_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_proveedor").text(imagen_proveedor_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeimagen").text(imagen_proveedor_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_proveedor_control) {
		jQuery("#tdbtnNuevoimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_proveedor").css("display",imagen_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_proveedor").css("display",imagen_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_proveedor").css("display",imagen_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_proveedor").css("display",imagen_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_proveedor").css("visibility",imagen_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproveedorsFK(imagen_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor",imagen_proveedor_control.proveedorsFK);

		if(imagen_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_proveedor_control.idFilaTablaActual+"_3",imagen_proveedor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",imagen_proveedor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproveedorsFK(imagen_proveedor_control) {

	};

	
	
	setDefectoValorCombosproveedorsFK(imagen_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_proveedor_control.idproveedorDefaultFK>-1 && jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != imagen_proveedor_control.idproveedorDefaultFK) {
				jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(imagen_proveedor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(imagen_proveedor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 
				imagen_proveedor_webcontrol1.setDefectoValorCombosproveedorsFK(imagen_proveedor_control);
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
	onLoadCombosEventosFK(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",imagen_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_proveedor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(imagen_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_proveedor_funcion1.validarFormularioJQuery(imagen_proveedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_proveedor");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,"imagen_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_proveedor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				imagen_proveedor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_proveedor_control) {
		
		
		
		if(imagen_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_proveedorActualizarToolBar").css("display",imagen_proveedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_proveedorEliminarToolBar").css("display",imagen_proveedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_proveedorElementos").css("display",imagen_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_proveedorAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trimagen_proveedorParametrosAcciones").css("display",imagen_proveedor_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_proveedorCerrarPagina").css("display",imagen_proveedor_control.strPermisoPopup);		
		jQuery("#tdimagen_proveedorCerrarPaginaToolBar").css("display",imagen_proveedor_control.strPermisoPopup);
		//jQuery("#trimagen_proveedorAccionesRelaciones").css("display",imagen_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Proveedoreses";
		sTituloBanner+=" - " + imagen_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_proveedorRelacionesToolBar").css("display",imagen_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_proveedor").css("display",imagen_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_proveedor_webcontrol1.registrarEventosControles();
		
		if(imagen_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			imagen_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
						//imagen_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_proveedor_constante1.BIG_ID_ACTUAL,"imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);
						//imagen_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_proveedor","cuentaspagar","",imagen_proveedor_funcion1,imagen_proveedor_webcontrol1,imagen_proveedor_constante1);	
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

var imagen_proveedor_webcontrol1 = new imagen_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_proveedor_webcontrol,imagen_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_proveedor_webcontrol1 = imagen_proveedor_webcontrol1;


if(imagen_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_proveedor_webcontrol1.onLoadWindow; 
}

//</script>