//<script type="text/javascript" language="javascript">



//var proveedorJQueryPaginaWebInteraccion= function (proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {proveedor_constante,proveedor_constante1} from '../util/proveedor_constante.js';

import {proveedor_funcion,proveedor_funcion1} from '../util/proveedor_form_funcion.js';


class proveedor_webcontrol extends GeneralEntityWebControl {
	
	proveedor_control=null;
	proveedor_controlInicial=null;
	proveedor_controlAuxiliar=null;
		
	//if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(proveedor_control) {
		super();
		
		this.proveedor_control=proveedor_control;
	}
		
	actualizarVariablesPagina(proveedor_control) {
		
		if(proveedor_control.action=="index" || proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(proveedor_control);
			
		} 
		
		
		
	
		else if(proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(proveedor_control);	
		
		} else if(proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(proveedor_control);		
		}
	
		else if(proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(proveedor_control);		
		}
	
		else if(proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(proveedor_control);
		}
		
		
		else if(proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(proveedor_control);
		
		} else if(proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(proveedor_control);
		
		} else if(proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(proveedor_control);
		
		} else if(proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(proveedor_control);
		
		} else if(proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(proveedor_control);		
		
		} else if(proveedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(proveedor_control);		
		
		} 
		//else if(proveedor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(proveedor_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(proveedor_control) {
		this.actualizarPaginaAccionesGenerales(proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(proveedor_control);
		this.actualizarPaginaOrderBy(proveedor_control);
		this.actualizarPaginaTablaDatos(proveedor_control);
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(proveedor_control);
		this.actualizarPaginaAreaBusquedas(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(proveedor_control) {
		//this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(proveedor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(proveedor_control);		
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(proveedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(proveedor_control);
		this.actualizarPaginaCargaCombosFK(proveedor_control);
		this.actualizarPaginaFormulario(proveedor_control);
		this.onLoadCombosDefectoFK(proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(proveedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(proveedor_control) {
		//FORMULARIO
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);		
		
		//COMBOS FK
		if(proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(proveedor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(proveedor_control) {
		//FORMULARIO
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);	
		
		//COMBOS FK
		if(proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(proveedor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(proveedor_control) {
		//FORMULARIO
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(proveedor_control);	
		//COMBOS FK
		if(proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(proveedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(proveedor_control) {
		
		if(proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(proveedor_control);
		}
		
		if(proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(proveedor_control) {
		if(proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("proveedorReturnGeneral",JSON.stringify(proveedor_control.proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(proveedor_control) {
		if(proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(proveedor_control, mostrar) {
		
		if(mostrar==true) {
			proveedor_funcion1.resaltarRestaurarDivsPagina(false,"proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"proveedor");
			}			
			
			proveedor_funcion1.mostrarDivMensaje(true,proveedor_control.strAuxiliarMensaje,proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			proveedor_funcion1.mostrarDivMensaje(false,proveedor_control.strAuxiliarMensaje,proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(proveedor_control) {
		if(proveedor_funcion1.esPaginaForm(proveedor_constante1)==true) {
			window.opener.proveedor_webcontrol1.actualizarPaginaTablaDatos(proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(proveedor_control) {
		proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(proveedor_control.strAuxiliarUrlPagina);
				
		proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(proveedor_control.strAuxiliarTipo,proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(proveedor_control) {
		proveedor_funcion1.resaltarRestaurarDivMensaje(true,proveedor_control.strAuxiliarMensajeAlert,proveedor_control.strAuxiliarCssMensaje);
			
		if(proveedor_funcion1.esPaginaForm(proveedor_constante1)==true) {
			window.opener.proveedor_funcion1.resaltarRestaurarDivMensaje(true,proveedor_control.strAuxiliarMensajeAlert,proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(proveedor_control) {
		this.proveedor_controlInicial=proveedor_control;
			
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(proveedor_control.strStyleDivArbol,proveedor_control.strStyleDivContent
																,proveedor_control.strStyleDivOpcionesBanner,proveedor_control.strStyleDivExpandirColapsar
																,proveedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(proveedor_control) {
		this.actualizarCssBotonesPagina(proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(proveedor_control.tiposReportes,proveedor_control.tiposReporte
															 	,proveedor_control.tiposPaginacion,proveedor_control.tiposAcciones
																,proveedor_control.tiposColumnasSelect,proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(proveedor_control.tiposRelaciones,proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(proveedor_control) {
	
		var indexPosition=proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosempresasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombostipo_personasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarComboscategoria_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosgiro_negocio_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombospaissFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosprovinciasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosciudadsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosvendedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombostermino_pago_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarComboscuentasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosimpuestosFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosretencionsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosretencion_fuentesFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosretencion_icasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.cargarCombosotro_impuestosFK(proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(proveedor_control.strRecargarFkTiposNinguno!=null && proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosempresasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombostipo_personasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarComboscategoria_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosgiro_negocio_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombospaissFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosprovinciasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosciudadsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosvendedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombostermino_pago_proveedorsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarComboscuentasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosimpuestosFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosretencionsFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosretencion_fuentesFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosretencion_icasFK(proveedor_control);
				}

				if(proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTiposNinguno,",")) { 
					proveedor_webcontrol1.cargarCombosotro_impuestosFK(proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.empresasFK);
	}

	cargarComboEditarTablatipo_personaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.tipo_personasFK);
	}

	cargarComboEditarTablacategoria_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.categoria_proveedorsFK);
	}

	cargarComboEditarTablagiro_negocio_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.giro_negocio_proveedorsFK);
	}

	cargarComboEditarTablapaisFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.paissFK);
	}

	cargarComboEditarTablaprovinciaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.provinciasFK);
	}

	cargarComboEditarTablaciudadFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.ciudadsFK);
	}

	cargarComboEditarTablavendedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablacuentaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.cuentasFK);
	}

	cargarComboEditarTablaimpuestoFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.impuestosFK);
	}

	cargarComboEditarTablaretencionFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.retencionsFK);
	}

	cargarComboEditarTablaretencion_fuenteFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.retencion_fuentesFK);
	}

	cargarComboEditarTablaretencion_icaFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.retencion_icasFK);
	}

	cargarComboEditarTablaotro_impuestoFK(proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,proveedor_funcion1,proveedor_control.otro_impuestosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(proveedor_control) {
		jQuery("#tdproveedorNuevo").css("display",proveedor_control.strPermisoNuevo);
		jQuery("#trproveedorElementos").css("display",proveedor_control.strVisibleTablaElementos);
		jQuery("#trproveedorAcciones").css("display",proveedor_control.strVisibleTablaAcciones);
		jQuery("#trproveedorParametrosAcciones").css("display",proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(proveedor_control);
				
		if(proveedor_control.proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(proveedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(proveedor_control) {
	
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id").val(proveedor_control.proveedorActual.id);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-version_row").val(proveedor_control.proveedorActual.versionRow);
		
		if(proveedor_control.proveedorActual.id_empresa!=null && proveedor_control.proveedorActual.id_empresa>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != proveedor_control.proveedorActual.id_empresa) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val(proveedor_control.proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_tipo_persona!=null && proveedor_control.proveedorActual.id_tipo_persona>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val() != proveedor_control.proveedorActual.id_tipo_persona) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val(proveedor_control.proveedorActual.id_tipo_persona).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_categoria_proveedor!=null && proveedor_control.proveedorActual.id_categoria_proveedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val() != proveedor_control.proveedorActual.id_categoria_proveedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val(proveedor_control.proveedorActual.id_categoria_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_giro_negocio_proveedor!=null && proveedor_control.proveedorActual.id_giro_negocio_proveedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val() != proveedor_control.proveedorActual.id_giro_negocio_proveedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val(proveedor_control.proveedorActual.id_giro_negocio_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-codigo").val(proveedor_control.proveedorActual.codigo);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-ruc").val(proveedor_control.proveedorActual.ruc);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-primer_apellido").val(proveedor_control.proveedorActual.primer_apellido);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-segundo_apellido").val(proveedor_control.proveedorActual.segundo_apellido);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-primer_nombre").val(proveedor_control.proveedorActual.primer_nombre);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-segundo_nombre").val(proveedor_control.proveedorActual.segundo_nombre);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-nombre_completo").val(proveedor_control.proveedorActual.nombre_completo);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-direccion").val(proveedor_control.proveedorActual.direccion);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-telefono").val(proveedor_control.proveedorActual.telefono);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-telefono_movil").val(proveedor_control.proveedorActual.telefono_movil);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-e_mail").val(proveedor_control.proveedorActual.e_mail);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-e_mail2").val(proveedor_control.proveedorActual.e_mail2);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-comentario").val(proveedor_control.proveedorActual.comentario);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-imagen").val(proveedor_control.proveedorActual.imagen);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-activo").prop('checked',proveedor_control.proveedorActual.activo);
		
		if(proveedor_control.proveedorActual.id_pais!=null && proveedor_control.proveedorActual.id_pais>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val() != proveedor_control.proveedorActual.id_pais) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val(proveedor_control.proveedorActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_provincia!=null && proveedor_control.proveedorActual.id_provincia>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val() != proveedor_control.proveedorActual.id_provincia) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val(proveedor_control.proveedorActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_ciudad!=null && proveedor_control.proveedorActual.id_ciudad>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val() != proveedor_control.proveedorActual.id_ciudad) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val(proveedor_control.proveedorActual.id_ciudad).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-codigo_postal").val(proveedor_control.proveedorActual.codigo_postal);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-fax").val(proveedor_control.proveedorActual.fax);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-contacto").val(proveedor_control.proveedorActual.contacto);
		
		if(proveedor_control.proveedorActual.id_vendedor!=null && proveedor_control.proveedorActual.id_vendedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val() != proveedor_control.proveedorActual.id_vendedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val(proveedor_control.proveedorActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-maximo_credito").val(proveedor_control.proveedorActual.maximo_credito);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-maximo_descuento").val(proveedor_control.proveedorActual.maximo_descuento);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-interes_anual").val(proveedor_control.proveedorActual.interes_anual);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-balance").val(proveedor_control.proveedorActual.balance);
		
		if(proveedor_control.proveedorActual.id_termino_pago_proveedor!=null && proveedor_control.proveedorActual.id_termino_pago_proveedor>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != proveedor_control.proveedorActual.id_termino_pago_proveedor) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(proveedor_control.proveedorActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(proveedor_control.proveedorActual.id_cuenta!=null && proveedor_control.proveedorActual.id_cuenta>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != proveedor_control.proveedorActual.id_cuenta) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(proveedor_control.proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_impuesto_compras").prop('checked',proveedor_control.proveedorActual.aplica_impuesto_compras);
		
		if(proveedor_control.proveedorActual.id_impuesto!=null && proveedor_control.proveedorActual.id_impuesto>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val() != proveedor_control.proveedorActual.id_impuesto) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val(proveedor_control.proveedorActual.id_impuesto).trigger("change");
			}
		} else { 
			//jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").select2("val", null);
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_retencion_impuesto").prop('checked',proveedor_control.proveedorActual.aplica_retencion_impuesto);
		
		if(proveedor_control.proveedorActual.id_retencion!=null && proveedor_control.proveedorActual.id_retencion>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val() != proveedor_control.proveedorActual.id_retencion) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val(proveedor_control.proveedorActual.id_retencion).trigger("change");
			}
		} else { 
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_retencion_fuente").prop('checked',proveedor_control.proveedorActual.aplica_retencion_fuente);
		
		if(proveedor_control.proveedorActual.id_retencion_fuente!=null && proveedor_control.proveedorActual.id_retencion_fuente>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val() != proveedor_control.proveedorActual.id_retencion_fuente) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val(proveedor_control.proveedorActual.id_retencion_fuente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_retencion_ica").prop('checked',proveedor_control.proveedorActual.aplica_retencion_ica);
		
		if(proveedor_control.proveedorActual.id_retencion_ica!=null && proveedor_control.proveedorActual.id_retencion_ica>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val() != proveedor_control.proveedorActual.id_retencion_ica) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val(proveedor_control.proveedorActual.id_retencion_ica).trigger("change");
			}
		} else { 
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-aplica_2do_impuesto").prop('checked',proveedor_control.proveedorActual.aplica_2do_impuesto);
		
		if(proveedor_control.proveedorActual.id_otro_impuesto!=null && proveedor_control.proveedorActual.id_otro_impuesto>-1){
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != proveedor_control.proveedorActual.id_otro_impuesto) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val(proveedor_control.proveedorActual.id_otro_impuesto).trigger("change");
			}
		} else { 
			if(jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-creado").val(proveedor_control.proveedorActual.creado);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-monto_ultima_transaccion").val(proveedor_control.proveedorActual.monto_ultima_transaccion);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-fecha_ultima_transaccion").val(proveedor_control.proveedorActual.fecha_ultima_transaccion);
		jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-descripcion_ultima_transaccion").val(proveedor_control.proveedorActual.descripcion_ultima_transaccion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("proveedor","cuentaspagar","","form_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	actualizarSpanMensajesCampos(proveedor_control) {
		jQuery("#spanstrMensajeid").text(proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(proveedor_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_persona").text(proveedor_control.strMensajeid_tipo_persona);		
		jQuery("#spanstrMensajeid_categoria_proveedor").text(proveedor_control.strMensajeid_categoria_proveedor);		
		jQuery("#spanstrMensajeid_giro_negocio_proveedor").text(proveedor_control.strMensajeid_giro_negocio_proveedor);		
		jQuery("#spanstrMensajecodigo").text(proveedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajeruc").text(proveedor_control.strMensajeruc);		
		jQuery("#spanstrMensajeprimer_apellido").text(proveedor_control.strMensajeprimer_apellido);		
		jQuery("#spanstrMensajesegundo_apellido").text(proveedor_control.strMensajesegundo_apellido);		
		jQuery("#spanstrMensajeprimer_nombre").text(proveedor_control.strMensajeprimer_nombre);		
		jQuery("#spanstrMensajesegundo_nombre").text(proveedor_control.strMensajesegundo_nombre);		
		jQuery("#spanstrMensajenombre_completo").text(proveedor_control.strMensajenombre_completo);		
		jQuery("#spanstrMensajedireccion").text(proveedor_control.strMensajedireccion);		
		jQuery("#spanstrMensajetelefono").text(proveedor_control.strMensajetelefono);		
		jQuery("#spanstrMensajetelefono_movil").text(proveedor_control.strMensajetelefono_movil);		
		jQuery("#spanstrMensajee_mail").text(proveedor_control.strMensajee_mail);		
		jQuery("#spanstrMensajee_mail2").text(proveedor_control.strMensajee_mail2);		
		jQuery("#spanstrMensajecomentario").text(proveedor_control.strMensajecomentario);		
		jQuery("#spanstrMensajeimagen").text(proveedor_control.strMensajeimagen);		
		jQuery("#spanstrMensajeactivo").text(proveedor_control.strMensajeactivo);		
		jQuery("#spanstrMensajeid_pais").text(proveedor_control.strMensajeid_pais);		
		jQuery("#spanstrMensajeid_provincia").text(proveedor_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajeid_ciudad").text(proveedor_control.strMensajeid_ciudad);		
		jQuery("#spanstrMensajecodigo_postal").text(proveedor_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajefax").text(proveedor_control.strMensajefax);		
		jQuery("#spanstrMensajecontacto").text(proveedor_control.strMensajecontacto);		
		jQuery("#spanstrMensajeid_vendedor").text(proveedor_control.strMensajeid_vendedor);		
		jQuery("#spanstrMensajemaximo_credito").text(proveedor_control.strMensajemaximo_credito);		
		jQuery("#spanstrMensajemaximo_descuento").text(proveedor_control.strMensajemaximo_descuento);		
		jQuery("#spanstrMensajeinteres_anual").text(proveedor_control.strMensajeinteres_anual);		
		jQuery("#spanstrMensajebalance").text(proveedor_control.strMensajebalance);		
		jQuery("#spanstrMensajeid_termino_pago_proveedor").text(proveedor_control.strMensajeid_termino_pago_proveedor);		
		jQuery("#spanstrMensajeid_cuenta").text(proveedor_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeaplica_impuesto_compras").text(proveedor_control.strMensajeaplica_impuesto_compras);		
		jQuery("#spanstrMensajeid_impuesto").text(proveedor_control.strMensajeid_impuesto);		
		jQuery("#spanstrMensajeaplica_retencion_impuesto").text(proveedor_control.strMensajeaplica_retencion_impuesto);		
		jQuery("#spanstrMensajeid_retencion").text(proveedor_control.strMensajeid_retencion);		
		jQuery("#spanstrMensajeaplica_retencion_fuente").text(proveedor_control.strMensajeaplica_retencion_fuente);		
		jQuery("#spanstrMensajeid_retencion_fuente").text(proveedor_control.strMensajeid_retencion_fuente);		
		jQuery("#spanstrMensajeaplica_retencion_ica").text(proveedor_control.strMensajeaplica_retencion_ica);		
		jQuery("#spanstrMensajeid_retencion_ica").text(proveedor_control.strMensajeid_retencion_ica);		
		jQuery("#spanstrMensajeaplica_2do_impuesto").text(proveedor_control.strMensajeaplica_2do_impuesto);		
		jQuery("#spanstrMensajeid_otro_impuesto").text(proveedor_control.strMensajeid_otro_impuesto);		
		jQuery("#spanstrMensajecreado").text(proveedor_control.strMensajecreado);		
		jQuery("#spanstrMensajemonto_ultima_transaccion").text(proveedor_control.strMensajemonto_ultima_transaccion);		
		jQuery("#spanstrMensajefecha_ultima_transaccion").text(proveedor_control.strMensajefecha_ultima_transaccion);		
		jQuery("#spanstrMensajedescripcion_ultima_transaccion").text(proveedor_control.strMensajedescripcion_ultima_transaccion);		
	}
	
	actualizarCssBotonesMantenimiento(proveedor_control) {
		jQuery("#tdbtnNuevoproveedor").css("visibility",proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoproveedor").css("display",proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarproveedor").css("visibility",proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarproveedor").css("display",proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarproveedor").css("visibility",proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarproveedor").css("display",proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarproveedor").css("visibility",proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosproveedor").css("visibility",proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosproveedor").css("display",proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarproveedor").css("visibility",proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarproveedor").css("visibility",proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarproveedor").css("visibility",proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa",proveedor_control.empresasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_2",proveedor_control.empresasFK);
		}
	};

	cargarCombostipo_personasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona",proveedor_control.tipo_personasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_3",proveedor_control.tipo_personasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona",proveedor_control.tipo_personasFK);

	};

	cargarComboscategoria_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor",proveedor_control.categoria_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_4",proveedor_control.categoria_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor",proveedor_control.categoria_proveedorsFK);

	};

	cargarCombosgiro_negocio_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor",proveedor_control.giro_negocio_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_5",proveedor_control.giro_negocio_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor",proveedor_control.giro_negocio_proveedorsFK);

	};

	cargarCombospaissFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais",proveedor_control.paissFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_21",proveedor_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",proveedor_control.paissFK);

	};

	cargarCombosprovinciasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia",proveedor_control.provinciasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_22",proveedor_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",proveedor_control.provinciasFK);

	};

	cargarCombosciudadsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad",proveedor_control.ciudadsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_23",proveedor_control.ciudadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad",proveedor_control.ciudadsFK);

	};

	cargarCombosvendedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor",proveedor_control.vendedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_27",proveedor_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",proveedor_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",proveedor_control.termino_pago_proveedorsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_32",proveedor_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor",proveedor_control.termino_pago_proveedorsFK);

	};

	cargarComboscuentasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta",proveedor_control.cuentasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_33",proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",proveedor_control.cuentasFK);

	};

	cargarCombosimpuestosFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto",proveedor_control.impuestosFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_35",proveedor_control.impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto",proveedor_control.impuestosFK);

	};

	cargarCombosretencionsFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion",proveedor_control.retencionsFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_37",proveedor_control.retencionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion",proveedor_control.retencionsFK);

	};

	cargarCombosretencion_fuentesFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente",proveedor_control.retencion_fuentesFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_39",proveedor_control.retencion_fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente",proveedor_control.retencion_fuentesFK);

	};

	cargarCombosretencion_icasFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica",proveedor_control.retencion_icasFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_41",proveedor_control.retencion_icasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica",proveedor_control.retencion_icasFK);

	};

	cargarCombosotro_impuestosFK(proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto",proveedor_control.otro_impuestosFK);

		if(proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+proveedor_control.idFilaTablaActual+"_43",proveedor_control.otro_impuestosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto",proveedor_control.otro_impuestosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(proveedor_control) {

	};

	registrarComboActionChangeCombostipo_personasFK(proveedor_control) {

	};

	registrarComboActionChangeComboscategoria_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosgiro_negocio_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombospaissFK(proveedor_control) {

	};

	registrarComboActionChangeCombosprovinciasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosciudadsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(proveedor_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(proveedor_control) {

	};

	registrarComboActionChangeComboscuentasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosimpuestosFK(proveedor_control) {

	};

	registrarComboActionChangeCombosretencionsFK(proveedor_control) {

	};

	registrarComboActionChangeCombosretencion_fuentesFK(proveedor_control) {

	};

	registrarComboActionChangeCombosretencion_icasFK(proveedor_control) {

	};

	registrarComboActionChangeCombosotro_impuestosFK(proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa").val(proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_personasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idtipo_personaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val() != proveedor_control.idtipo_personaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona").val(proveedor_control.idtipo_personaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(proveedor_control.idtipo_personaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtipo_persona-cmbid_tipo_persona").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idcategoria_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val() != proveedor_control.idcategoria_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor").val(proveedor_control.idcategoria_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val(proveedor_control.idcategoria_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcategoria_proveedor-cmbid_categoria_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgiro_negocio_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idgiro_negocio_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val() != proveedor_control.idgiro_negocio_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor").val(proveedor_control.idgiro_negocio_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val(proveedor_control.idgiro_negocio_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idgiro_negocio_proveedor-cmbid_giro_negocio_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idpaisDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val() != proveedor_control.idpaisDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais").val(proveedor_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(proveedor_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosprovinciasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idprovinciaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val() != proveedor_control.idprovinciaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia").val(proveedor_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(proveedor_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosciudadsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idciudadDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val() != proveedor_control.idciudadDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad").val(proveedor_control.idciudadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(proveedor_control.idciudadDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idciudad-cmbid_ciudad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idvendedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val() != proveedor_control.idvendedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor").val(proveedor_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(proveedor_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != proveedor_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(proveedor_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(proveedor_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosimpuestosFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idimpuestoDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val() != proveedor_control.idimpuestoDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto").val(proveedor_control.idimpuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(proveedor_control.idimpuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idimpuesto-cmbid_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencionsFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idretencionDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val() != proveedor_control.idretencionDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion").val(proveedor_control.idretencionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(proveedor_control.idretencionDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion-cmbid_retencion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_fuentesFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idretencion_fuenteDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val() != proveedor_control.idretencion_fuenteDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente").val(proveedor_control.idretencion_fuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(proveedor_control.idretencion_fuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_fuente-cmbid_retencion_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosretencion_icasFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idretencion_icaDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val() != proveedor_control.idretencion_icaDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica").val(proveedor_control.idretencion_icaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(proveedor_control.idretencion_icaDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idretencion_ica-cmbid_retencion_ica").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_impuestosFK(proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(proveedor_control.idotro_impuestoDefaultFK>-1 && jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val() != proveedor_control.idotro_impuestoDefaultFK) {
				jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto").val(proveedor_control.idotro_impuestoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(proveedor_control.idotro_impuestoDefaultForeignKey).trigger("change");
			if(jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+proveedor_constante1.STR_SUFIJO+"FK_Idotro_impuesto-cmbid_otro_impuesto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosempresasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombostipo_personasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorComboscategoria_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosgiro_negocio_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombospaissFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosprovinciasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosciudadsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosvendedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorComboscuentasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosimpuestosFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosretencionsFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosretencion_fuentesFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosretencion_icasFK(proveedor_control);
			}

			if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTipos,",")) { 
				proveedor_webcontrol1.setDefectoValorCombosotro_impuestosFK(proveedor_control);
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
	onLoadCombosEventosFK(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_persona",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombostipo_personasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeComboscategoria_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_giro_negocio_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosgiro_negocio_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombospaissFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosprovinciasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ciudad",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosciudadsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosvendedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_impuesto",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosimpuestosFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosretencionsFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_fuente",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosretencion_fuentesFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_retencion_ica",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosretencion_icasFK(proveedor_control);
			//}

			//if(proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_impuesto",proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				proveedor_webcontrol1.registrarComboActionChangeCombosotro_impuestosFK(proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				proveedor_funcion1.validarFormularioJQuery(proveedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(proveedor_funcion1,proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(proveedor_funcion1,proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,"proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_persona","id_tipo_persona","general","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_tipo_persona_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParatipo_persona("id_tipo_persona");
				//alert(jQuery('#form-id_tipo_persona_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_proveedor","id_categoria_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_categoria_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParacategoria_proveedor("id_categoria_proveedor");
				//alert(jQuery('#form-id_categoria_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("giro_negocio_proveedor","id_giro_negocio_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_giro_negocio_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParagiro_negocio_proveedor("id_giro_negocio_proveedor");
				//alert(jQuery('#form-id_giro_negocio_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ciudad","id_ciudad","seguridad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_ciudad_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaciudad("id_ciudad");
				//alert(jQuery('#form-id_ciudad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("impuesto","id_impuesto","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_impuesto_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaimpuesto("id_impuesto");
				//alert(jQuery('#form-id_impuesto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion","id_retencion","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaPararetencion("id_retencion");
				//alert(jQuery('#form-id_retencion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_fuente","id_retencion_fuente","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_fuente_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaPararetencion_fuente("id_retencion_fuente");
				//alert(jQuery('#form-id_retencion_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("retencion_ica","id_retencion_ica","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_retencion_ica_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaPararetencion_ica("id_retencion_ica");
				//alert(jQuery('#form-id_retencion_ica_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_impuesto","id_otro_impuesto","facturacion","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+proveedor_constante1.STR_SUFIJO+"-id_otro_impuesto_img_busqueda").click(function(){
				proveedor_webcontrol1.abrirBusquedaParaotro_impuesto("id_otro_impuesto");
				//alert(jQuery('#form-id_otro_impuesto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(proveedor_control) {
		
		
		
		if(proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdproveedorActualizarToolBar").css("display",proveedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdproveedorEliminarToolBar").css("display",proveedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trproveedorElementos").css("display",proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trproveedorAcciones").css("display",proveedor_control.strVisibleTablaAcciones);
		jQuery("#trproveedorParametrosAcciones").css("display",proveedor_control.strVisibleTablaAcciones);
		
		jQuery("#tdproveedorCerrarPagina").css("display",proveedor_control.strPermisoPopup);		
		jQuery("#tdproveedorCerrarPaginaToolBar").css("display",proveedor_control.strPermisoPopup);
		//jQuery("#trproveedorAccionesRelaciones").css("display",proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Proveedores";
		sTituloBanner+=" - " + proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdproveedorRelacionesToolBar").css("display",proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosproveedor").css("display",proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		proveedor_webcontrol1.registrarEventosControles();
		
		if(proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
			proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
						//proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(proveedor_constante1.BIG_ID_ACTUAL,"proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);
						//proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("proveedor","cuentaspagar","",proveedor_funcion1,proveedor_webcontrol1,proveedor_constante1);	
	}
}

var proveedor_webcontrol1 = new proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {proveedor_webcontrol,proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.proveedor_webcontrol1 = proveedor_webcontrol1;


if(proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = proveedor_webcontrol1.onLoadWindow; 
}

//</script>