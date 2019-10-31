<?php snippet('header') ?>

<?php snippet('intro') ?>

<main class="album">

    <?php 
  
  $gallery = page('photos')->children()->filterBy('template', 'album')->listed()->flip()->sortBy('date','desc')->limit(1);
  $notes = page('notes')->children()->filterBy('template', 'note')->listed()->flip();
  $pages = $pages->filterBy('template','in', array('default','about', 'album'))->listed();
  
  $tileData = new Pages(array($gallery));

?>

    <?php
  	
  	$i = 0;
  	
  	foreach($tileData->limit(5) as $item):
  	
  	$i++;
  	
    ?>

        <div class="swiper-container">
            <div class="swiper-wrapper">

                <?php foreach($tileData->images() as $image): ?>

                <?php if($image->orientation() == 'portrait'): ?>
                <img class="swiper-slide swiper-lazy" style="object-fit: contain;" src="<?= $image->resize(1024)->url() ?>" alt="">

                <?php else: ?>
                <img class="swiper-slide swiper-lazy" src="<?= $image->resize(1024)->url() ?>" alt="">
                <?php endif ?>

                <?php endforeach ?>

            </div>

        </div>

        <div class="swiper-button-next">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" width="512" height="512">
		  	<path d="m40.4 121.3c-0.8 0.8-1.8 1.2-2.9 1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8 0l53.9 53.9c1.6 1.6 1.6 4.2 0 5.8l-53.9 53.9z" fill="#FFF"/></svg>
        </div>
        <div class="swiper-button-prev">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" width="512" height="512">
		  	<path d="m88.6 121.3c0.8 0.8 1.8 1.2 2.9 1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0l-54 53.9c-1.6 1.6-1.6 4.2 0 5.8l54 53.9z" fill="#FFF"/></svg>
        </div>

        <?php endforeach ?>


<?php
	
	$gallery = page('photos')->children()->filterBy('template', 'album')->listed()->flip()->sortBy('date','desc');
			
?>


  <ul class="albums"<?= attr(['data-even' => $page->children()->listed()->isEven()], ' ') ?>>
    <?php foreach (page('photos')->children()->listed()->sortBy('date','desc') as $album): ?>
    <li>
      <a href="<?= $album->url() ?>">
        <figure>
          <?php if ($cover = $album->cover()): ?>
          <?= $cover ->crop(300) ?>
          <?php elseif ($cover = $album->video()): ?>
          <img src="https://img.youtube.com/vi/6JJm6BlIdco/hqdefault.jpg" ?>
          
          <?php endif ?>
          <figcaption><?= $album->title() ?></figcaption>
        </figure>
      </a>
    </li>
    <?php endforeach ?>
  </ul>

</main>

<?php snippet('footer') ?>

<script>
    $(document).ready(function() {
        //initialize swiper when document ready
        var mySwiper = new Swiper('.swiper-container', {
            loop: false,
            autoplay: {
                delay: 1500,
            },
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
            effect: 'swipe',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    });
</script>