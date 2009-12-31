<?php
/**
 * URI class definition.
 *
 * The uri system takes care of the Jump pages which translate slugs => files and provide important details
 * about the individual page, like permissions and layout.
 * Next to that it offers extra functionality for dynamic urls, you won't have to touch the .htaccess file any longer. 
 *
 ** securing is currently kind of buggy
 *    
 * @author zenk0 <thorpion.zenk0@gmail.com>
 * @copyright zenk0, modular gaming, Nov 2008
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @package Modular Gaming
 * @subpackage Core
 * @version 1.0.0
 **/
  Class Uri extends JumpPage
  {
    
    public $URI = array();
    public $page = array();
    /**
	  * Define the slug
    * 
	  * @return null
	  **/
    
    public function build()
    {
      global $_URI;
      
      $_URI = array();
      if($_GET['act'][strlen($_GET['act'])-1] != "/")
      {
        $_GET['act'] .= "/";
      }
      
      //get all the parameters
      $this->URI = explode("/", $_GET['act']);
 
      $i = '0';
      //rebuild the array so we only have usefull info
      foreach ($this->URI as $key => $val)
      {
        if(!empty($val))
        {
          $_URI[$i] = stripinput($val);
          $i++;
        }
      }
      //define the slug
      $_URI['slug'] = stripinput($_URI['0']);
      $this->URI = $_URI;
    }
    
    /**
	  * rebuild the $_URI so it contains the proper names,
	  * if sql is set to true we'll filter it against injections
	  *
    * @param array $info: $name => $inf[type, ($sql)]
	  * @return null
	  **/
    public function name($info)
    {
      global $_URI, $User;
      $i = '1';
      $count = count($_URI);
      
      foreach($info as $key => $name)
      {
        if($count > $i)
        {
          //clean up for sql
        stripinput($this->URI[$i]);
          
        $_URI[$name] = $this->URI[$i];
        $this->URI[$name] = $this->URI[$i];
        
        }
        $i++;
      }
    }
  	
  	function secure($type, $value)
    {
      switch($type)
          {
            case 'empty':
            {
              if(empty($value))
              {
                if($info['check_empty'] == true)
                {
                  $ERRORS[] = "Illegal characters were used in the url."; 
                }
              }
              break;
            }
            case 'username':
            {
              if(preg_match('/^[A-Z0-9_!@#\$%\^&\*\(\)\.-]*$/i', $name) == false)
              {
                 $ERRORS[] = "Illegal characters were used in the url."; 
              }
              break;
            }
            case 'alphanumeric':
            {
              if(preg_match('/^[a-z0-9]+$/i', $name) == false)
              {
                $ERRORS[] = "Illegal characters were used in the url.";
              }
              break;
            }
            case 'numeric':
            {
              if(is_int($name) == false)
              {
                $ERRORS[]= "Illegal characters were used in the url.";
              }
              break;
            }
            case 'text':
            {
              if(preg_match('/^[a-z]+$/i', $name) == false)
              {
                $ERRORS[] = "Illegal characters were used in the url.";
              }
              break;
            }
          }
          $this->error("message", $ERRORS);
    }
    /**
  	* spawn an error, if needed
  	*
  	* @param string $code access|404|403|message
  	* @param array $message contains a list of errors if there are no errors the script won't die.  	
  	* @return null
  	**/
    public function error($code, $message=null){
      global $renderer;
      
      switch($code)
      {
        default:
        {
          $pass = "ok";
        }
        case 'access': 
        {
          //header("HTTP/1.1 403 Forbidden");
          //header("Status: 403 Forbidden");
          $renderer->display('http/no-access.tpl');
          
          break;
        }//no access
        
        case 'banned': 
        {
          //header("HTTP/1.1 403 Forbidden");
          //header("Status: 403 Forbidden");
          $renderer->display('http/403_banned.tpl');
          
          break;
        }//no access
        
        case '404': 
        {
          //header("HTTP/1.0 404 Not Found");
			    //header("Status: 404 Not Found");
			    $renderer->display('http/404.tpl');
          break;
        }//404
        
        case '403': 
        {
          //header("HTTP/1.0 403 Forbidden");
			    //header("Status: 403 Forbidden");
			    $renderer->display('http/403.tpl');
          break;
        }//403
        
        case 'message':
        {
          if(count($message) > 0){
            $renderer->assign("errors", $message);
            print_r($message);
            $renderer->display("layout/deep/header.tpl");
            $renderer->display("meta/error.tpl");
            $renderer->display("layout/deep/footer.tpl");
          }else{
            $pass = "ok";
          }
          break;
        }//message
        
        if($pass != "ok")
        {
          die();
        }
      }
    }
  }
?>