<div class="box">
    <div class="box-header">
        <h1><?=_('Create issue')?></h1>
    </div>

    <div class="box-content">
        <form method="post" action="" novalidate="novalidate">

            <div>
                <p>
                    <input type="text" class="{validate:{required:true, minlength:3}}" name="issue_name" id="issue_name" placeholder="<?=ucfirst(_('issue title'))?>">
                    <span class="icon tick valid"></span>
                </p>
                <p>
                    <textarea id="issue_detail" name="issue_detail" placeholder="Description" class="{validate:{required:true}}"></textarea>
                </p>
                <p>
                    <select name="assign_user" id="assign_user" placeholder="Users" class="{validate:{required:true}}">
                        <?php foreach( $issue_list as $key => $val ): ?>
                        <option value="<?=_($val->id)?>"><?=ucfirst(_($val->first_name)).' '.ucfirst(_($val->last_name))?></option>
                        <?php endforeach; ?>
                    </select>

                </p>
                <p>
                    <select name="select_status" id="select_status" placeholder="status" class="{validate:{required:true}}">
                        <option value="new"><?=ucfirst(_('new'))?></option>
                        <option value="acknowledged"><?=ucfirst(_('acknowledged'))?></option>
                        <option value="confirmed"><?=ucfirst(_('confirmed'))?></option>
                        <option value="fixed"><?=ucfirst(_('fixed'))?></option>
                        <option value="closed"><?=ucfirst(_('closed'))?></option>
                    </select>
                </p>

                <p>
                    <select name="select_priority" id="select_priority" placeholder="priority" class="{validate:{required:true}}">
                        <option value="low"><?=ucfirst(_('low'))?></option>
                        <option value="medium"><?=ucfirst(_('medium'))?></option>
                        <option value="high"><?=ucfirst(_('high'))?></option>
                    </select>
                </p>
                <p>
                    <textarea id="issue_tags" name="issue_tags" class="taginput"></textarea>
                </p>
                <p>
                    <input type="checkbox" name="issue_visible" id="issue_visible" />
                    <label for="issue_visible">This is a visible issue!</label>
                </p>
                <p>
                    <input type="checkbox" name="issue_comment_mode" id="issue_comment_mode" />
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