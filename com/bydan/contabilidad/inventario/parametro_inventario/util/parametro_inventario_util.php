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

namespace com\bydan\contabilidad\inventario\parametro_inventario\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;
use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;

//REL


class parametro_inventario_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_inventario';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.parametro_inventarios';
	/*'Mantenimientoparametro_inventario.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_inventario.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_inventarioPersistenceName';
	/*.parametro_inventario_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_inventario_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_inventario_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_inventario_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro Inventarios';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Parametro Inventario';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='parametro_inventario';
	public static string $PARAMETRO_INVENTARIO='inv_parametro_inventario';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_inventario';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_costeo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_orden_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_devolucion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_producto_inactivo from '.parametro_inventario_util::$SCHEMA.'.'.parametro_inventario_util::$TABLENAME;*/
	
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
	//public $parametro_inventarioConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_TERMINO_PAGO_PROVEEDOR='id_termino_pago_proveedor';
    public static string $ID_TIPO_COSTEO_KARDEX='id_tipo_costeo_kardex';
    public static string $ID_TIPO_KARDEX='id_tipo_kardex';
    public static string $NUMERO_PRODUCTO='numero_producto';
    public static string $NUMERO_ORDEN_COMPRA='numero_orden_compra';
    public static string $NUMERO_DEVOLUCION='numero_devolucion';
    public static string $NUMERO_COTIZACION='numero_cotizacion';
    public static string $NUMERO_KARDEX='numero_kardex';
    public static string $CON_PRODUCTO_INACTIVO='con_producto_inactivo';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_TERMINO_PAGO_PROVEEDOR=' Termino Pago Proveedor';
    public static string $LABEL_ID_TIPO_COSTEO_KARDEX=' Tipo Costeo Kardex';
    public static string $LABEL_ID_TIPO_KARDEX=' Tipo Kardex';
    public static string $LABEL_NUMERO_PRODUCTO='Numero Producto';
    public static string $LABEL_NUMERO_ORDEN_COMPRA='Numero Orden Compra';
    public static string $LABEL_NUMERO_DEVOLUCION='Numero Devolucion';
    public static string $LABEL_NUMERO_COTIZACION='Numero Cotizacion';
    public static string $LABEL_NUMERO_KARDEX='Numero Kardex';
    public static string $LABEL_CON_PRODUCTO_INACTIVO='Con Producto Inactivo';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_inventarioConstantesFuncionesAdditional=new $parametro_inventarioConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_inventarios,int $iIdNuevoparametro_inventario) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_inventarios as $parametro_inventarioAux) {
			if($parametro_inventarioAux->getId()==$iIdNuevoparametro_inventario) {
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
	
	public static function getIndiceActual(array $parametro_inventarios,parametro_inventario $parametro_inventario,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_inventarios as $parametro_inventarioAux) {
			if($parametro_inventarioAux->getId()==$parametro_inventario->getId()) {
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
	public static function getparametro_inventarioDescripcion(?parametro_inventario $parametro_inventario) : string {//parametro_inventario NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_inventario !=null) {
			/*&& parametro_inventario->getId()!=0*/
			
			if($parametro_inventario->getId()!=null) {
				$sDescripcion=(string)$parametro_inventario->getId();
			}
			
			/*parametro_inventario;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_inventarioDescripcion(?parametro_inventario $parametro_inventario,string $sValor) {			
		if($parametro_inventario !=null) {
			
			/*parametro_inventario;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_inventarios) : array {
		$parametro_inventariosForeignKey=array();
		
		foreach ($parametro_inventarios as $parametro_inventarioLocal) {
			$parametro_inventariosForeignKey[$parametro_inventarioLocal->getId()]=parametro_inventario_util::getparametro_inventarioDescripcion($parametro_inventarioLocal);
		}
			
		return $parametro_inventariosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_termino_pago_proveedor() : string  { return ' Termino Pago Proveedor'; }
    public static function getColumnLabelid_tipo_costeo_kardex() : string  { return ' Tipo Costeo Kardex'; }
    public static function getColumnLabelid_tipo_kardex() : string  { return ' Tipo Kardex'; }
    public static function getColumnLabelnumero_producto() : string  { return 'Numero Producto'; }
    public static function getColumnLabelnumero_orden_compra() : string  { return 'Numero Orden Compra'; }
    public static function getColumnLabelnumero_devolucion() : string  { return 'Numero Devolucion'; }
    public static function getColumnLabelnumero_cotizacion() : string  { return 'Numero Cotizacion'; }
    public static function getColumnLabelnumero_kardex() : string  { return 'Numero Kardex'; }
    public static function getColumnLabelcon_producto_inactivo() : string  { return 'Con Producto Inactivo'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getcon_producto_inactivoDescripcion($parametro_inventario) {
		$sDescripcion='Verdadero';
		if(!$parametro_inventario->getcon_producto_inactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_inventarios) {		
		try {
			
			$parametro_inventario = new parametro_inventario();
			
			foreach($parametro_inventarios as $parametro_inventario) {
				
				$parametro_inventario->setid_empresa_Descripcion(parametro_inventario_util::getempresaDescripcion($parametro_inventario->getempresa()));
				$parametro_inventario->setid_termino_pago_proveedor_Descripcion(parametro_inventario_util::gettermino_pago_proveedorDescripcion($parametro_inventario->gettermino_pago_proveedor()));
				$parametro_inventario->setid_tipo_costeo_kardex_Descripcion(parametro_inventario_util::gettipo_costeo_kardexDescripcion($parametro_inventario->gettipo_costeo_kardex()));
				$parametro_inventario->setid_tipo_kardex_Descripcion(parametro_inventario_util::gettipo_kardexDescripcion($parametro_inventario->gettipo_kardex()));
			}
			
			if($parametro_inventario!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_inventario $parametro_inventario) {		
		try {
			
			
				$parametro_inventario->setid_empresa_Descripcion(parametro_inventario_util::getempresaDescripcion($parametro_inventario->getempresa()));
				$parametro_inventario->setid_termino_pago_proveedor_Descripcion(parametro_inventario_util::gettermino_pago_proveedorDescripcion($parametro_inventario->gettermino_pago_proveedor()));
				$parametro_inventario->setid_tipo_costeo_kardex_Descripcion(parametro_inventario_util::gettipo_costeo_kardexDescripcion($parametro_inventario->gettipo_costeo_kardex()));
				$parametro_inventario->setid_tipo_kardex_Descripcion(parametro_inventario_util::gettipo_kardexDescripcion($parametro_inventario->gettipo_kardex()));
							
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
		} else if($sNombreIndice=='FK_Idtermino_pago_proveedor') {
			$sNombreIndice='Tipo=  Por  Termino Pago Proveedor';
		} else if($sNombreIndice=='FK_Idtipo_costeo_kardex') {
			$sNombreIndice='Tipo=  Por  Tipo Costeo Kardex';
		} else if($sNombreIndice=='FK_Idtipo_kardex') {
			$sNombreIndice='Tipo=  Por  Tipo Kardex';
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

	public static function getDetalleIndiceFK_Idtermino_pago_proveedor(int $id_termino_pago_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Termino Pago Proveedor='+$id_termino_pago_proveedor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_costeo_kardex(int $id_tipo_costeo_kardex) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Costeo Kardex='+$id_tipo_costeo_kardex; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_kardex(int $id_tipo_kardex) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Kardex='+$id_tipo_kardex; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return parametro_inventario_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_inventario_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_ID_TERMINO_PAGO_PROVEEDOR);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_ID_TERMINO_PAGO_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_ID_TIPO_COSTEO_KARDEX);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_ID_TIPO_COSTEO_KARDEX.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_ID_TIPO_KARDEX);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_ID_TIPO_KARDEX.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_NUMERO_PRODUCTO);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_NUMERO_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_NUMERO_ORDEN_COMPRA);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_NUMERO_ORDEN_COMPRA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_NUMERO_DEVOLUCION);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_NUMERO_DEVOLUCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_NUMERO_COTIZACION);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_NUMERO_COTIZACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_NUMERO_KARDEX);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_NUMERO_KARDEX);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_inventario_util::$LABEL_CON_PRODUCTO_INACTIVO);
			$reporte->setsDescripcion(parametro_inventario_util::$LABEL_CON_PRODUCTO_INACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_inventario_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==parametro_inventario_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=parametro_inventario_util::$ID_EMPRESA;
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
				$classes[]=new Classe(termino_pago_proveedor::$class);
				$classes[]=new Classe(tipo_costeo_kardex::$class);
				$classes[]=new Classe(tipo_kardex::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==termino_pago_proveedor::$class) {
						$classes[]=new Classe(termino_pago_proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_costeo_kardex::$class) {
						$classes[]=new Classe(tipo_costeo_kardex::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_kardex::$class) {
						$classes[]=new Classe(tipo_kardex::$class);
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
					if($clas==termino_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_costeo_kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_costeo_kardex::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_kardex::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_ID, parametro_inventario_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_ID_EMPRESA, parametro_inventario_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_ID_TERMINO_PAGO_PROVEEDOR, parametro_inventario_util::$ID_TERMINO_PAGO_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_ID_TIPO_COSTEO_KARDEX, parametro_inventario_util::$ID_TIPO_COSTEO_KARDEX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_ID_TIPO_KARDEX, parametro_inventario_util::$ID_TIPO_KARDEX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_NUMERO_PRODUCTO, parametro_inventario_util::$NUMERO_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_NUMERO_ORDEN_COMPRA, parametro_inventario_util::$NUMERO_ORDEN_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_NUMERO_DEVOLUCION, parametro_inventario_util::$NUMERO_DEVOLUCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_NUMERO_COTIZACION, parametro_inventario_util::$NUMERO_COTIZACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_NUMERO_KARDEX, parametro_inventario_util::$NUMERO_KARDEX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$LABEL_CON_PRODUCTO_INACTIVO, parametro_inventario_util::$CON_PRODUCTO_INACTIVO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Termino Pago Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Termino Pago Proveedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Costeo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Costeo Kardex',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Kardex',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Orden Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Orden Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Devolucion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Devolucion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cotizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cotizacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Kardex',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Producto Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Producto Inactivo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_inventario $parametro_inventario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Termino Pago Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getid_termino_pago_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Costeo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getid_tipo_costeo_kardex_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getid_tipo_kardex_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getnumero_producto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Orden Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getnumero_orden_compra(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Devolucion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getnumero_devolucion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Cotizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getnumero_cotizacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_inventario->getnumero_kardex(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Producto Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_inventario->getcon_producto_inactivo()),40,6,1); $row[]=$cellReport;
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
	
	public static function gettermino_pago_proveedorDescripcion(?termino_pago_proveedor $termino_pago_proveedor) : string {
		$sDescripcion='none';
		if($termino_pago_proveedor!==null) {
			$sDescripcion=termino_pago_proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedor);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_costeo_kardexDescripcion(?tipo_costeo_kardex $tipo_costeo_kardex) : string {
		$sDescripcion='none';
		if($tipo_costeo_kardex!==null) {
			$sDescripcion=tipo_costeo_kardex_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardex);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_kardexDescripcion(?tipo_kardex $tipo_kardex) : string {
		$sDescripcion='none';
		if($tipo_kardex!==null) {
			$sDescripcion=tipo_kardex_util::gettipo_kardexDescripcion($tipo_kardex);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface parametro_inventario_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_inventarios,int $iIdNuevoparametro_inventario) : int;	
		public static function getIndiceActual(array $parametro_inventarios,parametro_inventario $parametro_inventario,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_inventarioDescripcion(?parametro_inventario $parametro_inventario) : string {;	
		public static function setparametro_inventarioDescripcion(?parametro_inventario $parametro_inventario,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_inventarios) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_inventarios);	
		public static function refrescarFKDescripcion(parametro_inventario $parametro_inventario);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',parametro_inventario $parametro_inventario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

