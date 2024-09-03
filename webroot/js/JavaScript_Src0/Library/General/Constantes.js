//<script type="text/javascript" language="javascript">

class Constantes {
	
	STR_NOMBRE_SISTEMA="SISTEMA CONTABLE";
	STR_PREFIJO_TITULO_TABLA="";
	FACTORY=undefined;
	STR_RELATIVE_PATH="";//strRelativePath="";
	
	STR_POPUP_URL='';
	INT_POPUP_WIDTH=600;
	INT_POPUP_HEIGHT=125;
	STR_POPUP_EFFECT="explode";
	STR_POPUP_EFFECT_HIDE="fold";
	
	CON_DEBUG=true;
	CON_ARBOL_MENU=false;
	CON_MENU_JQUERY=false;
	CON_ARBOL_MENU_JQUERY=true;
	CON_HOTKEYS=true;
	STR_CARPETA_JAVASCRIPT="js";
	STR_CARPETA_REPORTE="reports";
	STR_CARPETA_UPLOADS="uploads";
	STR_JQUERY_VERSION="1.10.4";
	STR_PLUGGIN="pluggin";
	STR_TIPO_COMBO="select2";//"select2";"normal";
	STR_TIPO_TABLA="datatables";//"datatables";"normal";
	
	STR_PROTOCOL="http";
	STR_IP_SERVIDOR="localhost";//"localhost";"192.168.100.3";
	STR_PUERTO_SERVIDOR="80";//"8080";"443";"8081";"8081";
	STR_CONTEXTO_APLICACION="contabilidad0";
	STR_CONTEXTO_APLICACION_SERVICIO="contabilidad0";		
	STR_CONTEXTO_APLICACION_TOCOMPLETE="webroot";
	STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO="";
	STR_GLOBAL_CONTROLLER="GlobalController.php";
	STR_INDEX_PAGE="index.jsp";
	STR_DEFAULT_PAGE="default.jsp";
	STR_REPORTE_PAGE="index.php";//"FinReporte.jsp";	
	STR_REPORTE_PAGE_JQUERY="report.php";
	//STR_GLOBAL_CONTROLLER="GlobalController.php";
	STR_REPORTE_FUNCION="generarReporteConPhpExcel"
	STR_CARPETA_IMAGENES="img/Imagenes";
	STR_CONFIGURACION_VENTANA="width=800,height=800,status=yes,toolbar=yes,menubar=yes,location=yes";
	STR_CONFIGURACION_VENTANA_NUEVA="height=400,width=400,status=yes,toolbar=no,menubar=no,location=no,resizable=yes";
	STR_DEFAULT_DIV_MENSAGE="divMensaje";
	
	//SECCIONES DE PAGINA
	STR_SECCION_ACCIONES="Acciones";
	STR_SECCION_CAMPOS="Campos";
	STR_SECCION_BUSQUEDAS="Busquedas";
	STR_SECCION_CONTROLES_SECCIONES="ControlesSecciones";
	
	STR_IMAGEN_ATRAS="imgAtras";
	STR_IMAGEN_COLAPSE_FILA="xcollapse.png";
	STR_IMAGEN_EXPAND_FILA="xexpand.png";
	STR_IMAGEN_COLAPSE_MENU="collapse.gif";
	STR_IMAGEN_EXPAND_MENU="expand.gif";
	
	STR_DEFAULT_PATH_PAGE="Confirmacion";
	STR_JMAKI_TREE_SUBSCRIBE_SELECT="/dojo/dijit/tree";
	STR_NONE="NONE";
	STR_TRUE="true";
	STR_FALSE="false";
	STR_TODOS="Todos";
	STR_POST="POST";
	STR_VISIBLE="visible";
	STR_HIDDEN="hidden";
	STR_TABLE_ROW="table-row";
	
	//REPORTES
	STR_HTML="HTML";
	STR_PDF="PDF";
	STR_WORD="WORD";
	STR_WORD_OPENOFFICE="WORD-OPENOFFICE";
	STR_EXCEL="EXCEL";
	STR_CSV="CSV";
	STR_DEFAULT_REPORTE="HTML2";//"EXCEL";
	STR_REPORTE_CONFIGURACION_VENTANA="width=800,height=800";
	STR_REPORTE="REPORTE";
	
