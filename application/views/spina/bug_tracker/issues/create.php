<div class="box">
    <div class="box-header">
        <h1><?=_('Create issue')?></h1>
    </div>

    <div class="box-content">
        <form method="post" action="" novalidate="novalidate">

            <div>
                <p>
                    <?php echo form_input(array('id' => 'issue_name', 'name' => 'issue_name', 'placeholder' => ucfirst(_('issue title')), 'class' => '{validate:{required:true,minlength:5}}'));?>

                    <span class="icon tick valid"></span>
                </p>
                <p class="warning">
                    <?=ucfirst(_('warning'))?>: <?=_('minimum length')?> <?php printf(ngettext('%d char', '%d chars', $issue_title_min_length), $issue_title_min_length)?>.
                </p>

                <p>
                    <textarea id="issue_detail" name="issue_detail" placeholder="Description" class="{validate:{required:true}}"></textarea>
                </p>
                <p>
                    <select name="assign_user[]" multiple="multiple" id="assign_user"  placeholder="Select users to assign to issue" class="{validate:{required:true}}">
                        <?php foreach( $issue_users_list as $key => $val ): ?>
                        <option value="<?=_($val->id)?>"><?=ucfirst(_($val->first_name)).' '.ucfirst(_($val->last_name))?></option>
                        <?php endforeach; ?>
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