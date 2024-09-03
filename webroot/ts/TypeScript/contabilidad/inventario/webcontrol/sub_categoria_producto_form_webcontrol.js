//<script type="text/javascript" language="javascript">



//var sub_categoria_productoJQueryPaginaWebInteraccion= function (sub_categoria_producto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {sub_categoria_producto_constante,sub_categoria_producto_constante1} from '../util/sub_categoria_producto_constante.js';

import {sub_categoria_producto_funcion,sub_categoria_producto_funcion1} from '../util/sub_categoria_producto_form_funcion.js';


class sub_categoria_producto_webcontrol extends GeneralEntityWebControl {
	
	sub_categoria_producto_control=null;
	sub_categoria_producto_controlInicial=null;
	sub_categoria_producto_controlAuxiliar=null;
		
	//if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(sub_categoria_producto_control) {
		super();
		
		this.sub_categoria_producto_control=sub_categoria_producto_control;
	}
		
	actualizarVariablesPagina(sub_categoria_producto_control) {
		
		if(sub_categoria_producto_control.action=="index" || sub_categoria_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(sub_categoria_producto_control);
			
		} 
		
		
		
	
		else if(sub_categoria_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(sub_categoria_producto_control);	
		
		} else if(sub_categoria_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(sub_categoria_producto_control);		
		}
	
		else if(sub_categoria_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(sub_categoria_producto_control);		
		}
	
		else if(sub_categoria_producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sub_categoria_producto_control);
		}
		
		
		else if(sub_categoria_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(sub_categoria_producto_control);		
		
		} else if(sub_categoria_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(sub_categoria_producto_control);		
		
		} 
		//else if(sub_categoria_producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(sub_categoria_producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + sub_categoria_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(sub_categoria_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(sub_categoria_producto_control) {
		this.actualizarPaginaAccionesGenerales(sub_categoria_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(sub_categoria_producto_control) {
		
		this.actualizarPaginaCargaGeneral(sub_categoria_producto_control);
		this.actualizarPaginaOrderBy(sub_categoria_producto_control);
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		this.actualizarPaginaCargaGeneralControles(sub_categoria_producto_control);
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sub_categoria_producto_control);
		this.actualizarPaginaAreaBusquedas(sub_categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(sub_categoria_producto_control) {
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(sub_categoria_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sub_categoria_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(sub_categoria_producto_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(sub_categoria_producto_control) {
		this.actualizarPaginaCargaGeneralControles(sub_categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);
		this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(sub_categoria_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(sub_categoria_producto_control) {
		this.actualizarPaginaCargaGeneralControles(sub_categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);
		this.actualizarPaginaFormulario(sub_categoria_producto_control);
		this.onLoadCombosDefectoFK(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(sub_categoria_producto_control) {
		//FORMULARIO
		if(sub_categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sub_categoria_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(sub_categoria_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		
		//COMBOS FK
		if(sub_categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(sub_categoria_producto_control) {
		//FORMULARIO
		if(sub_categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sub_categoria_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(sub_categoria_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);	
		
		//COMBOS FK
		if(sub_categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(sub_categoria_producto_control) {
		//FORMULARIO
		if(sub_categoria_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(sub_categoria_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);	
		//COMBOS FK
		if(sub_categoria_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(sub_categoria_producto_control) {
		
		if(sub_categoria_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(sub_categoria_producto_control);
		}
		
		if(sub_categoria_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(sub_categoria_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(sub_categoria_producto_control) {
		if(sub_categoria_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("sub_categoria_productoReturnGeneral",JSON.stringify(sub_categoria_producto_control.sub_categoria_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control) {
		if(sub_categoria_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && sub_categoria_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(sub_categoria_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(sub_categoria_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(sub_categoria_producto_control, mostrar) {
		
		if(mostrar==true) {
			sub_categoria_producto_funcion1.resaltarRestaurarDivsPagina(false,"sub_categoria_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				sub_categoria_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"sub_categoria_producto");
			}			
			
			sub_categoria_producto_funcion1.mostrarDivMensaje(true,sub_categoria_producto_control.strAuxiliarMensaje,sub_categoria_producto_control.strAuxiliarCssMensaje);
		
		} else {
			sub_categoria_producto_funcion1.mostrarDivMensaje(false,sub_categoria_producto_control.strAuxiliarMensaje,sub_categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(sub_categoria_producto_control) {
		if(sub_categoria_producto_funcion1.esPaginaForm(sub_categoria_producto_constante1)==true) {
			window.opener.sub_categoria_producto_webcontrol1.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(sub_categoria_producto_control) {
		sub_categoria_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(sub_categoria_producto_control.strAuxiliarUrlPagina);
				
		sub_categoria_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(sub_categoria_producto_control.strAuxiliarTipo,sub_categoria_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(sub_categoria_producto_control) {
		sub_categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,sub_categoria_producto_control.strAuxiliarMensajeAlert,sub_categoria_producto_control.strAuxiliarCssMensaje);
			
		if(sub_categoria_producto_funcion1.esPaginaForm(sub_categoria_producto_constante1)==true) {
			window.opener.sub_categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,sub_categoria_producto_control.strAuxiliarMensajeAlert,sub_categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(sub_categoria_producto_control) {
		this.sub_categoria_producto_controlInicial=sub_categoria_producto_control;
			
		if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(sub_categoria_producto_control.strStyleDivArbol,sub_categoria_producto_control.strStyleDivContent
																,sub_categoria_producto_control.strStyleDivOpcionesBanner,sub_categoria_producto_control.strStyleDivExpandirColapsar
																,sub_categoria_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(sub_categoria_producto_control) {
		this.actualizarCssBotonesPagina(sub_categoria_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(sub_categoria_producto_control.tiposReportes,sub_categoria_producto_control.tiposReporte
															 	,sub_categoria_producto_control.tiposPaginacion,sub_categoria_producto_control.tiposAcciones
																,sub_categoria_producto_control.tiposColumnasSelect,sub_categoria_producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(sub_categoria_producto_control.tiposRelaciones,sub_categoria_producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(sub_categoria_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(sub_categoria_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(sub_categoria_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(sub_categoria_producto_control) {
	
		var indexPosition=sub_categoria_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=sub_categoria_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(sub_categoria_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.cargarCombosempresasFK(sub_categoria_producto_control);
			}

			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.cargarComboscategoria_productosFK(sub_categoria_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(sub_categoria_producto_control.strRecargarFkTiposNinguno!=null && sub_categoria_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && sub_categoria_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(sub_categoria_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTiposNinguno,",")) { 
					sub_categoria_producto_webcontrol1.cargarCombosempresasFK(sub_categoria_producto_control);
				}

				if(sub_categoria_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTiposNinguno,",")) { 
					sub_categoria_producto_webcontrol1.cargarComboscategoria_productosFK(sub_categoria_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(sub_categoria_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sub_categoria_producto_funcion1,sub_categoria_producto_control.empresasFK);
	}

	cargarComboEditarTablacategoria_productoFK(sub_categoria_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sub_categoria_producto_funcion1,sub_categoria_producto_control.categoria_productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(sub_categoria_producto_control) {
		jQuery("#tdsub_categoria_productoNuevo").css("display",sub_categoria_producto_control.strPermisoNuevo);
		jQuery("#trsub_categoria_productoElementos").css("display",sub_categoria_producto_control.strVisibleTablaElementos);
		jQuery("#trsub_categoria_productoAcciones").css("display",sub_categoria_producto_control.strVisibleTablaAcciones);
		jQuery("#trsub_categoria_productoParametrosAcciones").css("display",sub_categoria_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(sub_categoria_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(sub_categoria_producto_control);
				
		if(sub_categoria_producto_control.sub_categoria_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(sub_categoria_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(sub_categoria_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(sub_categoria_producto_control) {
	
		jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id").val(sub_categoria_producto_control.sub_categoria_productoActual.id);
		jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-version_row").val(sub_categoria_producto_control.sub_categoria_productoActual.versionRow);
		
		if(sub_categoria_producto_control.sub_categoria_productoActual.id_empresa!=null && sub_categoria_producto_control.sub_categoria_productoActual.id_empresa>-1){
			if(jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != sub_categoria_producto_control.sub_categoria_productoActual.id_empresa) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(sub_categoria_producto_control.sub_categoria_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto!=null && sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto>-1){
			if(jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").select2("val", null);
			if(jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-codigo").val(sub_categoria_producto_control.sub_categoria_productoActual.codigo);
		jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-nombre").val(sub_categoria_producto_control.sub_categoria_productoActual.nombre);
		jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-predeterminado").prop('checked',sub_categoria_producto_control.sub_categoria_productoActual.predeterminado);
		jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-imagen").val(sub_categoria_producto_control.sub_categoria_productoActual.imagen);
		jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-numero_productos").val(sub_categoria_producto_control.sub_categoria_productoActual.numero_productos);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+sub_categoria_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("sub_categoria_producto","inventario","","form_sub_categoria_producto",formulario,"","",paraEventoTabla,idFilaTabla,sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(sub_categoria_producto_control) {
		jQuery("#spanstrMensajeid").text(sub_categoria_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(sub_categoria_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(sub_categoria_producto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_categoria_producto").text(sub_categoria_producto_control.strMensajeid_categoria_producto);		
		jQuery("#spanstrMensajecodigo").text(sub_categoria_producto_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(sub_categoria_producto_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(sub_categoria_producto_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeimagen").text(sub_categoria_producto_control.strMensajeimagen);		
		jQuery("#spanstrMensajenumero_productos").text(sub_categoria_producto_control.strMensajenumero_productos);		
	}
	
	actualizarCssBotonesMantenimiento(sub_categoria_producto_control) {
		jQuery("#tdbtnNuevosub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevosub_categoria_producto").css("display",sub_categoria_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarsub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarsub_categoria_producto").css("display",sub_categoria_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarsub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarsub_categoria_producto").css("display",sub_categoria_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarsub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiossub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiossub_categoria_producto").css("display",sub_categoria_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarsub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarsub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarsub_categoria_producto").css("visibility",sub_categoria_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(sub_categoria_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa",sub_categoria_producto_control.empresasFK);

		if(sub_categoria_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sub_categoria_producto_control.idFilaTablaActual+"_2",sub_categoria_producto_control.empresasFK);
		}
	};

	cargarComboscategoria_productosFK(sub_categoria_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto",sub_categoria_producto_control.categoria_productosFK);

		if(sub_categoria_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sub_categoria_producto_control.idFilaTablaActual+"_3",sub_categoria_producto_control.categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto",sub_categoria_producto_control.categoria_productosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(sub_categoria_producto_control) {

	};

	registrarComboActionChangeComboscategoria_productosFK(sub_categoria_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(sub_categoria_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sub_categoria_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != sub_categoria_producto_control.idempresaDefaultFK) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(sub_categoria_producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_productosFK(sub_categoria_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sub_categoria_producto_control.idcategoria_productoDefaultFK>-1 && jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != sub_categoria_producto_control.idcategoria_productoDefaultFK) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(sub_categoria_producto_control.idcategoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(sub_categoria_producto_control.idcategoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//sub_categoria_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(sub_categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sub_categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.setDefectoValorCombosempresasFK(sub_categoria_producto_control);
			}

			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.setDefectoValorComboscategoria_productosFK(sub_categoria_producto_control);
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
	onLoadCombosEventosFK(sub_categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sub_categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sub_categoria_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(sub_categoria_producto_control);
			//}

			//if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sub_categoria_producto_webcontrol1.registrarComboActionChangeComboscategoria_productosFK(sub_categoria_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(sub_categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sub_categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(sub_categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				sub_categoria_producto_funcion1.validarFormularioJQuery(sub_categoria_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("sub_categoria_producto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("sub_categoria_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,"sub_categoria_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				sub_categoria_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_producto","id_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto_img_busqueda").click(function(){
				sub_categoria_producto_webcontrol1.abrirBusquedaParacategoria_producto("id_categoria_producto");
				//alert(jQuery('#form-id_categoria_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("sub_categoria_producto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(sub_categoria_producto_control) {
		
		
		
		if(sub_categoria_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdsub_categoria_productoActualizarToolBar").css("display",sub_categoria_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdsub_categoria_productoEliminarToolBar").css("display",sub_categoria_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trsub_categoria_productoElementos").css("display",sub_categoria_producto_control.strVisibleTablaElementos);
		
		jQuery("#trsub_categoria_productoAcciones").css("display",sub_categoria_producto_control.strVisibleTablaAcciones);
		jQuery("#trsub_categoria_productoParametrosAcciones").css("display",sub_categoria_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdsub_categoria_productoCerrarPagina").css("display",sub_categoria_producto_control.strPermisoPopup);		
		jQuery("#tdsub_categoria_productoCerrarPaginaToolBar").css("display",sub_categoria_producto_control.strPermisoPopup);
		//jQuery("#trsub_categoria_productoAccionesRelaciones").css("display",sub_categoria_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=sub_categoria_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sub_categoria_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + sub_categoria_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Sub Categoria Productos";
		sTituloBanner+=" - " + sub_categoria_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sub_categoria_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdsub_categoria_productoRelacionesToolBar").css("display",sub_categoria_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultossub_categoria_producto").css("display",sub_categoria_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		sub_categoria_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		sub_categoria_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		sub_categoria_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		sub_categoria_producto_webcontrol1.registrarEventosControles();
		
		if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			sub_categoria_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(sub_categoria_producto_constante1.STR_ES_RELACIONES=="true") {
			if(sub_categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				sub_categoria_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(sub_categoria_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(sub_categoria_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(sub_categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(sub_categoria_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
						//sub_categoria_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(sub_categoria_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(sub_categoria_producto_constante1.BIG_ID_ACTUAL,"sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
						//sub_categoria_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			sub_categoria_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);	
	}
}

var sub_categoria_producto_webcontrol1 = new sub_categoria_producto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {sub_categoria_producto_webcontrol,sub_categoria_producto_webcontrol1};

//Para ser llamado desde window.opener
window.sub_categoria_producto_webcontrol1 = sub_categoria_producto_webcontrol1;


if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = sub_categoria_producto_webcontrol1.onLoadWindow; 
}

//</script>