	//COMBOS
	STR_COLUMNAS="COLUMNAS";
	STR_ACCIONES="ACCIONES";
	STR_RELACIONES="RELACIONES";
	STR_ESCOJA_OPCION="Escoja Opcion";
	INT_VALOR_ESCOJA_OPCION=-999;
	//COMBOS
	
	
	//SIMPLE YAHOO DIALOG
	STR_DIALOG_TITULO_VALIDACION="Validacion";
	
	//MENSAJES
	//MENSAJES TITULOS
	STR_MENSAJE_TITULO_EXCEPCION_APLICACION="Excepcion de Aplicacion";
	STR_MENSAJE_TITULO_EXCEPCION_BASEDEDATOS="Excepcion de Base de Datos";
	STR_MENSAJE_TITULO_EXCEPCION_NOCONTROLADA="Excepcion no controlada";
	STR_MENSAJE_TITULO_CONFIRMACION="Confirmacion";
	STR_MENSAJE_TITULO_BUSQUEDAS="Busquedas";
	STR_MENSAJE_TITULO_REPORTE="Reporte";
	STR_MENSAJE_TITULO_EXCEPCION="Excepcion";
	
	//MENSAJES MENSAJES
	STR_MENSAJE_ERROR_GENERAL="OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR";
	STR_MENSAJE_SELECCION_ELEMENTO_VALIDO="Error: Seleccione un elemento valido";
	STR_MENSAJE_DEBE_SELECCIONAR_UN="Debe seleccionar un ";
	STR_MENSAJE_VALOR_INGRESASTE="- El valor que ingresaste para ";
	STR_MENSAJE_NOES_VALIDO=" no es v�lido.";
	STR_MENSAJE_NOES_VALIDOS=" no es v�lidos.";
	STR_MENSAJE_CAMPO_REQUERIDO="Error: Campo requerido";
	STR_MENSAJE_INGRESE_SOLO_NUMEROS="Error: Ingrese solo numeros!";
	STR_MENSAJE_INGRESE_SOLO_NUMEROS_ENTEROS="Error: Solo ingrese valores enteros";
	STR_MENSAJE_NUMERO_NODEBE_SERMENOR="Error: Numero ingresado no debe ser menor de ";
	STR_MENSAJE_NUMERO_NODEBE_SERMAYOR="Error: Numero ingresado no debe mayor a ";
	STR_MENSAJE_FECHA_INCORRECTA="Fecha incorrecta!";
	STR_MENSAJE_NUMEROS=" numeros";
	STR_MENSAJE_LETRAS=" letras";
	STR_MENSAJE_CARACTERES=" caracteres";
	STR_MENSAJE_ESPACIOS=" espacios";
	STR_MENSAJE_SOLO_INGRESAR="Error: Solo se puede ingresar ";
	STR_MENSAJE_CAMPO_DEBE_CONTENER="Error: El campo ingresado debe contener ";
	STR_MENSAJE_NOTIENE_PERMISOS_PARA_BUSQUEDAS="No tiene permisos para realizar busquedas";
	STR_MENSAJE_SELECCIONE_TIPO_REPORTE="Seleccione un tipo de reporte v?lido";
	STR_MENSAJE_EXISTE_CAMBIOS_DATOS='Existen cambios en los datos, guardelos o recarle la informacion';
	STR_MENSAJE_NOPUEDE_INGRESAR="No puede ingresar mas de un ";
	STR_MENSAJE_EXISTE_CAMBIOS_DATOS="No existen cambios en los datos";
	STR_MENSAJE_EXISTE_CAMBIOS_DATOS_DESEA_CANCELARLOS="Existe cambios en los datos desea cancelarlos?";
	STR_MENSAJE_ESTA_SEGURO_DE_ELIMINAR1="Esta seguro de eliminar el ";
	STR_MENSAJE_ESTA_SEGURO_DE_ELIMINAR2="seleccionado ?";

	STR_MENSAJE_APLICACION_J2EE="aplicacionj2ee";
	
