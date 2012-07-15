<div id="form_container">
    <h3>Add new Issue</h3>
    <form id="new_issue_form" method="post" action="">
        <label class="description" for="issue_name">Issue Title</label><br />
        <input id="issue_name" name="issue_name" class="text medium" type="text" value="<?=$issueObj->name?>"/><br /><br />
        <label class="description" for="issue_detail">Issue Detail </label><br />
        <textarea rows="10" cols="20" id="issue_detail" name="issue_detail"><?=$issueObj->description?></textarea><br /><br />
        <label class="description" for="select_status">Select issue status</label><br />
        <select class="select_styled" name="select_status" id="select_status">
            <option value="new" <?=($issueObj->status == 'new') ? 'selected' : ''?>><?=ucfirst(_('new'))?></option>
            <option value="acknowledged" <?=($issueObj->status == 'acknowledged') ? 'selected' : ''?>><?=ucfirst(_('acknowledged'))?></option>
            <option value="confirmed" <?=($issueObj->status == 'confirmed') ? 'selected' : ''?>><?=ucfirst(_('confirmed'))?></option>
            <option value="fixed" <?=($issueObj->status == 'fixed') ? 'selected' : ''?>><?=ucfirst(_('fixed'))?></option>
            <option value="closed" <?=($issueObj->status == 'closed') ? 'selected' : ''?>><?=ucfirst(_('closed'))?></option>
        </select><br /><br />
        <label class="description" for="select_priority">Select issue priority</label><br />
        <select class="select_styled" name="select_priority" id="select_priority">
            <option value="low" <?=($issueObj->priority == 'low') ? 'selected' : ''?>><?=ucfirst(_('low'))?></option>
            <option value="medium" <?=($issueObj->priority == 'medium') ? 'selected' : ''?>><?=ucfirst(_('medium'))?></option>
            <option value="high" <?=($issueObj->priority == 'high') ? 'selected' : ''?>><?=ucfirst(_('high'))?></option>
        </select><br /><br />
        <label class="description" for="issue_tags">Issue Tags, <span>Separate tags with commas</span></label><br />
        <input id="issue_tags" name="issue_tags" class="text medium" type="text" value="<?=$issueObj->tags?>"/>
        <br /><br />
        <input type="checkbox" name="issue_visible" id="issue_visible" value="<?=($issueObj->visible)?>" <?=($issueObj->visible) ? 'checked' : ''?>/>
        <label class="description" for="issue_visible">This is a visible issue!</label><br />
        <br />
        <input type="checkbox" name="issue_comment_mode" id="issue_comment_mode" value="<?=($issueObj->commentmode)?>" <?=($issueObj->commentmode) ? 'checked' : ''?>/>
        <label class="description" for="issue_comment_mode">Activate comments mode</label><br />
        <br />
        <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
        <a href="<?=base_url("bug-tracker-issue/list/")?>"><?=ucfirst(_('Cancel'))?></a>
    </form>

</div>

