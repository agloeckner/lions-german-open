<!DOCTYPE html>
<head>

<meta charset="utf-8">
<title><?php echo $site->title() ?></title>

<meta name="description" content="">   
  
<meta name="viewport" content="width=device-width, initial-scale=1" />	

<link rel="stylesheet" href="css/styles.css">

</head>

<style>

.content {
/*   display: none; */
}

</style>

<body>

<main class="grid">

  <?php 
  
    $gallery = page('photography')->children()->filterBy('template', 'album')->listed()->flip()->limit(1);
    $notes = page('notes')->children()->filterBy('template', 'note')->listed()->flip();
    $pages = $pages->filterBy('template','in', array('default','about', 'album'))->listed();
    
    $tileData = new Pages(array($gallery, $notes, $pages));
  
  ?>

  <?php
  	
  	$i = 0;
  	
  	foreach($tileData->limit(5) as $item){
  	
  	$i++;
  	
  	?>
  	 	
      <div class="tile <?php echo $item->template() ?>-<?php echo $item->title() ?> div<?php echo $i ?>">
  	  
        <h4 class="grid-title"><?php echo $item->title() ?></h4>
        
        <?php if(!$item->text()->isEmpty()): ?>
          <p class="grid-text"><?php echo $item->text()->kt()->short(250) ?></p>
        <?php endif ?>

        <?php if($item->template() == 'album'): ?>
  		  <section class="gallery">
  		    <?php foreach($item->images() as $image): ?>
  		    <figure>
  		      <a href="<?= $image->link() ?>">
  		        <img src="<?= $image->resize(120)->url() ?>" alt="">
  		      </a>
  		    </figure>
  		    <?php endforeach ?>
  		  </section>
        <?php endif ?>
        
        <?php if($item->title() != 'Partner'): ?>
          <a href="<?php echo $item->url() ?>">
            <button>weiter</button>
          </a>
        <?php endif ?>
        
      </div>
      
      <?php }; ?>
	
</main>

<footer>

  <div class="content">

	<?php
		
	$footerData = new Pages(array($pages));
	
	foreach($footerData->filterBy('template', 'in', array('default','about')) as $item){ ?>
	
	<a href="<?php echo $item->url() ?>"><?php echo $item->title() ?></a>
    
    <?php }; ?>
	
	<a href="panel">Login</a>
	
  </section>

</footer>

</body>
</html>