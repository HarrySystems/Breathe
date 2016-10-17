<?php
	Abstract Class Exhale
	{
		function in()
		{
			//disable apache compressed
				header('Content-Encoding: none;');
				
			if 	(
					!preg_match(
						"/MSIE ([0-9]{1,}[\.0-9]{0,})/",
						$_SERVER['HTTP_USER_AGENT'], 
						$version
					)
				)
				ob_end_flush();
				
			ob_start();
		}
		
		function out()
		{
			if(ob_get_length() > 0)
			{
				// completes buffer when it's not empty
					echo str_repeat(" ", 1024 * 8);

				// flushes buffer
					ob_flush();
					flush();
			}
		}
	}
