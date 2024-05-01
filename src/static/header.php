<?php
function head_template() {
    echo '
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TheGoodReviews</title>
  <meta name="title" content="BDDIHM-Gaming-Reviews">
  <meta name="description" content="BDDIHM Website Project">
  <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!--css link-->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!--preload images-->
  <link rel="preload" as="image" href="./assets/images/pattern-2.svg">
  <link rel="preload" as="image" href="./assets/images/pattern-3.svg">

</head>
';
}

function header_template() {
    echo '
  <header class="header" data-header>
    <div class="container">
      <nav class="glassmorphism-nav">
        <ul>
            <li><a href="../../index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="../login-register/login.php">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>
';
}
?>