<script type="text/javascript" language="javascript">


class clientes_por_vendedor_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/




//---------- Clic-Nuevo --------------
	
	nuevoOnClick() {
		//super.procesarInicioProceso(clientes_por_vendedor_constante1);
	}
	
	nuevoOnComplete() {
		//super.procesarFinalizacionProceso(clientes_por_vendedor_constante1,"clientes_por_vendedor");
	}
	
	nuevoPrepararPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"clientes_por_vendedor");
		
		super.procesarInicioProceso(clientes_por_vendedor_constante1);
	}		
		
	nuevoPrepararPaginaFormOnComplete() {		
		super.procesarFinalizacionProceso(clientes_por_vendedor_constante1,"clientes_por_vendedor");
	}
	
	//---------- Clic-Seleccionar ----------

	seleccionarPaginaFormOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"clientes_por_vendedor");
		
		super.procesarInicioProceso(clientes_por_vendedor_constante1);
	}
	
	seleccionarPaginaFormOnComplete() {
		super.procesarFinalizacionProceso(clientes_por_vendedor_constante1,"clientes_por_vendedor");
	}
	
//------------- Clic-Actualizar -------------

	actualizarOnClick() {
		super.procesarInicioProceso(clientes_por_vendedor_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(clientes_por_vendedor_constante1.STR_ES_RELACIONES,clientes_por_vendedor_constante1.STR_ES_RELACIONADO,clientes_por_vendedor_constante1.STR_RELATIVE_PATH,"clientes_por_vendedor");		
		
		if(super.esPaginaForm(clientes_por_vendedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
//------------- Clic-Cancelar -------------------

	cancelarOnClick() {
		super.procesarInicioProceso(clientes_por_vendedor_constante1);
	}
	
	cancelarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"clientes_por_vendedor");
		
		super.procesarFinalizacionProceso(clientes_por_vendedor_constante1,"clientes_por_vendedor");
				
		if(super.esPaginaForm(clientes_por_vendedor_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
	
	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.hdnIdActual);
		jQuery('cmbclientes_por_vendedorid_vendedor').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtnombre_completo);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtdireccion);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txttelefono);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txte_mail);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtmaximo_credito);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtcodigovendedores);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtnombre);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtmonto);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtnumero);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txttermino);
		funcionGeneral.setEmptyControl(document.frmMantenimientoclientes_por_vendedor.txtfecha);	
	}

/*---------------------------------- AREA:FORMULARIO ----------------------*/

	validarFormularioParametrosNumeroRegistros() {
		var bitRetorno =true;
	
		var strNumeroRegistros=validacion.check_num(document.frmParamsBuscarclientes_por_vendedor.txtNumeroRegistrosclientes_por_vendedor,0,100,'n','n');
	
		if(strNumeroRegistros!="") {
			alert(constantes.STR_MENSAJE_VALIDACION_CAMPO+constantes.STR_MENSAJE_NUMERO_DEREGISTROS_DE+'clientes_por_vendedores',strNumeroRegistros,document.frmParamsBuscarclientes_por_vendedor.txtNumeroRegistrosclientes_por_vendedor);
			bitRetorno= false;
		}
	
		return bitRetorno;
	}
	
	//------------- Formulario-Archivos -------------------





