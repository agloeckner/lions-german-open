<?php snippet('header') ?>

<body>

<main class="article">
	
<a class="close" href="<?= $site->url() ?>">
	<svg role="button"xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><g fill="none"><g fill="#FFF"><path d="M43.5 0.3L44.2 1 23 22.3 44.2 43.6 43.5 44.3 22.2 23 1 44.3 0.3 43.6 21.5 22.3 0.3 1 1 0.3 22.2 21.6 43.5 0.3Z"/></g></g></svg>
</a>

<section class="content">
		  
    <article>	    
	  <header>
	  	<h2><?= $page->title() ?></h2>
        <?php if ($page->tags()->isNotEmpty()) : ?>
        <p class="note-tags tags"><?= $page->tags() ?></p>
        <?php endif ?>
	  </header>
	  
	  <?= $page->text()->kt() ?>
    </article>
	
</section>
	
</main>

<?php snippet('footer') ?>