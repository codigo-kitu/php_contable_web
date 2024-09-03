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

namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;
use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

class termino_pago_proveedor_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='termino_pago_proveedor';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_pagar.termino_pago_proveedors';
	/*'Mantenimientotermino_pago_proveedor.jsf';*/
	public static string $STR_MODULO_OPCION='cuentaspagar';
	public static string $STR_NOMBRE_CLASE='Mantenimientotermino_pago_proveedor.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='termino_pago_proveedorPersistenceName';
	/*.termino_pago_proveedor_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='termino_pago_proveedor_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='termino_pago_proveedor_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='termino_pago_proveedor_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Terminos Pago Proveedoreses';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Terminos Pago Proveedores';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASPAGAR='cuentaspagar';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $STR_TABLE_NAME='termino_pago_proveedor';
	public static string $TERMINO_PAGO_PROVEEDOR='cp_termino_pago_proveedor';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.termino_pago_proveedor';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_termino_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.dias,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuotas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_pronto_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.termino_pago_proveedor_util::$SCHEMA.'.'.termino_pago_proveedor_util::$TABLENAME;*/
	
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
	//public $termino_pago_proveedorConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_TIPO_TERMINO_PAGO='id_tipo_termino_pago';
    public static string $CODIGO='codigo';
    public static string $DESCRIPCION='descripcion';
    public static string $MONTO='monto';
    public static string $DIAS='dias';
    public static string $INICIAL='inicial';
    public static string $CUOTAS='cuotas';
    public static string $DESCUENTO_PRONTO_PAGO='descuento_pronto_pago';
    public static string $PREDETERMINADO='predeterminado';
    public static string $ID_CUENTA='id_cuenta';
    public static string $CUENTA_CONTABLE='cuenta_contable';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_TIPO_TERMINO_PAGO='Tipo Termino Pago';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_MONTO='Monto';
    public static string $LABEL_DIAS='Dias';
    public static string $LABEL_INICIAL='Inicial';
    public static string $LABEL_CUOTAS='Cuotas';
    public static string $LABEL_DESCUENTO_PRONTO_PAGO='Descuento Pronto Pago';
    public static string $LABEL_PREDETERMINADO='Predeterminado';
    public static string $LABEL_ID_CUENTA=' Cuenta';
    public static string $LABEL_CUENTA_CONTABLE='Cuenta Contable';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->termino_pago_proveedorConstantesFuncionesAdditional=new $termino_pago_proveedorConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $termino_pago_proveedors,int $iIdNuevotermino_pago_proveedor) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($termino_pago_proveedors as $termino_pago_proveedorAux) {
			if($termino_pago_proveedorAux->getId()==$iIdNuevotermino_pago_proveedor) {
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
	
	public static function getIndiceActual(array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($termino_pago_proveedors as $termino_pago_proveedorAux) {
			if($termino_pago_proveedorAux->getId()==$termino_pago_proveedor->getId()) {
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
	public static function gettermino_pago_proveedorDescripcion(?termino_pago_proveedor $termino_pago_proveedor) : string {//termino_pago_proveedor NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($termino_pago_proveedor !=null) {
			/*&& termino_pago_proveedor->getId()!=0*/
			
			$sDescripcion=($termino_pago_proveedor->getdescripcion());
			
			/*termino_pago_proveedor;*/
		}
			
		return $sDescripcion;
	}
	
	public static function settermino_pago_proveedorDescripcion(?termino_pago_proveedor $termino_pago_proveedor,string $sValor) {			
		if($termino_pago_proveedor !=null) {
			$termino_pago_proveedor->setdescripcion($sValor);;
			/*termino_pago_proveedor;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $termino_pago_proveedors) : array {
		$termino_pago_proveedorsForeignKey=array();
		
		foreach ($termino_pago_proveedors as $termino_pago_proveedorLocal) {
			$termino_pago_proveedorsForeignKey[$termino_pago_proveedorLocal->getId()]=termino_pago_proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
		}
			
		return $termino_pago_proveedorsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_tipo_termino_pago() : string  { return 'Tipo Termino Pago'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelmonto() : string  { return 'Monto'; }
    public static function getColumnLabeldias() : string  { return 'Dias'; }
    public static function getColumnLabelinicial() : string  { return 'Inicial'; }
    public static function getColumnLabelcuotas() : string  { return 'Cuotas'; }
    public static function getColumnLabeldescuento_pronto_pago() : string  { return 'Descuento Pronto Pago'; }
    public static function getColumnLabelpredeterminado() : string  { return 'Predeterminado'; }
    public static function getColumnLabelid_cuenta() : string  { return ' Cuenta'; }
    public static function getColumnLabelcuenta_contable() : string  { return 'Cuenta Contable'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getpredeterminadoDescripcion($termino_pago_proveedor) {
		$sDescripcion='Verdadero';
		if(!$termino_pago_proveedor->getpredeterminado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $termino_pago_proveedors) {		
		try {
			
			$termino_pago_proveedor = new termino_pago_proveedor();
			
			foreach($termino_pago_proveedors as $termino_pago_proveedor) {
				
				$termino_pago_proveedor->setid_empresa_Descripcion(termino_pago_proveedor_util::getempresaDescripcion($termino_pago_proveedor->getempresa()));
				$termino_pago_proveedor->setid_tipo_termino_pago_Descripcion(termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($termino_pago_proveedor->gettipo_termino_pago()));
				$termino_pago_proveedor->setid_cuenta_Descripcion(termino_pago_proveedor_util::getcuentaDescripcion($termino_pago_proveedor->getcuenta()));
			}
			
			if($termino_pago_proveedor!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(termino_pago_proveedor $termino_pago_proveedor) {		
		try {
			
			
				$termino_pago_proveedor->setid_empresa_Descripcion(termino_pago_proveedor_util::getempresaDescripcion($termino_pago_proveedor->getempresa()));
				$termino_pago_proveedor->setid_tipo_termino_pago_Descripcion(termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($termino_pago_proveedor->gettipo_termino_pago()));
				$termino_pago_proveedor->setid_cuenta_Descripcion(termino_pago_proveedor_util::getcuentaDescripcion($termino_pago_proveedor->getcuenta()));
							
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
			$sNombreIndice='Tipo=  Por  Cuenta';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idtipo_termino_pago') {
			$sNombreIndice='Tipo=  Por Tipo Termino Pago';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcuenta(int $id_cuenta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta='+$id_cuenta; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_termino_pago(int $id_tipo_termino_pago) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tipo Termino Pago='+$id_tipo_termino_pago; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return termino_pago_proveedor_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return termino_pago_proveedor_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_ID_TIPO_TERMINO_PAGO);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_ID_TIPO_TERMINO_PAGO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_MONTO);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_DIAS);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_DIAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_INICIAL);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_INICIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_CUOTAS);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_CUOTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_DESCUENTO_PRONTO_PAGO);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_DESCUENTO_PRONTO_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_PREDETERMINADO);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_PREDETERMINADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_ID_CUENTA);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_ID_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_proveedor_util::$LABEL_CUENTA_CONTABLE);
			$reporte->setsDescripcion(termino_pago_proveedor_util::$LABEL_CUENTA_CONTABLE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==termino_pago_proveedor_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=termino_pago_proveedor_util::$ID_EMPRESA;
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
				$classes[]=new Classe(tipo_termino_pago::$class);
				$classes[]=new Classe(cuenta::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_termino_pago::$class) {
						$classes[]=new Classe(tipo_termino_pago::$class);
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
					if($clas==tipo_termino_pago::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_termino_pago::$class);
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
				
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(credito_cuenta_pagar::$class);
				$classes[]=new Classe(cuenta_pagar::$class);
				$classes[]=new Classe(cotizacion::$class);
				$classes[]=new Classe(parametro_inventario::$class);
				$classes[]=new Classe(devolucion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==credito_cuenta_pagar::$class) {
						$classes[]=new Classe(credito_cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cotizacion::$class) {
						$classes[]=new Classe(cotizacion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==parametro_inventario::$class) {
						$classes[]=new Classe(parametro_inventario::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==devolucion::$class) {
						$classes[]=new Classe(devolucion::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas==proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(proveedor::$class);
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
					if($clas==cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_pagar::$class);
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
					if($clas==parametro_inventario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_inventario::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_ID, termino_pago_proveedor_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_ID_EMPRESA, termino_pago_proveedor_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_ID_TIPO_TERMINO_PAGO, termino_pago_proveedor_util::$ID_TIPO_TERMINO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_CODIGO, termino_pago_proveedor_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_DESCRIPCION, termino_pago_proveedor_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_MONTO, termino_pago_proveedor_util::$MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_DIAS, termino_pago_proveedor_util::$DIAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_INICIAL, termino_pago_proveedor_util::$INICIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_CUOTAS, termino_pago_proveedor_util::$CUOTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_DESCUENTO_PRONTO_PAGO, termino_pago_proveedor_util::$DESCUENTO_PRONTO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_PREDETERMINADO, termino_pago_proveedor_util::$PREDETERMINADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_ID_CUENTA, termino_pago_proveedor_util::$ID_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_proveedor_util::$LABEL_CUENTA_CONTABLE, termino_pago_proveedor_util::$CUENTA_CONTABLE,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_util::$STR_CLASS_WEB_TITULO, orden_compra_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$STR_CLASS_WEB_TITULO, proveedor_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_pagar_util::$STR_CLASS_WEB_TITULO, cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cotizacion_util::$STR_CLASS_WEB_TITULO, cotizacion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_inventario_util::$STR_CLASS_WEB_TITULO, parametro_inventario_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_util::$STR_CLASS_WEB_TITULO, devolucion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Tipo Termino Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Termino Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Dias',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dias',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Inicial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Inicial',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuotas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuotas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Pronto Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Pronto Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',termino_pago_proveedor $termino_pago_proveedor,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Termino Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getid_tipo_termino_pago_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getmonto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Dias',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getdias(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Inicial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getinicial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuotas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getcuotas(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Pronto Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getdescuento_pronto_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($termino_pago_proveedor->getpredeterminado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_proveedor->getid_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function gettipo_termino_pagoDescripcion(?tipo_termino_pago $tipo_termino_pago) : string {
		$sDescripcion='none';
		if($tipo_termino_pago!==null) {
			$sDescripcion=tipo_termino_pago_util::gettipo_termino_pagoDescripcion($tipo_termino_pago);
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
	
	interface termino_pago_proveedor_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $termino_pago_proveedors,int $iIdNuevotermino_pago_proveedor) : int;	
		public static function getIndiceActual(array $termino_pago_proveedors,termino_pago_proveedor $termino_pago_proveedor,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function gettermino_pago_proveedorDescripcion(?termino_pago_proveedor $termino_pago_proveedor) : string {;	
		public static function settermino_pago_proveedorDescripcion(?termino_pago_proveedor $termino_pago_proveedor,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $termino_pago_proveedors) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $termino_pago_proveedors);	
		public static function refrescarFKDescripcion(termino_pago_proveedor $termino_pago_proveedor);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',termino_pago_proveedor $termino_pago_proveedor,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