//------------- Formulario-Validacion -------------------

	validarFormularioJQuery(clientes_por_vendedor_constante1) {
		
		//VALIDACION
		// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT		
		/*
		jQuery.validator.addMethod(
				"regexpStringMethod",
				function(value, element) {
					return value.match(constantes.STRREGX_STRING_GENERAL);
				},
				"Valor Incorrecto"
		);
		*/
		
		funcionGeneralJQuery.addValidacionesFuncionesGenerales();
		
		var arrRules=null;
		var arrRulesTotales=null;		
		
		
		if(clientes_por_vendedor_constante1.STR_SUFIJO=="") {
			
			arrRules= {
				
				rules: {
					
				"form-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form-nombre_completo": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form-direccion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-telefono": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form-maximo_credito": {
					required:true,
					number:true
				},
					
				"form-codigovendedores": {
					required:true,
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form-monto": {
					required:true,
					number:true
				},
					
				"form-numero": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-termino": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form-fecha": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre_completo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-codigovendedores": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-termino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	
		
			
			if(clientes_por_vendedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}
			
		} else {

			arrRules= {
				
				rules: {
					
				"form_clientes_por_vendedor-id_vendedor": {
					required:true,
					digits:true
					,min:0
				},
					
				"form_clientes_por_vendedor-codigo": {
					required:true,
					maxlength:20
					,regexpStringMethod:true
				},
					
				"form_clientes_por_vendedor-nombre_completo": {
					required:true,
					maxlength:80
					,regexpStringMethod:true
				},
					
				"form_clientes_por_vendedor-direccion": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_clientes_por_vendedor-telefono": {
					required:true,
					maxlength:20
					,regexpTelefonoMethod:true
				},
					
				"form_clientes_por_vendedor-e_mail": {
					required:true,
					maxlength:100
					,email:true
				},
					
				"form_clientes_por_vendedor-maximo_credito": {
					required:true,
					number:true
				},
					
				"form_clientes_por_vendedor-codigovendedores": {
					required:true,
					maxlength:6
					,regexpStringMethod:true
				},
					
				"form_clientes_por_vendedor-nombre": {
					required:true,
					maxlength:40
					,regexpStringMethod:true
				},
					
				"form_clientes_por_vendedor-monto": {
					required:true,
					number:true
				},
					
				"form_clientes_por_vendedor-numero": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_clientes_por_vendedor-termino": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				},
					
				"form_clientes_por_vendedor-fecha": {
					required:true,
					maxlength:150
					,regexpStringMethod:true
				}
				},
				
				messages: {
					"form_clientes_por_vendedor-id_vendedor": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_ENTERO_INCORRECTO,
					"form_clientes_por_vendedor-codigo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_clientes_por_vendedor-nombre_completo": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_clientes_por_vendedor-direccion": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_clientes_por_vendedor-telefono": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_FONO_INCORRECTO,
					"form_clientes_por_vendedor-e_mail": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_MAIL_INCORRECTO,
					"form_clientes_por_vendedor-maximo_credito": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_clientes_por_vendedor-codigovendedores": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_clientes_por_vendedor-nombre": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_clientes_por_vendedor-monto": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_DECIMAL_INCORRECTO,
					"form_clientes_por_vendedor-numero": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_clientes_por_vendedor-termino": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO,
					"form_clientes_por_vendedor-fecha": constantes.STR_MENSAJE_REQUERIDO+""+constantes.STR_MENSAJE_TEXTO_INCORRECTO
				}		
			};	



			if(clientes_por_vendedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
		
				arrRulesTotales= {
				
					rules: {
					},
					
					messages: {
					}
				};
			}	
		}		
				
		
		//DEBERIA SER MAS EXACTO, PERO FUNCIONA. (FORMULARIO SIN TOTALES Y FORMULARIO CON TOTALES)
		
		jQuery("#frmMantenimientoclientes_por_vendedor").validate(arrRules);
		
		if(clientes_por_vendedor_constante1.BIT_TIENE_CAMPOS_TOTALES==true) {
			jQuery("#frmMantenimientoTotalesclientes_por_vendedor").validate(arrRulesTotales);
		}
		
		
		
	}
/*---------------------------------- AREA:AUXILIAR ---------------------------*/
	
	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			clientes_por_vendedorFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"clientes_por_vendedor");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtnombre_completo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtdireccion,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txttelefono,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txte_mail,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtmaximo_credito,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtcodigovendedores,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtnombre,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtmonto,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtnumero,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txttermino,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtfecha,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtnombre_completo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtdireccion,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txttelefono,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txte_mail,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtmaximo_credito,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtcodigovendedores,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtnombre,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtmonto,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtnumero,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txttermino,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientoclientes_por_vendedor.txtfecha,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) {		
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,clientes_por_vendedor_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,clientes_por_vendedor_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"clientes_por_vendedor");		
	}

	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(clientes_por_vendedor_constante1.STR_RELATIVE_PATH,"clientes_por_vendedor");		
	}
	
	eliminarOnComplete() {
		super.resaltarRestaurarDivMantenimiento(false,"clientes_por_vendedor");
		
		super.procesarFinalizacionProceso(clientes_por_vendedor_constante1,"clientes_por_vendedor");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(clientes_por_vendedor_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(clientes_por_vendedor_constante1,"clientes_por_vendedor");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(clientes_por_vendedor_constante1,"clientes_por_vendedor");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"clientes_por_vendedor");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(clientes_por_vendedor_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(clientes_por_vendedor_constante1,"clientes_por_vendedor");
	}

	//------------- Formulario-Combo-Accion -------------------

	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,clientes_por_vendedor_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var clientes_por_vendedor_funcion1=new clientes_por_vendedor_funcion(); //var


</script>
