//<script type="text/javascript" language="javascript">



//var parametro_general_usuarioJQueryPaginaWebInteraccion= function (parametro_general_usuario_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_general_usuario_constante,parametro_general_usuario_constante1} from '../util/parametro_general_usuario_constante.js';

import {parametro_general_usuario_funcion,parametro_general_usuario_funcion1} from '../util/parametro_general_usuario_form_funcion.js';


class parametro_general_usuario_webcontrol extends GeneralEntityWebControl {
	
	parametro_general_usuario_control=null;
	parametro_general_usuario_controlInicial=null;
	parametro_general_usuario_controlAuxiliar=null;
		
	//if(parametro_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_general_usuario_control) {
		super();
		
		this.parametro_general_usuario_control=parametro_general_usuario_control;
	}
		
	actualizarVariablesPagina(parametro_general_usuario_control) {
		
		if(parametro_general_usuario_control.action=="index" || parametro_general_usuario_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_general_usuario_control);
			
		} 
		
		
		
	
		else if(parametro_general_usuario_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_general_usuario_control);	
		
		} else if(parametro_general_usuario_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_usuario_control);		
		}
	
	
		
		
		else if(parametro_general_usuario_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_general_usuario_control);
		
		} else if(parametro_general_usuario_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_general_usuario_control);
		
		} else if(parametro_general_usuario_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_general_usuario_control);
		
		} else if(parametro_general_usuario_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_usuario_control);
		
		} else if(parametro_general_usuario_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_usuario_control);
		
		} else if(parametro_general_usuario_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_general_usuario_control);		
		
		} else if(parametro_general_usuario_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_usuario_control);		
		
		} 
		//else if(parametro_general_usuario_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_general_usuario_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_general_usuario_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_general_usuario_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_general_usuario_control) {
		this.actualizarPaginaAccionesGenerales(parametro_general_usuario_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_general_usuario_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_usuario_control);
		this.actualizarPaginaOrderBy(parametro_general_usuario_control);
		this.actualizarPaginaTablaDatos(parametro_general_usuario_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_usuario_control);
		//this.actualizarPaginaFormulario(parametro_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_usuario_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_usuario_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_general_usuario_control) {
		//this.actualizarPaginaFormulario(parametro_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_usuario_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaFormulario(parametro_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaFormulario(parametro_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_general_usuario_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaFormulario(parametro_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_usuario_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_general_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_usuario_control);
		this.actualizarPaginaFormulario(parametro_general_usuario_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_usuario_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_general_usuario_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_general_usuario_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_general_usuario_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_usuario_control);
		this.actualizarPaginaFormulario(parametro_general_usuario_control);
		this.onLoadCombosDefectoFK(parametro_general_usuario_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_usuario_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_general_usuario_control) {
		//FORMULARIO
		if(parametro_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_general_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);		
		
		//COMBOS FK
		if(parametro_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_usuario_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_general_usuario_control) {
		//FORMULARIO
		if(parametro_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_usuario_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_general_usuario_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);	
		
		//COMBOS FK
		if(parametro_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_usuario_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_general_usuario_control) {
		//FORMULARIO
		if(parametro_general_usuario_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_general_usuario_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control);	
		//COMBOS FK
		if(parametro_general_usuario_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_general_usuario_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_general_usuario_control) {
		
		if(parametro_general_usuario_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_general_usuario_control);
		}
		
		if(parametro_general_usuario_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_general_usuario_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_general_usuario_control) {
		if(parametro_general_usuario_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_general_usuarioReturnGeneral",JSON.stringify(parametro_general_usuario_control.parametro_general_usuarioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_general_usuario_control) {
		if(parametro_general_usuario_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_usuario_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_general_usuario_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_general_usuario_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_general_usuario_control, mostrar) {
		
		if(mostrar==true) {
			parametro_general_usuario_funcion1.resaltarRestaurarDivsPagina(false,"parametro_general_usuario");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_general_usuario_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_general_usuario");
			}			
			
			parametro_general_usuario_funcion1.mostrarDivMensaje(true,parametro_general_usuario_control.strAuxiliarMensaje,parametro_general_usuario_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_general_usuario_funcion1.mostrarDivMensaje(false,parametro_general_usuario_control.strAuxiliarMensaje,parametro_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_general_usuario_control) {
		if(parametro_general_usuario_funcion1.esPaginaForm(parametro_general_usuario_constante1)==true) {
			window.opener.parametro_general_usuario_webcontrol1.actualizarPaginaTablaDatos(parametro_general_usuario_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_general_usuario_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_general_usuario_control) {
		parametro_general_usuario_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_general_usuario_control.strAuxiliarUrlPagina);
				
		parametro_general_usuario_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_general_usuario_control.strAuxiliarTipo,parametro_general_usuario_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_general_usuario_control) {
		parametro_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_usuario_control.strAuxiliarMensajeAlert,parametro_general_usuario_control.strAuxiliarCssMensaje);
			
		if(parametro_general_usuario_funcion1.esPaginaForm(parametro_general_usuario_constante1)==true) {
			window.opener.parametro_general_usuario_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_usuario_control.strAuxiliarMensajeAlert,parametro_general_usuario_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_general_usuario_control) {
		this.parametro_general_usuario_controlInicial=parametro_general_usuario_control;
			
		if(parametro_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_general_usuario_control.strStyleDivArbol,parametro_general_usuario_control.strStyleDivContent
																,parametro_general_usuario_control.strStyleDivOpcionesBanner,parametro_general_usuario_control.strStyleDivExpandirColapsar
																,parametro_general_usuario_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_general_usuario_control) {
		this.actualizarCssBotonesPagina(parametro_general_usuario_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_general_usuario_control.tiposReportes,parametro_general_usuario_control.tiposReporte
															 	,parametro_general_usuario_control.tiposPaginacion,parametro_general_usuario_control.tiposAcciones
																,parametro_general_usuario_control.tiposColumnasSelect,parametro_general_usuario_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_general_usuario_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_general_usuario_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_general_usuario_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_general_usuario_control) {
	
		var indexPosition=parametro_general_usuario_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_general_usuario_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_general_usuario_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.cargarCombosusuariosFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_fondo",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.cargarCombostipo_fondosFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.cargarCombosempresasFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.cargarCombossucursalsFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.cargarCombosejerciciosFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.cargarCombosperiodosFK(parametro_general_usuario_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_general_usuario_control.strRecargarFkTiposNinguno!=null && parametro_general_usuario_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_general_usuario_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id",parametro_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_usuario_webcontrol1.cargarCombosusuariosFK(parametro_general_usuario_control);
				}

				if(parametro_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_fondo",parametro_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_usuario_webcontrol1.cargarCombostipo_fondosFK(parametro_general_usuario_control);
				}

				if(parametro_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_usuario_webcontrol1.cargarCombosempresasFK(parametro_general_usuario_control);
				}

				if(parametro_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",parametro_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_usuario_webcontrol1.cargarCombossucursalsFK(parametro_general_usuario_control);
				}

				if(parametro_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",parametro_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_usuario_webcontrol1.cargarCombosejerciciosFK(parametro_general_usuario_control);
				}

				if(parametro_general_usuario_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",parametro_general_usuario_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_usuario_webcontrol1.cargarCombosperiodosFK(parametro_general_usuario_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(parametro_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_usuario_funcion1,parametro_general_usuario_control.usuariosFK);
	}

	cargarComboEditarTablatipo_fondoFK(parametro_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_usuario_funcion1,parametro_general_usuario_control.tipo_fondosFK);
	}

	cargarComboEditarTablaempresaFK(parametro_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_usuario_funcion1,parametro_general_usuario_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(parametro_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_usuario_funcion1,parametro_general_usuario_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(parametro_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_usuario_funcion1,parametro_general_usuario_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(parametro_general_usuario_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_usuario_funcion1,parametro_general_usuario_control.periodosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_general_usuario_control) {
		jQuery("#tdparametro_general_usuarioNuevo").css("display",parametro_general_usuario_control.strPermisoNuevo);
		jQuery("#trparametro_general_usuarioElementos").css("display",parametro_general_usuario_control.strVisibleTablaElementos);
		jQuery("#trparametro_general_usuarioAcciones").css("display",parametro_general_usuario_control.strVisibleTablaAcciones);
		jQuery("#trparametro_general_usuarioParametrosAcciones").css("display",parametro_general_usuario_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_general_usuario_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_general_usuario_control);
				
		if(parametro_general_usuario_control.parametro_general_usuarioActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_general_usuario_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_general_usuario_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_general_usuario_control) {
	
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id").val(parametro_general_usuario_control.parametro_general_usuarioActual.id);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-version_row").val(parametro_general_usuario_control.parametro_general_usuarioActual.versionRow);
		
		if(parametro_general_usuario_control.parametro_general_usuarioActual.id_tipo_fondo!=null && parametro_general_usuario_control.parametro_general_usuarioActual.id_tipo_fondo>-1){
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo").val() != parametro_general_usuario_control.parametro_general_usuarioActual.id_tipo_fondo) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo").val(parametro_general_usuario_control.parametro_general_usuarioActual.id_tipo_fondo).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo").select2("val", null);
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_usuario_control.parametro_general_usuarioActual.id_empresa!=null && parametro_general_usuario_control.parametro_general_usuarioActual.id_empresa>-1){
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_general_usuario_control.parametro_general_usuarioActual.id_empresa) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa").val(parametro_general_usuario_control.parametro_general_usuarioActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_usuario_control.parametro_general_usuarioActual.id_sucursal!=null && parametro_general_usuario_control.parametro_general_usuarioActual.id_sucursal>-1){
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal").val() != parametro_general_usuario_control.parametro_general_usuarioActual.id_sucursal) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal").val(parametro_general_usuario_control.parametro_general_usuarioActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_usuario_control.parametro_general_usuarioActual.id_ejercicio!=null && parametro_general_usuario_control.parametro_general_usuarioActual.id_ejercicio>-1){
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio").val() != parametro_general_usuario_control.parametro_general_usuarioActual.id_ejercicio) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio").val(parametro_general_usuario_control.parametro_general_usuarioActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_usuario_control.parametro_general_usuarioActual.id_periodo!=null && parametro_general_usuario_control.parametro_general_usuarioActual.id_periodo>-1){
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo").val() != parametro_general_usuario_control.parametro_general_usuarioActual.id_periodo) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo").val(parametro_general_usuario_control.parametro_general_usuarioActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-path_exportar").val(parametro_general_usuario_control.parametro_general_usuarioActual.path_exportar);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-con_exportar_cabecera").prop('checked',parametro_general_usuario_control.parametro_general_usuarioActual.con_exportar_cabecera);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-con_exportar_campo_version").prop('checked',parametro_general_usuario_control.parametro_general_usuarioActual.con_exportar_campo_version);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-con_botones_tool_bar").prop('checked',parametro_general_usuario_control.parametro_general_usuarioActual.con_botones_tool_bar);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-con_cargar_por_parte").prop('checked',parametro_general_usuario_control.parametro_general_usuarioActual.con_cargar_por_parte);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-con_guardar_relaciones").prop('checked',parametro_general_usuario_control.parametro_general_usuarioActual.con_guardar_relaciones);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-con_mostrar_acciones_campo_general").prop('checked',parametro_general_usuario_control.parametro_general_usuarioActual.con_mostrar_acciones_campo_general);
		jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-con_mensaje_confirmacion").prop('checked',parametro_general_usuario_control.parametro_general_usuarioActual.con_mensaje_confirmacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_general_usuario_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_general_usuario","seguridad","","form_parametro_general_usuario",formulario,"","",paraEventoTabla,idFilaTabla,parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_general_usuario_control) {
		jQuery("#spanstrMensajeid").text(parametro_general_usuario_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_general_usuario_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_tipo_fondo").text(parametro_general_usuario_control.strMensajeid_tipo_fondo);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_general_usuario_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(parametro_general_usuario_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(parametro_general_usuario_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(parametro_general_usuario_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajepath_exportar").text(parametro_general_usuario_control.strMensajepath_exportar);		
		jQuery("#spanstrMensajecon_exportar_cabecera").text(parametro_general_usuario_control.strMensajecon_exportar_cabecera);		
		jQuery("#spanstrMensajecon_exportar_campo_version").text(parametro_general_usuario_control.strMensajecon_exportar_campo_version);		
		jQuery("#spanstrMensajecon_botones_tool_bar").text(parametro_general_usuario_control.strMensajecon_botones_tool_bar);		
		jQuery("#spanstrMensajecon_cargar_por_parte").text(parametro_general_usuario_control.strMensajecon_cargar_por_parte);		
		jQuery("#spanstrMensajecon_guardar_relaciones").text(parametro_general_usuario_control.strMensajecon_guardar_relaciones);		
		jQuery("#spanstrMensajecon_mostrar_acciones_campo_general").text(parametro_general_usuario_control.strMensajecon_mostrar_acciones_campo_general);		
		jQuery("#spanstrMensajecon_mensaje_confirmacion").text(parametro_general_usuario_control.strMensajecon_mensaje_confirmacion);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_general_usuario_control) {
		jQuery("#tdbtnNuevoparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_general_usuario").css("display",parametro_general_usuario_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_general_usuario").css("display",parametro_general_usuario_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_general_usuario").css("display",parametro_general_usuario_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_general_usuario").css("display",parametro_general_usuario_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_general_usuario").css("visibility",parametro_general_usuario_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(parametro_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id",parametro_general_usuario_control.usuariosFK);

		if(parametro_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_usuario_control.idFilaTablaActual+"_0",parametro_general_usuario_control.usuariosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid",parametro_general_usuario_control.usuariosFK);

	};

	cargarCombostipo_fondosFK(parametro_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo",parametro_general_usuario_control.tipo_fondosFK);

		if(parametro_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_usuario_control.idFilaTablaActual+"_2",parametro_general_usuario_control.tipo_fondosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idtipo_fondo-cmbid_tipo_fondo",parametro_general_usuario_control.tipo_fondosFK);

	};

	cargarCombosempresasFK(parametro_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa",parametro_general_usuario_control.empresasFK);

		if(parametro_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_usuario_control.idFilaTablaActual+"_3",parametro_general_usuario_control.empresasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa",parametro_general_usuario_control.empresasFK);

	};

	cargarCombossucursalsFK(parametro_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal",parametro_general_usuario_control.sucursalsFK);

		if(parametro_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_usuario_control.idFilaTablaActual+"_4",parametro_general_usuario_control.sucursalsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal",parametro_general_usuario_control.sucursalsFK);

	};

	cargarCombosejerciciosFK(parametro_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio",parametro_general_usuario_control.ejerciciosFK);

		if(parametro_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_usuario_control.idFilaTablaActual+"_5",parametro_general_usuario_control.ejerciciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio",parametro_general_usuario_control.ejerciciosFK);

	};

	cargarCombosperiodosFK(parametro_general_usuario_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo",parametro_general_usuario_control.periodosFK);

		if(parametro_general_usuario_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_usuario_control.idFilaTablaActual+"_6",parametro_general_usuario_control.periodosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo",parametro_general_usuario_control.periodosFK);

	};

	
	
	registrarComboActionChangeCombosusuariosFK(parametro_general_usuario_control) {

	};

	registrarComboActionChangeCombostipo_fondosFK(parametro_general_usuario_control) {

	};

	registrarComboActionChangeCombosempresasFK(parametro_general_usuario_control) {

	};

	registrarComboActionChangeCombossucursalsFK(parametro_general_usuario_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(parametro_general_usuario_control) {

	};

	registrarComboActionChangeCombosperiodosFK(parametro_general_usuario_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(parametro_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_usuario_control.idusuarioDefaultFK>-1 && jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id").val() != parametro_general_usuario_control.idusuarioDefaultFK) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id").val(parametro_general_usuario_control.idusuarioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(parametro_general_usuario_control.idusuarioDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idusuarioid-cmbid").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_fondosFK(parametro_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_usuario_control.idtipo_fondoDefaultFK>-1 && jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo").val() != parametro_general_usuario_control.idtipo_fondoDefaultFK) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo").val(parametro_general_usuario_control.idtipo_fondoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idtipo_fondo-cmbid_tipo_fondo").val(parametro_general_usuario_control.idtipo_fondoDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idtipo_fondo-cmbid_tipo_fondo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idtipo_fondo-cmbid_tipo_fondo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosempresasFK(parametro_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_usuario_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_general_usuario_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa").val(parametro_general_usuario_control.idempresaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(parametro_general_usuario_control.idempresaDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idempresa-cmbid_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(parametro_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_usuario_control.idsucursalDefaultFK>-1 && jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal").val() != parametro_general_usuario_control.idsucursalDefaultFK) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal").val(parametro_general_usuario_control.idsucursalDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val(parametro_general_usuario_control.idsucursalDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idsucursal-cmbid_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(parametro_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_usuario_control.idejercicioDefaultFK>-1 && jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio").val() != parametro_general_usuario_control.idejercicioDefaultFK) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio").val(parametro_general_usuario_control.idejercicioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(parametro_general_usuario_control.idejercicioDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(parametro_general_usuario_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_usuario_control.idperiodoDefaultFK>-1 && jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo").val() != parametro_general_usuario_control.idperiodoDefaultFK) {
				jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo").val(parametro_general_usuario_control.idperiodoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(parametro_general_usuario_control.idperiodoDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_usuario_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_general_usuario_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.setDefectoValorCombosusuariosFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_fondo",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.setDefectoValorCombostipo_fondosFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.setDefectoValorCombosempresasFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.setDefectoValorCombossucursalsFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.setDefectoValorCombosejerciciosFK(parametro_general_usuario_control);
			}

			if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",parametro_general_usuario_control.strRecargarFkTipos,",")) { 
				parametro_general_usuario_webcontrol1.setDefectoValorCombosperiodosFK(parametro_general_usuario_control);
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
	onLoadCombosEventosFK(parametro_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id",parametro_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_usuario_webcontrol1.registrarComboActionChangeCombosusuariosFK(parametro_general_usuario_control);
			//}

			//if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_fondo",parametro_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_usuario_webcontrol1.registrarComboActionChangeCombostipo_fondosFK(parametro_general_usuario_control);
			//}

			//if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_usuario_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_general_usuario_control);
			//}

			//if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",parametro_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_usuario_webcontrol1.registrarComboActionChangeCombossucursalsFK(parametro_general_usuario_control);
			//}

			//if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",parametro_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_usuario_webcontrol1.registrarComboActionChangeCombosejerciciosFK(parametro_general_usuario_control);
			//}

			//if(parametro_general_usuario_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",parametro_general_usuario_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_usuario_webcontrol1.registrarComboActionChangeCombosperiodosFK(parametro_general_usuario_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_general_usuario_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_usuario_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_general_usuario_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_usuario_funcion1.validarFormularioJQuery(parametro_general_usuario_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_general_usuario");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_general_usuario");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_general_usuario_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,"parametro_general_usuario");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_img_busqueda").click(function(){
				parametro_general_usuario_webcontrol1.abrirBusquedaParausuario("id");
				//alert(jQuery('#form-id_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_fondo","id_tipo_fondo","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_tipo_fondo_img_busqueda").click(function(){
				parametro_general_usuario_webcontrol1.abrirBusquedaParatipo_fondo("id_tipo_fondo");
				//alert(jQuery('#form-id_tipo_fondo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_general_usuario_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				parametro_general_usuario_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				parametro_general_usuario_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_usuario_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				parametro_general_usuario_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_general_usuario_control) {
		
		
		
		if(parametro_general_usuario_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_general_usuarioActualizarToolBar").css("display",parametro_general_usuario_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_general_usuarioEliminarToolBar").css("display",parametro_general_usuario_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_general_usuarioElementos").css("display",parametro_general_usuario_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_general_usuarioAcciones").css("display",parametro_general_usuario_control.strVisibleTablaAcciones);
		jQuery("#trparametro_general_usuarioParametrosAcciones").css("display",parametro_general_usuario_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_general_usuarioCerrarPagina").css("display",parametro_general_usuario_control.strPermisoPopup);		
		jQuery("#tdparametro_general_usuarioCerrarPaginaToolBar").css("display",parametro_general_usuario_control.strPermisoPopup);
		//jQuery("#trparametro_general_usuarioAccionesRelaciones").css("display",parametro_general_usuario_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_general_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_general_usuario_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Generales";
		sTituloBanner+=" - " + parametro_general_usuario_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_usuario_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_general_usuarioRelacionesToolBar").css("display",parametro_general_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_general_usuario").css("display",parametro_general_usuario_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_general_usuario_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_general_usuario_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_general_usuario_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_general_usuario_webcontrol1.registrarEventosControles();
		
		if(parametro_general_usuario_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
			parametro_general_usuario_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_general_usuario_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_usuario_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_general_usuario_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_general_usuario_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_general_usuario_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_general_usuario_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
						//parametro_general_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_general_usuario_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_general_usuario_constante1.BIG_ID_ACTUAL,"parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);
						//parametro_general_usuario_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_general_usuario_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_general_usuario","seguridad","",parametro_general_usuario_funcion1,parametro_general_usuario_webcontrol1,parametro_general_usuario_constante1);	
	}
}

var parametro_general_usuario_webcontrol1 = new parametro_general_usuario_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_general_usuario_webcontrol,parametro_general_usuario_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_general_usuario_webcontrol1 = parametro_general_usuario_webcontrol1;


if(parametro_general_usuario_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_general_usuario_webcontrol1.onLoadWindow; 
}

//</script>