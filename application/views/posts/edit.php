<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
    <input type = "hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name ="title" placeholder="Add Title" 
    value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Tag</label>
    <input type="text" class="form-control" name ="tag" placeholder="Add Tag" 
    value="<?php echo $post['tag']; ?>">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea id="editor1"class="form-control" name = "description" placeholder="Add Description">
    <?php echo $post['description']; ?></textarea>
    <br>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>