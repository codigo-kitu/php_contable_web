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

namespace com\bydan\contabilidad\contabilidad\documento_contable\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

class documento_contable_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='documento_contable';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='contabilidad.documento_contables';
	/*'Mantenimientodocumento_contable.jsf';*/
	public static string $STR_MODULO_OPCION='contabilidad';
	public static string $STR_NOMBRE_CLASE='Mantenimientodocumento_contable.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='documento_contablePersistenceName';
	/*.documento_contable_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='documento_contable_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='documento_contable_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='documento_contable_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Documento Contables';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Documento Contable';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CONTABILIDAD='contabilidad';
	public static string $STR_PREFIJO_TABLE='con_';
	public static string $STR_TABLE_NAME='documento_contable';
	public static string $DOCUMENTO_CONTABLE='con_documento_contable';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.documento_contable';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.secuencial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.reinicia_secuencial_mes,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.generado_por from '.documento_contable_util::$SCHEMA.'.'.documento_contable_util::$TABLENAME;*/
	
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
	//public $documento_contableConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $SECUENCIAL='secuencial';
    public static string $INCREMENTO='incremento';
    public static string $REINICIA_SECUENCIAL_MES='reinicia_secuencial_mes';
    public static string $GENERADO_POR='generado_por';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_SECUENCIAL='Secuencial';
    public static string $LABEL_INCREMENTO='Incremento';
    public static string $LABEL_REINICIA_SECUENCIAL_MES='Reinicia Secuencial Mes';
    public static string $LABEL_GENERADO_POR='Generado Por';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_contableConstantesFuncionesAdditional=new $documento_contableConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $documento_contables,int $iIdNuevodocumento_contable) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($documento_contables as $documento_contableAux) {
			if($documento_contableAux->getId()==$iIdNuevodocumento_contable) {
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
	
	public static function getIndiceActual(array $documento_contables,documento_contable $documento_contable,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($documento_contables as $documento_contableAux) {
			if($documento_contableAux->getId()==$documento_contable->getId()) {
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
	public static function getdocumento_contableDescripcion(?documento_contable $documento_contable) : string {//documento_contable NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($documento_contable !=null) {
			/*&& documento_contable->getId()!=0*/
			
			$sDescripcion=($documento_contable->getnombre());
			
			/*documento_contable;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setdocumento_contableDescripcion(?documento_contable $documento_contable,string $sValor) {			
		if($documento_contable !=null) {
			$documento_contable->setnombre($sValor);;
			/*documento_contable;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $documento_contables) : array {
		$documento_contablesForeignKey=array();
		
		foreach ($documento_contables as $documento_contableLocal) {
			$documento_contablesForeignKey[$documento_contableLocal->getId()]=documento_contable_util::getdocumento_contableDescripcion($documento_contableLocal);
		}
			
		return $documento_contablesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelsecuencial() : string  { return 'Secuencial'; }
    public static function getColumnLabelincremento() : string  { return 'Incremento'; }
    public static function getColumnLabelreinicia_secuencial_mes() : string  { return 'Reinicia Secuencial Mes'; }
    public static function getColumnLabelgenerado_por() : string  { return 'Generado Por'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getreinicia_secuencial_mesDescripcion($documento_contable) {
		$sDescripcion='Verdadero';
		if(!$documento_contable->getreinicia_secuencial_mes()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $documento_contables) {		
		try {
			
			$documento_contable = new documento_contable();
			
			foreach($documento_contables as $documento_contable) {
				
				$documento_contable->setid_empresa_Descripcion(documento_contable_util::getempresaDescripcion($documento_contable->getempresa()));
			}
			
			if($documento_contable!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(documento_contable $documento_contable) {		
		try {
			
			
				$documento_contable->setid_empresa_Descripcion(documento_contable_util::getempresaDescripcion($documento_contable->getempresa()));
							
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
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return documento_contable_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return documento_contable_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_contable_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(documento_contable_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_contable_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(documento_contable_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_contable_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(documento_contable_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_contable_util::$LABEL_SECUENCIAL);
			$reporte->setsDescripcion(documento_contable_util::$LABEL_SECUENCIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_contable_util::$LABEL_INCREMENTO);
			$reporte->setsDescripcion(documento_contable_util::$LABEL_INCREMENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_contable_util::$LABEL_REINICIA_SECUENCIAL_MES);
			$reporte->setsDescripcion(documento_contable_util::$LABEL_REINICIA_SECUENCIAL_MES);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_contable_util::$LABEL_GENERADO_POR);
			$reporte->setsDescripcion(documento_contable_util::$LABEL_GENERADO_POR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=documento_contable_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==documento_contable_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=documento_contable_util::$ID_EMPRESA;
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
				
				$classes[]=new Classe(empresa::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
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
				
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(asiento_predefinido::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==asiento_predefinido::$class) {
						$classes[]=new Classe(asiento_predefinido::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==asiento_predefinido::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento_predefinido::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_ID, documento_contable_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_ID_EMPRESA, documento_contable_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_CODIGO, documento_contable_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_NOMBRE, documento_contable_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_SECUENCIAL, documento_contable_util::$SECUENCIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_INCREMENTO, documento_contable_util::$INCREMENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_REINICIA_SECUENCIAL_MES, documento_contable_util::$REINICIA_SECUENCIAL_MES,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_contable_util::$LABEL_GENERADO_POR, documento_contable_util::$GENERADO_POR,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,asiento_util::$STR_CLASS_WEB_TITULO, asiento_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_predefinido_util::$STR_CLASS_WEB_TITULO, asiento_predefinido_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Secuencial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Secuencial',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Reinicia Secuencial Mes',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Reinicia Secuencial Mes',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',documento_contable $documento_contable,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_contable->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_contable->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_contable->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Secuencial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_contable->getsecuencial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_contable->getincremento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Reinicia Secuencial Mes',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($documento_contable->getreinicia_secuencial_mes()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getempresaDescripcion(?empresa $empresa) : string {
		$sDescripcion='none';
		if($empresa!==null) {
			$sDescripcion=empresa_util::getempresaDescripcion($empresa);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface documento_contable_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $documento_contables,int $iIdNuevodocumento_contable) : int;	
		public static function getIndiceActual(array $documento_contables,documento_contable $documento_contable,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getdocumento_contableDescripcion(?documento_contable $documento_contable) : string {;	
		public static function setdocumento_contableDescripcion(?documento_contable $documento_contable,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $documento_contables) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $documento_contables);	
		public static function refrescarFKDescripcion(documento_contable $documento_contable);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',documento_contable $documento_contable,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

