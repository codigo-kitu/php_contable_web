//<script type="text/javascript" language="javascript">


import {imagen_kardex_constante,imagen_kardex_constante1} from '../util/imagen_kardex_constante.js';

class imagen_kardex_funcion extends GeneralEntityFuncion {
	
/*---------------------------------- AREA:EVENTOS ---------------------------*/


//---------- Clic-Buscar ----------

	buscarOnClick() {
		this.procesarInicioBusqueda();
	}
	
	buscarOnComplete() {
		this.procesarFinalizacionBusqueda();
	}
	
	buscarFksOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	

//---------- Clic-Buscar-Auxiliar ----------
	
	procesarInicioBusqueda() {
		funcionGeneral.procesarInicioBusquedaPrincipal(imagen_kardex_constante1.STR_RELATIVE_PATH,"imagen_kardex");		
	}
	
	procesarFinalizacionBusqueda() {
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(imagen_kardex_constante1.STR_RELATIVE_PATH,imagen_kardex_constante1.STR_NOMBRE_OPCION,"imagen_kardex");		
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
		super.resaltarRestaurarDivMantenimiento(true,"imagen_kardex");
		
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	seleccionarOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
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
		funcionGeneral.generarReporteFinalizacion(imagen_kardex_constante1.STR_RELATIVE_PATH,imagen_kardex_constante1.STR_NOMBRE_OPCION);
	}
	
//---------- Clic-Generar-Html -----------

	generarHtmlReporteOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}		
	
	generarHtmlReporteOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}

//------------- Clic-Actualizar -------------
	
	editarTablaDatosOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}		
	
	editarTablaDatosOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}

//------------- Clic-Eliminar --------------

	eliminarTablaOnClick() {
		//super.resaltarRestaurarDivMantenimiento(true,"imagen_kardex");		
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
		
	eliminarTablaOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
//------------ Clic-Guardar-Cambios --------------

	guardarCambiosOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}		
	
	guardarCambiosOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
//------------ Clic-Duplicar --------------------

	duplicarOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	duplicarOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
//-------------- Clic-Copiar -------------------

	copiarOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	copiarOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}

	/*---------------------------------- AREA:TABLA ---------------------------*/

//------------- Tabla-Validacion -------------------

	registrarControlesTableValidacionEdition(imagen_kardex_control,imagen_kardex_webcontrol1,imagen_kardex_constante1) {
		
		var strSuf=imagen_kardex_constante1.STR_SUFIJO;
		
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
				
				//FK FIN																												
				
				//VALIDACION
				// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:10';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRules=strRules+'\r\n"'+control_name+'": {';
					strRules=strRules+'\r\nrequired:true,';
					strRules=strRules+'\r\nmaxlength:1000';
					strRules=strRules+'\r\n,regexpStringMethod:true';
				strRules=strRules+'\r\n},';

			
				
				
				control_name="t"+strSuf+"-cel_"+i+"_2";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
				
				control_name="t"+strSuf+"-cel_"+i+"_3";
				strRulesMessage=strRulesMessage+'\r\n"'+control_name+'": "'+constantes.STR_MENSAJE_REQUERIDO+''+constantes.STR_MENSAJE_TEXTO_INCORRECTO+'",';
			
				if(esPrimerRule==true) {
					esPrimerRule=false;
				}
				//VALIDACION	
				
				
				//SI SE SUBE ARRIBA CON FK, NO FUNCIONA, ES EXTRA?O
				//FK CHECKBOX EVENTOS
				control_name_id="t"+strSuf+"-cel_"+i+"_0";
				
				
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
		
		jQuery("#frmTablaDatosimagen_kardex").validate(json_rules);
		
		//VALIDACION	
	}
	
	//---------- Clic-Nuevo --------------

	nuevoPrepararOnClick() {
		super.resaltarRestaurarDivMantenimiento(true,"imagen_kardex");
		
		super.procesarInicioProceso(imagen_kardex_constante1);
	}		
		
	nuevoPrepararOnComplete() {		
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
	nuevoTablaPrepararOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	nuevoTablaPrepararOnComplete() {		
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	






	
	
	/*----------------------- CODIGO GENERAL (PRINCIPAL/FORMULARIO)------------------*/
	
	//------------- Clic-Eliminar --------------

	eliminarOnClick() {
		funcionGeneral.eliminarOnClick(imagen_kardex_constante1.STR_RELATIVE_PATH,"imagen_kardex");		
	}
	
	eliminarOnComplete() {
		
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/

	procesarOnClick() {
		super.procesarInicioProceso(imagen_kardex_constante1);
	}
	
	procesarOnComplete() {
		super.procesarFinalizacionProceso(imagen_kardex_constante1,"imagen_kardex");
	}
	
	procesarFinalizacionProcesoAbrirLink() {
		super.procesarFinalizacionProcesoAbrirLink(imagen_kardex_constante1,"imagen_kardex");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) {
		super.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"imagen_kardex");
	}
	
	procesarInicioProcesoSimple() {		
		super.procesarInicioProcesoSimple(imagen_kardex_constante1);
	}
	
	procesarFinalizacionProcesoSimple() {
		super.procesarFinalizacionProcesoSimple(imagen_kardex_constante1,"imagen_kardex");
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

	setTipoRelacionAccion(strValueTipoRelacion,idActual,imagen_kardex_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
	}
	
	
	
}

var imagen_kardex_funcion1=new imagen_kardex_funcion(); //var

export {imagen_kardex_funcion,imagen_kardex_funcion1};

//Para ser llamado desde window.opener
window.imagen_kardex_funcion1 = imagen_kardex_funcion1;



//</script>
