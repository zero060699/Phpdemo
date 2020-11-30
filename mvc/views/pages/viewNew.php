<div class="container_addNew">
    <div class="addNew">
        <?php 
            $id = $data['new']['id'];
            $title = $data['new']['title'];
            $content = $data['new']['content'];
        ?>
        <h2 style="text-align:center">New</h2>
        <label for="id"">ID</label>
        <input type="text" name="id" id="id" value="<?= $id ?>" disabled></input>
        <label for="title">Title</label>
        <input value="<?= $title ?>" type="text" id="title" name="title" placeholder="Title..."  disabled>
        <label for="content">Content</label>
        <textarea id="subject" name="content" placeholder="Write something.." style="height:200px" disabled><?= $content  ?></textarea>
    </div>
</div>