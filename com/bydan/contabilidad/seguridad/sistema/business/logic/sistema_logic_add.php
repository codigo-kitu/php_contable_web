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

namespace com\bydan\contabilidad\seguridad\sistema\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;
use com\bydan\framework\contabilidad\util\Connexion;

//use com\bydan\framework\contabilidad\util\DeepLoadType;
//use com\bydan\framework\contabilidad\business\entity\Reporte;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\business\entity\OrderBy;
//use com\bydan\framework\contabilidad\presentation\report\CellReport;
//use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;

use com\bydan\contabilidad\seguridad\opcion\business\data\opcion_data;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\data\perfil_opcion_data;
use com\bydan\contabilidad\seguridad\perfil_campo\business\data\perfil_campo_data;
use com\bydan\contabilidad\seguridad\perfil_accion\business\data\perfil_accion_data;
use com\bydan\contabilidad\seguridad\accion\business\data\accion_data;
use com\bydan\contabilidad\seguridad\campo\business\data\campo_data;

use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;

use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\accion\business\logic\accion_logic;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\logic\perfil_usuario_logic;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\logic\perfil_opcion_logic;
use com\bydan\contabilidad\seguridad\perfil_campo\business\logic\perfil_campo_logic;

class sistema_logic_add extends sistema_logic{
	/*CONTROL_INICIO*/
	
	function __construct() {
		parent::__construct();
    }	
	/*CONTROL_FUNCION1*/
		
	
	public static function checksistemaToSave($sistema,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_1
	}
	
	public static function checksistemaToSave2($sistema,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_2
	}
	
	public static function checksistemaToSaveAfter($sistema,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_3
	}
	
	public static function checksistemaToSaves($sistemas,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_4
	}
	
	public static function checksistemaToSaves2($sistemas,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_5
	}
	
	public static function checksistemaToSavesAfter($sistemas,$datosCliente,$connexion,$arrDatoGeneral=null) {	
		//CONTROL_6
	}
	
	public static function checksistemaToGet($sistema,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_7
	}
	
	public static function checksistemaToGets($sistemas,$datosCliente,$arrDatoGeneral=null) {	
		//CONTROL_8
	}
	
	public static function updatesistemaToSave($sistema,$arrDatoGeneral=null) {	
		//CONTROL_9
	}		
						
	public static function updatesistemaToGet($sistema,$arrDatoGeneral=null) {	
		//CONTROL_10
	}	
	
