<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\templating;

class Template {
    
    private string $path='';
    private array $vars = array();
    
    public function __construct(string $path) {
        $this->path = $path;
    }
    
    public function __set($key, $val) {
        $this->vars[$key] = $val;
    }
    
    public function __get($key) {
        return (isset($this->vars[$key])) ? $this->vars[$key] : null;
    }
    
    public function render_html():string {
        $html='';
        //start output buffering (so we can return the content)
        ob_start();        

        //bring all variables into "local" variables using "variable variable names"
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        
        //include view
        
        include($this->path);
        
        $html = ob_get_contents();//get teh entire view.
        
        ob_end_clean();//stop output buffering
        
        return $html;
    }                   

/*
$template = new Template('user_template.php');
$template->codigo = 'C001';
$template->nombre = "Luis";

echo $template->render_html(); 
*/

}

?>