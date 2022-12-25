<?php
    error_reporting(0);
    require("user.php"); 
  
    $u = new user();
    $u->isSession();

    $seachMethod = $_POST['searchMethodSelect'];
    $seachText = $_POST['seachText'];
    $seachText = str_replace(' ', '+', $seachText);

    $ch = curl_init();

    //curl_setopt($ch, CURLOPT_URL, "https://openlibrary.org/search/authors.json?q=$seachText");

    curl_setopt($ch, CURLOPT_URL, "https://openlibrary.org/search.json?q=$seachText");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = array();
    //$headers[] = "X-Authentication-Token: $apiKey";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute the request and parse the response
    $response = curl_exec($ch);
    $result = json_decode($response, true);

    $html = "";
    $i = 1;
    
    foreach ($result['docs'] as $doc) {
        $cols = array($i,$doc['title'],$doc['author_name'][0],$doc['publisher'][0],$doc['publish_year'][0]);
        $html .= '<div class="row">';
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