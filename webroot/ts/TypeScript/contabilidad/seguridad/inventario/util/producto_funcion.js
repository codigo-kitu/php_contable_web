//<script type="text/javascript" language="javascript">


import {producto_constante,producto_constante1} from '../util/producto_constante.js';

class producto_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(producto_constante1.STR_RELATIVE_PATH,"producto");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(producto_constante1.STR_RELATIVE_PATH,producto_constante1.STR_NOMBRE_OPCION,"producto");		
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
		super.resaltarRestaurarDivMantenimiento(true,"producto");
		
		super.procesarInicioProceso(producto_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	
	
	seleccionarMostrarDivAccionesRelacionesActualOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}
		
	seleccionarMostrarDivAccionesRelacionesActualOnComplete() {
		funcionGeneral.seleccionarMostrarDivAccionesRelacionesActualOnComplete("producto",this,producto_constante1);
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
		funcionGeneral.generarReporteFinalizacion(producto_constante1.STR_RELATIVE_PATH,producto_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"producto");		
		super.procesarInicioProceso(producto_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(producto_control,producto_webcontrol1,producto_constante1) {
		
		var strSuf=producto_constante1.STR_SUFIJO;
		
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
				

				control_name="t"+strSuf+"-cel_"+i+"_42";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });

				control_name="t"+strSuf+"-cel_"+i+"_43";
				jQuery("#"+control_name).datepicker({ dateFormat: 'yy-mm-dd',minDate:-1,maxDate:-2 });
				//ADD CONTROLES FECHA-HORA FIN
				
				//FK
				
				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_2";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_3";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_8";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_10";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_11";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_16";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_17";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_18";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_19";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_21";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_37";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_38";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_39";
					jQuery("#"+control_name).select2();
				}

				if(constantes.STR_TIPO_COMBO=="select2") {
					control_name="t"+strSuf+"-cel_"+i+"_44";
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
					strRules=strRules+'\r\nmaxlength:26';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_5";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:70';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_6";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
					strRules=strRules+'\r\n,min:0';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nmaxlength:24';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nnumber:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndate:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\ndigits:true';
				strRules=strRules+'\r\n';
				strRules=strRules+'\r\n},';

				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\ndigits:true';
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
				
				
				control_name="t"+strSuf+"-cel_"+i+"_8";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_9";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_10";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_11";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_16";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_17";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_18";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_19";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_20";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_21";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_22";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_23";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_24";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_25";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				
				control_name="t"+strSuf+"-cel_"+i+"_27";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_28";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_29";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_30";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				
				
				
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_37";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_38";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_39";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_40";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_DECIMAL_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_41";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_42";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_43";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_FECHA_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_44";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
				
				
				
				control_name="t"+strSuf+"-cel_"+i+"_47";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_ENTERO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				


				control_name="t"+strSuf+"-cel_"+i+"_2";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idempresaDefaultForeignKey!=null && producto_control.idempresaDefaultForeignKey>-1) {
					idActual=producto_control.idempresaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaempresaFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaempresaFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_3";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idproveedorDefaultForeignKey!=null && producto_control.idproveedorDefaultForeignKey>-1) {
					idActual=producto_control.idproveedorDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaproveedorFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaproveedorFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_8";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idtipo_productoDefaultForeignKey!=null && producto_control.idtipo_productoDefaultForeignKey>-1) {
					idActual=producto_control.idtipo_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablatipo_productoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablatipo_productoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_10";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idimpuestoDefaultForeignKey!=null && producto_control.idimpuestoDefaultForeignKey>-1) {
					idActual=producto_control.idimpuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaimpuestoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaimpuestoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_11";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idotro_impuestoDefaultForeignKey!=null && producto_control.idotro_impuestoDefaultForeignKey>-1) {
					idActual=producto_control.idotro_impuestoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaotro_impuestoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaotro_impuestoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_16";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcategoria_productoDefaultForeignKey!=null && producto_control.idcategoria_productoDefaultForeignKey>-1) {
					idActual=producto_control.idcategoria_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacategoria_productoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacategoria_productoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_17";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idsub_categoria_productoDefaultForeignKey!=null && producto_control.idsub_categoria_productoDefaultForeignKey>-1) {
					idActual=producto_control.idsub_categoria_productoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablasub_categoria_productoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablasub_categoria_productoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_18";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idbodega_defectoDefaultForeignKey!=null && producto_control.idbodega_defectoDefaultForeignKey>-1) {
					idActual=producto_control.idbodega_defectoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablabodega_defectoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablabodega_defectoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_19";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idunidad_compraDefaultForeignKey!=null && producto_control.idunidad_compraDefaultForeignKey>-1) {
					idActual=producto_control.idunidad_compraDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaunidad_compraFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaunidad_compraFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_21";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idunidad_ventaDefaultForeignKey!=null && producto_control.idunidad_ventaDefaultForeignKey>-1) {
					idActual=producto_control.idunidad_ventaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaunidad_ventaFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaunidad_ventaFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_37";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcuenta_ventaDefaultForeignKey!=null && producto_control.idcuenta_ventaDefaultForeignKey>-1) {
					idActual=producto_control.idcuenta_ventaDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacuenta_ventaFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacuenta_ventaFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_38";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcuenta_compraDefaultForeignKey!=null && producto_control.idcuenta_compraDefaultForeignKey>-1) {
					idActual=producto_control.idcuenta_compraDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacuenta_compraFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacuenta_compraFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_39";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idcuenta_costoDefaultForeignKey!=null && producto_control.idcuenta_costoDefaultForeignKey>-1) {
					idActual=producto_control.idcuenta_costoDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablacuenta_costoFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablacuenta_costoFK(producto_control,control_name,idActual,true);
					}
				});


				control_name="t"+strSuf+"-cel_"+i+"_44";
				idActual=jQuery("#"+control_name).val();

				if(producto_control.idretencionDefaultForeignKey!=null && producto_control.idretencionDefaultForeignKey>-1) {
					idActual=producto_control.idretencionDefaultForeignKey;
				}

				if(jQuery("#"+control_name_id).val()<0) {
					producto_webcontrol1.cargarComboEditarTablaretencionFK(producto_control,control_name,idActual,false);
				}

				jQuery("#chb_"+control_name).change(function(){
					control_name=jQuery(this).prop('value');

					idActual=jQuery("#"+control_name).val();

					if(jQuery(this).prop('checked')==true) {
						//alert("FK_ID_ACTUAL="+idActual);
						producto_webcontrol1.cargarComboEditarTablaretencionFK(producto_control,control_name,idActual,true);
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
		
		jQuery("#frmTablaDatosproducto").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"producto");
		
		super.procesarInicioProceso(producto_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(producto_constante1.STR_RELATIVE_PATH,"producto");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(producto_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(producto_constante1,"producto");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(producto_constante1,"producto");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"producto");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(producto_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(producto_constante1,"producto");
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
			else if(strValueTipoColumna==" Proveedores") {
				jQuery(".col_id_proveedor").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_proveedor_img').trigger("click" );
				} else {
					jQuery('#form-id_proveedor_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Costo") {
				jQuery(".col_costo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Activo") {
				jQuery(".col_activo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Tipo Producto") {
				jQuery(".col_id_tipo_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_tipo_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_tipo_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cantidad Inicial") {
				jQuery(".col_cantidad_inicial").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto") {
				jQuery(".col_id_impuesto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_impuesto_img').trigger("click" );
				} else {
					jQuery('#form-id_impuesto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Otro Impuesto") {
				jQuery(".col_id_otro_impuesto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_otro_impuesto_img').trigger("click" );
				} else {
					jQuery('#form-id_otro_impuesto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Impuesto En Ventas") {
				jQuery(".col_impuesto_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro Impuesto Ventas") {
				jQuery(".col_otro_impuesto_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Impuesto En Compras") {
				jQuery(".col_impuesto_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Otro Impuesto Compras") {
				jQuery(".col_otro_impuesto_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Categoria Producto") {
				jQuery(".col_id_categoria_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_categoria_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_categoria_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Sub Categoria Producto") {
				jQuery(".col_id_sub_categoria_producto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_sub_categoria_producto_img').trigger("click" );
				} else {
					jQuery('#form-id_sub_categoria_producto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Bodega Defecto") {
				jQuery(".col_id_bodega_defecto").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_bodega_defecto_img').trigger("click" );
				} else {
					jQuery('#form-id_bodega_defecto_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Unidad Compra") {
				jQuery(".col_id_unidad_compra").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_unidad_compra_img').trigger("click" );
				} else {
					jQuery('#form-id_unidad_compra_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Equivalencia En Compra") {
				jQuery(".col_equivalencia_compra").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Unidad Venta") {
				jQuery(".col_id_unidad_venta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_unidad_venta_img').trigger("click" );
				} else {
					jQuery('#form-id_unidad_venta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Equivalencia En Venta") {
				jQuery(".col_equivalencia_venta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Descripcion") {
				jQuery(".col_descripcion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Imagen") {
				jQuery(".col_imagen").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Observacion") {
				jQuery(".col_observacion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Comenta Factura") {
				jQuery(".col_comenta_factura").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Codigo Fabricante") {
				jQuery(".col_codigo_fabricante").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad") {
				jQuery(".col_cantidad").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad Minima") {
				jQuery(".col_cantidad_minima").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cantidad Maxima") {
				jQuery(".col_cantidad_maxima").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Factura Sin Stock") {
				jQuery(".col_factura_sin_stock").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Mostrar Componente") {
				jQuery(".col_mostrar_componente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Producto Equivalente") {
				jQuery(".col_producto_equivalente").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Avisa Expiracion") {
				jQuery(".col_avisa_expiracion").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Requiere No Serie") {
				jQuery(".col_requiere_serie").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Acepta Lote") {
				jQuery(".col_acepta_lote").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Cuenta Venta/Ingresos") {
				jQuery(".col_id_cuenta_venta").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_venta_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_venta_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Compra/Activo/Inventario") {
				jQuery(".col_id_cuenta_compra").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_compra_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_compra_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Cuenta Costo") {
				jQuery(".col_id_cuenta_costo").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_cuenta_costo_img').trigger("click" );
				} else {
					jQuery('#form-id_cuenta_costo_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Valor Inventario") {
				jQuery(".col_valor_inventario").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Producto Fisico") {
				jQuery(".col_producto_fisico").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Ultima Venta") {
				jQuery(".col_ultima_venta").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Precio Actualizado") {
				jQuery(".col_precio_actualizado").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencione") {
				jQuery(".col_id_retencion").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_retencion_img').trigger("click" );
				} else {
					jQuery('#form-id_retencion_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Retencion Ventas") {
				jQuery(".col_retencion_ventas").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Retencion Compras") {
				jQuery(".col_retencion_compras").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Factura Con Precio") {
				jQuery(".col_factura_con_precio").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}

//------------- Formulario-Combo-Relaciones -------------------

	setTipoRelacionAccion(strValueTipoRelacion,idActual,producto_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="imagen_producto" || strValueTipoRelacion=="Imagenes Producto") {
			producto_webcontrol1.registrarSesionParaimagen_productos(idActual);
		}
		else if(strValueTipoRelacion=="lista_cliente" || strValueTipoRelacion=="Lista Cliente") {
			producto_webcontrol1.registrarSesionParalista_clientes(idActual);
		}
		else if(strValueTipoRelacion=="lista_precio" || strValueTipoRelacion=="Lista Precios") {
			producto_webcontrol1.registrarSesionParalista_precioes(idActual);
		}
		else if(strValueTipoRelacion=="lista_producto" || strValueTipoRelacion=="Lista Productos") {
			producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		}
		else if(strValueTipoRelacion=="otro_suplidor" || strValueTipoRelacion=="Otro Suplidor") {
			producto_webcontrol1.registrarSesionParaotro_suplidores(idActual);
		}
		else if(strValueTipoRelacion=="producto_bodega" || strValueTipoRelacion=="Producto Bodega") {
			producto_webcontrol1.registrarSesionParaproducto_bodegas(idActual);
		}
	}
	
	
	
}

var producto_funcion1=new producto_funcion(); //var

export {producto_funcion,producto_funcion1};

//Para ser llamado desde window.opener
window.producto_funcion1 = producto_funcion1;



//</script>
