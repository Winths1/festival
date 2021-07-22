<!DOCTYPE html>
<html lang="fr" class=" h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    
    <!-- BOOTSTRAP CSS
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    
    <!-- Bootstrap Icons
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->

    <!-- Custom CSS
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css"> -->
    <?php wp_head(); ?>

</head>
<body class="h-100 d-flex flex-column justify-content-between">
    <!-- Construction du header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <!-- Nom du site -->
              <a class="navbar-brand" href="http://localhost:1234/festival-de-cinema/">Le festival du film burlesque</a>

              <!-- Bouton responsive -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

                <!-- Navbar responsive -->

                  <?php
                  wp_nav_menu( array(
                      'theme_location'    => 'primary',
                      'depth'             => 2,
                      'container'         => 'div',
                      'container_class'   => 'collapse navbar-collapse',
                      'container_id'      => 'navbarsExample05',
                      'menu_class'        => 'nav navbar-nav me-auto mb-2 mb-lg-0 justify-content-end w-100',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker(),
                  ) );
                  ?>

            </div>
          </nav>
    </header>