<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

class Constantes {
	/*public static $strCarpetaPaginas="Paginas";*/
	
	public static string $PATH_REL = '';

	public static string $strPathBaseToComplete="/contabilidad/webroot/";
	
	public static string $PATH_IMAGEN="/contabilidad0/webroot/img/";
	public static string $strPathBaseImagenToComplete="/contabilidad0/webroot/img/";//TO_DELETE
	
	public static string $PATH_JAVASCRIPT="webroot/js/";	
	public static string $strPathBaseJavaScriptToComplete="webroot/js/";//TO_DELETE
	
	public static string $PATH_CSS="webroot/css/";
	public static string $strPathBaseCssToComplete="webroot/css/";//TO_DELETE
	
	public static string $PATH_SASS="webroot/scss/";	
	public static string $strPathBaseSassCssToComplete="webroot/scss/";//TO_DELETE
	
	public static string $strPathBaseUploadsToComplete="webroot/uploads/";		
	
	public static string $strPathBaseUploadsLoteToComplete="webroot/uploads_lote/";
	
	public static string $strPathLoggin="C:\\";

	public static string $strLogginPackageFile="bydan.enviomails_f";
	
	public static string $strLogginPackageConsole="bydan.enviomails_c";

	public static string $strConnexion="127.0.0.1:3306/seguridads_dbo?user=root////password=root";
	
	public static string $STR_CONNEXION_IP_DATABASE='127.0.0.1';//'localhost';//'localhost';//'192.168.1.4'
	
	public static string $STR_CONNEXION_USER_DATABASE='root';
	
	public static string $STR_CONNEXION_PASSWORD_DATABASE='root';
	
	public static string $strConnexionAuditoria="127.0.0.1:3306/auditoria_dbo?user=root////password=root";
	
	public static string $strConnexionSeguridad="127.0.0.1:3306/seguridads_dbo?user=root////password=root";
	
	public static string $STR_AUDITORIA_INSERTAR="INS";
	
	public static string $STR_AUDITORIA_ACTUALIZAR="ACT";
	
	public static string $STR_AUDITORIA_ELIMINAR_LOGICAMENTE="ELMLGC";
	
	public static string $STR_AUDITORIA_ELIMINAR_FISICAMENTE="ELMFSC";
		
	public static string $strAreaDepartamento="GERENCIA FINANCIERA";
			
	public static string $STR_NOMBRE_SISTEMA="SISTEMA CONTABLE";
	
	public static string $STR_PREFIJO_TITULO_TABLA="";

	public static string $STR_SCHEMA="2017_contabilidad0";
	
	public static string $STR_SCHEMA_SEGURIDAD="2017_contabilidad0";//"2013_seguridad_general";
	
	public static string $STR_FINAL_QUERY="";
	
	public static string $S_KEY_WHERE='--where';
	
	//------------------------ DEVELOPING --------------------------
	
	public static bool $IS_DEVELOPING=true;
	
	//public static $ISDEVELOPING_QUERY_EXPORT=false;
	public static bool $IS_DEVELOPING_QUERY_EXPORT=false;
	
	//public static $ISDEVELOPING_SQL=false;
	public static bool $IS_DEVELOPING_SQL=true;
	
	public static bool $IS_DEVELOPING_SQL_REPORT=false;
	
	//DEPRECATED
	public static bool $IS_DEVELOPING_SQL_R=false;
		
	public static bool $IS_DEMO=false;
	
	public static int $DEMO_MAX=50;
	
	//------------------------ DEVELOPING --------------------------
	
	public static string $S_MODO_REPORTE='ABRIR';//'EJECUTAR';'ABRIR';
	
	public static bool $CON_GENERAR_ARCHIVOS_AUDITORIA=true;
	
	public static string $STR_HTML_FLECHA="->";
	
	public static string $STR_NONE="NONE";
	
	public static string $PHP_VERSION="7.0";//"7.0";
	
