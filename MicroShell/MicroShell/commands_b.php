<?php
// commands_b.php for MicroShell in /home/faustine/Documents/PHP/MicroShell
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Fri Oct 14 05:14:36 2016 REUTER Faustine
// Last update Fri Oct 14 06:49:03 2016 REUTER Faustine
//

//CD
$previous = null;
$cd = function($tab_arg)
{
  global $previous;
  if (count($tab_arg) == 0)
    {
      $previous = getcwd();
      chdir("/home");
    }
  elseif ($tab_arg[0] == "-")
    {
      if ($previous == null)
	{
	  echo "No previous path\n";
	  $previous = getcwd();
	}
      else
	{
	  $preprev = $previous;
	  $previous = getcwd();
	  chdir($preprev);
	}
    }
  else
    cd_piece($tab_arg);
};

// CD - suite
function cd_piece($tab_arg)
{
  global $previous;
  if (file_exists($tab_arg[0]) == false)
    echo "cd: $tab_arg[0]: No such file or directory\n";
  else
    {
      if (is_dir($tab_arg[0]) == false)
	echo "cd: $tab_arg[0]: Not a directory\n";
      else
	{
	  if (is_readable($tab_arg[0]) == true && is_writable($tab_arg[0]) == true)
	    {
	      $previous = getcwd();
	      chdir($tab_arg[0]);
	    }
	  else
	    echo "cd: $tab_arg[0]: Permission denied\n";
	}
    }
}

// LS
$ls = function($tab_arg)
{
  if (count($tab_arg) == 0)
    {
      $tab = scandir(getcwd());
      ls_piece($tab);
    }
  else
    {
      if (is_dir($tab_arg[0]) == false)
	echo "ls: $tab_arg[0]: Not a directory\n";
      else
	if (is_readable($tab_arg[0]) == true && is_writable($tab_arg[0]) == true)
	  {
	    echo "tabarg :$tab_arg[0]\n";
	    $tab = scandir($tab_arg[0]);
	    ls_piece($tab);
	  }
	else
	  echo "ls: $tab_arg[0]: Permission denied\n";
    }
};

// LS - suite
function ls_piece($tab)
{
  $i = 0;
  while ($i < count($tab))
    {
      $tmp = substr($tab[$i], - strlen($tab[$i]), 1);
      if ($tmp !== ".")
	{
	  if (is_dir($tab[$i]) == true)
	    echo "$tab[$i]/\n";
	  elseif (is_executable($tab[$i]) == true)
	    echo "$tab[$i]*\n";
	  elseif (is_link($tab[$i]) == true)
	    echo "$tab[$i]@\n";
	  else
	    echo "$tab[$i]\n";
	}
      $i = $i + 1;
    }
}