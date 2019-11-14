<?php snippet('header') ?>

<?php snippet('intro') ?>

<main class="album">

<a class="close" href="<?= $site->url() ?>">
	<svg role="button"xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><g fill="none"><g fill="#FFF"><path d="M43.5 0.3L44.2 1 23 22.3 44.2 43.6 43.5 44.3 22.2 23 1 44.3 0.3 43.6 21.5 22.3 0.3 1 1 0.3 22.2 21.6 43.5 0.3Z"/></g></g></svg>
</a>

<section class="content">
		  
	<header>
		<h2><?= $page->title() ?></h2>
	</header>

    <?php 
  
  $gallery = page();
  $notes = page('notes')->children()->filterBy('template', 'note')->listed()->flip();
  $pages = $pages->filterBy('template','in', array('default','about', 'album'))->listed();
  
  $tileData = new Pages(array($gallery));

?>

    <?php
  	
  	$i = 0;
  	
  	foreach($tileData->limit(5) as $item):
  	
  	$i++;
  	
    ?>

        <div class="album-container swiper-container">
	        
            <div class="swiper-wrapper">

                <?php foreach($tileData->images() as $image): ?>

					<div class="swiper-slide">

		                <?php if($image->orientation() == 'portrait'): ?>
		                <img data-src="<?= $image->resize(1024)->url() ?>" class="swiper-lazy" style="object-fit: contain;" alt="">
		
		                <?php else: ?>
		                <img data-src="<?= $image->resize(1024)->url() ?>" class="swiper-lazy" alt="">
		                <?php endif ?>
		                
		                <div class="swiper-lazy-preloader"></div>
		                
					</div>

                <?php endforeach ?>
			
            </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
		        <div class="swiper-button-prev"></div>
			
        </div>


        <?php endforeach ?>


<?php
	
	$gallery = page('photos')->children()->filterBy('template', 'album')->listed()->flip()->sortBy('date','desc');
			
?>

  <h2>Gallerien</h2>

  <ul class="albums"<?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
    <?php foreach (page('photos')->children()->listed()->sortBy('date','desc') as $album): ?>
    <li>
      <a href="<?= $album->url() ?>">
        <figure>
          <?php if ($cover = $album->cover()): ?>
          <?= $cover ->crop(300,200) ?>
          <?php elseif ($cover = $album->video()): ?>
          <img src="https://img.youtube.com/vi/6JJm6BlIdco/hqdefault.jpg" ?>
          
          <?php endif ?>
          <figcaption><?= $album->title() ?></figcaption>
        </figure>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
  
  <h2>Lions German Open 2015 Video</h2>
  
  <iframe width="560" height="315" src="https://www.youtube.com/embed/6JJm6BlIdco" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
  
</section>

</main>



<?php snippet('footer') ?>

<script>
$(document).ready(function() {
    //initialize swiper when document ready
    var mySwiper = new Swiper('.swiper-container', {
        loop: false,
        autoplay: {delay: 1500,},
        lazy: true,
	    preloadImages: false,
		loadPrevNext: true,
		loadPrevNextAmount: 3,

        lazy: {
            loadPrevNext: true,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
        clickable: true,
        slidesPerView: 1,
        paginationType: 'fraction',
        hashnavWatchState: true,
        paginationClickable: true,
        speed: 800,
        spaceBetween: 0,
        effect: 'slide',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
		pagination: {
		  el: '.swiper-pagination',
		  type: 'fraction',
		},            

    });
});
</script>