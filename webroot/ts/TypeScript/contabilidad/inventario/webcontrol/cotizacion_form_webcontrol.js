//<script type="text/javascript" language="javascript">



//var cotizacionJQueryPaginaWebInteraccion= function (cotizacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cotizacion_constante,cotizacion_constante1} from '../util/cotizacion_constante.js';

import {cotizacion_funcion,cotizacion_funcion1} from '../util/cotizacion_form_funcion.js';


class cotizacion_webcontrol extends GeneralEntityWebControl {
	
	cotizacion_control=null;
	cotizacion_controlInicial=null;
	cotizacion_controlAuxiliar=null;
		
	//if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cotizacion_control) {
		super();
		
		this.cotizacion_control=cotizacion_control;
	}
		
	actualizarVariablesPagina(cotizacion_control) {
		
		if(cotizacion_control.action=="index" || cotizacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cotizacion_control);
			
		} 
		
		
		
	
		else if(cotizacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cotizacion_control);	
		
		} else if(cotizacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_control);		
		}
	
		else if(cotizacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cotizacion_control);		
		}
	
		else if(cotizacion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cotizacion_control);
		}
		
		
		else if(cotizacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cotizacion_control);
		
		} else if(cotizacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cotizacion_control);
		
		} else if(cotizacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cotizacion_control);
		
		} else if(cotizacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cotizacion_control);
		
		} else if(cotizacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cotizacion_control);
		
		} else if(cotizacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cotizacion_control);		
		
		} else if(cotizacion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cotizacion_control);		
		
		} 
		//else if(cotizacion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cotizacion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cotizacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cotizacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cotizacion_control) {
		this.actualizarPaginaAccionesGenerales(cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(cotizacion_control);
		this.actualizarPaginaOrderBy(cotizacion_control);
		this.actualizarPaginaTablaDatos(cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(cotizacion_control);
		//this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cotizacion_control);
		this.actualizarPaginaAreaBusquedas(cotizacion_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cotizacion_control) {
		//this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cotizacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cotizacion_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_control);		
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(cotizacion_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cotizacion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(cotizacion_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_control);
		this.actualizarPaginaFormulario(cotizacion_control);
		this.onLoadCombosDefectoFK(cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cotizacion_control) {
		//FORMULARIO
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cotizacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);		
		
		//COMBOS FK
		if(cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cotizacion_control) {
		//FORMULARIO
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cotizacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);	
		
		//COMBOS FK
		if(cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cotizacion_control) {
		//FORMULARIO
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_control);	
		//COMBOS FK
		if(cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cotizacion_control) {
		
		if(cotizacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cotizacion_control);
		}
		
		if(cotizacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cotizacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cotizacion_control) {
		if(cotizacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cotizacionReturnGeneral",JSON.stringify(cotizacion_control.cotizacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cotizacion_control) {
		if(cotizacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cotizacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cotizacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cotizacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cotizacion_control, mostrar) {
		
		if(mostrar==true) {
			cotizacion_funcion1.resaltarRestaurarDivsPagina(false,"cotizacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cotizacion_funcion1.resaltarRestaurarDivMantenimiento(false,"cotizacion");
			}			
			
			cotizacion_funcion1.mostrarDivMensaje(true,cotizacion_control.strAuxiliarMensaje,cotizacion_control.strAuxiliarCssMensaje);
		
		} else {
			cotizacion_funcion1.mostrarDivMensaje(false,cotizacion_control.strAuxiliarMensaje,cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cotizacion_control) {
		if(cotizacion_funcion1.esPaginaForm(cotizacion_constante1)==true) {
			window.opener.cotizacion_webcontrol1.actualizarPaginaTablaDatos(cotizacion_control);
		} else {
			this.actualizarPaginaTablaDatos(cotizacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(cotizacion_control) {
		cotizacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cotizacion_control.strAuxiliarUrlPagina);
				
		cotizacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cotizacion_control.strAuxiliarTipo,cotizacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cotizacion_control) {
		cotizacion_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_control.strAuxiliarMensajeAlert,cotizacion_control.strAuxiliarCssMensaje);
			
		if(cotizacion_funcion1.esPaginaForm(cotizacion_constante1)==true) {
			window.opener.cotizacion_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_control.strAuxiliarMensajeAlert,cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cotizacion_control) {
		this.cotizacion_controlInicial=cotizacion_control;
			
		if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cotizacion_control.strStyleDivArbol,cotizacion_control.strStyleDivContent
																,cotizacion_control.strStyleDivOpcionesBanner,cotizacion_control.strStyleDivExpandirColapsar
																,cotizacion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cotizacion_control) {
		this.actualizarCssBotonesPagina(cotizacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cotizacion_control.tiposReportes,cotizacion_control.tiposReporte
															 	,cotizacion_control.tiposPaginacion,cotizacion_control.tiposAcciones
																,cotizacion_control.tiposColumnasSelect,cotizacion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cotizacion_control.tiposRelaciones,cotizacion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cotizacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cotizacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cotizacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cotizacion_control) {
	
		var indexPosition=cotizacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cotizacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cotizacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosempresasFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombossucursalsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosejerciciosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosperiodosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosusuariosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosproveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosvendedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombostermino_pago_proveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosmonedasFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.cargarCombosestadosFK(cotizacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cotizacion_control.strRecargarFkTiposNinguno!=null && cotizacion_control.strRecargarFkTiposNinguno!='NINGUNO' && cotizacion_control.strRecargarFkTiposNinguno!='') {
			
				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosempresasFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombossucursalsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosejerciciosFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosperiodosFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosusuariosFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosproveedorsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosvendedorsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombostermino_pago_proveedorsFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosmonedasFK(cotizacion_control);
				}

				if(cotizacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_webcontrol1.cargarCombosestadosFK(cotizacion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cotizacionActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cotizacionActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cotizacionActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablamonedaFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(cotizacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_funcion1,cotizacion_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cotizacion_control) {
		jQuery("#tdcotizacionNuevo").css("display",cotizacion_control.strPermisoNuevo);
		jQuery("#trcotizacionElementos").css("display",cotizacion_control.strVisibleTablaElementos);
		jQuery("#trcotizacionAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trcotizacionParametrosAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cotizacion_control) {
	
		this.actualizarCssBotonesMantenimiento(cotizacion_control);
				
		if(cotizacion_control.cotizacionActual!=null) {//form
			
			this.actualizarCamposFormulario(cotizacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(cotizacion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cotizacion_control) {
	
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id").val(cotizacion_control.cotizacionActual.id);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-version_row").val(cotizacion_control.cotizacionActual.versionRow);
		
		if(cotizacion_control.cotizacionActual.id_empresa!=null && cotizacion_control.cotizacionActual.id_empresa>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val() != cotizacion_control.cotizacionActual.id_empresa) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val(cotizacion_control.cotizacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_sucursal!=null && cotizacion_control.cotizacionActual.id_sucursal>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val() != cotizacion_control.cotizacionActual.id_sucursal) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val(cotizacion_control.cotizacionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_ejercicio!=null && cotizacion_control.cotizacionActual.id_ejercicio>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != cotizacion_control.cotizacionActual.id_ejercicio) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val(cotizacion_control.cotizacionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_periodo!=null && cotizacion_control.cotizacionActual.id_periodo>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val() != cotizacion_control.cotizacionActual.id_periodo) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val(cotizacion_control.cotizacionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_usuario!=null && cotizacion_control.cotizacionActual.id_usuario>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val() != cotizacion_control.cotizacionActual.id_usuario) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val(cotizacion_control.cotizacionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_proveedor!=null && cotizacion_control.cotizacionActual.id_proveedor>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val() != cotizacion_control.cotizacionActual.id_proveedor) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val(cotizacion_control.cotizacionActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-ruc").val(cotizacion_control.cotizacionActual.ruc);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-numero").val(cotizacion_control.cotizacionActual.numero);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-fecha_emision").val(cotizacion_control.cotizacionActual.fecha_emision);
		
		if(cotizacion_control.cotizacionActual.id_vendedor!=null && cotizacion_control.cotizacionActual.id_vendedor>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val() != cotizacion_control.cotizacionActual.id_vendedor) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val(cotizacion_control.cotizacionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_control.cotizacionActual.id_termino_pago_proveedor!=null && cotizacion_control.cotizacionActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != cotizacion_control.cotizacionActual.id_termino_pago_proveedor) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(cotizacion_control.cotizacionActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-fecha_vence").val(cotizacion_control.cotizacionActual.fecha_vence);
		
		if(cotizacion_control.cotizacionActual.id_moneda!=null && cotizacion_control.cotizacionActual.id_moneda>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda").val() != cotizacion_control.cotizacionActual.id_moneda) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda").val(cotizacion_control.cotizacionActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-cotizacion").val(cotizacion_control.cotizacionActual.cotizacion);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-direccion").val(cotizacion_control.cotizacionActual.direccion);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-enviar").val(cotizacion_control.cotizacionActual.enviar);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-observacion").val(cotizacion_control.cotizacionActual.observacion);
		
		if(cotizacion_control.cotizacionActual.id_estado!=null && cotizacion_control.cotizacionActual.id_estado>-1){
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val() != cotizacion_control.cotizacionActual.id_estado) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val(cotizacion_control.cotizacionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-sub_total").val(cotizacion_control.cotizacionActual.sub_total);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-descuento_monto").val(cotizacion_control.cotizacionActual.descuento_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-descuento_porciento").val(cotizacion_control.cotizacionActual.descuento_porciento);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-iva_monto").val(cotizacion_control.cotizacionActual.iva_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-iva_porciento").val(cotizacion_control.cotizacionActual.iva_porciento);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-total").val(cotizacion_control.cotizacionActual.total);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-otro_monto").val(cotizacion_control.cotizacionActual.otro_monto);
		jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-otro_porciento").val(cotizacion_control.cotizacionActual.otro_porciento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cotizacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cotizacion","inventario","","form_cotizacion",formulario,"","",paraEventoTabla,idFilaTabla,cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	actualizarSpanMensajesCampos(cotizacion_control) {
		jQuery("#spanstrMensajeid").text(cotizacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cotizacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cotizacion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(cotizacion_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(cotizacion_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cotizacion_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cotizacion_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_proveedor").text(cotizacion_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajeruc").text(cotizacion_control.strMensajeruc);		
		jQuery("#spanstrMensajenumero").text(cotizacion_control.strMensajenumero);		
		jQuery("#spanstrMensajefecha_emision").text(cotizacion_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(cotizacion_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(cotizacion_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajefecha_vence").text(cotizacion_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeid_moneda").text(cotizacion_control.strMensajeid_moneda);		
		jQuery("#spanstrMensajecotizacion").text(cotizacion_control.strMensajecotizacion);		
		jQuery("#spanstrMensajedireccion").text(cotizacion_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar").text(cotizacion_control.strMensajeenviar);		
		jQuery("#spanstrMensajeobservacion").text(cotizacion_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeid_estado").text(cotizacion_control.strMensajeid_estado);		
		jQuery("#spanstrMensajesub_total").text(cotizacion_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(cotizacion_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(cotizacion_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(cotizacion_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(cotizacion_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajetotal").text(cotizacion_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(cotizacion_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(cotizacion_control.strMensajeotro_porciento);		
	}
	
	actualizarCssBotonesMantenimiento(cotizacion_control) {
		jQuery("#tdbtnNuevocotizacion").css("visibility",cotizacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocotizacion").css("display",cotizacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcotizacion").css("display",cotizacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcotizacion").css("display",cotizacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscotizacion").css("visibility",cotizacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscotizacion").css("display",cotizacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcotizacion").css("visibility",cotizacion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa",cotizacion_control.empresasFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_2",cotizacion_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal",cotizacion_control.sucursalsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_3",cotizacion_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio",cotizacion_control.ejerciciosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_4",cotizacion_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo",cotizacion_control.periodosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_5",cotizacion_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario",cotizacion_control.usuariosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_6",cotizacion_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor",cotizacion_control.proveedorsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_7",cotizacion_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cotizacion_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor",cotizacion_control.vendedorsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_11",cotizacion_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",cotizacion_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",cotizacion_control.termino_pago_proveedorsFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_12",cotizacion_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",cotizacion_control.termino_pago_proveedorsFK);

	};

	cargarCombosmonedasFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda",cotizacion_control.monedasFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_14",cotizacion_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",cotizacion_control.monedasFK);

	};

	cargarCombosestadosFK(cotizacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado",cotizacion_control.estadosFK);

		if(cotizacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_control.idFilaTablaActual+"_19",cotizacion_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",cotizacion_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cotizacion_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(cotizacion_control) {
		this.registrarComboActionChangeid_proveedor("form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(cotizacion_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosmonedasFK(cotizacion_control) {

	};

	registrarComboActionChangeCombosestadosFK(cotizacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idempresaDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val() != cotizacion_control.idempresaDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa").val(cotizacion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idsucursalDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val() != cotizacion_control.idsucursalDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal").val(cotizacion_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idejercicioDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != cotizacion_control.idejercicioDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio").val(cotizacion_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idperiodoDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val() != cotizacion_control.idperiodoDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo").val(cotizacion_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idusuarioDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val() != cotizacion_control.idusuarioDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario").val(cotizacion_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idproveedorDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val() != cotizacion_control.idproveedorDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor").val(cotizacion_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cotizacion_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idvendedorDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val() != cotizacion_control.idvendedorDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor").val(cotizacion_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(cotizacion_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != cotizacion_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(cotizacion_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(cotizacion_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idmonedaDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda").val() != cotizacion_control.idmonedaDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda").val(cotizacion_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(cotizacion_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(cotizacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_control.idestadoDefaultFK>-1 && jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val() != cotizacion_control.idestadoDefaultFK) {
				jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado").val(cotizacion_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(cotizacion_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cotizacion","inventario","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
							cotizacion_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
		cotizacion_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cotizacion_control
		
	

		var descuento_porciento="form"+cotizacion_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	onLoadCombosDefectoFK(cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosempresasFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombossucursalsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosejerciciosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosperiodosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosusuariosFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosproveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosvendedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosmonedasFK(cotizacion_control);
			}

			if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTipos,",")) { 
				cotizacion_webcontrol1.setDefectoValorCombosestadosFK(cotizacion_control);
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
	onLoadCombosEventosFK(cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosempresasFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombossucursalsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosperiodosFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosusuariosFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosvendedorsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosmonedasFK(cotizacion_control);
			//}

			//if(cotizacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cotizacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_webcontrol1.registrarComboActionChangeCombosestadosFK(cotizacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				cotizacion_funcion1.validarFormularioJQuery(cotizacion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cotizacion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cotizacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cotizacion_funcion1,cotizacion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cotizacion_funcion1,cotizacion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cotizacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,"cotizacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				cotizacion_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cotizacion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cotizacion_control) {
		
		
		
		if(cotizacion_control.strPermisoActualizar!=null) {
			jQuery("#tdcotizacionActualizarToolBar").css("display",cotizacion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcotizacionEliminarToolBar").css("display",cotizacion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcotizacionElementos").css("display",cotizacion_control.strVisibleTablaElementos);
		
		jQuery("#trcotizacionAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trcotizacionParametrosAcciones").css("display",cotizacion_control.strVisibleTablaAcciones);
		
		jQuery("#tdcotizacionCerrarPagina").css("display",cotizacion_control.strPermisoPopup);		
		jQuery("#tdcotizacionCerrarPaginaToolBar").css("display",cotizacion_control.strPermisoPopup);
		//jQuery("#trcotizacionAccionesRelaciones").css("display",cotizacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cotizacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cotizacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cotizacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cotizaciones";
		sTituloBanner+=" - " + cotizacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cotizacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcotizacionRelacionesToolBar").css("display",cotizacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscotizacion").css("display",cotizacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cotizacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cotizacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cotizacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cotizacion_webcontrol1.registrarEventosControles();
		
		if(cotizacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			cotizacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cotizacion_constante1.STR_ES_RELACIONES=="true") {
			if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				cotizacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cotizacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cotizacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
						//cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cotizacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cotizacion_constante1.BIG_ID_ACTUAL,"cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);
						//cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cotizacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cotizacion","inventario","",cotizacion_funcion1,cotizacion_webcontrol1,cotizacion_constante1);	
	}
}

var cotizacion_webcontrol1 = new cotizacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cotizacion_webcontrol,cotizacion_webcontrol1};

//Para ser llamado desde window.opener
window.cotizacion_webcontrol1 = cotizacion_webcontrol1;


if(cotizacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cotizacion_webcontrol1.onLoadWindow; 
}

//</script>