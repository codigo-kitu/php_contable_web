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

namespace com\bydan\contabilidad\seguridad\parametro_general_sg\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\parametro_general_sg\business\entity\parametro_general_sg;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL


class parametro_general_sg_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_general_sg';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.parametro_general_sgs';
	/*'Mantenimientoparametro_general_sg.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_general_sg.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_general_sgPersistenceName';
	/*.parametro_general_sg_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_general_sg_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_general_sg_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_general_sg_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro Generales';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Parametro General';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='parametro_general_sg';
	public static string $PARAMETRO_GENERAL_SG='seg_parametro_general_sg';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_general_sg';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_simple_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.version_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siglas_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mail_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.representante_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_proceso_actualizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.esta_activo from '.parametro_general_sg_util::$SCHEMA.'.'.parametro_general_sg_util::$TABLENAME;*/
	
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
	//public $parametro_general_sgConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $NOMBRE_SISTEMA='nombre_sistema';
    public static string $NOMBRE_SIMPLE_SISTEMA='nombre_simple_sistema';
    public static string $NOMBRE_EMPRESA='nombre_empresa';
    public static string $VERSION_SISTEMA='version_sistema';
    public static string $SIGLAS_SISTEMA='siglas_sistema';
    public static string $MAIL_SISTEMA='mail_sistema';
    public static string $TELEFONO_SISTEMA='telefono_sistema';
    public static string $FAX_SISTEMA='fax_sistema';
    public static string $REPRESENTANTE_NOMBRE='representante_nombre';
    public static string $CODIGO_PROCESO_ACTUALIZACION='codigo_proceso_actualizacion';
    public static string $ESTA_ACTIVO='esta_activo';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_NOMBRE_SISTEMA='Nombre Sistema';
    public static string $LABEL_NOMBRE_SIMPLE_SISTEMA='Nombre Simple Sistema';
    public static string $LABEL_NOMBRE_EMPRESA='Nombre Empresa';
    public static string $LABEL_VERSION_SISTEMA='Version Sistema';
    public static string $LABEL_SIGLAS_SISTEMA='Siglas Sistema';
    public static string $LABEL_MAIL_SISTEMA='Mail Sistema';
    public static string $LABEL_TELEFONO_SISTEMA='Telefono Sistema';
    public static string $LABEL_FAX_SISTEMA='Fax Sistema';
    public static string $LABEL_REPRESENTANTE_NOMBRE='Representante Nombre';
    public static string $LABEL_CODIGO_PROCESO_ACTUALIZACION='Codigo Proceso Actualizacion';
    public static string $LABEL_ESTA_ACTIVO='Esta Activo';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_sgConstantesFuncionesAdditional=new $parametro_general_sgConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_general_sgs,int $iIdNuevoparametro_general_sg) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_general_sgs as $parametro_general_sgAux) {
			if($parametro_general_sgAux->getId()==$iIdNuevoparametro_general_sg) {
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
	
	public static function getIndiceActual(array $parametro_general_sgs,parametro_general_sg $parametro_general_sg,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_general_sgs as $parametro_general_sgAux) {
			if($parametro_general_sgAux->getId()==$parametro_general_sg->getId()) {
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
	public static function getparametro_general_sgDescripcion(?parametro_general_sg $parametro_general_sg) : string {//parametro_general_sg NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_general_sg !=null) {
			/*&& parametro_general_sg->getId()!=0*/
			
			$sDescripcion=($parametro_general_sg->getnombre_simple_sistema());
			
			/*parametro_general_sg;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_general_sgDescripcion(?parametro_general_sg $parametro_general_sg,string $sValor) {			
		if($parametro_general_sg !=null) {
			$parametro_general_sg->setnombre_simple_sistema($sValor);;
			/*parametro_general_sg;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_general_sgs) : array {
		$parametro_general_sgsForeignKey=array();
		
		foreach ($parametro_general_sgs as $parametro_general_sgLocal) {
			$parametro_general_sgsForeignKey[$parametro_general_sgLocal->getId()]=parametro_general_sg_util::getparametro_general_sgDescripcion($parametro_general_sgLocal);
		}
			
		return $parametro_general_sgsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelnombre_sistema() : string  { return 'Nombre Sistema'; }
    public static function getColumnLabelnombre_simple_sistema() : string  { return 'Nombre Simple Sistema'; }
    public static function getColumnLabelnombre_empresa() : string  { return 'Nombre Empresa'; }
    public static function getColumnLabelversion_sistema() : string  { return 'Version Sistema'; }
    public static function getColumnLabelsiglas_sistema() : string  { return 'Siglas Sistema'; }
    public static function getColumnLabelmail_sistema() : string  { return 'Mail Sistema'; }
    public static function getColumnLabeltelefono_sistema() : string  { return 'Telefono Sistema'; }
    public static function getColumnLabelfax_sistema() : string  { return 'Fax Sistema'; }
    public static function getColumnLabelrepresentante_nombre() : string  { return 'Representante Nombre'; }
    public static function getColumnLabelcodigo_proceso_actualizacion() : string  { return 'Codigo Proceso Actualizacion'; }
    public static function getColumnLabelesta_activo() : string  { return 'Esta Activo'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getesta_activoDescripcion($parametro_general_sg) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_sg->getesta_activo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_general_sgs) {		
		try {
			
			$parametro_general_sg = new parametro_general_sg();
			
			foreach($parametro_general_sgs as $parametro_general_sg) {
				
			}
			
			if($parametro_general_sg!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_general_sg $parametro_general_sg) {		
		try {
			
			
							
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
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return parametro_general_sg_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_general_sg_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_NOMBRE_SISTEMA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_NOMBRE_SISTEMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_NOMBRE_SIMPLE_SISTEMA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_NOMBRE_SIMPLE_SISTEMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_NOMBRE_EMPRESA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_NOMBRE_EMPRESA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_VERSION_SISTEMA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_VERSION_SISTEMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_SIGLAS_SISTEMA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_SIGLAS_SISTEMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_MAIL_SISTEMA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_MAIL_SISTEMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_TELEFONO_SISTEMA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_TELEFONO_SISTEMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_FAX_SISTEMA);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_FAX_SISTEMA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_REPRESENTANTE_NOMBRE);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_REPRESENTANTE_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_CODIGO_PROCESO_ACTUALIZACION);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_CODIGO_PROCESO_ACTUALIZACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_sg_util::$LABEL_ESTA_ACTIVO);
			$reporte->setsDescripcion(parametro_general_sg_util::$LABEL_ESTA_ACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_general_sg_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		
		
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_ID, parametro_general_sg_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_NOMBRE_SISTEMA, parametro_general_sg_util::$NOMBRE_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_NOMBRE_SIMPLE_SISTEMA, parametro_general_sg_util::$NOMBRE_SIMPLE_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_NOMBRE_EMPRESA, parametro_general_sg_util::$NOMBRE_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_VERSION_SISTEMA, parametro_general_sg_util::$VERSION_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_SIGLAS_SISTEMA, parametro_general_sg_util::$SIGLAS_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_MAIL_SISTEMA, parametro_general_sg_util::$MAIL_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_TELEFONO_SISTEMA, parametro_general_sg_util::$TELEFONO_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_FAX_SISTEMA, parametro_general_sg_util::$FAX_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_REPRESENTANTE_NOMBRE, parametro_general_sg_util::$REPRESENTANTE_NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_CODIGO_PROCESO_ACTUALIZACION, parametro_general_sg_util::$CODIGO_PROCESO_ACTUALIZACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_sg_util::$LABEL_ESTA_ACTIVO, parametro_general_sg_util::$ESTA_ACTIVO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Simple Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Simple Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Version Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Version Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siglas Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siglas Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mail Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mail Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fax Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Representante Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Representante Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Proceso Actualizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Proceso Actualizacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Esta Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Esta Activo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_general_sg $parametro_general_sg,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getnombre_sistema(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Simple Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getnombre_simple_sistema(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getnombre_empresa(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Version Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getversion_sistema(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siglas Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getsiglas_sistema(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mail Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getmail_sistema(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->gettelefono_sistema(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getfax_sistema(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Representante Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getrepresentante_nombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Proceso Actualizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_sg->getcodigo_proceso_actualizacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Esta Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_sg->getesta_activo()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface parametro_general_sg_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_general_sgs,int $iIdNuevoparametro_general_sg) : int;	
		public static function getIndiceActual(array $parametro_general_sgs,parametro_general_sg $parametro_general_sg,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_general_sgDescripcion(?parametro_general_sg $parametro_general_sg) : string {;	
		public static function setparametro_general_sgDescripcion(?parametro_general_sg $parametro_general_sg,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_general_sgs) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_general_sgs);	
		public static function refrescarFKDescripcion(parametro_general_sg $parametro_general_sg);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',parametro_general_sg $parametro_general_sg,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

