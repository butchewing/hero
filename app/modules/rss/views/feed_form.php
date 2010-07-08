<?php

// default values
if (!isset($feed)) {
	$feed = array(
				'title' => '',
				'url_path' => '',
				'description' => '',
				'type' => FALSE,
				'filter_authors' => array(0),
				'filter_topics' => array(0),
				'summary_field' => ''
			);
}

?>
<?=$this->load->view(branded_view('cp/header'), array('head_files' => '<script type="text/javascript" src="' . branded_include('js/rss_feed.js') . '"></script>'));?>
<h1><?=$form_title;?></h1>
<form class="form validate" id="form_rss" method="post" action="<?=$form_action;?>">
<fieldset>
	<legend>RSS Feed Details</legend>
	<ul class="form">
		<li>
			<label class="full" for="title">Feed Name</label>
		</li>
		<li>
			<input type="text" class="required full text" id="title" name="title" value="<?=$feed['title'];?>" />
		</li>
		<li>
			<label for="url_path">URL Path</label>
			<input type="text" class="text mark_empty" id="url_path" rel="e.g, /feeds/my_feed.rss" name="url_path" value="<?=$feed['url_path'];?>" />
		</li>
		<li>
			<div class="help">If you leave this blank, it will be auto-generated from the Feed Name above.</div>
		</li>
		<li>
			<label class="full" for="description">Feed Description</label>
		</li>
		<li>
			<input type="text" class="required full text" id="description" name="description" value="<?=$feed['description'];?>" />
		</li>
	</ul>
</fieldset>
<fieldset>
	<legend>Filters</legend>
	<ul class="form">
		<li>
			<label for="type">Content Type</label>
			<?=form_dropdown('type',$types,$feed['type'],'id="content_type"');?>
		</li>
		<li>
			<label for="authors">Author(s)</label>
			<?=form_multiselect('authors[]',$users,$feed['filter_authors']);?>
		</li>
		<li>
			<label for="topics">Topic(s)</label>
			<?=form_multiselect('topics[]',$topics,$feed['filter_topics']);?>
		</li>
	</ul>
</fieldset>
<fieldset>
	<legend>Options</legend>
	<ul class="form">
		<li>
			<label for="summary_field">Summary Field</label>
			<? if (isset($field_options)) { ?>
				<? // we are editing and must have a field_options array which we can select from ?>
				<?=form_dropdown('summary_field',$field_options,$feed['summary_field'],'id="summary_field" class="editing"');?>
			<? } else { ?>
				<?=form_dropdown('summary_field',array('' => 'Loading...'),'','id="summary_field"');?>
			<? } ?>
		</li>
		<li>
			<div class="help">This field populates each RSS feed item's summary.  It helps give users an idea of what the content is about.  All text will automatically be shortened to an appropriate length.</div>
		</li>
	</ul>
</fieldset>
<div class="submit">
	<input type="submit" class="button" name="form_rss" value="Save RSS Feed" />
</div>
</form>
<?=$this->load->view(branded_view('cp/footer'));?>