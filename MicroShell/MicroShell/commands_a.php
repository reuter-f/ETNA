<?php
// commands.php for MicroShell in /home/faustine/Documents/PHP/MicroShell
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Wed Oct 12 23:59:36 2016 REUTER Faustine
// Last update Fri Oct 14 08:27:51 2016 REUTER Faustine
//

require_once("commands_b.php");
require_once("commands_c.php");

// Redirige vers la fonction correspondante
function do_command($command, $tab_arg = null)
{
  $i = 0;
  global $echo, $cat, $pwd, $cd, $ls, $env, $setenv, $unsetenv;
  $tab = ["echo", "cat", "pwd", "cd", "ls", "env", "setenv", "unsetenv"];
  
  $func = [$echo, $cat, $pwd, $cd, $ls, $env, $setenv, $unsetenv];
  while ($command != $tab[$i])
      $i = $i + 1;
  $func[$i]($tab_arg);  
}

// ECHO
$echo = function($tab_arg)
{
  $i = 0;
  while ($i < count($tab_arg))
    {
      echo $tab_arg[$i];
      if ($i < count($tab_arg) - 1)
	echo " ";
      $i = $i + 1;
    }
  echo "\n";
};

// CAT
$cat = function($tab_arg)
{
  $i = 0;
  while ($i < count($tab_arg))
    {
      if (file_exists($tab_arg[$i]) == false)
	echo "cat: $tab_arg[$i]: No such file or directory\n";
      elseif (file_exists($tab_arg[$i]) == true)
	{
	  if (is_dir($tab_arg[$i]) == true)
	    echo "cat: $tab_arg[$i]: Is a directory\n";
	  elseif (is_dir($tab_arg[$i]) == false)
	    {
	      if(is_readable($tab_arg[$i]) == false)
		echo "cat: $tab_arg[$i]: Permission denied\n";
	      elseif (is_readable($tab_arg[$i]) == true)
		cat_piece($tab_arg, $i);
	      else
		echo "cat: $tab_arg[$i]: Cannot open file\n";
	    }
	  else
	    echo "cat: $tab_arg[$i]: Cannot open file\n";
	}
      else
	echo "cat: $tab_arg[$i]: Cannot open file\n";
      $i = $i + 1;
    }
};

// CAT - suite
function cat_piece($tab_arg, $i)
{
  $file = fopen($tab_arg[$i], "r");
  $size = filesize($tab_arg[$i]);
  $test = fread($file, $size);
  echo "$test\n";
  fclose($file);
}

//PWD
$pwd = function($tab_arg)
{
  $chemin = getcwd();
  echo "$chemin\n";
};

