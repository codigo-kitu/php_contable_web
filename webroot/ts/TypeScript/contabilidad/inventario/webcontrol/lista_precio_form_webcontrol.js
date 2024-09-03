//<script type="text/javascript" language="javascript">



//var lista_precioJQueryPaginaWebInteraccion= function (lista_precio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {lista_precio_constante,lista_precio_constante1} from '../util/lista_precio_constante.js';

import {lista_precio_funcion,lista_precio_funcion1} from '../util/lista_precio_form_funcion.js';


class lista_precio_webcontrol extends GeneralEntityWebControl {
	
	lista_precio_control=null;
	lista_precio_controlInicial=null;
	lista_precio_controlAuxiliar=null;
		
	//if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lista_precio_control) {
		super();
		
		this.lista_precio_control=lista_precio_control;
	}
		
	actualizarVariablesPagina(lista_precio_control) {
		
		if(lista_precio_control.action=="index" || lista_precio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lista_precio_control);
			
		} 
		
		
		
	
		else if(lista_precio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lista_precio_control);	
		
		} else if(lista_precio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lista_precio_control);		
		}
	
	
		
		
		else if(lista_precio_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(lista_precio_control);
		
		} else if(lista_precio_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(lista_precio_control);
		
		} else if(lista_precio_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(lista_precio_control);
		
		} else if(lista_precio_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lista_precio_control);
		
		} else if(lista_precio_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lista_precio_control);
		
		} else if(lista_precio_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(lista_precio_control);		
		
		} else if(lista_precio_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(lista_precio_control);		
		
		} 
		//else if(lista_precio_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lista_precio_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + lista_precio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(lista_precio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(lista_precio_control) {
		this.actualizarPaginaAccionesGenerales(lista_precio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(lista_precio_control) {
		
		this.actualizarPaginaCargaGeneral(lista_precio_control);
		this.actualizarPaginaOrderBy(lista_precio_control);
		this.actualizarPaginaTablaDatos(lista_precio_control);
		this.actualizarPaginaCargaGeneralControles(lista_precio_control);
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lista_precio_control);
		this.actualizarPaginaAreaBusquedas(lista_precio_control);
		this.actualizarPaginaCargaCombosFK(lista_precio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(lista_precio_control) {
		//this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lista_precio_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(lista_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_precio_control);		
		this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(lista_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_precio_control);		
		this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(lista_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lista_precio_control);		
		this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lista_precio_control) {
		this.actualizarPaginaCargaGeneralControles(lista_precio_control);
		this.actualizarPaginaCargaCombosFK(lista_precio_control);
		this.actualizarPaginaFormulario(lista_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(lista_precio_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lista_precio_control) {
		this.actualizarPaginaCargaGeneralControles(lista_precio_control);
		this.actualizarPaginaCargaCombosFK(lista_precio_control);
		this.actualizarPaginaFormulario(lista_precio_control);
		this.onLoadCombosDefectoFK(lista_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		this.actualizarPaginaAreaMantenimiento(lista_precio_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(lista_precio_control) {
		//FORMULARIO
		if(lista_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_precio_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lista_precio_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);		
		
		//COMBOS FK
		if(lista_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_precio_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lista_precio_control) {
		//FORMULARIO
		if(lista_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_precio_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lista_precio_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);	
		
		//COMBOS FK
		if(lista_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_precio_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(lista_precio_control) {
		//FORMULARIO
		if(lista_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lista_precio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lista_precio_control);	
		//COMBOS FK
		if(lista_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lista_precio_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(lista_precio_control) {
		
		if(lista_precio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lista_precio_control);
		}
		
		if(lista_precio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(lista_precio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(lista_precio_control) {
		if(lista_precio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("lista_precioReturnGeneral",JSON.stringify(lista_precio_control.lista_precioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(lista_precio_control) {
		if(lista_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lista_precio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lista_precio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lista_precio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(lista_precio_control, mostrar) {
		
		if(mostrar==true) {
			lista_precio_funcion1.resaltarRestaurarDivsPagina(false,"lista_precio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lista_precio_funcion1.resaltarRestaurarDivMantenimiento(false,"lista_precio");
			}			
			
			lista_precio_funcion1.mostrarDivMensaje(true,lista_precio_control.strAuxiliarMensaje,lista_precio_control.strAuxiliarCssMensaje);
		
		} else {
			lista_precio_funcion1.mostrarDivMensaje(false,lista_precio_control.strAuxiliarMensaje,lista_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lista_precio_control) {
		if(lista_precio_funcion1.esPaginaForm(lista_precio_constante1)==true) {
			window.opener.lista_precio_webcontrol1.actualizarPaginaTablaDatos(lista_precio_control);
		} else {
			this.actualizarPaginaTablaDatos(lista_precio_control);
		}
	}
	
	actualizarPaginaAbrirLink(lista_precio_control) {
		lista_precio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lista_precio_control.strAuxiliarUrlPagina);
				
		lista_precio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lista_precio_control.strAuxiliarTipo,lista_precio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lista_precio_control) {
		lista_precio_funcion1.resaltarRestaurarDivMensaje(true,lista_precio_control.strAuxiliarMensajeAlert,lista_precio_control.strAuxiliarCssMensaje);
			
		if(lista_precio_funcion1.esPaginaForm(lista_precio_constante1)==true) {
			window.opener.lista_precio_funcion1.resaltarRestaurarDivMensaje(true,lista_precio_control.strAuxiliarMensajeAlert,lista_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(lista_precio_control) {
		this.lista_precio_controlInicial=lista_precio_control;
			
		if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lista_precio_control.strStyleDivArbol,lista_precio_control.strStyleDivContent
																,lista_precio_control.strStyleDivOpcionesBanner,lista_precio_control.strStyleDivExpandirColapsar
																,lista_precio_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(lista_precio_control) {
		this.actualizarCssBotonesPagina(lista_precio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lista_precio_control.tiposReportes,lista_precio_control.tiposReporte
															 	,lista_precio_control.tiposPaginacion,lista_precio_control.tiposAcciones
																,lista_precio_control.tiposColumnasSelect,lista_precio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(lista_precio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lista_precio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lista_precio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(lista_precio_control) {
	
		var indexPosition=lista_precio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lista_precio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(lista_precio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosempresasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosbodegasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosproductosFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.cargarCombosproveedorsFK(lista_precio_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lista_precio_control.strRecargarFkTiposNinguno!=null && lista_precio_control.strRecargarFkTiposNinguno!='NINGUNO' && lista_precio_control.strRecargarFkTiposNinguno!='') {
			
				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosempresasFK(lista_precio_control);
				}

				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosbodegasFK(lista_precio_control);
				}

				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosproductosFK(lista_precio_control);
				}

				if(lista_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTiposNinguno,",")) { 
					lista_precio_webcontrol1.cargarCombosproveedorsFK(lista_precio_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.empresasFK);
	}

	cargarComboEditarTablabodegaFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.productosFK);
	}

	cargarComboEditarTablaproveedorFK(lista_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lista_precio_funcion1,lista_precio_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(lista_precio_control) {
		jQuery("#tdlista_precioNuevo").css("display",lista_precio_control.strPermisoNuevo);
		jQuery("#trlista_precioElementos").css("display",lista_precio_control.strVisibleTablaElementos);
		jQuery("#trlista_precioAcciones").css("display",lista_precio_control.strVisibleTablaAcciones);
		jQuery("#trlista_precioParametrosAcciones").css("display",lista_precio_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(lista_precio_control) {
	
		this.actualizarCssBotonesMantenimiento(lista_precio_control);
				
		if(lista_precio_control.lista_precioActual!=null) {//form
			
			this.actualizarCamposFormulario(lista_precio_control);			
		}
						
		this.actualizarSpanMensajesCampos(lista_precio_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(lista_precio_control) {
	
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id").val(lista_precio_control.lista_precioActual.id);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-version_row").val(lista_precio_control.lista_precioActual.versionRow);
		
		if(lista_precio_control.lista_precioActual.id_empresa!=null && lista_precio_control.lista_precioActual.id_empresa>-1){
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val() != lista_precio_control.lista_precioActual.id_empresa) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val(lista_precio_control.lista_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_precio_control.lista_precioActual.id_bodega!=null && lista_precio_control.lista_precioActual.id_bodega>-1){
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val() != lista_precio_control.lista_precioActual.id_bodega) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val(lista_precio_control.lista_precioActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_precio_control.lista_precioActual.id_producto!=null && lista_precio_control.lista_precioActual.id_producto>-1){
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val() != lista_precio_control.lista_precioActual.id_producto) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val(lista_precio_control.lista_precioActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(lista_precio_control.lista_precioActual.id_proveedor!=null && lista_precio_control.lista_precioActual.id_proveedor>-1){
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val() != lista_precio_control.lista_precioActual.id_proveedor) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val(lista_precio_control.lista_precioActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-precio_compra").val(lista_precio_control.lista_precioActual.precio_compra);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-rango_inicial").val(lista_precio_control.lista_precioActual.rango_inicial);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-rango_final").val(lista_precio_control.lista_precioActual.rango_final);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-precio_dolar").val(lista_precio_control.lista_precioActual.precio_dolar);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-precio_compra2").val(lista_precio_control.lista_precioActual.precio_compra2);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-precio_dolar2").val(lista_precio_control.lista_precioActual.precio_dolar2);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-rango_inicial2").val(lista_precio_control.lista_precioActual.rango_inicial2);
		jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-rango_final2").val(lista_precio_control.lista_precioActual.rango_final2);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+lista_precio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("lista_precio","inventario","","form_lista_precio",formulario,"","",paraEventoTabla,idFilaTabla,lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}
	
	actualizarSpanMensajesCampos(lista_precio_control) {
		jQuery("#spanstrMensajeid").text(lista_precio_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(lista_precio_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(lista_precio_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_bodega").text(lista_precio_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(lista_precio_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_proveedor").text(lista_precio_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeprecio_compra").text(lista_precio_control.strMensajeprecio_compra);		
		jQuery("#spanstrMensajerango_inicial").text(lista_precio_control.strMensajerango_inicial);		
		jQuery("#spanstrMensajerango_final").text(lista_precio_control.strMensajerango_final);		
		jQuery("#spanstrMensajeprecio_dolar").text(lista_precio_control.strMensajeprecio_dolar);		
		jQuery("#spanstrMensajeprecio_compra2").text(lista_precio_control.strMensajeprecio_compra2);		
		jQuery("#spanstrMensajeprecio_dolar2").text(lista_precio_control.strMensajeprecio_dolar2);		
		jQuery("#spanstrMensajerango_inicial2").text(lista_precio_control.strMensajerango_inicial2);		
		jQuery("#spanstrMensajerango_final2").text(lista_precio_control.strMensajerango_final2);		
	}
	
	actualizarCssBotonesMantenimiento(lista_precio_control) {
		jQuery("#tdbtnNuevolista_precio").css("visibility",lista_precio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolista_precio").css("display",lista_precio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlista_precio").css("visibility",lista_precio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlista_precio").css("display",lista_precio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlista_precio").css("visibility",lista_precio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlista_precio").css("display",lista_precio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlista_precio").css("visibility",lista_precio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslista_precio").css("visibility",lista_precio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslista_precio").css("display",lista_precio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlista_precio").css("visibility",lista_precio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlista_precio").css("visibility",lista_precio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlista_precio").css("visibility",lista_precio_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa",lista_precio_control.empresasFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_2",lista_precio_control.empresasFK);
		}
	};

	cargarCombosbodegasFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega",lista_precio_control.bodegasFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_3",lista_precio_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",lista_precio_control.bodegasFK);

	};

	cargarCombosproductosFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto",lista_precio_control.productosFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_4",lista_precio_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lista_precio_control.productosFK);

	};

	cargarCombosproveedorsFK(lista_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor",lista_precio_control.proveedorsFK);

		if(lista_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lista_precio_control.idFilaTablaActual+"_5",lista_precio_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",lista_precio_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(lista_precio_control) {

	};

	registrarComboActionChangeCombosbodegasFK(lista_precio_control) {

	};

	registrarComboActionChangeCombosproductosFK(lista_precio_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(lista_precio_control) {

	};

	
	
	setDefectoValorCombosempresasFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idempresaDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val() != lista_precio_control.idempresaDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa").val(lista_precio_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idbodegaDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val() != lista_precio_control.idbodegaDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega").val(lista_precio_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(lista_precio_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idproductoDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val() != lista_precio_control.idproductoDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto").val(lista_precio_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lista_precio_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(lista_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lista_precio_control.idproveedorDefaultFK>-1 && jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val() != lista_precio_control.idproveedorDefaultFK) {
				jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor").val(lista_precio_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(lista_precio_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lista_precio_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lista_precio_control
		
	
	}
	
	onLoadCombosDefectoFK(lista_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosempresasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosbodegasFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosproductosFK(lista_precio_control);
			}

			if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTipos,",")) { 
				lista_precio_webcontrol1.setDefectoValorCombosproveedorsFK(lista_precio_control);
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
	onLoadCombosEventosFK(lista_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosempresasFK(lista_precio_control);
			//}

			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosbodegasFK(lista_precio_control);
			//}

			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosproductosFK(lista_precio_control);
			//}

			//if(lista_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lista_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lista_precio_webcontrol1.registrarComboActionChangeCombosproveedorsFK(lista_precio_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lista_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lista_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(lista_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_precio_funcion1.validarFormularioJQuery(lista_precio_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lista_precio");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lista_precio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(lista_precio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,"lista_precio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lista_precio_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				lista_precio_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lista_precio_control) {
		
		
		
		if(lista_precio_control.strPermisoActualizar!=null) {
			jQuery("#tdlista_precioActualizarToolBar").css("display",lista_precio_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdlista_precioEliminarToolBar").css("display",lista_precio_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trlista_precioElementos").css("display",lista_precio_control.strVisibleTablaElementos);
		
		jQuery("#trlista_precioAcciones").css("display",lista_precio_control.strVisibleTablaAcciones);
		jQuery("#trlista_precioParametrosAcciones").css("display",lista_precio_control.strVisibleTablaAcciones);
		
		jQuery("#tdlista_precioCerrarPagina").css("display",lista_precio_control.strPermisoPopup);		
		jQuery("#tdlista_precioCerrarPaginaToolBar").css("display",lista_precio_control.strPermisoPopup);
		//jQuery("#trlista_precioAccionesRelaciones").css("display",lista_precio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=lista_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + lista_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Lista Precioses";
		sTituloBanner+=" - " + lista_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lista_precio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlista_precioRelacionesToolBar").css("display",lista_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslista_precio").css("display",lista_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		lista_precio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		lista_precio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lista_precio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lista_precio_webcontrol1.registrarEventosControles();
		
		if(lista_precio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
			lista_precio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lista_precio_constante1.STR_ES_RELACIONES=="true") {
			if(lista_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				lista_precio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lista_precio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(lista_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(lista_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(lista_precio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
						//lista_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(lista_precio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(lista_precio_constante1.BIG_ID_ACTUAL,"lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);
						//lista_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			lista_precio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lista_precio","inventario","",lista_precio_funcion1,lista_precio_webcontrol1,lista_precio_constante1);	
	}
}

var lista_precio_webcontrol1 = new lista_precio_webcontrol();

//Para ser llamado desde otro archivo (import)
export {lista_precio_webcontrol,lista_precio_webcontrol1};

//Para ser llamado desde window.opener
window.lista_precio_webcontrol1 = lista_precio_webcontrol1;


if(lista_precio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lista_precio_webcontrol1.onLoadWindow; 
}

//</script>