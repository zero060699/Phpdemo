<div class="table_main">
    <h1>News</h1>
    <button class="btn btn-primary">
        <a href="http://localhost/php/News/addNew" class="">Add New</a></button>
    <?php if(isset($_SESSION["mess"])) {
        echo "<span style='color: blue; text-align: center; display:block'>".$_SESSION['mess']."</span>";
        unset($_SESSION['mess']);
   } ?>
    <table id="news">
        <tr>
            <th style="width: 10%; text-align:center;">ID</th>
            <th style="width: 250px; text-align:center;">Title</th>
            <th style="width: 550px; text-align:center;">Content</th>
            <th style="width: 20%; text-align:center;">Action</th>
        </tr>
        <?php
            $news = $data["news"];   
        ?>
        <?php foreach($news as $data) {
            echo " <tr> ";
            echo " <td> ".$data['id']."</td>";
            echo " <td><div class='title' style='width:250px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis'>". $data['title']."</div></td>";
            echo " <td><div class='content' style='width:400px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis'>". $data['content'] ."</div></td> ";
            echo "<td class='action'>";
            echo "<div><a href='http://localhost/php/News/show/".$data['id']."'><i class='fa fa-address-book' style='font-size:24px'></i></a></div>";
            echo "<div><a href='http://localhost/php/News/edit/".$data['id']."'><i class='fa fa-edit' style='font-size:24px'></i></a></div>";
            echo "<div><a onclick='checkDelete()' href='http://localhost/php/News/destroy/".$data['id']."'><i  class='fa fa-trash' style='font-size:24px'></i></a></div>";
            echo "</td>";
            echo "</tr>";     
        } ?>
       
    </table>
</div>
