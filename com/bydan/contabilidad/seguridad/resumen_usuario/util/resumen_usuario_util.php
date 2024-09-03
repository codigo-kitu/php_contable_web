<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\seguridad\resumen_usuario\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL


class resumen_usuario_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='resumen_usuario';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.resumen_usuarios';
	/*'Mantenimientoresumen_usuario.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoresumen_usuario.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='resumen_usuarioPersistenceName';
	/*.resumen_usuario_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='resumen_usuario_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='resumen_usuario_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='resumen_usuario_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Resumen Usuarios';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Resumen Usuario';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='resumen_usuario';
	public static string $RESUMEN_USUARIO='seg_resumen_usuario';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.resumen_usuario';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_ingresos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_error_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_intentos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cierres,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_reinicios,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_ingreso_actual,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_error_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_intento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultimo_cierre from '.resumen_usuario_util::$SCHEMA.'.'.resumen_usuario_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=false;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $resumen_usuarioConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_USUARIO='id_usuario';
    public static string $NUMERO_INGRESOS='numero_ingresos';
    public static string $NUMERO_ERROR_INGRESO='numero_error_ingreso';
    public static string $NUMERO_INTENTOS='numero_intentos';
    public static string $NUMERO_CIERRES='numero_cierres';
    public static string $NUMERO_REINICIOS='numero_reinicios';
    public static string $NUMERO_INGRESO_ACTUAL='numero_ingreso_actual';
    public static string $FECHA_ULTIMO_INGRESO='fecha_ultimo_ingreso';
    public static string $FECHA_ULTIMO_ERROR_INGRESO='fecha_ultimo_error_ingreso';
    public static string $FECHA_ULTIMO_INTENTO='fecha_ultimo_intento';
    public static string $FECHA_ULTIMO_CIERRE='fecha_ultimo_cierre';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_USUARIO='Usuario';
    public static string $LABEL_NUMERO_INGRESOS='Numero Ingresos';
    public static string $LABEL_NUMERO_ERROR_INGRESO='Numero Error Ingreso';
    public static string $LABEL_NUMERO_INTENTOS='Numero Intentos';
    public static string $LABEL_NUMERO_CIERRES='Numero Cierres';
    public static string $LABEL_NUMERO_REINICIOS='Numero Reinicios';
    public static string $LABEL_NUMERO_INGRESO_ACTUAL='Numero Ingreso Actual';
    public static string $LABEL_FECHA_ULTIMO_INGRESO='Fecha Ultimo Ingreso';
    public static string $LABEL_FECHA_ULTIMO_ERROR_INGRESO='Fecha Ultimo Error Ingreso';
    public static string $LABEL_FECHA_ULTIMO_INTENTO='Fecha Ultimo Intento';
    public static string $LABEL_FECHA_ULTIMO_CIERRE='Fecha Ultimo Cierre';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->resumen_usuarioConstantesFuncionesAdditional=new $resumen_usuarioConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $resumen_usuarios,int $iIdNuevoresumen_usuario) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($resumen_usuarios as $resumen_usuarioAux) {
			if($resumen_usuarioAux->getId()==$iIdNuevoresumen_usuario) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}

		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndice-1;
		}
		
		return $iIndice;
	}
	
	public static function getIndiceActual(array $resumen_usuarios,resumen_usuario $resumen_usuario,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($resumen_usuarios as $resumen_usuarioAux) {
			if($resumen_usuarioAux->getId()==$resumen_usuario->getId()) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}		
	
		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndiceActual;
		}
		
		return $iIndice;
	}
	
	/*DESCRIPCION*/
	public static function getresumen_usuarioDescripcion(?resumen_usuario $resumen_usuario) : string {//resumen_usuario NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($resumen_usuario !=null) {
			/*&& resumen_usuario->getId()!=0*/
			
			if($resumen_usuario->getId()!=null) {
				$sDescripcion=(string)$resumen_usuario->getId();
			}
			
			/*resumen_usuario;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setresumen_usuarioDescripcion(?resumen_usuario $resumen_usuario,string $sValor) {			
		if($resumen_usuario !=null) {
			
			/*resumen_usuario;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $resumen_usuarios) : array {
		$resumen_usuariosForeignKey=array();
		
		foreach ($resumen_usuarios as $resumen_usuarioLocal) {
			$resumen_usuariosForeignKey[$resumen_usuarioLocal->getId()]=resumen_usuario_util::getresumen_usuarioDescripcion($resumen_usuarioLocal);
		}
			
		return $resumen_usuariosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_usuario() : string  { return 'Usuario'; }
    public static function getColumnLabelnumero_ingresos() : string  { return 'Numero Ingresos'; }
    public static function getColumnLabelnumero_error_ingreso() : string  { return 'Numero Error Ingreso'; }
    public static function getColumnLabelnumero_intentos() : string  { return 'Numero Intentos'; }
    public static function getColumnLabelnumero_cierres() : string  { return 'Numero Cierres'; }
    public static function getColumnLabelnumero_reinicios() : string  { return 'Numero Reinicios'; }
    public static function getColumnLabelnumero_ingreso_actual() : string  { return 'Numero Ingreso Actual'; }
    public static function getColumnLabelfecha_ultimo_ingreso() : string  { return 'Fecha Ultimo Ingreso'; }
    public static function getColumnLabelfecha_ultimo_error_ingreso() : string  { return 'Fecha Ultimo Error Ingreso'; }
    public static function getColumnLabelfecha_ultimo_intento() : string  { return 'Fecha Ultimo Intento'; }
    public static function getColumnLabelfecha_ultimo_cierre() : string  { return 'Fecha Ultimo Cierre'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $resumen_usuarios) {		
		try {
			
			$resumen_usuario = new resumen_usuario();
			
			foreach($resumen_usuarios as $resumen_usuario) {
				
				$resumen_usuario->setid_usuario_Descripcion(resumen_usuario_util::getusuarioDescripcion($resumen_usuario->getusuario()));
			}
			
			if($resumen_usuario!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(resumen_usuario $resumen_usuario) {		
		try {
			
			
				$resumen_usuario->setid_usuario_Descripcion(resumen_usuario_util::getusuarioDescripcion($resumen_usuario->getusuario()));
							
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}		 
	
	/*FKs LISTA*/
			
	
	/*INDICES LABEL*/
	
	public static function getNombreIndice(string $sNombreIndice) : string {
		if($sNombreIndice=='Todos') {
			$sNombreIndice='Tipo=Todos';
		} else if($sNombreIndice=='PorId') {
			$sNombreIndice='Tipo=Por Id';
		} else if($sNombreIndice=='FK_Idusuario') {
			$sNombreIndice='Tipo=  Por Usuario';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idusuario(int $id_usuario) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Usuario='+$id_usuario; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return resumen_usuario_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return resumen_usuario_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_NUMERO_INGRESOS);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_NUMERO_INGRESOS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_NUMERO_ERROR_INGRESO);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_NUMERO_ERROR_INGRESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_NUMERO_INTENTOS);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_NUMERO_INTENTOS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_NUMERO_CIERRES);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_NUMERO_CIERRES);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_NUMERO_REINICIOS);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_NUMERO_REINICIOS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_NUMERO_INGRESO_ACTUAL);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_NUMERO_INGRESO_ACTUAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_FECHA_ULTIMO_INGRESO);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_FECHA_ULTIMO_INGRESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_FECHA_ULTIMO_ERROR_INGRESO);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_FECHA_ULTIMO_ERROR_INGRESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_FECHA_ULTIMO_INTENTO);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_FECHA_ULTIMO_INTENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(resumen_usuario_util::$LABEL_FECHA_ULTIMO_CIERRE);
			$reporte->setsDescripcion(resumen_usuario_util::$LABEL_FECHA_ULTIMO_CIERRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=resumen_usuario_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==resumen_usuario_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=resumen_usuario_util::$ID_USUARIO;
		}
		
		return $arrColumnasGlobales;
	}
	
	public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		
		
		return $arrColumnasGlobales;
	}
	
	/*DEEP CLASSES*/
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(usuario::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	/*ORDER*/
	public static function getOrderByLista() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_ID, resumen_usuario_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_ID_USUARIO, resumen_usuario_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_NUMERO_INGRESOS, resumen_usuario_util::$NUMERO_INGRESOS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_NUMERO_ERROR_INGRESO, resumen_usuario_util::$NUMERO_ERROR_INGRESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_NUMERO_INTENTOS, resumen_usuario_util::$NUMERO_INTENTOS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_NUMERO_CIERRES, resumen_usuario_util::$NUMERO_CIERRES,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_NUMERO_REINICIOS, resumen_usuario_util::$NUMERO_REINICIOS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_NUMERO_INGRESO_ACTUAL, resumen_usuario_util::$NUMERO_INGRESO_ACTUAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_FECHA_ULTIMO_INGRESO, resumen_usuario_util::$FECHA_ULTIMO_INGRESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_FECHA_ULTIMO_ERROR_INGRESO, resumen_usuario_util::$FECHA_ULTIMO_ERROR_INGRESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_FECHA_ULTIMO_INTENTO, resumen_usuario_util::$FECHA_ULTIMO_INTENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,resumen_usuario_util::$LABEL_FECHA_ULTIMO_CIERRE, resumen_usuario_util::$FECHA_ULTIMO_CIERRE,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		if($orderBy!=null);
		
		return $arrOrderBy;
	}
	
	/*REPORTES*/
		
	
	/*REPORTES CODIGO*/
	public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$header=array();
		$cellReport=new CellReport();
		$blnFill=false;
		
		if($tipo=='RELACIONADO') {
			$blnFill=true;
			
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,7,1); $cellReport->setblnFill($blnFill); $header[]=$cellReport;			
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Ingresos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Ingresos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Error Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Error Ingreso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Intentos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Intentos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cierres',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cierres',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Reinicios',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Reinicios',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Ingreso Actual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Ingreso Actual',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultimo Ingreso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Error Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultimo Error Ingreso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Intento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultimo Intento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Cierre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultimo Cierre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',resumen_usuario $resumen_usuario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Ingresos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getnumero_ingresos(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Error Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getnumero_error_ingreso(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Intentos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getnumero_intentos(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cierres',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getnumero_cierres(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Reinicios',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getnumero_reinicios(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Ingreso Actual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getnumero_ingreso_actual(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getfecha_ultimo_ingreso(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Error Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getfecha_ultimo_error_ingreso(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Intento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getfecha_ultimo_intento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Cierre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($resumen_usuario->getfecha_ultimo_cierre(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getusuarioDescripcion(?usuario $usuario) : string {
		$sDescripcion='none';
		if($usuario!==null) {
			$sDescripcion=usuario_util::getusuarioDescripcion($usuario);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface resumen_usuario_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $resumen_usuarios,int $iIdNuevoresumen_usuario) : int;	
		public static function getIndiceActual(array $resumen_usuarios,resumen_usuario $resumen_usuario,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getresumen_usuarioDescripcion(?resumen_usuario $resumen_usuario) : string {;	
		public static function setresumen_usuarioDescripcion(?resumen_usuario $resumen_usuario,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $resumen_usuarios) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $resumen_usuarios);	
		public static function refrescarFKDescripcion(resumen_usuario $resumen_usuario);
				
		//SELECCIONAR
		public static function getTiposSeleccionar(bool $conFk) : array;	
		public static function getTiposSeleccionar2() : array;	
		public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array;
		
		//GLOBAL
		public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array;	
		public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array;	
		public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array;
		
		//DEEP CLASSES
		public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;
		
		
		public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
		
		
		//ORDER
		public static function getOrderByLista() : array;	
		public static function getOrderByListaRel() : array;	
		
		//REPORTES CODIGO
		public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array;	
		public static function getDataReportRow(string $tipo='NORMAL',resumen_usuario $resumen_usuario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

