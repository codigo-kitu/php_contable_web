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

namespace com\bydan\contabilidad\inventario\sub_categoria_producto\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

//REL

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;

class sub_categoria_producto_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='sub_categoria_producto';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.sub_categoria_productos';
	/*'Mantenimientosub_categoria_producto.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientosub_categoria_producto.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='sub_categoria_productoPersistenceName';
	/*.sub_categoria_producto_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='sub_categoria_producto_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='sub_categoria_producto_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='sub_categoria_producto_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Sub Categoria Productos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Sub Categoria Producto';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='sub_categoria_producto';
	public static string $SUB_CATEGORIA_PRODUCTO='inv_sub_categoria_producto';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.sub_categoria_producto';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_productos from '.sub_categoria_producto_util::$SCHEMA.'.'.sub_categoria_producto_util::$TABLENAME;*/
	
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
	//public $sub_categoria_productoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_CATEGORIA_PRODUCTO='id_categoria_producto';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $PREDETERMINADO='predeterminado';
    public static string $IMAGEN='imagen';
    public static string $NUMERO_PRODUCTOS='numero_productos';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_CATEGORIA_PRODUCTO='Categoria Producto';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_PREDETERMINADO='Predeterminado';
    public static string $LABEL_IMAGEN='Imagen';
    public static string $LABEL_NUMERO_PRODUCTOS='No Productos';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->sub_categoria_productoConstantesFuncionesAdditional=new $sub_categoria_productoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $sub_categoria_productos,int $iIdNuevosub_categoria_producto) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($sub_categoria_productos as $sub_categoria_productoAux) {
			if($sub_categoria_productoAux->getId()==$iIdNuevosub_categoria_producto) {
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
	
	public static function getIndiceActual(array $sub_categoria_productos,sub_categoria_producto $sub_categoria_producto,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($sub_categoria_productos as $sub_categoria_productoAux) {
			if($sub_categoria_productoAux->getId()==$sub_categoria_producto->getId()) {
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
	public static function getsub_categoria_productoDescripcion(?sub_categoria_producto $sub_categoria_producto) : string {//sub_categoria_producto NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($sub_categoria_producto !=null) {
			/*&& sub_categoria_producto->getId()!=0*/
			
			$sDescripcion=($sub_categoria_producto->getnombre());
			
			/*sub_categoria_producto;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setsub_categoria_productoDescripcion(?sub_categoria_producto $sub_categoria_producto,string $sValor) {			
		if($sub_categoria_producto !=null) {
			$sub_categoria_producto->setnombre($sValor);;
			/*sub_categoria_producto;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $sub_categoria_productos) : array {
		$sub_categoria_productosForeignKey=array();
		
		foreach ($sub_categoria_productos as $sub_categoria_productoLocal) {
			$sub_categoria_productosForeignKey[$sub_categoria_productoLocal->getId()]=sub_categoria_producto_util::getsub_categoria_productoDescripcion($sub_categoria_productoLocal);
		}
			
		return $sub_categoria_productosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_categoria_producto() : string  { return 'Categoria Producto'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelpredeterminado() : string  { return 'Predeterminado'; }
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }
    public static function getColumnLabelnumero_productos() : string  { return 'No Productos'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getpredeterminadoDescripcion($sub_categoria_producto) {
		$sDescripcion='Verdadero';
		if(!$sub_categoria_producto->getpredeterminado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $sub_categoria_productos) {		
		try {
			
			$sub_categoria_producto = new sub_categoria_producto();
			
			foreach($sub_categoria_productos as $sub_categoria_producto) {
				
				$sub_categoria_producto->setid_empresa_Descripcion(sub_categoria_producto_util::getempresaDescripcion($sub_categoria_producto->getempresa()));
				$sub_categoria_producto->setid_categoria_producto_Descripcion(sub_categoria_producto_util::getcategoria_productoDescripcion($sub_categoria_producto->getcategoria_producto()));
			}
			
			if($sub_categoria_producto!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(sub_categoria_producto $sub_categoria_producto) {		
		try {
			
			
				$sub_categoria_producto->setid_empresa_Descripcion(sub_categoria_producto_util::getempresaDescripcion($sub_categoria_producto->getempresa()));
				$sub_categoria_producto->setid_categoria_producto_Descripcion(sub_categoria_producto_util::getcategoria_productoDescripcion($sub_categoria_producto->getcategoria_producto()));
							
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
		} else if($sNombreIndice=='FK_Idcategoria_producto') {
			$sNombreIndice='Tipo=  Por Categoria Producto';
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

	public static function getDetalleIndiceFK_Idcategoria_producto(int $id_categoria_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Categoria Producto='+$id_categoria_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return sub_categoria_producto_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return sub_categoria_producto_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sub_categoria_producto_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(sub_categoria_producto_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sub_categoria_producto_util::$LABEL_ID_CATEGORIA_PRODUCTO);
			$reporte->setsDescripcion(sub_categoria_producto_util::$LABEL_ID_CATEGORIA_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sub_categoria_producto_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(sub_categoria_producto_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sub_categoria_producto_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(sub_categoria_producto_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sub_categoria_producto_util::$LABEL_PREDETERMINADO);
			$reporte->setsDescripcion(sub_categoria_producto_util::$LABEL_PREDETERMINADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sub_categoria_producto_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(sub_categoria_producto_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(sub_categoria_producto_util::$LABEL_NUMERO_PRODUCTOS);
			$reporte->setsDescripcion(sub_categoria_producto_util::$LABEL_NUMERO_PRODUCTOS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=sub_categoria_producto_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==sub_categoria_producto_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=sub_categoria_producto_util::$ID_EMPRESA;
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
				$classes[]=new Classe(categoria_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==categoria_producto::$class) {
						$classes[]=new Classe(categoria_producto::$class);
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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==categoria_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_producto::$class);
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(lista_producto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$classes[]=new Classe(producto::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class); break;
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
					if($clas==lista_producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_producto::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_ID, sub_categoria_producto_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_ID_EMPRESA, sub_categoria_producto_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_ID_CATEGORIA_PRODUCTO, sub_categoria_producto_util::$ID_CATEGORIA_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_CODIGO, sub_categoria_producto_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_NOMBRE, sub_categoria_producto_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_PREDETERMINADO, sub_categoria_producto_util::$PREDETERMINADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_IMAGEN, sub_categoria_producto_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,sub_categoria_producto_util::$LABEL_NUMERO_PRODUCTOS, sub_categoria_producto_util::$NUMERO_PRODUCTOS,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$STR_CLASS_WEB_TITULO, producto_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$STR_CLASS_WEB_TITULO, lista_producto_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('No Productos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('No Productos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',sub_categoria_producto $sub_categoria_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sub_categoria_producto->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sub_categoria_producto->getid_categoria_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sub_categoria_producto->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sub_categoria_producto->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($sub_categoria_producto->getpredeterminado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sub_categoria_producto->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('No Productos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($sub_categoria_producto->getnumero_productos(),40,6,1); $row[]=$cellReport;
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
	
	public static function getcategoria_productoDescripcion(?categoria_producto $categoria_producto) : string {
		$sDescripcion='none';
		if($categoria_producto!==null) {
			$sDescripcion=categoria_producto_util::getcategoria_productoDescripcion($categoria_producto);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface sub_categoria_producto_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $sub_categoria_productos,int $iIdNuevosub_categoria_producto) : int;	
		public static function getIndiceActual(array $sub_categoria_productos,sub_categoria_producto $sub_categoria_producto,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getsub_categoria_productoDescripcion(?sub_categoria_producto $sub_categoria_producto) : string {;	
		public static function setsub_categoria_productoDescripcion(?sub_categoria_producto $sub_categoria_producto,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $sub_categoria_productos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $sub_categoria_productos);	
		public static function refrescarFKDescripcion(sub_categoria_producto $sub_categoria_producto);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',sub_categoria_producto $sub_categoria_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

