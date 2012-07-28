<a href="<?=site_url('bug-tracker-issues/view').'/'.$issue_id?>" class="button"><?=ucfirst(_('go back'))?></a>
<br /><br />
<div class="box" id="form_container">
    <div class="box-header">
        <h1><?=_('Add new Comment')?></h1>
    </div>
    <div class="box-content">
        <form id="new_issue_form" method="post" action="">
            <div>
                <p> <input type="text" name="q" id="query" />
                    <textarea id="comment_text" name="comment_text" class="{validate:{required:true}}">Comment</textarea>
                </p>
            </div>
            <div class="clear"></div>

            <div class="action_bar">
                <input type="submit" value="Save" class="button blue">
                <a href="<?=site_url('bug-tracker-issues/view').'/'.$issue_id?>" class="button"><?=ucfirst(_('cancel'))?></a>

            </div>
        </form>
    </div>
</div>
