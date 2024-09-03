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

namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

//REL


class clasificacion_cheque_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='clasificacion_cheque';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_corrientes.clasificacion_cheques';
	/*'Mantenimientoclasificacion_cheque.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascorrientes';
	public static string $STR_NOMBRE_CLASE='Mantenimientoclasificacion_cheque.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='clasificacion_chequePersistenceName';
	/*.clasificacion_cheque_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='clasificacion_cheque_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='clasificacion_cheque_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='clasificacion_cheque_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Clasificacion Cheques';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Clasificacion Cheque';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCORRIENTES='cuentascorrientes';
	public static string $STR_PREFIJO_TABLE='cco_';
	public static string $STR_TABLE_NAME='clasificacion_cheque';
	public static string $CLASIFICACION_CHEQUE='cco_clasificacion_cheque';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.clasificacion_cheque';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente_detalle,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_cheque,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto from '.clasificacion_cheque_util::$SCHEMA.'.'.clasificacion_cheque_util::$TABLENAME;*/
	
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
	//public $clasificacion_chequeConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_CUENTA_CORRIENTE_DETALLE='id_cuenta_corriente_detalle';
    public static string $ID_CATEGORIA_CHEQUE='id_categoria_cheque';
    public static string $MONTO='monto';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_CUENTA_CORRIENTE_DETALLE='Cuenta Cliente Detalle';
    public static string $LABEL_ID_CATEGORIA_CHEQUE='Categoria Cheque';
    public static string $LABEL_MONTO='Monto';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->clasificacion_chequeConstantesFuncionesAdditional=new $clasificacion_chequeConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $clasificacion_cheques,int $iIdNuevoclasificacion_cheque) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($clasificacion_cheques as $clasificacion_chequeAux) {
			if($clasificacion_chequeAux->getId()==$iIdNuevoclasificacion_cheque) {
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
	
	public static function getIndiceActual(array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($clasificacion_cheques as $clasificacion_chequeAux) {
			if($clasificacion_chequeAux->getId()==$clasificacion_cheque->getId()) {
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
	public static function getclasificacion_chequeDescripcion(?clasificacion_cheque $clasificacion_cheque) : string {//clasificacion_cheque NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($clasificacion_cheque !=null) {
			/*&& clasificacion_cheque->getId()!=0*/
			
			if($clasificacion_cheque->getId()!=null) {
				$sDescripcion=(string)$clasificacion_cheque->getId();
			}
			
			/*clasificacion_cheque;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setclasificacion_chequeDescripcion(?clasificacion_cheque $clasificacion_cheque,string $sValor) {			
		if($clasificacion_cheque !=null) {
			
			/*clasificacion_cheque;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $clasificacion_cheques) : array {
		$clasificacion_chequesForeignKey=array();
		
		foreach ($clasificacion_cheques as $clasificacion_chequeLocal) {
			$clasificacion_chequesForeignKey[$clasificacion_chequeLocal->getId()]=clasificacion_cheque_util::getclasificacion_chequeDescripcion($clasificacion_chequeLocal);
		}
			
		return $clasificacion_chequesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_cuenta_corriente_detalle() : string  { return 'Cuenta Cliente Detalle'; }
    public static function getColumnLabelid_categoria_cheque() : string  { return 'Categoria Cheque'; }
    public static function getColumnLabelmonto() : string  { return 'Monto'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $clasificacion_cheques) {		
		try {
			
			$clasificacion_cheque = new clasificacion_cheque();
			
			foreach($clasificacion_cheques as $clasificacion_cheque) {
				
				$clasificacion_cheque->setid_cuenta_corriente_detalle_Descripcion(clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($clasificacion_cheque->getcuenta_corriente_detalle()));
				$clasificacion_cheque->setid_categoria_cheque_Descripcion(clasificacion_cheque_util::getcategoria_chequeDescripcion($clasificacion_cheque->getcategoria_cheque()));
			}
			
			if($clasificacion_cheque!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(clasificacion_cheque $clasificacion_cheque) {		
		try {
			
			
				$clasificacion_cheque->setid_cuenta_corriente_detalle_Descripcion(clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($clasificacion_cheque->getcuenta_corriente_detalle()));
				$clasificacion_cheque->setid_categoria_cheque_Descripcion(clasificacion_cheque_util::getcategoria_chequeDescripcion($clasificacion_cheque->getcategoria_cheque()));
							
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
		} else if($sNombreIndice=='FK_Idcategoria_cheque') {
			$sNombreIndice='Tipo=  Por Categoria Cheque';
		} else if($sNombreIndice=='FK_Idcuenta_corriente_detalle') {
			$sNombreIndice='Tipo=  Por Cuenta Cliente Detalle';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcategoria_cheque(int $id_categoria_cheque) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Categoria Cheque='+$id_categoria_cheque; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta_corriente_detalle(int $id_cuenta_corriente_detalle) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta Cliente Detalle='+$id_cuenta_corriente_detalle; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return clasificacion_cheque_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return clasificacion_cheque_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(clasificacion_cheque_util::$LABEL_ID_CUENTA_CORRIENTE_DETALLE);
			$reporte->setsDescripcion(clasificacion_cheque_util::$LABEL_ID_CUENTA_CORRIENTE_DETALLE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(clasificacion_cheque_util::$LABEL_ID_CATEGORIA_CHEQUE);
			$reporte->setsDescripcion(clasificacion_cheque_util::$LABEL_ID_CATEGORIA_CHEQUE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(clasificacion_cheque_util::$LABEL_MONTO);
			$reporte->setsDescripcion(clasificacion_cheque_util::$LABEL_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=clasificacion_cheque_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(cuenta_corriente_detalle::$class);
				$classes[]=new Classe(categoria_cheque::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==cuenta_corriente_detalle::$class) {
						$classes[]=new Classe(cuenta_corriente_detalle::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==categoria_cheque::$class) {
						$classes[]=new Classe(categoria_cheque::$class);
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
					if($clas==categoria_cheque::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_cheque::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,clasificacion_cheque_util::$LABEL_ID, clasificacion_cheque_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,clasificacion_cheque_util::$LABEL_ID_CUENTA_CORRIENTE_DETALLE, clasificacion_cheque_util::$ID_CUENTA_CORRIENTE_DETALLE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,clasificacion_cheque_util::$LABEL_ID_CATEGORIA_CHEQUE, clasificacion_cheque_util::$ID_CATEGORIA_CHEQUE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,clasificacion_cheque_util::$LABEL_MONTO, clasificacion_cheque_util::$MONTO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente Detalle',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cliente Detalle',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria Cheque',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria Cheque',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',clasificacion_cheque $clasificacion_cheque,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente Detalle',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($clasificacion_cheque->getid_cuenta_corriente_detalle_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria Cheque',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($clasificacion_cheque->getid_categoria_cheque_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($clasificacion_cheque->getmonto(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getcuenta_corriente_detalleDescripcion(?cuenta_corriente_detalle $cuenta_corriente_detalle) : string {
		$sDescripcion='none';
		if($cuenta_corriente_detalle!==null) {
			$sDescripcion=cuenta_corriente_detalle_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalle);
		}
		return $sDescripcion;
	}	
	
	public static function getcategoria_chequeDescripcion(?categoria_cheque $categoria_cheque) : string {
		$sDescripcion='none';
		if($categoria_cheque!==null) {
			$sDescripcion=categoria_cheque_util::getcategoria_chequeDescripcion($categoria_cheque);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface clasificacion_cheque_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $clasificacion_cheques,int $iIdNuevoclasificacion_cheque) : int;	
		public static function getIndiceActual(array $clasificacion_cheques,clasificacion_cheque $clasificacion_cheque,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getclasificacion_chequeDescripcion(?clasificacion_cheque $clasificacion_cheque) : string {;	
		public static function setclasificacion_chequeDescripcion(?clasificacion_cheque $clasificacion_cheque,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $clasificacion_cheques) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $clasificacion_cheques);	
		public static function refrescarFKDescripcion(clasificacion_cheque $clasificacion_cheque);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',clasificacion_cheque $clasificacion_cheque,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

