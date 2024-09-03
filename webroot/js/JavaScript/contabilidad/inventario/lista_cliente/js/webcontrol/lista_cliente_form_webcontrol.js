//<script type="text/javascript" language="javascript">



//var lista_clienteJQueryPaginaWebInteraccion= function (lista_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {lista_cliente_constante,lista_cliente_constante1} from '../util/lista_cliente_constante.js';

import {lista_cliente_funcion,lista_cliente_funcion1} from '../util/lista_cliente_form_funcion.js';


class lista_cliente_webcontrol extends GeneralEntityWebControl {
	
	lista_cliente_control=null;
	lista_cliente_controlInicial=null;
	lista_cliente_controlAuxiliar=null;
		
	//if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lista_cliente_control) {
		super();
		
		this.lista_cliente_control=lista_cliente_control;
	}
		
	actualizarVariablesPagina(lista_cliente_control) {
		
		if(lista_cliente_control.action=="index" || lista_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lista_cliente_control);
			
		} 
		
		
		
	
		else if(lista_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lista_cliente_control);	
		
		} else if(lista_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lista_cliente_control);		
		}
	
	
		
		
		else if(lista_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lista_cliente_control);
		
		} else if(lista_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(lista_cliente_control);		
		
		} else if(lista_cliente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(lista_cliente_control);		
		
		} 
		//else if(lista_cliente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lista_cliente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + lista_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(lista_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(lista_cliente_control) {
		this.actualizarPaginaAccionesGenerales(lista_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(lista_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(lista_cliente_control);
		this.actualizarPaginaOrderBy(lista_cliente_control);
		this.actualizarPaginaTablaDatos(lista_cliente_control);
		this.actualizarPaginaCargaGeneralControles(lista_cliente_control);
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_cliente_control);
		this.actualizarPaginaAreaBusquedas(lista_cliente_control);
		this.actualizarPaginaCargaCombosFK(lista_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(lista_cliente_control) {
		//this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lista_cliente_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(lista_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_cliente_control);		
		this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(lista_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_cliente_control);		
		this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(lista_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_cliente_control);		
		this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lista_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(lista_cliente_control);
		this.actualizarPaginaCargaCombosFK(lista_cliente_control);
		this.actualizarPaginaFormulario(lista_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(lista_cliente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lista_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(lista_cliente_control);
		this.actualizarPaginaCargaCombosFK(lista_cliente_control);
		this.actualizarPaginaFormulario(lista_cliente_control);
		this.onLoadCombosDefectoFK(lista_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(lista_cliente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(lista_cliente_control) {
		//FORMULARIO
		if(lista_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lista_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);		
		
		//COMBOS FK
		if(lista_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_cliente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lista_cliente_control) {
		//FORMULARIO
		if(lista_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lista_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);	
		
		//COMBOS FK
		if(lista_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_cliente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(lista_cliente_control) {
		//FORMULARIO
		if(lista_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control);	
		//COMBOS FK
		if(lista_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_cliente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(lista_cliente_control) {
		
		if(lista_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lista_cliente_control);
		}
		
		if(lista_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(lista_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(lista_cliente_control) {
		if(lista_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("lista_clienteReturnGeneral",JSON.stringify(lista_cliente_control.lista_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(lista_cliente_control) {
		if(lista_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lista_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lista_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lista_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(lista_cliente_control, mostrar) {
		
		if(mostrar==true) {
			lista_cliente_funcion1.resaltarRestaurarDivsPagina(false,"lista_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lista_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"lista_cliente");
			}			
			
			lista_cliente_funcion1.mostrarDivMensaje(true,lista_cliente_control.strAuxiliarMensaje,lista_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			lista_cliente_funcion1.mostrarDivMensaje(false,lista_cliente_control.strAuxiliarMensaje,lista_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lista_cliente_control) {
		if(lista_cliente_funcion1.esPaginaForm(lista_cliente_constante1)==true) {
			window.opener.lista_cliente_webcontrol1.actualizarPaginaTablaDatos(lista_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(lista_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(lista_cliente_control) {
		lista_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lista_cliente_control.strAuxiliarUrlPagina);
				
		lista_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lista_cliente_control.strAuxiliarTipo,lista_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lista_cliente_control) {
		lista_cliente_funcion1.resaltarRestaurarDivMensaje(true,lista_cliente_control.strAuxiliarMensajeAlert,lista_cliente_control.strAuxiliarCssMensaje);
			
		if(lista_cliente_funcion1.esPaginaForm(lista_cliente_constante1)==true) {
			window.opener.lista_cliente_funcion1.resaltarRestaurarDivMensaje(true,lista_cliente_control.strAuxiliarMensajeAlert,lista_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(lista_cliente_control) {
		this.lista_cliente_controlInicial=lista_cliente_control;
			
		if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lista_cliente_control.strStyleDivArbol,lista_cliente_control.strStyleDivContent
																,lista_cliente_control.strStyleDivOpcionesBanner,lista_cliente_control.strStyleDivExpandirColapsar
																,lista_cliente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(lista_cliente_control) {
		this.actualizarCssBotonesPagina(lista_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lista_cliente_control.tiposReportes,lista_cliente_control.tiposReporte
															 	,lista_cliente_control.tiposPaginacion,lista_cliente_control.tiposAcciones
																,lista_cliente_control.tiposColumnasSelect,lista_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(lista_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lista_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lista_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(lista_cliente_control) {
	
		var indexPosition=lista_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lista_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(lista_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.cargarCombosclientesFK(lista_cliente_control);
			}

			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.cargarCombosproductosFK(lista_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lista_cliente_control.strRecargarFkTiposNinguno!=null && lista_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && lista_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(lista_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTiposNinguno,",")) { 
					lista_cliente_webcontrol1.cargarCombosclientesFK(lista_cliente_control);
				}

				if(lista_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTiposNinguno,",")) { 
					lista_cliente_webcontrol1.cargarCombosproductosFK(lista_cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaclienteFK(lista_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_cliente_funcion1,lista_cliente_control.clientesFK);
	}

	cargarComboEditarTablaproductoFK(lista_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_cliente_funcion1,lista_cliente_control.productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(lista_cliente_control) {
		jQuery("#tdlista_clienteNuevo").css("display",lista_cliente_control.strPermisoNuevo);
		jQuery("#trlista_clienteElementos").css("display",lista_cliente_control.strVisibleTablaElementos);
		jQuery("#trlista_clienteAcciones").css("display",lista_cliente_control.strVisibleTablaAcciones);
		jQuery("#trlista_clienteParametrosAcciones").css("display",lista_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(lista_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(lista_cliente_control);
				
		if(lista_cliente_control.lista_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(lista_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(lista_cliente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(lista_cliente_control) {
	
		jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id").val(lista_cliente_control.lista_clienteActual.id);
		jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-created_at").val(lista_cliente_control.lista_clienteActual.versionRow);
		jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-updated_at").val(lista_cliente_control.lista_clienteActual.versionRow);
		
		if(lista_cliente_control.lista_clienteActual.id_cliente!=null && lista_cliente_control.lista_clienteActual.id_cliente>-1){
			if(jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != lista_cliente_control.lista_clienteActual.id_cliente) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val(lista_cliente_control.lista_clienteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_cliente_control.lista_clienteActual.id_producto!=null && lista_cliente_control.lista_clienteActual.id_producto>-1){
			if(jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val() != lista_cliente_control.lista_clienteActual.id_producto) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val(lista_cliente_control.lista_clienteActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-precio").val(lista_cliente_control.lista_clienteActual.precio);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+lista_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("lista_cliente","inventario","","form_lista_cliente",formulario,"","",paraEventoTabla,idFilaTabla,lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
	}
	
	actualizarSpanMensajesCampos(lista_cliente_control) {
		jQuery("#spanstrMensajeid").text(lista_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(lista_cliente_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(lista_cliente_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_cliente").text(lista_cliente_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeid_producto").text(lista_cliente_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeprecio").text(lista_cliente_control.strMensajeprecio);		
	}
	
	actualizarCssBotonesMantenimiento(lista_cliente_control) {
		jQuery("#tdbtnNuevolista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolista_cliente").css("display",lista_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlista_cliente").css("display",lista_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlista_cliente").css("display",lista_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslista_cliente").css("display",lista_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlista_cliente").css("visibility",lista_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosclientesFK(lista_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente",lista_cliente_control.clientesFK);

		if(lista_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_cliente_control.idFilaTablaActual+"_3",lista_cliente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",lista_cliente_control.clientesFK);

	};

	cargarCombosproductosFK(lista_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto",lista_cliente_control.productosFK);

		if(lista_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_cliente_control.idFilaTablaActual+"_4",lista_cliente_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lista_cliente_control.productosFK);

	};

	
	
	registrarComboActionChangeCombosclientesFK(lista_cliente_control) {

	};

	registrarComboActionChangeCombosproductosFK(lista_cliente_control) {

	};

	
	
	setDefectoValorCombosclientesFK(lista_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_cliente_control.idclienteDefaultFK>-1 && jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val() != lista_cliente_control.idclienteDefaultFK) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente").val(lista_cliente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(lista_cliente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(lista_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_cliente_control.idproductoDefaultFK>-1 && jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val() != lista_cliente_control.idproductoDefaultFK) {
				jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto").val(lista_cliente_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lista_cliente_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_cliente_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lista_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(lista_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.setDefectoValorCombosclientesFK(lista_cliente_control);
			}

			if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTipos,",")) { 
				lista_cliente_webcontrol1.setDefectoValorCombosproductosFK(lista_cliente_control);
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
	onLoadCombosEventosFK(lista_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",lista_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_cliente_webcontrol1.registrarComboActionChangeCombosclientesFK(lista_cliente_control);
			//}

			//if(lista_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_cliente_webcontrol1.registrarComboActionChangeCombosproductosFK(lista_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lista_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(lista_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_cliente_funcion1.validarFormularioJQuery(lista_cliente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lista_cliente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lista_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(lista_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,"lista_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				lista_cliente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_cliente_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lista_cliente_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lista_cliente_control) {
		
		
		
		if(lista_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdlista_clienteActualizarToolBar").css("display",lista_cliente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdlista_clienteEliminarToolBar").css("display",lista_cliente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trlista_clienteElementos").css("display",lista_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trlista_clienteAcciones").css("display",lista_cliente_control.strVisibleTablaAcciones);
		jQuery("#trlista_clienteParametrosAcciones").css("display",lista_cliente_control.strVisibleTablaAcciones);
		
		jQuery("#tdlista_clienteCerrarPagina").css("display",lista_cliente_control.strPermisoPopup);		
		jQuery("#tdlista_clienteCerrarPaginaToolBar").css("display",lista_cliente_control.strPermisoPopup);
		//jQuery("#trlista_clienteAccionesRelaciones").css("display",lista_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=lista_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + lista_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Lista Clientes";
		sTituloBanner+=" - " + lista_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlista_clienteRelacionesToolBar").css("display",lista_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslista_cliente").css("display",lista_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		lista_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		lista_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lista_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lista_cliente_webcontrol1.registrarEventosControles();
		
		if(lista_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
			lista_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lista_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(lista_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lista_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(lista_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(lista_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(lista_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
						//lista_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(lista_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(lista_cliente_constante1.BIG_ID_ACTUAL,"lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);
						//lista_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			lista_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lista_cliente","inventario","",lista_cliente_funcion1,lista_cliente_webcontrol1,lista_cliente_constante1);	
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

var lista_cliente_webcontrol1 = new lista_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {lista_cliente_webcontrol,lista_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.lista_cliente_webcontrol1 = lista_cliente_webcontrol1;


if(lista_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lista_cliente_webcontrol1.onLoadWindow; 
}

//</script>