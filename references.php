<?php
// $path = "\home\laurentdev\git_repo\BETR";
$path = "/home/laurentdev/git_repo/BETR/img";
$domains = [];
foreach (new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::KEY_AS_PATHNAME), RecursiveIteratorIterator::CHILD_FIRST) as $file => $info) {
    if ($info->isDir())
    {
      // echo $file."<br />";
      $dir = explode('img/', $file);
      if ($dir[1] != null){
        //  echo $dir[1]."<br/>";
        $subdir = explode('/', $dir[1]);
        // echo $subdir[0]." : ".$subdir[1]."<br/>";
        $domain = $subdir[0];
        $client = $subdir[1];
        $regex = '/^[a-z]/i';

        if (preg_match($regex, $domain)){

          echo $domain." : ".$client."<br/>";

          if (!array_key_exists($domain, $domains)){
            $domains[$domain] = array();
          }

          if (preg_match($regex, $client) && !in_array($client, $domains[$domain])){
            echo "toto";
            array_push($domains[$domain], $client);
          }
          var_dump($domains);
        }
      }
    } else {
      // $path_parts = pathinfo($file);
      // $ext = $path_parts['extension'];
      // if ($ext == 'jpg' || $ext == 'JPG'){
      //   $arr = explode('BETR/', $file);
      //   constructCard($arr[1]);
      // }
    }
  }

  function constructCard($path_img){
    echo '<div class="row">
    <div class="col-md-4">

    <div class="thumbnail">
    <img src="'.$path_img.'" alt="Lights" style="width:100%">

    <div class="caption">
    <div class="panel-group" id="accordion1-1" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">

    <div class="panel-heading" role="tab" id="heading1-1">
    <h4 class="panel-title">
    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1-1" href="#collapse1-1" aria-expanded="false" aria-controls="collapse2-1">
    Reference title
    </a>
    </h4>
    </div>

    <div id="collapse1-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1-1">
    <div class="panel-body">
    Reference text
    </div>
    </div>
    </div>
    </div>
    </div>

    </a>
    </div>
    </div>';
  }
  ?>
