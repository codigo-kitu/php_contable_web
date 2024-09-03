//<script type="text/javascript" language="javascript">
class Constantes {
    constructor() {
        this.STR_NOMBRE_SISTEMA = "SISTEMA CONTABLE";
        this.STR_PREFIJO_TITULO_TABLA = "";
        this.FACTORY = undefined;
        this.STR_RELATIVE_PATH = ""; //strRelativePath="";
        this.STR_POPUP_URL = '';
        this.INT_POPUP_WIDTH = 600;
        this.INT_POPUP_HEIGHT = 125;
        this.STR_POPUP_EFFECT = "explode";
        this.STR_POPUP_EFFECT_HIDE = "fold";
        this.CON_DEBUG = true;
        this.CON_ARBOL_MENU = false;
        this.CON_MENU_JQUERY = false;
        this.CON_ARBOL_MENU_JQUERY = true;
        this.CON_HOTKEYS = true;
        this.STR_CARPETA_JAVASCRIPT = "js";
        this.STR_CARPETA_REPORTE = "reports";
        this.STR_CARPETA_UPLOADS = "uploads";
        this.STR_JQUERY_VERSION = "1.10.4";
        this.STR_PLUGGIN = "pluggin";
        this.STR_TIPO_COMBO = "select2"; //"select2";"normal";
        this.STR_TIPO_TABLA = "datatables"; //"datatables";"normal";
        this.STR_PROTOCOL = "http";
        this.STR_IP_SERVIDOR = "localhost"; //"localhost";"192.168.100.3";
        this.STR_PUERTO_SERVIDOR = "80"; //"8080";"443";"8081";"8081";
        this.STR_CONTEXTO_APLICACION = "contabilidad0";
        this.STR_CONTEXTO_APLICACION_SERVICIO = "contabilidad0";
        this.STR_CONTEXTO_APLICACION_TOCOMPLETE = "webroot";
        this.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO = "";
        this.STR_GLOBAL_CONTROLLER = "GlobalController.php";
        this.STR_INDEX_PAGE = "index.jsp";
        this.STR_DEFAULT_PAGE = "default.jsp";
        this.STR_REPORTE_PAGE = "index.php"; //"FinReporte.jsp";	
        this.STR_REPORTE_PAGE_JQUERY = "report.php";
        //STR_GLOBAL_CONTROLLER="GlobalController.php";
        this.STR_REPORTE_FUNCION = "generarReporteConPhpExcel";
        this.STR_CARPETA_IMAGENES = "img/Imagenes";
        this.STR_CONFIGURACION_VENTANA = "width=800,height=800,status=yes,toolbar=yes,menubar=yes,location=yes";
        this.STR_CONFIGURACION_VENTANA_NUEVA = "height=400,width=400,status=yes,toolbar=no,menubar=no,location=no,resizable=yes";
        this.STR_DEFAULT_DIV_MENSAGE = "divMensaje";
        //SECCIONES DE PAGINA
        this.STR_SECCION_ACCIONES = "Acciones";
        this.STR_SECCION_CAMPOS = "Campos";
        this.STR_SECCION_BUSQUEDAS = "Busquedas";
        this.STR_SECCION_CONTROLES_SECCIONES = "ControlesSecciones";
        this.STR_IMAGEN_ATRAS = "imgAtras";
        this.STR_IMAGEN_COLAPSE_FILA = "xcollapse.png";
        this.STR_IMAGEN_EXPAND_FILA = "xexpand.png";
        this.STR_IMAGEN_COLAPSE_MENU = "collapse.gif";
        this.STR_IMAGEN_EXPAND_MENU = "expand.gif";
        this.STR_DEFAULT_PATH_PAGE = "Confirmacion";
        this.STR_JMAKI_TREE_SUBSCRIBE_SELECT = "/dojo/dijit/tree";
        this.STR_NONE = "NONE";
        this.STR_TRUE = "true";
        this.STR_FALSE = "false";
        this.STR_TODOS = "Todos";
        this.STR_POST = "POST";
        this.STR_VISIBLE = "visible";
        this.STR_HIDDEN = "hidden";
        this.STR_TABLE_ROW = "table-row";
        //REPORTES
        this.STR_HTML = "HTML";
        this.STR_PDF = "PDF";
        this.STR_WORD = "WORD";
        this.STR_WORD_OPENOFFICE = "WORD-OPENOFFICE";
        this.STR_EXCEL = "EXCEL";
        this.STR_CSV = "CSV";
        this.STR_DEFAULT_REPORTE = "HTML2"; //"EXCEL";
        this.STR_REPORTE_CONFIGURACION_VENTANA = "width=800,height=800";
        this.STR_REPORTE = "REPORTE";
        //COMBOS
        this.STR_COLUMNAS = "COLUMNAS";
        this.STR_ACCIONES = "ACCIONES";
        this.STR_RELACIONES = "RELACIONES";
        this.STR_ESCOJA_OPCION = "Escoja Opcion";
        this.INT_VALOR_ESCOJA_OPCION = -999;
        //COMBOS
        //SIMPLE YAHOO DIALOG
        this.STR_DIALOG_TITULO_VALIDACION = "Validacion";
        //MENSAJES
        //MENSAJES TITULOS
        this.STR_MENSAJE_TITULO_EXCEPCION_APLICACION = "Excepcion de Aplicacion";
        this.STR_MENSAJE_TITULO_EXCEPCION_BASEDEDATOS = "Excepcion de Base de Datos";
        this.STR_MENSAJE_TITULO_EXCEPCION_NOCONTROLADA = "Excepcion no controlada";
        this.STR_MENSAJE_TITULO_CONFIRMACION = "Confirmacion";
        this.STR_MENSAJE_TITULO_BUSQUEDAS = "Busquedas";
        this.STR_MENSAJE_TITULO_REPORTE = "Reporte";
        this.STR_MENSAJE_TITULO_EXCEPCION = "Excepcion";
        //MENSAJES MENSAJES
        this.STR_MENSAJE_ERROR_GENERAL = "OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR";
        this.STR_MENSAJE_SELECCION_ELEMENTO_VALIDO = "Error: Seleccione un elemento valido";
        this.STR_MENSAJE_DEBE_SELECCIONAR_UN = "Debe seleccionar un ";
        this.STR_MENSAJE_VALOR_INGRESASTE = "- El valor que ingresaste para ";
        this.STR_MENSAJE_NOES_VALIDO = " no es v�lido.";
        this.STR_MENSAJE_NOES_VALIDOS = " no es v�lidos.";
        this.STR_MENSAJE_CAMPO_REQUERIDO = "Error: Campo requerido";
        this.STR_MENSAJE_INGRESE_SOLO_NUMEROS = "Error: Ingrese solo numeros!";
        this.STR_MENSAJE_INGRESE_SOLO_NUMEROS_ENTEROS = "Error: Solo ingrese valores enteros";
        this.STR_MENSAJE_NUMERO_NODEBE_SERMENOR = "Error: Numero ingresado no debe ser menor de ";
        this.STR_MENSAJE_NUMERO_NODEBE_SERMAYOR = "Error: Numero ingresado no debe mayor a ";
        this.STR_MENSAJE_FECHA_INCORRECTA = "Fecha incorrecta!";
        this.STR_MENSAJE_NUMEROS = " numeros";
        this.STR_MENSAJE_LETRAS = " letras";
        this.STR_MENSAJE_CARACTERES = " caracteres";
        this.STR_MENSAJE_ESPACIOS = " espacios";
        this.STR_MENSAJE_SOLO_INGRESAR = "Error: Solo se puede ingresar ";
        this.STR_MENSAJE_CAMPO_DEBE_CONTENER = "Error: El campo ingresado debe contener ";
        this.STR_MENSAJE_NOTIENE_PERMISOS_PARA_BUSQUEDAS = "No tiene permisos para realizar busquedas";
        this.STR_MENSAJE_SELECCIONE_TIPO_REPORTE = "Seleccione un tipo de reporte v?lido";
        this.STR_MENSAJE_EXISTE_CAMBIOS_DATOS = 'Existen cambios en los datos, guardelos o recarle la informacion';
        this.STR_MENSAJE_NOPUEDE_INGRESAR = "No puede ingresar mas de un ";
        this.STR_MENSAJE_NOEXISTE_CAMBIOS_DATOS = "No existen cambios en los datos";
        this.STR_MENSAJE_EXISTE_CAMBIOS_DATOS_DESEA_CANCELARLOS = "Existe cambios en los datos desea cancelarlos?";
        this.STR_MENSAJE_ESTA_SEGURO_DE_ELIMINAR1 = "Esta seguro de eliminar el ";
        this.STR_MENSAJE_ESTA_SEGURO_DE_ELIMINAR2 = "seleccionado ?";
        this.STR_MENSAJE_APLICACION_J2EE = "aplicacionj2ee";
        //MENSAJES VALIDACION EMAIL
        this.STR_MENSAJE_MAIL_NOCONTIENE_ARROBA = "Error: El mail no contiene un '@'";
        this.STR_MENSAJE_MAIL_CONTIENE_CARACTER = "Error:El email no contiene al menos un caracter antes del '@'";
        this.STR_MENSAJE_MAIL_CONTIENE_PUNTO = "Error: El mail deberia contener un punto ('.') ";
        this.STR_MENSAJE_MAIL_CONTIENE_SUFIJOS = "Error: El mail deberia contener dos o tres caracteres sufijos";
        this.STR_MENSAJE_MAIL_VALIDO = "E-Mail Valido";
        //MENSAJES VALIDACION 2
        this.STR_MENSAJE_TEXTO_INCORRECTO = "Texto incorrecto";
        this.STR_MENSAJE_ENTERO_INCORRECTO = "Valor de Numero Entero Incorrecto";
        this.STR_MENSAJE_DECIMAL_INCORRECTO = "Valor de Numero Decimal Incorrecto";
        this.STR_MENSAJE_FECHA_INCORRECTO = "Valor de Fecha Incorrecta";
        this.STR_MENSAJE_REQUERIDO = "Requerido,";
        this.STR_MENSAJE_MAIL_INCORRECTO = "Mail Incorrecto";
        this.STR_MENSAJE_FONO_INCORRECTO = "Numero de Telefono Incorrecto";
        this.STR_MENSAJE_URL_INCORRECTO = "Url Incorrecto";
        this.STR_MENSAJE_FAX_INCORRECTO = "Fax Incorrecto";
        this.STR_MENSAJE_POSTAL_INCORRECTO = "Postal Incorrecto";
        this.STR_MENSAJE_DIGITS_INCORRECTO = "Numero Incorrecto";
        this.STR_MENSAJE_OTRO_INCORRECTO = "Otro Incorrecto";
        //CONSTANTES DE ARQUITECTURA
        this.STR_MENSAJE_VALIDACION_CAMPO = "Validacion Campo:";
        this.STR_MENSAJE_NUMERO_DEREGISTROS_DE = "Numero de registros de ";
        this.STR_MENSAJE_NOTIENE_PERMISOS_PAGINA = "No tiene permisos para ver la pagina requerida";
        this.STR_MENSAJE_POPUP_BLOQUEADOR = "SI APARECE ESTE MENSAJE ES PORQUE TIENE HABILITADO EL BLOQUEADOR DE VENTANAS EMERGENTES, DEBE DESHABILITARLO O CONTINUAR AL HACER CLICK EN EL BOTON CONTINUAR";
        this.S_MENSAJE_ACTIVO = "Activo";
        this.S_MENSAJE_NOACTIVO = "No Activo";
        this.STR_CAPAS_CARGAR_TABLA_AJAX = "CargarTablaAjax";
        this.STR_CAPAS_CARGAR_COMBOS = "CargarCombos";
        this.STR_CAPAS_CARGAR_DATOS = "CargarDatos";
        this.STR_CAPAS_PROCESAR = "Procesar";
        this.STR_CAPAS_CARGAR_PERMISOS = "CargarPermisos";
        this.STR_CAPAS_TRAER_PERMISOS_PAGINA = "TraerPermisosPagina";
        this.STR_CAPAS_CARGAR_TABLA_AJAX_DESDE_SESION = "CargarTablaAjaxDesdeSesion";
        this.STR_CAPAS_ACCION_BUSQUEDA = "accionBusqueda";
        this.STR_CAPAS_ACCION_ADICIONAL = "accionAdicional";
        this.STR_CAPAS_ACCION_TODOS = "Todos";
        this.STR_CAPAS_ACCION_BUSQUEDA_TODOS = this.STR_CAPAS_ACCION_BUSQUEDA + "=" + this.STR_CAPAS_ACCION_TODOS;
        this.STR_CAPAS_SISTEMA_SERVLET = "SistemaServlet";
        //QUERYSTRING
        this.STR_CAPAS_INICIO = "inicio";
        this.STR_CAPAS_FIN = "fin";
        this.STR_CAPAS_TIPO_JSON_RESPONSE = "tipoJsonResponse";
        this.STR_CAPAS_DEFAULT_TABLE = "yahoo.dataTable";
        this.STR_CAPAS_DEFAULT_COMBO = "dojo.dijit.combobox";
        this.STR_CAPAS_DEFAULT_TREE = "dojo.dijit.tree";
        this.STR_CAPAS_DEFAULT_MENSAJE = "yahoo.simpledlg";
        this.STR_CAPAS_QUERY_DEFAULT_TABLE = this.STR_CAPAS_TIPO_JSON_RESPONSE + "=" + this.STR_CAPAS_DEFAULT_TABLE;
        this.STR_CAPAS_QUERY_DEFAULT_COMBO = this.STR_CAPAS_TIPO_JSON_RESPONSE + "=" + this.STR_CAPAS_DEFAULT_COMBO;
        this.STR_CAPAS_CONTROL_COMBO_REPORTE = "cmbGenerarReporte";
        this.STR_CAPAS_CONTROL_CHECKBOX_REPORTE = "chbGenerarReporte";
        this.STR_CAPAS_CONTROL_CHECKBOX_GENERAR_TODOS = "chbGenerarReporte";
        this.STR_CAPAS_CONTROL_DIALOG_DEFAULT = "dialog1";
        this.STR_CAPAS_CONTROL_DIALOG_PREFIJO = "yhdlg";
        this.STR_CAPAS_TABLE_SUBSCRIBE = "/yahoo/dataTable/onSelect";
        this.STR_CAPAS_BUTTON_SUBSCRIBE = "/dojo/dijit/button/onClick";
        this.STR_CAPAS_CONTROL_PREFIJO_TABLA = "djtbl";
        this.STR_CAPAS_CONTROL_DEFAULT_TABLA = "yahoo.dataTable";
        this.STR_CAPAS_CONTROL_DEFAULT_COMBO = "dojo.dijit.combobox";
        this.STR_CAPAS_CONTROL_DEFAULT_COMBO_REPORTE = "{'name':'dojo.dijit.combobox','value':[{'label' : 'Alabama', 'value' : 'AL'},{'label' : 'California', 'value' : 'CA'},{'label' : 'New York', 'value' : 'NY', 'selected' : true},{'label' : 'Texas', 'value' : 'TX']}";
        this.STR_CAPAS_PAGINACION_DEFAULT = 10;
        this.STR_CAPAS_PAGINACION_PAGINA_DEFAULT = 0;
        this.STR_REGEX_STRING_GENERAL = /^[0-9A-Za-z\xC1\xE1\xC9\xE9\xCD\xED\xD3\xF3\xDA\xFA\u00f1\u00d1_ .,\n=:;°_@%$#\/\"\\-]*$/; //+(1 o mas)
        this.STR_REGEX_TELEFONO_GENERAL = /^\d*$/;
        this.STR_REGEX_FAX_GENERAL = /^\d*$/;
        this.STR_REGEX_POSTAL_GENERAL = /^\d*$/;
        //STRREGX_STRING_GENERAL=/^[0-9A-Za-z_ .,\n=:;_@-]*$/;//+(1 o mas)
        this.STR_HOTKEY_EVENT = "keypress";
        this.STR_HOTKEY_NUEVO = this.STR_HOTKEY_EVENT + ".alt_n";
        this.STR_HOTKEY_NUEVO_TABLA = this.STR_HOTKEY_EVENT + ".alt_t";
        this.STR_HOTKEY_GUARDAR = this.STR_HOTKEY_EVENT + ".alt_g";
        this.STR_HOTKEY_COPIAR = this.STR_HOTKEY_EVENT + ".alt_c";
        this.STR_HOTKEY_DUPLICAR = this.STR_HOTKEY_EVENT + ".alt_d";
        this.STR_HOTKEY_RECARGAR = this.STR_HOTKEY_EVENT + ".alt_r";
        this.STR_HOTKEY_ANTERIORES = this.STR_HOTKEY_EVENT + ".alt_pagUp";
        this.STR_HOTKEY_SIGUIENTES = this.STR_HOTKEY_EVENT + ".alt_pagDown";
        this.STR_HOTKEY_ORDEN = this.STR_HOTKEY_EVENT + ".alt_o";
        this.STR_HOTKEY_CERRAR = this.STR_HOTKEY_EVENT + ".alt_s";
        this.STR_HOTKEY_ACTUALIZAR = this.STR_HOTKEY_EVENT + ".alt_a";
        this.STR_HOTKEY_ELIMINAR = this.STR_HOTKEY_EVENT + ".alt_e";
        this.STR_HOTKEY_CANCELAR = this.STR_HOTKEY_EVENT + ".alt_q";
        this.STR_HOTKEY_NUEVO_RELACIONES = this.STR_HOTKEY_EVENT + ".shift_r";
    }
}
var constantes = new Constantes();
export { Constantes, constantes };
//</script>
