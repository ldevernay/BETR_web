<?php
// // $path = "\home\laurentdev\git_repo\BETR";
$path = "/home/laurentdev/git_repo/BETR/img";
$domains = [];
$new_domain = false;

foreach (new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::KEY_AS_PATHNAME), RecursiveIteratorIterator::CHILD_FIRST) as $file => $info) {
    if (!$info->isDir())
    {
      $path_parts = pathinfo($file);
      $ext = $path_parts['extension'];
      if ($ext == 'jpg' || $ext == 'JPG'){

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

          // echo $domain." : ".$client."<br/>";

          if (!array_key_exists($domain, $domains)){
            if(count($domains) !== 0){
              closeClientCard();
              closeDomainCard();
            }
            $domains[$domain] = array();
            constructDomainCard($domain, sizeof($domains));
            $new_domain = true;
          } else {
            $new_domain = false;
          }

          if (preg_match($regex, $client) && !in_array($client, $domains[$domain])){
            if (!$new_domain){
              closeClientCard();
            }

            array_push($domains[$domain], $client);
            constructClientCard($client);
          }
          // var_dump($domains);
        }

      }
      $arr = explode('BETR/', $file);
      addImage($arr[1]);
    }
    }
  }
  echo '</div></div>';

function constructDomainCard($domain, $num){
  echo '<div class="panel-group" id="accordion">
    <div class="panel panel-default" id="panel'.$num.'">
        <div class="panel-heading">
             <h4 class="panel-title">
        <a data-toggle="collapse" data-target="#collapse'.$num.'"
           href="#collapse'.$num.'">'.$domain.'
        </a>
      </h4>

        </div>
        <div id="collapse'.$num.'" class="panel-collapse collapse">
            <div class="panel-body">';
}

  function constructClientCard($client){
    echo '<div class="row"><div class="caption">
        <h3>'.$client.'</h3>
        <p>Descriptif de la mission</p>
        </div>';
  }

// TODO : ajouter le calcul auto des balises "alt"
  function addImage($image){
    echo '<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    <img src="'.$image.'">
    </div>
    </div>';
  }

  function closeClientCard(){
    echo '
    </div>
    <hr/>
    <div class="clearfix"></div>';
  }

function closeDomainCard(){
  echo '</div>
  </div>
  </div>
  </div>';
}





  ?>
