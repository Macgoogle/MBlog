<h2><?php echo $post['title']; ?></h2>
<small><b>Posted on: </b><?php echo $post['created_at']; ?></small><br>
    <small><b>Tag: </b><?php echo $post['tag']; ?></small><br>
    <br>
    <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<div class = "post-description">
    <br>
    <?php echo $post['description']; ?>
</div>

<hr>
<a class="btn btn-default pull-left" href ="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>

<?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" value ="delete" class="btn btn-danger">

</form>
