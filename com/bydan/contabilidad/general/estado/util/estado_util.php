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

namespace com\bydan\contabilidad\general\estado\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\general\estado\business\entity\estado;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\business\entity\credito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\business\entity\pago_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\entity\cuenta_cobrar_detalle;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_util;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\business\entity\cuenta_pagar_detalle;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\util\cuenta_pagar_detalle_util;
use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;
use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\entity\debito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

class estado_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='estado';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='general.estados';
	/*'Mantenimientoestado.jsf';*/
	public static string $STR_MODULO_OPCION='general';
	public static string $STR_NOMBRE_CLASE='Mantenimientoestado.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='estadoPersistenceName';
	/*.estado_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='estado_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='estado_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='estado_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Estadoes';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Estado';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $GENERAL='general';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $STR_TABLE_NAME='estado';
	public static string $ESTADO='gen_estado';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.estado';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre from '.estado_util::$SCHEMA.'.'.estado_util::$TABLENAME;*/
	
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
	//public $estadoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->estadoConstantesFuncionesAdditional=new $estadoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $estados,int $iIdNuevoestado) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($estados as $estadoAux) {
			if($estadoAux->getId()==$iIdNuevoestado) {
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
	
	public static function getIndiceActual(array $estados,estado $estado,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($estados as $estadoAux) {
			if($estadoAux->getId()==$estado->getId()) {
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
	public static function getestadoDescripcion(?estado $estado) : string {//estado NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($estado !=null) {
			/*&& estado->getId()!=0*/
			
			$sDescripcion=($estado->getnombre());
			
			/*estado;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setestadoDescripcion(?estado $estado,string $sValor) {			
		if($estado !=null) {
			$estado->setnombre($sValor);;
			/*estado;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $estados) : array {
		$estadosForeignKey=array();
		
		foreach ($estados as $estadoLocal) {
			$estadosForeignKey[$estadoLocal->getId()]=estado_util::getestadoDescripcion($estadoLocal);
		}
			
		return $estadosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $estados) {		
		try {
			
			$estado = new estado();
			
			foreach($estados as $estado) {
				
			}
			
			if($estado!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(estado $estado) {		
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
		return estado_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return estado_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(estado_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(estado_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(estado_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(estado_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=estado_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(cuenta_corriente_detalle::$class);
				$classes[]=new Classe(credito_cuenta_cobrar::$class);
				$classes[]=new Classe(pago_cuenta_cobrar::$class);
				$classes[]=new Classe(cuenta_cobrar_detalle::$class);
				$classes[]=new Classe(kardex::$class);
				$classes[]=new Classe(cuenta_pagar_detalle::$class);
				$classes[]=new Classe(devolucion::$class);
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(debito_cuenta_cobrar::$class);
				$classes[]=new Classe(consignacion::$class);
				$classes[]=new Classe(pago_cuenta_pagar::$class);
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(debito_cuenta_pagar::$class);
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(credito_cuenta_pagar::$class);
				$classes[]=new Classe(cotizacion::$class);
				$classes[]=new Classe(asiento::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==cuenta_corriente_detalle::$class) {
						$classes[]=new Classe(cuenta_corriente_detalle::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==credito_cuenta_cobrar::$class) {
						$classes[]=new Classe(credito_cuenta_cobrar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==pago_cuenta_cobrar::$class) {
						$classes[]=new Classe(pago_cuenta_cobrar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta_cobrar_detalle::$class) {
						$classes[]=new Classe(cuenta_cobrar_detalle::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta_pagar_detalle::$class) {
						$classes[]=new Classe(cuenta_pagar_detalle::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==factura::$class) {
						$classes[]=new Classe(factura::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==debito_cuenta_cobrar::$class) {
						$classes[]=new Classe(debito_cuenta_cobrar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==pago_cuenta_pagar::$class) {
						$classes[]=new Classe(pago_cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==debito_cuenta_pagar::$class) {
						$classes[]=new Classe(debito_cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==credito_cuenta_pagar::$class) {
						$classes[]=new Classe(credito_cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cotizacion::$class) {
						$classes[]=new Classe(cotizacion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta_corriente_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==credito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==pago_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta_cobrar_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta_pagar_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_pagar_detalle::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==devolucion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==devolucion_factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion_factura::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==debito_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==pago_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pago_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==factura_lote::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_lote::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==debito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(debito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==orden_compra::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(orden_compra::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==estimado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estimado::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==credito_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(credito_cuenta_pagar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cotizacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cotizacion::$class);
				}

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
		
		
		$orderBy=OrderBy::NewOrderBy(false,estado_util::$LABEL_ID, estado_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,estado_util::$LABEL_CODIGO, estado_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,estado_util::$LABEL_NOMBRE, estado_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO, cuenta_corriente_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,credito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO, credito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO, pago_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO, cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,kardex_util::$STR_CLASS_WEB_TITULO, kardex_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_pagar_detalle_util::$STR_CLASS_WEB_TITULO, cuenta_pagar_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_util::$STR_CLASS_WEB_TITULO, devolucion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$STR_CLASS_WEB_TITULO, devolucion_factura_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_util::$STR_CLASS_WEB_TITULO, factura_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO, debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_util::$STR_CLASS_WEB_TITULO, consignacion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_util::$STR_CLASS_WEB_TITULO, factura_lote_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_util::$STR_CLASS_WEB_TITULO, orden_compra_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,estimado_util::$STR_CLASS_WEB_TITULO, estimado_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cotizacion_util::$STR_CLASS_WEB_TITULO, cotizacion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,asiento_util::$STR_CLASS_WEB_TITULO, asiento_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',estado $estado,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($estado->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($estado->getnombre(),40,6,1); $row[]=$cellReport;
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
	
	interface estado_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $estados,int $iIdNuevoestado) : int;	
		public static function getIndiceActual(array $estados,estado $estado,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getestadoDescripcion(?estado $estado) : string {;	
		public static function setestadoDescripcion(?estado $estado,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $estados) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $estados);	
		public static function refrescarFKDescripcion(estado $estado);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',estado $estado,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