	//public static $SQL_CONPREPARED=false;
	public static bool $SQL_CON_PREPARED=false;
	
	//public static $BITESPRODUCCION=false;//false;
	public static bool $BIT_ES_PRODUCCION=false;//false;
	
	//public static $BITESPOSTGRES=false;//false;
	public static bool $BIT_ES_POSTGRES=false;//false;
	
	public static string $STR_POSTGRES_PORT="5432";	
	public static string $STR_POSTGRES_DBNAME="postgres";
	public static string $STR_POSTGRES_PREFIJO_DATABASE='';//'';'bydansco_';
	
	public static bool $CON_JSON=true;
	public static bool $BIT_USA_CACHE=false;	
	public static bool $BIT_CON_ARBOL_MENU=false;
	public static bool $BIT_CON_ARBOL_MENU_JQUERY=true;
	public static bool $BIT_CON_CSS_PHP=false;
	public static string $STR_THEME='cupertino';//cupertino';//le-frog';
	public static int $INT_TIEMPO_DEFECTO_CACHE=60;//7200;
	public static string $STR_TIPO_TABLA="datatables";//"datatables";"normal";
	
	public static bool $BIT_USA_MENU_MODULOS=true;
	
	public static bool $BIT_CONCARGA_INICIAL_POR_ARCHIVO=false;
	
	public static bool $BIT_CONCARGA_INICIAL=false;
	
	public static bool $CON_CONTROL_CARGAR=true;
	
	public static bool $CON_SEGURIDAD=true;
	
	public static bool $BIT_USA_EJB_REMOTE=false;
	
	//public static $BITUSAEJBLOGICLAYER=true;
	public static bool $BIT_USA_EJB_LOGIC_LAYER=true;
	
	public static bool $BIT_USA_EJB_HOME=true;
	
	public static bool $BIT_USA_WEBSERVICE=false;
	
	public static bool $CON_LLAMADA_SIMPLE=false;
	
	public static bool $BIT_USA_GUARDAR_REL_PORPARTE=true;
	
	public static int $BIG_ID_ESCOJA_OPCION=-999;
	
	public static int $BIG_ID_SISTEMA_ACTUAL=1;
	              
	public static int $BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL=1;
	
	public static int $BIG_ID_SISTEMA_CUENTASCOBRAR_ACTUAL=1;
	
	public static int $BIG_ID_SISTEMA_CUENTASPAGAR_ACTUAL=1;
	
	public static int $BIG_ID_SISTEMA_FACTURACION_ACTUAL=1;
	
	public static int $BIG_ID_SISTEMA_GENERAL_ACTUAL=1;
	
	public static int $BIG_ID_SISTEMA_GLOBAL_ACTUAL=1;
	
	public static int $BIG_ID_SISTEMA_INVENTARIO_ACTUAL=1;
	
	public static int $BIG_ID_SISTEMA_SEGURIDAD_ACTUAL=1;
	
	//public static $STRPREFIJOSCHEMA='';//'';'bydansco_';
	public static string $STR_PREFIJO_SCHEMA='';//'';'bydansco_';
	
	public static string $STR_HTTP_INIT='http://';
	
	public static string $STR_DNS_NAME_SERVER='localhost';//'localhost';'www.bydans.com';'192.168.100.3'
	
	public static string $STR_PORT_SERVER='80';//'8080';'8081';
	
	public static string $STR_ONLOAD='onload';
	
	public static string $STR_CONTEXT_SERVER='contabilidad0';
	
	public static string $STR_CARPETA_VIEWS='contabilidad';
	
	public static string $STR_CARPETA_PAGINAS='index.php';
	
	public static string $STR_CARPETA_PAGINAS_JQUERY_TOREPLACE='GlobalController.php?view=TOREPLACE&action=index&typeonload=onloadhijos';	
	
	public static string $STR_CARPETA_ARCHIVOS='files';
	
	public static string $STR_PREFIJO_ARCHIVO_JSP='Mantenimiento';
	
