//<script type="text/javascript" language="javascript">


import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {termino_pago_cliente_constante,termino_pago_cliente_constante1} from '../util/termino_pago_cliente_constante.js';

class termino_pago_cliente_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(termino_pago_cliente_constante1.STR_RELATIVE_PATH,"termino_pago_cliente");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(termino_pago_cliente_constante1.STR_RELATIVE_PATH,termino_pago_cliente_constante1.STR_NOMBRE_OPCION,"termino_pago_cliente");		
	}	
	
//---------- Clic-Siguiente ----------

	siguientesOnClick() {
		this.procesarInicioBusqueda();
	}
		
	siguientesOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
//----------- Clic-Anteriores ---------

	anterioresOnClick() {
		this.procesarInicioBusqueda();
	}
	
	anterioresOnComplete() {
		this.procesarFinalizacionBusqueda();
	}

//---------- Clic-Seleccionar ----------

	seleccionarOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"termino_pago_cliente");
		
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
		
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() {
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("termino_pago_cliente",this,termino_pago_cliente_constante1);
	}
	
//---------- Clic-Reporte ----------------

	generarReporteOnClick() {
		this.generarReporteInicio();
	}
		
	generarReporteOnComplete() {
		this.generarReporteFinalizacion();
	}
	
	generarReporteInicio() {
		funcionGeneral.mostrarOcultarProcesando(true,null);
	}	
	
	generarReporteFinalizacion() {
		funcionGeneral.generarReporteFinalizacion(termino_pago_cliente_constante1.STR_RELATIVE_PATH,termino_pago_cliente_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"termino_pago_cliente");		
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(termino_pago_cliente_control,termino_pago_cliente_webcontrol1,termino_pago_cliente_constante1) {
		
		var strSuf=termino_pago_cliente_constante1.STR_SUFIJO;
		
		var maxima_fila = jQuery("#t"+strSuf+"-maxima_fila").val();
		var control_name="";
		var control_name_id="";
		var idActual="";
		
		//VALIDACION
		var strRules="";
		var strRulesMessage="";
		var strRulesTotal="";
		
		strRules="{\r\nrules: {";
		strRulesMessage=",messages: {\r\n";
		
		var esPrimerRule=true;
		//VALIDACION
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				/*		
				control_name="t-cel_"+i+"_8";							
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd' });							
				alert(jQuery("#"+control_name).val());
				*/
				
				//ADD CONTROLES FECHA-HORA
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();

					termino_pago_cliente_webcontrol1.registrarComboActionChangeid_tipo_termino_pago(control_name,true,i);
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_12";
					jQuery("#"+control_name).select2();
				}

				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:4';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:40';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:20';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_4";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_7";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_12";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_13";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(termino_pago_cliente_control.idempresaDefaultForeignKey!=null && termino_pago_cliente_control.idempresaDefaultForeignKey>-1) {
					idActual=termino_pago_cliente_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					termino_pago_cliente_webcontrol1.cargarComboEditarTablaempresaFK(termino_pago_cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						termino_pago_cliente_webcontrol1.cargarComboEditarTablaempresaFK(termino_pago_cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(termino_pago_cliente_control.idtipo_termino_pagoDefaultForeignKey!=null && termino_pago_cliente_control.idtipo_termino_pagoDefaultForeignKey>-1) {
					idActual=termino_pago_cliente_control.idtipo_termino_pagoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					termino_pago_cliente_webcontrol1.cargarComboEditarTablatipo_termino_pagoFK(termino_pago_cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						termino_pago_cliente_webcontrol1.cargarComboEditarTablatipo_termino_pagoFK(termino_pago_cliente_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_12";
				idActual=jQuery("#"+control_name).val();

				if(termino_pago_cliente_control.idcuentaDefaultForeignKey!=null && termino_pago_cliente_control.idcuentaDefaultForeignKey>-1) {
					idActual=termino_pago_cliente_control.idcuentaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					termino_pago_cliente_webcontrol1.cargarComboEditarTablacuentaFK(termino_pago_cliente_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						termino_pago_cliente_webcontrol1.cargarComboEditarTablacuentaFK(termino_pago_cliente_control,control_name,idActual,true);
					}
				});
				//FK CHECKBOX EVENTOS FIN
			}					
		}
		
		
		//VALIDACION
		strRules=strRules+'\r\n}\r\n';
		strRulesMessage=strRulesMessage+'\r\n}\r\n}';		
		strRulesTotal=strRules + strRulesMessage;
		
		var json_rules = {};
		
		//alert(strRulesTotal);		
		
		json_rules = eval ('(' + strRulesTotal + ')');				
						
		//alert(json_rules);
		
		jQuery("#frmTablaDatostermino_pago_cliente").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"termino_pago_cliente");
		
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(termino_pago_cliente_constante1.STR_RELATIVE_PATH,"termino_pago_cliente");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(termino_pago_cliente_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(termino_pago_cliente_constante1,"termino_pago_cliente");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"termino_pago_cliente");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(termino_pago_cliente_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(termino_pago_cliente_constante1,"termino_pago_cliente");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="VersionRow") {
				jQuery(".col_version_row").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Tipo Termino Pago") {
				jQuery(".col_id_tipo_termino_pago").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_termino_pago_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_termino_pago_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Monto") {
				jQuery(".col_monto").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Dias") {
				jQuery(".col_dias").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Inicial") {
				jQuery(".col_inicial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuotas") {
				jQuery(".col_cuotas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descuento Pronto Pago") {
				jQuery(".col_descuento_pronto_pago").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Predeterminado") {
				jQuery(".col_predeterminado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Cuenta") {
				jQuery(".col_id_cuenta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Contable") {
				jQuery(".col_cuenta_contable").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,termino_pago_cliente_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			termino_pago_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="consignacion" || strValueTipoRelacion=="Consignacion") {
			termino_pago_cliente_webcontrol1.registrarSesionParaconsignaciones(idActual);
		}
		else if(strValueTipoRelacion=="cuenta_cobrar" || strValueTipoRelacion=="Cuenta Cobrar") {
			termino_pago_cliente_webcontrol1.registrarSesionParacuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="debito_cuenta_cobrar" || strValueTipoRelacion=="Debito Cuenta Cobrar") {
			termino_pago_cliente_webcontrol1.registrarSesionParadebito_cuenta_cobrars(idActual);
		}
		else if(strValueTipoRelacion=="devolucion_factura" || strValueTipoRelacion=="Devolucion Factura") {
			termino_pago_cliente_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		}
		else if(strValueTipoRelacion=="estimado" || strValueTipoRelacion=="Estimado") {
			termino_pago_cliente_webcontrol1.registrarSesionParaestimados(idActual);
		}
		else if(strValueTipoRelacion=="factura_lote" || strValueTipoRelacion=="Facturas Lotes") {
			termino_pago_cliente_webcontrol1.registrarSesionParafactura_lotees(idActual);
		}
		else if(strValueTipoRelacion=="factura" || strValueTipoRelacion=="Factura") {
			termino_pago_cliente_webcontrol1.registrarSesionParafacturas(idActual);
		}
		else if(strValueTipoRelacion=="parametro_facturacion" || strValueTipoRelacion=="Parametro Facturacion") {
			termino_pago_cliente_webcontrol1.registrarSesionParaparametro_facturacions(idActual);
		}
	}
	
	
	
}

var termino_pago_cliente_funcion1=new termino_pago_cliente_funcion(); //var

//Para ser llamado desde otro archivo (import)
export {termino_pago_cliente_funcion,termino_pago_cliente_funcion1};

//Para ser llamado desde window.opener
window.termino_pago_cliente_funcion1 = termino_pago_cliente_funcion1;



//</script>
