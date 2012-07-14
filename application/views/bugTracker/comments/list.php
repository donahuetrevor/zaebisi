<div id="form_container">
    <h3>Comments</h3>
    <?php foreach($commentsList as $ccommentObj): ?>
    <div>
        <span><?=$ccommentObj->datetime_added?></span><br />
        <span><?=$ccommentObj->content?></span><hr>
    </div>
    <?php endforeach; ?>
</div>

