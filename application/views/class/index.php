<h2><?php echo $title ?></h2>

<?php foreach ($class as $class_item): ?>

        <h3><?php echo $class_item['title'] ?></h3>
        <div class="main">
                <?php echo $class_item['text'] ?>
        </div>
        <p><a href="<?php echo $class_item['slug'] ?>">View article</a></p>

<?php endforeach ?>