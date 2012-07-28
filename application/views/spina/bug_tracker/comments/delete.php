<div id="delete_issue" class="box">
    <div class="box-header">
        <h1><?=ucfirst(_('this comment has been deleted'))?></h1>
    </div>

    <div class="box-content">
        <p>
            <span><?=$issue_comment_obj->content?></span>
        </p>

        <div class="action_bar">
            <a href="<?=site_url('bug-tracker-issues/view').'/'.$issue_comment_obj->issue_id?>" class="button"><?=ucfirst(_('ok'))?></a>
        </div>
    </div>
</div>