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

namespace com\bydan\contabilidad\seguridad\sistema\util;

/*
use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\PaqueteTipo;
*/

use com\bydan\framework\contabilidad\business\entity\GeneralEntityReturnGeneral;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;

class sistema_param_return_add  extends GeneralEntityReturnGeneral {		
	
    public ?usuario $usuarioActual=null;
    public ?opcion $opcionActual=null;
    public bool $validar_resumen_usuario=true;
    public bool $tiene_permisos_paginaweb=true;
    public ?perfil_opcion $perfilOpcionUsuario=null;
    public ?array $arrClasesRelacionadasAcceso=null;
    public ?array $accionesUsuario=null;
    
	function __construct() {
	    parent::__construct();
	    
	    $this->usuarioActual=new usuario();
	    $this->opcionActual=new opcion();
	    $this->validar_resumen_usuario=true;
	    $this->tiene_permisos_paginaweb=true;
	    $this->perfilOpcionUsuario=new perfil_opcion();
	    $this->arrClasesRelacionadasAcceso=array();
	    $this->accionesUsuario=array();
    } 
	
    public function getUsuarioActual(): ?usuario {
        return $this->usuarioActual;
    }
    
    public function setUsuarioActual(?usuario $usuarioActual) {
        $this->usuarioActual = $usuarioActual;
    }
    
    public function getOpcionActual():?opcion {
        return $this->opcionActual;
    }
    
    public function setOpcionActual(?opcion $opcionActual) {
        $this->opcionActual = $opcionActual;
    }
    
    public function getvalidar_resumen_usuario():bool {
        return $this->validar_resumen_usuario;
    }
    
    public function setvalidar_resumen_usuario(bool $validar_resumen_usuario) {
        $this->validar_resumen_usuario = $validar_resumen_usuario;
    }
    
    public function gettiene_permisos_paginaweb():bool {
        return $this->tiene_permisos_paginaweb;
    }
    
    public function settiene_permisos_paginaweb(bool $tiene_permisos_paginaweb) {
        $this->tiene_permisos_paginaweb = $tiene_permisos_paginaweb;
    }
    
    public function getPerfilOpcionUsuario():?perfil_opcion {
        return $this->perfilOpcionUsuario;
    }
    
    public function setPerfilOpcionUsuario(?perfil_opcion $perfilOpcionUsuario) {
        $this->perfilOpcionUsuario = $perfilOpcionUsuario;
    }
    //arrClasesRelacionadasAcceso
    
    public function getArrClasesRelacionadasAcceso():?array {
        return $this->arrClasesRelacionadasAcceso;
    }
    
    public function setArrClasesRelacionadasAcceso(?array $arrClasesRelacionadasAcceso) {
        $this->arrClasesRelacionadasAcceso = $arrClasesRelacionadasAcceso;
    }
    
    public function getAccionesUsuario():?array {
        return $this->accionesUsuario;
    }
    
    public function setAccionesUsuario(?array $accionesUsuario) {
        $this->accionesUsuario = $accionesUsuario;
    }
}
?>