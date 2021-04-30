<html>
    <head>
        <title>MBlog</title>
        <link rel="stylesheet" href="https://bootswatch.com/3/sandstone/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <script src="http://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">MBlog</a>
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    
                    <li><a href="<?php echo base_url(); ?>posts">All Posts</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>posts/create">Create Post</a></li>
            </div>
        </div>
    </nav>

    <div class="container">