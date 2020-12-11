<div class="container_addNew">
    <div class="addNew">
        <h2 style="text-align:center">Add New</h2>
        <form action="http://localhost/php/News/store" method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Title..." required value="<?= isset($_SESSION['old_title']) ? $_SESSION['old_title'] : '' ?>">
            <?php
                if(isset($_SESSION['error'])) {
                    echo "<span style='color: red; text-align: center; display:block; margin-bottom: 5px; font-size: 15px;'>".$_SESSION['error']."</span>";
                    unset($_SESSION['error']);
                }

                if(isset($_SESSION['old_title'])){
                    unset($_SESSION['old_title']);
                }
            ?>
            <label for="content">Content</label>
            <textarea id="subject" name="content" placeholder="Write something.." style="height:200px" required><?php echo (isset($_SESSION['old_content']) ? $_SESSION['old_content'] : '');  ?></textarea>
            <?php
                if(isset($_SESSION['old_content'])){
                    unset($_SESSION['old_content']);
                }
            ?>
            <button  type="submit" value="Submit" name="btn_store">Add</button>
        </form>
    </div>
</div>