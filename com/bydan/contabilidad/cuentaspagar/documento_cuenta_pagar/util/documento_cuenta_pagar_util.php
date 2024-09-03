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

namespace com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\business\entity\imagen_documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\util\imagen_documento_cuenta_pagar_util;
use com\bydan\contabilidad\inventario\devolucion\business\entity\devolucion;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;

class documento_cuenta_pagar_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='documento_cuenta_pagar';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_pagar.documento_cuenta_pagars';
	/*'Mantenimientodocumento_cuenta_pagar.jsf';*/
	public static string $STR_MODULO_OPCION='cuentaspagar';
	public static string $STR_NOMBRE_CLASE='Mantenimientodocumento_cuenta_pagar.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='documento_cuenta_pagarPersistenceName';
	/*.documento_cuenta_pagar_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='documento_cuenta_pagar_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='documento_cuenta_pagar_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='documento_cuenta_pagar_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Documentos Cuentas por Pagares';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Documentos Cuentas por Pagar';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASPAGAR='cuentaspagar';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $STR_TABLE_NAME='documento_cuenta_pagar';
	public static string $DOCUMENTO_CUENTA_PAGAR='cp_documento_cuenta_pagar';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.documento_cuenta_pagar';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_parcial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_de_pagos,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance_mon,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_pagado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pagado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo_destino,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_destino,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_pc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_mora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.interes_mora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.dias_gracia_mora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.instrumento_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.tipo_cambio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.clase_registro,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado_registro,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.motivo_anulacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_1,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_incluido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observaciones,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.grupo_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.termino_idpv,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_forma_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia_pago,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_base,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta_corriente from '.documento_cuenta_pagar_util::$SCHEMA.'.'.documento_cuenta_pagar_util::$TABLENAME;*/
	
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
	//public $documento_cuenta_pagarConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $ID_USUARIO='id_usuario';
    public static string $NUMERO='numero';
    public static string $ID_PROVEEDOR='id_proveedor';
    public static string $TIPO='tipo';
    public static string $FECHA_EMISION='fecha_emision';
    public static string $DESCRIPCION='descripcion';
    public static string $MONTO='monto';
    public static string $MONTO_PARCIAL='monto_parcial';
    public static string $MONEDA='moneda';
    public static string $FECHA_VENCE='fecha_vence';
    public static string $NUMERO_DE_PAGOS='numero_de_pagos';
    public static string $BALANCE='balance';
    public static string $BALANCE_MON='balance_mon';
    public static string $NUMERO_PAGADO='numero_pagado';
    public static string $ID_PAGADO='id_pagado';
    public static string $MODULO_ORIGEN='modulo_origen';
    public static string $ID_ORIGEN='id_origen';
    public static string $MODULO_DESTINO='modulo_destino';
    public static string $ID_DESTINO='id_destino';
    public static string $NOMBRE_PC='nombre_pc';
    public static string $HORA='hora';
    public static string $MONTO_MORA='monto_mora';
    public static string $INTERES_MORA='interes_mora';
    public static string $DIAS_GRACIA_MORA='dias_gracia_mora';
    public static string $INSTRUMENTO_PAGO='instrumento_pago';
    public static string $TIPO_CAMBIO='tipo_cambio';
    public static string $NRO_DOCUMENTO_PROVEEDOR='nro_documento_proveedor';
    public static string $CLASE_REGISTRO='clase_registro';
    public static string $ESTADO_REGISTRO='estado_registro';
    public static string $MOTIVO_ANULACION='motivo_anulacion';
    public static string $IMPUESTO_1='impuesto_1';
    public static string $IMPUESTO_2='impuesto_2';
    public static string $IMPUESTO_INCLUIDO='impuesto_incluido';
    public static string $OBSERVACIONES='observaciones';
    public static string $GRUPO_PAGO='grupo_pago';
    public static string $TERMINO_IDPV='termino_idpv';
    public static string $ID_FORMA_PAGO_PROVEEDOR='id_forma_pago_proveedor';
    public static string $NRO_PAGO='nro_pago';
    public static string $REFERENCIA_PAGO='referencia_pago';
    public static string $FECHA_HORA='fecha_hora';
    public static string $ID_BASE='id_base';
    public static string $ID_CUENTA_CORRIENTE='id_cuenta_corriente';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_SUCURSAL='Sucursal';
    public static string $LABEL_ID_EJERCICIO='Ejercicio';
    public static string $LABEL_ID_PERIODO='Periodo';
    public static string $LABEL_ID_USUARIO='Usuario';
    public static string $LABEL_NUMERO='Numero';
    public static string $LABEL_ID_PROVEEDOR='Proveedor';
    public static string $LABEL_TIPO='Tipo';
    public static string $LABEL_FECHA_EMISION='Fecha Emision';
    public static string $LABEL_DESCRIPCION='Descripcion';
    public static string $LABEL_MONTO='Monto';
    public static string $LABEL_MONTO_PARCIAL='Monto Parcial';
    public static string $LABEL_MONEDA='Moneda';
    public static string $LABEL_FECHA_VENCE='Fecha Vencimiento';
    public static string $LABEL_NUMERO_DE_PAGOS='Nro De Pagos';
    public static string $LABEL_BALANCE='Balance';
    public static string $LABEL_BALANCE_MON='Balance Mon';
    public static string $LABEL_NUMERO_PAGADO='Nro Documento Pagado';
    public static string $LABEL_ID_PAGADO='Id Pagado';
    public static string $LABEL_MODULO_ORIGEN='Modulo Origen';
    public static string $LABEL_ID_ORIGEN='Origen';
    public static string $LABEL_MODULO_DESTINO='Modulo Destino';
    public static string $LABEL_ID_DESTINO='Destino';
    public static string $LABEL_NOMBRE_PC='Nombre Pc';
    public static string $LABEL_HORA='Hora';
    public static string $LABEL_MONTO_MORA='Monto Mora';
    public static string $LABEL_INTERES_MORA='Interes Mora';
    public static string $LABEL_DIAS_GRACIA_MORA='Dias Gracia Mora';
    public static string $LABEL_INSTRUMENTO_PAGO='Instrumento Pago';
    public static string $LABEL_TIPO_CAMBIO='Tipo Cambio';
    public static string $LABEL_NRO_DOCUMENTO_PROVEEDOR='Nro Documento Proveedor';
    public static string $LABEL_CLASE_REGISTRO='Clase Registro';
    public static string $LABEL_ESTADO_REGISTRO='Estado Registro';
    public static string $LABEL_MOTIVO_ANULACION='Motivo Anulacion';
    public static string $LABEL_IMPUESTO_1='Impuesto 1';
    public static string $LABEL_IMPUESTO_2='Impuesto 2';
    public static string $LABEL_IMPUESTO_INCLUIDO='Impuesto Incluido';
    public static string $LABEL_OBSERVACIONES='Observaciones';
    public static string $LABEL_GRUPO_PAGO='Grupo Pago';
    public static string $LABEL_TERMINO_IDPV='Termino Idpv';
    public static string $LABEL_ID_FORMA_PAGO_PROVEEDOR='Forma Pago Proveedor';
    public static string $LABEL_NRO_PAGO='Nro Pago';
    public static string $LABEL_REFERENCIA_PAGO='Referencia Pago';
    public static string $LABEL_FECHA_HORA='Fecha Hora';
    public static string $LABEL_ID_BASE='Id Base';
    public static string $LABEL_ID_CUENTA_CORRIENTE='Cuenta Cliente';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_cuenta_pagarConstantesFuncionesAdditional=new $documento_cuenta_pagarConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $documento_cuenta_pagars,int $iIdNuevodocumento_cuenta_pagar) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($documento_cuenta_pagars as $documento_cuenta_pagarAux) {
			if($documento_cuenta_pagarAux->getId()==$iIdNuevodocumento_cuenta_pagar) {
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
	
	public static function getIndiceActual(array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($documento_cuenta_pagars as $documento_cuenta_pagarAux) {
			if($documento_cuenta_pagarAux->getId()==$documento_cuenta_pagar->getId()) {
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
	public static function getdocumento_cuenta_pagarDescripcion(?documento_cuenta_pagar $documento_cuenta_pagar) : string {//documento_cuenta_pagar NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($documento_cuenta_pagar !=null) {
			/*&& documento_cuenta_pagar->getId()!=0*/
			
			if($documento_cuenta_pagar->getId()!=null) {
				$sDescripcion=(string)$documento_cuenta_pagar->getId();
			}
			
			/*documento_cuenta_pagar;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setdocumento_cuenta_pagarDescripcion(?documento_cuenta_pagar $documento_cuenta_pagar,string $sValor) {			
		if($documento_cuenta_pagar !=null) {
			
			/*documento_cuenta_pagar;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $documento_cuenta_pagars) : array {
		$documento_cuenta_pagarsForeignKey=array();
		
		foreach ($documento_cuenta_pagars as $documento_cuenta_pagarLocal) {
			$documento_cuenta_pagarsForeignKey[$documento_cuenta_pagarLocal->getId()]=documento_cuenta_pagar_util::getdocumento_cuenta_pagarDescripcion($documento_cuenta_pagarLocal);
		}
			
		return $documento_cuenta_pagarsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return 'Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return 'Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return 'Periodo'; }
    public static function getColumnLabelid_usuario() : string  { return 'Usuario'; }
    public static function getColumnLabelnumero() : string  { return 'Numero'; }
    public static function getColumnLabelid_proveedor() : string  { return 'Proveedor'; }
    public static function getColumnLabeltipo() : string  { return 'Tipo'; }
    public static function getColumnLabelfecha_emision() : string  { return 'Fecha Emision'; }
    public static function getColumnLabeldescripcion() : string  { return 'Descripcion'; }
    public static function getColumnLabelmonto() : string  { return 'Monto'; }
    public static function getColumnLabelmonto_parcial() : string  { return 'Monto Parcial'; }
    public static function getColumnLabelmoneda() : string  { return 'Moneda'; }
    public static function getColumnLabelfecha_vence() : string  { return 'Fecha Vencimiento'; }
    public static function getColumnLabelnumero_de_pagos() : string  { return 'Nro De Pagos'; }
    public static function getColumnLabelbalance() : string  { return 'Balance'; }
    public static function getColumnLabelbalance_mon() : string  { return 'Balance Mon'; }
    public static function getColumnLabelnumero_pagado() : string  { return 'Nro Documento Pagado'; }
    public static function getColumnLabelid_pagado() : string  { return 'Id Pagado'; }
    public static function getColumnLabelmodulo_origen() : string  { return 'Modulo Origen'; }
    public static function getColumnLabelid_origen() : string  { return 'Origen'; }
    public static function getColumnLabelmodulo_destino() : string  { return 'Modulo Destino'; }
    public static function getColumnLabelid_destino() : string  { return 'Destino'; }
    public static function getColumnLabelnombre_pc() : string  { return 'Nombre Pc'; }
    public static function getColumnLabelhora() : string  { return 'Hora'; }
    public static function getColumnLabelmonto_mora() : string  { return 'Monto Mora'; }
    public static function getColumnLabelinteres_mora() : string  { return 'Interes Mora'; }
    public static function getColumnLabeldias_gracia_mora() : string  { return 'Dias Gracia Mora'; }
    public static function getColumnLabelinstrumento_pago() : string  { return 'Instrumento Pago'; }
    public static function getColumnLabeltipo_cambio() : string  { return 'Tipo Cambio'; }
    public static function getColumnLabelnro_documento_proveedor() : string  { return 'Nro Documento Proveedor'; }
    public static function getColumnLabelclase_registro() : string  { return 'Clase Registro'; }
    public static function getColumnLabelestado_registro() : string  { return 'Estado Registro'; }
    public static function getColumnLabelmotivo_anulacion() : string  { return 'Motivo Anulacion'; }
    public static function getColumnLabelimpuesto_1() : string  { return 'Impuesto 1'; }
    public static function getColumnLabelimpuesto_2() : string  { return 'Impuesto 2'; }
    public static function getColumnLabelimpuesto_incluido() : string  { return 'Impuesto Incluido'; }
    public static function getColumnLabelobservaciones() : string  { return 'Observaciones'; }
    public static function getColumnLabelgrupo_pago() : string  { return 'Grupo Pago'; }
    public static function getColumnLabeltermino_idpv() : string  { return 'Termino Idpv'; }
    public static function getColumnLabelid_forma_pago_proveedor() : string  { return 'Forma Pago Proveedor'; }
    public static function getColumnLabelnro_pago() : string  { return 'Nro Pago'; }
    public static function getColumnLabelreferencia_pago() : string  { return 'Referencia Pago'; }
    public static function getColumnLabelfecha_hora() : string  { return 'Fecha Hora'; }
    public static function getColumnLabelid_base() : string  { return 'Id Base'; }
    public static function getColumnLabelid_cuenta_corriente() : string  { return 'Cuenta Cliente'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getimpuesto_incluidoDescripcion($documento_cuenta_pagar) {
		$sDescripcion='Verdadero';
		if(!$documento_cuenta_pagar->getimpuesto_incluido()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $documento_cuenta_pagars) {		
		try {
			
			$documento_cuenta_pagar = new documento_cuenta_pagar();
			
			foreach($documento_cuenta_pagars as $documento_cuenta_pagar) {
				
				$documento_cuenta_pagar->setid_empresa_Descripcion(documento_cuenta_pagar_util::getempresaDescripcion($documento_cuenta_pagar->getempresa()));
				$documento_cuenta_pagar->setid_sucursal_Descripcion(documento_cuenta_pagar_util::getsucursalDescripcion($documento_cuenta_pagar->getsucursal()));
				$documento_cuenta_pagar->setid_ejercicio_Descripcion(documento_cuenta_pagar_util::getejercicioDescripcion($documento_cuenta_pagar->getejercicio()));
				$documento_cuenta_pagar->setid_periodo_Descripcion(documento_cuenta_pagar_util::getperiodoDescripcion($documento_cuenta_pagar->getperiodo()));
				$documento_cuenta_pagar->setid_usuario_Descripcion(documento_cuenta_pagar_util::getusuarioDescripcion($documento_cuenta_pagar->getusuario()));
				$documento_cuenta_pagar->setid_proveedor_Descripcion(documento_cuenta_pagar_util::getproveedorDescripcion($documento_cuenta_pagar->getproveedor()));
				$documento_cuenta_pagar->setid_forma_pago_proveedor_Descripcion(documento_cuenta_pagar_util::getforma_pago_proveedorDescripcion($documento_cuenta_pagar->getforma_pago_proveedor()));
				$documento_cuenta_pagar->setid_cuenta_corriente_Descripcion(documento_cuenta_pagar_util::getcuenta_corrienteDescripcion($documento_cuenta_pagar->getcuenta_corriente()));
			}
			
			if($documento_cuenta_pagar!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(documento_cuenta_pagar $documento_cuenta_pagar) {		
		try {
			
			
				$documento_cuenta_pagar->setid_empresa_Descripcion(documento_cuenta_pagar_util::getempresaDescripcion($documento_cuenta_pagar->getempresa()));
				$documento_cuenta_pagar->setid_sucursal_Descripcion(documento_cuenta_pagar_util::getsucursalDescripcion($documento_cuenta_pagar->getsucursal()));
				$documento_cuenta_pagar->setid_ejercicio_Descripcion(documento_cuenta_pagar_util::getejercicioDescripcion($documento_cuenta_pagar->getejercicio()));
				$documento_cuenta_pagar->setid_periodo_Descripcion(documento_cuenta_pagar_util::getperiodoDescripcion($documento_cuenta_pagar->getperiodo()));
				$documento_cuenta_pagar->setid_usuario_Descripcion(documento_cuenta_pagar_util::getusuarioDescripcion($documento_cuenta_pagar->getusuario()));
				$documento_cuenta_pagar->setid_proveedor_Descripcion(documento_cuenta_pagar_util::getproveedorDescripcion($documento_cuenta_pagar->getproveedor()));
				$documento_cuenta_pagar->setid_forma_pago_proveedor_Descripcion(documento_cuenta_pagar_util::getforma_pago_proveedorDescripcion($documento_cuenta_pagar->getforma_pago_proveedor()));
				$documento_cuenta_pagar->setid_cuenta_corriente_Descripcion(documento_cuenta_pagar_util::getcuenta_corrienteDescripcion($documento_cuenta_pagar->getcuenta_corriente()));
							
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
		} else if($sNombreIndice=='FK_Idcuenta_corriente') {
			$sNombreIndice='Tipo=  Por Cuenta Cliente';
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idforma_pago_proveedor') {
			$sNombreIndice='Tipo=  Por Forma Pago Proveedor';
		} else if($sNombreIndice=='FK_Idperiodo') {
			$sNombreIndice='Tipo=  Por Periodo';
		} else if($sNombreIndice=='FK_Idproveedor') {
			$sNombreIndice='Tipo=  Por Proveedor';
		} else if($sNombreIndice=='FK_Idsucursal') {
			$sNombreIndice='Tipo=  Por Sucursal';
		} else if($sNombreIndice=='FK_Idusuario') {
			$sNombreIndice='Tipo=  Por Usuario';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcuenta_corriente(int $id_cuenta_corriente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta Cliente='+$id_cuenta_corriente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idejercicio(int $id_ejercicio) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Ejercicio='+$id_ejercicio; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idforma_pago_proveedor(int $id_forma_pago_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Forma Pago Proveedor='+$id_forma_pago_proveedor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperiodo(int $id_periodo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Periodo='+$id_periodo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproveedor(int $id_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Proveedor='+$id_proveedor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsucursal(int $id_sucursal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sucursal='+$id_sucursal; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idusuario(int $id_usuario) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Usuario='+$id_usuario; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return documento_cuenta_pagar_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return documento_cuenta_pagar_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_NUMERO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_NUMERO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_PROVEEDOR);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_TIPO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_TIPO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_FECHA_EMISION);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_FECHA_EMISION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_DESCRIPCION);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_DESCRIPCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_MONTO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_MONTO_PARCIAL);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_MONTO_PARCIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_MONEDA);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_MONEDA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_FECHA_VENCE);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_FECHA_VENCE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_NUMERO_DE_PAGOS);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_NUMERO_DE_PAGOS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_BALANCE);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_BALANCE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_BALANCE_MON);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_BALANCE_MON);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_NUMERO_PAGADO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_NUMERO_PAGADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_PAGADO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_PAGADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_MODULO_ORIGEN);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_MODULO_ORIGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_ORIGEN);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_ORIGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_MODULO_DESTINO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_MODULO_DESTINO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_DESTINO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_DESTINO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_NOMBRE_PC);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_NOMBRE_PC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_HORA);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_HORA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_MONTO_MORA);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_MONTO_MORA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_INTERES_MORA);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_INTERES_MORA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_DIAS_GRACIA_MORA);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_DIAS_GRACIA_MORA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_INSTRUMENTO_PAGO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_INSTRUMENTO_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_TIPO_CAMBIO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_TIPO_CAMBIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_NRO_DOCUMENTO_PROVEEDOR);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_NRO_DOCUMENTO_PROVEEDOR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_CLASE_REGISTRO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_CLASE_REGISTRO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ESTADO_REGISTRO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ESTADO_REGISTRO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_MOTIVO_ANULACION);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_MOTIVO_ANULACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_IMPUESTO_1);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_IMPUESTO_1);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_IMPUESTO_2);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_IMPUESTO_2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_IMPUESTO_INCLUIDO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_IMPUESTO_INCLUIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_OBSERVACIONES);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_OBSERVACIONES);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_GRUPO_PAGO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_GRUPO_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_TERMINO_IDPV);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_TERMINO_IDPV);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_FORMA_PAGO_PROVEEDOR);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_FORMA_PAGO_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_NRO_PAGO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_NRO_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_REFERENCIA_PAGO);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_REFERENCIA_PAGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_FECHA_HORA);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_FECHA_HORA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_BASE);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_BASE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(documento_cuenta_pagar_util::$LABEL_ID_CUENTA_CORRIENTE);
			$reporte->setsDescripcion(documento_cuenta_pagar_util::$LABEL_ID_CUENTA_CORRIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=documento_cuenta_pagar_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==documento_cuenta_pagar_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=documento_cuenta_pagar_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==documento_cuenta_pagar_util::$ID_SUCURSAL) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=documento_cuenta_pagar_util::$ID_SUCURSAL;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==documento_cuenta_pagar_util::$ID_EJERCICIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=documento_cuenta_pagar_util::$ID_EJERCICIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==documento_cuenta_pagar_util::$ID_PERIODO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=documento_cuenta_pagar_util::$ID_PERIODO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==documento_cuenta_pagar_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=documento_cuenta_pagar_util::$ID_USUARIO;
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
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(proveedor::$class);
				$classes[]=new Classe(forma_pago_proveedor::$class);
				$classes[]=new Classe(cuenta_corriente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==proveedor::$class) {
						$classes[]=new Classe(proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==forma_pago_proveedor::$class) {
						$classes[]=new Classe(forma_pago_proveedor::$class);
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
					if($clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
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
					if($clas==forma_pago_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(forma_pago_proveedor::$class);
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
				
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(imagen_documento_cuenta_pagar::$class);
				$classes[]=new Classe(devolucion::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==imagen_documento_cuenta_pagar::$class) {
						$classes[]=new Classe(imagen_documento_cuenta_pagar::$class); break;
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
					if($clas==imagen_documento_cuenta_pagar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_documento_cuenta_pagar::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID, documento_cuenta_pagar_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_EMPRESA, documento_cuenta_pagar_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_SUCURSAL, documento_cuenta_pagar_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_EJERCICIO, documento_cuenta_pagar_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_PERIODO, documento_cuenta_pagar_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_USUARIO, documento_cuenta_pagar_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_NUMERO, documento_cuenta_pagar_util::$NUMERO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_PROVEEDOR, documento_cuenta_pagar_util::$ID_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_TIPO, documento_cuenta_pagar_util::$TIPO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_FECHA_EMISION, documento_cuenta_pagar_util::$FECHA_EMISION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_DESCRIPCION, documento_cuenta_pagar_util::$DESCRIPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_MONTO, documento_cuenta_pagar_util::$MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_MONTO_PARCIAL, documento_cuenta_pagar_util::$MONTO_PARCIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_MONEDA, documento_cuenta_pagar_util::$MONEDA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_FECHA_VENCE, documento_cuenta_pagar_util::$FECHA_VENCE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_NUMERO_DE_PAGOS, documento_cuenta_pagar_util::$NUMERO_DE_PAGOS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_BALANCE, documento_cuenta_pagar_util::$BALANCE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_BALANCE_MON, documento_cuenta_pagar_util::$BALANCE_MON,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_NUMERO_PAGADO, documento_cuenta_pagar_util::$NUMERO_PAGADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_PAGADO, documento_cuenta_pagar_util::$ID_PAGADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_MODULO_ORIGEN, documento_cuenta_pagar_util::$MODULO_ORIGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_ORIGEN, documento_cuenta_pagar_util::$ID_ORIGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_MODULO_DESTINO, documento_cuenta_pagar_util::$MODULO_DESTINO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_DESTINO, documento_cuenta_pagar_util::$ID_DESTINO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_NOMBRE_PC, documento_cuenta_pagar_util::$NOMBRE_PC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_HORA, documento_cuenta_pagar_util::$HORA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_MONTO_MORA, documento_cuenta_pagar_util::$MONTO_MORA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_INTERES_MORA, documento_cuenta_pagar_util::$INTERES_MORA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_DIAS_GRACIA_MORA, documento_cuenta_pagar_util::$DIAS_GRACIA_MORA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_INSTRUMENTO_PAGO, documento_cuenta_pagar_util::$INSTRUMENTO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_TIPO_CAMBIO, documento_cuenta_pagar_util::$TIPO_CAMBIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_NRO_DOCUMENTO_PROVEEDOR, documento_cuenta_pagar_util::$NRO_DOCUMENTO_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_CLASE_REGISTRO, documento_cuenta_pagar_util::$CLASE_REGISTRO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ESTADO_REGISTRO, documento_cuenta_pagar_util::$ESTADO_REGISTRO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_MOTIVO_ANULACION, documento_cuenta_pagar_util::$MOTIVO_ANULACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_IMPUESTO_1, documento_cuenta_pagar_util::$IMPUESTO_1,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_IMPUESTO_2, documento_cuenta_pagar_util::$IMPUESTO_2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_IMPUESTO_INCLUIDO, documento_cuenta_pagar_util::$IMPUESTO_INCLUIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_OBSERVACIONES, documento_cuenta_pagar_util::$OBSERVACIONES,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_GRUPO_PAGO, documento_cuenta_pagar_util::$GRUPO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_TERMINO_IDPV, documento_cuenta_pagar_util::$TERMINO_IDPV,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_FORMA_PAGO_PROVEEDOR, documento_cuenta_pagar_util::$ID_FORMA_PAGO_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_NRO_PAGO, documento_cuenta_pagar_util::$NRO_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_REFERENCIA_PAGO, documento_cuenta_pagar_util::$REFERENCIA_PAGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_FECHA_HORA, documento_cuenta_pagar_util::$FECHA_HORA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_BASE, documento_cuenta_pagar_util::$ID_BASE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cuenta_pagar_util::$LABEL_ID_CUENTA_CORRIENTE, documento_cuenta_pagar_util::$ID_CUENTA_CORRIENTE,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_util::$STR_CLASS_WEB_TITULO, orden_compra_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO, imagen_documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
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

		if(Funciones::existeCadenaArrayOrderBy('Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Proveedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Parcial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Parcial',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Moneda',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Vencimiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vencimiento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro De Pagos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro De Pagos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance Mon',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance Mon',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Pagado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Pagado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Pagado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Pagado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Origen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Origen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Destino',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Destino',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Destino',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Destino',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Pc',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Hora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Hora',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Mora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Mora',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Interes Mora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Interes Mora',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Dias Gracia Mora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Dias Gracia Mora',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Instrumento Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Instrumento Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Cambio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cambio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Proveedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Clase Registro',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Clase Registro',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado Registro',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado Registro',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Motivo Anulacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Motivo Anulacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto 1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto 1',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto 2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto 2',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto Incluido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto Incluido',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observaciones',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observaciones',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Grupo Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Grupo Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Termino Idpv',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Termino Idpv',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Forma Pago Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Forma Pago Proveedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Referencia Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Hora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Hora',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Base',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Base',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',documento_cuenta_pagar $documento_cuenta_pagar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnumero(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gettipo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getfecha_emision(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descripcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getdescripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmonto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Parcial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmonto_parcial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Moneda',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmoneda(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Vencimiento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getfecha_vence(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro De Pagos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnumero_de_pagos(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getbalance(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance Mon',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getbalance_mon(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Pagado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnumero_pagado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Pagado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_pagado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmodulo_origen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_origen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Destino',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmodulo_destino(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Destino',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_destino(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Pc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnombre_pc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Hora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gethora(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Monto Mora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmonto_mora(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Interes Mora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getinteres_mora(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Dias Gracia Mora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getdias_gracia_mora(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Instrumento Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getinstrumento_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tipo Cambio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gettipo_cambio(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnro_documento_proveedor(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Clase Registro',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getclase_registro(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado Registro',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getestado_registro(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Motivo Anulacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getmotivo_anulacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto 1',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getimpuesto_1(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto 2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getimpuesto_2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto Incluido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($documento_cuenta_pagar->getimpuesto_incluido()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observaciones',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getobservaciones(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Grupo Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getgrupo_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Termino Idpv',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->gettermino_idpv(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Forma Pago Proveedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_forma_pago_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getnro_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Referencia Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getreferencia_pago(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Hora',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getfecha_hora(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Base',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_base(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($documento_cuenta_pagar->getid_cuenta_corriente_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function getsucursalDescripcion(?sucursal $sucursal) : string {
		$sDescripcion='none';
		if($sucursal!==null) {
			$sDescripcion=sucursal_util::getsucursalDescripcion($sucursal);
		}
		return $sDescripcion;
	}	
	
	public static function getejercicioDescripcion(?ejercicio $ejercicio) : string {
		$sDescripcion='none';
		if($ejercicio!==null) {
			$sDescripcion=ejercicio_util::getejercicioDescripcion($ejercicio);
		}
		return $sDescripcion;
	}	
	
	public static function getperiodoDescripcion(?periodo $periodo) : string {
		$sDescripcion='none';
		if($periodo!==null) {
			$sDescripcion=periodo_util::getperiodoDescripcion($periodo);
		}
		return $sDescripcion;
	}	
	
	public static function getusuarioDescripcion(?usuario $usuario) : string {
		$sDescripcion='none';
		if($usuario!==null) {
			$sDescripcion=usuario_util::getusuarioDescripcion($usuario);
		}
		return $sDescripcion;
	}	
	
	public static function getproveedorDescripcion(?proveedor $proveedor) : string {
		$sDescripcion='none';
		if($proveedor!==null) {
			$sDescripcion=proveedor_util::getproveedorDescripcion($proveedor);
		}
		return $sDescripcion;
	}	
	
	public static function getforma_pago_proveedorDescripcion(?forma_pago_proveedor $forma_pago_proveedor) : string {
		$sDescripcion='none';
		if($forma_pago_proveedor!==null) {
			$sDescripcion=forma_pago_proveedor_util::getforma_pago_proveedorDescripcion($forma_pago_proveedor);
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
	
	interface documento_cuenta_pagar_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $documento_cuenta_pagars,int $iIdNuevodocumento_cuenta_pagar) : int;	
		public static function getIndiceActual(array $documento_cuenta_pagars,documento_cuenta_pagar $documento_cuenta_pagar,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getdocumento_cuenta_pagarDescripcion(?documento_cuenta_pagar $documento_cuenta_pagar) : string {;	
		public static function setdocumento_cuenta_pagarDescripcion(?documento_cuenta_pagar $documento_cuenta_pagar,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $documento_cuenta_pagars) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $documento_cuenta_pagars);	
		public static function refrescarFKDescripcion(documento_cuenta_pagar $documento_cuenta_pagar);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',documento_cuenta_pagar $documento_cuenta_pagar,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

