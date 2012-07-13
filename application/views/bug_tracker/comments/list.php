<div id="form_container">
    <h3>Comments</h3>
    <?php foreach($commentsList as $commentObj): ?>
    <div>
        <span><?=$commentObj->datetime_added?></span><br />
        <span><?=$commentObj->content?></span>
    </div>
    <?php endforeach; ?>
</div>

