//<script type="text/javascript" language="javascript">



//var bodegaJQueryPaginaWebInteraccion= function (bodega_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {bodega_constante,bodega_constante1} from '../util/bodega_constante.js';

import {bodega_funcion,bodega_funcion1} from '../util/bodega_form_funcion.js';


class bodega_webcontrol extends GeneralEntityWebControl {
	
	bodega_control=null;
	bodega_controlInicial=null;
	bodega_controlAuxiliar=null;
		
	//if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(bodega_control) {
		super();
		
		this.bodega_control=bodega_control;
	}
		
	actualizarVariablesPagina(bodega_control) {
		
		if(bodega_control.action=="index" || bodega_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(bodega_control);
			
		} 
		
		
		
	
		else if(bodega_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(bodega_control);	
		
		} else if(bodega_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(bodega_control);		
		}
	
		else if(bodega_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(bodega_control);		
		}
	
		else if(bodega_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(bodega_control);
		}
		
		
		else if(bodega_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(bodega_control);
		
		} else if(bodega_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(bodega_control);
		
		} else if(bodega_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(bodega_control);
		
		} else if(bodega_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(bodega_control);
		
		} else if(bodega_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(bodega_control);		
		
		} else if(bodega_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(bodega_control);		
		
		} 
		//else if(bodega_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(bodega_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + bodega_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(bodega_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(bodega_control) {
		this.actualizarPaginaAccionesGenerales(bodega_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(bodega_control) {
		
		this.actualizarPaginaCargaGeneral(bodega_control);
		this.actualizarPaginaOrderBy(bodega_control);
		this.actualizarPaginaTablaDatos(bodega_control);
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(bodega_control);
		this.actualizarPaginaAreaBusquedas(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(bodega_control) {
		//this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(bodega_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(bodega_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(bodega_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(bodega_control) {
		this.actualizarPaginaTablaDatosAuxiliar(bodega_control);		
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(bodega_control) {
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(bodega_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(bodega_control) {
		this.actualizarPaginaCargaGeneralControles(bodega_control);
		this.actualizarPaginaCargaCombosFK(bodega_control);
		this.actualizarPaginaFormulario(bodega_control);
		this.onLoadCombosDefectoFK(bodega_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		this.actualizarPaginaAreaMantenimiento(bodega_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(bodega_control) {
		//FORMULARIO
		if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(bodega_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(bodega_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);		
		
		//COMBOS FK
		if(bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(bodega_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(bodega_control) {
		//FORMULARIO
		if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(bodega_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(bodega_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);	
		
		//COMBOS FK
		if(bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(bodega_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(bodega_control) {
		//FORMULARIO
		if(bodega_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(bodega_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(bodega_control);	
		//COMBOS FK
		if(bodega_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(bodega_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(bodega_control) {
		
		if(bodega_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(bodega_control);
		}
		
		if(bodega_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(bodega_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(bodega_control) {
		if(bodega_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("bodegaReturnGeneral",JSON.stringify(bodega_control.bodegaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(bodega_control) {
		if(bodega_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && bodega_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(bodega_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(bodega_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(bodega_control, mostrar) {
		
		if(mostrar==true) {
			bodega_funcion1.resaltarRestaurarDivsPagina(false,"bodega");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				bodega_funcion1.resaltarRestaurarDivMantenimiento(false,"bodega");
			}			
			
			bodega_funcion1.mostrarDivMensaje(true,bodega_control.strAuxiliarMensaje,bodega_control.strAuxiliarCssMensaje);
		
		} else {
			bodega_funcion1.mostrarDivMensaje(false,bodega_control.strAuxiliarMensaje,bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(bodega_control) {
		if(bodega_funcion1.esPaginaForm(bodega_constante1)==true) {
			window.opener.bodega_webcontrol1.actualizarPaginaTablaDatos(bodega_control);
		} else {
			this.actualizarPaginaTablaDatos(bodega_control);
		}
	}
	
	actualizarPaginaAbrirLink(bodega_control) {
		bodega_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(bodega_control.strAuxiliarUrlPagina);
				
		bodega_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(bodega_control.strAuxiliarTipo,bodega_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(bodega_control) {
		bodega_funcion1.resaltarRestaurarDivMensaje(true,bodega_control.strAuxiliarMensajeAlert,bodega_control.strAuxiliarCssMensaje);
			
		if(bodega_funcion1.esPaginaForm(bodega_constante1)==true) {
			window.opener.bodega_funcion1.resaltarRestaurarDivMensaje(true,bodega_control.strAuxiliarMensajeAlert,bodega_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(bodega_control) {
		this.bodega_controlInicial=bodega_control;
			
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(bodega_control.strStyleDivArbol,bodega_control.strStyleDivContent
																,bodega_control.strStyleDivOpcionesBanner,bodega_control.strStyleDivExpandirColapsar
																,bodega_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(bodega_control) {
		this.actualizarCssBotonesPagina(bodega_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(bodega_control.tiposReportes,bodega_control.tiposReporte
															 	,bodega_control.tiposPaginacion,bodega_control.tiposAcciones
																,bodega_control.tiposColumnasSelect,bodega_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(bodega_control.tiposRelaciones,bodega_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(bodega_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(bodega_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(bodega_control);			
	}
	
	actualizarPaginaUsuarioInvitado(bodega_control) {
	
		var indexPosition=bodega_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=bodega_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(bodega_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.cargarCombosempresasFK(bodega_control);
			}

			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.cargarCombossucursalsFK(bodega_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(bodega_control.strRecargarFkTiposNinguno!=null && bodega_control.strRecargarFkTiposNinguno!='NINGUNO' && bodega_control.strRecargarFkTiposNinguno!='') {
			
				if(bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTiposNinguno,",")) { 
					bodega_webcontrol1.cargarCombosempresasFK(bodega_control);
				}

				if(bodega_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTiposNinguno,",")) { 
					bodega_webcontrol1.cargarCombossucursalsFK(bodega_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,bodega_funcion1,bodega_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(bodega_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,bodega_funcion1,bodega_control.sucursalsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(bodega_control) {
		jQuery("#tdbodegaNuevo").css("display",bodega_control.strPermisoNuevo);
		jQuery("#trbodegaElementos").css("display",bodega_control.strVisibleTablaElementos);
		jQuery("#trbodegaAcciones").css("display",bodega_control.strVisibleTablaAcciones);
		jQuery("#trbodegaParametrosAcciones").css("display",bodega_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(bodega_control) {
	
		this.actualizarCssBotonesMantenimiento(bodega_control);
				
		if(bodega_control.bodegaActual!=null) {//form
			
			this.actualizarCamposFormulario(bodega_control);			
		}
						
		this.actualizarSpanMensajesCampos(bodega_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(bodega_control) {
	
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id").val(bodega_control.bodegaActual.id);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-version_row").val(bodega_control.bodegaActual.versionRow);
		
		if(bodega_control.bodegaActual.id_empresa!=null && bodega_control.bodegaActual.id_empresa>-1){
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val() != bodega_control.bodegaActual.id_empresa) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val(bodega_control.bodegaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(bodega_control.bodegaActual.id_sucursal!=null && bodega_control.bodegaActual.id_sucursal>-1){
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val() != bodega_control.bodegaActual.id_sucursal) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val(bodega_control.bodegaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-codigo").val(bodega_control.bodegaActual.codigo);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-nombre").val(bodega_control.bodegaActual.nombre);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-direccion").val(bodega_control.bodegaActual.direccion);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-telefono").val(bodega_control.bodegaActual.telefono);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-numero_productos").val(bodega_control.bodegaActual.numero_productos);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-defecto").prop('checked',bodega_control.bodegaActual.defecto);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-activo").prop('checked',bodega_control.bodegaActual.activo);
		jQuery("#form"+bodega_constante1.STR_SUFIJO+"-direccion2").val(bodega_control.bodegaActual.direccion2);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+bodega_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("bodega","inventario","","form_bodega",formulario,"","",paraEventoTabla,idFilaTabla,bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	actualizarSpanMensajesCampos(bodega_control) {
		jQuery("#spanstrMensajeid").text(bodega_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(bodega_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(bodega_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(bodega_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajecodigo").text(bodega_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(bodega_control.strMensajenombre);		
		jQuery("#spanstrMensajedireccion").text(bodega_control.strMensajedireccion);		
		jQuery("#spanstrMensajetelefono").text(bodega_control.strMensajetelefono);		
		jQuery("#spanstrMensajenumero_productos").text(bodega_control.strMensajenumero_productos);		
		jQuery("#spanstrMensajedefecto").text(bodega_control.strMensajedefecto);		
		jQuery("#spanstrMensajeactivo").text(bodega_control.strMensajeactivo);		
		jQuery("#spanstrMensajedireccion2").text(bodega_control.strMensajedireccion2);		
	}
	
	actualizarCssBotonesMantenimiento(bodega_control) {
		jQuery("#tdbtnNuevobodega").css("visibility",bodega_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevobodega").css("display",bodega_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarbodega").css("visibility",bodega_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarbodega").css("display",bodega_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarbodega").css("visibility",bodega_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarbodega").css("display",bodega_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarbodega").css("visibility",bodega_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosbodega").css("visibility",bodega_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosbodega").css("display",bodega_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarbodega").css("visibility",bodega_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarbodega").css("visibility",bodega_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarbodega").css("visibility",bodega_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa",bodega_control.empresasFK);

		if(bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+bodega_control.idFilaTablaActual+"_2",bodega_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(bodega_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal",bodega_control.sucursalsFK);

		if(bodega_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+bodega_control.idFilaTablaActual+"_3",bodega_control.sucursalsFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(bodega_control) {

	};

	registrarComboActionChangeCombossucursalsFK(bodega_control) {

	};

	
	
	setDefectoValorCombosempresasFK(bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(bodega_control.idempresaDefaultFK>-1 && jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val() != bodega_control.idempresaDefaultFK) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa").val(bodega_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(bodega_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(bodega_control.idsucursalDefaultFK>-1 && jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val() != bodega_control.idsucursalDefaultFK) {
				jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal").val(bodega_control.idsucursalDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//bodega_control
		
	
	}
	
	onLoadCombosDefectoFK(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.setDefectoValorCombosempresasFK(bodega_control);
			}

			if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 
				bodega_webcontrol1.setDefectoValorCombossucursalsFK(bodega_control);
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
	onLoadCombosEventosFK(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				bodega_webcontrol1.registrarComboActionChangeCombosempresasFK(bodega_control);
			//}

			//if(bodega_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",bodega_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				bodega_webcontrol1.registrarComboActionChangeCombossucursalsFK(bodega_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(bodega_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(bodega_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(bodega_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				bodega_funcion1.validarFormularioJQuery(bodega_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("bodega");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("bodega");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(bodega_funcion1,bodega_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(bodega_funcion1,bodega_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(bodega_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,"bodega");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				bodega_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+bodega_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				bodega_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("bodega");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(bodega_control) {
		
		
		
		if(bodega_control.strPermisoActualizar!=null) {
			jQuery("#tdbodegaActualizarToolBar").css("display",bodega_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdbodegaEliminarToolBar").css("display",bodega_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trbodegaElementos").css("display",bodega_control.strVisibleTablaElementos);
		
		jQuery("#trbodegaAcciones").css("display",bodega_control.strVisibleTablaAcciones);
		jQuery("#trbodegaParametrosAcciones").css("display",bodega_control.strVisibleTablaAcciones);
		
		jQuery("#tdbodegaCerrarPagina").css("display",bodega_control.strPermisoPopup);		
		jQuery("#tdbodegaCerrarPaginaToolBar").css("display",bodega_control.strPermisoPopup);
		//jQuery("#trbodegaAccionesRelaciones").css("display",bodega_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=bodega_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + bodega_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + bodega_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Bodegas";
		sTituloBanner+=" - " + bodega_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + bodega_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdbodegaRelacionesToolBar").css("display",bodega_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosbodega").css("display",bodega_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("bodega","inventario","",bodega_funcion1,bodega_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		bodega_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		bodega_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		bodega_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		bodega_webcontrol1.registrarEventosControles();
		
		if(bodega_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(bodega_constante1.STR_ES_RELACIONADO=="false") {
			bodega_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(bodega_constante1.STR_ES_RELACIONES=="true") {
			if(bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				bodega_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(bodega_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(bodega_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(bodega_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(bodega_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
						//bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(bodega_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(bodega_constante1.BIG_ID_ACTUAL,"bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);
						//bodega_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			bodega_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("bodega","inventario","",bodega_funcion1,bodega_webcontrol1,bodega_constante1);	
	}
}

var bodega_webcontrol1 = new bodega_webcontrol();

//Para ser llamado desde otro archivo (import)
export {bodega_webcontrol,bodega_webcontrol1};

//Para ser llamado desde window.opener
window.bodega_webcontrol1 = bodega_webcontrol1;


if(bodega_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = bodega_webcontrol1.onLoadWindow; 
}

//</script>