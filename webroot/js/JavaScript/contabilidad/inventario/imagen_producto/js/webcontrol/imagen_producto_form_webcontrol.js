//<script type="text/javascript" language="javascript">



//var imagen_productoJQueryPaginaWebInteraccion= function (imagen_producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_producto_constante,imagen_producto_constante1} from '../util/imagen_producto_constante.js';

import {imagen_producto_funcion,imagen_producto_funcion1} from '../util/imagen_producto_form_funcion.js';


class imagen_producto_webcontrol extends GeneralEntityWebControl {
	
	imagen_producto_control=null;
	imagen_producto_controlInicial=null;
	imagen_producto_controlAuxiliar=null;
		
	//if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_producto_control) {
		super();
		
		this.imagen_producto_control=imagen_producto_control;
	}
		
	actualizarVariablesPagina(imagen_producto_control) {
		
		if(imagen_producto_control.action=="index" || imagen_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_producto_control);
			
		} 
		
		
		
	
		else if(imagen_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_producto_control);	
		
		} else if(imagen_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_producto_control);		
		}
	
	
		
		
		else if(imagen_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_producto_control);
		
		} else if(imagen_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_producto_control);		
		
		} else if(imagen_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_producto_control);		
		
		} 
		//else if(imagen_producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_producto_control) {
		this.actualizarPaginaAccionesGenerales(imagen_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_producto_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_producto_control);
		this.actualizarPaginaOrderBy(imagen_producto_control);
		this.actualizarPaginaTablaDatos(imagen_producto_control);
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_producto_control);
		this.actualizarPaginaAreaBusquedas(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_producto_control) {
		//this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_producto_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_producto_control);		
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_producto_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_producto_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_producto_control);
		this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		this.actualizarPaginaFormulario(imagen_producto_control);
		this.onLoadCombosDefectoFK(imagen_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_producto_control) {
		//FORMULARIO
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);		
		
		//COMBOS FK
		if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_producto_control) {
		//FORMULARIO
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);	
		
		//COMBOS FK
		if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_producto_control) {
		//FORMULARIO
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control);	
		//COMBOS FK
		if(imagen_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_producto_control) {
		
		if(imagen_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_producto_control);
		}
		
		if(imagen_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_producto_control) {
		if(imagen_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_productoReturnGeneral",JSON.stringify(imagen_producto_control.imagen_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_producto_control) {
		if(imagen_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_producto_control, mostrar) {
		
		if(mostrar==true) {
			imagen_producto_funcion1.resaltarRestaurarDivsPagina(false,"imagen_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_producto");
			}			
			
			imagen_producto_funcion1.mostrarDivMensaje(true,imagen_producto_control.strAuxiliarMensaje,imagen_producto_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_producto_funcion1.mostrarDivMensaje(false,imagen_producto_control.strAuxiliarMensaje,imagen_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_producto_control) {
		if(imagen_producto_funcion1.esPaginaForm(imagen_producto_constante1)==true) {
			window.opener.imagen_producto_webcontrol1.actualizarPaginaTablaDatos(imagen_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_producto_control) {
		imagen_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_producto_control.strAuxiliarUrlPagina);
				
		imagen_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_producto_control.strAuxiliarTipo,imagen_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_producto_control) {
		imagen_producto_funcion1.resaltarRestaurarDivMensaje(true,imagen_producto_control.strAuxiliarMensajeAlert,imagen_producto_control.strAuxiliarCssMensaje);
			
		if(imagen_producto_funcion1.esPaginaForm(imagen_producto_constante1)==true) {
			window.opener.imagen_producto_funcion1.resaltarRestaurarDivMensaje(true,imagen_producto_control.strAuxiliarMensajeAlert,imagen_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_producto_control) {
		this.imagen_producto_controlInicial=imagen_producto_control;
			
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_producto_control.strStyleDivArbol,imagen_producto_control.strStyleDivContent
																,imagen_producto_control.strStyleDivOpcionesBanner,imagen_producto_control.strStyleDivExpandirColapsar
																,imagen_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_producto_control) {
		this.actualizarCssBotonesPagina(imagen_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_producto_control.tiposReportes,imagen_producto_control.tiposReporte
															 	,imagen_producto_control.tiposPaginacion,imagen_producto_control.tiposAcciones
																,imagen_producto_control.tiposColumnasSelect,imagen_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_producto_control) {
	
		var indexPosition=imagen_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 
				imagen_producto_webcontrol1.cargarCombosproductosFK(imagen_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_producto_control.strRecargarFkTiposNinguno!=null && imagen_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTiposNinguno,",")) { 
					imagen_producto_webcontrol1.cargarCombosproductosFK(imagen_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(imagen_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_producto_funcion1,imagen_producto_control.productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_producto_control) {
		jQuery("#tdimagen_productoNuevo").css("display",imagen_producto_control.strPermisoNuevo);
		jQuery("#trimagen_productoElementos").css("display",imagen_producto_control.strVisibleTablaElementos);
		jQuery("#trimagen_productoAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);
		jQuery("#trimagen_productoParametrosAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_producto_control);
				
		if(imagen_producto_control.imagen_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_producto_control) {
	
		jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id").val(imagen_producto_control.imagen_productoActual.id);
		jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-created_at").val(imagen_producto_control.imagen_productoActual.versionRow);
		jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-updated_at").val(imagen_producto_control.imagen_productoActual.versionRow);
		
		if(imagen_producto_control.imagen_productoActual.id_producto!=null && imagen_producto_control.imagen_productoActual.id_producto>-1){
			if(jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val() != imagen_producto_control.imagen_productoActual.id_producto) {
				jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val(imagen_producto_control.imagen_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-imagen").val(imagen_producto_control.imagen_productoActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_producto","inventario","","form_imagen_producto",formulario,"","",paraEventoTabla,idFilaTabla,imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_producto_control) {
		jQuery("#spanstrMensajeid").text(imagen_producto_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(imagen_producto_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(imagen_producto_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_producto").text(imagen_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeimagen").text(imagen_producto_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_producto_control) {
		jQuery("#tdbtnNuevoimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_producto").css("display",imagen_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_producto").css("display",imagen_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_producto").css("display",imagen_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_producto").css("display",imagen_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_producto").css("visibility",imagen_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(imagen_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto",imagen_producto_control.productosFK);

		if(imagen_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_producto_control.idFilaTablaActual+"_3",imagen_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",imagen_producto_control.productosFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(imagen_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(imagen_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val() != imagen_producto_control.idproductoDefaultFK) {
				jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto").val(imagen_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(imagen_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 
				imagen_producto_webcontrol1.setDefectoValorCombosproductosFK(imagen_producto_control);
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
	onLoadCombosEventosFK(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",imagen_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(imagen_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_producto_funcion1.validarFormularioJQuery(imagen_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,"imagen_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				imagen_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_producto_control) {
		
		
		
		if(imagen_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_productoActualizarToolBar").css("display",imagen_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_productoEliminarToolBar").css("display",imagen_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_productoElementos").css("display",imagen_producto_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_productoAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);
		jQuery("#trimagen_productoParametrosAcciones").css("display",imagen_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_productoCerrarPagina").css("display",imagen_producto_control.strPermisoPopup);		
		jQuery("#tdimagen_productoCerrarPaginaToolBar").css("display",imagen_producto_control.strPermisoPopup);
		//jQuery("#trimagen_productoAccionesRelaciones").css("display",imagen_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Productos";
		sTituloBanner+=" - " + imagen_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_productoRelacionesToolBar").css("display",imagen_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_producto").css("display",imagen_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_producto_webcontrol1.registrarEventosControles();
		
		if(imagen_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
			imagen_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_producto_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
						//imagen_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_producto_constante1.BIG_ID_ACTUAL,"imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);
						//imagen_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_producto","inventario","",imagen_producto_funcion1,imagen_producto_webcontrol1,imagen_producto_constante1);	
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

var imagen_producto_webcontrol1 = new imagen_producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_producto_webcontrol,imagen_producto_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_producto_webcontrol1 = imagen_producto_webcontrol1;


if(imagen_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_producto_webcontrol1.onLoadWindow; 
}

//</script>