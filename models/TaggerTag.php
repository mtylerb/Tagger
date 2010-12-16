<?php

 /**
 * Tagger Plugin for Wolf CMS <http://www.tbeckett.net/articles/plugins/tagger.xhtml>
 * 
 * [direct port of Frog Tagger for Wolf CMS <http://www.wolfcms.org/>]
 *
 * Copyright (C) 2008 - 2010 Andrew Smith <a.smith@silentworks.co.uk>
 * Copyright (C) 2008 - 2011 Tyler Beckett <tyler@tbeckett.net>
 * 
 * Dual licensed under the MIT (mit-license.txt)
 * and GPL (gpl-license.txt) licenses.
 */

/**
 * class TaggerTag
 *
 * @author Andrew Smith <a.smith@silentworks.co.uk>
 * @since  0.9
 */

class TaggerTag extends PageTag
{
    public function beforeSave()
    {
        // apply filter to save is generated result in the database
        $this->content_html = !empty($this->filter_id) ? Filter::get($this->filter_id)->apply($this->content) : $this->content;

        return true;
    }

	public function findTagsAndPageAssigned($id)
	{
		// Prepare SQL
        $sql = 'SELECT page.*, tag.id AS tagid FROM '.TABLE_PREFIX.'page AS page, '.TABLE_PREFIX.'page_tag AS page_tag, '.TABLE_PREFIX.'tag AS tag WHERE page.id = page_tag.page_id AND page_tag.tag_id ='. $id;

        $stmt = self::$__CONN__->prepare($sql);
        $stmt->execute();

		while($page = $stmt->fetchObject()) $pages[$page->id] = $page->title;

		return $pages;
	}
	
	public static function deletePageTagRelationship($page_id, $tag_id)
	{	
		// get the id of the tag
        $tag = Record::findOneFrom('Tag', 'id=?', array($tag_id));
        Record::deleteWhere('PageTag', 'page_id=? AND tag_id=?', array($page_id, $tag->id));
        $tag->count--;
        $tag->save();
        return true;
	}

    public static function findByPageId($id)
    {
        return self::findAllFrom('TaggerTag', 'page_id='.(int)$id.' ORDER BY id');
    }

    public static function deleteByTagId($id)
    {
        return self::$__CONN__->exec('DELETE FROM '.self::tableNameFromClassName('TaggerTag').' WHERE tag_id='.(int)$id) === false ? false: true;
    }

} // end PagePart class