	public static string $STR_PREFIJO_VIEW='_view';
		
	public static string $STR_PREFIJO_FORM='_form';
	
	//public static $STR_PREFIJO_FORM_VIEW='_form_view';		
	
	public static string $STR_EXTENSION_ARCHIVO_JSP='php';
	
	public static string $STR_MENSAJE_INFO='mensajeinfo';
	
	public static string $STR_MENSAJE_ADVERTENCIA='mensajeadvertencia';
	
	public static string $STR_MENSAJE_ERROR='mensajeerror';
	
	
	public static function getStrLogginPackageConsole():string {
		return self::$strLogginPackageConsole;
	}

	public static function setStrLogginPackageConsole(string $strLogginPackageConsole) {
		self::$strLogginPackageConsole = $strLogginPackageConsole;
	}
	
	public static function getStrPathLoggin() :string{
		return self::$strPathLoggin;
	}

	public static function setStrPathLoggin(string $strPathLoggin) {
		self::$strPathLoggin = $strPathLoggin;
	}
	
	public static function getStrLogginPackageFile():string {
		return self::$strLogginPackageFile;
	}

	public static function setStrLogginPackageFile(string $strLogginPackageFile) {
		self::$strLogginPackageFile = $strLogginPackageFile;
	}

	public static function getStrAreaDepartamento():string {
		return self::$strAreaDepartamento;
	}

	public static function setStrAreaDepartamento(string $strAreaDepartamento) {
		self::$strAreaDepartamento = $strAreaDepartamento;
	}

	public static function getStrConnexionAuditoria():string {
		return self::$strConnexionAuditoria;
	}

	public static function setStrConnexionAuditoria(string $strConnexionAuditoria) {
		self::$strConnexionAuditoria = $strConnexionAuditoria;
	}

	public static function getStrConnexionSeguridad():string {
		return self::$strConnexionSeguridad;
	}

	public static function setStrConnexionSeguridad(string $strConnexionSeguridad) {
		self::$strConnexionSeguridad = $strConnexionSeguridad;
	}

	public static function getStrConnexion():string {
		return self::$strConnexion;
	}

	public static function setStrConnexion(string $strConnexion) {
		self::$strConnexion = $strConnexion;
	}
	
	public static string $S_FALSE='false';
	
	public static string $S_NONE='NONE';
	
	public static string $S_EXTENSION_ARCHIVO_JSP='.jsp';
	
	public static string $S_PREFIJO_ARCHIVO_JSP='Mantenitmiento';
	
	//CONSTANTES PAGINATION
	public static string $S_PAGINATION_NONE='NONE';
	
	public static string $S_PAGINATION_NEXT='NEXT';
	
	public static string $S_PAGINATION_PREVIEW='PREVIEW';
	
	//CONSTANTES MENSAJE
	public static string $S_MENSAJE_VERIFICAR_PERMISOS_CODIGO='verificarpermisosmantenimiento';
	public static string $S_MENSAJE_VERIFICAR_PERMISOS_TITULO='Verificar permisos de usuario';
	public static string $S_MENSAJE_AUXILIAR='Auxiliar';
	public static string $S_MENSAJE_ULTIMA_BUSQUEDA='Ultima Busqueda';
	public static string $S_MENSAJE_REGISTRO_SESSION='Registro de sesion';
	public static string $S_MENSAJE_EXCEPCION_DE_APLICACION='Excepcion de Aplicacion';
	public static string $S_MENSAJE_ERROR_DE_APLICACION='Error de aplicacion';
	public static string $S_MENSAJE_DATOS_ACTUALIZADOS='Los datos han sido actualizados correctamente';
	public static string $S_MENSAJE_PROCESO_CORRECTO='Proceso ejecutado correctamente';
	public static string $S_MENSAJE_ACTIVO='Activo';
	public static string $S_MENSAJE_NOACTIVO='No Activo';
	//CONSTANTES REPORTES
	/*
	public static string $SREPORTEPATHCARPETA='Reportes/';
	public static string $SREPORTESUFIJOREPORTE='Design.jasper';
	public static string $SREPORTEMASTERRELACIONES='MasterRelaciones';
	public static string $SREPORTETITULO='REPORTE DE  ';
	*/
	
