 <?php
 require_once 'php-activerecord/ActiveRecord.php';
 
// initialize ActiveRecord
// change the connection settings to whatever is appropriate for your mysql server 
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory($_SERVER['DOCUMENT_ROOT'].'/PDC_PLUS/Model/');
    $cfg->set_connections(array('development' => 'mysql://root:@localhost/pdcplus'));
   
});

 ?>
