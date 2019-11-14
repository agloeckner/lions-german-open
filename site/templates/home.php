<?php snippet('header') ?>


<body>

    <main class="grid">

        <?php 
  
    $gallery = page('photos')->children()->filterBy('template', 'album')->listed()->limit(1);
    $notes = page('notes')->children()->filterBy('template', 'note')->listed()->flip();
    $pages = $pages->filterBy('template','in', array('default','about', 'album', 'album-partner'))->listed();
    
    $tileData = new Pages(array($gallery, $notes, $pages));
  
  ?>

        <?php
  	
  	$i = 0;
  	
  	foreach($tileData->limit(5) as $item):
  	
  	$i++;
  	
  	?>


            <?php
		
	  if($i == 1): ?>

                <div class="swiper-container tile<?php echo $i ?>">

                    <div class="swiper-wrapper">

                        <?php foreach($item->images() as $image): ?>

						<div class="swiper-slide">
	
			                <?php if($image->orientation() == 'portrait'): ?>
			                <img data-src="<?= $image->resize(1024)->url() ?>" class="swiper-lazy swiper-slide-img-1" style="object-fit: contain;" alt="">
			                <?php else: ?>
			                <img data-src="<?= $image->resize(800)->url() ?>" class="swiper-lazy" alt="">
			                <?php endif ?>
			                
			                <div class="swiper-lazy-preloader"></div>
			                
						</div>
					
                        <?php endforeach ?>

                    </div>

                    <div class="content row">

                        <h2>
                            <a href="<?php echo $item->url() ?>"><?php echo $item->title() ?></a>
                        </h2>

                        <?php if($item->title() != 'Partner'): ?>
		                <a href="<?php echo $item->url() ?>">
							<button>fotos &amp; videos</button>
		        		</a>
                        <?php endif ?>

                    </div>

                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
			        <div class="swiper-button-prev"></div>

                </div>

                <?php 
		
	  else: ?>


                <div class="tile <?php echo $item->template() ?>-<?php echo $item->title() ?> tile<?php echo $i ?>">
                
                    <h2 class="grid-title">
	                    <a href="<?php echo $item->url() ?>">
                            <?php echo $item->title() ?>
                    	</a>
                    </h2>

                    <?php if(!$item->text()->isEmpty()): ?>
                                           
                      <?= $item->text()->short(100)->kt() ?>

                    <?php endif ?>

                    <?php if($item->template() == 'album-partner'): ?>

                    <section class="gallery">
                        <?php foreach($item->images() as $image): ?>
                        <a href="<?= $image->link() ?>">
							<img src="<?= $image->resize(80)->url() ?>" alt="<?= $image->link() ?>">
    		      		</a>
                        <?php endforeach ?>
                    </section>
                    
                    <?php endif ?>

                    <?php if($item->title() != 'Partner'): ?>
                    <a href="<?php echo $item->url() ?>">
						<button><?php if($item->calltoaction()->isEmpty()): echo 'weiter'; else: echo $item->calltoaction(); endif ?></button>
            		</a>
                    <?php endif ?>

                </div>


                <?php endif ?>

                <?php endforeach ?>

    </main>


    <?php snippet('footer') ?>

<script>
$(document).ready(function() {
    //initialize swiper when document ready
    var mySwiper = new Swiper('.swiper-container', {
        loop: false,
        autoplay: {delay: 1500,},
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