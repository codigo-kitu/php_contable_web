//<script type="text/javascript" language="javascript">



//var documento_clienteJQueryPaginaWebInteraccion= function (documento_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_cliente_constante,documento_cliente_constante1} from '../util/documento_cliente_constante.js';

import {documento_cliente_funcion,documento_cliente_funcion1} from '../util/documento_cliente_form_funcion.js';


class documento_cliente_webcontrol extends GeneralEntityWebControl {
	
	documento_cliente_control=null;
	documento_cliente_controlInicial=null;
	documento_cliente_controlAuxiliar=null;
		
	//if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_cliente_control) {
		super();
		
		this.documento_cliente_control=documento_cliente_control;
	}
		
	actualizarVariablesPagina(documento_cliente_control) {
		
		if(documento_cliente_control.action=="index" || documento_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_cliente_control);
			
		} 
		
		
		
	
		else if(documento_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_cliente_control);	
		
		} else if(documento_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cliente_control);		
		}
	
	
		
		
		else if(documento_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_cliente_control);
		
		} else if(documento_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(documento_cliente_control);		
		
		} else if(documento_cliente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_cliente_control);		
		
		} 
		//else if(documento_cliente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_cliente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_cliente_control) {
		this.actualizarPaginaAccionesGenerales(documento_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cliente_control);
		this.actualizarPaginaOrderBy(documento_cliente_control);
		this.actualizarPaginaTablaDatos(documento_cliente_control);
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cliente_control);
		this.actualizarPaginaAreaBusquedas(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_cliente_control) {
		//this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cliente_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(documento_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(documento_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(documento_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_cliente_control);		
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(documento_cliente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(documento_cliente_control);
		this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		this.actualizarPaginaFormulario(documento_cliente_control);
		this.onLoadCombosDefectoFK(documento_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cliente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_cliente_control) {
		//FORMULARIO
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);		
		
		//COMBOS FK
		if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_cliente_control) {
		//FORMULARIO
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);	
		
		//COMBOS FK
		if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(documento_cliente_control) {
		//FORMULARIO
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control);	
		//COMBOS FK
		if(documento_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_cliente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_cliente_control) {
		
		if(documento_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_cliente_control);
		}
		
		if(documento_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_cliente_control) {
		if(documento_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_clienteReturnGeneral",JSON.stringify(documento_cliente_control.documento_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_cliente_control) {
		if(documento_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_cliente_control, mostrar) {
		
		if(mostrar==true) {
			documento_cliente_funcion1.resaltarRestaurarDivsPagina(false,"documento_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_cliente");
			}			
			
			documento_cliente_funcion1.mostrarDivMensaje(true,documento_cliente_control.strAuxiliarMensaje,documento_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			documento_cliente_funcion1.mostrarDivMensaje(false,documento_cliente_control.strAuxiliarMensaje,documento_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_cliente_control) {
		if(documento_cliente_funcion1.esPaginaForm(documento_cliente_constante1)==true) {
			window.opener.documento_cliente_webcontrol1.actualizarPaginaTablaDatos(documento_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_cliente_control) {
		documento_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_cliente_control.strAuxiliarUrlPagina);
				
		documento_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_cliente_control.strAuxiliarTipo,documento_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_cliente_control) {
		documento_cliente_funcion1.resaltarRestaurarDivMensaje(true,documento_cliente_control.strAuxiliarMensajeAlert,documento_cliente_control.strAuxiliarCssMensaje);
			
		if(documento_cliente_funcion1.esPaginaForm(documento_cliente_constante1)==true) {
			window.opener.documento_cliente_funcion1.resaltarRestaurarDivMensaje(true,documento_cliente_control.strAuxiliarMensajeAlert,documento_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_cliente_control) {
		this.documento_cliente_controlInicial=documento_cliente_control;
			
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_cliente_control.strStyleDivArbol,documento_cliente_control.strStyleDivContent
																,documento_cliente_control.strStyleDivOpcionesBanner,documento_cliente_control.strStyleDivExpandirColapsar
																,documento_cliente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_cliente_control) {
		this.actualizarCssBotonesPagina(documento_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_cliente_control.tiposReportes,documento_cliente_control.tiposReporte
															 	,documento_cliente_control.tiposPaginacion,documento_cliente_control.tiposAcciones
																,documento_cliente_control.tiposColumnasSelect,documento_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_cliente_control) {
	
		var indexPosition=documento_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.cargarCombosdocumento_proveedorsFK(documento_cliente_control);
			}

			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.cargarCombosclientesFK(documento_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_cliente_control.strRecargarFkTiposNinguno!=null && documento_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTiposNinguno,",")) { 
					documento_cliente_webcontrol1.cargarCombosdocumento_proveedorsFK(documento_cliente_control);
				}

				if(documento_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTiposNinguno,",")) { 
					documento_cliente_webcontrol1.cargarCombosclientesFK(documento_cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladocumento_proveedorFK(documento_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cliente_funcion1,documento_cliente_control.documento_proveedorsFK);
	}

	cargarComboEditarTablaclienteFK(documento_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cliente_funcion1,documento_cliente_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(documento_cliente_control) {
		jQuery("#tddocumento_clienteNuevo").css("display",documento_cliente_control.strPermisoNuevo);
		jQuery("#trdocumento_clienteElementos").css("display",documento_cliente_control.strVisibleTablaElementos);
		jQuery("#trdocumento_clienteAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_clienteParametrosAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(documento_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(documento_cliente_control);
				
		if(documento_cliente_control.documento_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(documento_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(documento_cliente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(documento_cliente_control) {
	
		jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id").val(documento_cliente_control.documento_clienteActual.id);
		jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-created_at").val(documento_cliente_control.documento_clienteActual.versionRow);
		jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-updated_at").val(documento_cliente_control.documento_clienteActual.versionRow);
		
		if(documento_cliente_control.documento_clienteActual.id_documento_proveedor!=null && documento_cliente_control.documento_clienteActual.id_documento_proveedor>-1){
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val() != documento_cliente_control.documento_clienteActual.id_documento_proveedor) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val(documento_cliente_control.documento_clienteActual.id_documento_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").select2("val", null);
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cliente_control.documento_clienteActual.id_cliente!=null && documento_cliente_control.documento_clienteActual.id_cliente>-1){
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != documento_cliente_control.documento_clienteActual.id_cliente) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val(documento_cliente_control.documento_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-documento").val(documento_cliente_control.documento_clienteActual.documento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+documento_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("documento_cliente","cuentascobrar","","form_documento_cliente",formulario,"","",paraEventoTabla,idFilaTabla,documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	actualizarSpanMensajesCampos(documento_cliente_control) {
		jQuery("#spanstrMensajeid").text(documento_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(documento_cliente_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(documento_cliente_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_documento_proveedor").text(documento_cliente_control.strMensajeid_documento_proveedor);		
		jQuery("#spanstrMensajeid_cliente").text(documento_cliente_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajedocumento").text(documento_cliente_control.strMensajedocumento);		
	}
	
	actualizarCssBotonesMantenimiento(documento_cliente_control) {
		jQuery("#tdbtnNuevodocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodocumento_cliente").css("display",documento_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardocumento_cliente").css("display",documento_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardocumento_cliente").css("display",documento_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdocumento_cliente").css("display",documento_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardocumento_cliente").css("visibility",documento_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdocumento_proveedorsFK(documento_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor",documento_cliente_control.documento_proveedorsFK);

		if(documento_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cliente_control.idFilaTablaActual+"_3",documento_cliente_control.documento_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor",documento_cliente_control.documento_proveedorsFK);

	};

	cargarCombosclientesFK(documento_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente",documento_cliente_control.clientesFK);

		if(documento_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cliente_control.idFilaTablaActual+"_4",documento_cliente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",documento_cliente_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_proveedorsFK(documento_cliente_control) {

	};

	registrarComboActionChangeCombosclientesFK(documento_cliente_control) {

	};

	
	
	setDefectoValorCombosdocumento_proveedorsFK(documento_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cliente_control.iddocumento_proveedorDefaultFK>-1 && jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val() != documento_cliente_control.iddocumento_proveedorDefaultFK) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor").val(documento_cliente_control.iddocumento_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val(documento_cliente_control.iddocumento_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Iddocumento_proveedor-cmbid_documento_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(documento_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cliente_control.idclienteDefaultFK>-1 && jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != documento_cliente_control.idclienteDefaultFK) {
				jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente").val(documento_cliente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(documento_cliente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.setDefectoValorCombosdocumento_proveedorsFK(documento_cliente_control);
			}

			if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 
				documento_cliente_webcontrol1.setDefectoValorCombosclientesFK(documento_cliente_control);
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
	onLoadCombosEventosFK(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_proveedor",documento_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cliente_webcontrol1.registrarComboActionChangeCombosdocumento_proveedorsFK(documento_cliente_control);
			//}

			//if(documento_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cliente_webcontrol1.registrarComboActionChangeCombosclientesFK(documento_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(documento_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_cliente_funcion1.validarFormularioJQuery(documento_cliente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_cliente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(documento_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,"documento_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_proveedor","id_documento_proveedor","cuentaspagar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_documento_proveedor_img_busqueda").click(function(){
				documento_cliente_webcontrol1.abrirBusquedaParadocumento_proveedor("id_documento_proveedor");
				//alert(jQuery('#form-id_documento_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cliente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				documento_cliente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_cliente_control) {
		
		
		
		if(documento_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_clienteActualizarToolBar").css("display",documento_cliente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddocumento_clienteEliminarToolBar").css("display",documento_cliente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdocumento_clienteElementos").css("display",documento_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trdocumento_clienteAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_clienteParametrosAcciones").css("display",documento_cliente_control.strVisibleTablaAcciones);
		
		jQuery("#tddocumento_clienteCerrarPagina").css("display",documento_cliente_control.strPermisoPopup);		
		jQuery("#tddocumento_clienteCerrarPaginaToolBar").css("display",documento_cliente_control.strPermisoPopup);
		//jQuery("#trdocumento_clienteAccionesRelaciones").css("display",documento_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documentos Clienteses";
		sTituloBanner+=" - " + documento_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_clienteRelacionesToolBar").css("display",documento_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_cliente").css("display",documento_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_cliente_webcontrol1.registrarEventosControles();
		
		if(documento_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
			documento_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(documento_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(documento_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(documento_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
						//documento_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(documento_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(documento_cliente_constante1.BIG_ID_ACTUAL,"documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);
						//documento_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			documento_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_cliente","cuentascobrar","",documento_cliente_funcion1,documento_cliente_webcontrol1,documento_cliente_constante1);	
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

var documento_cliente_webcontrol1 = new documento_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_cliente_webcontrol,documento_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.documento_cliente_webcontrol1 = documento_cliente_webcontrol1;


if(documento_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_cliente_webcontrol1.onLoadWindow; 
}

//</script>