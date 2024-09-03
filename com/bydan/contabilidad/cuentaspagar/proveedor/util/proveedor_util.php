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

namespace com\bydan\contabilidad\cuentaspagar\proveedor\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_util;
use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;
use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;
use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
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

use com\bydan\contabilidad\inventario\lista_precio\business\entity\lista_precio;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\entity\imagen_proveedor;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

class proveedor_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='proveedor';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='cuentas_pagar.proveedors';
	/*'Mantenimientoproveedor.jsf';*/
	public static string $STR_MODULO_OPCION='cuentaspagar';
	public static string $STR_NOMBRE_CLASE='Mantenimientoproveedor.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='proveedorPersistenceName';
	/*.proveedor_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='proveedor_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='proveedor_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='proveedor_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Proveedores';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Proveedor';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $CUENTASPAGAR='cuentaspagar';
	public static string $STR_PREFIJO_TABLE='cp_';
	public static string $STR_TABLE_NAME='proveedor';
	public static string $PROVEEDOR='cp_proveedor';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.proveedor';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_persona,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_categoria_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_giro_negocio_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_apellido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.primer_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.segundo_nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_completo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.telefono_movil,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.e_mail2,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.comentario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.activo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_pais,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_provincia,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ciudad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo_postal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fax,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.contacto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_credito,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.maximo_descuento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.interes_anual,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.balance,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_proveedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cuenta,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_impuesto_compras,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_fuente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_retencion_ica,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.aplica_2do_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_otro_impuesto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.creado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.monto_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_ultima_transaccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descripcion_ultima_transaccion from '.proveedor_util::$SCHEMA.'.'.proveedor_util::$TABLENAME;*/
	
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
	//public $proveedorConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_TIPO_PERSONA='id_tipo_persona';
    public static string $ID_CATEGORIA_PROVEEDOR='id_categoria_proveedor';
    public static string $ID_GIRO_NEGOCIO_PROVEEDOR='id_giro_negocio_proveedor';
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
    public static string $ID_TERMINO_PAGO_PROVEEDOR='id_termino_pago_proveedor';
    public static string $ID_CUENTA='id_cuenta';
    public static string $APLICA_IMPUESTO_COMPRAS='aplica_impuesto_compras';
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
    public static string $DESCRIPCION_ULTIMA_TRANSACCION='descripcion_ultima_transaccion';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_TIPO_PERSONA=' Tipo Persona';
    public static string $LABEL_ID_CATEGORIA_PROVEEDOR='Categoria';
    public static string $LABEL_ID_GIRO_NEGOCIO_PROVEEDOR='Giro Negocio';
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
    public static string $LABEL_ID_TERMINO_PAGO_PROVEEDOR='Termino Pago';
    public static string $LABEL_ID_CUENTA='Cuenta';
    public static string $LABEL_APLICA_IMPUESTO_COMPRAS='Aplica Impuesto Compras';
    public static string $LABEL_ID_IMPUESTO='Impuesto';
    public static string $LABEL_APLICA_RETENCION_IMPUESTO='Aplica Retencion Impuesto';
    public static string $LABEL_ID_RETENCION='Retencion';
    public static string $LABEL_APLICA_RETENCION_FUENTE='Aplica Retencion Fuente';
    public static string $LABEL_ID_RETENCION_FUENTE=' Retencion Fuente';
    public static string $LABEL_APLICA_RETENCION_ICA='Aplica Retencion Ica';
    public static string $LABEL_ID_RETENCION_ICA=' Retencion Ica';
    public static string $LABEL_APLICA_2DO_IMPUESTO='Aplica 2do Impuesto';
    public static string $LABEL_ID_OTRO_IMPUESTO=' Otro Impuesto';
    public static string $LABEL_CREADO='Creado';
    public static string $LABEL_MONTO_ULTIMA_TRANSACCION='Monto Ultima Transaccion';
    public static string $LABEL_FECHA_ULTIMA_TRANSACCION='Fecha Ultima Transaccion';
    public static string $LABEL_DESCRIPCION_ULTIMA_TRANSACCION='Descripcion Ultima Transaccion';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->proveedorConstantesFuncionesAdditional=new $proveedorConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $proveedors,int $iIdNuevoproveedor) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($proveedors as $proveedorAux) {
			if($proveedorAux->getId()==$iIdNuevoproveedor) {
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
	
	public static function getIndiceActual(array $proveedors,proveedor $proveedor,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($proveedors as $proveedorAux) {
			if($proveedorAux->getId()==$proveedor->getId()) {
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
	public static function getproveedorDescripcion(?proveedor $proveedor) : string {//proveedor NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($proveedor !=null) {
			/*&& proveedor->getId()!=0*/
			
			$sDescripcion=($proveedor->getnombre_completo());
			
			/*proveedor;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setproveedorDescripcion(?proveedor $proveedor,string $sValor) {			
		if($proveedor !=null) {
			$proveedor->setnombre_completo($sValor);;
			/*proveedor;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $proveedors) : array {
		$proveedorsForeignKey=array();
		
		foreach ($proveedors as $proveedorLocal) {
			$proveedorsForeignKey[$proveedorLocal->getId()]=proveedor_util::getproveedorDescripcion($proveedorLocal);
		}
			
		return $proveedorsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_tipo_persona() : string  { return ' Tipo Persona'; }
    public static function getColumnLabelid_categoria_proveedor() : string  { return 'Categoria'; }
    public static function getColumnLabelid_giro_negocio_proveedor() : string  { return 'Giro Negocio'; }
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
    public static function getColumnLabelid_termino_pago_proveedor() : string  { return 'Termino Pago'; }
    public static function getColumnLabelid_cuenta() : string  { return 'Cuenta'; }
    public static function getColumnLabelaplica_impuesto_compras() : string  { return 'Aplica Impuesto Compras'; }
    public static function getColumnLabelid_impuesto() : string  { return 'Impuesto'; }
    public static function getColumnLabelaplica_retencion_impuesto() : string  { return 'Aplica Retencion Impuesto'; }
    public static function getColumnLabelid_retencion() : string  { return 'Retencion'; }
    public static function getColumnLabelaplica_retencion_fuente() : string  { return 'Aplica Retencion Fuente'; }
    public static function getColumnLabelid_retencion_fuente() : string  { return ' Retencion Fuente'; }
    public static function getColumnLabelaplica_retencion_ica() : string  { return 'Aplica Retencion Ica'; }
    public static function getColumnLabelid_retencion_ica() : string  { return ' Retencion Ica'; }
    public static function getColumnLabelaplica_2do_impuesto() : string  { return 'Aplica 2do Impuesto'; }
    public static function getColumnLabelid_otro_impuesto() : string  { return ' Otro Impuesto'; }
    public static function getColumnLabelcreado() : string  { return 'Creado'; }
    public static function getColumnLabelmonto_ultima_transaccion() : string  { return 'Monto Ultima Transaccion'; }
    public static function getColumnLabelfecha_ultima_transaccion() : string  { return 'Fecha Ultima Transaccion'; }
    public static function getColumnLabeldescripcion_ultima_transaccion() : string  { return 'Descripcion Ultima Transaccion'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getactivoDescripcion($proveedor) {
		$sDescripcion='Verdadero';
		if(!$proveedor->getactivo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_impuesto_comprasDescripcion($proveedor) {
		$sDescripcion='Verdadero';
		if(!$proveedor->getaplica_impuesto_compras()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_retencion_impuestoDescripcion($proveedor) {
		$sDescripcion='Verdadero';
		if(!$proveedor->getaplica_retencion_impuesto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_retencion_fuenteDescripcion($proveedor) {
		$sDescripcion='Verdadero';
		if(!$proveedor->getaplica_retencion_fuente()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_retencion_icaDescripcion($proveedor) {
		$sDescripcion='Verdadero';
		if(!$proveedor->getaplica_retencion_ica()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getaplica_2do_impuestoDescripcion($proveedor) {
		$sDescripcion='Verdadero';
		if(!$proveedor->getaplica_2do_impuesto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $proveedors) {		
		try {
			
			$proveedor = new proveedor();
			
			foreach($proveedors as $proveedor) {
				
				$proveedor->setid_empresa_Descripcion(proveedor_util::getempresaDescripcion($proveedor->getempresa()));
				$proveedor->setid_tipo_persona_Descripcion(proveedor_util::gettipo_personaDescripcion($proveedor->gettipo_persona()));
				$proveedor->setid_categoria_proveedor_Descripcion(proveedor_util::getcategoria_proveedorDescripcion($proveedor->getcategoria_proveedor()));
				$proveedor->setid_giro_negocio_proveedor_Descripcion(proveedor_util::getgiro_negocio_proveedorDescripcion($proveedor->getgiro_negocio_proveedor()));
				$proveedor->setid_pais_Descripcion(proveedor_util::getpaisDescripcion($proveedor->getpais()));
				$proveedor->setid_provincia_Descripcion(proveedor_util::getprovinciaDescripcion($proveedor->getprovincia()));
				$proveedor->setid_ciudad_Descripcion(proveedor_util::getciudadDescripcion($proveedor->getciudad()));
				$proveedor->setid_vendedor_Descripcion(proveedor_util::getvendedorDescripcion($proveedor->getvendedor()));
				$proveedor->setid_termino_pago_proveedor_Descripcion(proveedor_util::gettermino_pago_proveedorDescripcion($proveedor->gettermino_pago_proveedor()));
				$proveedor->setid_cuenta_Descripcion(proveedor_util::getcuentaDescripcion($proveedor->getcuenta()));
				$proveedor->setid_impuesto_Descripcion(proveedor_util::getimpuestoDescripcion($proveedor->getimpuesto()));
				$proveedor->setid_retencion_Descripcion(proveedor_util::getretencionDescripcion($proveedor->getretencion()));
				$proveedor->setid_retencion_fuente_Descripcion(proveedor_util::getretencion_fuenteDescripcion($proveedor->getretencion_fuente()));
				$proveedor->setid_retencion_ica_Descripcion(proveedor_util::getretencion_icaDescripcion($proveedor->getretencion_ica()));
				$proveedor->setid_otro_impuesto_Descripcion(proveedor_util::getotro_impuestoDescripcion($proveedor->getotro_impuesto()));
			}
			
			if($proveedor!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(proveedor $proveedor) {		
		try {
			
			
				$proveedor->setid_empresa_Descripcion(proveedor_util::getempresaDescripcion($proveedor->getempresa()));
				$proveedor->setid_tipo_persona_Descripcion(proveedor_util::gettipo_personaDescripcion($proveedor->gettipo_persona()));
				$proveedor->setid_categoria_proveedor_Descripcion(proveedor_util::getcategoria_proveedorDescripcion($proveedor->getcategoria_proveedor()));
				$proveedor->setid_giro_negocio_proveedor_Descripcion(proveedor_util::getgiro_negocio_proveedorDescripcion($proveedor->getgiro_negocio_proveedor()));
				$proveedor->setid_pais_Descripcion(proveedor_util::getpaisDescripcion($proveedor->getpais()));
				$proveedor->setid_provincia_Descripcion(proveedor_util::getprovinciaDescripcion($proveedor->getprovincia()));
				$proveedor->setid_ciudad_Descripcion(proveedor_util::getciudadDescripcion($proveedor->getciudad()));
				$proveedor->setid_vendedor_Descripcion(proveedor_util::getvendedorDescripcion($proveedor->getvendedor()));
				$proveedor->setid_termino_pago_proveedor_Descripcion(proveedor_util::gettermino_pago_proveedorDescripcion($proveedor->gettermino_pago_proveedor()));
				$proveedor->setid_cuenta_Descripcion(proveedor_util::getcuentaDescripcion($proveedor->getcuenta()));
				$proveedor->setid_impuesto_Descripcion(proveedor_util::getimpuestoDescripcion($proveedor->getimpuesto()));
				$proveedor->setid_retencion_Descripcion(proveedor_util::getretencionDescripcion($proveedor->getretencion()));
				$proveedor->setid_retencion_fuente_Descripcion(proveedor_util::getretencion_fuenteDescripcion($proveedor->getretencion_fuente()));
				$proveedor->setid_retencion_ica_Descripcion(proveedor_util::getretencion_icaDescripcion($proveedor->getretencion_ica()));
				$proveedor->setid_otro_impuesto_Descripcion(proveedor_util::getotro_impuestoDescripcion($proveedor->getotro_impuesto()));
							
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
		} else if($sNombreIndice=='FK_Idcategoria_proveedor') {
			$sNombreIndice='Tipo=  Por Categoria';
		} else if($sNombreIndice=='FK_Idciudad') {
			$sNombreIndice='Tipo=  Por Ciudad';
		} else if($sNombreIndice=='FK_Idcuenta') {
			$sNombreIndice='Tipo=  Por Cuenta';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idgiro_negocio_proveedor') {
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
			$sNombreIndice='Tipo=  Por Retencion';
		} else if($sNombreIndice=='FK_Idretencion_fuente') {
			$sNombreIndice='Tipo=  Por  Retencion Fuente';
		} else if($sNombreIndice=='FK_Idretencion_ica') {
			$sNombreIndice='Tipo=  Por  Retencion Ica';
		} else if($sNombreIndice=='FK_Idtermino_pago_proveedor') {
			$sNombreIndice='Tipo=  Por Termino Pago';
		} else if($sNombreIndice=='FK_Idtipo_persona') {
			$sNombreIndice='Tipo=  Por  Tipo Persona';
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

	public static function getDetalleIndiceFK_Idcategoria_proveedor(int $id_categoria_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Categoria='+$id_categoria_proveedor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idciudad(int $id_ciudad) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Ciudad='+$id_ciudad; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcuenta(?int $id_cuenta) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cuenta='+$id_cuenta; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idgiro_negocio_proveedor(int $id_giro_negocio_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Giro Negocio='+$id_giro_negocio_proveedor; 

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
		$sDetalleIndice.=' Código Único de Retencion='+$id_retencion; 

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

	public static function getDetalleIndiceFK_Idtermino_pago_proveedor(int $id_termino_pago_proveedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Termino Pago='+$id_termino_pago_proveedor; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_persona(int $id_tipo_persona) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Persona='+$id_tipo_persona; 

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
		return proveedor_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return proveedor_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_TIPO_PERSONA);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_TIPO_PERSONA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_CATEGORIA_PROVEEDOR);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_CATEGORIA_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_GIRO_NEGOCIO_PROVEEDOR);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_GIRO_NEGOCIO_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_RUC);
			$reporte->setsDescripcion(proveedor_util::$LABEL_RUC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_PRIMER_APELLIDO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_PRIMER_APELLIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_SEGUNDO_APELLIDO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_SEGUNDO_APELLIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_PRIMER_NOMBRE);
			$reporte->setsDescripcion(proveedor_util::$LABEL_PRIMER_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_SEGUNDO_NOMBRE);
			$reporte->setsDescripcion(proveedor_util::$LABEL_SEGUNDO_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_NOMBRE_COMPLETO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_NOMBRE_COMPLETO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_DIRECCION);
			$reporte->setsDescripcion(proveedor_util::$LABEL_DIRECCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_TELEFONO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_TELEFONO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_TELEFONO_MOVIL);
			$reporte->setsDescripcion(proveedor_util::$LABEL_TELEFONO_MOVIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_E_MAIL);
			$reporte->setsDescripcion(proveedor_util::$LABEL_E_MAIL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_E_MAIL2);
			$reporte->setsDescripcion(proveedor_util::$LABEL_E_MAIL2);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_COMENTARIO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_COMENTARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(proveedor_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ACTIVO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ACTIVO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_PAIS);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_PAIS.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_PROVINCIA);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_PROVINCIA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_CIUDAD);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_CIUDAD.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_CODIGO_POSTAL);
			$reporte->setsDescripcion(proveedor_util::$LABEL_CODIGO_POSTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_FAX);
			$reporte->setsDescripcion(proveedor_util::$LABEL_FAX);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_CONTACTO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_CONTACTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_VENDEDOR);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_VENDEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_MAXIMO_CREDITO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_MAXIMO_CREDITO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_MAXIMO_DESCUENTO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_MAXIMO_DESCUENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_INTERES_ANUAL);
			$reporte->setsDescripcion(proveedor_util::$LABEL_INTERES_ANUAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_BALANCE);
			$reporte->setsDescripcion(proveedor_util::$LABEL_BALANCE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_TERMINO_PAGO_PROVEEDOR);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_TERMINO_PAGO_PROVEEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_CUENTA);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_CUENTA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_APLICA_IMPUESTO_COMPRAS);
			$reporte->setsDescripcion(proveedor_util::$LABEL_APLICA_IMPUESTO_COMPRAS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_IMPUESTO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_APLICA_RETENCION_IMPUESTO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_APLICA_RETENCION_IMPUESTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_RETENCION);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_RETENCION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_APLICA_RETENCION_FUENTE);
			$reporte->setsDescripcion(proveedor_util::$LABEL_APLICA_RETENCION_FUENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_RETENCION_FUENTE);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_RETENCION_FUENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_APLICA_RETENCION_ICA);
			$reporte->setsDescripcion(proveedor_util::$LABEL_APLICA_RETENCION_ICA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_RETENCION_ICA);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_RETENCION_ICA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_APLICA_2DO_IMPUESTO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_APLICA_2DO_IMPUESTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_ID_OTRO_IMPUESTO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_ID_OTRO_IMPUESTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_CREADO);
			$reporte->setsDescripcion(proveedor_util::$LABEL_CREADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_MONTO_ULTIMA_TRANSACCION);
			$reporte->setsDescripcion(proveedor_util::$LABEL_MONTO_ULTIMA_TRANSACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_FECHA_ULTIMA_TRANSACCION);
			$reporte->setsDescripcion(proveedor_util::$LABEL_FECHA_ULTIMA_TRANSACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(proveedor_util::$LABEL_DESCRIPCION_ULTIMA_TRANSACCION);
			$reporte->setsDescripcion(proveedor_util::$LABEL_DESCRIPCION_ULTIMA_TRANSACCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==proveedor_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=proveedor_util::$ID_EMPRESA;
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
				$classes[]=new Classe(categoria_proveedor::$class);
				$classes[]=new Classe(giro_negocio_proveedor::$class);
				$classes[]=new Classe(pais::$class);
				$classes[]=new Classe(provincia::$class);
				$classes[]=new Classe(ciudad::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_proveedor::$class);
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
					if($clas==categoria_proveedor::$class) {
						$classes[]=new Classe(categoria_proveedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==giro_negocio_proveedor::$class) {
						$classes[]=new Classe(giro_negocio_proveedor::$class);
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
					if($clas==termino_pago_proveedor::$class) {
						$classes[]=new Classe(termino_pago_proveedor::$class);
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
					if($clas==categoria_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(categoria_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==giro_negocio_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(giro_negocio_proveedor::$class);
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
				
				$classes[]=new Classe(lista_precio::$class);
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(cuenta_pagar::$class);
				$classes[]=new Classe(imagen_proveedor::$class);
				$classes[]=new Classe(documento_proveedor::$class);
				$classes[]=new Classe(otro_suplidor::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==lista_precio::$class) {
						$classes[]=new Classe(lista_precio::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==cuenta_pagar::$class) {
						$classes[]=new Classe(cuenta_pagar::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==imagen_proveedor::$class) {
						$classes[]=new Classe(imagen_proveedor::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==documento_proveedor::$class) {
						$classes[]=new Classe(documento_proveedor::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==otro_suplidor::$class) {
						$classes[]=new Classe(otro_suplidor::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==lista_precio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(lista_precio::$class);
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
					if($clas==imagen_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(imagen_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==documento_proveedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_proveedor::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==otro_suplidor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(otro_suplidor::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID, proveedor_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_EMPRESA, proveedor_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_TIPO_PERSONA, proveedor_util::$ID_TIPO_PERSONA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_CATEGORIA_PROVEEDOR, proveedor_util::$ID_CATEGORIA_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_GIRO_NEGOCIO_PROVEEDOR, proveedor_util::$ID_GIRO_NEGOCIO_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_CODIGO, proveedor_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_RUC, proveedor_util::$RUC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_PRIMER_APELLIDO, proveedor_util::$PRIMER_APELLIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_SEGUNDO_APELLIDO, proveedor_util::$SEGUNDO_APELLIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_PRIMER_NOMBRE, proveedor_util::$PRIMER_NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_SEGUNDO_NOMBRE, proveedor_util::$SEGUNDO_NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_NOMBRE_COMPLETO, proveedor_util::$NOMBRE_COMPLETO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_DIRECCION, proveedor_util::$DIRECCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_TELEFONO, proveedor_util::$TELEFONO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_TELEFONO_MOVIL, proveedor_util::$TELEFONO_MOVIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_E_MAIL, proveedor_util::$E_MAIL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_E_MAIL2, proveedor_util::$E_MAIL2,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_COMENTARIO, proveedor_util::$COMENTARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_IMAGEN, proveedor_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ACTIVO, proveedor_util::$ACTIVO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_PAIS, proveedor_util::$ID_PAIS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_PROVINCIA, proveedor_util::$ID_PROVINCIA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_CIUDAD, proveedor_util::$ID_CIUDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_CODIGO_POSTAL, proveedor_util::$CODIGO_POSTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_FAX, proveedor_util::$FAX,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_CONTACTO, proveedor_util::$CONTACTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_VENDEDOR, proveedor_util::$ID_VENDEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_MAXIMO_CREDITO, proveedor_util::$MAXIMO_CREDITO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_MAXIMO_DESCUENTO, proveedor_util::$MAXIMO_DESCUENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_INTERES_ANUAL, proveedor_util::$INTERES_ANUAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_BALANCE, proveedor_util::$BALANCE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_TERMINO_PAGO_PROVEEDOR, proveedor_util::$ID_TERMINO_PAGO_PROVEEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_CUENTA, proveedor_util::$ID_CUENTA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_APLICA_IMPUESTO_COMPRAS, proveedor_util::$APLICA_IMPUESTO_COMPRAS,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_IMPUESTO, proveedor_util::$ID_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_APLICA_RETENCION_IMPUESTO, proveedor_util::$APLICA_RETENCION_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_RETENCION, proveedor_util::$ID_RETENCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_APLICA_RETENCION_FUENTE, proveedor_util::$APLICA_RETENCION_FUENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_RETENCION_FUENTE, proveedor_util::$ID_RETENCION_FUENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_APLICA_RETENCION_ICA, proveedor_util::$APLICA_RETENCION_ICA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_RETENCION_ICA, proveedor_util::$ID_RETENCION_ICA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_APLICA_2DO_IMPUESTO, proveedor_util::$APLICA_2DO_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_ID_OTRO_IMPUESTO, proveedor_util::$ID_OTRO_IMPUESTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_CREADO, proveedor_util::$CREADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_MONTO_ULTIMA_TRANSACCION, proveedor_util::$MONTO_ULTIMA_TRANSACCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_FECHA_ULTIMA_TRANSACCION, proveedor_util::$FECHA_ULTIMA_TRANSACCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,proveedor_util::$LABEL_DESCRIPCION_ULTIMA_TRANSACCION, proveedor_util::$DESCRIPCION_ULTIMA_TRANSACCION,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,lista_precio_util::$STR_CLASS_WEB_TITULO, lista_precio_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_util::$STR_CLASS_WEB_TITULO, orden_compra_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,cuenta_pagar_util::$STR_CLASS_WEB_TITULO, cuenta_pagar_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_proveedor_util::$STR_CLASS_WEB_TITULO, imagen_proveedor_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,documento_proveedor_util::$STR_CLASS_WEB_TITULO, documento_proveedor_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,otro_suplidor_util::$STR_CLASS_WEB_TITULO, otro_suplidor_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Categoria',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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

		if(Funciones::existeCadenaArrayOrderBy('Termino Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Termino Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Impuesto Compras',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Impuesto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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
	
	public static function getDataReportRow(string $tipo='NORMAL',proveedor $proveedor,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Persona',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_tipo_persona_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Categoria',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_categoria_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Giro Negocio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_giro_negocio_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ruc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getruc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Primer Apellido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getprimer_apellido(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Segundo Apellido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getsegundo_apellido(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Primer Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getprimer_nombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Segundo Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getsegundo_nombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getnombre_completo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getdireccion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gettelefono(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gettelefono_movil(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('E Mail',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gete_mail(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('E Mail2',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gete_mail2(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Comentario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcomentario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Activo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($proveedor->getactivo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Pais',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_pais_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Provincia',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_provincia_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ciudad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_ciudad_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcodigo_postal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fax',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getfax(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Contacto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcontacto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Vendedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_vendedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Maximo Credito',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getmaximo_credito(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Maximo Descuento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getmaximo_descuento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Interes Anual',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getinteres_anual(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Balance',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getbalance(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Termino Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_termino_pago_proveedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cuenta',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_cuenta_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Impuesto Compras',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($proveedor->getaplica_impuesto_compras()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($proveedor->getaplica_retencion_impuesto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Retencion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_retencion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($proveedor->getaplica_retencion_fuente()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Fuente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_retencion_fuente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Ica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($proveedor->getaplica_retencion_ica()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Retencion Ica',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_retencion_ica_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Aplica 2do Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($proveedor->getaplica_2do_impuesto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_otro_impuesto_Descripcion(),40,6,1); $row[]=$cellReport;
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
	
	public static function getcategoria_proveedorDescripcion(?categoria_proveedor $categoria_proveedor) : string {
		$sDescripcion='none';
		if($categoria_proveedor!==null) {
			$sDescripcion=categoria_proveedor_util::getcategoria_proveedorDescripcion($categoria_proveedor);
		}
		return $sDescripcion;
	}	
	
	public static function getgiro_negocio_proveedorDescripcion(?giro_negocio_proveedor $giro_negocio_proveedor) : string {
		$sDescripcion='none';
		if($giro_negocio_proveedor!==null) {
			$sDescripcion=giro_negocio_proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedor);
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
	
	public static function gettermino_pago_proveedorDescripcion(?termino_pago_proveedor $termino_pago_proveedor) : string {
		$sDescripcion='none';
		if($termino_pago_proveedor!==null) {
			$sDescripcion=termino_pago_proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedor);
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
	
	interface proveedor_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $proveedors,int $iIdNuevoproveedor) : int;	
		public static function getIndiceActual(array $proveedors,proveedor $proveedor,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getproveedorDescripcion(?proveedor $proveedor) : string {;	
		public static function setproveedorDescripcion(?proveedor $proveedor,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $proveedors) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $proveedors);	
		public static function refrescarFKDescripcion(proveedor $proveedor);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',proveedor $proveedor,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

