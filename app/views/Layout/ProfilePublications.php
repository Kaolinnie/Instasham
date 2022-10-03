<div class="publicationsDiv">
    <?php 
        foreach($data as $post) {
            $publication = $post["publication"];
            echo "
            <div class='publicationDiv'>
                <img role='button' onclick='showPublication($publication->publication_id)' src='/images/publications/$publication->picture'>
            </div>
            ";
        }
    
    ?>
</div>