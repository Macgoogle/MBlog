<h2><?= $title ?></h2>
<medium>Alphabetical Order</medium>
<?php foreach($posts as $post) : ?>
    <br>
    <h3><?php echo $post['title']; ?></h3>
    <div class="row">
        <div class="col-md-3">
        <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
        
        </div>
        <div class ="col-md-9">
            <small><b>Posted on: </b><?php echo $post['created_at']; ?></small><br>
        <small><b>Tag: </b><?php echo $post['tag']; ?></small><br>
    <br>
    <?php echo word_limiter($post['description'], 60); ?><br>
    <p><a href = "<?php echo site_url('/posts/'.$post['slug']); ?>">
    Read More</a></p><br>
    </div>
</div>

<?php endforeach; ?>
<div class="pagination-links">
        <?php echo $this->pagination->create_links(); ?>
</div>