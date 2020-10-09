<?php

  function parseNoticia($url){

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTMLFile($url);
    $titulo = $dom->getElementsByTagName('title');
    $tags = get_meta_tags($url);

    if (array_key_exists('twitter:image', $tags)){
      return [
        'url' => $url,
        'titulo' => $titulo->item(0)->nodeValue,
        'imagen' => $tags['twitter:image'],
        'tags' => $tags,
      ];
    } elseif (array_key_exists('msapplication-tileimage', $tags)) {
      return [
        'url' => $url,
        'titulo' => $titulo->item(0)->nodeValue,
        'imagen' => $tags['msapplication-tileimage'],
        'tags' => $tags,
      ];
    } elseif (array_key_exists('twitter:image:src', $tags)) {
      return [
        'url' => $url,
        'titulo' => $titulo->item(0)->nodeValue,
        'imagen' => $tags['twitter:image:src'],
        'tags' => $tags,
      ];
    } else {
      return [
        'url' => $url,
        'titulo' => $titulo->item(0)->nodeValue,
        'imagen' => 'https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2019/07/origen-nombres-informatica-nunca-hubieras-imaginado_2.jpg',
        'tags' => $tags,
      ];
    }

  }

?>
