<div class="box">
    <div class="box-header">
        <h1><?=_('Create issue')?></h1>
        <ul>
            <li class="active"><a href="#one"></a></li>
        </ul>
    </div>

    <div class="box-content">
        <div id="one" class="tab-content">

            <form method="post" action="" novalidate="novalidate">

                <div>
                    <p>
                        <input type="text" class="{validate:{required:true, minlength:3}}" name="issue_name" id="issue_name" placeholder="<?=ucfirst(_('issue title'))?>" value="<?=$issueObj->name?>" />
                        <span class="icon tick valid"></span>
                    </p>
                    <p>
                        <textarea id="issue_detail" name="issue_detail" class="{validate:{required:true}}"><?=$issueObj->description?></textarea>
                    </p>
                    <p>
                        <select name="select_status" id="select_status" placeholder="status" class="{validate:{required:true}}">
                            <option value="new" <?=($issueObj->status == 'new') ? 'selected' : ''?>><?=ucfirst(_('new'))?></option>
                            <option value="acknowledged" <?=($issueObj->status == 'acknowledged') ? 'selected' : ''?>><?=ucfirst(_('acknowledged'))?></option>
                            <option value="confirmed" <?=($issueObj->status == 'confirmed') ? 'selected' : ''?>><?=ucfirst(_('confirmed'))?></option>
                            <option value="fixed" <?=($issueObj->status == 'fixed') ? 'selected' : ''?>><?=ucfirst(_('fixed'))?></option>
                            <option value="closed" <?=($issueObj->closed == 'new') ? 'selected' : ''?>><?=ucfirst(_('closed'))?></option>
                        </select>
                    </p>

                    <p>
                        <select name="select_priority" id="select_priority" placeholder="priority" class="{validate:{required:true}}">
                            <option value="new" <?=($issueObj->priority == 'low') ? 'selected' : ''?>><?=ucfirst(_('low'))?></option>
                            <option value="medium" <?=($issueObj->priority == 'medium') ? 'selected' : ''?>><?=ucfirst(_('medium'))?></option>
                            <option value="high" <?=($issueObj->priority == 'high') ? 'selected' : ''?>><?=ucfirst(_('high'))?></option>
                        </select>
                    </p>
                    <p>
                        <textarea id="issue_tags" name="issue_tags" class="taginput"><?=$issueObj->tags?></textarea>
                    </p>
                    <p>
                        <input type="checkbox" name="issue_visible" id="issue_visible" value="<?=($issueObj->visible)?>" <?=($issueObj->visible) ? 'checked' : ''?> />
                        <label for="issue_visible">This is a visible issue!</label>
                    </p>
                    <p>
                        <input type="checkbox" name="issue_comment_mode" id="issue_comment_mode" value="<?=($issueObj->commentmode)?>" <?=($issueObj->commentmode) ? 'checked' : ''?>/>
                        <label for="issue_comment_mode">Activate comments mode</label>
                    </p>
                </div>
                <div class="clear"></div>

                <div class="action_bar">
                    <input type="submit" value="Save" class="button blue">
                    <a class="button" href="<?=site_url("bug-tracker-issues/list/")?>"><?=ucfirst(_('cancel'))?></a>
                </div>


            </form>
        </div>
    </div>
