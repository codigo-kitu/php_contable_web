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

namespace com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL

use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\business\entity\debito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;

class forma_pago_proveedor_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='forma_pago_proveedor';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_pagar.forma_pago_proveedors';
	/*'Mantenimientoforma_pago_proveedor.jsf';*/
	public static string $STR_MODULO_OPCION='cuentaspagar';
	public static string $STR_NOMBRE_CLASE='Mantenimientoforma_pago_proveedor.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='forma_pago_proveedorPersistenceName';
	/*.forma_pago_proveedor_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='forma_pago_proveedor_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='forma_pago_proveedor_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='forma_pago_proveedor_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Forma Pago Proveedores';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Forma Pago Proveedor';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASPAGAR='cuentaspagar';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $STR_TABLE_NAME='forma_pago_proveedor';
	public static string $FORMA_PAGO_PROVEEDOR='cp_forma_pago_proveedor';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.forma_pago_proveedor';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_forma_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.forma_pago_proveedor_util::$SCHEMA.'.'.forma_pago_proveedor_util::$TABLENAME;*/
	
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
	//public $forma_pago_proveedorConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_TIPO_FORMA_PAGO='id_tipo_forma_pago';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $PREDETERMINADO='predeterminado';
    public static string $ID_CUENTA='id_cuenta';
    public static string $CUENTA_CONTABLE='cuenta_contable';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_TIPO_FORMA_PAGO='Tipo Forma Pago';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_PREDETERMINADO='Predeterminado';
    public static string $LABEL_ID_CUENTA=' Cuentas';
    public static string $LABEL_CUENTA_CONTABLE='Cuenta Contable';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->forma_pago_proveedorConstantesFuncionesAdditional=new $forma_pago_proveedorConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $forma_pago_proveedors,int $iIdNuevoforma_pago_proveedor) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($forma_pago_proveedors as $forma_pago_proveedorAux) {
			if($forma_pago_proveedorAux->getId()==$iIdNuevoforma_pago_proveedor) {
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
	
	public static function getIndiceActual(array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($forma_pago_proveedors as $forma_pago_proveedorAux) {
			if($forma_pago_proveedorAux->getId()==$forma_pago_proveedor->getId()) {
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
	public static function getforma_pago_proveedorDescripcion(?forma_pago_proveedor $forma_pago_proveedor) : string {//forma_pago_proveedor NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($forma_pago_proveedor !=null) {
			/*&& forma_pago_proveedor->getId()!=0*/
			
			$sDescripcion=($forma_pago_proveedor->getcodigo());
			
			/*forma_pago_proveedor;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setforma_pago_proveedorDescripcion(?forma_pago_proveedor $forma_pago_proveedor,string $sValor) {			
		if($forma_pago_proveedor !=null) {
			$forma_pago_proveedor->setcodigo($sValor);;
			/*forma_pago_proveedor;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $forma_pago_proveedors) : array {
		$forma_pago_proveedorsForeignKey=array();
		
		foreach ($forma_pago_proveedors as $forma_pago_proveedorLocal) {
			$forma_pago_proveedorsForeignKey[$forma_pago_proveedorLocal->getId()]=forma_pago_proveedor_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLocal);
		}
			
		return $forma_pago_proveedorsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_tipo_forma_pago() : string  { return 'Tipo Forma Pago'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelpredeterminado() : string  { return 'Predeterminado'; }
    public static function getColumnLabelid_cuenta() : string  { return ' Cuentas'; }
    public static function getColumnLabelcuenta_contable() : string  { return 'Cuenta Contable'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getpredeterminadoDescripcion($forma_pago_proveedor) {
		$sDescripcion='Verdadero';
		if(!$forma_pago_proveedor->getpredeterminado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $forma_pago_proveedors) {		
		try {
			
			$forma_pago_proveedor = new forma_pago_proveedor();
			
			foreach($forma_pago_proveedors as $forma_pago_proveedor) {
				
				$forma_pago_proveedor->setid_empresa_Descripcion(forma_pago_proveedor_util::getempresaDescripcion($forma_pago_proveedor->getempresa()));
				$forma_pago_proveedor->setid_tipo_forma_pago_Descripcion(forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($forma_pago_proveedor->gettipo_forma_pago()));
				$forma_pago_proveedor->setid_cuenta_Descripcion(forma_pago_proveedor_util::getcuentaDescripcion($forma_pago_proveedor->getcuenta()));
			}
			
			if($forma_pago_proveedor!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(forma_pago_proveedor $forma_pago_proveedor) {		
		try {
			
			
				$forma_pago_proveedor->setid_empresa_Descripcion(forma_pago_proveedor_util::getempresaDescripcion($forma_pago_proveedor->getempresa()));
				$forma_pago_proveedor->setid_tipo_forma_pago_Descripcion(forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($forma_pago_proveedor->gettipo_forma_pago()));
				$forma_pago_proveedor->setid_cuenta_Descripcion(forma_pago_proveedor_util::getcuentaDescripcion($forma_pago_proveedor->getcuenta()));
							
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
		} else if($sNombreIndice=='FK_Idcuenta') {
			$sNombreIndice='Tipo=  Por  Cuentas';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idtipo_forma_pago') {
			$sNombreIndice='Tipo=  Por Tipo Forma Pago';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcuenta(?int $id_cuenta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuentas='+$id_cuenta; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_forma_pago(int $id_tipo_forma_pago) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Forma Pago='+$id_tipo_forma_pago; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return forma_pago_proveedor_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return forma_pago_proveedor_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(forma_pago_proveedor_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(forma_pago_proveedor_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(forma_pago_proveedor_util::$LABEL_ID_TIPO_FORMA_PAGO);
			$reporte->setsDescripcion(forma_pago_proveedor_util::$LABEL_ID_TIPO_FORMA_PAGO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(forma_pago_proveedor_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(forma_pago_proveedor_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(forma_pago_proveedor_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(forma_pago_proveedor_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(forma_pago_proveedor_util::$LABEL_PREDETERMINADO);
			$reporte->setsDescripcion(forma_pago_proveedor_util::$LABEL_PREDETERMINADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(forma_pago_proveedor_util::$LABEL_ID_CUENTA);
			$reporte->setsDescripcion(forma_pago_proveedor_util::$LABEL_ID_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(forma_pago_proveedor_util::$LABEL_CUENTA_CONTABLE);
			$reporte->setsDescripcion(forma_pago_proveedor_util::$LABEL_CUENTA_CONTABLE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=forma_pago_proveedor_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==forma_pago_proveedor_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=forma_pago_proveedor_util::$ID_EMPRESA;
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
				$classes[]=new Classe(tipo_forma_pago::$class);
				$classes[]=new Classe(cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_forma_pago::$class) {
						$classes[]=new Classe(tipo_forma_pago::$class);
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
					if($clas==tipo_forma_pago::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_forma_pago::$class);
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
				
				$classes[]=new Classe(debito_cuenta_pagar::$class);
				$classes[]=new Classe(documento_cuenta_pagar::$class);
				$classes[]=new Classe(pago_cuenta_pagar::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==debito_cuenta_pagar::$class) {
						$classes[]=new Classe(debito_cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==documento_cuenta_pagar::$class) {
						$classes[]=new Classe(documento_cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==pago_cuenta_pagar::$class) {
						$classes[]=new Classe(pago_cuenta_pagar::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas==documento_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_pagar::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_ID, forma_pago_proveedor_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_ID_EMPRESA, forma_pago_proveedor_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_ID_TIPO_FORMA_PAGO, forma_pago_proveedor_util::$ID_TIPO_FORMA_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_CODIGO, forma_pago_proveedor_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_NOMBRE, forma_pago_proveedor_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_PREDETERMINADO, forma_pago_proveedor_util::$PREDETERMINADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_ID_CUENTA, forma_pago_proveedor_util::$ID_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,forma_pago_proveedor_util::$LABEL_CUENTA_CONTABLE, forma_pago_proveedor_util::$CUENTA_CONTABLE,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Tipo Forma Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Forma Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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

		if(Funciones::existeCadenaArrayOrderBy(' Cuentas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuentas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',forma_pago_proveedor $forma_pago_proveedor,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Forma Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getid_tipo_forma_pago_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($forma_pago_proveedor->getpredeterminado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuentas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($forma_pago_proveedor->getid_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function gettipo_forma_pagoDescripcion(?tipo_forma_pago $tipo_forma_pago) : string {
		$sDescripcion='none';
		if($tipo_forma_pago!==null) {
			$sDescripcion=tipo_forma_pago_util::gettipo_forma_pagoDescripcion($tipo_forma_pago);
		}
		return $sDescripcion;
	}	
	
	public static function getcuentaDescripcion(?cuenta $cuenta) : string {
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
	
	interface forma_pago_proveedor_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $forma_pago_proveedors,int $iIdNuevoforma_pago_proveedor) : int;	
		public static function getIndiceActual(array $forma_pago_proveedors,forma_pago_proveedor $forma_pago_proveedor,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getforma_pago_proveedorDescripcion(?forma_pago_proveedor $forma_pago_proveedor) : string {;	
		public static function setforma_pago_proveedorDescripcion(?forma_pago_proveedor $forma_pago_proveedor,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $forma_pago_proveedors) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $forma_pago_proveedors);	
		public static function refrescarFKDescripcion(forma_pago_proveedor $forma_pago_proveedor);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',forma_pago_proveedor $forma_pago_proveedor,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

