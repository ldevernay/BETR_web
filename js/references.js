$(document).ready(
 function()
 {
   $.ajax( {
            type: "GET",
            url: "../references.xml",
            dataType: "xml",
            success: function(xml)
                     {
                       $(xml).find('reference').each(
                         function()
                         {
                            var id = $(this).attr('id');
                            var title = $(this).find('titre').text();
                            var mission = $(this).find('mission').text();
                            var production = $(this).find('production').text();
                            var montant = $(this).find('montant').text();
                            var detail = $(this).find('detail').text();
                            var statut = $(this).find('statut').text();
                            var img = $(this).find('img').text();

                             var result='';

                             result += '<div class="col-md-4">';
                             if (img !== null){
                               result += '<div class="thumbnail"><a href="' + img + '"><img src="' + img + '" alt="Nature" style="width:100%">';
                               result += '<div class="caption"><p>' + title + '</p></div></a></div></div>';
                             } else {
                               result += '<div class="caption"><p>' + title + '</p></div></a></div></div>';
                             }

                             /*
                             <div class="col-md-4">
                               <div class="thumbnail">
                                 <a href="images/IMG_1184.JPG">
                                   <img src="images/IMG_1184.JPG" alt="Nature" style="width:100%">
                                   <div class="caption">
                                     <p>Lorem ipsum...</p>
                                   </div>
                                 </a>
                               </div>
                             </div>
                             */
                             $("div.secteur_test").html(result);

                          });
                      }
        });
  }
);