	//CONSTANTES VALIDACIONES
	//MENSAJES Y REGEX GENERALES VALIDACIONES
	public static string $STR_VALIDACION_CADENA='No es cadena';	
	//SIGNO MENOS SIEMPRE AL ULTIMO
	public static string $STR_REGEX_CADENA='[0-9A-Za-z_)( .,\n=:;_@������������-]*';//'[^�]*';	
	public static string $STR_REGEX_CADENA_TODOS='[^�]*';	
	public static string $STR_VALIDACION_NUMERO_ENTERO='No es numero';	
	public static string $STR_REGEX_NUMERO_ENTERO='[^�]*';	
	public static string $STR_VALIDACION_NOTNULL='No nulo';	
	public static string $STR_VALIDACION_LENGTH='Maximo numero de caracteres ';
	public static string $STR_VALIDACION_INT='No es numero';	
	public static string $STR_VALIDACION_SMALLBIGINT='No es numero';	
	public static string $STR_VALIDACION_SMALLINT='No es numero';	
	public static string $STR_VALIDACION_DECIMAL='No es numero decimal';	
	public static string $STR_VALIDACION_TODOS='Debe permitir todos los caracteres';
	
	public static string $STR_MENSAJE_POPUP_BLOQUEADOR='SI APARECE ESTE MENSAJE ES PORQUE TIENE HABILITADO EL BLOQUEADOR DE VENTANAS EMERGENTES, DEBE DESHABILITARLO O CONTINUAR AL HACER CLICK EN EL BOTON CONTINUAR';
	
	//SE USA DELIMITADOR INI,FIN /,#,&,ETC Y NO SE PUEDE USAR COMO CARACTER
	public static string $S_REGEX_PHP_STRING_GENERAL='&^[0-9A-Za-z_/)( .,\n=:;_@$%-áéíóúÁÉÍÓÚ]*$&';//'[0-9A-Za-z_)( .,\n=:;_@-]*'; //DELIMITADOR & NO PUEDE USARSE COMO CARACTER
	public static string $S_REGEX_PHP_DIGITS_GENERAL='/^[0-9]\d*$|$/';
	public static string $S_REGEX_PHP_TELEFONO_GENERAL='/^[0-9]\d*$|$/';//'[0-9]*';
	public static string $S_REGEX_PHP_FAX_GENERAL='/^[0-9]*$/';//[0-9]*';
	public static string $S_REGEX_PHP_MAIL_GENERAL='[0-9]*';
	public static string $S_REGEX_PHP_POSTAL_GENERAL='/^[0-9]*$/';
	public static string $S_REGEX_PHP_DIR_GENERAL="&^[0-9A-Za-z_/)( .,\n=:;_@-]*$&";//ESTE VIENE DE COMMENTS DB SQL2005
	
	public static string $S_REGEX_PHP_FECHA="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";	
	public static string $S_REGEX_PHP_FECHAHORA="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
	public static string $S_REGEX_PHP_HORA="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
		
	
	//SESSION
	public static string $SESSION_HISTORY_WEB='HISTORY_WEB';
	//SESSION
	
	//COMBOS
	public static string $STR_COLUMNAS='COLUMNAS';
	public static string $STR_ACCIONES='ACCIONES';
	public static string $STR_RELACIONES='RELACIONES';
	public static string $STR_RELACION_LABEL_FK='';//Se muestra en combo Columnas
	//COMBOS
	
	//LICENCIA
	public static string $REMOTE_USER='REMOTE_USER';//'SERVER_NAME';'REMOTE_USER';
	public static string $REMOTE_HOST='REMOTE_HOST';//'SERVER_NAME';'REMOTE_HOST';
	public static string $REMOTE_ADDR='REMOTE_ADDR';//'SERVER_ADDR';'REMOTE_ADDR';
	//LICENCIA_FIN
	
