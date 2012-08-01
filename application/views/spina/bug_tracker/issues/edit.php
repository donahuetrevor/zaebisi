<div class="box">
    <div class="box-header">
        <h1><?=_('Edit issue')?></h1>
    </div>

    <div class="box-content">
        <form method="post" action="" novalidate="novalidate">

            <div>
                <p>
                    <input type="text" class="{validate:{required:true, minlength:3}}" name="issue_name" id="issue_name" placeholder="<?=ucfirst(_('issue title'))?>" value="<?=$issue_obj->name?>" />
                    <span class="icon tick valid"></span>
                </p>
                <p>
                    <textarea id="issue_detail" name="issue_detail" class="{validate:{required:true}}"><?=$issue_obj->description?></textarea>
                </p>
                <p>
                    <select name="assign_user[]" multiple="multiple" id="assign_user"  placeholder="Select users to assign to issue" class="{validate:{required:true}}">
                        <?php foreach( $issue_users_list as $key => $val ): ?>
                            <?php echo $selected = (in_array($val->id, $users_issue_assigned)) ? 'selected':''; ?>
                        <option value="<?=_($val->id)?>" <?=$selected?>><?=ucfirst(_($val->first_name)).' '.ucfirst(_($val->last_name))?></option>
                        <?php endforeach; ?>
                    </select>

                </p>
                <p>
                    <select name="select_status" id="select_status" placeholder="status" class="{validate:{required:true}}">
                        <option value="new" <?=($issue_obj->status == 'new') ? 'selected' : ''?>><?=ucfirst(_('new'))?></option>
                        <option value="acknowledged" <?=($issue_obj->status == 'acknowledged') ? 'selected' : ''?>><?=ucfirst(_('acknowledged'))?></option>
                        <option value="confirmed" <?=($issue_obj->status == 'confirmed') ? 'selected' : ''?>><?=ucfirst(_('confirmed'))?></option>
                        <option value="fixed" <?=($issue_obj->status == 'fixed') ? 'selected' : ''?>><?=ucfirst(_('fixed'))?></option>
                        <option value="closed" <?=($issue_obj->closed == 'closed') ? 'selected' : ''?>><?=ucfirst(_('closed'))?></option>
                    </select>
                </p>

                <p>
                    <select name="select_priority" id="select_priority" placeholder="priority" class="{validate:{required:true}}">
                        <option value="new" <?=($issue_obj->priority == 'low') ? 'selected' : ''?>><?=ucfirst(_('low'))?></option>
                        <option value="medium" <?=($issue_obj->priority == 'medium') ? 'selected' : ''?>><?=ucfirst(_('medium'))?></option>
                        <option value="high" <?=($issue_obj->priority == 'high') ? 'selected' : ''?>><?=ucfirst(_('high'))?></option>
                    </select>
                </p>
                <p>
                    <textarea id="issue_tags" name="issue_tags" class="taginput"><?=$issue_obj->tags?></textarea>
                </p>
                <p>
                    <input type="checkbox" name="issue_visible" id="issue_visible"  <?=($issue_obj->visible) ? 'checked' : ''?> />
                    <label for="issue_visible">This is a visible issue!</label>
                </p>
                <p>
                    <input type="checkbox" name="issue_comment_mode" id="issue_comment_mode" <?=($issue_obj->commentmode) ? 'checked' : ''?>/>
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


