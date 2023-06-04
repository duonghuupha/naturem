<div class="widget widget_categories">
    <h3 class="widget_title">Categories</h3>
    <ul>
        <?php
        $json = $this->_Data->get_all_category();
        foreach($json as $row){
            echo "<li>";
                $url = URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-category-'.base64_encode($row['id']).'.html';
                echo "<a href='".$url."'>".$row['title']." <span>(".$row['Total'].")</span></a>";
            echo "</li>";
        }   
        ?>
    </ul>
</div>