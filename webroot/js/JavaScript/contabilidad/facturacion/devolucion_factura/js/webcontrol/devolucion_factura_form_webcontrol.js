//<script type="text/javascript" language="javascript">



//var devolucion_facturaJQueryPaginaWebInteraccion= function (devolucion_factura_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {devolucion_factura_constante,devolucion_factura_constante1} from '../util/devolucion_factura_constante.js';

import {devolucion_factura_funcion,devolucion_factura_funcion1} from '../util/devolucion_factura_form_funcion.js';


class devolucion_factura_webcontrol extends GeneralEntityWebControl {
	
	devolucion_factura_control=null;
	devolucion_factura_controlInicial=null;
	devolucion_factura_controlAuxiliar=null;
		
	//if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_factura_control) {
		super();
		
		this.devolucion_factura_control=devolucion_factura_control;
	}
		
	actualizarVariablesPagina(devolucion_factura_control) {
		
		if(devolucion_factura_control.action=="index" || devolucion_factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_factura_control);
			
		} 
		
		
		
	
		else if(devolucion_factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_factura_control);	
		
		} else if(devolucion_factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_factura_control);		
		}
	
		else if(devolucion_factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_factura_control);		
		}
	
		else if(devolucion_factura_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_factura_control);
		}
		
		
		else if(devolucion_factura_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(devolucion_factura_control);		
		
		} else if(devolucion_factura_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_factura_control);		
		
		} 
		//else if(devolucion_factura_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_factura_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + devolucion_factura_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(devolucion_factura_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(devolucion_factura_control) {
		this.actualizarPaginaAccionesGenerales(devolucion_factura_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(devolucion_factura_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_factura_control);
		this.actualizarPaginaOrderBy(devolucion_factura_control);
		this.actualizarPaginaTablaDatos(devolucion_factura_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_control);
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_control);
		this.actualizarPaginaAreaBusquedas(devolucion_factura_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_factura_control) {
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_factura_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_factura_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(devolucion_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(devolucion_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(devolucion_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_factura_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_control);
		this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(devolucion_factura_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_factura_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_control);
		this.actualizarPaginaFormulario(devolucion_factura_control);
		this.onLoadCombosDefectoFK(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_factura_control) {
		//FORMULARIO
		if(devolucion_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_factura_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		
		//COMBOS FK
		if(devolucion_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_factura_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_factura_control) {
		//FORMULARIO
		if(devolucion_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_factura_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);	
		
		//COMBOS FK
		if(devolucion_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_factura_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(devolucion_factura_control) {
		//FORMULARIO
		if(devolucion_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_factura_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);	
		//COMBOS FK
		if(devolucion_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_factura_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(devolucion_factura_control) {
		
		if(devolucion_factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_factura_control);
		}
		
		if(devolucion_factura_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(devolucion_factura_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(devolucion_factura_control) {
		if(devolucion_factura_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("devolucion_facturaReturnGeneral",JSON.stringify(devolucion_factura_control.devolucion_facturaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control) {
		if(devolucion_factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_factura_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(devolucion_factura_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_factura_funcion1.resaltarRestaurarDivsPagina(false,"devolucion_factura");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_factura_funcion1.resaltarRestaurarDivMantenimiento(false,"devolucion_factura");
			}			
			
			devolucion_factura_funcion1.mostrarDivMensaje(true,devolucion_factura_control.strAuxiliarMensaje,devolucion_factura_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_factura_funcion1.mostrarDivMensaje(false,devolucion_factura_control.strAuxiliarMensaje,devolucion_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_factura_control) {
		if(devolucion_factura_funcion1.esPaginaForm(devolucion_factura_constante1)==true) {
			window.opener.devolucion_factura_webcontrol1.actualizarPaginaTablaDatos(devolucion_factura_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_factura_control) {
		devolucion_factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_factura_control.strAuxiliarUrlPagina);
				
		devolucion_factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_factura_control.strAuxiliarTipo,devolucion_factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_factura_control) {
		devolucion_factura_funcion1.resaltarRestaurarDivMensaje(true,devolucion_factura_control.strAuxiliarMensajeAlert,devolucion_factura_control.strAuxiliarCssMensaje);
			
		if(devolucion_factura_funcion1.esPaginaForm(devolucion_factura_constante1)==true) {
			window.opener.devolucion_factura_funcion1.resaltarRestaurarDivMensaje(true,devolucion_factura_control.strAuxiliarMensajeAlert,devolucion_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(devolucion_factura_control) {
		this.devolucion_factura_controlInicial=devolucion_factura_control;
			
		if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_factura_control.strStyleDivArbol,devolucion_factura_control.strStyleDivContent
																,devolucion_factura_control.strStyleDivOpcionesBanner,devolucion_factura_control.strStyleDivExpandirColapsar
																,devolucion_factura_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(devolucion_factura_control) {
		this.actualizarCssBotonesPagina(devolucion_factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_factura_control.tiposReportes,devolucion_factura_control.tiposReporte
															 	,devolucion_factura_control.tiposPaginacion,devolucion_factura_control.tiposAcciones
																,devolucion_factura_control.tiposColumnasSelect,devolucion_factura_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(devolucion_factura_control.tiposRelaciones,devolucion_factura_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_factura_control);			
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_factura_control) {
	
		var indexPosition=devolucion_factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(devolucion_factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosempresasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombossucursalsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosejerciciosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosperiodosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosusuariosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosclientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosvendedorsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombostermino_pago_clientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosmonedasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosestadosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosasientosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarComboskardexsFK(devolucion_factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_factura_control.strRecargarFkTiposNinguno!=null && devolucion_factura_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_factura_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosempresasFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombossucursalsFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosejerciciosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosperiodosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosusuariosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosclientesFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosvendedorsFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombostermino_pago_clientesFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosmonedasFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosestadosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosasientosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarComboskardexsFK(devolucion_factura_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_facturaActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_facturaActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_facturaActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablamonedaFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_cobrarFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.documento_cuenta_cobrarsFK);
	}

	cargarComboEditarTablakardexFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(devolucion_factura_control) {
		jQuery("#tddevolucion_facturaNuevo").css("display",devolucion_factura_control.strPermisoNuevo);
		jQuery("#trdevolucion_facturaElementos").css("display",devolucion_factura_control.strVisibleTablaElementos);
		jQuery("#trdevolucion_facturaAcciones").css("display",devolucion_factura_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_facturaParametrosAcciones").css("display",devolucion_factura_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(devolucion_factura_control) {
	
		this.actualizarCssBotonesMantenimiento(devolucion_factura_control);
				
		if(devolucion_factura_control.devolucion_facturaActual!=null) {//form
			
			this.actualizarCamposFormulario(devolucion_factura_control);			
		}
						
		this.actualizarSpanMensajesCampos(devolucion_factura_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(devolucion_factura_control) {
	
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id").val(devolucion_factura_control.devolucion_facturaActual.id);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-created_at").val(devolucion_factura_control.devolucion_facturaActual.versionRow);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-updated_at").val(devolucion_factura_control.devolucion_facturaActual.versionRow);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_empresa!=null && devolucion_factura_control.devolucion_facturaActual.id_empresa>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val() != devolucion_factura_control.devolucion_facturaActual.id_empresa) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val(devolucion_factura_control.devolucion_facturaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_sucursal!=null && devolucion_factura_control.devolucion_facturaActual.id_sucursal>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val() != devolucion_factura_control.devolucion_facturaActual.id_sucursal) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val(devolucion_factura_control.devolucion_facturaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_ejercicio!=null && devolucion_factura_control.devolucion_facturaActual.id_ejercicio>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != devolucion_factura_control.devolucion_facturaActual.id_ejercicio) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val(devolucion_factura_control.devolucion_facturaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_periodo!=null && devolucion_factura_control.devolucion_facturaActual.id_periodo>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val() != devolucion_factura_control.devolucion_facturaActual.id_periodo) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val(devolucion_factura_control.devolucion_facturaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_usuario!=null && devolucion_factura_control.devolucion_facturaActual.id_usuario>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val() != devolucion_factura_control.devolucion_facturaActual.id_usuario) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val(devolucion_factura_control.devolucion_facturaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-numero").val(devolucion_factura_control.devolucion_facturaActual.numero);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_cliente!=null && devolucion_factura_control.devolucion_facturaActual.id_cliente>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val() != devolucion_factura_control.devolucion_facturaActual.id_cliente) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val(devolucion_factura_control.devolucion_facturaActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-ruc").val(devolucion_factura_control.devolucion_facturaActual.ruc);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-referencia_cliente").val(devolucion_factura_control.devolucion_facturaActual.referencia_cliente);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-fecha_emision").val(devolucion_factura_control.devolucion_facturaActual.fecha_emision);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_vendedor!=null && devolucion_factura_control.devolucion_facturaActual.id_vendedor>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val() != devolucion_factura_control.devolucion_facturaActual.id_vendedor) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val(devolucion_factura_control.devolucion_facturaActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente!=null && devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-fecha_vence").val(devolucion_factura_control.devolucion_facturaActual.fecha_vence);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_moneda!=null && devolucion_factura_control.devolucion_facturaActual.id_moneda>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val() != devolucion_factura_control.devolucion_facturaActual.id_moneda) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val(devolucion_factura_control.devolucion_facturaActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-cotizacion").val(devolucion_factura_control.devolucion_facturaActual.cotizacion);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_estado!=null && devolucion_factura_control.devolucion_facturaActual.id_estado>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val() != devolucion_factura_control.devolucion_facturaActual.id_estado) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val(devolucion_factura_control.devolucion_facturaActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-direccion").val(devolucion_factura_control.devolucion_facturaActual.direccion);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-enviar_a").val(devolucion_factura_control.devolucion_facturaActual.enviar_a);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-observacion").val(devolucion_factura_control.devolucion_facturaActual.observacion);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-impuesto_en_precio").prop('checked',devolucion_factura_control.devolucion_facturaActual.impuesto_en_precio);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-sub_total").val(devolucion_factura_control.devolucion_facturaActual.sub_total);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-descuento_monto").val(devolucion_factura_control.devolucion_facturaActual.descuento_monto);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-descuento_porciento").val(devolucion_factura_control.devolucion_facturaActual.descuento_porciento);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-iva_monto").val(devolucion_factura_control.devolucion_facturaActual.iva_monto);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-iva_porciento").val(devolucion_factura_control.devolucion_facturaActual.iva_porciento);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-retencion_fuente_monto").val(devolucion_factura_control.devolucion_facturaActual.retencion_fuente_monto);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-retencion_fuente_porciento").val(devolucion_factura_control.devolucion_facturaActual.retencion_fuente_porciento);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-retencion_iva_monto").val(devolucion_factura_control.devolucion_facturaActual.retencion_iva_monto);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-retencion_iva_porciento").val(devolucion_factura_control.devolucion_facturaActual.retencion_iva_porciento);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-total").val(devolucion_factura_control.devolucion_facturaActual.total);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-otro_monto").val(devolucion_factura_control.devolucion_facturaActual.otro_monto);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-otro_porciento").val(devolucion_factura_control.devolucion_facturaActual.otro_porciento);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-hora").val(devolucion_factura_control.devolucion_facturaActual.hora);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-retencion_ica_porciento").val(devolucion_factura_control.devolucion_facturaActual.retencion_ica_porciento);
		jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-retencion_ica_monto").val(devolucion_factura_control.devolucion_facturaActual.retencion_ica_monto);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_asiento!=null && devolucion_factura_control.devolucion_facturaActual.id_asiento>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val() != devolucion_factura_control.devolucion_facturaActual.id_asiento) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val(devolucion_factura_control.devolucion_facturaActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar!=null && devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_kardex!=null && devolucion_factura_control.devolucion_facturaActual.id_kardex>-1){
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val() != devolucion_factura_control.devolucion_facturaActual.id_kardex) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val(devolucion_factura_control.devolucion_facturaActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+devolucion_factura_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("devolucion_factura","facturacion","","form_devolucion_factura",formulario,"","",paraEventoTabla,idFilaTabla,devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}
	
	actualizarSpanMensajesCampos(devolucion_factura_control) {
		jQuery("#spanstrMensajeid").text(devolucion_factura_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(devolucion_factura_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(devolucion_factura_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(devolucion_factura_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_sucursal").text(devolucion_factura_control.strMensajeid_sucursal);		
		jQuery("#spanstrMensajeid_ejercicio").text(devolucion_factura_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(devolucion_factura_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(devolucion_factura_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajenumero").text(devolucion_factura_control.strMensajenumero);		
		jQuery("#spanstrMensajeid_cliente").text(devolucion_factura_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeruc").text(devolucion_factura_control.strMensajeruc);		
		jQuery("#spanstrMensajereferencia_cliente").text(devolucion_factura_control.strMensajereferencia_cliente);		
		jQuery("#spanstrMensajefecha_emision").text(devolucion_factura_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_vendedor").text(devolucion_factura_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(devolucion_factura_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajefecha_vence").text(devolucion_factura_control.strMensajefecha_vence);		
		jQuery("#spanstrMensajeid_moneda").text(devolucion_factura_control.strMensajeid_moneda);		
		jQuery("#spanstrMensajecotizacion").text(devolucion_factura_control.strMensajecotizacion);		
		jQuery("#spanstrMensajeid_estado").text(devolucion_factura_control.strMensajeid_estado);		
		jQuery("#spanstrMensajedireccion").text(devolucion_factura_control.strMensajedireccion);		
		jQuery("#spanstrMensajeenviar_a").text(devolucion_factura_control.strMensajeenviar_a);		
		jQuery("#spanstrMensajeobservacion").text(devolucion_factura_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto_en_precio").text(devolucion_factura_control.strMensajeimpuesto_en_precio);		
		jQuery("#spanstrMensajesub_total").text(devolucion_factura_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_monto").text(devolucion_factura_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajedescuento_porciento").text(devolucion_factura_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(devolucion_factura_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(devolucion_factura_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeretencion_fuente_monto").text(devolucion_factura_control.strMensajeretencion_fuente_monto);		
		jQuery("#spanstrMensajeretencion_fuente_porciento").text(devolucion_factura_control.strMensajeretencion_fuente_porciento);		
		jQuery("#spanstrMensajeretencion_iva_monto").text(devolucion_factura_control.strMensajeretencion_iva_monto);		
		jQuery("#spanstrMensajeretencion_iva_porciento").text(devolucion_factura_control.strMensajeretencion_iva_porciento);		
		jQuery("#spanstrMensajetotal").text(devolucion_factura_control.strMensajetotal);		
		jQuery("#spanstrMensajeotro_monto").text(devolucion_factura_control.strMensajeotro_monto);		
		jQuery("#spanstrMensajeotro_porciento").text(devolucion_factura_control.strMensajeotro_porciento);		
		jQuery("#spanstrMensajehora").text(devolucion_factura_control.strMensajehora);		
		jQuery("#spanstrMensajeretencion_ica_porciento").text(devolucion_factura_control.strMensajeretencion_ica_porciento);		
		jQuery("#spanstrMensajeretencion_ica_monto").text(devolucion_factura_control.strMensajeretencion_ica_monto);		
		jQuery("#spanstrMensajeid_asiento").text(devolucion_factura_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_documento_cuenta_cobrar").text(devolucion_factura_control.strMensajeid_documento_cuenta_cobrar);		
		jQuery("#spanstrMensajeid_kardex").text(devolucion_factura_control.strMensajeid_kardex);		
	}
	
	actualizarCssBotonesMantenimiento(devolucion_factura_control) {
		jQuery("#tdbtnNuevodevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodevolucion_factura").css("display",devolucion_factura_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardevolucion_factura").css("display",devolucion_factura_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardevolucion_factura").css("display",devolucion_factura_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdevolucion_factura").css("display",devolucion_factura_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardevolucion_factura").css("visibility",devolucion_factura_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa",devolucion_factura_control.empresasFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_3",devolucion_factura_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal",devolucion_factura_control.sucursalsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_4",devolucion_factura_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio",devolucion_factura_control.ejerciciosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_5",devolucion_factura_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo",devolucion_factura_control.periodosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_6",devolucion_factura_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario",devolucion_factura_control.usuariosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_7",devolucion_factura_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente",devolucion_factura_control.clientesFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_9",devolucion_factura_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",devolucion_factura_control.clientesFK);

	};

	cargarCombosvendedorsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor",devolucion_factura_control.vendedorsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_13",devolucion_factura_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",devolucion_factura_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente",devolucion_factura_control.termino_pago_clientesFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_14",devolucion_factura_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",devolucion_factura_control.termino_pago_clientesFK);

	};

	cargarCombosmonedasFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda",devolucion_factura_control.monedasFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_16",devolucion_factura_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",devolucion_factura_control.monedasFK);

	};

	cargarCombosestadosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado",devolucion_factura_control.estadosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_18",devolucion_factura_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",devolucion_factura_control.estadosFK);

	};

	cargarCombosasientosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento",devolucion_factura_control.asientosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_38",devolucion_factura_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",devolucion_factura_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",devolucion_factura_control.documento_cuenta_cobrarsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_39",devolucion_factura_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",devolucion_factura_control.documento_cuenta_cobrarsFK);

	};

	cargarComboskardexsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex",devolucion_factura_control.kardexsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_40",devolucion_factura_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",devolucion_factura_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombossucursalsFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosperiodosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosusuariosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosclientesFK(devolucion_factura_control) {
		this.registrarComboActionChangeid_cliente("form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosmonedasFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosestadosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosasientosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control) {

	};

	registrarComboActionChangeComboskardexsFK(devolucion_factura_control) {

	};

	
	
	setDefectoValorCombosempresasFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idempresaDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val() != devolucion_factura_control.idempresaDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val(devolucion_factura_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idsucursalDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val() != devolucion_factura_control.idsucursalDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val(devolucion_factura_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idejercicioDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != devolucion_factura_control.idejercicioDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val(devolucion_factura_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idperiodoDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val() != devolucion_factura_control.idperiodoDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val(devolucion_factura_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idusuarioDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val() != devolucion_factura_control.idusuarioDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val(devolucion_factura_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idclienteDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val() != devolucion_factura_control.idclienteDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val(devolucion_factura_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(devolucion_factura_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idvendedorDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val() != devolucion_factura_control.idvendedorDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val(devolucion_factura_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(devolucion_factura_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != devolucion_factura_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(devolucion_factura_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(devolucion_factura_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idmonedaDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val() != devolucion_factura_control.idmonedaDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val(devolucion_factura_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(devolucion_factura_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idestadoDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val() != devolucion_factura_control.idestadoDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val(devolucion_factura_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(devolucion_factura_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idasientoDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val() != devolucion_factura_control.idasientoDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val(devolucion_factura_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(devolucion_factura_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != devolucion_factura_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(devolucion_factura_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(devolucion_factura_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idkardexDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val() != devolucion_factura_control.idkardexDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val(devolucion_factura_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(devolucion_factura_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_factura","facturacion","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
							devolucion_factura_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
		devolucion_factura_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_factura_control
		
	
	}
	
	onLoadCombosDefectoFK(devolucion_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosempresasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombossucursalsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosejerciciosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosperiodosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosusuariosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosclientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosvendedorsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosmonedasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosestadosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosasientosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorComboskardexsFK(devolucion_factura_control);
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
	onLoadCombosEventosFK(devolucion_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosempresasFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombossucursalsFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosejerciciosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosperiodosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosusuariosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosclientesFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosvendedorsFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosmonedasFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosestadosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosasientosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeComboskardexsFK(devolucion_factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_factura_funcion1.validarFormularioJQuery(devolucion_factura_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion_factura");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion_factura");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(devolucion_factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,"devolucion_factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("devolucion_factura");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_factura_control) {
		
		
		
		if(devolucion_factura_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucion_facturaActualizarToolBar").css("display",devolucion_factura_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddevolucion_facturaEliminarToolBar").css("display",devolucion_factura_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdevolucion_facturaElementos").css("display",devolucion_factura_control.strVisibleTablaElementos);
		
		jQuery("#trdevolucion_facturaAcciones").css("display",devolucion_factura_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_facturaParametrosAcciones").css("display",devolucion_factura_control.strVisibleTablaAcciones);
		
		jQuery("#tddevolucion_facturaCerrarPagina").css("display",devolucion_factura_control.strPermisoPopup);		
		jQuery("#tddevolucion_facturaCerrarPaginaToolBar").css("display",devolucion_factura_control.strPermisoPopup);
		//jQuery("#trdevolucion_facturaAccionesRelaciones").css("display",devolucion_factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=devolucion_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + devolucion_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Devolucion Facturas";
		sTituloBanner+=" - " + devolucion_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_factura_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddevolucion_facturaRelacionesToolBar").css("display",devolucion_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdevolucion_factura").css("display",devolucion_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		devolucion_factura_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		devolucion_factura_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_factura_webcontrol1.registrarEventosControles();
		
		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_factura_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(devolucion_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(devolucion_factura_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
						//devolucion_factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(devolucion_factura_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(devolucion_factura_constante1.BIG_ID_ACTUAL,"devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
						//devolucion_factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			devolucion_factura_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);	
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

var devolucion_factura_webcontrol1 = new devolucion_factura_webcontrol();

//Para ser llamado desde otro archivo (import)
export {devolucion_factura_webcontrol,devolucion_factura_webcontrol1};

//Para ser llamado desde window.opener
window.devolucion_factura_webcontrol1 = devolucion_factura_webcontrol1;


if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_factura_webcontrol1.onLoadWindow; 
}

//</script>