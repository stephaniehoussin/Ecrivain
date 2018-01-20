<?php
//Essayer de voir pour ne pas détailler controller,model et view et se servir de __DIR__ à la place ? -->
function autoload($classname) {
	if(file_exists($file = 'controller/' . $classname . '.php')) {
		require $file;
	} elseif(file_exists($file = 'model/' . $classname . '.php')) {
		 include_once $file;
	} elseif(file_exists($file = 'view/' . $classname . '.php')) {
		require $file;
	}
  elseif(file_exists($file = '' . $classname . '.php')) {
		require $file;
	}
}
spl_autoload_register('autoload');

// __DIR__ indique le repertoire du fichier courant
/*function autoload($classname)
{
  if(file_exists($file = __DIR__. '/..' .$classname. '.php'))
  {
    require $file;
  }
}
spl_autoload_register('autoload');*/
