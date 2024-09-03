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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;

class tipo_cuenta_predefinida_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='tipo_cuenta_predefinida';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.tipo_cuenta_predefinidas';
	/*'Mantenimientotipo_cuenta_predefinida.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientotipo_cuenta_predefinida.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='tipo_cuenta_predefinidaPersistenceName';
	/*.tipo_cuenta_predefinida_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='tipo_cuenta_predefinida_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='tipo_cuenta_predefinida_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='tipo_cuenta_predefinida_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Tipo Cuentas';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Tipo Cuenta';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='tipo_cuenta_predefinida';
	public static string $TIPO_CUENTA_PREDEFINIDA='con_tipo_cuenta_predefinida';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.tipo_cuenta_predefinida';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion from '.tipo_cuenta_predefinida_util::$SCHEMA.'.'.tipo_cuenta_predefinida_util::$TABLENAME;*/
	
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
	//public $tipo_cuenta_predefinidaConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $DESCRIPCION='descripcion';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_DESCRIPCION='Descripcion';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_cuenta_predefinidaConstantesFuncionesAdditional=new $tipo_cuenta_predefinidaConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $tipo_cuenta_predefinidas,int $iIdNuevotipo_cuenta_predefinida) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaAux) {
			if($tipo_cuenta_predefinidaAux->getId()==$iIdNuevotipo_cuenta_predefinida) {
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
	
	public static function getIndiceActual(array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaAux) {
			if($tipo_cuenta_predefinidaAux->getId()==$tipo_cuenta_predefinida->getId()) {
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
	public static function gettipo_cuenta_predefinidaDescripcion(?tipo_cuenta_predefinida $tipo_cuenta_predefinida) : string {//tipo_cuenta_predefinida NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($tipo_cuenta_predefinida !=null) {
			/*&& tipo_cuenta_predefinida->getId()!=0*/
			
			$sDescripcion=($tipo_cuenta_predefinida->getnombre());
			
			/*tipo_cuenta_predefinida;*/
		}
			
		return $sDescripcion;
	}
	
	public static function settipo_cuenta_predefinidaDescripcion(?tipo_cuenta_predefinida $tipo_cuenta_predefinida,string $sValor) {			
		if($tipo_cuenta_predefinida !=null) {
			$tipo_cuenta_predefinida->setnombre($sValor);;
			/*tipo_cuenta_predefinida;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $tipo_cuenta_predefinidas) : array {
		$tipo_cuenta_predefinidasForeignKey=array();
		
		foreach ($tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal) {
			$tipo_cuenta_predefinidasForeignKey[$tipo_cuenta_predefinidaLocal->getId()]=tipo_cuenta_predefinida_util::gettipo_cuenta_predefinidaDescripcion($tipo_cuenta_predefinidaLocal);
		}
			
		return $tipo_cuenta_predefinidasForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $tipo_cuenta_predefinidas) {		
		try {
			
			$tipo_cuenta_predefinida = new tipo_cuenta_predefinida();
			
			foreach($tipo_cuenta_predefinidas as $tipo_cuenta_predefinida) {
				
			}
			
			if($tipo_cuenta_predefinida!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(tipo_cuenta_predefinida $tipo_cuenta_predefinida) {		
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
		return tipo_cuenta_predefinida_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return tipo_cuenta_predefinida_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(tipo_cuenta_predefinida_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(tipo_cuenta_predefinida_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(tipo_cuenta_predefinida_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(tipo_cuenta_predefinida_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(tipo_cuenta_predefinida_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(tipo_cuenta_predefinida_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=tipo_cuenta_predefinida_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(cuenta_predefinida::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==cuenta_predefinida::$class) {
						$classes[]=new Classe(cuenta_predefinida::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta_predefinida::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_predefinida::$class);
				}

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
		
		
		$orderBy=OrderBy::NewOrderBy(false,tipo_cuenta_predefinida_util::$LABEL_ID, tipo_cuenta_predefinida_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,tipo_cuenta_predefinida_util::$LABEL_CODIGO, tipo_cuenta_predefinida_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,tipo_cuenta_predefinida_util::$LABEL_NOMBRE, tipo_cuenta_predefinida_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,tipo_cuenta_predefinida_util::$LABEL_DESCRIPCION, tipo_cuenta_predefinida_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,cuenta_predefinida_util::$STR_CLASS_WEB_TITULO, cuenta_predefinida_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',tipo_cuenta_predefinida $tipo_cuenta_predefinida,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($tipo_cuenta_predefinida->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($tipo_cuenta_predefinida->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($tipo_cuenta_predefinida->getdescripcion(),40,6,1); $row[]=$cellReport;
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
	
	interface tipo_cuenta_predefinida_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $tipo_cuenta_predefinidas,int $iIdNuevotipo_cuenta_predefinida) : int;	
		public static function getIndiceActual(array $tipo_cuenta_predefinidas,tipo_cuenta_predefinida $tipo_cuenta_predefinida,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function gettipo_cuenta_predefinidaDescripcion(?tipo_cuenta_predefinida $tipo_cuenta_predefinida) : string {;	
		public static function settipo_cuenta_predefinidaDescripcion(?tipo_cuenta_predefinida $tipo_cuenta_predefinida,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $tipo_cuenta_predefinidas) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $tipo_cuenta_predefinidas);	
		public static function refrescarFKDescripcion(tipo_cuenta_predefinida $tipo_cuenta_predefinida);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',tipo_cuenta_predefinida $tipo_cuenta_predefinida,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