	//MENSAJES VALIDACION EMAIL
	STR_MENSAJE_MAIL_NOCONTIENE_ARROBA="Error: El mail no contiene un '@'";
	STR_MENSAJE_MAIL_CONTIENE_CARACTER="Error:El email no contiene al menos un caracter antes del '@'";
	STR_MENSAJE_MAIL_CONTIENE_PUNTO="Error: El mail deberia contener un punto ('.') ";
	STR_MENSAJE_MAIL_CONTIENE_SUFIJOS="Error: El mail deberia contener dos o tres caracteres sufijos";
	STR_MENSAJE_MAIL_VALIDO="E-Mail Valido";
	
	//MENSAJES VALIDACION 2
	STR_MENSAJE_TEXTO_INCORRECTO="Texto incorrecto";
	STR_MENSAJE_ENTERO_INCORRECTO="Valor de Numero Entero Incorrecto";
	STR_MENSAJE_DECIMAL_INCORRECTO="Valor de Numero Decimal Incorrecto";
	STR_MENSAJE_FECHA_INCORRECTO="Valor de Fecha Incorrecta";
	STR_MENSAJE_REQUERIDO="Requerido,";
	STR_MENSAJE_MAIL_INCORRECTO="Mail Incorrecto";
	STR_MENSAJE_FONO_INCORRECTO="Numero de Telefono Incorrecto";
	STR_MENSAJE_URL_INCORRECTO="Url Incorrecto";
	STR_MENSAJE_FAX_INCORRECTO="Fax Incorrecto";
	STR_MENSAJE_POSTAL_INCORRECTO="Postal Incorrecto";
	STR_MENSAJE_DIGITS_INCORRECTO="Numero Incorrecto";
	STR_MENSAJE_OTRO_INCORRECTO="Otro Incorrecto";
	
	//CONSTANTES DE ARQUITECTURA
	STR_MENSAJE_VALIDACION_CAMPO="Validacion Campo:";
	STR_MENSAJE_NUMERO_DEREGISTROS_DE="Numero de registros de ";
	STR_MENSAJE_NOTIENE_PERMISOS_PAGINA="No tiene permisos para ver la pagina requerida";
	STR_MENSAJE_POPUP_BLOQUEADOR="SI APARECE ESTE MENSAJE ES PORQUE TIENE HABILITADO EL BLOQUEADOR DE VENTANAS EMERGENTES, DEBE DESHABILITARLO O CONTINUAR AL HACER CLICK EN EL BOTON CONTINUAR";
	
	STR_CAPAS_CARGAR_TABLA_AJAX="CargarTablaAjax";
	STR_CAPAS_CARGAR_COMBOS="CargarCombos";
	STR_CAPAS_CARGAR_DATOS="CargarDatos";
	STR_CAPAS_PROCESAR="Procesar";
	STR_CAPAS_CARGAR_PERMISOS="CargarPermisos";
	STR_CAPAS_TRAER_PERMISOS_PAGINA="TraerPermisosPagina";
	STR_CAPAS_CARGAR_TABLA_AJAX_DESDE_SESION="CargarTablaAjaxDesdeSesion";
	STR_CAPAS_ACCION_BUSQUEDA="accionBusqueda";
	STR_CAPAS_ACCION_ADICIONAL="accionAdicional";
	STR_CAPAS_ACCION_TODOS="Todos";
	STR_CAPAS_ACCION_BUSQUEDA_TODOS=this.STR_CAPAS_ACCION_BUSQUEDA+"="+this.STR_CAPAS_ACCION_TODOS;
	STR_CAPAS_SISTEMA_SERVLET="SistemaServlet";

	//QUERYSTRING
	STR_CAPAS_INICIO="inicio";
	STR_CAPAS_FIN="fin";
	STR_CAPAS_TIPO_JSON_RESPONSE="tipoJsonResponse";
	STR_CAPAS_DEFAULT_TABLE="yahoo.dataTable";
	STR_CAPAS_DEFAULT_COMBO="dojo.dijit.combobox";
	STR_CAPAS_DEFAULT_TREE="dojo.dijit.tree";
	STR_CAPAS_DEFAULT_MENSAJE="yahoo.simpledlg";
	
