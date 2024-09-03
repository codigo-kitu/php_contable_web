//<script type="text/javascript" language="javascript">



//var facturaJQueryPaginaWebInteraccion= function (factura_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {factura_constante,factura_constante1} from '../util/factura_constante.js';

import {factura_funcion,factura_funcion1} from '../util/factura_form_funcion.js';


class factura_webcontrol extends GeneralEntityWebControl {
	
	factura_control=null;
	factura_controlInicial=null;
	factura_controlAuxiliar=null;
		
	//if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_control) {
		super();
		
		this.factura_control=factura_control;
	}
		
	actualizarVariablesPagina(factura_control) {
		
		if(factura_control.action=="index" || factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_control);
			
		} 
		
		
		
	
		else if(factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_control);	
		
		} else if(factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_control);		
		}
	
		else if(factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_control);		
		}
	
		else if(factura_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_control);
		}
		
		
		else if(factura_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_control);
		
		} else if(factura_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_control);
		
		} else if(factura_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_control);
		
		} else if(factura_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_control);
		
		} else if(factura_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_control);
		
		} else if(factura_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_control);		
		
		} else if(factura_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_control);		
		
		} 
		//else if(factura_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + factura_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(factura_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(factura_control) {
		this.actualizarPaginaAccionesGenerales(factura_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(factura_control) {
		
		this.actualizarPaginaCargaGeneral(factura_control);
		this.actualizarPaginaOrderBy(factura_control);
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaCargaGeneralControles(factura_control);
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_control);
		this.actualizarPaginaAreaBusquedas(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_control) {
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_control);		
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_control) {
		this.actualizarPaginaCargaGeneralControles(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);
		this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(factura_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_control) {
		this.actualizarPaginaCargaGeneralControles(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);
		this.actualizarPaginaFormulario(factura_control);
		this.onLoadCombosDefectoFK(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_control) {
		//FORMULARIO
		if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		
		//COMBOS FK
		if(factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_control) {
		//FORMULARIO
		if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);	
		
		//COMBOS FK
		if(factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(factura_control) {
		//FORMULARIO
		if(factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);	
		//COMBOS FK
		if(factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(factura_control) {
		
		if(factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_control);
		}
		
		if(factura_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(factura_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(factura_control) {
		if(factura_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("facturaReturnGeneral",JSON.stringify(factura_control.facturaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(factura_control) {
		if(factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(factura_control, mostrar) {
		
		if(mostrar==true) {
			factura_funcion1.resaltarRestaurarDivsPagina(false,"factura");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_funcion1.resaltarRestaurarDivMantenimiento(false,"factura");
			}			
			
			factura_funcion1.mostrarDivMensaje(true,factura_control.strAuxiliarMensaje,factura_control.strAuxiliarCssMensaje);
		
		} else {
			factura_funcion1.mostrarDivMensaje(false,factura_control.strAuxiliarMensaje,factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_control) {
		if(factura_funcion1.esPaginaForm(factura_constante1)==true) {
			window.opener.factura_webcontrol1.actualizarPaginaTablaDatos(factura_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_control) {
		factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_control.strAuxiliarUrlPagina);
				
		factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_control.strAuxiliarTipo,factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_control) {
		factura_funcion1.resaltarRestaurarDivMensaje(true,factura_control.strAuxiliarMensajeAlert,factura_control.strAuxiliarCssMensaje);
			
		if(factura_funcion1.esPaginaForm(factura_constante1)==true) {
			window.opener.factura_funcion1.resaltarRestaurarDivMensaje(true,factura_control.strAuxiliarMensajeAlert,factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(factura_control) {
		this.factura_controlInicial=factura_control;
			
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_control.strStyleDivArbol,factura_control.strStyleDivContent
																,factura_control.strStyleDivOpcionesBanner,factura_control.strStyleDivExpandirColapsar
																,factura_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(factura_control) {
		this.actualizarCssBotonesPagina(factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_control.tiposReportes,factura_control.tiposReporte
															 	,factura_control.tiposPaginacion,factura_control.tiposAcciones
																,factura_control.tiposColumnasSelect,factura_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(factura_control.tiposRelaciones,factura_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_control);			
	}
	
	actualizarPaginaUsuarioInvitado(factura_control) {
	
		var indexPosition=factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosempresasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombossucursalsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosejerciciosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosperiodosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosusuariosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosclientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosmonedasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosvendedorsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombostermino_pago_clientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosestadosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosasientosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarComboskardexsFK(factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_control.strRecargarFkTiposNinguno!=null && factura_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosempresasFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombossucursalsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosejerciciosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosperiodosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosusuariosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosclientesFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosmonedasFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosvendedorsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombostermino_pago_clientesFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosestadosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosasientosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarComboskardexsFK(factura_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.facturaActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.facturaActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.facturaActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.clientesFK);
	}

	cargarComboEditarTablamonedaFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.monedasFK);
	}

	cargarComboEditarTablavendedorFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_cobrarFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.documento_cuenta_cobrarsFK);
	}

	cargarComboEditarTablakardexFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(factura_control) {
		jQuery("#tdfacturaNuevo").css("display",factura_control.strPermisoNuevo);
		jQuery("#trfacturaElementos").css("display",factura_control.strVisibleTablaElementos);
		jQuery("#trfacturaAcciones").css("display",factura_control.strVisibleTablaAcciones);
		jQuery("#trfacturaParametrosAcciones").css("display",factura_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_control);
				
		if(factura_control.facturaActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_control) {
	
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-id").val(factura_control.facturaActual.id);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-created_at").val(factura_control.facturaActual.versionRow);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-updated_at").val(factura_control.facturaActual.versionRow);
		
		if(factura_control.facturaActual.id_empresa!=null && factura_control.facturaActual.id_empresa>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val() != factura_control.facturaActual.id_empresa) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val(factura_control.facturaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_sucursal!=null && factura_control.facturaActual.id_sucursal>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_control.facturaActual.id_sucursal) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val(factura_control.facturaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_ejercicio!=null && factura_control.facturaActual.id_ejercicio>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_control.facturaActual.id_ejercicio) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_control.facturaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_periodo!=null && factura_control.facturaActual.id_periodo>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val() != factura_control.facturaActual.id_periodo) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val(factura_control.facturaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_usuario!=null && factura_control.facturaActual.id_usuario>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val() != factura_control.facturaActual.id_usuario) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val(factura_control.facturaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-numero").val(factura_control.facturaActual.numero);
		
		if(factura_control.facturaActual.id_cliente!=null && factura_control.facturaActual.id_cliente>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val() != factura_control.facturaActual.id_cliente) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val(factura_control.facturaActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-ruc").val(factura_control.facturaActual.ruc);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-referencia_cliente").val(factura_control.facturaActual.referencia_cliente);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-fecha_emision").val(factura_control.facturaActual.fecha_emision);
		
		if(factura_control.facturaActual.id_moneda!=null && factura_control.facturaActual.id_moneda>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val() != factura_control.facturaActual.id_moneda) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val(factura_control.facturaActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_vendedor!=null && factura_control.facturaActual.id_vendedor>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_control.facturaActual.id_vendedor) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val(factura_control.facturaActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_termino_pago_cliente!=null && factura_control.facturaActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != factura_control.facturaActual.id_termino_pago_cliente) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(factura_control.facturaActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-fecha_vence").val(factura_control.facturaActual.fecha_vence);
		
		if(factura_control.facturaActual.id_estado!=null && factura_control.facturaActual.id_estado>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val() != factura_control.facturaActual.id_estado) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val(factura_control.facturaActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-direccion").val(factura_control.facturaActual.direccion);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-enviar_a").val(factura_control.facturaActual.enviar_a);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-observacion").val(factura_control.facturaActual.observacion);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-impuesto_en_precio").prop('checked',factura_control.facturaActual.impuesto_en_precio);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-sub_total").val(factura_control.facturaActual.sub_total);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-descuento_monto").val(factura_control.facturaActual.descuento_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-descuento_porciento").val(factura_control.facturaActual.descuento_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-iva_monto").val(factura_control.facturaActual.iva_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-iva_porciento").val(factura_control.facturaActual.iva_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(factura_control.facturaActual.retencion_fuente_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(factura_control.facturaActual.retencion_fuente_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_iva_monto").val(factura_control.facturaActual.retencion_iva_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(factura_control.facturaActual.retencion_iva_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-total").val(factura_control.facturaActual.total);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-hora").val(factura_control.facturaActual.hora);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-cotizacion").val(factura_control.facturaActual.cotizacion);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-otro_monto").val(factura_control.facturaActual.otro_monto);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-otro_porciento").val(factura_control.facturaActual.otro_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(factura_control.facturaActual.retencion_ica_porciento);
		jQuery("#form"+factura_constante1.STR_SUFIJO+"-retencion_ica_monto").val(factura_control.facturaActual.retencion_ica_monto);
		
		if(factura_control.facturaActual.id_asiento!=null && factura_control.facturaActual.id_asiento>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val() != factura_control.facturaActual.id_asiento) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val(factura_control.facturaActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_documento_cuenta_cobrar!=null && factura_control.facturaActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_control.facturaActual.id_documento_cuenta_cobrar) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_control.facturaActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_kardex!=null && factura_control.facturaActual.id_kardex>-1){
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val() != factura_control.facturaActual.id_kardex) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val(factura_control.facturaActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura","facturacion","","form_factura",formulario,"","",paraEventoTabla,idFilaTabla,factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	actualizarSpanMensajesCampos(factura_control) {
		jQuery("#spanstrMensajeid").text(factura_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(factura_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(factura_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(factura_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(factura_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(factura_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(factura_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(factura_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(factura_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_cliente").text(factura_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeruc").text(factura_control.strMensajeruc);		
		jQuery("#spanstrMensajereferencia_cliente").text(factura_control.strMensajereferencia_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(factura_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_moneda").text(factura_control.strMensajeid_moneda);		
		jQuery("#spanstrMensajeid_vendedor").text(factura_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(factura_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajefecha_vence").text(factura_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeid_estado").text(factura_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedireccion").text(factura_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(factura_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(factura_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(factura_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajesub_total").text(factura_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(factura_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(factura_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(factura_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(factura_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(factura_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(factura_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(factura_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(factura_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(factura_control.strMensajetotal);		
		jQuery("#spanstrMensajehora").text(factura_control.strMensajehora);		
		jQuery("#spanstrMensajecotizacion").text(factura_control.strMensajecotizacion);		
		jQuery("#spanstrMensajeotro_monto").text(factura_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(factura_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(factura_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(factura_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajeid_asiento").text(factura_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_documento_cuenta_cobrar").text(factura_control.strMensajeid_documento_cuenta_cobrar);		
		jQuery("#spanstrMensajeid_kardex").text(factura_control.strMensajeid_kardex);		
	}
	
	actualizarCssBotonesMantenimiento(factura_control) {
		jQuery("#tdbtnNuevofactura").css("visibility",factura_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura").css("display",factura_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura").css("visibility",factura_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura").css("display",factura_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura").css("visibility",factura_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura").css("display",factura_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura").css("visibility",factura_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura").css("visibility",factura_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura").css("display",factura_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura").css("visibility",factura_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura").css("visibility",factura_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura").css("visibility",factura_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_empresa",factura_control.empresasFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_3",factura_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal",factura_control.sucursalsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_4",factura_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio",factura_control.ejerciciosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_5",factura_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_periodo",factura_control.periodosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_6",factura_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_usuario",factura_control.usuariosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_7",factura_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_cliente",factura_control.clientesFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_9",factura_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_control.clientesFK);

	};

	cargarCombosmonedasFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_moneda",factura_control.monedasFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_13",factura_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",factura_control.monedasFK);

	};

	cargarCombosvendedorsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor",factura_control.vendedorsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_14",factura_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",factura_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente",factura_control.termino_pago_clientesFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_15",factura_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",factura_control.termino_pago_clientesFK);

	};

	cargarCombosestadosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_estado",factura_control.estadosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_17",factura_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",factura_control.estadosFK);

	};

	cargarCombosasientosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_asiento",factura_control.asientosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_38",factura_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",factura_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_cobrarsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",factura_control.documento_cuenta_cobrarsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_39",factura_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",factura_control.documento_cuenta_cobrarsFK);

	};

	cargarComboskardexsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_kardex",factura_control.kardexsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_40",factura_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",factura_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(factura_control) {

	};

	registrarComboActionChangeCombossucursalsFK(factura_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(factura_control) {

	};

	registrarComboActionChangeCombosperiodosFK(factura_control) {

	};

	registrarComboActionChangeCombosusuariosFK(factura_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_control) {
		this.registrarComboActionChangeid_cliente("form"+factura_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosmonedasFK(factura_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(factura_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(factura_control) {

	};

	registrarComboActionChangeCombosestadosFK(factura_control) {

	};

	registrarComboActionChangeCombosasientosFK(factura_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_control) {

	};

	registrarComboActionChangeComboskardexsFK(factura_control) {

	};

	
	
	setDefectoValorCombosempresasFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idempresaDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val() != factura_control.idempresaDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val(factura_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idsucursalDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_control.idsucursalDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val(factura_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idejercicioDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_control.idejercicioDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idperiodoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val() != factura_control.idperiodoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val(factura_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idusuarioDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val() != factura_control.idusuarioDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val(factura_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val() != factura_control.idclienteDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val(factura_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idmonedaDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val() != factura_control.idmonedaDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val(factura_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(factura_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idvendedorDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_control.idvendedorDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val(factura_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(factura_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != factura_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(factura_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(factura_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idestadoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val() != factura_control.idestadoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val(factura_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(factura_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idasientoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val() != factura_control.idasientoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val(factura_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(factura_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(factura_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idkardexDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val() != factura_control.idkardexDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val(factura_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(factura_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura","facturacion","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);


		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
							factura_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
		factura_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_control
		
	
	}
	
	onLoadCombosDefectoFK(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosempresasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombossucursalsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosejerciciosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosperiodosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosusuariosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosclientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosmonedasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosvendedorsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosestadosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosasientosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorComboskardexsFK(factura_control);
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
	onLoadCombosEventosFK(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosempresasFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombossucursalsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosejerciciosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosperiodosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosusuariosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosmonedasFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosvendedorsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosestadosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosasientosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeComboskardexsFK(factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_funcion1.validarFormularioJQuery(factura_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(factura_funcion1,factura_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(factura_funcion1,factura_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura","facturacion","",factura_funcion1,factura_webcontrol1,"factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("factura");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_control) {
		
		
		
		if(factura_control.strPermisoActualizar!=null) {
			jQuery("#tdfacturaActualizarToolBar").css("display",factura_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdfacturaEliminarToolBar").css("display",factura_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trfacturaElementos").css("display",factura_control.strVisibleTablaElementos);
		
		jQuery("#trfacturaAcciones").css("display",factura_control.strVisibleTablaAcciones);
		jQuery("#trfacturaParametrosAcciones").css("display",factura_control.strVisibleTablaAcciones);
		
		jQuery("#tdfacturaCerrarPagina").css("display",factura_control.strPermisoPopup);		
		jQuery("#tdfacturaCerrarPaginaToolBar").css("display",factura_control.strPermisoPopup);
		//jQuery("#trfacturaAccionesRelaciones").css("display",factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Facturas";
		sTituloBanner+=" - " + factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfacturaRelacionesToolBar").css("display",factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfactura").css("display",factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura","facturacion","",factura_funcion1,factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		factura_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		factura_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_webcontrol1.registrarEventosControles();
		
		if(factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_constante1.STR_ES_RELACIONES=="true") {
			if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(factura_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
						//factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(factura_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_constante1.BIG_ID_ACTUAL,"factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
						//factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			factura_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);	
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

var factura_webcontrol1 = new factura_webcontrol();

//Para ser llamado desde otro archivo (import)
export {factura_webcontrol,factura_webcontrol1};

//Para ser llamado desde window.opener
window.factura_webcontrol1 = factura_webcontrol1;


if(factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_webcontrol1.onLoadWindow; 
}

//</script>