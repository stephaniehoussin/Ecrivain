<?php
function autoload($classname)
{
	if(file_exists($file = 'controller/' . $classname . '.php'))
	{
			require $file;
	}
	elseif(file_exists($file = 'model/' . $classname . '.php'))
	{
		 require $file;
	}
	elseif(file_exists($file = 'view/' . $classname . '.php'))
	{
		 require $file;
	}
  elseif(file_exists($file = '' . $classname . '.php'))
  {
		 require $file;
	}
}
spl_autoload_register('autoload');
