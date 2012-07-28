
<div id="delete_issue" class="box">
    <div class="box-header">
        <h1><?=ucfirst(_('this issue has been deleted'))?></h1>
    </div>

    <div class="box-content">
            <p>
                <h3><?=$issue_obj->name?></h3>
            </p>

            <p>
                <span><?=$issue_obj->description?></span>
            </p>

            <div class="action_bar">
                <a href="<?=site_url('bug-tracker-issues/list')?>" class="button"><?=ucfirst(_('ok'))?></a>
            </div>
    </div>
</div>