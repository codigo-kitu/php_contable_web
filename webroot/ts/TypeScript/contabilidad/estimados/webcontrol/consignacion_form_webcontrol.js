//<script type="text/javascript" language="javascript">



//var consignacionJQueryPaginaWebInteraccion= function (consignacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {consignacion_constante,consignacion_constante1} from '../util/consignacion_constante.js';

import {consignacion_funcion,consignacion_funcion1} from '../util/consignacion_form_funcion.js';


class consignacion_webcontrol extends GeneralEntityWebControl {
	
	consignacion_control=null;
	consignacion_controlInicial=null;
	consignacion_controlAuxiliar=null;
		
	//if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(consignacion_control) {
		super();
		
		this.consignacion_control=consignacion_control;
	}
		
	actualizarVariablesPagina(consignacion_control) {
		
		if(consignacion_control.action=="index" || consignacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(consignacion_control);
			
		} 
		
		
		
	
		else if(consignacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(consignacion_control);	
		
		} else if(consignacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_control);		
		}
	
		else if(consignacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(consignacion_control);		
		}
	
		else if(consignacion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(consignacion_control);
		}
		
		
		else if(consignacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(consignacion_control);
		
		} else if(consignacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(consignacion_control);
		
		} else if(consignacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(consignacion_control);
		
		} else if(consignacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(consignacion_control);		
		
		} else if(consignacion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(consignacion_control);		
		
		} 
		//else if(consignacion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(consignacion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + consignacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(consignacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(consignacion_control) {
		this.actualizarPaginaAccionesGenerales(consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_control);
		this.actualizarPaginaOrderBy(consignacion_control);
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_control);
		this.actualizarPaginaAreaBusquedas(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(consignacion_control) {
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(consignacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(consignacion_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(consignacion_control);		
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(consignacion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);
		this.onLoadCombosDefectoFK(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(consignacion_control) {
		//FORMULARIO
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(consignacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		
		//COMBOS FK
		if(consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(consignacion_control) {
		//FORMULARIO
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(consignacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);	
		
		//COMBOS FK
		if(consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(consignacion_control) {
		//FORMULARIO
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(consignacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);	
		//COMBOS FK
		if(consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(consignacion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(consignacion_control) {
		
		if(consignacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(consignacion_control);
		}
		
		if(consignacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(consignacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(consignacion_control) {
		if(consignacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("consignacionReturnGeneral",JSON.stringify(consignacion_control.consignacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(consignacion_control) {
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && consignacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(consignacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(consignacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(consignacion_control, mostrar) {
		
		if(mostrar==true) {
			consignacion_funcion1.resaltarRestaurarDivsPagina(false,"consignacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				consignacion_funcion1.resaltarRestaurarDivMantenimiento(false,"consignacion");
			}			
			
			consignacion_funcion1.mostrarDivMensaje(true,consignacion_control.strAuxiliarMensaje,consignacion_control.strAuxiliarCssMensaje);
		
		} else {
			consignacion_funcion1.mostrarDivMensaje(false,consignacion_control.strAuxiliarMensaje,consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(consignacion_control) {
		if(consignacion_funcion1.esPaginaForm(consignacion_constante1)==true) {
			window.opener.consignacion_webcontrol1.actualizarPaginaTablaDatos(consignacion_control);
		} else {
			this.actualizarPaginaTablaDatos(consignacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(consignacion_control) {
		consignacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(consignacion_control.strAuxiliarUrlPagina);
				
		consignacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(consignacion_control.strAuxiliarTipo,consignacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(consignacion_control) {
		consignacion_funcion1.resaltarRestaurarDivMensaje(true,consignacion_control.strAuxiliarMensajeAlert,consignacion_control.strAuxiliarCssMensaje);
			
		if(consignacion_funcion1.esPaginaForm(consignacion_constante1)==true) {
			window.opener.consignacion_funcion1.resaltarRestaurarDivMensaje(true,consignacion_control.strAuxiliarMensajeAlert,consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(consignacion_control) {
		this.consignacion_controlInicial=consignacion_control;
			
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(consignacion_control.strStyleDivArbol,consignacion_control.strStyleDivContent
																,consignacion_control.strStyleDivOpcionesBanner,consignacion_control.strStyleDivExpandirColapsar
																,consignacion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(consignacion_control) {
		this.actualizarCssBotonesPagina(consignacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(consignacion_control.tiposReportes,consignacion_control.tiposReporte
															 	,consignacion_control.tiposPaginacion,consignacion_control.tiposAcciones
																,consignacion_control.tiposColumnasSelect,consignacion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(consignacion_control.tiposRelaciones,consignacion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(consignacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(consignacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(consignacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(consignacion_control) {
	
		var indexPosition=consignacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=consignacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(consignacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosempresasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombossucursalsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosejerciciosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosperiodosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosusuariosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosclientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosvendedorsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombostermino_pago_clientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosmonedasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosestadosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarComboskardexsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosasientosFK(consignacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(consignacion_control.strRecargarFkTiposNinguno!=null && consignacion_control.strRecargarFkTiposNinguno!='NINGUNO' && consignacion_control.strRecargarFkTiposNinguno!='') {
			
				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosempresasFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombossucursalsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosejerciciosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosperiodosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosusuariosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosclientesFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosvendedorsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombostermino_pago_clientesFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosmonedasFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosestadosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarComboskardexsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosasientosFK(consignacion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+consignacion_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.consignacionActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.consignacionActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.consignacionActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablamonedaFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.estadosFK);
	}

	cargarComboEditarTablakardexFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.kardexsFK);
	}

	cargarComboEditarTablaasientoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.asientosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(consignacion_control) {
		jQuery("#tdconsignacionNuevo").css("display",consignacion_control.strPermisoNuevo);
		jQuery("#trconsignacionElementos").css("display",consignacion_control.strVisibleTablaElementos);
		jQuery("#trconsignacionAcciones").css("display",consignacion_control.strVisibleTablaAcciones);
		jQuery("#trconsignacionParametrosAcciones").css("display",consignacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(consignacion_control) {
	
		this.actualizarCssBotonesMantenimiento(consignacion_control);
				
		if(consignacion_control.consignacionActual!=null) {//form
			
			this.actualizarCamposFormulario(consignacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(consignacion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(consignacion_control) {
	
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id").val(consignacion_control.consignacionActual.id);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-version_row").val(consignacion_control.consignacionActual.versionRow);
		
		if(consignacion_control.consignacionActual.id_empresa!=null && consignacion_control.consignacionActual.id_empresa>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val() != consignacion_control.consignacionActual.id_empresa) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val(consignacion_control.consignacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_sucursal!=null && consignacion_control.consignacionActual.id_sucursal>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val() != consignacion_control.consignacionActual.id_sucursal) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val(consignacion_control.consignacionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_ejercicio!=null && consignacion_control.consignacionActual.id_ejercicio>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != consignacion_control.consignacionActual.id_ejercicio) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val(consignacion_control.consignacionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_periodo!=null && consignacion_control.consignacionActual.id_periodo>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val() != consignacion_control.consignacionActual.id_periodo) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val(consignacion_control.consignacionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_usuario!=null && consignacion_control.consignacionActual.id_usuario>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val() != consignacion_control.consignacionActual.id_usuario) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val(consignacion_control.consignacionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-numero").val(consignacion_control.consignacionActual.numero);
		
		if(consignacion_control.consignacionActual.id_cliente!=null && consignacion_control.consignacionActual.id_cliente>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val() != consignacion_control.consignacionActual.id_cliente) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val(consignacion_control.consignacionActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-ruc").val(consignacion_control.consignacionActual.ruc);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-referencia_cliente").val(consignacion_control.consignacionActual.referencia_cliente);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-fecha_emision").val(consignacion_control.consignacionActual.fecha_emision);
		
		if(consignacion_control.consignacionActual.id_vendedor!=null && consignacion_control.consignacionActual.id_vendedor>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val() != consignacion_control.consignacionActual.id_vendedor) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val(consignacion_control.consignacionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_termino_pago_cliente!=null && consignacion_control.consignacionActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != consignacion_control.consignacionActual.id_termino_pago_cliente) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(consignacion_control.consignacionActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-fecha_vence").val(consignacion_control.consignacionActual.fecha_vence);
		
		if(consignacion_control.consignacionActual.id_moneda!=null && consignacion_control.consignacionActual.id_moneda>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val() != consignacion_control.consignacionActual.id_moneda) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val(consignacion_control.consignacionActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-cotizacion").val(consignacion_control.consignacionActual.cotizacion);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-direccion").val(consignacion_control.consignacionActual.direccion);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-enviar_a").val(consignacion_control.consignacionActual.enviar_a);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-observacion").val(consignacion_control.consignacionActual.observacion);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-impuesto_en_precio").prop('checked',consignacion_control.consignacionActual.impuesto_en_precio);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-genero_factura").prop('checked',consignacion_control.consignacionActual.genero_factura);
		
		if(consignacion_control.consignacionActual.id_estado!=null && consignacion_control.consignacionActual.id_estado>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val() != consignacion_control.consignacionActual.id_estado) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val(consignacion_control.consignacionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-sub_total").val(consignacion_control.consignacionActual.sub_total);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-descuento_monto").val(consignacion_control.consignacionActual.descuento_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-descuento_porciento").val(consignacion_control.consignacionActual.descuento_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-iva_monto").val(consignacion_control.consignacionActual.iva_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-iva_porciento").val(consignacion_control.consignacionActual.iva_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(consignacion_control.consignacionActual.retencion_fuente_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(consignacion_control.consignacionActual.retencion_fuente_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_iva_monto").val(consignacion_control.consignacionActual.retencion_iva_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(consignacion_control.consignacionActual.retencion_iva_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-total").val(consignacion_control.consignacionActual.total);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-otro_monto").val(consignacion_control.consignacionActual.otro_monto);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-otro_porciento").val(consignacion_control.consignacionActual.otro_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(consignacion_control.consignacionActual.retencion_ica_porciento);
		jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-retencion_ica_monto").val(consignacion_control.consignacionActual.retencion_ica_monto);
		
		if(consignacion_control.consignacionActual.id_kardex!=null && consignacion_control.consignacionActual.id_kardex>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val() != consignacion_control.consignacionActual.id_kardex) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val(consignacion_control.consignacionActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_asiento!=null && consignacion_control.consignacionActual.id_asiento>-1){
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val() != consignacion_control.consignacionActual.id_asiento) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val(consignacion_control.consignacionActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+consignacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("consignacion","estimados","","form_consignacion",formulario,"","",paraEventoTabla,idFilaTabla,consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	actualizarSpanMensajesCampos(consignacion_control) {
		jQuery("#spanstrMensajeid").text(consignacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(consignacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(consignacion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(consignacion_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(consignacion_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(consignacion_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(consignacion_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(consignacion_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_cliente").text(consignacion_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeruc").text(consignacion_control.strMensajeruc);		
		jQuery("#spanstrMensajereferencia_cliente").text(consignacion_control.strMensajereferencia_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(consignacion_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(consignacion_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(consignacion_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajefecha_vence").text(consignacion_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeid_moneda").text(consignacion_control.strMensajeid_moneda);		
		jQuery("#spanstrMensajecotizacion").text(consignacion_control.strMensajecotizacion);		
		jQuery("#spanstrMensajedireccion").text(consignacion_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(consignacion_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(consignacion_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(consignacion_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajegenero_factura").text(consignacion_control.strMensajegenero_factura);		
		jQuery("#spanstrMensajeid_estado").text(consignacion_control.strMensajeid_estado);		
		jQuery("#spanstrMensajesub_total").text(consignacion_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(consignacion_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(consignacion_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(consignacion_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(consignacion_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(consignacion_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(consignacion_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(consignacion_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(consignacion_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(consignacion_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(consignacion_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(consignacion_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(consignacion_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(consignacion_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajeid_kardex").text(consignacion_control.strMensajeid_kardex);		
		jQuery("#spanstrMensajeid_asiento").text(consignacion_control.strMensajeid_asiento);		
	}
	
	actualizarCssBotonesMantenimiento(consignacion_control) {
		jQuery("#tdbtnNuevoconsignacion").css("visibility",consignacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoconsignacion").css("display",consignacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarconsignacion").css("visibility",consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarconsignacion").css("display",consignacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarconsignacion").css("visibility",consignacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarconsignacion").css("display",consignacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarconsignacion").css("visibility",consignacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosconsignacion").css("visibility",consignacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosconsignacion").css("display",consignacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarconsignacion").css("visibility",consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarconsignacion").css("visibility",consignacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarconsignacion").css("visibility",consignacion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa",consignacion_control.empresasFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_2",consignacion_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal",consignacion_control.sucursalsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_3",consignacion_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio",consignacion_control.ejerciciosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_4",consignacion_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo",consignacion_control.periodosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_5",consignacion_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario",consignacion_control.usuariosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_6",consignacion_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente",consignacion_control.clientesFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_8",consignacion_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",consignacion_control.clientesFK);

	};

	cargarCombosvendedorsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor",consignacion_control.vendedorsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_12",consignacion_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",consignacion_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente",consignacion_control.termino_pago_clientesFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_13",consignacion_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",consignacion_control.termino_pago_clientesFK);

	};

	cargarCombosmonedasFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda",consignacion_control.monedasFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_15",consignacion_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",consignacion_control.monedasFK);

	};

	cargarCombosestadosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado",consignacion_control.estadosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_22",consignacion_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",consignacion_control.estadosFK);

	};

	cargarComboskardexsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex",consignacion_control.kardexsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_37",consignacion_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",consignacion_control.kardexsFK);

	};

	cargarCombosasientosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento",consignacion_control.asientosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_38",consignacion_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",consignacion_control.asientosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(consignacion_control) {

	};

	registrarComboActionChangeCombossucursalsFK(consignacion_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosperiodosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosusuariosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosclientesFK(consignacion_control) {
		this.registrarComboActionChangeid_cliente("form"+consignacion_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(consignacion_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(consignacion_control) {

	};

	registrarComboActionChangeCombosmonedasFK(consignacion_control) {

	};

	registrarComboActionChangeCombosestadosFK(consignacion_control) {

	};

	registrarComboActionChangeComboskardexsFK(consignacion_control) {

	};

	registrarComboActionChangeCombosasientosFK(consignacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idempresaDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val() != consignacion_control.idempresaDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val(consignacion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idsucursalDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val() != consignacion_control.idsucursalDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val(consignacion_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idejercicioDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != consignacion_control.idejercicioDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val(consignacion_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idperiodoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val() != consignacion_control.idperiodoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val(consignacion_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idusuarioDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val() != consignacion_control.idusuarioDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val(consignacion_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idclienteDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val() != consignacion_control.idclienteDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val(consignacion_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(consignacion_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idvendedorDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val() != consignacion_control.idvendedorDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val(consignacion_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(consignacion_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != consignacion_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(consignacion_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(consignacion_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idmonedaDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val() != consignacion_control.idmonedaDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val(consignacion_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(consignacion_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idestadoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val() != consignacion_control.idestadoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val(consignacion_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(consignacion_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idkardexDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val() != consignacion_control.idkardexDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val(consignacion_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(consignacion_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idasientoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val() != consignacion_control.idasientoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val(consignacion_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(consignacion_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("consignacion","estimados","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);



	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
							imagen_consignacion_webcontrol1.onLoadWindow();
							consignacion_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
		imagen_consignacion_webcontrol1.onLoadRecargarRelacionado();
		consignacion_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//consignacion_control
		
	
	}
	
	onLoadCombosDefectoFK(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosempresasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombossucursalsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosejerciciosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosperiodosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosusuariosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosclientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosvendedorsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosmonedasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosestadosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorComboskardexsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosasientosFK(consignacion_control);
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
	onLoadCombosEventosFK(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosempresasFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombossucursalsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosejerciciosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosperiodosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosusuariosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosclientesFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosvendedorsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosmonedasFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosestadosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeComboskardexsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosasientosFK(consignacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				consignacion_funcion1.validarFormularioJQuery(consignacion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("consignacion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("consignacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(consignacion_funcion1,consignacion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(consignacion_funcion1,consignacion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(consignacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,"consignacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("consignacion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(consignacion_control) {
		
		
		
		if(consignacion_control.strPermisoActualizar!=null) {
			jQuery("#tdconsignacionActualizarToolBar").css("display",consignacion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdconsignacionEliminarToolBar").css("display",consignacion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trconsignacionElementos").css("display",consignacion_control.strVisibleTablaElementos);
		
		jQuery("#trconsignacionAcciones").css("display",consignacion_control.strVisibleTablaAcciones);
		jQuery("#trconsignacionParametrosAcciones").css("display",consignacion_control.strVisibleTablaAcciones);
		
		jQuery("#tdconsignacionCerrarPagina").css("display",consignacion_control.strPermisoPopup);		
		jQuery("#tdconsignacionCerrarPaginaToolBar").css("display",consignacion_control.strPermisoPopup);
		//jQuery("#trconsignacionAccionesRelaciones").css("display",consignacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=consignacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + consignacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Consignaciones";
		sTituloBanner+=" - " + consignacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdconsignacionRelacionesToolBar").css("display",consignacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosconsignacion").css("display",consignacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		consignacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		consignacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		consignacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		consignacion_webcontrol1.registrarEventosControles();
		
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			consignacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(consignacion_constante1.STR_ES_RELACIONES=="true") {
			if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				consignacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(consignacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(consignacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
						//consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(consignacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(consignacion_constante1.BIG_ID_ACTUAL,"consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
						//consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			consignacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);	
	}
}

var consignacion_webcontrol1 = new consignacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {consignacion_webcontrol,consignacion_webcontrol1};

//Para ser llamado desde window.opener
window.consignacion_webcontrol1 = consignacion_webcontrol1;


if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = consignacion_webcontrol1.onLoadWindow; 
}

//</script>