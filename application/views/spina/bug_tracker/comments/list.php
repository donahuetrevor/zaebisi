<div id="form_container">
    <h3>Comments</h3>
    <?php foreach($comments_list as $comment_obj): ?>
    <div class="box grid_8 alpha">

        <div class="box-header">
            <h1>
                <span class="glyph user" style="margin-right: 5px;"></span> <?=$comment_obj->first_name.' '.$comment_obj->last_name?>
            </h1>
            <h1>
                <span class="glyph calendar" style="margin-right: 5px;"></span> <?=time_since($comment_obj->datetime_added)?>
            </h1>
            <a href="<?=site_url('bug-tracker-issue-comments/edit').'/'.$comment_obj->id?>" class="button plain" style="margin-right: 8px; margin-top: 8px; float: right;"><?=ucfirst(_('edit'))?></a>
            <a href="<?=site_url('bug-tracker-issue-comments/delete').'/'.$comment_obj->id?>" class="button plain" style="margin-top: 8px; float: right;"><?=ucfirst(_('delete'))?></a>

        </div>

        <div class="box-content">
            <p><?=$comment_obj->content?></p>
        </div>
    </div>
    <div class="clear"></div>
    <?php endforeach; ?>

</div>

