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

namespace com\bydan\contabilidad\facturacion\impuesto\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

class impuesto_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='impuesto';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='facturacion.impuestos';
	/*'Mantenimientoimpuesto.jsf';*/
	public static string $STR_MODULO_OPCION='facturacion';
	public static string $STR_NOMBRE_CLASE='Mantenimientoimpuesto.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='impuestoPersistenceName';
	/*.impuesto_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='impuesto_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='impuesto_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='impuesto_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Impuestos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Impuesto';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $FACTURACION='facturacion';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $STR_TABLE_NAME='impuesto';
	public static string $IMPUESTO='fac_impuesto';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.impuesto';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.valor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_compras from '.impuesto_util::$SCHEMA.'.'.impuesto_util::$TABLENAME;*/
	
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
	//public $impuestoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $CODIGO='codigo';
    public static string $DESCRIPCION='descripcion';
    public static string $VALOR='valor';
    public static string $PREDETERMINADO='predeterminado';
    public static string $ID_CUENTA_VENTAS='id_cuenta_ventas';
    public static string $ID_CUENTA_COMPRAS='id_cuenta_compras';
    public static string $CUENTA_CONTABLE_VENTAS='cuenta_contable_ventas';
    public static string $CUENTA_CONTABLE_COMPRAS='cuenta_contable_compras';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_VALOR='Valor';
    public static string $LABEL_PREDETERMINADO='Predeterminado';
    public static string $LABEL_ID_CUENTA_VENTAS=' Cuentas Ventas';
    public static string $LABEL_ID_CUENTA_COMPRAS=' Cuentas Compras';
    public static string $LABEL_CUENTA_CONTABLE_VENTAS='Cuenta Contable Ventas';
    public static string $LABEL_CUENTA_CONTABLE_COMPRAS='Cuenta Contable Compras';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->impuestoConstantesFuncionesAdditional=new $impuestoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $impuestos,int $iIdNuevoimpuesto) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($impuestos as $impuestoAux) {
			if($impuestoAux->getId()==$iIdNuevoimpuesto) {
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
	
	public static function getIndiceActual(array $impuestos,impuesto $impuesto,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($impuestos as $impuestoAux) {
			if($impuestoAux->getId()==$impuesto->getId()) {
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
	public static function getimpuestoDescripcion(?impuesto $impuesto) : string {//impuesto NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($impuesto !=null) {
			/*&& impuesto->getId()!=0*/
			
			$sDescripcion=($impuesto->getdescripcion());
			
			/*impuesto;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setimpuestoDescripcion(?impuesto $impuesto,string $sValor) {			
		if($impuesto !=null) {
			$impuesto->setdescripcion($sValor);;
			/*impuesto;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $impuestos) : array {
		$impuestosForeignKey=array();
		
		foreach ($impuestos as $impuestoLocal) {
			$impuestosForeignKey[$impuestoLocal->getId()]=impuesto_util::getimpuestoDescripcion($impuestoLocal);
		}
			
		return $impuestosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelvalor() : string  { return 'Valor'; }
    public static function getColumnLabelpredeterminado() : string  { return 'Predeterminado'; }
    public static function getColumnLabelid_cuenta_ventas() : string  { return ' Cuentas Ventas'; }
    public static function getColumnLabelid_cuenta_compras() : string  { return ' Cuentas Compras'; }
    public static function getColumnLabelcuenta_contable_ventas() : string  { return 'Cuenta Contable Ventas'; }
    public static function getColumnLabelcuenta_contable_compras() : string  { return 'Cuenta Contable Compras'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getpredeterminadoDescripcion($impuesto) {
		$sDescripcion='Verdadero';
		if(!$impuesto->getpredeterminado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $impuestos) {		
		try {
			
			$impuesto = new impuesto();
			
			foreach($impuestos as $impuesto) {
				
				$impuesto->setid_empresa_Descripcion(impuesto_util::getempresaDescripcion($impuesto->getempresa()));
				$impuesto->setid_cuenta_ventas_Descripcion(impuesto_util::getcuenta_ventasDescripcion($impuesto->getcuenta_ventas()));
				$impuesto->setid_cuenta_compras_Descripcion(impuesto_util::getcuenta_comprasDescripcion($impuesto->getcuenta_compras()));
			}
			
			if($impuesto!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(impuesto $impuesto) {		
		try {
			
			
				$impuesto->setid_empresa_Descripcion(impuesto_util::getempresaDescripcion($impuesto->getempresa()));
				$impuesto->setid_cuenta_ventas_Descripcion(impuesto_util::getcuenta_ventasDescripcion($impuesto->getcuenta_ventas()));
				$impuesto->setid_cuenta_compras_Descripcion(impuesto_util::getcuenta_comprasDescripcion($impuesto->getcuenta_compras()));
							
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
		} else if($sNombreIndice=='FK_Idcuenta_compras') {
			$sNombreIndice='Tipo=  Por  Cuentas Compras';
		} else if($sNombreIndice=='FK_Idcuenta_ventas') {
			$sNombreIndice='Tipo=  Por  Cuentas Ventas';
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

	public static function getDetalleIndiceFK_Idcuenta_compras(?int $id_cuenta_compras) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuentas Compras='+$id_cuenta_compras; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_ventas(?int $id_cuenta_ventas) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuentas Ventas='+$id_cuenta_ventas; 

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
		return impuesto_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return impuesto_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(impuesto_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(impuesto_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(impuesto_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_VALOR);
			$reporte->setsDescripcion(impuesto_util::$LABEL_VALOR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_PREDETERMINADO);
			$reporte->setsDescripcion(impuesto_util::$LABEL_PREDETERMINADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_ID_CUENTA_VENTAS);
			$reporte->setsDescripcion(impuesto_util::$LABEL_ID_CUENTA_VENTAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_ID_CUENTA_COMPRAS);
			$reporte->setsDescripcion(impuesto_util::$LABEL_ID_CUENTA_COMPRAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_CUENTA_CONTABLE_VENTAS);
			$reporte->setsDescripcion(impuesto_util::$LABEL_CUENTA_CONTABLE_VENTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(impuesto_util::$LABEL_CUENTA_CONTABLE_COMPRAS);
			$reporte->setsDescripcion(impuesto_util::$LABEL_CUENTA_CONTABLE_COMPRAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=impuesto_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==impuesto_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=impuesto_util::$ID_EMPRESA;
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
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
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
					if($clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta::$class);
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
				
				$classes[]=new Classe(lista_producto::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(proveedor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==lista_producto::$class) {
						$classes[]=new Classe(lista_producto::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$classes[]=new Classe(producto::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_ID, impuesto_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_ID_EMPRESA, impuesto_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_CODIGO, impuesto_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_DESCRIPCION, impuesto_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_VALOR, impuesto_util::$VALOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_PREDETERMINADO, impuesto_util::$PREDETERMINADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_ID_CUENTA_VENTAS, impuesto_util::$ID_CUENTA_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_ID_CUENTA_COMPRAS, impuesto_util::$ID_CUENTA_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_CUENTA_CONTABLE_VENTAS, impuesto_util::$CUENTA_CONTABLE_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,impuesto_util::$LABEL_CUENTA_CONTABLE_COMPRAS, impuesto_util::$CUENTA_CONTABLE_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,lista_producto_util::$STR_CLASS_WEB_TITULO, lista_producto_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,producto_util::$STR_CLASS_WEB_TITULO, producto_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$STR_CLASS_WEB_TITULO, cliente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$STR_CLASS_WEB_TITULO, proveedor_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuentas Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuentas Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuentas Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuentas Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',impuesto $impuesto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($impuesto->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($impuesto->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($impuesto->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Valor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($impuesto->getvalor(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($impuesto->getpredeterminado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuentas Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($impuesto->getid_cuenta_ventas_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuentas Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($impuesto->getid_cuenta_compras_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function getcuenta_ventasDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
		}
		return $sDescripcion;
	}	
	
	public static function getcuenta_comprasDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface impuesto_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $impuestos,int $iIdNuevoimpuesto) : int;	
		public static function getIndiceActual(array $impuestos,impuesto $impuesto,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getimpuestoDescripcion(?impuesto $impuesto) : string {;	
		public static function setimpuestoDescripcion(?impuesto $impuesto,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $impuestos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $impuestos);	
		public static function refrescarFKDescripcion(impuesto $impuesto);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',impuesto $impuesto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

