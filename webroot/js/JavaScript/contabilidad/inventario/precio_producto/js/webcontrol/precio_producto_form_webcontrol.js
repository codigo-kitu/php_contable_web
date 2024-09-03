//<script type="text/javascript" language="javascript">



//var precio_productoJQueryPaginaWebInteraccion= function (precio_producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {precio_producto_constante,precio_producto_constante1} from '../util/precio_producto_constante.js';

import {precio_producto_funcion,precio_producto_funcion1} from '../util/precio_producto_form_funcion.js';


class precio_producto_webcontrol extends GeneralEntityWebControl {
	
	precio_producto_control=null;
	precio_producto_controlInicial=null;
	precio_producto_controlAuxiliar=null;
		
	//if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(precio_producto_control) {
		super();
		
		this.precio_producto_control=precio_producto_control;
	}
		
	actualizarVariablesPagina(precio_producto_control) {
		
		if(precio_producto_control.action=="index" || precio_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(precio_producto_control);
			
		} 
		
		
		
	
		else if(precio_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(precio_producto_control);	
		
		} else if(precio_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(precio_producto_control);		
		}
	
	
		
		
		else if(precio_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(precio_producto_control);
		
		} else if(precio_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(precio_producto_control);
		
		} else if(precio_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(precio_producto_control);
		
		} else if(precio_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(precio_producto_control);
		
		} else if(precio_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(precio_producto_control);		
		
		} else if(precio_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(precio_producto_control);		
		
		} 
		//else if(precio_producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(precio_producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + precio_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(precio_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(precio_producto_control) {
		this.actualizarPaginaAccionesGenerales(precio_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(precio_producto_control) {
		
		this.actualizarPaginaCargaGeneral(precio_producto_control);
		this.actualizarPaginaOrderBy(precio_producto_control);
		this.actualizarPaginaTablaDatos(precio_producto_control);
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(precio_producto_control);
		this.actualizarPaginaAreaBusquedas(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(precio_producto_control) {
		//this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(precio_producto_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(precio_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(precio_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(precio_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(precio_producto_control);		
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(precio_producto_control) {
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(precio_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(precio_producto_control) {
		this.actualizarPaginaCargaGeneralControles(precio_producto_control);
		this.actualizarPaginaCargaCombosFK(precio_producto_control);
		this.actualizarPaginaFormulario(precio_producto_control);
		this.onLoadCombosDefectoFK(precio_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		this.actualizarPaginaAreaMantenimiento(precio_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(precio_producto_control) {
		//FORMULARIO
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(precio_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(precio_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);		
		
		//COMBOS FK
		if(precio_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(precio_producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(precio_producto_control) {
		//FORMULARIO
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(precio_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(precio_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);	
		
		//COMBOS FK
		if(precio_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(precio_producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(precio_producto_control) {
		//FORMULARIO
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(precio_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(precio_producto_control);	
		//COMBOS FK
		if(precio_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(precio_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(precio_producto_control) {
		
		if(precio_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(precio_producto_control);
		}
		
		if(precio_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(precio_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(precio_producto_control) {
		if(precio_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("precio_productoReturnGeneral",JSON.stringify(precio_producto_control.precio_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(precio_producto_control) {
		if(precio_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && precio_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(precio_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(precio_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(precio_producto_control, mostrar) {
		
		if(mostrar==true) {
			precio_producto_funcion1.resaltarRestaurarDivsPagina(false,"precio_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				precio_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"precio_producto");
			}			
			
			precio_producto_funcion1.mostrarDivMensaje(true,precio_producto_control.strAuxiliarMensaje,precio_producto_control.strAuxiliarCssMensaje);
		
		} else {
			precio_producto_funcion1.mostrarDivMensaje(false,precio_producto_control.strAuxiliarMensaje,precio_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(precio_producto_control) {
		if(precio_producto_funcion1.esPaginaForm(precio_producto_constante1)==true) {
			window.opener.precio_producto_webcontrol1.actualizarPaginaTablaDatos(precio_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(precio_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(precio_producto_control) {
		precio_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(precio_producto_control.strAuxiliarUrlPagina);
				
		precio_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(precio_producto_control.strAuxiliarTipo,precio_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(precio_producto_control) {
		precio_producto_funcion1.resaltarRestaurarDivMensaje(true,precio_producto_control.strAuxiliarMensajeAlert,precio_producto_control.strAuxiliarCssMensaje);
			
		if(precio_producto_funcion1.esPaginaForm(precio_producto_constante1)==true) {
			window.opener.precio_producto_funcion1.resaltarRestaurarDivMensaje(true,precio_producto_control.strAuxiliarMensajeAlert,precio_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(precio_producto_control) {
		this.precio_producto_controlInicial=precio_producto_control;
			
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(precio_producto_control.strStyleDivArbol,precio_producto_control.strStyleDivContent
																,precio_producto_control.strStyleDivOpcionesBanner,precio_producto_control.strStyleDivExpandirColapsar
																,precio_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(precio_producto_control) {
		this.actualizarCssBotonesPagina(precio_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(precio_producto_control.tiposReportes,precio_producto_control.tiposReporte
															 	,precio_producto_control.tiposPaginacion,precio_producto_control.tiposAcciones
																,precio_producto_control.tiposColumnasSelect,precio_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(precio_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(precio_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(precio_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(precio_producto_control) {
	
		var indexPosition=precio_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=precio_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(precio_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombosempresasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombosbodegasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombosproductosFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.cargarCombostipo_preciosFK(precio_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(precio_producto_control.strRecargarFkTiposNinguno!=null && precio_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && precio_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombosempresasFK(precio_producto_control);
				}

				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombosbodegasFK(precio_producto_control);
				}

				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombosproductosFK(precio_producto_control);
				}

				if(precio_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTiposNinguno,",")) { 
					precio_producto_webcontrol1.cargarCombostipo_preciosFK(precio_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.empresasFK);
	}

	cargarComboEditarTablabodegaFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.productosFK);
	}

	cargarComboEditarTablatipo_precioFK(precio_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,precio_producto_funcion1,precio_producto_control.tipo_preciosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(precio_producto_control) {
		jQuery("#tdprecio_productoNuevo").css("display",precio_producto_control.strPermisoNuevo);
		jQuery("#trprecio_productoElementos").css("display",precio_producto_control.strVisibleTablaElementos);
		jQuery("#trprecio_productoAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);
		jQuery("#trprecio_productoParametrosAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(precio_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(precio_producto_control);
				
		if(precio_producto_control.precio_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(precio_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(precio_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(precio_producto_control) {
	
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id").val(precio_producto_control.precio_productoActual.id);
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-created_at").val(precio_producto_control.precio_productoActual.versionRow);
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-updated_at").val(precio_producto_control.precio_productoActual.versionRow);
		
		if(precio_producto_control.precio_productoActual.id_empresa!=null && precio_producto_control.precio_productoActual.id_empresa>-1){
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val() != precio_producto_control.precio_productoActual.id_empresa) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val(precio_producto_control.precio_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_bodega!=null && precio_producto_control.precio_productoActual.id_bodega>-1){
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val() != precio_producto_control.precio_productoActual.id_bodega) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val(precio_producto_control.precio_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_producto!=null && precio_producto_control.precio_productoActual.id_producto>-1){
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val() != precio_producto_control.precio_productoActual.id_producto) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val(precio_producto_control.precio_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(precio_producto_control.precio_productoActual.id_tipo_precio!=null && precio_producto_control.precio_productoActual.id_tipo_precio>-1){
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val() != precio_producto_control.precio_productoActual.id_tipo_precio) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val(precio_producto_control.precio_productoActual.id_tipo_precio).trigger("change");
			}
		} else { 
			//jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").select2("val", null);
			if(jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-precio").val(precio_producto_control.precio_productoActual.precio);
		jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-descuento_porciento").val(precio_producto_control.precio_productoActual.descuento_porciento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+precio_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("precio_producto","inventario","","form_precio_producto",formulario,"","",paraEventoTabla,idFilaTabla,precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(precio_producto_control) {
		jQuery("#spanstrMensajeid").text(precio_producto_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(precio_producto_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(precio_producto_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(precio_producto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_bodega").text(precio_producto_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(precio_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_tipo_precio").text(precio_producto_control.strMensajeid_tipo_precio);		
		jQuery("#spanstrMensajeprecio").text(precio_producto_control.strMensajeprecio);		
		jQuery("#spanstrMensajedescuento_porciento").text(precio_producto_control.strMensajedescuento_porciento);		
	}
	
	actualizarCssBotonesMantenimiento(precio_producto_control) {
		jQuery("#tdbtnNuevoprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoprecio_producto").css("display",precio_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarprecio_producto").css("display",precio_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarprecio_producto").css("display",precio_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosprecio_producto").css("display",precio_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarprecio_producto").css("visibility",precio_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa",precio_producto_control.empresasFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_3",precio_producto_control.empresasFK);
		}
	};

	cargarCombosbodegasFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega",precio_producto_control.bodegasFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_4",precio_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",precio_producto_control.bodegasFK);

	};

	cargarCombosproductosFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto",precio_producto_control.productosFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_5",precio_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",precio_producto_control.productosFK);

	};

	cargarCombostipo_preciosFK(precio_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio",precio_producto_control.tipo_preciosFK);

		if(precio_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+precio_producto_control.idFilaTablaActual+"_6",precio_producto_control.tipo_preciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio",precio_producto_control.tipo_preciosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(precio_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(precio_producto_control) {

	};

	registrarComboActionChangeCombosproductosFK(precio_producto_control) {

	};

	registrarComboActionChangeCombostipo_preciosFK(precio_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val() != precio_producto_control.idempresaDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa").val(precio_producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val() != precio_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega").val(precio_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(precio_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val() != precio_producto_control.idproductoDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto").val(precio_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(precio_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_preciosFK(precio_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(precio_producto_control.idtipo_precioDefaultFK>-1 && jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val() != precio_producto_control.idtipo_precioDefaultFK) {
				jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio").val(precio_producto_control.idtipo_precioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(precio_producto_control.idtipo_precioDefaultForeignKey).trigger("change");
			if(jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+precio_producto_constante1.STR_SUFIJO+"FK_Idtipo_precio-cmbid_tipo_precio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//precio_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombosempresasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombosbodegasFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombosproductosFK(precio_producto_control);
			}

			if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 
				precio_producto_webcontrol1.setDefectoValorCombostipo_preciosFK(precio_producto_control);
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
	onLoadCombosEventosFK(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(precio_producto_control);
			//}

			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(precio_producto_control);
			//}

			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(precio_producto_control);
			//}

			//if(precio_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_precio",precio_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				precio_producto_webcontrol1.registrarComboActionChangeCombostipo_preciosFK(precio_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(precio_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(precio_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(precio_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				precio_producto_funcion1.validarFormularioJQuery(precio_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("precio_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("precio_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(precio_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,"precio_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_precio","id_tipo_precio","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+precio_producto_constante1.STR_SUFIJO+"-id_tipo_precio_img_busqueda").click(function(){
				precio_producto_webcontrol1.abrirBusquedaParatipo_precio("id_tipo_precio");
				//alert(jQuery('#form-id_tipo_precio_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(precio_producto_control) {
		
		
		
		if(precio_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdprecio_productoActualizarToolBar").css("display",precio_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdprecio_productoEliminarToolBar").css("display",precio_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trprecio_productoElementos").css("display",precio_producto_control.strVisibleTablaElementos);
		
		jQuery("#trprecio_productoAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);
		jQuery("#trprecio_productoParametrosAcciones").css("display",precio_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdprecio_productoCerrarPagina").css("display",precio_producto_control.strPermisoPopup);		
		jQuery("#tdprecio_productoCerrarPaginaToolBar").css("display",precio_producto_control.strPermisoPopup);
		//jQuery("#trprecio_productoAccionesRelaciones").css("display",precio_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=precio_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + precio_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + precio_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Precio Productos";
		sTituloBanner+=" - " + precio_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + precio_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdprecio_productoRelacionesToolBar").css("display",precio_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosprecio_producto").css("display",precio_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		precio_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		precio_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		precio_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		precio_producto_webcontrol1.registrarEventosControles();
		
		if(precio_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
			precio_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(precio_producto_constante1.STR_ES_RELACIONES=="true") {
			if(precio_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				precio_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(precio_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(precio_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(precio_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(precio_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
						//precio_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(precio_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(precio_producto_constante1.BIG_ID_ACTUAL,"precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);
						//precio_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			precio_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("precio_producto","inventario","",precio_producto_funcion1,precio_producto_webcontrol1,precio_producto_constante1);	
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

var precio_producto_webcontrol1 = new precio_producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {precio_producto_webcontrol,precio_producto_webcontrol1};

//Para ser llamado desde window.opener
window.precio_producto_webcontrol1 = precio_producto_webcontrol1;


if(precio_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = precio_producto_webcontrol1.onLoadWindow; 
}

//</script>