<?php
// cut.php for MicroShell in /home/faustine/Documents/PHP/Project
// 
// Made by REUTER Faustine
// Login   <reuter_f@etna-alternance.net>
// 
// Started on  Fri Oct 14 08:52:32 2016 REUTER Faustine
// Last update Fri Oct 14 09:04:17 2016 REUTER Faustine
//

function cut_ordre($ordre, &$command, &$tab_arg)
{
  $i = 0;
  $arg = null;
  $size = strlen($ordre);
  $ordre = substr($ordre, 0, $size - 1);
  while (strlen($ordre) > 0 && ($ordre[0] == " " || $ordre[0] == "\t" || $ordre[0] == "\""))
    $ordre = substr($ordre, 1);
  while ($i < strlen($ordre) && ord($ordre[$i]) != ord(" ") && ord($ordre[$i])
	 != ord("\t") && ord($ordre[$i]) != ord("\""))
    {
      $command = $command . $ordre[$i];
      $i = $i + 1;
    }
  $ordre = substr($ordre, $i);
  $i = 0;
  while (strlen($ordre) > $i)
    {
      cut_piece($i, $ordre, $arg);
    }
  $size = strlen($arg);
  $arg = substr($arg, 0, $size - 1);
  tab_arg($tab_arg, $arg);
}

function cut_piece($i, &$ordre, &$arg)
{
  while ($ordre[0] == " " || $ordre[0] == "\t" || $ordre[0] == "\"")
    $ordre = substr($ordre, 1);
  while ($i < strlen($ordre) && ord($ordre[$i]) != ord(" ") && ord($ordre[$i])
	 != ord("\t") && ord($ordre[$i]) != ord("\""))
    {
      $arg = $arg . $ordre[$i];
      $i = $i + 1;
    }
  $arg = $arg . " ";
  $ordre = substr($ordre, $i);
  while ($ordre[0] == " " || $ordre[0] == "\t" || $ordre[0] == "\"")
    {
      $ordre = substr($ordre, 1);
      $i = 0;
    }
  if ($i < strlen($ordre) && ord($ordre[$i]) != ord(" ") &&
      (ord($ordre[$i]) < ord("a") || ord($ordre[$i]) > ord("z")))
    $i = $i + 1;
}