	//PARA ACCIONES ADDITIONAL
	public function ProcesarAccion($parametroGeneralUsuario,$moduloActual,$opcionActual,$usuarioActual,$sProceso,$sistemas)  {
		//CONTROL_16
		$esProcesado=true;
		
		try {	
			//$this->connexion=$this->connexion->getNewConnexion($this->connexionType,$this->parameterDbType,$this->entityManagerFactory);$this->connexion->begin();			
		
			$this->connexion->commit();
			
		} catch(Exception $e) {
			$this->connexion->rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
		
		return $esProcesado;
	}		
	
	//PARA ACCIONES NORMALES		
	public static function procesarAccions0($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$sProceso,$objects,$generalEntityParameterGeneral,$generalEntityReturnGeneral){				
		//CONTROL_17
		
		 try {	
			
			
			//GeneralEntityReturnGeneral generalEntityReturnGeneral=new GeneralEntityReturnGeneral();
				
			
			return $generalEntityReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
      	}
	}
	
	//ACCION TABLA PROCESO DESDE BUSQUEDA
	public static function ProcesarAccion2($parametroGeneralUsuario,$moduloActual,$opcion,$usuario,$generalEntityLogic,$sProceso,$objects,$generalEntityParameterGeneral,$generalEntityReturnGeneral)  {
		//CONTROL_18
		//GeneralEntityReturnGeneral generalEntityReturnGeneral=new GeneralEntityReturnGeneral();
			
		try {	
			//this.connexion=connexion.getNewConnexion(this.connexionType,this.parameterDbType,this.entityManagerFactory);connexion.begin();			
		
			//this.connexion.commit();
			
		} catch(Exception $e) {
			//this.connexion.rollback();			
			
			Funciones::logShowExceptionMessages($e);
			throw $e;			
      	}
		
		return $generalEntityReturnGeneral;
	}
	
	//PARA EVENTOS GENERALES,QUITAR STATIC Y 2 PARA SOBREESCRIBIR
	public static function procesarEventos2($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$objects,$object,$generalEntityParameterGeneral,$generalEntityReturnGeneral,$isEsNuevoUpdate,$clases){				
		//CONTROL_19		
		 try {	
				
			
			return $generalEntityReturnGeneral;
			
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			
			throw $e;			
      	}
	}
	
	public static function validarSaveRelaciones($generalEntity,$generalEntityLogic) {
		//CONTROL_20
		$validado=true;

		return $validado;	
	}
	
	public static function updateRelacionesToSave($generalEntity,$generalEntityLogic) {	
		//CONTROL_21
	}
	
	public static function updateRelacionesToSaveAfter($generalEntity,$generalEntityLogic) {	
		//CONTROL_22
	}
	
	public function procesarAccionsGeneral($parametroGeneralUsuario,$modulo,$opcion,$usuario,$generalEntityLogic,$sProceso,$objects,$generalEntityParameterGeneral,$generalEntityReturnGeneral){
		//CONTROL_23
	
		try {
		
		} catch(Exception $e) {
			Funciones::logShowExceptionMessages($e);
			throw $e;
	
		}
		
		return $generalEntityReturnGeneral;
	}
	
	
	public function getOpcionesUsuario($usuario,$lIdSistema) {
	    
	    return $this->getOpcionesUsuarioInterno($usuario,$lIdSistema,false,0,false);
	}
	
	public function getOpcionesUsuarioMapaSitio($usuario,$lIdSistema,$es_solomenu,$idModuloActual=0) {
	    
	    return $this->getOpcionesUsuarioInterno($usuario,$lIdSistema,!$es_solomenu,$idModuloActual,false);
	}
	
	public function getOpcionesUsuarioInterno(usuario $usuario,int $lIdSistema,bool $paraMapaSitio=false,int $idModuloActual=0,bool $conConnexion=false) : array {
			
		try	{
			
			$perfilUsuarioLogic=new perfil_usuario_logic();
			$opcionLogic=new opcion_logic();
			
			if($conConnexion) {
				$perfilUsuarioLogic->getsFK_IdUsuarioWithConnection('',new Pagination(), $usuario->getId());
				
			} else {
				$perfilUsuarioLogic->setConnexion($this->getConnexion());
				
				$perfilUsuarioLogic->getsFK_IdUsuario('',new Pagination(), $usuario->getId());
			}
			
			$sPerfiles='';
			$esPrimero=true;
			
			foreach($perfilUsuarioLogic->getperfil_usuarios() as $perfilusuario){
				if($esPrimero) {
					$esPrimero=false;
				} else {
					$sPerfiles.=",";
				}
				
				$sPerfiles.=$perfilusuario->getid_perfil();
			}
			
			//$sbTableAjax=array();
			
			$opcionLogic->setOpcions(array());
			
			$es_para_menu=' and opcion.es_para_menu=1 ';
			
			if($paraMapaSitio) {
				$es_para_menu='';
			}
			
			$es_modulo_actual='';
			
			if($idModuloActual!=null && $idModuloActual>0) {
				$es_modulo_actual=' and opcion.id_modulo='.$idModuloActual;
			}
			
			$sSelect=' select distinct opcion.id,opcion.updated_at,opcion.id_modulo,opcion.id_sistema,opcion.id_grupo_opcion,opcion.id_opcion,opcion.codigo,opcion.nombre,opcion.posicion,opcion.icon_name,opcion.nombre_clase,opcion.modulo0,opcion.sub_modulo,opcion.paquete,opcion.es_para_menu,opcion.estado,opcion.es_guardar_relaciones,opcion.con_mostrar_acciones_campo from '.Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.'.'.opcion_data::$TABLE_NAME.' opcion ';
			$sFinal=' inner join '.Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.'.'.perfil_opcion_data::$TABLE_NAME.' perfilopcion on opcion.id=perfilopcion.id_opcion where opcion.id_sistema='.$lIdSistema;
			$sFinal.=' and perfilopcion.id_perfil in ('.$sPerfiles.')';
			$sFinal.=$es_para_menu.$es_modulo_actual.' and opcion.estado=1 and perfilopcion.estado=1 order by opcion.posicion asc ';
			
			$queryWhereSelectParameters=new QueryWhereSelectParameters();
			$queryWhereSelectParameters->setInitialQuery('');
			$queryWhereSelectParameters->setFinalQuery($sFinal);
			
			if($conConnexion) {
				$opcionLogic->getEntitiesWithQuerySelectWithConnection($sSelect, $queryWhereSelectParameters);
				
			} else {
				$opcionLogic->setConnexion($this->getConnexion());
				
				$opcionLogic->getEntitiesWithQuerySelect($sSelect, $queryWhereSelectParameters);
			}	    	    	        
	        
	        
	    } catch(Exception $e) {
	        throw $e;
	    }
	    
	    
	    return  $opcionLogic->getOpcions();
	}
	
	public function tienePermisosEnPaginaWeb(usuario $usuario,int $lIdSistema,string $sPagina,int $bigIdOpcion,bool $conConnexion=false,bool $paraRelacionada=false) : bool {
	    $isTienePermisos=false;
	    
	    $perfilOpcionLogic=new perfil_opcion_logic();
	    $perfilUsuarioLogic=new perfil_usuario_logic();
	    
	    
	    if($conConnexion) {
	        $perfilUsuarioLogic->getsFK_IdUsuarioWithConnection("",new Pagination(), $usuario->getId());
	    } else {
	        $perfilUsuarioLogic->setConnexion($this->getConnexion());
	        
	        $perfilUsuarioLogic->getsFK_IdUsuario("",new Pagination(), $usuario->getId());
	    }
	    
	    $sPerfiles='';
	    $esPrimero=true;
	    
	    foreach($perfilUsuarioLogic->getperfil_usuarios() as $perfilusuario)	{
	        if($esPrimero) {
	            $esPrimero=false;
	        } else {
	            $sPerfiles.=",";
	        }
	        
	        $sPerfiles.=$perfilusuario->getid_perfil();
	    }
	    
	    //StringBuilder sbPermisos=new StringBuilder();
	    
	    //$opcionLogic->setOpcions(array());
	    //ArrayList<Opcion> opciones=new ArrayList<Opcion>();
	    
	    /*
	     select distinct * from Opcion O inner join perfilopcion PO on PO.id_opcion=O.id
	     where O.id_sistema=2 and PO.id_perfil in (1,2,3);
	     */
	    
	    $sSelect=" select distinct perfilopcion.id,perfilopcion.updated_at,perfilopcion.id_perfil,perfilopcion.id_opcion,perfilopcion.todo,perfilopcion.ingreso,perfilopcion.modificacion,perfilopcion.eliminacion,perfilopcion.consulta,perfilopcion.busqueda,perfilopcion.reporte,perfilopcion.estado from ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".perfil_opcion_data::$TABLE_NAME." perfilopcion ";
	    $sFinal="  inner join ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".opcion_data::$TABLE_NAME." opcion on perfilopcion.id_opcion=opcion.id where opcion.id_sistema=".$lIdSistema;
	    $sFinal.=" and perfilopcion.id_perfil in (".$sPerfiles.") and opcion.nombre_clase = '".$sPagina."'";
	    $sFinal.=" and perfilopcion.estado=1 ";
	    
	    if(!$paraRelacionada) {
	        if($bigIdOpcion!=0) { //PUEDE SER RELACIONADA DONDE id=0
	            $sFinal.=" and opcion.id=".$bigIdOpcion;
	        }
	    }
	    
	    $queryWhereSelectParameters=new QueryWhereSelectParameters();
	    $queryWhereSelectParameters->setInitialQuery('');
	    $queryWhereSelectParameters->setFinalQuery($sFinal);
	    
	    try	{
	        
	        if($conConnexion) {
	            $perfilOpcionLogic->getEntitiesWithQuerySelectWithConnection($sSelect, $queryWhereSelectParameters);
	        } else {
	            $perfilOpcionLogic->setConnexion($this->getConnexion());
	            
	            $perfilOpcionLogic->getEntitiesWithQuerySelect($sSelect, $queryWhereSelectParameters);
	        }
	        
	        if($perfilOpcionLogic->getperfil_opcions()!=null && count($perfilOpcionLogic->getperfil_opcions())>0) {
	            $isTienePermisos=true;
	        }
	        
	        return $isTienePermisos;
	        
	    } catch(Exception $e) {
	        throw $e;
	    }
	}
	
	public function traerPermisosPaginaWebPerfilOpcion(usuario $usuario,int $lIdSistema,string $sPagina,int $bigIdOpcion,bool $conConnexion=false,bool $paraRelacionada=false) : perfil_opcion {
	    
		$perfilOpcionLogic=new perfil_opcion_logic();
	    $perfilOpcionDeUsuario=new perfil_opcion();
	    
	    $perfilUsuarioLogic=new perfil_usuario_logic();
	    
	    if($conConnexion) {
	        $perfilUsuarioLogic->getsFK_IdUsuarioWithConnection("",new Pagination(), $usuario->getId());
	    } else {
	        $perfilUsuarioLogic->setConnexion($this->getConnexion());
	        
	        $perfilUsuarioLogic->getsFK_IdUsuario("",new Pagination(), $usuario->getId());
	    }
	    
	    $sPerfiles='';
	    $esPrimero=true;
	    
	    foreach($perfilUsuarioLogic->getperfil_usuarios() as $perfilusuario )	{
	        if($esPrimero) {
	            $esPrimero=false;
	        } else {
	            $sPerfiles.=',';
	        }
	        
	        $sPerfiles.=$perfilusuario->getid_perfil();
	    }
	    
	    //$opcionLogic->setOpcions(array());
	    //ArrayList<Opcion> opciones=new ArrayList<Opcion>();
	    
	    /*
	     select distinct * from Opcion O inner join perfilopcion PO on PO.id_opcion=O.id
	     where O.id_sistema=2 and PO.id_perfil in (1,2,3);
	     */
	    
	    $sSelect=" select distinct perfilopcion.id,perfilopcion.updated_at,perfilopcion.id_perfil,perfilopcion.id_opcion,perfilopcion.todo,perfilopcion.ingreso,perfilopcion.modificacion,perfilopcion.eliminacion,perfilopcion.consulta,perfilopcion.busqueda,perfilopcion.reporte,perfilopcion.estado from ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".perfil_opcion_data::$TABLE_NAME." perfilopcion ";
	    $sFinal="  inner join ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".opcion_data::$TABLE_NAME." opcion on perfilopcion.id_opcion=opcion.id where opcion.id_sistema=".$lIdSistema;
	    $sFinal.=" and perfilopcion.id_perfil in (".$sPerfiles.") and opcion.nombre_clase= '".$sPagina."'";
	    $sFinal.=" and perfilopcion.estado=1 ";
	    
	    if($bigIdOpcion!=0) { //PUEDE SER RELACIONADA DONDE id=0
	        $sFinal.=" and opcion.id=".$bigIdOpcion;
	    }
	    
	    $queryWhereSelectParameters=new QueryWhereSelectParameters();
	    $queryWhereSelectParameters->setInitialQuery("");
	    $queryWhereSelectParameters->setFinalQuery($sFinal);
	    
	    try	{
	        
	        if($conConnexion) {
	            $perfilOpcionLogic->getEntitiesWithQuerySelectWithConnection($sSelect, $queryWhereSelectParameters);
	        } else {
	            $perfilOpcionLogic->setConnexion($this->getConnexion());
	            
	            $perfilOpcionLogic->getEntitiesWithQuerySelect($sSelect, $queryWhereSelectParameters);
	        }
	        
	        if($perfilOpcionLogic->getperfil_opcions()!=null) {
	            
	            foreach($perfilOpcionLogic->getperfil_opcions() as $perfilopcion)	{
	                $perfilOpcionDeUsuario=$perfilopcion;
	                break;
	            }
	        }
	    } catch(Exception $e) {
	        throw $e;
	    }
	    
	    return $perfilOpcionDeUsuario;
	}
	
	public function traerPermisosPaginaWebPerfilCampo(usuario $usuario,int $lIdSistema,string $sPagina) : array {
	    $perfilCampoLogic=new perfil_campo_logic();
	    $perfilCamposDeUsuario=array();
	    
	    $perfilUsuarioLogic=new perfil_usuario_logic();
	    $perfilUsuarioLogic->getsFK_IdUsuarioWithConnection("",new Pagination(), $usuario->getId());
	    
	    $sPerfiles='';
	    $esPrimero=true;
	    
	    foreach($perfilUsuarioLogic->getperfil_usuarios() as $perfilusuario )	{
	        if($esPrimero) {
	            $esPrimero=false;
	        } else {
	            $sPerfiles.=',';
	        }
	        
	        $sPerfiles.=$perfilusuario->getid_perfil();
	    }
	    
	    //$opcionLogic->setCampos(array());
	    //ArrayList<Campo> opciones=new ArrayList<Campo>();
	    
	    /*
	     select distinct * from Campo O inner join perfilopcion PO on PO.id_campo=O.id
	     where O.id_sistema=2 and PO.id_perfil in (1,2,3);
	     */
	    
	    $sSelect=" select distinct perfilcampo.id,perfilcampo.updated_at,perfilcampo.id_perfil,perfilcampo.id_campo,perfilcampo.todo,perfilcampo.ingreso,perfilcampo.modificacion,perfilcampo.eliminacion,perfilcampo.consulta,perfilcampo.estado from ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".perfil_campo_data::$TABLE_NAME." perfilcampo ";
	    $sFinal=" inner join ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".campo_data::$TABLE_NAME." campo on perfilcampo.id_campo=campo.id ";
	    $sFinal.=" inner join ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".opcion_data::$TABLE_NAME." opcion on campo.id_opcion=opcion.id where opcion.id_sistema=".$lIdSistema;
	    $sFinal.=" and perfilcampo.id_perfil in (".$sPerfiles.") and opcion.nombre_clase= '".$sPagina."'";
	    $sFinal.=" and perfilcampo.estado=1 ";
	    
	    
	    $queryWhereSelectParameters=new QueryWhereSelectParameters();
	    $queryWhereSelectParameters->setInitialQuery("");
	    $queryWhereSelectParameters->setFinalQuery($sFinal);
	    
	    try	{
	        $perfilCampoLogic->getEntitiesWithQuerySelectWithConnection($sSelect, $queryWhereSelectParameters);
	        
	        if($perfilCampoLogic->getperfil_campos()!=null) {
	            
	            foreach($perfilCampoLogic->getperfil_campos() as $perfilcampo)	{
	                $perfilCamposDeUsuario[]=$perfilcampo;
	                //break;
	            }
	        }
	    } catch(Exception $e) {
	        throw $e;
	    }
	    
	    return $perfilCamposDeUsuario;
	}
	
	public function validarCargarSesionUsuarioActualWithConnection(int $bigIdOpcion,usuario $usuarioActual,string $strTipoUsuarioAuxiliarAlumno,resumen_usuario $resumenUsuarioActual,int $idSistemaActual,string $strNombreClase,array $arrNombresClasesRelacionadas) : sistema_param_return {
	    try {
	        return $this->validarCargarSesionUsuarioActualBase($bigIdOpcion,$usuarioActual,$strTipoUsuarioAuxiliarAlumno,$resumenUsuarioActual,$idSistemaActual,$strNombreClase,$arrNombresClasesRelacionadas,true);
	        
	    }  catch(Exception $e) {
	        
	        Funciones::logShowExceptionMessages($e);
	        throw $e;
	    }
	}
	
	public function validarCargarSesionUsuarioActual(int $bigIdOpcion,usuario $usuarioActual,string $strTipoUsuarioAuxiliarAlumno,resumen_usuario $resumenUsuarioActual,int $idSistemaActual,string $strNombreClase,array $arrNombresClasesRelacionadas) : sistema_param_return {
	    try {
	        return $this->validarCargarSesionUsuarioActualBase($bigIdOpcion,$usuarioActual,$strTipoUsuarioAuxiliarAlumno,$resumenUsuarioActual,$idSistemaActual,$strNombreClase,$arrNombresClasesRelacionadas,false);
	        
	    }  catch(Exception $e) {
	        
	        Funciones::logShowExceptionMessages($e);
	        throw $e;
	    }
	}
	
	public function validarCargarSesionUsuarioActualBase(int $bigIdOpcion,usuario $usuarioActual,string $strTipoUsuarioAuxiliarAlumno,resumen_usuario $resumenUsuarioActual,int $idSistemaActual,string $strNombreClase,array $arrNombresClasesRelacionadas,bool $conWithConnection) : sistema_param_return {
	    try {
	        
	        if($conWithConnection) {
	            $this->connexion=Connexion::getNewConnexion();
	        }
	        
	        $sistemaReturnGeneral=new sistema_param_return();
	        
	        $perfilOpcionUsuario=new perfil_opcion();
	        $arrClasesRelacionadasAcceso=array();
	        
	        $usuarioLogic=new usuario_logic();
	        $resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
	        $opcionLogic=new opcion_logic();
	        
	        $usuarioLogic->setConnexion($this->connexion);
	        $resumenUsuarioLogicAdditional->setConnexion($this->connexion);
	        $opcionLogic->setConnexion($this->connexion);
	        
	        //USUARIO_DEFECTO
	        if($strTipoUsuarioAuxiliarAlumno!=null && $strTipoUsuarioAuxiliarAlumno!='none' && $strTipoUsuarioAuxiliarAlumno!='undefined') {
	            
	            $idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarAlumno);
	            
	            $usuarioLogic->getEntity($idUsuarioAutomatico);
	            
	            $sistemaReturnGeneral->setUsuarioActual($usuarioLogic->getUsuario());
	            
	            $usuarioActual=$usuarioLogic->getUsuario();
	        }
	        //USUARIO_DEFECTO
	        
	        
	        if($usuarioActual==null || ($usuarioActual!=null && $usuarioActual->getId()<0)) {
	            throw new Exception("Reinicie la sesion");
	        } else {
	            $sistemaReturnGeneral->setUsuarioActual($usuarioActual);
	        }
	        
	        
	        //VALIDAR RESUMEN USUARIO
	        $validar_resumen_usuario=true;
	        $validar_resumen_usuario=$resumenUsuarioLogicAdditional->validarResumenUsuarioController($usuarioActual,$resumenUsuarioActual);
	        $sistemaReturnGeneral->setvalidar_resumen_usuario($validar_resumen_usuario);
	        
	        
	        //TIENE PERMISOS PAGINA WEB
	        $tiene_permisos_paginaweb=true;
	        $tiene_permisos_paginaweb=$this->tienePermisosEnPaginaWeb($usuarioActual, $idSistemaActual, $strNombreClase,$bigIdOpcion,false,false);
	        $sistemaReturnGeneral->settiene_permisos_paginaweb($tiene_permisos_paginaweb);
	        
	        
	        
	        //PERFIL OPCION USUARIO
	        $perfilOpcionUsuario=$this->traerPermisosPaginaWebPerfilOpcion($usuarioActual, $idSistemaActual, $strNombreClase,$bigIdOpcion,false,false);
	        $sistemaReturnGeneral->setPerfilOpcionUsuario($perfilOpcionUsuario);
	        
	        
	        //OPCION
	        $opcionLogic->getEntity($bigIdOpcion);
	        
	        if($opcionLogic->getopcion()!=null) {
	            $sistemaReturnGeneral->setOpcionActual($opcionLogic->getopcion());
	        }
	        
	        
	        //ACCIONES DE USUARIO
	        $sistemaReturnGeneral->setAccionesUsuario($this->traerAccionesPaginaWebPerfilOpcion($usuarioActual,$perfilOpcionUsuario->getid_opcion(),false));
	        
	        //PERMISOS RELACIONADAS
	        foreach($arrNombresClasesRelacionadas as $strNombreClaseLocal) {
	            if($this->tienePermisosEnPaginaWeb($usuarioActual, $idSistemaActual, $strNombreClaseLocal,$bigIdOpcion,false,true)) {
	                $arrClasesRelacionadasAcceso[]=$strNombreClaseLocal;
	            }
	            
	        }
	        
	        $sistemaReturnGeneral->setArrClasesRelacionadasAcceso($arrClasesRelacionadasAcceso);
	        
	        
	        if($conWithConnection) {
	            $this->connexion->getConnection()->commit();
	            $this->connexion->getConnection()->close();
	        }
	        
	        return $sistemaReturnGeneral;
	        
	    }  catch(Exception $e) {
	        
	        if($conWithConnection) {
	            $this->connexion->getConnection()->rollback();
	            $this->connexion->getConnection()->close();
	        }
	        
	        Funciones::logShowExceptionMessages($e);
	        throw $e;
	    }
	}
	
	
	public function traerAccionesPaginaWebPerfilOpcion(usuario $usuario,int $lIdOpcion,bool $conConnexion=false) : array {
	    $accionLogic=new accion_logic();
	    $accionesDeUsuario=array();
	    
	    $perfilUsuarioLogic=new perfil_usuario_logic();
	    
	    if($conConnexion) {
	        $perfilUsuarioLogic->getsFK_IdUsuarioWithConnection("",new Pagination(), $usuario->getId());
	    } else {
	        $perfilUsuarioLogic->setConnexion($this->getConnexion());
	        
	        $perfilUsuarioLogic->getsFK_IdUsuario("",new Pagination(), $usuario->getId());
	    }
	    
	    $sPerfiles='';
	    $esPrimero=true;
	    
	    foreach($perfilUsuarioLogic->getperfil_usuarios() as $perfilusuario )	{
	        if($esPrimero) {
	            $esPrimero=false;
	        } else {
	            $sPerfiles.=',';
	        }
	        
	        $sPerfiles.=$perfilusuario->getid_perfil();
	    }
	    
	    $sSelect=" select distinct accion.id,accion.updated_at,accion.id_opcion,accion.codigo, accion.nombre,accion.descripcion,accion.estado";
	    $sSelect.=" from ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".accion_data::$TABLE_NAME." accion ";
	    
	    $sFinal="  inner join ".Constantes::$STR_PREFIJO_SCHEMA.Constantes::$STR_SCHEMA_SEGURIDAD.".".perfil_accion_data::$TABLE_NAME." perfilaccion on perfilaccion.id_accion=accion.id where accion.estado=1 and accion.id_opcion=".$lIdOpcion;
	    $sFinal.=" and perfilaccion.id_perfil in (".$sPerfiles.") ";
	    $sFinal.=" and perfilaccion.estado=1 ";
	    
	    
	    
	    
	    $queryWhereSelectParameters=new QueryWhereSelectParameters();
	    $queryWhereSelectParameters->setInitialQuery("");
	    $queryWhereSelectParameters->setFinalQuery($sFinal);
	    
	    try	{
	        
	        if($conConnexion) {
	            $accionLogic->getEntitiesWithQuerySelectWithConnection($sSelect, $queryWhereSelectParameters);
	        } else {
	            $accionLogic->setConnexion($this->getConnexion());
	            
	            $accionLogic->getEntitiesWithQuerySelect($sSelect, $queryWhereSelectParameters);
	        }
	        
	        if($accionLogic->getAccions()!=null) {
	            
	            foreach($accionLogic->getAccions() as $accion)	{
	                $accionesDeUsuario[]=$accion;
	            }
	        }
	    } catch(Exception $e) {
	        throw $e;
	    }
	    
	    return $accionesDeUsuario;
	}
	
