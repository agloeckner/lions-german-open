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
	        
		<section class="gallery-partner">
			<?php foreach($item->images() as $image): ?>
				<a href="<?= $image->link() ?>">
					<img src="<?= $image->resize(200)->url() ?>" alt="<?= $image->link() ?>">
					<figurecap><?= $image->alt() ?></figurecap>
				</a>
				
			<?php endforeach ?>
		</section>

    <?php endforeach ?>  
  
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