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

namespace com\bydan\contabilidad\seguridad\auditoria_detalle\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity\auditoria_detalle;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;

//REL


class auditoria_detalle_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='auditoria_detalle';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.auditoria_detalles';
	/*'Mantenimientoauditoria_detalle.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoauditoria_detalle.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='auditoria_detallePersistenceName';
	/*.auditoria_detalle_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='auditoria_detalle_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='auditoria_detalle_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='auditoria_detalle_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Auditoria Detalles';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Auditoria Detalle';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='auditoria_detalle';
	public static string $AUDITORIA_DETALLE='seg_auditoria_detalle';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.auditoria_detalle';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_auditoria,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_campo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_anterior,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor_actual from '.auditoria_detalle_util::$SCHEMA.'.'.auditoria_detalle_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=true;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $auditoria_detalleConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_AUDITORIA='id_auditoria';
    public static string $NOMBRE_CAMPO='nombre_campo';
    public static string $VALOR_ANTERIOR='valor_anterior';
    public static string $VALOR_ACTUAL='valor_actual';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='A';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_AUDITORIA='Auditoria';
    public static string $LABEL_NOMBRE_CAMPO='Nombre Del Campo';
    public static string $LABEL_VALOR_ANTERIOR='Valor Anterior';
    public static string $LABEL_VALOR_ACTUAL='Valor Actual';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->auditoria_detalleConstantesFuncionesAdditional=new $auditoria_detalleConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $auditoria_detalles,int $iIdNuevoauditoria_detalle) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($auditoria_detalles as $auditoria_detalleAux) {
			if($auditoria_detalleAux->getId()==$iIdNuevoauditoria_detalle) {
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
	
	public static function getIndiceActual(array $auditoria_detalles,auditoria_detalle $auditoria_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($auditoria_detalles as $auditoria_detalleAux) {
			if($auditoria_detalleAux->getId()==$auditoria_detalle->getId()) {
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
	public static function getauditoria_detalleDescripcion(?auditoria_detalle $auditoria_detalle) : string {//auditoria_detalle NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($auditoria_detalle !=null) {
			/*&& auditoria_detalle->getId()!=0*/
			
			$sDescripcion=$auditoria_detalle->getnombre_campo();
			
			/*auditoria_detalle;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setauditoria_detalleDescripcion(?auditoria_detalle $auditoria_detalle,string $sValor) {			
		if($auditoria_detalle !=null) {
			$auditoria_detalle->setnombre_campo($sValor);
			/*auditoria_detalle;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $auditoria_detalles) : array {
		$auditoria_detallesForeignKey=array();
		
		foreach ($auditoria_detalles as $auditoria_detalleLocal) {
			$auditoria_detallesForeignKey[$auditoria_detalleLocal->getId()]=auditoria_detalle_util::getauditoria_detalleDescripcion($auditoria_detalleLocal);
		}
			
		return $auditoria_detallesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_auditoria() : string  { return 'Auditoria'; }
    public static function getColumnLabelnombre_campo() : string  { return 'Nombre Del Campo'; }
    public static function getColumnLabelvalor_anterior() : string  { return 'Valor Anterior'; }
    public static function getColumnLabelvalor_actual() : string  { return 'Valor Actual'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $auditoria_detalles) {		
		try {
			
			$auditoria_detalle = new auditoria_detalle();
			
			foreach($auditoria_detalles as $auditoria_detalle) {
				
				$auditoria_detalle->setid_auditoria_Descripcion(auditoria_detalle_util::getauditoriaDescripcion($auditoria_detalle->getauditoria()));
			}
			
			if($auditoria_detalle!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(auditoria_detalle $auditoria_detalle) {		
		try {
			
			
				$auditoria_detalle->setid_auditoria_Descripcion(auditoria_detalle_util::getauditoriaDescripcion($auditoria_detalle->getauditoria()));
							
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
		} else if($sNombreIndice=='BusquedaPorIdAuditoriaPorNombreCampo') {
			$sNombreIndice='Tipo=  Por Auditoria Por Nombre Del Campo';
		} else if($sNombreIndice=='FK_Idauditoria') {
			$sNombreIndice='Tipo=  Por Auditoria';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceBusquedaPorIdAuditoriaPorNombreCampo(int $id_auditoria,string $nombre_campo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Auditoria='+$id_auditoria;
		$sDetalleIndice.=' Nombre Del Campo='+$nombre_campo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idauditoria(int $id_auditoria) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Auditoria='+$id_auditoria; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return auditoria_detalle_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return auditoria_detalle_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_detalle_util::$LABEL_ID_AUDITORIA);
			$reporte->setsDescripcion(auditoria_detalle_util::$LABEL_ID_AUDITORIA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_detalle_util::$LABEL_NOMBRE_CAMPO);
			$reporte->setsDescripcion(auditoria_detalle_util::$LABEL_NOMBRE_CAMPO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_detalle_util::$LABEL_VALOR_ANTERIOR);
			$reporte->setsDescripcion(auditoria_detalle_util::$LABEL_VALOR_ANTERIOR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(auditoria_detalle_util::$LABEL_VALOR_ACTUAL);
			$reporte->setsDescripcion(auditoria_detalle_util::$LABEL_VALOR_ACTUAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=auditoria_detalle_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(auditoria::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==auditoria::$class) {
						$classes[]=new Classe(auditoria::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==auditoria::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(auditoria::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,auditoria_detalle_util::$LABEL_ID, auditoria_detalle_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_detalle_util::$LABEL_ID_AUDITORIA, auditoria_detalle_util::$ID_AUDITORIA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_detalle_util::$LABEL_NOMBRE_CAMPO, auditoria_detalle_util::$NOMBRE_CAMPO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_detalle_util::$LABEL_VALOR_ANTERIOR, auditoria_detalle_util::$VALOR_ANTERIOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,auditoria_detalle_util::$LABEL_VALOR_ACTUAL, auditoria_detalle_util::$VALOR_ACTUAL,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Auditoria',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Auditoria',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Del Campo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Del Campo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Anterior',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Anterior',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Actual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Actual',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',auditoria_detalle $auditoria_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Auditoria',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria_detalle->getid_auditoria_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Del Campo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria_detalle->getnombre_campo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Anterior',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria_detalle->getvalor_anterior(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor Actual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($auditoria_detalle->getvalor_actual(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getauditoriaDescripcion(?auditoria $auditoria) : string {
		$sDescripcion='none';
		if($auditoria!==null) {
			$sDescripcion=auditoria_util::getauditoriaDescripcion($auditoria);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface auditoria_detalle_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $auditoria_detalles,int $iIdNuevoauditoria_detalle) : int;	
		public static function getIndiceActual(array $auditoria_detalles,auditoria_detalle $auditoria_detalle,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getauditoria_detalleDescripcion(?auditoria_detalle $auditoria_detalle) : string {;	
		public static function setauditoria_detalleDescripcion(?auditoria_detalle $auditoria_detalle,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $auditoria_detalles) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $auditoria_detalles);	
		public static function refrescarFKDescripcion(auditoria_detalle $auditoria_detalle);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',auditoria_detalle $auditoria_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