	STR_CAPAS_QUERY_DEFAULT_TABLE=this.STR_CAPAS_TIPO_JSON_RESPONSE+"="+this.STR_CAPAS_DEFAULT_TABLE;
	STR_CAPAS_QUERY_DEFAULT_COMBO=this.STR_CAPAS_TIPO_JSON_RESPONSE+"="+this.STR_CAPAS_DEFAULT_COMBO;
	
	
	STR_CAPAS_CONTROL_COMBO_REPORTE="cmbGenerarReporte";
	STR_CAPAS_CONTROL_CHECKBOX_REPORTE="chbGenerarReporte";
	STR_CAPAS_CONTROL_CHECKBOX_GENERAR_TODOS="chbGenerarReporte";
	STR_CAPAS_CONTROL_DIALOG_DEFAULT="dialog1";
	STR_CAPAS_CONTROL_DIALOG_PREFIJO="yhdlg";
	STR_CAPAS_TABLE_SUBSCRIBE="/yahoo/dataTable/onSelect";
	STR_CAPAS_BUTTON_SUBSCRIBE="/dojo/dijit/button/onClick";
	STR_CAPAS_CONTROL_PREFIJO_TABLA="djtbl";
	STR_CAPAS_CONTROL_DEFAULT_TABLA="yahoo.dataTable";
	STR_CAPAS_CONTROL_DEFAULT_COMBO="dojo.dijit.combobox";
	STR_CAPAS_CONTROL_DEFAULT_COMBO_REPORTE="{'name':'dojo.dijit.combobox','value':[{'label' : 'Alabama', 'value' : 'AL'},{'label' : 'California', 'value' : 'CA'},{'label' : 'New York', 'value' : 'NY', 'selected' : true},{'label' : 'Texas', 'value' : 'TX']}";
		    
	STR_CAPAS_PAGINACION_DEFAULT=10;
	STR_CAPAS_PAGINACION_PAGINA_DEFAULT=0;
	
	STR_REGEX_STRING_GENERAL=/^[0-9A-Za-z\xC1\xE1\xC9\xE9\xCD\xED\xD3\xF3\xDA\xFA\u00f1\u00d1_ .,\n=:;°_@%$#\/\"\\-]*$/;		//+(1 o mas)
	STR_REGEX_TELEFONO_GENERAL=/^\d*$/;
	STR_REGEX_FAX_GENERAL=/^\d*$/;
	STR_REGEX_POSTAL_GENERAL=/^\d*$/;
			
	//STRREGX_STRING_GENERAL=/^[0-9A-Za-z_ .,\n=:;_@-]*$/;//+(1 o mas)
	
	STR_HOTKEY_EVENT="keypress";
	STR_HOTKEY_NUEVO=this.STR_HOTKEY_EVENT+".alt_n";
	STR_HOTKEY_NUEVO_TABLA=this.STR_HOTKEY_EVENT+".alt_t";
	STR_HOTKEY_GUARDAR=this.STR_HOTKEY_EVENT+".alt_g";
	STR_HOTKEY_COPIAR=this.STR_HOTKEY_EVENT+".alt_c";
	STR_HOTKEY_DUPLICAR=this.STR_HOTKEY_EVENT+".alt_d";
	STR_HOTKEY_RECARGAR=this.STR_HOTKEY_EVENT+".alt_r";
	STR_HOTKEY_ANTERIORES=this.STR_HOTKEY_EVENT+".alt_pagUp";
	STR_HOTKEY_SIGUIENTES=this.STR_HOTKEY_EVENT+".alt_pagDown";
	STR_HOTKEY_ORDEN=this.STR_HOTKEY_EVENT+".alt_o";
	STR_HOTKEY_CERRAR=this.STR_HOTKEY_EVENT+".alt_s";	
	STR_HOTKEY_ACTUALIZAR=this.STR_HOTKEY_EVENT+".alt_a";
	STR_HOTKEY_ELIMINAR=this.STR_HOTKEY_EVENT+".alt_e";
	STR_HOTKEY_CANCELAR=this.STR_HOTKEY_EVENT+".alt_q";
	STR_HOTKEY_NUEVO_RELACIONES=this.STR_HOTKEY_EVENT+".shift_r";	
}

var constantes=new Constantes();

//</script>