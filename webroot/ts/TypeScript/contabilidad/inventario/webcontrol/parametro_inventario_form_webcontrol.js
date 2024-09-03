//<script type="text/javascript" language="javascript">



//var parametro_inventarioJQueryPaginaWebInteraccion= function (parametro_inventario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_inventario_constante,parametro_inventario_constante1} from '../util/parametro_inventario_constante.js';

import {parametro_inventario_funcion,parametro_inventario_funcion1} from '../util/parametro_inventario_form_funcion.js';


class parametro_inventario_webcontrol extends GeneralEntityWebControl {
	
	parametro_inventario_control=null;
	parametro_inventario_controlInicial=null;
	parametro_inventario_controlAuxiliar=null;
		
	//if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_inventario_control) {
		super();
		
		this.parametro_inventario_control=parametro_inventario_control;
	}
		
	actualizarVariablesPagina(parametro_inventario_control) {
		
		if(parametro_inventario_control.action=="index" || parametro_inventario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_inventario_control);
			
		} 
		
		
		
	
		else if(parametro_inventario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_inventario_control);	
		
		} else if(parametro_inventario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_inventario_control);		
		}
	
	
		
		
		else if(parametro_inventario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_inventario_control);
		
		} else if(parametro_inventario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_inventario_control);		
		
		} else if(parametro_inventario_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_inventario_control);		
		
		} 
		//else if(parametro_inventario_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_inventario_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_inventario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_inventario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_inventario_control) {
		this.actualizarPaginaAccionesGenerales(parametro_inventario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_inventario_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_inventario_control);
		this.actualizarPaginaOrderBy(parametro_inventario_control);
		this.actualizarPaginaTablaDatos(parametro_inventario_control);
		this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
		//this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_inventario_control);
		this.actualizarPaginaAreaBusquedas(parametro_inventario_control);
		this.actualizarPaginaCargaCombosFK(parametro_inventario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_inventario_control) {
		//this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_inventario_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_inventario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_inventario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_inventario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_inventario_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
		this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_inventario_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_inventario_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_inventario_control);
		this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		this.actualizarPaginaFormulario(parametro_inventario_control);
		this.onLoadCombosDefectoFK(parametro_inventario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_inventario_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_inventario_control) {
		//FORMULARIO
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_inventario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_inventario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);		
		
		//COMBOS FK
		if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_inventario_control) {
		//FORMULARIO
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_inventario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_inventario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);	
		
		//COMBOS FK
		if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_inventario_control) {
		//FORMULARIO
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_inventario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control);	
		//COMBOS FK
		if(parametro_inventario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_inventario_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_inventario_control) {
		
		if(parametro_inventario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_inventario_control);
		}
		
		if(parametro_inventario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_inventario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_inventario_control) {
		if(parametro_inventario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_inventarioReturnGeneral",JSON.stringify(parametro_inventario_control.parametro_inventarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_inventario_control) {
		if(parametro_inventario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_inventario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_inventario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_inventario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_inventario_control, mostrar) {
		
		if(mostrar==true) {
			parametro_inventario_funcion1.resaltarRestaurarDivsPagina(false,"parametro_inventario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_inventario_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_inventario");
			}			
			
			parametro_inventario_funcion1.mostrarDivMensaje(true,parametro_inventario_control.strAuxiliarMensaje,parametro_inventario_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_inventario_funcion1.mostrarDivMensaje(false,parametro_inventario_control.strAuxiliarMensaje,parametro_inventario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_inventario_control) {
		if(parametro_inventario_funcion1.esPaginaForm(parametro_inventario_constante1)==true) {
			window.opener.parametro_inventario_webcontrol1.actualizarPaginaTablaDatos(parametro_inventario_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_inventario_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_inventario_control) {
		parametro_inventario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_inventario_control.strAuxiliarUrlPagina);
				
		parametro_inventario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_inventario_control.strAuxiliarTipo,parametro_inventario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_inventario_control) {
		parametro_inventario_funcion1.resaltarRestaurarDivMensaje(true,parametro_inventario_control.strAuxiliarMensajeAlert,parametro_inventario_control.strAuxiliarCssMensaje);
			
		if(parametro_inventario_funcion1.esPaginaForm(parametro_inventario_constante1)==true) {
			window.opener.parametro_inventario_funcion1.resaltarRestaurarDivMensaje(true,parametro_inventario_control.strAuxiliarMensajeAlert,parametro_inventario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_inventario_control) {
		this.parametro_inventario_controlInicial=parametro_inventario_control;
			
		if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_inventario_control.strStyleDivArbol,parametro_inventario_control.strStyleDivContent
																,parametro_inventario_control.strStyleDivOpcionesBanner,parametro_inventario_control.strStyleDivExpandirColapsar
																,parametro_inventario_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_inventario_control) {
		this.actualizarCssBotonesPagina(parametro_inventario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_inventario_control.tiposReportes,parametro_inventario_control.tiposReporte
															 	,parametro_inventario_control.tiposPaginacion,parametro_inventario_control.tiposAcciones
																,parametro_inventario_control.tiposColumnasSelect,parametro_inventario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_inventario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_inventario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_inventario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_inventario_control) {
	
		var indexPosition=parametro_inventario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_inventario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_inventario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.cargarCombosempresasFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.cargarCombostermino_pago_proveedorsFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.cargarCombostipo_costeo_kardexsFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.cargarCombostipo_kardexsFK(parametro_inventario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_inventario_control.strRecargarFkTiposNinguno!=null && parametro_inventario_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_inventario_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_inventario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_inventario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_inventario_webcontrol1.cargarCombosempresasFK(parametro_inventario_control);
				}

				if(parametro_inventario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_inventario_webcontrol1.cargarCombostermino_pago_proveedorsFK(parametro_inventario_control);
				}

				if(parametro_inventario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_inventario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_inventario_webcontrol1.cargarCombostipo_costeo_kardexsFK(parametro_inventario_control);
				}

				if(parametro_inventario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_inventario_webcontrol1.cargarCombostipo_kardexsFK(parametro_inventario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_inventario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_inventario_funcion1,parametro_inventario_control.empresasFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(parametro_inventario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_inventario_funcion1,parametro_inventario_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablatipo_costeo_kardexFK(parametro_inventario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_inventario_funcion1,parametro_inventario_control.tipo_costeo_kardexsFK);
	}

	cargarComboEditarTablatipo_kardexFK(parametro_inventario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_inventario_funcion1,parametro_inventario_control.tipo_kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_inventario_control) {
		jQuery("#tdparametro_inventarioNuevo").css("display",parametro_inventario_control.strPermisoNuevo);
		jQuery("#trparametro_inventarioElementos").css("display",parametro_inventario_control.strVisibleTablaElementos);
		jQuery("#trparametro_inventarioAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);
		jQuery("#trparametro_inventarioParametrosAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_inventario_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_inventario_control);
				
		if(parametro_inventario_control.parametro_inventarioActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_inventario_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_inventario_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_inventario_control) {
	
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id").val(parametro_inventario_control.parametro_inventarioActual.id);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-version_row").val(parametro_inventario_control.parametro_inventarioActual.versionRow);
		
		if(parametro_inventario_control.parametro_inventarioActual.id_empresa!=null && parametro_inventario_control.parametro_inventarioActual.id_empresa>-1){
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_inventario_control.parametro_inventarioActual.id_empresa) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa").val(parametro_inventario_control.parametro_inventarioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor!=null && parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(parametro_inventario_control.parametro_inventarioActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_inventario_control.parametro_inventarioActual.id_tipo_costeo_kardex!=null && parametro_inventario_control.parametro_inventarioActual.id_tipo_costeo_kardex>-1){
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != parametro_inventario_control.parametro_inventarioActual.id_tipo_costeo_kardex) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(parametro_inventario_control.parametro_inventarioActual.id_tipo_costeo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").select2("val", null);
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex!=null && parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex>-1){
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val(parametro_inventario_control.parametro_inventarioActual.id_tipo_kardex).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").select2("val", null);
			if(jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_producto").val(parametro_inventario_control.parametro_inventarioActual.numero_producto);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_orden_compra").val(parametro_inventario_control.parametro_inventarioActual.numero_orden_compra);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_devolucion").val(parametro_inventario_control.parametro_inventarioActual.numero_devolucion);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_cotizacion").val(parametro_inventario_control.parametro_inventarioActual.numero_cotizacion);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-numero_kardex").val(parametro_inventario_control.parametro_inventarioActual.numero_kardex);
		jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-con_producto_inactivo").prop('checked',parametro_inventario_control.parametro_inventarioActual.con_producto_inactivo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_inventario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_inventario","inventario","","form_parametro_inventario",formulario,"","",paraEventoTabla,idFilaTabla,parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_inventario_control) {
		jQuery("#spanstrMensajeid").text(parametro_inventario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_inventario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_inventario_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(parametro_inventario_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajeid_tipo_costeo_kardex").text(parametro_inventario_control.strMensajeid_tipo_costeo_kardex);		
		jQuery("#spanstrMensajeid_tipo_kardex").text(parametro_inventario_control.strMensajeid_tipo_kardex);		
		jQuery("#spanstrMensajenumero_producto").text(parametro_inventario_control.strMensajenumero_producto);		
		jQuery("#spanstrMensajenumero_orden_compra").text(parametro_inventario_control.strMensajenumero_orden_compra);		
		jQuery("#spanstrMensajenumero_devolucion").text(parametro_inventario_control.strMensajenumero_devolucion);		
		jQuery("#spanstrMensajenumero_cotizacion").text(parametro_inventario_control.strMensajenumero_cotizacion);		
		jQuery("#spanstrMensajenumero_kardex").text(parametro_inventario_control.strMensajenumero_kardex);		
		jQuery("#spanstrMensajecon_producto_inactivo").text(parametro_inventario_control.strMensajecon_producto_inactivo);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_inventario_control) {
		jQuery("#tdbtnNuevoparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_inventario").css("display",parametro_inventario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_inventario").css("display",parametro_inventario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_inventario").css("display",parametro_inventario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_inventario").css("display",parametro_inventario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_inventario").css("visibility",parametro_inventario_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_inventario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa",parametro_inventario_control.empresasFK);

		if(parametro_inventario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_inventario_control.idFilaTablaActual+"_2",parametro_inventario_control.empresasFK);
		}
	};

	cargarCombostermino_pago_proveedorsFK(parametro_inventario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",parametro_inventario_control.termino_pago_proveedorsFK);

		if(parametro_inventario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_inventario_control.idFilaTablaActual+"_3",parametro_inventario_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",parametro_inventario_control.termino_pago_proveedorsFK);

	};

	cargarCombostipo_costeo_kardexsFK(parametro_inventario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex",parametro_inventario_control.tipo_costeo_kardexsFK);

		if(parametro_inventario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_inventario_control.idFilaTablaActual+"_4",parametro_inventario_control.tipo_costeo_kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex",parametro_inventario_control.tipo_costeo_kardexsFK);

	};

	cargarCombostipo_kardexsFK(parametro_inventario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex",parametro_inventario_control.tipo_kardexsFK);

		if(parametro_inventario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_inventario_control.idFilaTablaActual+"_5",parametro_inventario_control.tipo_kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex",parametro_inventario_control.tipo_kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_inventario_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(parametro_inventario_control) {

	};

	registrarComboActionChangeCombostipo_costeo_kardexsFK(parametro_inventario_control) {

	};

	registrarComboActionChangeCombostipo_kardexsFK(parametro_inventario_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_inventario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_inventario_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_inventario_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa").val(parametro_inventario_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(parametro_inventario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_inventario_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != parametro_inventario_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(parametro_inventario_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(parametro_inventario_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_costeo_kardexsFK(parametro_inventario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_inventario_control.idtipo_costeo_kardexDefaultFK>-1 && jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val() != parametro_inventario_control.idtipo_costeo_kardexDefaultFK) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex").val(parametro_inventario_control.idtipo_costeo_kardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val(parametro_inventario_control.idtipo_costeo_kardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_kardexsFK(parametro_inventario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_inventario_control.idtipo_kardexDefaultFK>-1 && jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val() != parametro_inventario_control.idtipo_kardexDefaultFK) {
				jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex").val(parametro_inventario_control.idtipo_kardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val(parametro_inventario_control.idtipo_kardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_inventario_constante1.STR_SUFIJO+"FK_Idtipo_kardex-cmbid_tipo_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_inventario_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_inventario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_inventario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.setDefectoValorCombosempresasFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.setDefectoValorCombostipo_costeo_kardexsFK(parametro_inventario_control);
			}

			if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 
				parametro_inventario_webcontrol1.setDefectoValorCombostipo_kardexsFK(parametro_inventario_control);
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
	onLoadCombosEventosFK(parametro_inventario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_inventario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_inventario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_inventario_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_inventario_control);
			//}

			//if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",parametro_inventario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_inventario_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(parametro_inventario_control);
			//}

			//if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_costeo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_inventario_webcontrol1.registrarComboActionChangeCombostipo_costeo_kardexsFK(parametro_inventario_control);
			//}

			//if(parametro_inventario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_kardex",parametro_inventario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_inventario_webcontrol1.registrarComboActionChangeCombostipo_kardexsFK(parametro_inventario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_inventario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_inventario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_inventario_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_inventario_funcion1.validarFormularioJQuery(parametro_inventario_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_inventario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_inventario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_inventario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,"parametro_inventario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_inventario_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				parametro_inventario_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_costeo_kardex","id_tipo_costeo_kardex","general","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_costeo_kardex_img_busqueda").click(function(){
				parametro_inventario_webcontrol1.abrirBusquedaParatipo_costeo_kardex("id_tipo_costeo_kardex");
				//alert(jQuery('#form-id_tipo_costeo_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_kardex","id_tipo_kardex","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_inventario_constante1.STR_SUFIJO+"-id_tipo_kardex_img_busqueda").click(function(){
				parametro_inventario_webcontrol1.abrirBusquedaParatipo_kardex("id_tipo_kardex");
				//alert(jQuery('#form-id_tipo_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_inventario_control) {
		
		
		
		if(parametro_inventario_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_inventarioActualizarToolBar").css("display",parametro_inventario_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_inventarioEliminarToolBar").css("display",parametro_inventario_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_inventarioElementos").css("display",parametro_inventario_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_inventarioAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);
		jQuery("#trparametro_inventarioParametrosAcciones").css("display",parametro_inventario_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_inventarioCerrarPagina").css("display",parametro_inventario_control.strPermisoPopup);		
		jQuery("#tdparametro_inventarioCerrarPaginaToolBar").css("display",parametro_inventario_control.strPermisoPopup);
		//jQuery("#trparametro_inventarioAccionesRelaciones").css("display",parametro_inventario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_inventario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_inventario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_inventario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Inventarios";
		sTituloBanner+=" - " + parametro_inventario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_inventario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_inventarioRelacionesToolBar").css("display",parametro_inventario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_inventario").css("display",parametro_inventario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_inventario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_inventario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_inventario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_inventario_webcontrol1.registrarEventosControles();
		
		if(parametro_inventario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
			parametro_inventario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_inventario_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_inventario_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_inventario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_inventario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_inventario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_inventario_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_inventario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
						//parametro_inventario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_inventario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_inventario_constante1.BIG_ID_ACTUAL,"parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);
						//parametro_inventario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_inventario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_inventario","inventario","",parametro_inventario_funcion1,parametro_inventario_webcontrol1,parametro_inventario_constante1);	
	}
}

var parametro_inventario_webcontrol1 = new parametro_inventario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_inventario_webcontrol,parametro_inventario_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_inventario_webcontrol1 = parametro_inventario_webcontrol1;


if(parametro_inventario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_inventario_webcontrol1.onLoadWindow; 
}

//</script>