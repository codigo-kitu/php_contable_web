//<script type="text/javascript" language="javascript">



//var parametro_auxiliarJQueryPaginaWebInteraccion= function (parametro_auxiliar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_auxiliar_constante,parametro_auxiliar_constante1} from '../util/parametro_auxiliar_constante.js';

import {parametro_auxiliar_funcion,parametro_auxiliar_funcion1} from '../util/parametro_auxiliar_form_funcion.js';


class parametro_auxiliar_webcontrol extends GeneralEntityWebControl {
	
	parametro_auxiliar_control=null;
	parametro_auxiliar_controlInicial=null;
	parametro_auxiliar_controlAuxiliar=null;
		
	//if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_auxiliar_control) {
		super();
		
		this.parametro_auxiliar_control=parametro_auxiliar_control;
	}
		
	actualizarVariablesPagina(parametro_auxiliar_control) {
		
		if(parametro_auxiliar_control.action=="index" || parametro_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_auxiliar_control);
			
		} 
		
		
		
	
		else if(parametro_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_auxiliar_control);	
		
		} else if(parametro_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_auxiliar_control);		
		}
	
	
		
		
		else if(parametro_auxiliar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_auxiliar_control);
		
		} else if(parametro_auxiliar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_auxiliar_control);		
		
		} else if(parametro_auxiliar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_auxiliar_control);		
		
		} 
		//else if(parametro_auxiliar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_auxiliar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_auxiliar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_auxiliar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_auxiliar_control) {
		this.actualizarPaginaAccionesGenerales(parametro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_auxiliar_control);
		this.actualizarPaginaOrderBy(parametro_auxiliar_control);
		this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
		//this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(parametro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_auxiliar_control) {
		//this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_auxiliar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_auxiliar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		this.actualizarPaginaFormulario(parametro_auxiliar_control);
		this.onLoadCombosDefectoFK(parametro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_auxiliar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_auxiliar_control) {
		//FORMULARIO
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_auxiliar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);		
		
		//COMBOS FK
		if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_auxiliar_control) {
		//FORMULARIO
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_auxiliar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);	
		
		//COMBOS FK
		if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_auxiliar_control) {
		//FORMULARIO
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control);	
		//COMBOS FK
		if(parametro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_auxiliar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_auxiliar_control) {
		
		if(parametro_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_auxiliar_control);
		}
		
		if(parametro_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_auxiliar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_auxiliar_control) {
		if(parametro_auxiliar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_auxiliarReturnGeneral",JSON.stringify(parametro_auxiliar_control.parametro_auxiliarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_auxiliar_control) {
		if(parametro_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			parametro_auxiliar_funcion1.resaltarRestaurarDivsPagina(false,"parametro_auxiliar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_auxiliar");
			}			
			
			parametro_auxiliar_funcion1.mostrarDivMensaje(true,parametro_auxiliar_control.strAuxiliarMensaje,parametro_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_auxiliar_funcion1.mostrarDivMensaje(false,parametro_auxiliar_control.strAuxiliarMensaje,parametro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_auxiliar_control) {
		if(parametro_auxiliar_funcion1.esPaginaForm(parametro_auxiliar_constante1)==true) {
			window.opener.parametro_auxiliar_webcontrol1.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_auxiliar_control) {
		parametro_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_auxiliar_control.strAuxiliarUrlPagina);
				
		parametro_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_auxiliar_control.strAuxiliarTipo,parametro_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_auxiliar_control) {
		parametro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,parametro_auxiliar_control.strAuxiliarMensajeAlert,parametro_auxiliar_control.strAuxiliarCssMensaje);
			
		if(parametro_auxiliar_funcion1.esPaginaForm(parametro_auxiliar_constante1)==true) {
			window.opener.parametro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,parametro_auxiliar_control.strAuxiliarMensajeAlert,parametro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_auxiliar_control) {
		this.parametro_auxiliar_controlInicial=parametro_auxiliar_control;
			
		if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_auxiliar_control.strStyleDivArbol,parametro_auxiliar_control.strStyleDivContent
																,parametro_auxiliar_control.strStyleDivOpcionesBanner,parametro_auxiliar_control.strStyleDivExpandirColapsar
																,parametro_auxiliar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_auxiliar_control) {
		this.actualizarCssBotonesPagina(parametro_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_auxiliar_control.tiposReportes,parametro_auxiliar_control.tiposReporte
															 	,parametro_auxiliar_control.tiposPaginacion,parametro_auxiliar_control.tiposAcciones
																,parametro_auxiliar_control.tiposColumnasSelect,parametro_auxiliar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_auxiliar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_auxiliar_control) {
	
		var indexPosition=parametro_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.cargarCombosempresasFK(parametro_auxiliar_control);
			}

			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.cargarCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_auxiliar_control.strRecargarFkTiposNinguno!=null && parametro_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					parametro_auxiliar_webcontrol1.cargarCombosempresasFK(parametro_auxiliar_control);
				}

				if(parametro_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					parametro_auxiliar_webcontrol1.cargarCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_auxiliar_funcion1,parametro_auxiliar_control.empresasFK);
	}

	cargarComboEditarTablatipo_costeo_kardexFK(parametro_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_auxiliar_funcion1,parametro_auxiliar_control.tipo_costeo_kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_auxiliar_control) {
		jQuery("#tdparametro_auxiliarNuevo").css("display",parametro_auxiliar_control.strPermisoNuevo);
		jQuery("#trparametro_auxiliarElementos").css("display",parametro_auxiliar_control.strVisibleTablaElementos);
		jQuery("#trparametro_auxiliarAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_auxiliarParametrosAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_auxiliar_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_auxiliar_control);
				
		if(parametro_auxiliar_control.parametro_auxiliarActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_auxiliar_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_auxiliar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_auxiliar_control) {
	
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id").val(parametro_auxiliar_control.parametro_auxiliarActual.id);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-created_at").val(parametro_auxiliar_control.parametro_auxiliarActual.versionRow);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-updated_at").val(parametro_auxiliar_control.parametro_auxiliarActual.versionRow);
		
		if(parametro_auxiliar_control.parametro_auxiliarActual.id_empresa!=null && parametro_auxiliar_control.parametro_auxiliarActual.id_empresa>-1){
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_auxiliar_control.parametro_auxiliarActual.id_empresa) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(parametro_auxiliar_control.parametro_auxiliarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-nombre_asignado").val(parametro_auxiliar_control.parametro_auxiliarActual.nombre_asignado);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-siguiente_numero_correlativo").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-incremento").val(parametro_auxiliar_control.parametro_auxiliarActual.incremento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-mostrar_solo_costo_producto").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.mostrar_solo_costo_producto);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_codigo_secuencial_producto").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_producto);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-contador_producto").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_producto);
		
		if(parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex!=null && parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex>-1){
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(parametro_auxiliar_control.parametro_auxiliarActual.id_tipo_costeo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").select2("val", null);
			if(jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_producto_inactivo").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_producto_inactivo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_busqueda_incremental").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_busqueda_incremental);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-permitir_revisar_asiento").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.permitir_revisar_asiento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-numero_decimales_unidades").val(parametro_auxiliar_control.parametro_auxiliarActual.numero_decimales_unidades);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-mostrar_documento_anulado").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.mostrar_documento_anulado);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-siguiente_numero_correlativo_cc").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo_cc);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_eliminacion_fisica_asiento").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_eliminacion_fisica_asiento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-siguiente_numero_correlativo_asiento").val(parametro_auxiliar_control.parametro_auxiliarActual.siguiente_numero_correlativo_asiento);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_asiento_simple_factura").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_asiento_simple_factura);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_codigo_secuencial_cliente").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_cliente);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-contador_cliente").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_cliente);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_cliente_inactivo").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_cliente_inactivo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_codigo_secuencial_proveedor").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_codigo_secuencial_proveedor);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-contador_proveedor").val(parametro_auxiliar_control.parametro_auxiliarActual.contador_proveedor);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_proveedor_inactivo").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_proveedor_inactivo);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-abreviatura_registro_tributario").val(parametro_auxiliar_control.parametro_auxiliarActual.abreviatura_registro_tributario);
		jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-con_asiento_cheque").prop('checked',parametro_auxiliar_control.parametro_auxiliarActual.con_asiento_cheque);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_auxiliar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_auxiliar","general","","form_parametro_auxiliar",formulario,"","",paraEventoTabla,idFilaTabla,parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_auxiliar_control) {
		jQuery("#spanstrMensajeid").text(parametro_auxiliar_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(parametro_auxiliar_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(parametro_auxiliar_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_auxiliar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajenombre_asignado").text(parametro_auxiliar_control.strMensajenombre_asignado);		
		jQuery("#spanstrMensajesiguiente_numero_correlativo").text(parametro_auxiliar_control.strMensajesiguiente_numero_correlativo);		
		jQuery("#spanstrMensajeincremento").text(parametro_auxiliar_control.strMensajeincremento);		
		jQuery("#spanstrMensajemostrar_solo_costo_producto").text(parametro_auxiliar_control.strMensajemostrar_solo_costo_producto);		
		jQuery("#spanstrMensajecon_codigo_secuencial_producto").text(parametro_auxiliar_control.strMensajecon_codigo_secuencial_producto);		
		jQuery("#spanstrMensajecontador_producto").text(parametro_auxiliar_control.strMensajecontador_producto);		
		jQuery("#spanstrMensajeid_tipo_costeo_kardex").text(parametro_auxiliar_control.strMensajeid_tipo_costeo_kardex);		
		jQuery("#spanstrMensajecon_producto_inactivo").text(parametro_auxiliar_control.strMensajecon_producto_inactivo);		
		jQuery("#spanstrMensajecon_busqueda_incremental").text(parametro_auxiliar_control.strMensajecon_busqueda_incremental);		
		jQuery("#spanstrMensajepermitir_revisar_asiento").text(parametro_auxiliar_control.strMensajepermitir_revisar_asiento);		
		jQuery("#spanstrMensajenumero_decimales_unidades").text(parametro_auxiliar_control.strMensajenumero_decimales_unidades);		
		jQuery("#spanstrMensajemostrar_documento_anulado").text(parametro_auxiliar_control.strMensajemostrar_documento_anulado);		
		jQuery("#spanstrMensajesiguiente_numero_correlativo_cc").text(parametro_auxiliar_control.strMensajesiguiente_numero_correlativo_cc);		
		jQuery("#spanstrMensajecon_eliminacion_fisica_asiento").text(parametro_auxiliar_control.strMensajecon_eliminacion_fisica_asiento);		
		jQuery("#spanstrMensajesiguiente_numero_correlativo_asiento").text(parametro_auxiliar_control.strMensajesiguiente_numero_correlativo_asiento);		
		jQuery("#spanstrMensajecon_asiento_simple_factura").text(parametro_auxiliar_control.strMensajecon_asiento_simple_factura);		
		jQuery("#spanstrMensajecon_codigo_secuencial_cliente").text(parametro_auxiliar_control.strMensajecon_codigo_secuencial_cliente);		
		jQuery("#spanstrMensajecontador_cliente").text(parametro_auxiliar_control.strMensajecontador_cliente);		
		jQuery("#spanstrMensajecon_cliente_inactivo").text(parametro_auxiliar_control.strMensajecon_cliente_inactivo);		
		jQuery("#spanstrMensajecon_codigo_secuencial_proveedor").text(parametro_auxiliar_control.strMensajecon_codigo_secuencial_proveedor);		
		jQuery("#spanstrMensajecontador_proveedor").text(parametro_auxiliar_control.strMensajecontador_proveedor);		
		jQuery("#spanstrMensajecon_proveedor_inactivo").text(parametro_auxiliar_control.strMensajecon_proveedor_inactivo);		
		jQuery("#spanstrMensajeabreviatura_registro_tributario").text(parametro_auxiliar_control.strMensajeabreviatura_registro_tributario);		
		jQuery("#spanstrMensajecon_asiento_cheque").text(parametro_auxiliar_control.strMensajecon_asiento_cheque);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_auxiliar_control) {
		jQuery("#tdbtnNuevoparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_auxiliar").css("display",parametro_auxiliar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_auxiliar").css("visibility",parametro_auxiliar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa",parametro_auxiliar_control.empresasFK);

		if(parametro_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_auxiliar_control.idFilaTablaActual+"_3",parametro_auxiliar_control.empresasFK);
		}
	};

	cargarCombostipo_costeo_kardexsFK(parametro_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex",parametro_auxiliar_control.tipo_costeo_kardexsFK);

		if(parametro_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_auxiliar_control.idFilaTablaActual+"_10",parametro_auxiliar_control.tipo_costeo_kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex",parametro_auxiliar_control.tipo_costeo_kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_auxiliar_control) {

	};

	registrarComboActionChangeCombostipo_costeo_kardexsFK(parametro_auxiliar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_auxiliar_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_auxiliar_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(parametro_auxiliar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_costeo_kardexsFK(parametro_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_auxiliar_control.idtipo_costeo_kardexDefaultFK>-1 && jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != parametro_auxiliar_control.idtipo_costeo_kardexDefaultFK) {
				jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(parametro_auxiliar_control.idtipo_costeo_kardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val(parametro_auxiliar_control.idtipo_costeo_kardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_auxiliar_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.setDefectoValorCombosempresasFK(parametro_auxiliar_control);
			}

			if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTipos,",")) { 
				parametro_auxiliar_webcontrol1.setDefectoValorCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
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
	onLoadCombosEventosFK(parametro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_auxiliar_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_auxiliar_control);
			//}

			//if(parametro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_auxiliar_webcontrol1.registrarComboActionChangeCombostipo_costeo_kardexsFK(parametro_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_auxiliar_funcion1.validarFormularioJQuery(parametro_auxiliar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_auxiliar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_auxiliar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,"parametro_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_auxiliar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_costeo_kardex","id_tipo_costeo_kardex","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_auxiliar_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex_img_busqueda").click(function(){
				parametro_auxiliar_webcontrol1.abrirBusquedaParatipo_costeo_kardex("id_tipo_costeo_kardex");
				//alert(jQuery('#form-id_tipo_costeo_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_auxiliar_control) {
		
		
		
		if(parametro_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_auxiliarActualizarToolBar").css("display",parametro_auxiliar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_auxiliarEliminarToolBar").css("display",parametro_auxiliar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_auxiliarElementos").css("display",parametro_auxiliar_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_auxiliarAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trparametro_auxiliarParametrosAcciones").css("display",parametro_auxiliar_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_auxiliarCerrarPagina").css("display",parametro_auxiliar_control.strPermisoPopup);		
		jQuery("#tdparametro_auxiliarCerrarPaginaToolBar").css("display",parametro_auxiliar_control.strPermisoPopup);
		//jQuery("#trparametro_auxiliarAccionesRelaciones").css("display",parametro_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Auxiliares";
		sTituloBanner+=" - " + parametro_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_auxiliar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_auxiliarRelacionesToolBar").css("display",parametro_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_auxiliar").css("display",parametro_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_auxiliar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_auxiliar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_auxiliar_webcontrol1.registrarEventosControles();
		
		if(parametro_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			parametro_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_auxiliar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
						//parametro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_auxiliar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_auxiliar_constante1.BIG_ID_ACTUAL,"parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);
						//parametro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_auxiliar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_auxiliar","general","",parametro_auxiliar_funcion1,parametro_auxiliar_webcontrol1,parametro_auxiliar_constante1);	
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

var parametro_auxiliar_webcontrol1 = new parametro_auxiliar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_auxiliar_webcontrol,parametro_auxiliar_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_auxiliar_webcontrol1 = parametro_auxiliar_webcontrol1;


if(parametro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>