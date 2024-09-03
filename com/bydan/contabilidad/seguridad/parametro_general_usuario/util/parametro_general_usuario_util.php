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

namespace com\bydan\contabilidad\seguridad\parametro_general_usuario\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_util;
use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL


class parametro_general_usuario_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_general_usuario';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.parametro_general_usuarios';
	/*'Mantenimientoparametro_general_usuario.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_general_usuario.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_general_usuarioPersistenceName';
	/*.parametro_general_usuario_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_general_usuario_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_general_usuario_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_general_usuario_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro Generales';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Parametro General';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='parametro_general_usuario';
	public static string $PARAMETRO_GENERAL_USUARIO='seg_parametro_general_usuario';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_general_usuario';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tipo_fondo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.path_exportar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_exportar_cabecera,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_exportar_campo_version,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_botones_tool_bar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_cargar_por_parte,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_guardar_relaciones,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_mostrar_acciones_campo_general,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_mensaje_confirmacion from '.parametro_general_usuario_util::$SCHEMA.'.'.parametro_general_usuario_util::$TABLENAME;*/
	
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
	//public $parametro_general_usuarioConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_TIPO_FONDO='id_tipo_fondo';
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $PATH_EXPORTAR='path_exportar';
    public static string $CON_EXPORTAR_CABECERA='con_exportar_cabecera';
    public static string $CON_EXPORTAR_CAMPO_VERSION='con_exportar_campo_version';
    public static string $CON_BOTONES_TOOL_BAR='con_botones_tool_bar';
    public static string $CON_CARGAR_POR_PARTE='con_cargar_por_parte';
    public static string $CON_GUARDAR_RELACIONES='con_guardar_relaciones';
    public static string $CON_MOSTRAR_ACCIONES_CAMPO_GENERAL='con_mostrar_acciones_campo_general';
    public static string $CON_MENSAJE_CONFIRMACION='con_mensaje_confirmacion';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_TIPO_FONDO=' Tipo Fondo';
    public static string $LABEL_ID_EMPRESA=' Empresa';
    public static string $LABEL_ID_SUCURSAL=' Sucursal';
    public static string $LABEL_ID_EJERCICIO=' Ejercicio';
    public static string $LABEL_ID_PERIODO=' Periodo';
    public static string $LABEL_PATH_EXPORTAR='Path Exportar';
    public static string $LABEL_CON_EXPORTAR_CABECERA='Exportar Cabecera';
    public static string $LABEL_CON_EXPORTAR_CAMPO_VERSION='Exportar Campo Version';
    public static string $LABEL_CON_BOTONES_TOOL_BAR='Botones Tool Bar';
    public static string $LABEL_CON_CARGAR_POR_PARTE='Con Cargar Por Parte';
    public static string $LABEL_CON_GUARDAR_RELACIONES='Guardar Relaciones';
    public static string $LABEL_CON_MOSTRAR_ACCIONES_CAMPO_GENERAL='Mostrar Acciones Campo General';
    public static string $LABEL_CON_MENSAJE_CONFIRMACION='Mensaje Confirmacion';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_general_usuarioConstantesFuncionesAdditional=new $parametro_general_usuarioConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_general_usuarios,int $iIdNuevoparametro_general_usuario) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_general_usuarios as $parametro_general_usuarioAux) {
			if($parametro_general_usuarioAux->getId()==$iIdNuevoparametro_general_usuario) {
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
	
	public static function getIndiceActual(array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_general_usuarios as $parametro_general_usuarioAux) {
			if($parametro_general_usuarioAux->getId()==$parametro_general_usuario->getId()) {
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
	public static function getparametro_general_usuarioDescripcion(?parametro_general_usuario $parametro_general_usuario) : string {//parametro_general_usuario NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_general_usuario !=null) {
			/*&& parametro_general_usuario->getId()!=0*/
			
			if($parametro_general_usuario->getId()!=null) {
				$sDescripcion=(string)$parametro_general_usuario->getId();
			}
			
			/*parametro_general_usuario;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_general_usuarioDescripcion(?parametro_general_usuario $parametro_general_usuario,string $sValor) {			
		if($parametro_general_usuario !=null) {
			
			/*parametro_general_usuario;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_general_usuarios) : array {
		$parametro_general_usuariosForeignKey=array();
		
		foreach ($parametro_general_usuarios as $parametro_general_usuarioLocal) {
			$parametro_general_usuariosForeignKey[$parametro_general_usuarioLocal->getId()]=parametro_general_usuario_util::getparametro_general_usuarioDescripcion($parametro_general_usuarioLocal);
		}
			
		return $parametro_general_usuariosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_tipo_fondo() : string  { return ' Tipo Fondo'; }
    public static function getColumnLabelid_empresa() : string  { return ' Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return ' Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return ' Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return ' Periodo'; }
    public static function getColumnLabelpath_exportar() : string  { return 'Path Exportar'; }
    public static function getColumnLabelcon_exportar_cabecera() : string  { return 'Exportar Cabecera'; }
    public static function getColumnLabelcon_exportar_campo_version() : string  { return 'Exportar Campo Version'; }
    public static function getColumnLabelcon_botones_tool_bar() : string  { return 'Botones Tool Bar'; }
    public static function getColumnLabelcon_cargar_por_parte() : string  { return 'Con Cargar Por Parte'; }
    public static function getColumnLabelcon_guardar_relaciones() : string  { return 'Guardar Relaciones'; }
    public static function getColumnLabelcon_mostrar_acciones_campo_general() : string  { return 'Mostrar Acciones Campo General'; }
    public static function getColumnLabelcon_mensaje_confirmacion() : string  { return 'Mensaje Confirmacion'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getcon_exportar_cabeceraDescripcion($parametro_general_usuario) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_usuario->getcon_exportar_cabecera()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_exportar_campo_versionDescripcion($parametro_general_usuario) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_usuario->getcon_exportar_campo_version()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_botones_tool_barDescripcion($parametro_general_usuario) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_usuario->getcon_botones_tool_bar()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_cargar_por_parteDescripcion($parametro_general_usuario) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_usuario->getcon_cargar_por_parte()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_guardar_relacionesDescripcion($parametro_general_usuario) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_usuario->getcon_guardar_relaciones()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_mostrar_acciones_campo_generalDescripcion($parametro_general_usuario) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_usuario->getcon_mostrar_acciones_campo_general()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_mensaje_confirmacionDescripcion($parametro_general_usuario) {
		$sDescripcion='Verdadero';
		if(!$parametro_general_usuario->getcon_mensaje_confirmacion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_general_usuarios) {		
		try {
			
			$parametro_general_usuario = new parametro_general_usuario();
			
			foreach($parametro_general_usuarios as $parametro_general_usuario) {
				
				$parametro_general_usuario->setid_tipo_fondo_Descripcion(parametro_general_usuario_util::gettipo_fondoDescripcion($parametro_general_usuario->gettipo_fondo()));
				$parametro_general_usuario->setid_empresa_Descripcion(parametro_general_usuario_util::getempresaDescripcion($parametro_general_usuario->getempresa()));
				$parametro_general_usuario->setid_sucursal_Descripcion(parametro_general_usuario_util::getsucursalDescripcion($parametro_general_usuario->getsucursal()));
				$parametro_general_usuario->setid_ejercicio_Descripcion(parametro_general_usuario_util::getejercicioDescripcion($parametro_general_usuario->getejercicio()));
				$parametro_general_usuario->setid_periodo_Descripcion(parametro_general_usuario_util::getperiodoDescripcion($parametro_general_usuario->getperiodo()));
			}
			
			if($parametro_general_usuario!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_general_usuario $parametro_general_usuario) {		
		try {
			
			
				$parametro_general_usuario->setid_tipo_fondo_Descripcion(parametro_general_usuario_util::gettipo_fondoDescripcion($parametro_general_usuario->gettipo_fondo()));
				$parametro_general_usuario->setid_empresa_Descripcion(parametro_general_usuario_util::getempresaDescripcion($parametro_general_usuario->getempresa()));
				$parametro_general_usuario->setid_sucursal_Descripcion(parametro_general_usuario_util::getsucursalDescripcion($parametro_general_usuario->getsucursal()));
				$parametro_general_usuario->setid_ejercicio_Descripcion(parametro_general_usuario_util::getejercicioDescripcion($parametro_general_usuario->getejercicio()));
				$parametro_general_usuario->setid_periodo_Descripcion(parametro_general_usuario_util::getperiodoDescripcion($parametro_general_usuario->getperiodo()));
							
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
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por  Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por  Empresa';
		} else if($sNombreIndice=='FK_Idperiodo') {
			$sNombreIndice='Tipo=  Por  Periodo';
		} else if($sNombreIndice=='FK_Idsucursal') {
			$sNombreIndice='Tipo=  Por  Sucursal';
		} else if($sNombreIndice=='FK_Idtipo_fondo') {
			$sNombreIndice='Tipo=  Por  Tipo Fondo';
		} else if($sNombreIndice=='FK_Idusuarioid') {
			$sNombreIndice='Tipo=  Por Id';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idejercicio(int $id_ejercicio) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Ejercicio='+$id_ejercicio; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperiodo(int $id_periodo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Periodo='+$id_periodo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsucursal(int $id_sucursal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Sucursal='+$id_sucursal; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtipo_fondo(int $id_tipo_fondo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Tipo Fondo='+$id_tipo_fondo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idusuarioid(int $id) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Id='+$id; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return parametro_general_usuario_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_general_usuario_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_ID_TIPO_FONDO);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_ID_TIPO_FONDO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_PATH_EXPORTAR);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_PATH_EXPORTAR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_CON_EXPORTAR_CABECERA);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_CON_EXPORTAR_CABECERA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_CON_EXPORTAR_CAMPO_VERSION);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_CON_EXPORTAR_CAMPO_VERSION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_CON_BOTONES_TOOL_BAR);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_CON_BOTONES_TOOL_BAR);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_CON_CARGAR_POR_PARTE);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_CON_CARGAR_POR_PARTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_CON_GUARDAR_RELACIONES);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_CON_GUARDAR_RELACIONES);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_CON_MOSTRAR_ACCIONES_CAMPO_GENERAL);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_CON_MOSTRAR_ACCIONES_CAMPO_GENERAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_general_usuario_util::$LABEL_CON_MENSAJE_CONFIRMACION);
			$reporte->setsDescripcion(parametro_general_usuario_util::$LABEL_CON_MENSAJE_CONFIRMACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_general_usuario_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(tipo_fondo::$class);
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tipo_fondo::$class) {
						$classes[]=new Classe(tipo_fondo::$class);
					}
				}

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

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
					if($clas==tipo_fondo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tipo_fondo::$class);
				}

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
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_ID, parametro_general_usuario_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_ID_TIPO_FONDO, parametro_general_usuario_util::$ID_TIPO_FONDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_ID_EMPRESA, parametro_general_usuario_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_ID_SUCURSAL, parametro_general_usuario_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_ID_EJERCICIO, parametro_general_usuario_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_ID_PERIODO, parametro_general_usuario_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_PATH_EXPORTAR, parametro_general_usuario_util::$PATH_EXPORTAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_CON_EXPORTAR_CABECERA, parametro_general_usuario_util::$CON_EXPORTAR_CABECERA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_CON_EXPORTAR_CAMPO_VERSION, parametro_general_usuario_util::$CON_EXPORTAR_CAMPO_VERSION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_CON_BOTONES_TOOL_BAR, parametro_general_usuario_util::$CON_BOTONES_TOOL_BAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_CON_CARGAR_POR_PARTE, parametro_general_usuario_util::$CON_CARGAR_POR_PARTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_CON_GUARDAR_RELACIONES, parametro_general_usuario_util::$CON_GUARDAR_RELACIONES,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_CON_MOSTRAR_ACCIONES_CAMPO_GENERAL, parametro_general_usuario_util::$CON_MOSTRAR_ACCIONES_CAMPO_GENERAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_general_usuario_util::$LABEL_CON_MENSAJE_CONFIRMACION, parametro_general_usuario_util::$CON_MENSAJE_CONFIRMACION,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Fondo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Fondo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Path Exportar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Path Exportar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Exportar Cabecera',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Exportar Cabecera',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Exportar Campo Version',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Exportar Campo Version',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Botones Tool Bar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Botones Tool Bar',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Cargar Por Parte',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Cargar Por Parte',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Guardar Relaciones',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Guardar Relaciones',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Acciones Campo General',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Acciones Campo General',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mensaje Confirmacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mensaje Confirmacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_general_usuario $parametro_general_usuario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Tipo Fondo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_tipo_fondo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Path Exportar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_general_usuario->getpath_exportar(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Exportar Cabecera',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_usuario->getcon_exportar_cabecera()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Exportar Campo Version',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_usuario->getcon_exportar_campo_version()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Botones Tool Bar',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_usuario->getcon_botones_tool_bar()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Cargar Por Parte',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_usuario->getcon_cargar_por_parte()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Guardar Relaciones',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_usuario->getcon_guardar_relaciones()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Acciones Campo General',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_usuario->getcon_mostrar_acciones_campo_general()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mensaje Confirmacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_general_usuario->getcon_mensaje_confirmacion()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getusuarioDescripcion(?usuario $usuario) : string {
		$sDescripcion='none';
		if($usuario!==null) {
			$sDescripcion=usuario_util::getusuarioDescripcion($usuario);
		}
		return $sDescripcion;
	}	
	
	public static function gettipo_fondoDescripcion(?tipo_fondo $tipo_fondo) : string {
		$sDescripcion='none';
		if($tipo_fondo!==null) {
			$sDescripcion=tipo_fondo_util::gettipo_fondoDescripcion($tipo_fondo);
		}
		return $sDescripcion;
	}	
	
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
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface parametro_general_usuario_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_general_usuarios,int $iIdNuevoparametro_general_usuario) : int;	
		public static function getIndiceActual(array $parametro_general_usuarios,parametro_general_usuario $parametro_general_usuario,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_general_usuarioDescripcion(?parametro_general_usuario $parametro_general_usuario) : string {;	
		public static function setparametro_general_usuarioDescripcion(?parametro_general_usuario $parametro_general_usuario,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_general_usuarios) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_general_usuarios);	
		public static function refrescarFKDescripcion(parametro_general_usuario $parametro_general_usuario);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',parametro_general_usuario $parametro_general_usuario,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

