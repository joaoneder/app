<h2><?php echo $title; ?></h2>
<?php foreach ($news as $news_item): ?>
    <h3><?php echo $news_item['nome']; ?></h3>
    <div class="main">
         <?php echo $news_item['status']; ?>
    </div>
    <p><a href="<?php echo site_url('news/view/'.$news_item['news_id']); ?>">View article</a></p>
<?php endforeach; ?>
