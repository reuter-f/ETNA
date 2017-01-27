#!/usr/bin/env php
<?php
// main.php for MicroShell in /home/faustine/Documents/PHP/MicroShell
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Thu Oct 13 00:07:46 2016 REUTER Faustine
// Last update Fri Oct 14 08:57:51 2016 REUTER Faustine
//

require_once("commands_a.php");
require_once("cut.php");

$my_env = $_SERVER;
unset($my_env["argc"]);
unset($my_env["argv"]);
$q = 1;
$i = 0;
$command = null;
$tab_arg[] = null;
del_tab($tab_arg);
    $prompt = fopen("php://stdin", "r");
if ($prompt !== false)
  {
    while ($q === 1 && ($parl = a_vous() === 0))
      {
	$ordre = fgets($prompt);
	if ($ordre === false)
	  {
	    echo "ERROR: Couldn't load environnement\n";
	    return 0;
	  }
	if ($ordre !== "\n")
	  {
	    cut_ordre($ordre, $command, $tab_arg);
	    if ($command !== null)
	      {
		if ($command == "exit")
		  $q = 0;
		elseif ($command !== "exit")
		  {
		    $exist = check_command($command);
		    if ($exist === 0)
		      echo "$command: Command not found\n";
		    else
		      do_command($command, $tab_arg);
		  }
		$command = null;
		del_tab($tab_arg);
	      }
	  }
      }
  }

function a_vous()
{
  echo "$> ";
  return (0);
}

function check_command($command)
{
  $ok = 0;
  $i = 0;
  $tab = ["echo", "cat", "pwd", "cd", "ls", "env", "setenv", "unsetenv"];
  while ($i < count($tab))
    {
      if ($tab[$i] == $command)
	$ok = 1;
      $i = $i + 1;
    }
  return ($ok);
}

function tab_arg(&$tab_arg, $arg)
{
  $i = 0;
  $y = 0;
  $tmp = null;
  while ($i < strlen($arg))
    {
      while ($i < strlen($arg) && $arg[$i] != " ")
	{
	  $tmp = $tmp . $arg[$i];
	  $i = $i + 1;
	}
      $tab_arg[$y] = $tmp;
      $tmp = null;
      $i = $i + 1;
      $y = $y + 1;
    }
}

function del_tab(&$tab_arg)
{
  $i = 0;
  while (count($tab_arg) != 0)
    {
      unset($tab_arg[$i]);
      $i = $i + 1;
    }
}