//<script type="text/javascript" language="javascript">



//var categoria_productoJQueryPaginaWebInteraccion= function (categoria_producto_control) {
//this.,this.,this.

import {categoria_producto_constante,categoria_producto_constante1} from '../util/categoria_producto_constante.js';

import {categoria_producto_funcion,categoria_producto_funcion1} from '../util/categoria_producto_form_funcion.js';


class categoria_producto_webcontrol extends GeneralEntityWebControl {
	
	categoria_producto_control=null;
	categoria_producto_controlInicial=null;
	categoria_producto_controlAuxiliar=null;
		
	//if(categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_producto_control) {
		super();
		
		this.categoria_producto_control=categoria_producto_control;
	}
		
	actualizarVariablesPagina(categoria_producto_control) {
		
		if(categoria_producto_control.action=="index" || categoria_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_producto_control);
			
		} 
		
		
		
	
		else if(categoria_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_producto_control);	
		
		} else if(categoria_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_producto_control);		
		}
	
		else if(categoria_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_producto_control);		
		}
	
		else if(categoria_producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_producto_control);
		}
		
		
		else if(categoria_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_producto_control);
		
		} else if(categoria_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_producto_control);		
		
		} else if(categoria_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_producto_control);		
		
		} 
		//else if(categoria_producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + categoria_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(categoria_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(categoria_producto_control) {
		this.actualizarPaginaAccionesGenerales(categoria_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(categoria_producto_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_producto_control);
		this.actualizarPaginaOrderBy(categoria_producto_control);
		this.actualizarPaginaTablaDatos(categoria_producto_control);
		this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
		//this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_producto_control);
		this.actualizarPaginaAreaBusquedas(categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(categoria_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_producto_control) {
		//this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_producto_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_producto_control);		
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_producto_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(categoria_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_producto_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		this.actualizarPaginaFormulario(categoria_producto_control);
		this.onLoadCombosDefectoFK(categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_producto_control) {
		//FORMULARIO
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);		
		
		//COMBOS FK
		if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(categoria_producto_control) {
		//FORMULARIO
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);	
		
		//COMBOS FK
		if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_producto_control) {
		//FORMULARIO
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control);	
		//COMBOS FK
		if(categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(categoria_producto_control) {
		
		if(categoria_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_producto_control);
		}
		
		if(categoria_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(categoria_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(categoria_producto_control) {
		if(categoria_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("categoria_productoReturnGeneral",JSON.stringify(categoria_producto_control.categoria_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(categoria_producto_control) {
		if(categoria_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(categoria_producto_control, mostrar) {
		
		if(mostrar==true) {
			categoria_producto_funcion1.resaltarRestaurarDivsPagina(false,"categoria_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"categoria_producto");
			}			
			
			categoria_producto_funcion1.mostrarDivMensaje(true,categoria_producto_control.strAuxiliarMensaje,categoria_producto_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_producto_funcion1.mostrarDivMensaje(false,categoria_producto_control.strAuxiliarMensaje,categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_producto_control) {
		if(categoria_producto_funcion1.esPaginaForm(categoria_producto_constante1)==true) {
			window.opener.categoria_producto_webcontrol1.actualizarPaginaTablaDatos(categoria_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_producto_control) {
		categoria_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_producto_control.strAuxiliarUrlPagina);
				
		categoria_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_producto_control.strAuxiliarTipo,categoria_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_producto_control) {
		categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,categoria_producto_control.strAuxiliarMensajeAlert,categoria_producto_control.strAuxiliarCssMensaje);
			
		if(categoria_producto_funcion1.esPaginaForm(categoria_producto_constante1)==true) {
			window.opener.categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,categoria_producto_control.strAuxiliarMensajeAlert,categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(categoria_producto_control) {
		this.categoria_producto_controlInicial=categoria_producto_control;
			
		if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_producto_control.strStyleDivArbol,categoria_producto_control.strStyleDivContent
																,categoria_producto_control.strStyleDivOpcionesBanner,categoria_producto_control.strStyleDivExpandirColapsar
																,categoria_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(categoria_producto_control) {
		this.actualizarCssBotonesPagina(categoria_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_producto_control.tiposReportes,categoria_producto_control.tiposReporte
															 	,categoria_producto_control.tiposPaginacion,categoria_producto_control.tiposAcciones
																,categoria_producto_control.tiposColumnasSelect,categoria_producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_producto_control.tiposRelaciones,categoria_producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(categoria_producto_control) {
	
		var indexPosition=categoria_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(categoria_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTipos,",")) { 
				categoria_producto_webcontrol1.cargarCombosempresasFK(categoria_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_producto_control.strRecargarFkTiposNinguno!=null && categoria_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(categoria_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTiposNinguno,",")) { 
					categoria_producto_webcontrol1.cargarCombosempresasFK(categoria_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(categoria_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,categoria_producto_funcion1,categoria_producto_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(categoria_producto_control) {
		jQuery("#tdcategoria_productoNuevo").css("display",categoria_producto_control.strPermisoNuevo);
		jQuery("#trcategoria_productoElementos").css("display",categoria_producto_control.strVisibleTablaElementos);
		jQuery("#trcategoria_productoAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_productoParametrosAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_producto_control);
				
		if(categoria_producto_control.categoria_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_producto_control) {
	
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id").val(categoria_producto_control.categoria_productoActual.id);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-version_row").val(categoria_producto_control.categoria_productoActual.versionRow);
		
		if(categoria_producto_control.categoria_productoActual.id_empresa!=null && categoria_producto_control.categoria_productoActual.id_empresa>-1){
			if(jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_producto_control.categoria_productoActual.id_empresa) {
				jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(categoria_producto_control.categoria_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-codigo").val(categoria_producto_control.categoria_productoActual.codigo);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-nombre").val(categoria_producto_control.categoria_productoActual.nombre);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-predeterminado").prop('checked',categoria_producto_control.categoria_productoActual.predeterminado);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-numero_productos").val(categoria_producto_control.categoria_productoActual.numero_productos);
		jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-imagen").val(categoria_producto_control.categoria_productoActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_producto","inventario","","form_categoria_producto",formulario,"","",paraEventoTabla,idFilaTabla,categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(categoria_producto_control) {
		jQuery("#spanstrMensajeid").text(categoria_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(categoria_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(categoria_producto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(categoria_producto_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(categoria_producto_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_producto_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajenumero_productos").text(categoria_producto_control.strMensajenumero_productos);		
		jQuery("#spanstrMensajeimagen").text(categoria_producto_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_producto_control) {
		jQuery("#tdbtnNuevocategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_producto").css("display",categoria_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_producto").css("display",categoria_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_producto").css("display",categoria_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_producto").css("display",categoria_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_producto").css("visibility",categoria_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(categoria_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa",categoria_producto_control.empresasFK);

		if(categoria_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+categoria_producto_control.idFilaTablaActual+"_2",categoria_producto_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(categoria_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(categoria_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(categoria_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != categoria_producto_control.idempresaDefaultFK) {
				jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(categoria_producto_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTipos,",")) { 
				categoria_producto_webcontrol1.setDefectoValorCombosempresasFK(categoria_producto_control);
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
	onLoadCombosEventosFK(categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",categoria_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				categoria_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(categoria_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_producto_funcion1.validarFormularioJQuery(categoria_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_producto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_producto_funcion1,categoria_producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_producto_funcion1,categoria_producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(categoria_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,"categoria_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+categoria_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				categoria_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_producto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_producto_control) {
		
		
		
		if(categoria_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_productoActualizarToolBar").css("display",categoria_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcategoria_productoEliminarToolBar").css("display",categoria_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcategoria_productoElementos").css("display",categoria_producto_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_productoAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_productoParametrosAcciones").css("display",categoria_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdcategoria_productoCerrarPagina").css("display",categoria_producto_control.strPermisoPopup);		
		jQuery("#tdcategoria_productoCerrarPaginaToolBar").css("display",categoria_producto_control.strPermisoPopup);
		//jQuery("#trcategoria_productoAccionesRelaciones").css("display",categoria_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=categoria_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + categoria_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Categoria Productos";
		sTituloBanner+=" - " + categoria_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcategoria_productoRelacionesToolBar").css("display",categoria_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscategoria_producto").css("display",categoria_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		categoria_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		categoria_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_producto_webcontrol1.registrarEventosControles();
		
		if(categoria_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			categoria_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_producto_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(categoria_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(categoria_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
						//categoria_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(categoria_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_producto_constante1.BIG_ID_ACTUAL,"categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);
						//categoria_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			categoria_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_producto","inventario","",categoria_producto_funcion1,categoria_producto_webcontrol1,categoria_producto_constante1);	
	}
}

var categoria_producto_webcontrol1 = new categoria_producto_webcontrol();

export {categoria_producto_webcontrol,categoria_producto_webcontrol1};

//Para ser llamado desde window.opener
window.categoria_producto_webcontrol1 = categoria_producto_webcontrol1;


if(categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_producto_webcontrol1.onLoadWindow; 
}

//</script>