	public function getTablasDatosinicializar() : array {
	    $arrTablas=array();
	    
	    
	    $arrTablas[]='s05consup_detalle_grupo_revelacion';
	    $arrTablas[]='s05consup_grupo_revelacion';
	    
	    $arrTablas[]='s05ccost_existencia_inventario';
	    
	    $arrTablas[]='s05ccost_formulas_costos';
	    
	    $arrTablas[]='s05ccost_formulas_costos_con_totales';
	    
	    $arrTablas[]='s05ccost_factura_detalle_costos';
	    
	    $arrTablas[]='s05ccost_costos_distribucion';
	    $arrTablas[]='s05ccost_departamentos_distribucion';
	    $arrTablas[]='s05ccost_grupo_distribucion';
	    
	    $arrTablas[]='s05audit_detalle_cuestionario';
	    $arrTablas[]='s05audit_grupo_cuestionario';
	    
	    $arrTablas[]='s05audit_detalle_programa';
	    $arrTablas[]='s05audit_grupo_programa';
	    
	    $arrTablas[]='s05mfin_anualidad_general';
	    
	    $arrTablas[]='s05mfin_anualidad_renta_pago';
	    
	    $arrTablas[]='s05mfin_anualidad_gradientes';
	    
	    $arrTablas[]='s05mfin_tasas_efectivas';
	    
	    $arrTablas[]='s05mfin_tasas_efectivas_puras';
	    
	    $arrTablas[]='s05mfin_ecuasion_anualidad';
	    $arrTablas[]='s05mfin_grupo_ecuasion_anualidad';
	    
	    $arrTablas[]='s05mfin_interpolacion_lineal';
	    
	    $arrTablas[]='s05mfin_valor_actual_neto';
	    $arrTablas[]='s05mfin_grupo_valor_actual_neto';
	    
	    $arrTablas[]='s05mfin_tasa_interes_real';
	    
	    $arrTablas[]='s05mfin_relacion_beneficio_costo';
	    
	    $arrTablas[]='s05mfin_tasa_minima_aceptable';
	    
	    $arrTablas[]='s05mfin_tasa_minima_aceptable_detalle';
	    $arrTablas[]='s05mfin_grupo_tasa_minima_aceptable';
	    
	    $arrTablas[]='s05mfin_precio_bono';
	    
	    $arrTablas[]='s05inope_alternativa_decision';
	    $arrTablas[]='s05inope_grupo_decision';
	    
	    $arrTablas[]='s05inope_funcion_optimizacion';
	    $arrTablas[]='s05inope_grupo_optimizacion';
	    
	    $arrTablas[]='s05inope_control_inventario';
	    
	    $arrTablas[]='s05inope_actividad_redes_pert';
	    $arrTablas[]='s05inope_grupo_redes_pert';
	    
	    $arrTablas[]='s04conta_depreciacion_global';
	    
	    $arrTablas[]='s04conta_detalle_depreciacion_produccion';
	    $arrTablas[]='s04conta_grupo_depreciacion_produccion';
	    
	    $arrTablas[]='s04mfin_interes_simple';
	    
	    $arrTablas[]='s04mfin_interes_compuesto';
	    
	    $arrTablas[]='s04mfin_progresion_aritmetica';
	    
	    $arrTablas[]='s04mfin_progresion_geometrica';
	    
	    $arrTablas[]='s04mfin_tabla_financiera_simple';
	    
	    $arrTablas[]='s04mfin_depreciacion_compuesto';
	    
	    $arrTablas[]='s04mfin_ecuasion_simple_compuesto';
	    $arrTablas[]='s04mfin_grupo_ecuasion_simple_compuesto';
	    
	    $arrTablas[]='s04mfin_factura_porcentaje';
	    
	    $arrTablas[]='s04coex_detalle_articulo_tributo';
	    $arrTablas[]='s04coex_grupo_articulo_tributo';
	    
	    $arrTablas[]='s04coex_detalle_categoria_courier';
	    $arrTablas[]='s04coex_grupo_categoria_courier';
	    
	    
	    $arrTablas[]='s03conta_detalle_estado_cuenta';
	    $arrTablas[]='s03conta_grupo_estado_cuenta';
	    
	    $arrTablas[]='s03conta_detalle_participacion_utilidad';
	    $arrTablas[]='s03conta_grupo_participacion_utilidad';
	    
	    $arrTablas[]='s03conta_detalle_arqueo_caja';
	    $arrTablas[]='s03conta_grupo_arqueo_caja';
	    
	    $arrTablas[]='s03conta_detalle_mayor_banco';
	    $arrTablas[]='s03conta_grupo_mayor_banco';
	    
	    $arrTablas[]='s03labo_detalle_liquidacion';
	    $arrTablas[]='s03labo_grupo_liquidacion';
	    
	    $arrTablas[]='s02conta_detalle_estado_patrimonio';
	    $arrTablas[]='s02conta_grupo_estado_patrimonio';
	    
	    $arrTablas[]='s01con_ecuacion_contable_resumen';
	    $arrTablas[]='s01con_grupo_ecuacion_contable_resumen';
	    
	    $arrTablas[]='s01mate1_funcion_cuadratica';
	    $arrTablas[]='s01mate1_funcion_lineal';
	    $arrTablas[]='s01mate1_grupo_funcion';
	    
	    $arrTablas[]='s01con_utilidad_ejercicio_simple';
	    
	    $arrTablas[]='s01con_depreciar_activos_fijos';
	    $arrTablas[]='s01con_grupo_depreciar_activos_fijos';
	    
	    $arrTablas[]='s01con_detalle_cuenta_contable_comercial';
	    $arrTablas[]='s01con_cuenta_contable_comercial';
	    $arrTablas[]='s01con_grupo_detalle_cuenta_contable_comercial';
	    
	    $arrTablas[]='s01con_detalle_kardex';
	    $arrTablas[]='s01con_detalle_kardex_costo';
	    $arrTablas[]='s01con_detalle_kardex_factura';
	    $arrTablas[]='s01con_producto_kardex';
	    $arrTablas[]='s01con_grupo_detalle_kardex';
	    
	    
	    $arrTablas[]='s01con_rol_pago_simple';
	    $arrTablas[]='s01con_grupo_rol_pago_simple';
	    
	    $arrTablas[]='s01con_provision_beneficio_social_simple';
	    $arrTablas[]='s01con_grupo_provision_beneficio_social_simple';
	    
	    $arrTablas[]='s01con_impuesto_renta_resumen';
	    $arrTablas[]='s01con_grupo_impuesto_renta_resumen';
	    
	    $arrTablas[]='s01con_ecuacion_contable_simple';
	    
	    $arrTablas[]='s01con_ecuacion_contable_resumen';
	    $arrTablas[]='s01con_grupo_ecuacion_contable_resumen';
	    
	    $arrTablas[]='s01con_detalle_cuenta_contable_base';
	    $arrTablas[]='s01con_grupo_detalle_cuenta_contable_base';
	    
	    $arrTablas[]='s01con_detalle_cuenta_contable01';
	    $arrTablas[]='s01con_cuenta_contable_sucursal01';
	    $arrTablas[]='s01con_cuenta_contable01';
	    $arrTablas[]='s01con_grupo_detalle_cuenta_contable01';
	    
	    $arrTablas[]='gen_nota_sau';
	    
	    $arrTablas[]='gen_nota_modalidad';
	    
	    /*
	     $arrTablas[]='';
	     $arrTablas[]='';
	     $arrTablas[]='';
	     */
	    
	    return $arrTablas;
	}
}
?>