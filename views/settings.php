<?php
/**
 * Tagger Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/tagger.xhtml>
 * Copyright (C) 2008 Andrew Smith <a.smith@silentworks.co.uk>
 * Copyright (C) 2008 Tyler Beckett <tyler@tbeckett.net>

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.

 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

?>
<h1><?php echo __('Tagger Plugin'); ?></h1>

<form action="<?php echo get_url('plugin/tagger/save'); ?>" method="post">
    <fieldset style="padding: 0.5em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('Tagger Frontend settings'); ?></legend>
        <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="label"><label for="case"><?php echo __('Type Case'); ?>: </label></td>
                <td class="field">
					<select name="case" id="case">
						<option value="1" <?php if($case == "1") echo 'selected ="";' ?>><?php echo __('Uppercase'); ?></option>
						<option value="0" <?php if($case == "0") echo 'selected ="";' ?>><?php echo __('Lowercase'); ?></option>
					</select>
				</td>
                <td class="help"><?php echo __('Choose if you want your tags to be uppercase. Otherwise, they will be lowercase.'); ?></td>
            </tr>
			<tr>
                <td class="label"><label for="tag_type"><?php echo __('Tag Type'); ?>: </label></td>
                <td class="field">
					<select name="tag_type" id="tag_type">
						<option value="count" <?php if($tag_type == "count") echo 'selected ="";' ?>><?php echo __('Count'); ?></option>
						<option value="cloud" <?php if($tag_type == "cloud") echo 'selected ="";' ?>><?php echo __('Cloud'); ?></option>
						<option value="default" <?php if($tag_type == "default") echo 'selected ="";' ?>><?php echo __('List'); ?></option>
					</select>
				</td>
                <td class="help"><?php echo __("Select how you would like the tags to be displayed, you can also overide this within the tag snippet."); ?></td>
            </tr>
        </table>
    </fieldset>
    <fieldset style="padding: 0.5em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('Tagger Backend settings'); ?></legend>
        <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
        	<tr>
                <td class="label"><label for="rowspage"><?php echo __('Tags per page'); ?>: </label></td>
                <td class="field">
					<input type="text" class="textinput" value="<?php echo $rowspage; ?>" name="rowspage" />
				</td>
                <td class="help"><?php echo __('Sets the number of tags to be displayed per page in the backend.'); ?></td>
        	</tr>
	        <tr>
	            <td class="label"><label for="sort_field"><?php echo __('Sort Field'); ?>: </label></td>
	            <td class="field">
					<select name="sort_field" id="sort_field">
						<?php foreach (Tagger::sortField() as $key => $field): ?>
							<option value="<?php echo $key; ?>" <?php if($sort_field == $key) echo 'selected ="";' ?>><?php echo $field; ?></option>
						<?php endforeach ?>
					</select>
				</td>
	            <td class="help"><?php echo __('Choose the field your would like your tags to be sorted by in the backend.'); ?></td>
	        </tr>
			<tr>
	            <td class="label"><label for="sort_order"><?php echo __('Sort Order'); ?>: </label></td>
	            <td class="field">
					<select name="sort_order" id="sort_order">
						<option value="ASC" <?php if($sort_order == "ASC") echo 'selected ="";' ?>><?php echo __('ASC'); ?></option>
						<option value="DESC" <?php if($sort_order == "DESC") echo 'selected ="";' ?>><?php echo __('DESC'); ?></option>
					</select>
				</td>
	            <td class="help"><?php echo __("Choose the order your would like your tags to be sorted by in the backend."); ?></td>
	        </tr>
	    </table>
    </fieldset>
    <br/>
    <p class="buttons">
        <input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save'); ?>" />
    </p>
</form>
