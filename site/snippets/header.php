<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  
  <meta name="description" content="">   

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  

  <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file. 
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->
  <?= css(['assets/css/index.css']) ?>
  <?= css(['assets/css/fonts.css']) ?>
  <?= css(['assets/css/swiper.min.css']) ?>
  <?= js(['assets/js/swiper.min.js']) ?>
  <?= js(['assets/js/jquery-1.12.1.min.js']) ?>

</head>