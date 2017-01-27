<?php
// command_c.php for MicroShell in /home/faustine/Documents/PHP/MicroShell
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Fri Oct 14 06:49:55 2016 REUTER Faustine
// Last update Fri Oct 14 08:29:48 2016 REUTER Faustine
//

// ENV
$env = function($tab_arg)
{
  global $my_env;
  foreach ($my_env as $key => $value)
    {
      echo $key . "=" . $value . "\n";
    }
};

// SETENV
$setenv = function($tab_arg)
{
  global $my_env;
  if (count($tab_arg) == 2)
    {
      $my_env[$tab_arg[0]] = $tab_arg[1];
    }
  else
    echo "setenv: Invalid arguments\n";
};

// UNSETENV
$unsetenv = function($tab_arg)
{
  global $my_env;
  if (count($tab_arg) == 1)
    {
      unset($my_env["$tab_arg[0]"]);
    }
  else
    echo "unsetenv: Invalid arguments\n";
  
};