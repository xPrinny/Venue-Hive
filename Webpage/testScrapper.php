Test page<br><br>

<?php
    require_once __DIR__.'\vendor\autoload.php';
    use Symfony\Component\DomCrawler\Crawler;

    // Stream creation
    $opts = array(
      'http'=>array(
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n" .
          "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/110.0\r\n"
      )
    );

    $context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
   $html = file_get_contents('https://www.todayonline.com/', false, $context);
    $crawler = new Crawler($html);

    // Get the main headings
    $crawlMainArticle = $crawler->filterXPath('//div[@class="layout layout--twocol-section layout--twocol-section--75-25"]')->eq(0);

    // Loop throuigh each article
    foreach ($crawlMainArticle->filterXPath('//div[@class="list-object list-object--is-number"]') as $crawlData) {
         echo $crawlData->getElementsByTagName('a')[0]->getAttribute('href')  . '&nbsp;&nbsp;&nbsp;&nbsp;';
         echo $crawlData->textContent . '<br>';
    }

?>