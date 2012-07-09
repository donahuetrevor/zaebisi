<div id="form_container">
<h1><a>Add new Issue</a></h1>
<form id="new_issue_form" method="post" action="<?=base_url("index.php/bugTracker/create_issue")?>">
<label class="description" for="issue_name">Issue Name </label><br />
<input id="issue_name" name="issue_name" class="text medium" type="text" value=""/><br />
<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
</form>
</div>
