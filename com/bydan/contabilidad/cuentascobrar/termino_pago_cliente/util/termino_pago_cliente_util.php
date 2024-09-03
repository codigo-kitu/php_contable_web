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

namespace com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL

use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_util;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

class termino_pago_cliente_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='termino_pago_cliente';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_cobrar.termino_pago_clientes';
	/*'Mantenimientotermino_pago_cliente.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascobrar';
	public static string $STR_NOMBRE_CLASE='Mantenimientotermino_pago_cliente.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='termino_pago_clientePersistenceName';
	/*.termino_pago_cliente_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='termino_pago_cliente_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='termino_pago_cliente_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='termino_pago_cliente_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Terminos Pago Clientes';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Terminos Pago Cliente';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCOBRAR='cuentascobrar';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $STR_TABLE_NAME='termino_pago_cliente';
	public static string $TERMINO_PAGO_CLIENTE='cc_termino_pago_cliente';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.termino_pago_cliente';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_termino_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.dias,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.inicial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuotas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_pronto_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable from '.termino_pago_cliente_util::$SCHEMA.'.'.termino_pago_cliente_util::$TABLENAME;*/
	
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
	//public $termino_pago_clienteConstantesFuncionesAdditional;
	
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
		$this->termino_pago_clienteConstantesFuncionesAdditional=new $termino_pago_clienteConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $termino_pago_clientes,int $iIdNuevotermino_pago_cliente) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($termino_pago_clientes as $termino_pago_clienteAux) {
			if($termino_pago_clienteAux->getId()==$iIdNuevotermino_pago_cliente) {
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
	
	public static function getIndiceActual(array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($termino_pago_clientes as $termino_pago_clienteAux) {
			if($termino_pago_clienteAux->getId()==$termino_pago_cliente->getId()) {
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
	public static function gettermino_pago_clienteDescripcion(?termino_pago_cliente $termino_pago_cliente) : string {//termino_pago_cliente NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($termino_pago_cliente !=null) {
			/*&& termino_pago_cliente->getId()!=0*/
			
			$sDescripcion=($termino_pago_cliente->getdescripcion());
			
			/*termino_pago_cliente;*/
		}
			
		return $sDescripcion;
	}
	
	public static function settermino_pago_clienteDescripcion(?termino_pago_cliente $termino_pago_cliente,string $sValor) {			
		if($termino_pago_cliente !=null) {
			$termino_pago_cliente->setdescripcion($sValor);;
			/*termino_pago_cliente;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $termino_pago_clientes) : array {
		$termino_pago_clientesForeignKey=array();
		
		foreach ($termino_pago_clientes as $termino_pago_clienteLocal) {
			$termino_pago_clientesForeignKey[$termino_pago_clienteLocal->getId()]=termino_pago_cliente_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
		}
			
		return $termino_pago_clientesForeignKey;
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
		
	public static function getpredeterminadoDescripcion($termino_pago_cliente) {
		$sDescripcion='Verdadero';
		if(!$termino_pago_cliente->getpredeterminado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $termino_pago_clientes) {		
		try {
			
			$termino_pago_cliente = new termino_pago_cliente();
			
			foreach($termino_pago_clientes as $termino_pago_cliente) {
				
				$termino_pago_cliente->setid_empresa_Descripcion(termino_pago_cliente_util::getempresaDescripcion($termino_pago_cliente->getempresa()));
				$termino_pago_cliente->setid_tipo_termino_pago_Descripcion(termino_pago_cliente_util::gettipo_termino_pagoDescripcion($termino_pago_cliente->gettipo_termino_pago()));
				$termino_pago_cliente->setid_cuenta_Descripcion(termino_pago_cliente_util::getcuentaDescripcion($termino_pago_cliente->getcuenta()));
			}
			
			if($termino_pago_cliente!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(termino_pago_cliente $termino_pago_cliente) {		
		try {
			
			
				$termino_pago_cliente->setid_empresa_Descripcion(termino_pago_cliente_util::getempresaDescripcion($termino_pago_cliente->getempresa()));
				$termino_pago_cliente->setid_tipo_termino_pago_Descripcion(termino_pago_cliente_util::gettipo_termino_pagoDescripcion($termino_pago_cliente->gettipo_termino_pago()));
				$termino_pago_cliente->setid_cuenta_Descripcion(termino_pago_cliente_util::getcuentaDescripcion($termino_pago_cliente->getcuenta()));
							
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
		return termino_pago_cliente_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return termino_pago_cliente_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_ID_TIPO_TERMINO_PAGO);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_ID_TIPO_TERMINO_PAGO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_MONTO);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_DIAS);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_DIAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_INICIAL);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_INICIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_CUOTAS);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_CUOTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_DESCUENTO_PRONTO_PAGO);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_DESCUENTO_PRONTO_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_PREDETERMINADO);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_PREDETERMINADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_ID_CUENTA);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_ID_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(termino_pago_cliente_util::$LABEL_CUENTA_CONTABLE);
			$reporte->setsDescripcion(termino_pago_cliente_util::$LABEL_CUENTA_CONTABLE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=termino_pago_cliente_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==termino_pago_cliente_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=termino_pago_cliente_util::$ID_EMPRESA;
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
				
				$classes[]=new Classe(parametro_facturacion::$class);
				$classes[]=new Classe(debito_cuenta_cobrar::$class);
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(cuenta_cobrar::$class);
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(consignacion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==parametro_facturacion::$class) {
						$classes[]=new Classe(parametro_facturacion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==debito_cuenta_cobrar::$class) {
						$classes[]=new Classe(debito_cuenta_cobrar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==factura::$class) {
						$classes[]=new Classe(factura::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==parametro_facturacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(parametro_facturacion::$class);
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
					if($clas==cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_cobrar::$class);
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
					if($clas==consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_ID, termino_pago_cliente_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_ID_EMPRESA, termino_pago_cliente_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_ID_TIPO_TERMINO_PAGO, termino_pago_cliente_util::$ID_TIPO_TERMINO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_CODIGO, termino_pago_cliente_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_DESCRIPCION, termino_pago_cliente_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_MONTO, termino_pago_cliente_util::$MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_DIAS, termino_pago_cliente_util::$DIAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_INICIAL, termino_pago_cliente_util::$INICIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_CUOTAS, termino_pago_cliente_util::$CUOTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_DESCUENTO_PRONTO_PAGO, termino_pago_cliente_util::$DESCUENTO_PRONTO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_PREDETERMINADO, termino_pago_cliente_util::$PREDETERMINADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_ID_CUENTA, termino_pago_cliente_util::$ID_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,termino_pago_cliente_util::$LABEL_CUENTA_CONTABLE, termino_pago_cliente_util::$CUENTA_CONTABLE,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$STR_CLASS_WEB_TITULO, parametro_facturacion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO, debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$STR_CLASS_WEB_TITULO, devolucion_factura_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_util::$STR_CLASS_WEB_TITULO, factura_lote_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,estimado_util::$STR_CLASS_WEB_TITULO, estimado_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_cobrar_util::$STR_CLASS_WEB_TITULO, cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$STR_CLASS_WEB_TITULO, cliente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_util::$STR_CLASS_WEB_TITULO, factura_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_util::$STR_CLASS_WEB_TITULO, consignacion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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
	
	public static function getDataReportRow(string $tipo='NORMAL',termino_pago_cliente $termino_pago_cliente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Termino Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getid_tipo_termino_pago_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getmonto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Dias',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getdias(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Inicial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getinicial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuotas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getcuotas(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Pronto Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getdescuento_pronto_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($termino_pago_cliente->getpredeterminado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($termino_pago_cliente->getid_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	interface termino_pago_cliente_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $termino_pago_clientes,int $iIdNuevotermino_pago_cliente) : int;	
		public static function getIndiceActual(array $termino_pago_clientes,termino_pago_cliente $termino_pago_cliente,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function gettermino_pago_clienteDescripcion(?termino_pago_cliente $termino_pago_cliente) : string {;	
		public static function settermino_pago_clienteDescripcion(?termino_pago_cliente $termino_pago_cliente,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $termino_pago_clientes) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $termino_pago_clientes);	
		public static function refrescarFKDescripcion(termino_pago_cliente $termino_pago_cliente);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',termino_pago_cliente $termino_pago_cliente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

