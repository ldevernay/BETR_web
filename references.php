<?php
// $path = "\home\laurentdev\git_repo\BETR";
$path = "/home/laurentdev/git_repo/BETR/img";
foreach (new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::KEY_AS_PATHNAME), RecursiveIteratorIterator::CHILD_FIRST) as $file => $info) {
    if ($info->isDir())
    {
      echo $file."<br />";
    } else {
      echo $file."<br />";
      $path_parts = pathinfo($file);
      echo $path_parts['extension']."<br />";
      $ext = $path_parts['extension'];
      if ($ext == 'jpg' || $ext == 'JPG'){
        $arr = explode('BETR/', $file);
        echo "<img src='".$arr[1]."'/>";
      }
    }
  }

  ?>
