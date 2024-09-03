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

namespace com\bydan\contabilidad\contabilidad\periodo\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL


class periodo_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='periodo';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.periodos';
	/*'Mantenimientoperiodo.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoperiodo.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='periodoPersistenceName';
	/*.periodo_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='periodo_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='periodo_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='periodo_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='periodos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='periodo';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='periodo';
	public static string $PERIODO='con_periodo';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.periodo';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_inicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_fin,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo from '.periodo_util::$SCHEMA.'.'.periodo_util::$TABLENAME;*/
	
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
	//public $periodoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $NOMBRE='nombre';
    public static string $FECHA_INICIO='fecha_inicio';
    public static string $FECHA_FIN='fecha_fin';
    public static string $DESCRIPCION='descripcion';
    public static string $ACTIVO='activo';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_FECHA_INICIO='Fecha Inicio';
    public static string $LABEL_FECHA_FIN='Fecha Fin';
    public static string $LABEL_DESCRIPCION='descripcion';
    public static string $LABEL_ACTIVO='Activo';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->periodoConstantesFuncionesAdditional=new $periodoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $periodos,int $iIdNuevoperiodo) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($periodos as $periodoAux) {
			if($periodoAux->getId()==$iIdNuevoperiodo) {
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
	
	public static function getIndiceActual(array $periodos,periodo $periodo,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($periodos as $periodoAux) {
			if($periodoAux->getId()==$periodo->getId()) {
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
	public static function getperiodoDescripcion(?periodo $periodo) : string {//periodo NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($periodo !=null) {
			/*&& periodo->getId()!=0*/
			
			$sDescripcion=($periodo->getnombre());
			
			/*periodo;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setperiodoDescripcion(?periodo $periodo,string $sValor) {			
		if($periodo !=null) {
			$periodo->setnombre($sValor);;
			/*periodo;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $periodos) : array {
		$periodosForeignKey=array();
		
		foreach ($periodos as $periodoLocal) {
			$periodosForeignKey[$periodoLocal->getId()]=periodo_util::getperiodoDescripcion($periodoLocal);
		}
			
		return $periodosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelfecha_inicio() : string  { return 'Fecha Inicio'; }
    public static function getColumnLabelfecha_fin() : string  { return 'Fecha Fin'; }
    public static function getColumnLabeldescripcion() : string  { return 'descripcion'; }
    public static function getColumnLabelactivo() : string  { return 'Activo'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getactivoDescripcion($periodo) {
		$sDescripcion='Verdadero';
		if(!$periodo->getactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $periodos) {		
		try {
			
			$periodo = new periodo();
			
			foreach($periodos as $periodo) {
				
			}
			
			if($periodo!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(periodo $periodo) {		
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
		return periodo_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return periodo_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(periodo_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(periodo_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(periodo_util::$LABEL_FECHA_INICIO);
			$reporte->setsDescripcion(periodo_util::$LABEL_FECHA_INICIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(periodo_util::$LABEL_FECHA_FIN);
			$reporte->setsDescripcion(periodo_util::$LABEL_FECHA_FIN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(periodo_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(periodo_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(periodo_util::$LABEL_ACTIVO);
			$reporte->setsDescripcion(periodo_util::$LABEL_ACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=periodo_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,periodo_util::$LABEL_ID, periodo_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,periodo_util::$LABEL_NOMBRE, periodo_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,periodo_util::$LABEL_FECHA_INICIO, periodo_util::$FECHA_INICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,periodo_util::$LABEL_FECHA_FIN, periodo_util::$FECHA_FIN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,periodo_util::$LABEL_DESCRIPCION, periodo_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,periodo_util::$LABEL_ACTIVO, periodo_util::$ACTIVO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Inicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Inicio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Fin',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Fin',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Activo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',periodo $periodo,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($periodo->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Inicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($periodo->getfecha_inicio(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Fin',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($periodo->getfecha_fin(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($periodo->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($periodo->getactivo()),40,6,1); $row[]=$cellReport;
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
	
	interface periodo_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $periodos,int $iIdNuevoperiodo) : int;	
		public static function getIndiceActual(array $periodos,periodo $periodo,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getperiodoDescripcion(?periodo $periodo) : string {;	
		public static function setperiodoDescripcion(?periodo $periodo,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $periodos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $periodos);	
		public static function refrescarFKDescripcion(periodo $periodo);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',periodo $periodo,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

