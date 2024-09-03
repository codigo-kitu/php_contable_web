//<script type="text/javascript" language="javascript">



//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {
//this.,this.,this.

import {tipo_precio_constante,tipo_precio_constante1} from '../util/tipo_precio_constante.js';

import {tipo_precio_funcion,tipo_precio_funcion1} from '../util/tipo_precio_form_funcion.js';


class tipo_precio_webcontrol extends GeneralEntityWebControl {
	
	tipo_precio_control=null;
	tipo_precio_controlInicial=null;
	tipo_precio_controlAuxiliar=null;
		
	//if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_precio_control) {
		super();
		
		this.tipo_precio_control=tipo_precio_control;
	}
		
	actualizarVariablesPagina(tipo_precio_control) {
		
		if(tipo_precio_control.action=="index" || tipo_precio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_precio_control);
			
		} 
		
		
		
	
		else if(tipo_precio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_precio_control);	
		
		} else if(tipo_precio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control);		
		}
	
		else if(tipo_precio_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control);		
		}
	
		else if(tipo_precio_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control);
		}
		
		
		else if(tipo_precio_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_precio_control);		
		
		} 
		//else if(tipo_precio_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tipo_precio_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_precio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_precio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_precio_control) {
		this.actualizarPaginaAccionesGenerales(tipo_precio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_precio_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_precio_control);
		this.actualizarPaginaOrderBy(tipo_precio_control);
		this.actualizarPaginaTablaDatos(tipo_precio_control);
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
		this.actualizarPaginaAreaBusquedas(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_precio_control) {
		//this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(tipo_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_precio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_precio_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tipo_precio_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_precio_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		this.actualizarPaginaFormulario(tipo_precio_control);
		this.onLoadCombosDefectoFK(tipo_precio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_precio_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_precio_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_precio_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_precio_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_precio_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);	
		
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_precio_control) {
		//FORMULARIO
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_precio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);	
		//COMBOS FK
		if(tipo_precio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_precio_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_precio_control) {
		
		if(tipo_precio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_precio_control);
		}
		
		if(tipo_precio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_precio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_precio_control) {
		if(tipo_precio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_precioReturnGeneral",JSON.stringify(tipo_precio_control.tipo_precioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control) {
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_precio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_precio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_precio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_precio_control, mostrar) {
		
		if(mostrar==true) {
			tipo_precio_funcion1.resaltarRestaurarDivsPagina(false,"tipo_precio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_precio_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_precio");
			}			
			
			tipo_precio_funcion1.mostrarDivMensaje(true,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_precio_funcion1.mostrarDivMensaje(false,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_precio_control) {
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_webcontrol1.actualizarPaginaTablaDatos(tipo_precio_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_precio_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_precio_control) {
		tipo_precio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_precio_control.strAuxiliarUrlPagina);
				
		tipo_precio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_precio_control.strAuxiliarTipo,tipo_precio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_precio_control) {
		tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
			
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_precio_control) {
		this.tipo_precio_controlInicial=tipo_precio_control;
			
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_precio_control.strStyleDivArbol,tipo_precio_control.strStyleDivContent
																,tipo_precio_control.strStyleDivOpcionesBanner,tipo_precio_control.strStyleDivExpandirColapsar
																,tipo_precio_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_precio_control) {
		this.actualizarCssBotonesPagina(tipo_precio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_precio_control.tiposReportes,tipo_precio_control.tiposReporte
															 	,tipo_precio_control.tiposPaginacion,tipo_precio_control.tiposAcciones
																,tipo_precio_control.tiposColumnasSelect,tipo_precio_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_precio_control.tiposRelaciones,tipo_precio_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_precio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_precio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_precio_control) {
	
		var indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_precio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_precio_control.strRecargarFkTiposNinguno!=null && tipo_precio_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_precio_control.strRecargarFkTiposNinguno!='') {
			
				if(tipo_precio_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTiposNinguno,",")) { 
					tipo_precio_webcontrol1.cargarCombosempresasFK(tipo_precio_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(tipo_precio_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,tipo_precio_funcion1,tipo_precio_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tipo_precio_control) {
		jQuery("#tdtipo_precioNuevo").css("display",tipo_precio_control.strPermisoNuevo);
		jQuery("#trtipo_precioElementos").css("display",tipo_precio_control.strVisibleTablaElementos);
		jQuery("#trtipo_precioAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		jQuery("#trtipo_precioParametrosAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_precio_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_precio_control);
				
		if(tipo_precio_control.tipo_precioActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_precio_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_precio_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_precio_control) {
	
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id").val(tipo_precio_control.tipo_precioActual.id);
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-version_row").val(tipo_precio_control.tipo_precioActual.versionRow);
		
		if(tipo_precio_control.tipo_precioActual.id_empresa!=null && tipo_precio_control.tipo_precioActual.id_empresa>-1){
			if(jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.tipo_precioActual.id_empresa) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.tipo_precioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-codigo").val(tipo_precio_control.tipo_precioActual.codigo);
		jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-nombre").val(tipo_precio_control.tipo_precioActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_precio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_precio","inventario","","form_tipo_precio",formulario,"","",paraEventoTabla,idFilaTabla,tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	actualizarSpanMensajesCampos(tipo_precio_control) {
		jQuery("#spanstrMensajeid").text(tipo_precio_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_precio_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(tipo_precio_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(tipo_precio_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_precio_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_precio_control) {
		jQuery("#tdbtnNuevotipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_precio").css("display",tipo_precio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_precio").css("display",tipo_precio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_precio").css("display",tipo_precio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_precio").css("display",tipo_precio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_precio").css("visibility",tipo_precio_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(tipo_precio_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa",tipo_precio_control.empresasFK);

		if(tipo_precio_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+tipo_precio_control.idFilaTablaActual+"_2",tipo_precio_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(tipo_precio_control) {

	};

	
	
	setDefectoValorCombosempresasFK(tipo_precio_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(tipo_precio_control.idempresaDefaultFK>-1 && jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val() != tipo_precio_control.idempresaDefaultFK) {
				jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa").val(tipo_precio_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_precio_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 
				tipo_precio_webcontrol1.setDefectoValorCombosempresasFK(tipo_precio_control);
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
	onLoadCombosEventosFK(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(tipo_precio_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",tipo_precio_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				tipo_precio_webcontrol1.registrarComboActionChangeCombosempresasFK(tipo_precio_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_precio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_precio_funcion1.validarFormularioJQuery(tipo_precio_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_precio");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_precio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_precio_funcion1,tipo_precio_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_precio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,"tipo_precio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+tipo_precio_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				tipo_precio_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_precio");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_precio_control) {
		
		
		
		if(tipo_precio_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_precioActualizarToolBar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_precioEliminarToolBar").css("display",tipo_precio_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_precioElementos").css("display",tipo_precio_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_precioAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		jQuery("#trtipo_precioParametrosAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_precioCerrarPagina").css("display",tipo_precio_control.strPermisoPopup);		
		jQuery("#tdtipo_precioCerrarPaginaToolBar").css("display",tipo_precio_control.strPermisoPopup);
		//jQuery("#trtipo_precioAccionesRelaciones").css("display",tipo_precio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Precios";
		sTituloBanner+=" - " + tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_precio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_precioRelacionesToolBar").css("display",tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_precio").css("display",tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_precio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_precio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_precio_webcontrol1.registrarEventosControles();
		
		if(tipo_precio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			tipo_precio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_precio_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_precio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_precio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tipo_precio_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_precio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
						//tipo_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_precio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_precio_constante1.BIG_ID_ACTUAL,"tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);
						//tipo_precio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_precio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_precio","inventario","",tipo_precio_funcion1,tipo_precio_webcontrol1,tipo_precio_constante1);	
	}
}

var tipo_precio_webcontrol1 = new tipo_precio_webcontrol();

export {tipo_precio_webcontrol,tipo_precio_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_precio_webcontrol1 = tipo_precio_webcontrol1;


if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_precio_webcontrol1.onLoadWindow; 
}

//</script>