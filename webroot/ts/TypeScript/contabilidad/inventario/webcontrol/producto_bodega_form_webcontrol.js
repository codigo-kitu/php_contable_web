//<script type="text/javascript" language="javascript">



//var producto_bodegaJQueryPaginaWebInteraccion= function (producto_bodega_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {producto_bodega_constante,producto_bodega_constante1} from '../util/producto_bodega_constante.js';

import {producto_bodega_funcion,producto_bodega_funcion1} from '../util/producto_bodega_form_funcion.js';


class producto_bodega_webcontrol extends GeneralEntityWebControl {
	
	producto_bodega_control=null;
	producto_bodega_controlInicial=null;
	producto_bodega_controlAuxiliar=null;
		
	//if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(producto_bodega_control) {
		super();
		
		this.producto_bodega_control=producto_bodega_control;
	}
		
	actualizarVariablesPagina(producto_bodega_control) {
		
		if(producto_bodega_control.action=="index" || producto_bodega_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(producto_bodega_control);
			
		} 
		
		
		
	
		else if(producto_bodega_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(producto_bodega_control);	
		
		} else if(producto_bodega_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(producto_bodega_control);		
		}
	
	
		
		
		else if(producto_bodega_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_bodega_control);
		
		} else if(producto_bodega_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(producto_bodega_control);		
		
		} else if(producto_bodega_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_bodega_control);		
		
		} 
		//else if(producto_bodega_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_bodega_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + producto_bodega_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(producto_bodega_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(producto_bodega_control) {
		this.actualizarPaginaAccionesGenerales(producto_bodega_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(producto_bodega_control) {
		
		this.actualizarPaginaCargaGeneral(producto_bodega_control);
		this.actualizarPaginaOrderBy(producto_bodega_control);
		this.actualizarPaginaTablaDatos(producto_bodega_control);
		this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
		//this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_bodega_control);
		this.actualizarPaginaAreaBusquedas(producto_bodega_control);
		this.actualizarPaginaCargaCombosFK(producto_bodega_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(producto_bodega_control) {
		//this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(producto_bodega_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(producto_bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(producto_bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(producto_bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_bodega_control);		
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_bodega_control) {
		this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
		this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(producto_bodega_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_bodega_control) {
		this.actualizarPaginaCargaGeneralControles(producto_bodega_control);
		this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		this.actualizarPaginaFormulario(producto_bodega_control);
		this.onLoadCombosDefectoFK(producto_bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		this.actualizarPaginaAreaMantenimiento(producto_bodega_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_bodega_control) {
		//FORMULARIO
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_bodega_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_bodega_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);		
		
		//COMBOS FK
		if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_bodega_control) {
		//FORMULARIO
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_bodega_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_bodega_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);	
		
		//COMBOS FK
		if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(producto_bodega_control) {
		//FORMULARIO
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_bodega_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control);	
		//COMBOS FK
		if(producto_bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_bodega_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(producto_bodega_control) {
		
		if(producto_bodega_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(producto_bodega_control);
		}
		
		if(producto_bodega_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(producto_bodega_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(producto_bodega_control) {
		if(producto_bodega_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("producto_bodegaReturnGeneral",JSON.stringify(producto_bodega_control.producto_bodegaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(producto_bodega_control) {
		if(producto_bodega_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_bodega_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(producto_bodega_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(producto_bodega_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(producto_bodega_control, mostrar) {
		
		if(mostrar==true) {
			producto_bodega_funcion1.resaltarRestaurarDivsPagina(false,"producto_bodega");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				producto_bodega_funcion1.resaltarRestaurarDivMantenimiento(false,"producto_bodega");
			}			
			
			producto_bodega_funcion1.mostrarDivMensaje(true,producto_bodega_control.strAuxiliarMensaje,producto_bodega_control.strAuxiliarCssMensaje);
		
		} else {
			producto_bodega_funcion1.mostrarDivMensaje(false,producto_bodega_control.strAuxiliarMensaje,producto_bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(producto_bodega_control) {
		if(producto_bodega_funcion1.esPaginaForm(producto_bodega_constante1)==true) {
			window.opener.producto_bodega_webcontrol1.actualizarPaginaTablaDatos(producto_bodega_control);
		} else {
			this.actualizarPaginaTablaDatos(producto_bodega_control);
		}
	}
	
	actualizarPaginaAbrirLink(producto_bodega_control) {
		producto_bodega_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(producto_bodega_control.strAuxiliarUrlPagina);
				
		producto_bodega_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(producto_bodega_control.strAuxiliarTipo,producto_bodega_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(producto_bodega_control) {
		producto_bodega_funcion1.resaltarRestaurarDivMensaje(true,producto_bodega_control.strAuxiliarMensajeAlert,producto_bodega_control.strAuxiliarCssMensaje);
			
		if(producto_bodega_funcion1.esPaginaForm(producto_bodega_constante1)==true) {
			window.opener.producto_bodega_funcion1.resaltarRestaurarDivMensaje(true,producto_bodega_control.strAuxiliarMensajeAlert,producto_bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(producto_bodega_control) {
		this.producto_bodega_controlInicial=producto_bodega_control;
			
		if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(producto_bodega_control.strStyleDivArbol,producto_bodega_control.strStyleDivContent
																,producto_bodega_control.strStyleDivOpcionesBanner,producto_bodega_control.strStyleDivExpandirColapsar
																,producto_bodega_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(producto_bodega_control) {
		this.actualizarCssBotonesPagina(producto_bodega_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(producto_bodega_control.tiposReportes,producto_bodega_control.tiposReporte
															 	,producto_bodega_control.tiposPaginacion,producto_bodega_control.tiposAcciones
																,producto_bodega_control.tiposColumnasSelect,producto_bodega_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(producto_bodega_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(producto_bodega_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(producto_bodega_control);			
	}
	
	actualizarPaginaUsuarioInvitado(producto_bodega_control) {
	
		var indexPosition=producto_bodega_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=producto_bodega_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(producto_bodega_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.cargarCombosbodegasFK(producto_bodega_control);
			}

			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.cargarCombosproductosFK(producto_bodega_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(producto_bodega_control.strRecargarFkTiposNinguno!=null && producto_bodega_control.strRecargarFkTiposNinguno!='NINGUNO' && producto_bodega_control.strRecargarFkTiposNinguno!='') {
			
				if(producto_bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTiposNinguno,",")) { 
					producto_bodega_webcontrol1.cargarCombosbodegasFK(producto_bodega_control);
				}

				if(producto_bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTiposNinguno,",")) { 
					producto_bodega_webcontrol1.cargarCombosproductosFK(producto_bodega_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablabodegaFK(producto_bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_bodega_funcion1,producto_bodega_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(producto_bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_bodega_funcion1,producto_bodega_control.productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(producto_bodega_control) {
		jQuery("#tdproducto_bodegaNuevo").css("display",producto_bodega_control.strPermisoNuevo);
		jQuery("#trproducto_bodegaElementos").css("display",producto_bodega_control.strVisibleTablaElementos);
		jQuery("#trproducto_bodegaAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);
		jQuery("#trproducto_bodegaParametrosAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(producto_bodega_control) {
	
		this.actualizarCssBotonesMantenimiento(producto_bodega_control);
				
		if(producto_bodega_control.producto_bodegaActual!=null) {//form
			
			this.actualizarCamposFormulario(producto_bodega_control);			
		}
						
		this.actualizarSpanMensajesCampos(producto_bodega_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(producto_bodega_control) {
	
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id").val(producto_bodega_control.producto_bodegaActual.id);
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-version_row").val(producto_bodega_control.producto_bodegaActual.versionRow);
		
		if(producto_bodega_control.producto_bodegaActual.id_bodega!=null && producto_bodega_control.producto_bodegaActual.id_bodega>-1){
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val() != producto_bodega_control.producto_bodegaActual.id_bodega) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val(producto_bodega_control.producto_bodegaActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_bodega_control.producto_bodegaActual.id_producto!=null && producto_bodega_control.producto_bodegaActual.id_producto>-1){
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val() != producto_bodega_control.producto_bodegaActual.id_producto) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val(producto_bodega_control.producto_bodegaActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-cantidad").val(producto_bodega_control.producto_bodegaActual.cantidad);
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-costo").val(producto_bodega_control.producto_bodegaActual.costo);
		jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-ubicacion").val(producto_bodega_control.producto_bodegaActual.ubicacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+producto_bodega_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("producto_bodega","inventario","","form_producto_bodega",formulario,"","",paraEventoTabla,idFilaTabla,producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
	}
	
	actualizarSpanMensajesCampos(producto_bodega_control) {
		jQuery("#spanstrMensajeid").text(producto_bodega_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(producto_bodega_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_bodega").text(producto_bodega_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(producto_bodega_control.strMensajeid_producto);		
		jQuery("#spanstrMensajecantidad").text(producto_bodega_control.strMensajecantidad);		
		jQuery("#spanstrMensajecosto").text(producto_bodega_control.strMensajecosto);		
		jQuery("#spanstrMensajeubicacion").text(producto_bodega_control.strMensajeubicacion);		
	}
	
	actualizarCssBotonesMantenimiento(producto_bodega_control) {
		jQuery("#tdbtnNuevoproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoproducto_bodega").css("display",producto_bodega_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarproducto_bodega").css("display",producto_bodega_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarproducto_bodega").css("display",producto_bodega_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosproducto_bodega").css("display",producto_bodega_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarproducto_bodega").css("visibility",producto_bodega_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosbodegasFK(producto_bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega",producto_bodega_control.bodegasFK);

		if(producto_bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_bodega_control.idFilaTablaActual+"_2",producto_bodega_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",producto_bodega_control.bodegasFK);

	};

	cargarCombosproductosFK(producto_bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto",producto_bodega_control.productosFK);

		if(producto_bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_bodega_control.idFilaTablaActual+"_3",producto_bodega_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",producto_bodega_control.productosFK);

	};

	
	
	registrarComboActionChangeCombosbodegasFK(producto_bodega_control) {

	};

	registrarComboActionChangeCombosproductosFK(producto_bodega_control) {

	};

	
	
	setDefectoValorCombosbodegasFK(producto_bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_bodega_control.idbodegaDefaultFK>-1 && jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val() != producto_bodega_control.idbodegaDefaultFK) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega").val(producto_bodega_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(producto_bodega_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(producto_bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_bodega_control.idproductoDefaultFK>-1 && jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val() != producto_bodega_control.idproductoDefaultFK) {
				jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto").val(producto_bodega_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(producto_bodega_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_bodega_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//producto_bodega_control
		
	
	}
	
	onLoadCombosDefectoFK(producto_bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.setDefectoValorCombosbodegasFK(producto_bodega_control);
			}

			if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTipos,",")) { 
				producto_bodega_webcontrol1.setDefectoValorCombosproductosFK(producto_bodega_control);
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
	onLoadCombosEventosFK(producto_bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",producto_bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_bodega_webcontrol1.registrarComboActionChangeCombosbodegasFK(producto_bodega_control);
			//}

			//if(producto_bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",producto_bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_bodega_webcontrol1.registrarComboActionChangeCombosproductosFK(producto_bodega_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(producto_bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(producto_bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_bodega_funcion1.validarFormularioJQuery(producto_bodega_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("producto_bodega");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("producto_bodega");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(producto_bodega_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,"producto_bodega");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				producto_bodega_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_bodega_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				producto_bodega_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(producto_bodega_control) {
		
		
		
		if(producto_bodega_control.strPermisoActualizar!=null) {
			jQuery("#tdproducto_bodegaActualizarToolBar").css("display",producto_bodega_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdproducto_bodegaEliminarToolBar").css("display",producto_bodega_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trproducto_bodegaElementos").css("display",producto_bodega_control.strVisibleTablaElementos);
		
		jQuery("#trproducto_bodegaAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);
		jQuery("#trproducto_bodegaParametrosAcciones").css("display",producto_bodega_control.strVisibleTablaAcciones);
		
		jQuery("#tdproducto_bodegaCerrarPagina").css("display",producto_bodega_control.strPermisoPopup);		
		jQuery("#tdproducto_bodegaCerrarPaginaToolBar").css("display",producto_bodega_control.strPermisoPopup);
		//jQuery("#trproducto_bodegaAccionesRelaciones").css("display",producto_bodega_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=producto_bodega_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_bodega_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + producto_bodega_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Producto Bodegas";
		sTituloBanner+=" - " + producto_bodega_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_bodega_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdproducto_bodegaRelacionesToolBar").css("display",producto_bodega_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosproducto_bodega").css("display",producto_bodega_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		producto_bodega_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		producto_bodega_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		producto_bodega_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		producto_bodega_webcontrol1.registrarEventosControles();
		
		if(producto_bodega_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
			producto_bodega_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(producto_bodega_constante1.STR_ES_RELACIONES=="true") {
			if(producto_bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_bodega_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(producto_bodega_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(producto_bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(producto_bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(producto_bodega_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
						//producto_bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(producto_bodega_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(producto_bodega_constante1.BIG_ID_ACTUAL,"producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);
						//producto_bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			producto_bodega_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("producto_bodega","inventario","",producto_bodega_funcion1,producto_bodega_webcontrol1,producto_bodega_constante1);	
	}
}

var producto_bodega_webcontrol1 = new producto_bodega_webcontrol();

//Para ser llamado desde otro archivo (import)
export {producto_bodega_webcontrol,producto_bodega_webcontrol1};

//Para ser llamado desde window.opener
window.producto_bodega_webcontrol1 = producto_bodega_webcontrol1;


if(producto_bodega_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = producto_bodega_webcontrol1.onLoadWindow; 
}

//</script>