//<script type="text/javascript" language="javascript">



//var documento_proveedorJQueryPaginaWebInteraccion= function (documento_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_proveedor_constante,documento_proveedor_constante1} from '../util/documento_proveedor_constante.js';

import {documento_proveedor_funcion,documento_proveedor_funcion1} from '../util/documento_proveedor_form_funcion.js';


class documento_proveedor_webcontrol extends GeneralEntityWebControl {
	
	documento_proveedor_control=null;
	documento_proveedor_controlInicial=null;
	documento_proveedor_controlAuxiliar=null;
		
	//if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_proveedor_control) {
		super();
		
		this.documento_proveedor_control=documento_proveedor_control;
	}
		
	actualizarVariablesPagina(documento_proveedor_control) {
		
		if(documento_proveedor_control.action=="index" || documento_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_proveedor_control);
			
		} 
		
		
		
	
		else if(documento_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_proveedor_control);	
		
		} else if(documento_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_proveedor_control);		
		}
	
		else if(documento_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control);		
		}
	
		else if(documento_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_proveedor_control);
		}
		
		
		else if(documento_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_proveedor_control);		
		
		} 
		//else if(documento_proveedor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_proveedor_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(documento_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(documento_proveedor_control);
		this.actualizarPaginaOrderBy(documento_proveedor_control);
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control);
		this.actualizarPaginaAreaBusquedas(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_proveedor_control) {
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_proveedor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(documento_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(documento_proveedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.onLoadCombosDefectoFK(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_proveedor_control) {
		//FORMULARIO
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		
		//COMBOS FK
		if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_proveedor_control) {
		//FORMULARIO
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);	
		
		//COMBOS FK
		if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(documento_proveedor_control) {
		//FORMULARIO
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);	
		//COMBOS FK
		if(documento_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_proveedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_proveedor_control) {
		
		if(documento_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_proveedor_control);
		}
		
		if(documento_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_proveedor_control) {
		if(documento_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_proveedorReturnGeneral",JSON.stringify(documento_proveedor_control.documento_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control) {
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			documento_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"documento_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_proveedor");
			}			
			
			documento_proveedor_funcion1.mostrarDivMensaje(true,documento_proveedor_control.strAuxiliarMensaje,documento_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			documento_proveedor_funcion1.mostrarDivMensaje(false,documento_proveedor_control.strAuxiliarMensaje,documento_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control) {
		if(documento_proveedor_funcion1.esPaginaForm(documento_proveedor_constante1)==true) {
			window.opener.documento_proveedor_webcontrol1.actualizarPaginaTablaDatos(documento_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_proveedor_control) {
		documento_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_proveedor_control.strAuxiliarUrlPagina);
				
		documento_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_proveedor_control.strAuxiliarTipo,documento_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_proveedor_control) {
		documento_proveedor_funcion1.resaltarRestaurarDivMensaje(true,documento_proveedor_control.strAuxiliarMensajeAlert,documento_proveedor_control.strAuxiliarCssMensaje);
			
		if(documento_proveedor_funcion1.esPaginaForm(documento_proveedor_constante1)==true) {
			window.opener.documento_proveedor_funcion1.resaltarRestaurarDivMensaje(true,documento_proveedor_control.strAuxiliarMensajeAlert,documento_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_proveedor_control) {
		this.documento_proveedor_controlInicial=documento_proveedor_control;
			
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_proveedor_control.strStyleDivArbol,documento_proveedor_control.strStyleDivContent
																,documento_proveedor_control.strStyleDivOpcionesBanner,documento_proveedor_control.strStyleDivExpandirColapsar
																,documento_proveedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_proveedor_control) {
		this.actualizarCssBotonesPagina(documento_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_proveedor_control.tiposReportes,documento_proveedor_control.tiposReporte
															 	,documento_proveedor_control.tiposPaginacion,documento_proveedor_control.tiposAcciones
																,documento_proveedor_control.tiposColumnasSelect,documento_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_proveedor_control.tiposRelaciones,documento_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_proveedor_control) {
	
		var indexPosition=documento_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 
				documento_proveedor_webcontrol1.cargarCombosproveedorsFK(documento_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_proveedor_control.strRecargarFkTiposNinguno!=null && documento_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					documento_proveedor_webcontrol1.cargarCombosproveedorsFK(documento_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproveedorFK(documento_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_proveedor_funcion1,documento_proveedor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(documento_proveedor_control) {
		jQuery("#tddocumento_proveedorNuevo").css("display",documento_proveedor_control.strPermisoNuevo);
		jQuery("#trdocumento_proveedorElementos").css("display",documento_proveedor_control.strVisibleTablaElementos);
		jQuery("#trdocumento_proveedorAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_proveedorParametrosAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(documento_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(documento_proveedor_control);
				
		if(documento_proveedor_control.documento_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(documento_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(documento_proveedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(documento_proveedor_control) {
	
		jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id").val(documento_proveedor_control.documento_proveedorActual.id);
		jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-version_row").val(documento_proveedor_control.documento_proveedorActual.versionRow);
		
		if(documento_proveedor_control.documento_proveedorActual.id_proveedor!=null && documento_proveedor_control.documento_proveedorActual.id_proveedor>-1){
			if(jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_proveedor_control.documento_proveedorActual.id_proveedor) {
				jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(documento_proveedor_control.documento_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-documento").val(documento_proveedor_control.documento_proveedorActual.documento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+documento_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("documento_proveedor","cuentaspagar","","form_documento_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	actualizarSpanMensajesCampos(documento_proveedor_control) {
		jQuery("#spanstrMensajeid").text(documento_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(documento_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_proveedor").text(documento_proveedor_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajedocumento").text(documento_proveedor_control.strMensajedocumento);		
	}
	
	actualizarCssBotonesMantenimiento(documento_proveedor_control) {
		jQuery("#tdbtnNuevodocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodocumento_proveedor").css("display",documento_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardocumento_proveedor").css("display",documento_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardocumento_proveedor").css("display",documento_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdocumento_proveedor").css("display",documento_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardocumento_proveedor").css("visibility",documento_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproveedorsFK(documento_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor",documento_proveedor_control.proveedorsFK);

		if(documento_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_proveedor_control.idFilaTablaActual+"_2",documento_proveedor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",documento_proveedor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproveedorsFK(documento_proveedor_control) {

	};

	
	
	setDefectoValorCombosproveedorsFK(documento_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_proveedor_control.idproveedorDefaultFK>-1 && jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_proveedor_control.idproveedorDefaultFK) {
				jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(documento_proveedor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(documento_proveedor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 
				documento_proveedor_webcontrol1.setDefectoValorCombosproveedorsFK(documento_proveedor_control);
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
	onLoadCombosEventosFK(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_proveedor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(documento_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(documento_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_proveedor_funcion1.validarFormularioJQuery(documento_proveedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(documento_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,"documento_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				documento_proveedor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_proveedor_control) {
		
		
		
		if(documento_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_proveedorActualizarToolBar").css("display",documento_proveedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddocumento_proveedorEliminarToolBar").css("display",documento_proveedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdocumento_proveedorElementos").css("display",documento_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trdocumento_proveedorAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_proveedorParametrosAcciones").css("display",documento_proveedor_control.strVisibleTablaAcciones);
		
		jQuery("#tddocumento_proveedorCerrarPagina").css("display",documento_proveedor_control.strPermisoPopup);		
		jQuery("#tddocumento_proveedorCerrarPaginaToolBar").css("display",documento_proveedor_control.strPermisoPopup);
		//jQuery("#trdocumento_proveedorAccionesRelaciones").css("display",documento_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documentos Proveedoreses";
		sTituloBanner+=" - " + documento_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_proveedorRelacionesToolBar").css("display",documento_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_proveedor").css("display",documento_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_proveedor_webcontrol1.registrarEventosControles();
		
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			documento_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(documento_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(documento_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(documento_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
						//documento_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(documento_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(documento_proveedor_constante1.BIG_ID_ACTUAL,"documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
						//documento_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			documento_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);	
	}
}

var documento_proveedor_webcontrol1 = new documento_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_proveedor_webcontrol,documento_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.documento_proveedor_webcontrol1 = documento_proveedor_webcontrol1;


if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_proveedor_webcontrol1.onLoadWindow; 
}

//</script>