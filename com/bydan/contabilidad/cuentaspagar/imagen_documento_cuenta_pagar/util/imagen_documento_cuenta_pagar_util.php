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

namespace com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity\imagen_documento_cuenta_pagar;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;

//REL


class imagen_documento_cuenta_pagar_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='imagen_documento_cuenta_pagar';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_pagar.imagen_documento_cuenta_pagars';
	/*'Mantenimientoimagen_documento_cuenta_pagar.jsf';*/
	public static string $STR_MODULO_OPCION='cuentaspagar';
	public static string $STR_NOMBRE_CLASE='Mantenimientoimagen_documento_cuenta_pagar.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='imagen_documento_cuenta_pagarPersistenceName';
	/*.imagen_documento_cuenta_pagar_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='imagen_documento_cuenta_pagar_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='imagen_documento_cuenta_pagar_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='imagen_documento_cuenta_pagar_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Imagenes Documentos Cuentas por Pagares';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Imagenes Documentos Cuentas por Pagar';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASPAGAR='cuentaspagar';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $STR_TABLE_NAME='imagen_documento_cuenta_pagar';
	public static string $IMAGEN_DOCUMENTO_CUENTA_PAGAR='cp_imagen_documento_cuenta_pagar';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.imagen_documento_cuenta_pagar';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_cuenta_pagar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento from '.imagen_documento_cuenta_pagar_util::$SCHEMA.'.'.imagen_documento_cuenta_pagar_util::$TABLENAME;*/
	
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
	//public $imagen_documento_cuenta_pagarConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $IMAGEN='imagen';
    public static string $ID_DOCUMENTO_CUENTA_PAGAR='id_documento_cuenta_pagar';
    public static string $NRO_DOCUMENTO='nro_documento';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_IMAGEN='Imagen';
    public static string $LABEL_ID_DOCUMENTO_CUENTA_PAGAR='Id Docs';
    public static string $LABEL_NRO_DOCUMENTO='Nro Documento';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_documento_cuenta_pagarConstantesFuncionesAdditional=new $imagen_documento_cuenta_pagarConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $imagen_documento_cuenta_pagars,int $iIdNuevoimagen_documento_cuenta_pagar) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagarAux) {
			if($imagen_documento_cuenta_pagarAux->getId()==$iIdNuevoimagen_documento_cuenta_pagar) {
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
	
	public static function getIndiceActual(array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagarAux) {
			if($imagen_documento_cuenta_pagarAux->getId()==$imagen_documento_cuenta_pagar->getId()) {
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
	public static function getimagen_documento_cuenta_pagarDescripcion(?imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar) : string {//imagen_documento_cuenta_pagar NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($imagen_documento_cuenta_pagar !=null) {
			/*&& imagen_documento_cuenta_pagar->getId()!=0*/
			
			$sDescripcion=$imagen_documento_cuenta_pagar->getimagen();
			
			/*imagen_documento_cuenta_pagar;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setimagen_documento_cuenta_pagarDescripcion(?imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,string $sValor) {			
		if($imagen_documento_cuenta_pagar !=null) {
			$imagen_documento_cuenta_pagar->setimagen($sValor);
			/*imagen_documento_cuenta_pagar;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $imagen_documento_cuenta_pagars) : array {
		$imagen_documento_cuenta_pagarsForeignKey=array();
		
		foreach ($imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagarLocal) {
			$imagen_documento_cuenta_pagarsForeignKey[$imagen_documento_cuenta_pagarLocal->getId()]=imagen_documento_cuenta_pagar_util::getimagen_documento_cuenta_pagarDescripcion($imagen_documento_cuenta_pagarLocal);
		}
			
		return $imagen_documento_cuenta_pagarsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }
    public static function getColumnLabelid_documento_cuenta_pagar() : string  { return 'Id Docs'; }
    public static function getColumnLabelnro_documento() : string  { return 'Nro Documento'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $imagen_documento_cuenta_pagars) {		
		try {
			
			$imagen_documento_cuenta_pagar = new imagen_documento_cuenta_pagar();
			
			foreach($imagen_documento_cuenta_pagars as $imagen_documento_cuenta_pagar) {
				
				$imagen_documento_cuenta_pagar->setid_documento_cuenta_pagar_Descripcion(imagen_documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar()));
			}
			
			if($imagen_documento_cuenta_pagar!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar) {		
		try {
			
			
				$imagen_documento_cuenta_pagar->setid_documento_cuenta_pagar_Descripcion(imagen_documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($imagen_documento_cuenta_pagar->getdocumento_cuenta_pagar()));
							
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
		} else if($sNombreIndice=='FK_Iddocumento_cuenta_pagar') {
			$sNombreIndice='Tipo=  Por Id Docs';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Iddocumento_cuenta_pagar(int $id_documento_cuenta_pagar) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Id Docs='+$id_documento_cuenta_pagar; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return imagen_documento_cuenta_pagar_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return imagen_documento_cuenta_pagar_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_documento_cuenta_pagar_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(imagen_documento_cuenta_pagar_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_documento_cuenta_pagar_util::$LABEL_ID_DOCUMENTO_CUENTA_PAGAR);
			$reporte->setsDescripcion(imagen_documento_cuenta_pagar_util::$LABEL_ID_DOCUMENTO_CUENTA_PAGAR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_documento_cuenta_pagar_util::$LABEL_NRO_DOCUMENTO);
			$reporte->setsDescripcion(imagen_documento_cuenta_pagar_util::$LABEL_NRO_DOCUMENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=imagen_documento_cuenta_pagar_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(documento_cuenta_pagar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==documento_cuenta_pagar::$class) {
						$classes[]=new Classe(documento_cuenta_pagar::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==documento_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_pagar::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,imagen_documento_cuenta_pagar_util::$LABEL_ID, imagen_documento_cuenta_pagar_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_documento_cuenta_pagar_util::$LABEL_IMAGEN, imagen_documento_cuenta_pagar_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_documento_cuenta_pagar_util::$LABEL_ID_DOCUMENTO_CUENTA_PAGAR, imagen_documento_cuenta_pagar_util::$ID_DOCUMENTO_CUENTA_PAGAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_documento_cuenta_pagar_util::$LABEL_NRO_DOCUMENTO, imagen_documento_cuenta_pagar_util::$NRO_DOCUMENTO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Docs',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Docs',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_documento_cuenta_pagar->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Docs',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_documento_cuenta_pagar->getid_documento_cuenta_pagar_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_documento_cuenta_pagar->getnro_documento(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getdocumento_cuenta_pagarDescripcion(?documento_cuenta_pagar $documento_cuenta_pagar) : string {
		$sDescripcion='none';
		if($documento_cuenta_pagar!==null) {
			$sDescripcion=documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagar);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface imagen_documento_cuenta_pagar_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $imagen_documento_cuenta_pagars,int $iIdNuevoimagen_documento_cuenta_pagar) : int;	
		public static function getIndiceActual(array $imagen_documento_cuenta_pagars,imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getimagen_documento_cuenta_pagarDescripcion(?imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar) : string {;	
		public static function setimagen_documento_cuenta_pagarDescripcion(?imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $imagen_documento_cuenta_pagars) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $imagen_documento_cuenta_pagars);	
		public static function refrescarFKDescripcion(imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',imagen_documento_cuenta_pagar $imagen_documento_cuenta_pagar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

