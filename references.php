<?php
// // $path = "\home\laurentdev\git_repo\BETR";
$path = "/home/laurentdev/git_repo/BETR/img2";
$domains = [];
$new_domain = false;

foreach (new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::KEY_AS_PATHNAME), RecursiveIteratorIterator::CHILD_FIRST) as $file => $info) {
    if (!$info->isDir())
    {
      // echo $file."<br />";
      $dir = explode('img2/', $file);
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
        $path_parts = pathinfo($file);
        $ext = $path_parts['extension'];
        if ($ext == 'jpg' || $ext == 'JPG'){
          $arr = explode('BETR/', $file);
          addImage($arr[1]);
        }
      }
    }
    // else {
    //   // $path_parts = pathinfo($file);
    //   // $ext = $path_parts['extension'];
    //   // if ($ext == 'jpg' || $ext == 'JPG'){
    //   //   $arr = explode('BETR/', $file);
    //   //   constructCard($arr[1]);
    //   // }
    // }
  }
  echo '</div></div>';

// foreach (new RecursiveIteratorIterator(
//   new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::KEY_AS_PATHNAME), RecursiveIteratorIterator::CHILD_FIRST) as $file => $info) {
//     if (!$info->isDir())
//     {
//       // echo $file."<br />";
//       $dir = explode('img2/', $file);
//       if ($dir[1] != null){
//         //  echo $dir[1]."<br/>";
//         $subdir = explode('/', $dir[1]);
//         // echo $subdir[0]." : ".$subdir[1]."<br/>";
//         $domain = $subdir[0];
//         $client = $subdir[1];
//         $regex = '/^[a-z]/i';
//
//         if (preg_match($regex, $domain)){
//
//           // echo $domain." : ".$client."<br/>";
//
//           if (!array_key_exists($domain, $domains)){
//             if(count($domains) !== 0){
//               closeCard($client);
//               closeGlobalCard();
//             }
//             $domains[$domain] = array();
//             constructGlobalCard($domain);
//             $new_domain = true;
//           } else {
//             $new_domain = false;
//           }
//
//           if (preg_match($regex, $client) && !in_array($client, $domains[$domain])){
//             if (!$new_domain){
//               closeCard($client);
//             }
//
//             array_push($domains[$domain], $client);
//             constructCard();
//           }
//           // var_dump($domains);
//         }
//         $path_parts = pathinfo($file);
//         $ext = $path_parts['extension'];
//         if ($ext == 'jpg' || $ext == 'JPG'){
//           $arr = explode('BETR/', $file);
//           addImage($arr[1]);
//         }
//       }
//     }
//     // else {
//     //   // $path_parts = pathinfo($file);
//     //   // $ext = $path_parts['extension'];
//     //   // if ($ext == 'jpg' || $ext == 'JPG'){
//     //   //   $arr = explode('BETR/', $file);
//     //   //   constructCard($arr[1]);
//     //   // }
//     // }
//   }

//   function constructGlobalCard($domain){
//     // echo "constructGlobalCard";
//     echo '<div class="col-sm-12 text-center">
//
//
//     <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
//     <div class="panel panel-default">
//
//     <div class="panel-heading" role="tab" id="heading1">
//     <h4 class="panel-title">
//     <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="false" aria-controls="collapse2">'.$domain.'
//     </a>
//     </h4>
//     </div>
//
//     <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
//     <div class="panel-body">
//     <div class="row">';
//   }
//   function constructCard(){
//     // echo "constructCard";
//     echo '<div class="col-md-4">
//
//     <div class="thumbnail">';
//   }
//
//   function addImage($image){
//     // echo "addImage";
//     echo '<img src="'.$image.'" alt="Lights" style="width:100%">';
//   }
//
//   function closeCard($client){
//     // echo "closeCard";
//     echo '<div class="caption">
//     <div class="panel-group" id="accordion1-1" role="tablist" aria-multiselectable="true">
//     <div class="panel panel-default">
//
//     <div class="panel-heading" role="tab" id="heading1-1">
//     <h4 class="panel-title">
//     <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1-1" href="#collapse1-1" aria-expanded="false" aria-controls="collapse2-1">'.$client.'</a>
//     </h4>
//     </div>
//
//     <div id="collapse1-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1-1">
//     <div class="panel-body">
//     Mission : En équipe de Maîtrise d’œuvre.
//     Production : 5 jours sur 7 - 2500 repas / jour
//     Montant de l’opération : 4,5 M. €  HT
//     Maître d’ouvrage : CG 69
//     Livrée en 2012.
//     </div>
//     </div>
//     </div>
//     </div>
//     </div>';
//   }
//   function closeGlobalCard(){
//     // echo "closeGlobalCard";
//     echo '
//     </a>
//     </div>
//     </div>
//     </div>
//     </div>
//     </div>
//     </div>
//     </div>
//     </div>';
//   }

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
