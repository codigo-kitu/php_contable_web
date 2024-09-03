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

namespace com\bydan\contabilidad\inventario\producto_equivalente\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\producto_equivalente\business\entity\producto_equivalente;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL


class producto_equivalente_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='producto_equivalente';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.producto_equivalentes';
	/*'Mantenimientoproducto_equivalente.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientoproducto_equivalente.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='producto_equivalentePersistenceName';
	/*.producto_equivalente_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='producto_equivalente_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='producto_equivalente_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='producto_equivalente_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Producto Equivalentess';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Producto Equivalentes';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='producto_equivalente';
	public static string $PRODUCTO_EQUIVALENTE='inv_producto_equivalente';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.producto_equivalente';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto_principal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto_equivalente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_id_principal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.producto_id_equivalente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comentario from '.producto_equivalente_util::$SCHEMA.'.'.producto_equivalente_util::$TABLENAME;*/
	
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
	//public $producto_equivalenteConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_PRODUCTO_PRINCIPAL='id_producto_principal';
    public static string $ID_PRODUCTO_EQUIVALENTE='id_producto_equivalente';
    public static string $PRODUCTO_ID_PRINCIPAL='producto_id_principal';
    public static string $PRODUCTO_ID_EQUIVALENTE='producto_id_equivalente';
    public static string $COMENTARIO='comentario';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_PRODUCTO_PRINCIPAL=' Producto Principal';
    public static string $LABEL_ID_PRODUCTO_EQUIVALENTE=' Producto Equivalente';
    public static string $LABEL_PRODUCTO_ID_PRINCIPAL='Producto Id Principal';
    public static string $LABEL_PRODUCTO_ID_EQUIVALENTE='Producto Id Equivalente';
    public static string $LABEL_COMENTARIO='Comentario';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_equivalenteConstantesFuncionesAdditional=new $producto_equivalenteConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $producto_equivalentes,int $iIdNuevoproducto_equivalente) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($producto_equivalentes as $producto_equivalenteAux) {
			if($producto_equivalenteAux->getId()==$iIdNuevoproducto_equivalente) {
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
	
	public static function getIndiceActual(array $producto_equivalentes,producto_equivalente $producto_equivalente,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($producto_equivalentes as $producto_equivalenteAux) {
			if($producto_equivalenteAux->getId()==$producto_equivalente->getId()) {
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
	public static function getproducto_equivalenteDescripcion(?producto_equivalente $producto_equivalente) : string {//producto_equivalente NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($producto_equivalente !=null) {
			/*&& producto_equivalente->getId()!=0*/
			
			if($producto_equivalente->getId()!=null) {
				$sDescripcion=(string)$producto_equivalente->getId();
			}
			
			/*producto_equivalente;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setproducto_equivalenteDescripcion(?producto_equivalente $producto_equivalente,string $sValor) {			
		if($producto_equivalente !=null) {
			
			/*producto_equivalente;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $producto_equivalentes) : array {
		$producto_equivalentesForeignKey=array();
		
		foreach ($producto_equivalentes as $producto_equivalenteLocal) {
			$producto_equivalentesForeignKey[$producto_equivalenteLocal->getId()]=producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalenteLocal);
		}
			
		return $producto_equivalentesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_producto_principal() : string  { return ' Producto Principal'; }
    public static function getColumnLabelid_producto_equivalente() : string  { return ' Producto Equivalente'; }
    public static function getColumnLabelproducto_id_principal() : string  { return 'Producto Id Principal'; }
    public static function getColumnLabelproducto_id_equivalente() : string  { return 'Producto Id Equivalente'; }
    public static function getColumnLabelcomentario() : string  { return 'Comentario'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $producto_equivalentes) {		
		try {
			
			$producto_equivalente = new producto_equivalente();
			
			foreach($producto_equivalentes as $producto_equivalente) {
				
				$producto_equivalente->setid_producto_principal_Descripcion(producto_equivalente_util::getproducto_principalDescripcion($producto_equivalente->getproducto_principal()));
				$producto_equivalente->setid_producto_equivalente_Descripcion(producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalente->getproducto_equivalente()));
			}
			
			if($producto_equivalente!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(producto_equivalente $producto_equivalente) {		
		try {
			
			
				$producto_equivalente->setid_producto_principal_Descripcion(producto_equivalente_util::getproducto_principalDescripcion($producto_equivalente->getproducto_principal()));
				$producto_equivalente->setid_producto_equivalente_Descripcion(producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalente->getproducto_equivalente()));
							
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
		} else if($sNombreIndice=='FK_Idproducto_equivalente') {
			$sNombreIndice='Tipo=  Por  Producto Equivalente';
		} else if($sNombreIndice=='FK_Idproducto_principal') {
			$sNombreIndice='Tipo=  Por  Producto Principal';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idproducto_equivalente(int $id_producto_equivalente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Producto Equivalente='+$id_producto_equivalente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproducto_principal(int $id_producto_principal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Producto Principal='+$id_producto_principal; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return producto_equivalente_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return producto_equivalente_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_equivalente_util::$LABEL_ID_PRODUCTO_PRINCIPAL);
			$reporte->setsDescripcion(producto_equivalente_util::$LABEL_ID_PRODUCTO_PRINCIPAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_equivalente_util::$LABEL_ID_PRODUCTO_EQUIVALENTE);
			$reporte->setsDescripcion(producto_equivalente_util::$LABEL_ID_PRODUCTO_EQUIVALENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_equivalente_util::$LABEL_PRODUCTO_ID_PRINCIPAL);
			$reporte->setsDescripcion(producto_equivalente_util::$LABEL_PRODUCTO_ID_PRINCIPAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_equivalente_util::$LABEL_PRODUCTO_ID_EQUIVALENTE);
			$reporte->setsDescripcion(producto_equivalente_util::$LABEL_PRODUCTO_ID_EQUIVALENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(producto_equivalente_util::$LABEL_COMENTARIO);
			$reporte->setsDescripcion(producto_equivalente_util::$LABEL_COMENTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=producto_equivalente_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(producto_equivalente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==producto_equivalente::$class) {
						$classes[]=new Classe(producto_equivalente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==producto_equivalente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto_equivalente::$class);
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
				
				$classes[]=new Classe(producto_equivalente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==producto_equivalente::$class) {
						$classes[]=new Classe(producto_equivalente::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==producto_equivalente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto_equivalente::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,producto_equivalente_util::$LABEL_ID, producto_equivalente_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_equivalente_util::$LABEL_ID_PRODUCTO_PRINCIPAL, producto_equivalente_util::$ID_PRODUCTO_PRINCIPAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_equivalente_util::$LABEL_ID_PRODUCTO_EQUIVALENTE, producto_equivalente_util::$ID_PRODUCTO_EQUIVALENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_equivalente_util::$LABEL_PRODUCTO_ID_PRINCIPAL, producto_equivalente_util::$PRODUCTO_ID_PRINCIPAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_equivalente_util::$LABEL_PRODUCTO_ID_EQUIVALENTE, producto_equivalente_util::$PRODUCTO_ID_EQUIVALENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_equivalente_util::$LABEL_COMENTARIO, producto_equivalente_util::$COMENTARIO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,producto_equivalente_util::$STR_CLASS_WEB_TITULO, producto_equivalente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Producto Principal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Producto Principal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Producto Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Producto Equivalente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Id Principal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Id Principal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Id Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Id Equivalente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comentario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comentario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',producto_equivalente $producto_equivalente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Producto Principal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto_equivalente->getid_producto_principal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Producto Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto_equivalente->getid_producto_equivalente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Id Principal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto_equivalente->getproducto_id_principal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto Id Equivalente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto_equivalente->getproducto_id_equivalente(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comentario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto_equivalente->getcomentario(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getproducto_principalDescripcion(?producto $producto) : string {
		$sDescripcion='none';
		if($producto!==null) {
			$sDescripcion=producto_util::getproductoDescripcion($producto);
		}
		return $sDescripcion;
	}	
		
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface producto_equivalente_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $producto_equivalentes,int $iIdNuevoproducto_equivalente) : int;	
		public static function getIndiceActual(array $producto_equivalentes,producto_equivalente $producto_equivalente,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getproducto_equivalenteDescripcion(?producto_equivalente $producto_equivalente) : string {;	
		public static function setproducto_equivalenteDescripcion(?producto_equivalente $producto_equivalente,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $producto_equivalentes) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $producto_equivalentes);	
		public static function refrescarFKDescripcion(producto_equivalente $producto_equivalente);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',producto_equivalente $producto_equivalente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

