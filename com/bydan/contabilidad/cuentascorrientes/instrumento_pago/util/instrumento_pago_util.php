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

namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity\instrumento_pago;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


class instrumento_pago_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='instrumento_pago';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_corrientes.instrumento_pagos';
	/*'Mantenimientoinstrumento_pago.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascorrientes';
	public static string $STR_NOMBRE_CLASE='Mantenimientoinstrumento_pago.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='instrumento_pagoPersistenceName';
	/*.instrumento_pago_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='instrumento_pago_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='instrumento_pago_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='instrumento_pago_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Instrumento Pagos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Instrumento Pago';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCORRIENTES='cuentascorrientes';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $STR_TABLE_NAME='instrumento_pago';
	public static string $INSTRUMENTO_PAGO='cco_instrumento_pago';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.instrumento_pago';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.predeterminado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cuenta_contable_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente from '.instrumento_pago_util::$SCHEMA.'.'.instrumento_pago_util::$TABLENAME;*/
	
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
	//public $instrumento_pagoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $CODIGO='codigo';
    public static string $DESCRIPCION='descripcion';
    public static string $PREDETERMINADO='predeterminado';
    public static string $ID_CUENTA_COMPRAS='id_cuenta_compras';
    public static string $ID_CUENTA_VENTAS='id_cuenta_ventas';
    public static string $CUENTA_CONTABLE_COMPRA='cuenta_contable_compra';
    public static string $CUENTA_CONTABLE_VENTAS='cuenta_contable_ventas';
    public static string $ID_CUENTA_CORRIENTE='id_cuenta_corriente';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_PREDETERMINADO='Predeterminado';
    public static string $LABEL_ID_CUENTA_COMPRAS=' Cuenta Compras';
    public static string $LABEL_ID_CUENTA_VENTAS=' Cuenta Ventas';
    public static string $LABEL_CUENTA_CONTABLE_COMPRA='Cuenta Contable Compra';
    public static string $LABEL_CUENTA_CONTABLE_VENTAS='Cuenta Contable Ventas';
    public static string $LABEL_ID_CUENTA_CORRIENTE='Cuenta Cliente';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->instrumento_pagoConstantesFuncionesAdditional=new $instrumento_pagoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $instrumento_pagos,int $iIdNuevoinstrumento_pago) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($instrumento_pagos as $instrumento_pagoAux) {
			if($instrumento_pagoAux->getId()==$iIdNuevoinstrumento_pago) {
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
	
	public static function getIndiceActual(array $instrumento_pagos,instrumento_pago $instrumento_pago,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($instrumento_pagos as $instrumento_pagoAux) {
			if($instrumento_pagoAux->getId()==$instrumento_pago->getId()) {
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
	public static function getinstrumento_pagoDescripcion(?instrumento_pago $instrumento_pago) : string {//instrumento_pago NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($instrumento_pago !=null) {
			/*&& instrumento_pago->getId()!=0*/
			
			$sDescripcion=($instrumento_pago->getcodigo());
			
			/*instrumento_pago;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setinstrumento_pagoDescripcion(?instrumento_pago $instrumento_pago,string $sValor) {			
		if($instrumento_pago !=null) {
			$instrumento_pago->setcodigo($sValor);;
			/*instrumento_pago;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $instrumento_pagos) : array {
		$instrumento_pagosForeignKey=array();
		
		foreach ($instrumento_pagos as $instrumento_pagoLocal) {
			$instrumento_pagosForeignKey[$instrumento_pagoLocal->getId()]=instrumento_pago_util::getinstrumento_pagoDescripcion($instrumento_pagoLocal);
		}
			
		return $instrumento_pagosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelpredeterminado() : string  { return 'Predeterminado'; }
    public static function getColumnLabelid_cuenta_compras() : string  { return ' Cuenta Compras'; }
    public static function getColumnLabelid_cuenta_ventas() : string  { return ' Cuenta Ventas'; }
    public static function getColumnLabelcuenta_contable_compra() : string  { return 'Cuenta Contable Compra'; }
    public static function getColumnLabelcuenta_contable_ventas() : string  { return 'Cuenta Contable Ventas'; }
    public static function getColumnLabelid_cuenta_corriente() : string  { return 'Cuenta Cliente'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $instrumento_pagos) {		
		try {
			
			$instrumento_pago = new instrumento_pago();
			
			foreach($instrumento_pagos as $instrumento_pago) {
				
				$instrumento_pago->setid_cuenta_compras_Descripcion(instrumento_pago_util::getcuenta_comprasDescripcion($instrumento_pago->getcuenta_compras()));
				$instrumento_pago->setid_cuenta_ventas_Descripcion(instrumento_pago_util::getcuenta_ventasDescripcion($instrumento_pago->getcuenta_ventas()));
				$instrumento_pago->setid_cuenta_corriente_Descripcion(instrumento_pago_util::getcuenta_corrienteDescripcion($instrumento_pago->getcuenta_corriente()));
			}
			
			if($instrumento_pago!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(instrumento_pago $instrumento_pago) {		
		try {
			
			
				$instrumento_pago->setid_cuenta_compras_Descripcion(instrumento_pago_util::getcuenta_comprasDescripcion($instrumento_pago->getcuenta_compras()));
				$instrumento_pago->setid_cuenta_ventas_Descripcion(instrumento_pago_util::getcuenta_ventasDescripcion($instrumento_pago->getcuenta_ventas()));
				$instrumento_pago->setid_cuenta_corriente_Descripcion(instrumento_pago_util::getcuenta_corrienteDescripcion($instrumento_pago->getcuenta_corriente()));
							
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
			$sNombreIndice='Tipo=  Por  Cuenta Compras';
		} else if($sNombreIndice=='FK_Idcuenta_corriente') {
			$sNombreIndice='Tipo=  Por Cuenta Cliente';
		} else if($sNombreIndice=='FK_Idcuenta_ventas') {
			$sNombreIndice='Tipo=  Por  Cuenta Ventas';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcuenta_compras(int $id_cuenta_compras) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta Compras='+$id_cuenta_compras; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_corriente(int $id_cuenta_corriente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta Cliente='+$id_cuenta_corriente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_ventas(int $id_cuenta_ventas) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Cuenta Ventas='+$id_cuenta_ventas; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return instrumento_pago_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return instrumento_pago_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_PREDETERMINADO);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_PREDETERMINADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_ID_CUENTA_COMPRAS);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_ID_CUENTA_COMPRAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_ID_CUENTA_VENTAS);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_ID_CUENTA_VENTAS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_CUENTA_CONTABLE_COMPRA);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_CUENTA_CONTABLE_COMPRA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_CUENTA_CONTABLE_VENTAS);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_CUENTA_CONTABLE_VENTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(instrumento_pago_util::$LABEL_ID_CUENTA_CORRIENTE);
			$reporte->setsDescripcion(instrumento_pago_util::$LABEL_ID_CUENTA_CORRIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=instrumento_pago_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
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

				foreach($classesP as $clas) {
					if($clas==cuenta_corriente::$class) {
						$classes[]=new Classe(cuenta_corriente::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==cuenta_corriente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cuenta_corriente::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_ID, instrumento_pago_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_CODIGO, instrumento_pago_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_DESCRIPCION, instrumento_pago_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_PREDETERMINADO, instrumento_pago_util::$PREDETERMINADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_ID_CUENTA_COMPRAS, instrumento_pago_util::$ID_CUENTA_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_ID_CUENTA_VENTAS, instrumento_pago_util::$ID_CUENTA_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_CUENTA_CONTABLE_COMPRA, instrumento_pago_util::$CUENTA_CONTABLE_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_CUENTA_CONTABLE_VENTAS, instrumento_pago_util::$CUENTA_CONTABLE_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,instrumento_pago_util::$LABEL_ID_CUENTA_CORRIENTE, instrumento_pago_util::$ID_CUENTA_CORRIENTE,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',instrumento_pago $instrumento_pago,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getpredeterminado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getid_cuenta_compras_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Cuenta Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getid_cuenta_ventas_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getcuenta_contable_compra(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getcuenta_contable_ventas(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($instrumento_pago->getid_cuenta_corriente_Descripcion(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getcuenta_comprasDescripcion(?cuenta $cuenta) : string {
		$sDescripcion='none';
		if($cuenta!==null) {
			$sDescripcion=cuenta_util::getcuentaDescripcion($cuenta);
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
	
	public static function getcuenta_corrienteDescripcion(?cuenta_corriente $cuenta_corriente) : string {
		$sDescripcion='none';
		if($cuenta_corriente!==null) {
			$sDescripcion=cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corriente);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface instrumento_pago_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $instrumento_pagos,int $iIdNuevoinstrumento_pago) : int;	
		public static function getIndiceActual(array $instrumento_pagos,instrumento_pago $instrumento_pago,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getinstrumento_pagoDescripcion(?instrumento_pago $instrumento_pago) : string {;	
		public static function setinstrumento_pagoDescripcion(?instrumento_pago $instrumento_pago,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $instrumento_pagos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $instrumento_pagos);	
		public static function refrescarFKDescripcion(instrumento_pago $instrumento_pago);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',instrumento_pago $instrumento_pago,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

