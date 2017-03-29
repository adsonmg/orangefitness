<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Upload component
 */
class UploadComponent extends Component
{

    public $max_files = 1;

    /**
     * source: https://bitbucket.org/luisfredgs/cakephp-3-upload/src/e90e7e421e3227bd704bfc0a5b17ea9951755251?at=master
     * @param type $data
     * @throws InternalErrorException
     */
    public function send( $data )
    {
    	if ( !empty( $data ) ) {
            
    		if ( count( $data ) > $this->max_files ) {
    			throw new InternalErrorException("Error Processing Request. Max number files accepted is {$this->max_files}", 1);
    		}

                $data = $data[0];
                
                
                $filename = $data['name'];
                $file_tmp_name = $data['tmp_name'];
                $dir = WWW_ROOT.'img'.DS.'profile_pictures';
                $this->check_dir($dir);
                $allowed = array('png', 'jpg', 'jpeg');
                $type = explode('/',$data['type']);
                if ( !in_array( substr( strrchr( $filename , '.') , 1 ) , $allowed) ) {
                        throw new InternalErrorException("Error Processing Request.", 1);		
                }elseif( is_uploaded_file( $file_tmp_name ) ){
                        $filename_saved = Text::uuid().'.'.$type[1];
                        move_uploaded_file($file_tmp_name, $dir.DS.$filename_saved);
                        return $filename_saved;
                }
    		
    	}
    }
    
     /**
     * Verifica se o diretório existe, se não ele cria.
     * @access public
     * @param Array $imagem
     * @param String $data
    */ 
    public function check_dir($dir)
    {
        $folder = new Folder();
        if (!is_dir($dir)){
            $folder->create($dir);
        }
    }
}