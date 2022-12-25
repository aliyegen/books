<?php
    error_reporting(0);//php display errors turn off
    require("user.php"); 
    $u = new user();
    $u->isSession();
    //search data
    $seachText = $_POST['seachText'];
    $seachText = str_replace(' ', '+', $seachText); //replace space characters to "+"

    //send request
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "https://openlibrary.org/search.json?q=$seachText");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $headers = array();
    curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

    //execute the request and parse the response
    $response = curl_exec($c);
    $result = json_decode($response, true);

    $html = ""; //for html code export
    $i = 1; //index number
    foreach ($result['docs'] as $doc) {
        //define required cols from response
        $cols = array($i, $doc['seed'][0], $doc['title'],$doc['author_name'][0],$doc['publisher'][0],$doc['publish_year'][0]);
        $cols[1] = str_replace('/books/', '', trim($cols[1]));//remove /books/ from data
        $html .= '<div class="row dataRow" onclick="$.book.detail('.'\''.$cols[1].'\''.')">';
        foreach($cols as $col){
            $html .= '
            <div class="col">
                <div class="m-1 p-1 text-center">'.
                    $col.'
                </div>
            </div>';
        }
        $html .= '</div>';
        $i++;
      }

      echo $html;
?>