	//CONSTANTES URL
	public static string $ES_POPUP='ES_POPUP';
	public static string $ES_SUB_PAGINA='ES_SUB_PAGINA';
	public static string $ES_BUSQUEDA='ES_BUSQUEDA';
	public static string $FUNCION_JS='FUNCION_JS';
	public static string $SUFIJO='SUFIJO';
	public static string $ES_RELACIONES='ES_RELACIONES';
	public static string $ES_RELACIONADO='ES_RELACIONADO';
	
	//CSS
	public static string $CSS_CLASS_BOTON='btn btn-primary';
	public static string $CSS_CLASS_INPUT='form-control';//'inputnormal';
	public static string $CSS_CLASS_LABEL='form-label';
	public static string $CSS_CLASS_CONTROL='controlcampo';
	public static string $CSS_CLASS_COMBO='controlcombo';
	public static string $CSS_CLASS_TITULO='titulocampo';
	public static string $CSS_CLASS_TITULO_BUSQUEDA='busquedatitulocampo';
	public static string $CSS_CLASS_ERROR='mensajeerror';
	public static string $CSS_CLASS_TABLE='table table-primary table-striped table-hover';//'display'; table-success
	
	//NAMESPACE UTIL
	public static string $NAMESPACE_UTIL_CONTABILIDAD='com/bydan/contabilidad/contabilidad/util/_table_.php';
	public static string $NAMESPACE_UTIL_CUENTAS_COBRAR='com/bydan/contabilidad/cuentascobrar/util/_table_.php';
	public static string $NAMESPACE_UTIL_CUENTAS_CORRIENTES='com/bydan/contabilidad/cuentascorrientes/util/_table_.php';
	public static string $NAMESPACE_UTIL_CUENTAS_PAGAR='com/bydan/contabilidad/cuentaspagar/util/_table_.php';
	public static string $NAMESPACE_UTIL_ESTIMADOS='com/bydan/contabilidad/estimados/util/_table_.php';
	public static string $NAMESPACE_UTIL_FACTURACION='com/bydan/contabilidad/facturacion/util/_table_.php';
	public static string $NAMESPACE_UTIL_GENERAL='com/bydan/contabilidad/general/util/_table_.php';
	public static string $NAMESPACE_UTIL_INVENTARIO='com/bydan/contabilidad/inventario/util/_table_.php';
	public static string $NAMESPACE_UTIL_SEGURIDAD='com/bydan/contabilidad/seguridad/util/_table_.php';

	public static string $NAMESPACE_LOGIC_CONTABILIDAD='com/bydan/contabilidad/contabilidad/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_CUENTAS_COBRAR='com/bydan/contabilidad/cuentascobrar/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_CUENTAS_CORRIENTES='com/bydan/contabilidad/cuentascorrientes/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_CUENTAS_PAGAR='com/bydan/contabilidad/cuentaspagar/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_ESTIMADOS='com/bydan/contabilidad/estimados/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_FACTURACION='com/bydan/contabilidad/facturacion/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_GENERAL='com/bydan/contabilidad/general/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_INVENTARIO='com/bydan/contabilidad/inventario/business/logic/_table_.php';
	public static string $NAMESPACE_LOGIC_SEGURIDAD='com/bydan/contabilidad/seguridad/business/logic/_table_.php';
	
	//NAMESPACE TEMPLATE
	
	public static int $PRECISION = 2;
}

define('CONTEXT_SERVER', 'contabilidad0');

Constantes::$strPathBaseToComplete='/'.CONTEXT_SERVER.'/webroot/';
Constantes::$strPathBaseImagenToComplete='/'.CONTEXT_SERVER.'/webroot/img/';
Constantes::$STR_CONTEXT_SERVER=CONTEXT_SERVER;

?>