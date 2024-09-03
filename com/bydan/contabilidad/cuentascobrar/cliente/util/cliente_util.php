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

namespace com\bydan\contabilidad\cuentascobrar\cliente\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_util;
use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_util;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;
use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;
use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

//REL

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\business\entity\documento_cliente;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\business\entity\imagen_cliente;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_util;
use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\inventario\lista_cliente\business\entity\lista_cliente;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;

class cliente_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='cliente';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_cobrar.clientes';
	/*'Mantenimientocliente.jsf';*/
	public static string $STR_MODULO_OPCION='cuentascobrar';
	public static string $STR_NOMBRE_CLASE='Mantenimientocliente.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='clientePersistenceName';
	/*.cliente_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='cliente_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='cliente_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='cliente_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Clientes';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Cliente';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASCOBRAR='cuentascobrar';
	public static string $STR_PREFIJO_TABLE='cc_';
	public static string $STR_TABLE_NAME='cliente';
	public static string $CLIENTE='cc_cliente';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.cliente';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_persona,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_giro_negocio_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_completo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comentario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_provincia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contacto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_descuento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.interes_anual,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.facturar_con,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_impuesto_ventas,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_2do_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.creado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion_ultima_transaccion from '.cliente_util::$SCHEMA.'.'.cliente_util::$TABLENAME;*/
	
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
	//public $clienteConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_TIPO_PERSONA='id_tipo_persona';
    public static string $ID_CATEGORIA_CLIENTE='id_categoria_cliente';
    public static string $ID_TIPO_PRECIO='id_tipo_precio';
    public static string $ID_GIRO_NEGOCIO_CLIENTE='id_giro_negocio_cliente';
    public static string $CODIGO='codigo';
    public static string $RUC='ruc';
    public static string $PRIMER_APELLIDO='primer_apellido';
    public static string $SEGUNDO_APELLIDO='segundo_apellido';
    public static string $PRIMER_NOMBRE='primer_nombre';
    public static string $SEGUNDO_NOMBRE='segundo_nombre';
    public static string $NOMBRE_COMPLETO='nombre_completo';
    public static string $DIRECCION='direccion';
    public static string $TELEFONO='telefono';
    public static string $TELEFONO_MOVIL='telefono_movil';
    public static string $E_MAIL='e_mail';
    public static string $E_MAIL2='e_mail2';
    public static string $COMENTARIO='comentario';
    public static string $IMAGEN='imagen';
    public static string $ACTIVO='activo';
    public static string $ID_PAIS='id_pais';
    public static string $ID_PROVINCIA='id_provincia';
    public static string $ID_CIUDAD='id_ciudad';
    public static string $CODIGO_POSTAL='codigo_postal';
    public static string $FAX='fax';
    public static string $CONTACTO='contacto';
    public static string $ID_VENDEDOR='id_vendedor';
    public static string $MAXIMO_CREDITO='maximo_credito';
    public static string $MAXIMO_DESCUENTO='maximo_descuento';
    public static string $INTERES_ANUAL='interes_anual';
    public static string $BALANCE='balance';
    public static string $ID_TERMINO_PAGO_CLIENTE='id_termino_pago_cliente';
    public static string $ID_CUENTA='id_cuenta';
    public static string $FACTURAR_CON='facturar_con';
    public static string $APLICA_IMPUESTO_VENTAS='aplica_impuesto_ventas';
    public static string $ID_IMPUESTO='id_impuesto';
    public static string $APLICA_RETENCION_IMPUESTO='aplica_retencion_impuesto';
    public static string $ID_RETENCION='id_retencion';
    public static string $APLICA_RETENCION_FUENTE='aplica_retencion_fuente';
    public static string $ID_RETENCION_FUENTE='id_retencion_fuente';
    public static string $APLICA_RETENCION_ICA='aplica_retencion_ica';
    public static string $ID_RETENCION_ICA='id_retencion_ica';
    public static string $APLICA_2DO_IMPUESTO='aplica_2do_impuesto';
    public static string $ID_OTRO_IMPUESTO='id_otro_impuesto';
    public static string $CREADO='creado';
    public static string $MONTO_ULTIMA_TRANSACCION='monto_ultima_transaccion';
    public static string $FECHA_ULTIMA_TRANSACCION='fecha_ultima_transaccion';
    public static string $DESCRI_ULTIMA_TRANSACCION='descripcion_ultima_transaccion';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_TIPO_PERSONA=' Tipo Persona';
    public static string $LABEL_ID_CATEGORIA_CLIENTE='Categorias Cliente';
    public static string $LABEL_ID_TIPO_PRECIO=' Tipo Precio';
    public static string $LABEL_ID_GIRO_NEGOCIO_CLIENTE='Giro Negocio';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_RUC='Ruc';
    public static string $LABEL_PRIMER_APELLIDO='Primer Apellido';
    public static string $LABEL_SEGUNDO_APELLIDO='Segundo Apellido';
    public static string $LABEL_PRIMER_NOMBRE='Primer Nombre';
    public static string $LABEL_SEGUNDO_NOMBRE='Segundo Nombre';
    public static string $LABEL_NOMBRE_COMPLETO='Nombre Completo';
    public static string $LABEL_DIRECCION='Direccion';
    public static string $LABEL_TELEFONO='Telefono';
    public static string $LABEL_TELEFONO_MOVIL='Telefono Movil';
    public static string $LABEL_E_MAIL='E Mail';
    public static string $LABEL_E_MAIL2='E Mail2';
    public static string $LABEL_COMENTARIO='Comentario';
    public static string $LABEL_IMAGEN='Imagen';
    public static string $LABEL_ACTIVO='Activo';
    public static string $LABEL_ID_PAIS='Pais';
    public static string $LABEL_ID_PROVINCIA='Provincia';
    public static string $LABEL_ID_CIUDAD='Ciudad';
    public static string $LABEL_CODIGO_POSTAL='Codigo Postal';
    public static string $LABEL_FAX='Fax';
    public static string $LABEL_CONTACTO='Contacto';
    public static string $LABEL_ID_VENDEDOR='Vendedor';
    public static string $LABEL_MAXIMO_CREDITO='Maximo Credito';
    public static string $LABEL_MAXIMO_DESCUENTO='Maximo Descuento';
    public static string $LABEL_INTERES_ANUAL='Interes Anual';
    public static string $LABEL_BALANCE='Balance';
    public static string $LABEL_ID_TERMINO_PAGO_CLIENTE='Terminos Pago';
    public static string $LABEL_ID_CUENTA='Cuenta Contable Ventas';
    public static string $LABEL_FACTURAR_CON='Facturar Con';
    public static string $LABEL_APLICA_IMPUESTO_VENTAS='Aplica Impuesto Ventas';
    public static string $LABEL_ID_IMPUESTO='Impuesto';
    public static string $LABEL_APLICA_RETENCION_IMPUESTO='Aplica Retencion Impuesto';
    public static string $LABEL_ID_RETENCION=' Retencion';
    public static string $LABEL_APLICA_RETENCION_FUENTE='Aplica Retencion Fuente';
    public static string $LABEL_ID_RETENCION_FUENTE=' Retencion Fuente';
    public static string $LABEL_APLICA_RETENCION_ICA='Aplica Retencion Ica';
    public static string $LABEL_ID_RETENCION_ICA=' Retencion Ica';
    public static string $LABEL_APLICA_2DO_IMPUESTO='Aplica 2do Impuesto';
    public static string $LABEL_ID_OTRO_IMPUESTO=' Otro Impuesto';
    public static string $LABEL_CREADO='Creado';
    public static string $LABEL_MONTO_ULTIMA_TRANSACCION='Monto Ultima Transaccion';
    public static string $LABEL_FECHA_ULTIMA_TRANSACCION='Fecha Ultima Transaccion';
    public static string $LABEL_DESCRI_ULTIMA_TRANSACCION='Descripcion Ultima Transaccion';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->clienteConstantesFuncionesAdditional=new $clienteConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $clientes,int $iIdNuevocliente) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($clientes as $clienteAux) {
			if($clienteAux->getId()==$iIdNuevocliente) {
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
	
	public static function getIndiceActual(array $clientes,cliente $cliente,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($clientes as $clienteAux) {
			if($clienteAux->getId()==$cliente->getId()) {
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
	public static function getclienteDescripcion(?cliente $cliente) : string {//cliente NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($cliente !=null) {
			/*&& cliente->getId()!=0*/
			
			$sDescripcion=($cliente->getprimer_apellido()).'-'.($cliente->getprimer_nombre()).'-'.($cliente->getnombre_completo());
			
			/*cliente;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setclienteDescripcion(?cliente $cliente,string $sValor) {			
		if($cliente !=null) {
			$cliente->setprimer_apellido($sValor);
$cliente->setprimer_nombre($sValor);
$cliente->setnombre_completo($sValor);;
			/*cliente;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $clientes) : array {
		$clientesForeignKey=array();
		
		foreach ($clientes as $clienteLocal) {
			$clientesForeignKey[$clienteLocal->getId()]=cliente_util::getclienteDescripcion($clienteLocal);
		}
			
		return $clientesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_tipo_persona() : string  { return ' Tipo Persona'; }
    public static function getColumnLabelid_categoria_cliente() : string  { return 'Categorias Cliente'; }
    public static function getColumnLabelid_tipo_precio() : string  { return ' Tipo Precio'; }
    public static function getColumnLabelid_giro_negocio_cliente() : string  { return 'Giro Negocio'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelruc() : string  { return 'Ruc'; }
    public static function getColumnLabelprimer_apellido() : string  { return 'Primer Apellido'; }
    public static function getColumnLabelsegundo_apellido() : string  { return 'Segundo Apellido'; }
    public static function getColumnLabelprimer_nombre() : string  { return 'Primer Nombre'; }
    public static function getColumnLabelsegundo_nombre() : string  { return 'Segundo Nombre'; }
    public static function getColumnLabelnombre_completo() : string  { return 'Nombre Completo'; }
    public static function getColumnLabeldireccion() : string  { return 'Direccion'; }
    public static function getColumnLabeltelefono() : string  { return 'Telefono'; }
    public static function getColumnLabeltelefono_movil() : string  { return 'Telefono Movil'; }
    public static function getColumnLabele_mail() : string  { return 'E Mail'; }
    public static function getColumnLabele_mail2() : string  { return 'E Mail2'; }
    public static function getColumnLabelcomentario() : string  { return 'Comentario'; }
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }
    public static function getColumnLabelactivo() : string  { return 'Activo'; }
    public static function getColumnLabelid_pais() : string  { return 'Pais'; }
    public static function getColumnLabelid_provincia() : string  { return 'Provincia'; }
    public static function getColumnLabelid_ciudad() : string  { return 'Ciudad'; }
    public static function getColumnLabelcodigo_postal() : string  { return 'Codigo Postal'; }
    public static function getColumnLabelfax() : string  { return 'Fax'; }
    public static function getColumnLabelcontacto() : string  { return 'Contacto'; }
    public static function getColumnLabelid_vendedor() : string  { return 'Vendedor'; }
    public static function getColumnLabelmaximo_credito() : string  { return 'Maximo Credito'; }
    public static function getColumnLabelmaximo_descuento() : string  { return 'Maximo Descuento'; }
    public static function getColumnLabelinteres_anual() : string  { return 'Interes Anual'; }
    public static function getColumnLabelbalance() : string  { return 'Balance'; }
    public static function getColumnLabelid_termino_pago_cliente() : string  { return 'Terminos Pago'; }
    public static function getColumnLabelid_cuenta() : string  { return 'Cuenta Contable Ventas'; }
    public static function getColumnLabelfacturar_con() : string  { return 'Facturar Con'; }
    public static function getColumnLabelaplica_impuesto_ventas() : string  { return 'Aplica Impuesto Ventas'; }
    public static function getColumnLabelid_impuesto() : string  { return 'Impuesto'; }
    public static function getColumnLabelaplica_retencion_impuesto() : string  { return 'Aplica Retencion Impuesto'; }
    public static function getColumnLabelid_retencion() : string  { return ' Retencion'; }
    public static function getColumnLabelaplica_retencion_fuente() : string  { return 'Aplica Retencion Fuente'; }
    public static function getColumnLabelid_retencion_fuente() : string  { return ' Retencion Fuente'; }
    public static function getColumnLabelaplica_retencion_ica() : string  { return 'Aplica Retencion Ica'; }
    public static function getColumnLabelid_retencion_ica() : string  { return ' Retencion Ica'; }
    public static function getColumnLabelaplica_2do_impuesto() : string  { return 'Aplica 2do Impuesto'; }
    public static function getColumnLabelid_otro_impuesto() : string  { return ' Otro Impuesto'; }
    public static function getColumnLabelcreado() : string  { return 'Creado'; }
    public static function getColumnLabelmonto_ultima_transaccion() : string  { return 'Monto Ultima Transaccion'; }
    public static function getColumnLabelfecha_ultima_transaccion() : string  { return 'Fecha Ultima Transaccion'; }
    public static function getColumnLabeldescri_ultima_transaccion() : string  { return 'Descripcion Ultima Transaccion'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getactivoDescripcion($cliente) {
		$sDescripcion='Verdadero';
		if(!$cliente->getactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_impuesto_ventasDescripcion($cliente) {
		$sDescripcion='Verdadero';
		if(!$cliente->getaplica_impuesto_ventas()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_retencion_impuestoDescripcion($cliente) {
		$sDescripcion='Verdadero';
		if(!$cliente->getaplica_retencion_impuesto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_retencion_fuenteDescripcion($cliente) {
		$sDescripcion='Verdadero';
		if(!$cliente->getaplica_retencion_fuente()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_retencion_icaDescripcion($cliente) {
		$sDescripcion='Verdadero';
		if(!$cliente->getaplica_retencion_ica()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_2do_impuestoDescripcion($cliente) {
		$sDescripcion='Verdadero';
		if(!$cliente->getaplica_2do_impuesto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $clientes) {		
		try {
			
			$cliente = new cliente();
			
			foreach($clientes as $cliente) {
				
				$cliente->setid_empresa_Descripcion(cliente_util::getempresaDescripcion($cliente->getempresa()));
				$cliente->setid_tipo_persona_Descripcion(cliente_util::gettipo_personaDescripcion($cliente->gettipo_persona()));
				$cliente->setid_categoria_cliente_Descripcion(cliente_util::getcategoria_clienteDescripcion($cliente->getcategoria_cliente()));
				$cliente->setid_tipo_precio_Descripcion(cliente_util::gettipo_precioDescripcion($cliente->gettipo_precio()));
				$cliente->setid_giro_negocio_cliente_Descripcion(cliente_util::getgiro_negocio_clienteDescripcion($cliente->getgiro_negocio_cliente()));
				$cliente->setid_pais_Descripcion(cliente_util::getpaisDescripcion($cliente->getpais()));
				$cliente->setid_provincia_Descripcion(cliente_util::getprovinciaDescripcion($cliente->getprovincia()));
				$cliente->setid_ciudad_Descripcion(cliente_util::getciudadDescripcion($cliente->getciudad()));
				$cliente->setid_vendedor_Descripcion(cliente_util::getvendedorDescripcion($cliente->getvendedor()));
				$cliente->setid_termino_pago_cliente_Descripcion(cliente_util::gettermino_pago_clienteDescripcion($cliente->gettermino_pago_cliente()));
				$cliente->setid_cuenta_Descripcion(cliente_util::getcuentaDescripcion($cliente->getcuenta()));
				$cliente->setid_impuesto_Descripcion(cliente_util::getimpuestoDescripcion($cliente->getimpuesto()));
				$cliente->setid_retencion_Descripcion(cliente_util::getretencionDescripcion($cliente->getretencion()));
				$cliente->setid_retencion_fuente_Descripcion(cliente_util::getretencion_fuenteDescripcion($cliente->getretencion_fuente()));
				$cliente->setid_retencion_ica_Descripcion(cliente_util::getretencion_icaDescripcion($cliente->getretencion_ica()));
				$cliente->setid_otro_impuesto_Descripcion(cliente_util::getotro_impuestoDescripcion($cliente->getotro_impuesto()));
			}
			
			if($cliente!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(cliente $cliente) {		
		try {
			
			
				$cliente->setid_empresa_Descripcion(cliente_util::getempresaDescripcion($cliente->getempresa()));
				$cliente->setid_tipo_persona_Descripcion(cliente_util::gettipo_personaDescripcion($cliente->gettipo_persona()));
				$cliente->setid_categoria_cliente_Descripcion(cliente_util::getcategoria_clienteDescripcion($cliente->getcategoria_cliente()));
				$cliente->setid_tipo_precio_Descripcion(cliente_util::gettipo_precioDescripcion($cliente->gettipo_precio()));
				$cliente->setid_giro_negocio_cliente_Descripcion(cliente_util::getgiro_negocio_clienteDescripcion($cliente->getgiro_negocio_cliente()));
				$cliente->setid_pais_Descripcion(cliente_util::getpaisDescripcion($cliente->getpais()));
				$cliente->setid_provincia_Descripcion(cliente_util::getprovinciaDescripcion($cliente->getprovincia()));
				$cliente->setid_ciudad_Descripcion(cliente_util::getciudadDescripcion($cliente->getciudad()));
				$cliente->setid_vendedor_Descripcion(cliente_util::getvendedorDescripcion($cliente->getvendedor()));
				$cliente->setid_termino_pago_cliente_Descripcion(cliente_util::gettermino_pago_clienteDescripcion($cliente->gettermino_pago_cliente()));
				$cliente->setid_cuenta_Descripcion(cliente_util::getcuentaDescripcion($cliente->getcuenta()));
				$cliente->setid_impuesto_Descripcion(cliente_util::getimpuestoDescripcion($cliente->getimpuesto()));
				$cliente->setid_retencion_Descripcion(cliente_util::getretencionDescripcion($cliente->getretencion()));
				$cliente->setid_retencion_fuente_Descripcion(cliente_util::getretencion_fuenteDescripcion($cliente->getretencion_fuente()));
				$cliente->setid_retencion_ica_Descripcion(cliente_util::getretencion_icaDescripcion($cliente->getretencion_ica()));
				$cliente->setid_otro_impuesto_Descripcion(cliente_util::getotro_impuestoDescripcion($cliente->getotro_impuesto()));
							
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
		} else if($sNombreIndice=='FK_Idcategoria_cliente') {
			$sNombreIndice='Tipo=  Por Categorias Cliente';
		} else if($sNombreIndice=='FK_Idciudad') {
			$sNombreIndice='Tipo=  Por Ciudad';
		} else if($sNombreIndice=='FK_Idcuenta') {
			$sNombreIndice='Tipo=  Por Cuenta Contable Ventas';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idgiro_negocio') {
			$sNombreIndice='Tipo=  Por Giro Negocio';
		} else if($sNombreIndice=='FK_Idimpuesto') {
			$sNombreIndice='Tipo=  Por Impuesto';
		} else if($sNombreIndice=='FK_Idotro_impuesto') {
			$sNombreIndice='Tipo=  Por  Otro Impuesto';
		} else if($sNombreIndice=='FK_Idpais') {
			$sNombreIndice='Tipo=  Por Pais';
		} else if($sNombreIndice=='FK_Idprovincia') {
			$sNombreIndice='Tipo=  Por Provincia';
		} else if($sNombreIndice=='FK_Idretencion') {
			$sNombreIndice='Tipo=  Por  Retencion';
		} else if($sNombreIndice=='FK_Idretencion_fuente') {
			$sNombreIndice='Tipo=  Por  Retencion Fuente';
		} else if($sNombreIndice=='FK_Idretencion_ica') {
			$sNombreIndice='Tipo=  Por  Retencion Ica';
		} else if($sNombreIndice=='FK_Idtermino_pago') {
			$sNombreIndice='Tipo=  Por Terminos Pago';
		} else if($sNombreIndice=='FK_Idtipo_persona') {
			$sNombreIndice='Tipo=  Por  Tipo Persona';
		} else if($sNombreIndice=='FK_Idtipo_precio') {
			$sNombreIndice='Tipo=  Por  Tipo Precio';
		} else if($sNombreIndice=='FK_Idvendedor') {
			$sNombreIndice='Tipo=  Por Vendedor';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idcategoria_cliente(int $id_categoria_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Categorias Cliente='+$id_categoria_cliente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idciudad(int $id_ciudad) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Ciudad='+$id_ciudad; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta(?int $id_cuenta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta Contable Ventas='+$id_cuenta; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idgiro_negocio(int $id_giro_negocio_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Giro Negocio='+$id_giro_negocio_cliente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idimpuesto(int $id_impuesto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Impuesto='+$id_impuesto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idotro_impuesto(?int $id_otro_impuesto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Otro Impuesto='+$id_otro_impuesto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idpais(int $id_pais) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Pais='+$id_pais; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idprovincia(int $id_provincia) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Provincia='+$id_provincia; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idretencion(?int $id_retencion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Retencion='+$id_retencion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idretencion_fuente(?int $id_retencion_fuente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Retencion Fuente='+$id_retencion_fuente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idretencion_ica(?int $id_retencion_ica) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Retencion Ica='+$id_retencion_ica; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtermino_pago(int $id_termino_pago_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Terminos Pago='+$id_termino_pago_cliente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_persona(int $id_tipo_persona) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Persona='+$id_tipo_persona; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_precio(int $id_tipo_precio) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Precio='+$id_tipo_precio; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idvendedor(int $id_vendedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Vendedor='+$id_vendedor; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return cliente_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return cliente_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_TIPO_PERSONA);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_TIPO_PERSONA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_CATEGORIA_CLIENTE);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_CATEGORIA_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_TIPO_PRECIO);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_TIPO_PRECIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_GIRO_NEGOCIO_CLIENTE);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_GIRO_NEGOCIO_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(cliente_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_RUC);
			$reporte->setsDescripcion(cliente_util::$LABEL_RUC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_PRIMER_APELLIDO);
			$reporte->setsDescripcion(cliente_util::$LABEL_PRIMER_APELLIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_SEGUNDO_APELLIDO);
			$reporte->setsDescripcion(cliente_util::$LABEL_SEGUNDO_APELLIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_PRIMER_NOMBRE);
			$reporte->setsDescripcion(cliente_util::$LABEL_PRIMER_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_SEGUNDO_NOMBRE);
			$reporte->setsDescripcion(cliente_util::$LABEL_SEGUNDO_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_NOMBRE_COMPLETO);
			$reporte->setsDescripcion(cliente_util::$LABEL_NOMBRE_COMPLETO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_DIRECCION);
			$reporte->setsDescripcion(cliente_util::$LABEL_DIRECCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_TELEFONO);
			$reporte->setsDescripcion(cliente_util::$LABEL_TELEFONO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_TELEFONO_MOVIL);
			$reporte->setsDescripcion(cliente_util::$LABEL_TELEFONO_MOVIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_E_MAIL);
			$reporte->setsDescripcion(cliente_util::$LABEL_E_MAIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_E_MAIL2);
			$reporte->setsDescripcion(cliente_util::$LABEL_E_MAIL2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_COMENTARIO);
			$reporte->setsDescripcion(cliente_util::$LABEL_COMENTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(cliente_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ACTIVO);
			$reporte->setsDescripcion(cliente_util::$LABEL_ACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_PAIS);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_PAIS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_PROVINCIA);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_PROVINCIA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_CIUDAD);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_CIUDAD.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_CODIGO_POSTAL);
			$reporte->setsDescripcion(cliente_util::$LABEL_CODIGO_POSTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_FAX);
			$reporte->setsDescripcion(cliente_util::$LABEL_FAX);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_CONTACTO);
			$reporte->setsDescripcion(cliente_util::$LABEL_CONTACTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_VENDEDOR);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_VENDEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_MAXIMO_CREDITO);
			$reporte->setsDescripcion(cliente_util::$LABEL_MAXIMO_CREDITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_MAXIMO_DESCUENTO);
			$reporte->setsDescripcion(cliente_util::$LABEL_MAXIMO_DESCUENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_INTERES_ANUAL);
			$reporte->setsDescripcion(cliente_util::$LABEL_INTERES_ANUAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_BALANCE);
			$reporte->setsDescripcion(cliente_util::$LABEL_BALANCE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_TERMINO_PAGO_CLIENTE);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_TERMINO_PAGO_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_CUENTA);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_FACTURAR_CON);
			$reporte->setsDescripcion(cliente_util::$LABEL_FACTURAR_CON);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_APLICA_IMPUESTO_VENTAS);
			$reporte->setsDescripcion(cliente_util::$LABEL_APLICA_IMPUESTO_VENTAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_IMPUESTO);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_APLICA_RETENCION_IMPUESTO);
			$reporte->setsDescripcion(cliente_util::$LABEL_APLICA_RETENCION_IMPUESTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_RETENCION);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_RETENCION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_APLICA_RETENCION_FUENTE);
			$reporte->setsDescripcion(cliente_util::$LABEL_APLICA_RETENCION_FUENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_RETENCION_FUENTE);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_RETENCION_FUENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_APLICA_RETENCION_ICA);
			$reporte->setsDescripcion(cliente_util::$LABEL_APLICA_RETENCION_ICA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_RETENCION_ICA);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_RETENCION_ICA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_APLICA_2DO_IMPUESTO);
			$reporte->setsDescripcion(cliente_util::$LABEL_APLICA_2DO_IMPUESTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_ID_OTRO_IMPUESTO);
			$reporte->setsDescripcion(cliente_util::$LABEL_ID_OTRO_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_CREADO);
			$reporte->setsDescripcion(cliente_util::$LABEL_CREADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_MONTO_ULTIMA_TRANSACCION);
			$reporte->setsDescripcion(cliente_util::$LABEL_MONTO_ULTIMA_TRANSACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_FECHA_ULTIMA_TRANSACCION);
			$reporte->setsDescripcion(cliente_util::$LABEL_FECHA_ULTIMA_TRANSACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(cliente_util::$LABEL_DESCRI_ULTIMA_TRANSACCION);
			$reporte->setsDescripcion(cliente_util::$LABEL_DESCRI_ULTIMA_TRANSACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=cliente_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==cliente_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=cliente_util::$ID_EMPRESA;
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
				$classes[]=new Classe(tipo_persona::$class);
				$classes[]=new Classe(categoria_cliente::$class);
				$classes[]=new Classe(tipo_precio::$class);
				$classes[]=new Classe(giro_negocio_cliente::$class);
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(provincia::$class);
				$classes[]=new Classe(ciudad::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(cuenta::$class);
				$classes[]=new Classe(impuesto::$class);
				$classes[]=new Classe(retencion::$class);
				$classes[]=new Classe(retencion_fuente::$class);
				$classes[]=new Classe(retencion_ica::$class);
				$classes[]=new Classe(otro_impuesto::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_persona::$class) {
						$classes[]=new Classe(tipo_persona::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==categoria_cliente::$class) {
						$classes[]=new Classe(categoria_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_precio::$class) {
						$classes[]=new Classe(tipo_precio::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==giro_negocio_cliente::$class) {
						$classes[]=new Classe(giro_negocio_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==pais::$class) {
						$classes[]=new Classe(pais::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==provincia::$class) {
						$classes[]=new Classe(provincia::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==ciudad::$class) {
						$classes[]=new Classe(ciudad::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==vendedor::$class) {
						$classes[]=new Classe(vendedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta::$class) {
						$classes[]=new Classe(cuenta::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==impuesto::$class) {
						$classes[]=new Classe(impuesto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==retencion::$class) {
						$classes[]=new Classe(retencion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==retencion_fuente::$class) {
						$classes[]=new Classe(retencion_fuente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==retencion_ica::$class) {
						$classes[]=new Classe(retencion_ica::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==otro_impuesto::$class) {
						$classes[]=new Classe(otro_impuesto::$class);
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
					if($clas==tipo_persona::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_persona::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==categoria_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==tipo_precio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_precio::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==giro_negocio_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(giro_negocio_cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==pais::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(pais::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==provincia::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(provincia::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==ciudad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ciudad::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==vendedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(vendedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==termino_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_cliente::$class);
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
					if($clas==impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(impuesto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==retencion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==retencion_fuente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion_fuente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==retencion_ica::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(retencion_ica::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==otro_impuesto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_impuesto::$class);
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
				
				$classes[]=new Classe(devolucion_factura::$class);
				$classes[]=new Classe(cuenta_cobrar::$class);
				$classes[]=new Classe(documento_cliente::$class);
				$classes[]=new Classe(estimado::$class);
				$classes[]=new Classe(imagen_cliente::$class);
				$classes[]=new Classe(factura::$class);
				$classes[]=new Classe(consignacion::$class);
				$classes[]=new Classe(lista_cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==devolucion_factura::$class) {
						$classes[]=new Classe(devolucion_factura::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta_cobrar::$class) {
						$classes[]=new Classe(cuenta_cobrar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==documento_cliente::$class) {
						$classes[]=new Classe(documento_cliente::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==estimado::$class) {
						$classes[]=new Classe(estimado::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==imagen_cliente::$class) {
						$classes[]=new Classe(imagen_cliente::$class); break;
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

				foreach($classesP as $clas) {
					if($clas==lista_cliente::$class) {
						$classes[]=new Classe(lista_cliente::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

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
					if($clas==documento_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cliente::$class);
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
					if($clas==imagen_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_cliente::$class);
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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==lista_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_cliente::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID, cliente_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_EMPRESA, cliente_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_TIPO_PERSONA, cliente_util::$ID_TIPO_PERSONA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_CATEGORIA_CLIENTE, cliente_util::$ID_CATEGORIA_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_TIPO_PRECIO, cliente_util::$ID_TIPO_PRECIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_GIRO_NEGOCIO_CLIENTE, cliente_util::$ID_GIRO_NEGOCIO_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_CODIGO, cliente_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_RUC, cliente_util::$RUC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_PRIMER_APELLIDO, cliente_util::$PRIMER_APELLIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_SEGUNDO_APELLIDO, cliente_util::$SEGUNDO_APELLIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_PRIMER_NOMBRE, cliente_util::$PRIMER_NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_SEGUNDO_NOMBRE, cliente_util::$SEGUNDO_NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_NOMBRE_COMPLETO, cliente_util::$NOMBRE_COMPLETO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_DIRECCION, cliente_util::$DIRECCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_TELEFONO, cliente_util::$TELEFONO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_TELEFONO_MOVIL, cliente_util::$TELEFONO_MOVIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_E_MAIL, cliente_util::$E_MAIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_E_MAIL2, cliente_util::$E_MAIL2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_COMENTARIO, cliente_util::$COMENTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_IMAGEN, cliente_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ACTIVO, cliente_util::$ACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_PAIS, cliente_util::$ID_PAIS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_PROVINCIA, cliente_util::$ID_PROVINCIA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_CIUDAD, cliente_util::$ID_CIUDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_CODIGO_POSTAL, cliente_util::$CODIGO_POSTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_FAX, cliente_util::$FAX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_CONTACTO, cliente_util::$CONTACTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_VENDEDOR, cliente_util::$ID_VENDEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_MAXIMO_CREDITO, cliente_util::$MAXIMO_CREDITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_MAXIMO_DESCUENTO, cliente_util::$MAXIMO_DESCUENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_INTERES_ANUAL, cliente_util::$INTERES_ANUAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_BALANCE, cliente_util::$BALANCE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_TERMINO_PAGO_CLIENTE, cliente_util::$ID_TERMINO_PAGO_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_CUENTA, cliente_util::$ID_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_FACTURAR_CON, cliente_util::$FACTURAR_CON,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_APLICA_IMPUESTO_VENTAS, cliente_util::$APLICA_IMPUESTO_VENTAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_IMPUESTO, cliente_util::$ID_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_APLICA_RETENCION_IMPUESTO, cliente_util::$APLICA_RETENCION_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_RETENCION, cliente_util::$ID_RETENCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_APLICA_RETENCION_FUENTE, cliente_util::$APLICA_RETENCION_FUENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_RETENCION_FUENTE, cliente_util::$ID_RETENCION_FUENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_APLICA_RETENCION_ICA, cliente_util::$APLICA_RETENCION_ICA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_RETENCION_ICA, cliente_util::$ID_RETENCION_ICA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_APLICA_2DO_IMPUESTO, cliente_util::$APLICA_2DO_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_ID_OTRO_IMPUESTO, cliente_util::$ID_OTRO_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_CREADO, cliente_util::$CREADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_MONTO_ULTIMA_TRANSACCION, cliente_util::$MONTO_ULTIMA_TRANSACCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_FECHA_ULTIMA_TRANSACCION, cliente_util::$FECHA_ULTIMA_TRANSACCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cliente_util::$LABEL_DESCRI_ULTIMA_TRANSACCION, cliente_util::$DESCRI_ULTIMA_TRANSACCION,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$STR_CLASS_WEB_TITULO, devolucion_factura_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_cobrar_util::$STR_CLASS_WEB_TITULO, cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_cliente_util::$STR_CLASS_WEB_TITULO, documento_cliente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,estimado_util::$STR_CLASS_WEB_TITULO, estimado_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_cliente_util::$STR_CLASS_WEB_TITULO, imagen_cliente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_util::$STR_CLASS_WEB_TITULO, factura_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_util::$STR_CLASS_WEB_TITULO, consignacion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,lista_cliente_util::$STR_CLASS_WEB_TITULO, lista_cliente_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Persona',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Persona',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categorias Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categorias Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Precio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Giro Negocio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Giro Negocio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ruc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Primer Apellido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Primer Apellido',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Segundo Apellido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Segundo Apellido',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Primer Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Primer Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Segundo Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Segundo Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Completo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Movil',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('E Mail',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('E Mail',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('E Mail2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('E Mail2',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comentario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comentario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Activo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Pais',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pais',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Provincia',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Provincia',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ciudad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ciudad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Postal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fax',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contacto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contacto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Vendedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Vendedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Maximo Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Maximo Credito',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Maximo Descuento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Maximo Descuento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Interes Anual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Interes Anual',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Terminos Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Facturar Con',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Facturar Con',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Impuesto Ventas',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Fuente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Fuente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Ica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Ica',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Ica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Ica',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica 2do Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica 2do Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Otro Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',cliente $cliente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Persona',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_tipo_persona_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categorias Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_categoria_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_tipo_precio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Giro Negocio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_giro_negocio_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ruc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getruc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Primer Apellido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getprimer_apellido(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Segundo Apellido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getsegundo_apellido(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Primer Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getprimer_nombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Segundo Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getsegundo_nombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getnombre_completo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getdireccion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gettelefono(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gettelefono_movil(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('E Mail',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gete_mail(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('E Mail2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gete_mail2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comentario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcomentario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cliente->getactivo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Pais',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_pais_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Provincia',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_provincia_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ciudad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_ciudad_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcodigo_postal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getfax(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contacto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcontacto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Vendedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_vendedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Maximo Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getmaximo_credito(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Maximo Descuento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getmaximo_descuento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Interes Anual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getinteres_anual(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getbalance(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_termino_pago_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Facturar Con',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getfacturar_con(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Impuesto Ventas',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cliente->getaplica_impuesto_ventas()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cliente->getaplica_retencion_impuesto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_retencion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cliente->getaplica_retencion_fuente()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_retencion_fuente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Ica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cliente->getaplica_retencion_ica()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Ica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_retencion_ica_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica 2do Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($cliente->getaplica_2do_impuesto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_otro_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function gettipo_personaDescripcion(?tipo_persona $tipo_persona) : string {
		$sDescripcion='none';
		if($tipo_persona!==null) {
			$sDescripcion=tipo_persona_util::gettipo_personaDescripcion($tipo_persona);
		}
		return $sDescripcion;
	}	
	
	public static function getcategoria_clienteDescripcion(?categoria_cliente $categoria_cliente) : string {
		$sDescripcion='none';
		if($categoria_cliente!==null) {
			$sDescripcion=categoria_cliente_util::getcategoria_clienteDescripcion($categoria_cliente);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_precioDescripcion(?tipo_precio $tipo_precio) : string {
		$sDescripcion='none';
		if($tipo_precio!==null) {
			$sDescripcion=tipo_precio_util::gettipo_precioDescripcion($tipo_precio);
		}
		return $sDescripcion;
	}	
	
	public static function getgiro_negocio_clienteDescripcion(?giro_negocio_cliente $giro_negocio_cliente) : string {
		$sDescripcion='none';
		if($giro_negocio_cliente!==null) {
			$sDescripcion=giro_negocio_cliente_util::getgiro_negocio_clienteDescripcion($giro_negocio_cliente);
		}
		return $sDescripcion;
	}	
	
	public static function getpaisDescripcion(?pais $pais) : string {
		$sDescripcion='none';
		if($pais!==null) {
			$sDescripcion=pais_util::getpaisDescripcion($pais);
		}
		return $sDescripcion;
	}	
	
	public static function getprovinciaDescripcion(?provincia $provincia) : string {
		$sDescripcion='none';
		if($provincia!==null) {
			$sDescripcion=provincia_util::getprovinciaDescripcion($provincia);
		}
		return $sDescripcion;
	}	
	
	public static function getciudadDescripcion(?ciudad $ciudad) : string {
		$sDescripcion='none';
		if($ciudad!==null) {
			$sDescripcion=ciudad_util::getciudadDescripcion($ciudad);
		}
		return $sDescripcion;
	}	
	
	public static function getvendedorDescripcion(?vendedor $vendedor) : string {
		$sDescripcion='none';
		if($vendedor!==null) {
			$sDescripcion=vendedor_util::getvendedorDescripcion($vendedor);
		}
		return $sDescripcion;
	}	
	
	public static function gettermino_pago_clienteDescripcion(?termino_pago_cliente $termino_pago_cliente) : string {
		$sDescripcion='none';
		if($termino_pago_cliente!==null) {
			$sDescripcion=termino_pago_cliente_util::gettermino_pago_clienteDescripcion($termino_pago_cliente);
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
	
	public static function getimpuestoDescripcion(?impuesto $impuesto) : string {
		$sDescripcion='none';
		if($impuesto!==null) {
			$sDescripcion=impuesto_util::getimpuestoDescripcion($impuesto);
		}
		return $sDescripcion;
	}	
	
	public static function getretencionDescripcion(?retencion $retencion) : string {
		$sDescripcion='none';
		if($retencion!==null) {
			$sDescripcion=retencion_util::getretencionDescripcion($retencion);
		}
		return $sDescripcion;
	}	
	
	public static function getretencion_fuenteDescripcion(?retencion_fuente $retencion_fuente) : string {
		$sDescripcion='none';
		if($retencion_fuente!==null) {
			$sDescripcion=retencion_fuente_util::getretencion_fuenteDescripcion($retencion_fuente);
		}
		return $sDescripcion;
	}	
	
	public static function getretencion_icaDescripcion(?retencion_ica $retencion_ica) : string {
		$sDescripcion='none';
		if($retencion_ica!==null) {
			$sDescripcion=retencion_ica_util::getretencion_icaDescripcion($retencion_ica);
		}
		return $sDescripcion;
	}	
	
	public static function getotro_impuestoDescripcion(?otro_impuesto $otro_impuesto) : string {
		$sDescripcion='none';
		if($otro_impuesto!==null) {
			$sDescripcion=otro_impuesto_util::getotro_impuestoDescripcion($otro_impuesto);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface cliente_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $clientes,int $iIdNuevocliente) : int;	
		public static function getIndiceActual(array $clientes,cliente $cliente,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getclienteDescripcion(?cliente $cliente) : string {;	
		public static function setclienteDescripcion(?cliente $cliente,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $clientes) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $clientes);	
		public static function refrescarFKDescripcion(cliente $cliente);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',cliente $cliente,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

