<?php

  const API_URL = "https://whenisthenextmcufilm.com/api";
  # Inicializar nueva sesión de cURL; ch = cURL handle
  $ch = curl_init(API_URL);
  // Indicar que queremos recibir el resultado de la peticioón y no mostrarla en pantalla
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CAINFO, "./cacert.pem");
  /*
    Ejecutar la petición y guardamos el resultado
  */
  $result = curl_exec($ch);

  // alternativa: file_get_contents
  // $results = file_get_contents(API_URL); // si solo quieres hacer un GET de una api.

  $data = json_decode($result, true);

  curl_close($ch);
?>


  <head>
    <title>The Next MCU Movie</title>
    <meta charset="UTF-8" />
    <meta name="description" content="the next marvel movie" />
    <meta name="viewport" content="width=device-width, inivital scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
  </head>


  <main>
    <h2>The next MCU movie is: </h1>
      <div>
        <img src="<?= $data["poster_url"];?>" width="330px" alt="">
        <h3><?= $data["title"] ?> is released <?= $data["days_until"] ?> days</h2>
        <p><?= $data["overview"];?></p>
        <p style="margin-top:6%;">After this film is released <?= $data["following_production"]["title"]?></p>
      </div>
  </main>




  <style>
    body {
      margin: 0 auto;
    }

    div {
      display: flex;
      flex-direction: column;
      justify-items: center;
      align-items: center;
      text-align: center;
    }

    img {
      margin: 0 auto;
      border-radius: .8rem;
    }

  </style>
