<?php 

  $gallery = page('photos')->children()->filterBy('template', 'album')->listed()->flip()->limit(1);
  $notes = page('notes')->children()->filterBy('template', 'note')->listed()->flip();
  $pages = $pages->filterBy('template','in', array('default','about', 'album'))->listed();
  
  $tileData = new Pages(array($gallery, $notes, $pages));

?>

<footer <?php if($page->uri() !== "home"){ echo 'class="regular"';}; ?>>

    <div class="content">

        <a href="<?php echo $site->url() ?>">Home</a>

        <?php
		
	$footerData = new Pages(array($pages));
	
	foreach($footerData->filterBy('template', 'in', array('default','about')) as $item){ ?>

            <a href="<?php echo $item->url() ?>"><?php echo $item->title() ?></a>

            <?php }; ?>

            <?php if($page->uri() === "home"): ?>

            <a href="<?= $site->url() ?>/panel/">login</a>

            <?php else: ?>

            <a href="<?= $site->url() ?>/panel/pages/<?= str_replace('/', '+', $page->uri()) ?>">login</a>

            <?php endif ?>


            </section>

</footer>

<div class="oldbrowser">
	Website does not support old browser.<br>
	Download:<br>
	<a style="display: block; width: auto; text-decoration: underline;" href="https://www.google.com/chrome/">Google Chrome</a>
	<a style="display: block; width: auto; text-decoration: underline;" href="https://www.mozilla.org">Mozilla Firefox</a>

</div>

</body>

</html>