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

namespace com\bydan\contabilidad\general\parametro_auxiliar\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

//REL


class parametro_auxiliar_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_auxiliar';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='general.parametro_auxiliars';
	/*'Mantenimientoparametro_auxiliar.jsf';*/
	public static string $STR_MODULO_OPCION='general';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_auxiliar.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_auxiliarPersistenceName';
	/*.parametro_auxiliar_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_auxiliar_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_auxiliar_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_auxiliar_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro Auxiliares';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Parametro Auxiliar';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $GENERAL='general';
	public static string $STR_PREFIJO_TABLE='gen_';
	public static string $STR_TABLE_NAME='parametro_auxiliar';
	public static string $PARAMETRO_AUXILIAR='gen_parametro_auxiliar';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_auxiliar';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_asignado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_solo_costo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_codigo_secuencial_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contador_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_costeo_kardex,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_producto_inactivo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_busqueda_incremental,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.permitir_revisar_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_decimales_unidades,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.mostrar_documento_anulado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_cc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_eliminacion_fisica_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.siguiente_numero_correlativo_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_asiento_simple_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_codigo_secuencial_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contador_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_cliente_inactivo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_codigo_secuencial_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contador_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_proveedor_inactivo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.abreviatura_registro_tributario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_asiento_cheque from '.parametro_auxiliar_util::$SCHEMA.'.'.parametro_auxiliar_util::$TABLENAME;*/
	
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
	//public $parametro_auxiliarConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $NOMBRE_ASIGNADO='nombre_asignado';
    public static string $SIGUIENTE_NUMERO_CORRELATIVO='siguiente_numero_correlativo';
    public static string $INCREMENTO='incremento';
    public static string $MOSTRAR_SOLO_COSTO_PRODUCTO='mostrar_solo_costo_producto';
    public static string $CON_CODIGO_SECUENCIAL_PRODUCTO='con_codigo_secuencial_producto';
    public static string $CONTADOR_PRODUCTO='contador_producto';
    public static string $ID_TIPO_COSTEO_KARDEX='id_tipo_costeo_kardex';
    public static string $CON_PRODUCTO_INACTIVO='con_producto_inactivo';
    public static string $CON_BUSQUEDA_INCREMENTAL='con_busqueda_incremental';
    public static string $PERMITIR_REVISAR_ASIENTO='permitir_revisar_asiento';
    public static string $NUMERO_DECIMALES_UNIDADES='numero_decimales_unidades';
    public static string $MOSTRAR_DOCUMENTO_ANULADO='mostrar_documento_anulado';
    public static string $SIGUIENTE_NUMERO_CORRELATIVO_CC='siguiente_numero_correlativo_cc';
    public static string $CON_ELIMINACION_FISICA_ASIENTO='con_eliminacion_fisica_asiento';
    public static string $SIGUIENTE_NUMERO_CORRELATIVO_ASIENTO='siguiente_numero_correlativo_asiento';
    public static string $CON_ASIENTO_SIMPLE_FACTURA='con_asiento_simple_factura';
    public static string $CON_CODIGO_SECUENCIAL_CLIENTE='con_codigo_secuencial_cliente';
    public static string $CONTADOR_CLIENTE='contador_cliente';
    public static string $CON_CLIENTE_INACTIVO='con_cliente_inactivo';
    public static string $CON_CODIGO_SECUENCIAL_PROVEEDOR='con_codigo_secuencial_proveedor';
    public static string $CONTADOR_PROVEEDOR='contador_proveedor';
    public static string $CON_PROVEEDOR_INACTIVO='con_proveedor_inactivo';
    public static string $ABREVIATURA_REGISTRO_TRIBUTARIO='abreviatura_registro_tributario';
    public static string $CON_ASIENTO_CHEQUE='con_asiento_cheque';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_NOMBRE_ASIGNADO='Nombre Asignado';
    public static string $LABEL_SIGUIENTE_NUMERO_CORRELATIVO='Siguiente Numero Correlativo';
    public static string $LABEL_INCREMENTO='Incremento';
    public static string $LABEL_MOSTRAR_SOLO_COSTO_PRODUCTO='Mostrar Solo Costo Producto';
    public static string $LABEL_CON_CODIGO_SECUENCIAL_PRODUCTO='Con Codigo Secuencial Producto';
    public static string $LABEL_CONTADOR_PRODUCTO='Contador Producto';
    public static string $LABEL_ID_TIPO_COSTEO_KARDEX=' Tipo Costeo Kardex';
    public static string $LABEL_CON_PRODUCTO_INACTIVO='Con Producto Inactivo';
    public static string $LABEL_CON_BUSQUEDA_INCREMENTAL='Con Busqueda Incremental';
    public static string $LABEL_PERMITIR_REVISAR_ASIENTO='Permitir Revisar Asiento';
    public static string $LABEL_NUMERO_DECIMALES_UNIDADES='Numero Decimales Unidades';
    public static string $LABEL_MOSTRAR_DOCUMENTO_ANULADO='Mostrar Documento Anulado';
    public static string $LABEL_SIGUIENTE_NUMERO_CORRELATIVO_CC='Siguiente Numero Correlativo Cc';
    public static string $LABEL_CON_ELIMINACION_FISICA_ASIENTO='Con Eliminacion Fisica Asiento';
    public static string $LABEL_SIGUIENTE_NUMERO_CORRELATIVO_ASIENTO='Siguiente Numero Correlativo Asiento';
    public static string $LABEL_CON_ASIENTO_SIMPLE_FACTURA='Con Asiento Simple Factura';
    public static string $LABEL_CON_CODIGO_SECUENCIAL_CLIENTE='Con Codigo Secuencial Cliente';
    public static string $LABEL_CONTADOR_CLIENTE='Contador Cliente';
    public static string $LABEL_CON_CLIENTE_INACTIVO='Con Cliente Inactivo';
    public static string $LABEL_CON_CODIGO_SECUENCIAL_PROVEEDOR='Con Codigo Secuencial Proveedor';
    public static string $LABEL_CONTADOR_PROVEEDOR='Contador Proveedor';
    public static string $LABEL_CON_PROVEEDOR_INACTIVO='Con Proveedor Inactivo';
    public static string $LABEL_ABREVIATURA_REGISTRO_TRIBUTARIO='Abreviatura Registro Tributario';
    public static string $LABEL_CON_ASIENTO_CHEQUE='Con Asiento Cheque';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_auxiliarConstantesFuncionesAdditional=new $parametro_auxiliarConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_auxiliars,int $iIdNuevoparametro_auxiliar) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_auxiliars as $parametro_auxiliarAux) {
			if($parametro_auxiliarAux->getId()==$iIdNuevoparametro_auxiliar) {
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
	
	public static function getIndiceActual(array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_auxiliars as $parametro_auxiliarAux) {
			if($parametro_auxiliarAux->getId()==$parametro_auxiliar->getId()) {
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
	public static function getparametro_auxiliarDescripcion(?parametro_auxiliar $parametro_auxiliar) : string {//parametro_auxiliar NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_auxiliar !=null) {
			/*&& parametro_auxiliar->getId()!=0*/
			
			$sDescripcion=$parametro_auxiliar->getnombre_asignado();
			
			/*parametro_auxiliar;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_auxiliarDescripcion(?parametro_auxiliar $parametro_auxiliar,string $sValor) {			
		if($parametro_auxiliar !=null) {
			$parametro_auxiliar->setnombre_asignado($sValor);
			/*parametro_auxiliar;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_auxiliars) : array {
		$parametro_auxiliarsForeignKey=array();
		
		foreach ($parametro_auxiliars as $parametro_auxiliarLocal) {
			$parametro_auxiliarsForeignKey[$parametro_auxiliarLocal->getId()]=parametro_auxiliar_util::getparametro_auxiliarDescripcion($parametro_auxiliarLocal);
		}
			
		return $parametro_auxiliarsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelnombre_asignado() : string  { return 'Nombre Asignado'; }
    public static function getColumnLabelsiguiente_numero_correlativo() : string  { return 'Siguiente Numero Correlativo'; }
    public static function getColumnLabelincremento() : string  { return 'Incremento'; }
    public static function getColumnLabelmostrar_solo_costo_producto() : string  { return 'Mostrar Solo Costo Producto'; }
    public static function getColumnLabelcon_codigo_secuencial_producto() : string  { return 'Con Codigo Secuencial Producto'; }
    public static function getColumnLabelcontador_producto() : string  { return 'Contador Producto'; }
    public static function getColumnLabelid_tipo_costeo_kardex() : string  { return ' Tipo Costeo Kardex'; }
    public static function getColumnLabelcon_producto_inactivo() : string  { return 'Con Producto Inactivo'; }
    public static function getColumnLabelcon_busqueda_incremental() : string  { return 'Con Busqueda Incremental'; }
    public static function getColumnLabelpermitir_revisar_asiento() : string  { return 'Permitir Revisar Asiento'; }
    public static function getColumnLabelnumero_decimales_unidades() : string  { return 'Numero Decimales Unidades'; }
    public static function getColumnLabelmostrar_documento_anulado() : string  { return 'Mostrar Documento Anulado'; }
    public static function getColumnLabelsiguiente_numero_correlativo_cc() : string  { return 'Siguiente Numero Correlativo Cc'; }
    public static function getColumnLabelcon_eliminacion_fisica_asiento() : string  { return 'Con Eliminacion Fisica Asiento'; }
    public static function getColumnLabelsiguiente_numero_correlativo_asiento() : string  { return 'Siguiente Numero Correlativo Asiento'; }
    public static function getColumnLabelcon_asiento_simple_factura() : string  { return 'Con Asiento Simple Factura'; }
    public static function getColumnLabelcon_codigo_secuencial_cliente() : string  { return 'Con Codigo Secuencial Cliente'; }
    public static function getColumnLabelcontador_cliente() : string  { return 'Contador Cliente'; }
    public static function getColumnLabelcon_cliente_inactivo() : string  { return 'Con Cliente Inactivo'; }
    public static function getColumnLabelcon_codigo_secuencial_proveedor() : string  { return 'Con Codigo Secuencial Proveedor'; }
    public static function getColumnLabelcontador_proveedor() : string  { return 'Contador Proveedor'; }
    public static function getColumnLabelcon_proveedor_inactivo() : string  { return 'Con Proveedor Inactivo'; }
    public static function getColumnLabelabreviatura_registro_tributario() : string  { return 'Abreviatura Registro Tributario'; }
    public static function getColumnLabelcon_asiento_cheque() : string  { return 'Con Asiento Cheque'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getmostrar_solo_costo_productoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getmostrar_solo_costo_producto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_codigo_secuencial_productoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_codigo_secuencial_producto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_producto_inactivoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_producto_inactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_busqueda_incrementalDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_busqueda_incremental()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getpermitir_revisar_asientoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getpermitir_revisar_asiento()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getmostrar_documento_anuladoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getmostrar_documento_anulado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_eliminacion_fisica_asientoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_eliminacion_fisica_asiento()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_asiento_simple_facturaDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_asiento_simple_factura()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_codigo_secuencial_clienteDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_codigo_secuencial_cliente()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_cliente_inactivoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_cliente_inactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_codigo_secuencial_proveedorDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_codigo_secuencial_proveedor()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_proveedor_inactivoDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_proveedor_inactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_asiento_chequeDescripcion($parametro_auxiliar) {
		$sDescripcion='Verdadero';
		if(!$parametro_auxiliar->getcon_asiento_cheque()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_auxiliars) {		
		try {
			
			$parametro_auxiliar = new parametro_auxiliar();
			
			foreach($parametro_auxiliars as $parametro_auxiliar) {
				
				$parametro_auxiliar->setid_empresa_Descripcion(parametro_auxiliar_util::getempresaDescripcion($parametro_auxiliar->getempresa()));
				$parametro_auxiliar->setid_tipo_costeo_kardex_Descripcion(parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($parametro_auxiliar->gettipo_costeo_kardex()));
			}
			
			if($parametro_auxiliar!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_auxiliar $parametro_auxiliar) {		
		try {
			
			
				$parametro_auxiliar->setid_empresa_Descripcion(parametro_auxiliar_util::getempresaDescripcion($parametro_auxiliar->getempresa()));
				$parametro_auxiliar->setid_tipo_costeo_kardex_Descripcion(parametro_auxiliar_util::gettipo_costeo_kardexDescripcion($parametro_auxiliar->gettipo_costeo_kardex()));
							
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
		} else if($sNombreIndice=='FK_Idtipo_costeo_kardex') {
			$sNombreIndice='Tipo=  Por  Tipo Costeo Kardex';
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

	public static function getDetalleIndiceFK_Idtipo_costeo_kardex(int $id_tipo_costeo_kardex) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Costeo Kardex='+$id_tipo_costeo_kardex; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return parametro_auxiliar_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_auxiliar_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_NOMBRE_ASIGNADO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_NOMBRE_ASIGNADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_INCREMENTO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_INCREMENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_MOSTRAR_SOLO_COSTO_PRODUCTO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_MOSTRAR_SOLO_COSTO_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_PRODUCTO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CONTADOR_PRODUCTO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CONTADOR_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_ID_TIPO_COSTEO_KARDEX);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_ID_TIPO_COSTEO_KARDEX.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_PRODUCTO_INACTIVO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_PRODUCTO_INACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_BUSQUEDA_INCREMENTAL);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_BUSQUEDA_INCREMENTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_PERMITIR_REVISAR_ASIENTO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_PERMITIR_REVISAR_ASIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_NUMERO_DECIMALES_UNIDADES);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_NUMERO_DECIMALES_UNIDADES);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_MOSTRAR_DOCUMENTO_ANULADO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_MOSTRAR_DOCUMENTO_ANULADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_CC);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_CC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_ELIMINACION_FISICA_ASIENTO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_ELIMINACION_FISICA_ASIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_ASIENTO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_ASIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_ASIENTO_SIMPLE_FACTURA);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_ASIENTO_SIMPLE_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_CLIENTE);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_CLIENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CONTADOR_CLIENTE);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CONTADOR_CLIENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_CLIENTE_INACTIVO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_CLIENTE_INACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_PROVEEDOR);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_PROVEEDOR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CONTADOR_PROVEEDOR);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CONTADOR_PROVEEDOR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_PROVEEDOR_INACTIVO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_PROVEEDOR_INACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_ABREVIATURA_REGISTRO_TRIBUTARIO);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_ABREVIATURA_REGISTRO_TRIBUTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_auxiliar_util::$LABEL_CON_ASIENTO_CHEQUE);
			$reporte->setsDescripcion(parametro_auxiliar_util::$LABEL_CON_ASIENTO_CHEQUE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_auxiliar_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==parametro_auxiliar_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=parametro_auxiliar_util::$ID_EMPRESA;
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
				$classes[]=new Classe(tipo_costeo_kardex::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_costeo_kardex::$class) {
						$classes[]=new Classe(tipo_costeo_kardex::$class);
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
					if($clas==tipo_costeo_kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_costeo_kardex::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_ID, parametro_auxiliar_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_ID_EMPRESA, parametro_auxiliar_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_NOMBRE_ASIGNADO, parametro_auxiliar_util::$NOMBRE_ASIGNADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO, parametro_auxiliar_util::$SIGUIENTE_NUMERO_CORRELATIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_INCREMENTO, parametro_auxiliar_util::$INCREMENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_MOSTRAR_SOLO_COSTO_PRODUCTO, parametro_auxiliar_util::$MOSTRAR_SOLO_COSTO_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_PRODUCTO, parametro_auxiliar_util::$CON_CODIGO_SECUENCIAL_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CONTADOR_PRODUCTO, parametro_auxiliar_util::$CONTADOR_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_ID_TIPO_COSTEO_KARDEX, parametro_auxiliar_util::$ID_TIPO_COSTEO_KARDEX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_PRODUCTO_INACTIVO, parametro_auxiliar_util::$CON_PRODUCTO_INACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_BUSQUEDA_INCREMENTAL, parametro_auxiliar_util::$CON_BUSQUEDA_INCREMENTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_PERMITIR_REVISAR_ASIENTO, parametro_auxiliar_util::$PERMITIR_REVISAR_ASIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_NUMERO_DECIMALES_UNIDADES, parametro_auxiliar_util::$NUMERO_DECIMALES_UNIDADES,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_MOSTRAR_DOCUMENTO_ANULADO, parametro_auxiliar_util::$MOSTRAR_DOCUMENTO_ANULADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_CC, parametro_auxiliar_util::$SIGUIENTE_NUMERO_CORRELATIVO_CC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_ELIMINACION_FISICA_ASIENTO, parametro_auxiliar_util::$CON_ELIMINACION_FISICA_ASIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_SIGUIENTE_NUMERO_CORRELATIVO_ASIENTO, parametro_auxiliar_util::$SIGUIENTE_NUMERO_CORRELATIVO_ASIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_ASIENTO_SIMPLE_FACTURA, parametro_auxiliar_util::$CON_ASIENTO_SIMPLE_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_CLIENTE, parametro_auxiliar_util::$CON_CODIGO_SECUENCIAL_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CONTADOR_CLIENTE, parametro_auxiliar_util::$CONTADOR_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_CLIENTE_INACTIVO, parametro_auxiliar_util::$CON_CLIENTE_INACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_CODIGO_SECUENCIAL_PROVEEDOR, parametro_auxiliar_util::$CON_CODIGO_SECUENCIAL_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CONTADOR_PROVEEDOR, parametro_auxiliar_util::$CONTADOR_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_PROVEEDOR_INACTIVO, parametro_auxiliar_util::$CON_PROVEEDOR_INACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_ABREVIATURA_REGISTRO_TRIBUTARIO, parametro_auxiliar_util::$ABREVIATURA_REGISTRO_TRIBUTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_auxiliar_util::$LABEL_CON_ASIENTO_CHEQUE, parametro_auxiliar_util::$CON_ASIENTO_CHEQUE,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Nombre Asignado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Asignado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Solo Costo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Solo Costo Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Codigo Secuencial Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contador Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contador Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Costeo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Costeo Kardex',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Producto Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Producto Inactivo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Busqueda Incremental',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Busqueda Incremental',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Permitir Revisar Asiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Permitir Revisar Asiento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Decimales Unidades',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Decimales Unidades',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Documento Anulado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Documento Anulado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Cc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Cc',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Eliminacion Fisica Asiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Eliminacion Fisica Asiento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Asiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Siguiente Numero Correlativo Asiento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Asiento Simple Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Asiento Simple Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Codigo Secuencial Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contador Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contador Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Cliente Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Cliente Inactivo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Codigo Secuencial Proveedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contador Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contador Proveedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Proveedor Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Proveedor Inactivo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Abreviatura Registro Tributario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Abreviatura Registro Tributario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Asiento Cheque',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Asiento Cheque',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_auxiliar $parametro_auxiliar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Asignado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getnombre_asignado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getsiguiente_numero_correlativo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getincremento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Solo Costo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getmostrar_solo_costo_producto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_codigo_secuencial_producto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contador Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcontador_producto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Costeo Kardex',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getid_tipo_costeo_kardex_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Producto Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_producto_inactivo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Busqueda Incremental',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_busqueda_incremental()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Permitir Revisar Asiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getpermitir_revisar_asiento()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Decimales Unidades',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getnumero_decimales_unidades(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Documento Anulado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getmostrar_documento_anulado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Cc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getsiguiente_numero_correlativo_cc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Eliminacion Fisica Asiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_eliminacion_fisica_asiento()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Siguiente Numero Correlativo Asiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getsiguiente_numero_correlativo_asiento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Asiento Simple Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_asiento_simple_factura()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_codigo_secuencial_cliente()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contador Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcontador_cliente(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Cliente Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_cliente_inactivo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Codigo Secuencial Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_codigo_secuencial_proveedor()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contador Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getcontador_proveedor(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Proveedor Inactivo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_proveedor_inactivo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Abreviatura Registro Tributario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_auxiliar->getabreviatura_registro_tributario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Asiento Cheque',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_auxiliar->getcon_asiento_cheque()),40,6,1); $row[]=$cellReport;
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
	
	public static function gettipo_costeo_kardexDescripcion(?tipo_costeo_kardex $tipo_costeo_kardex) : string {
		$sDescripcion='none';
		if($tipo_costeo_kardex!==null) {
			$sDescripcion=tipo_costeo_kardex_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardex);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface parametro_auxiliar_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_auxiliars,int $iIdNuevoparametro_auxiliar) : int;	
		public static function getIndiceActual(array $parametro_auxiliars,parametro_auxiliar $parametro_auxiliar,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_auxiliarDescripcion(?parametro_auxiliar $parametro_auxiliar) : string {;	
		public static function setparametro_auxiliarDescripcion(?parametro_auxiliar $parametro_auxiliar,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_auxiliars) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_auxiliars);	
		public static function refrescarFKDescripcion(parametro_auxiliar $parametro_auxiliar);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',parametro_auxiliar $parametro_auxiliar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

