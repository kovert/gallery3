<?php defined("SYSPATH") or die("No direct script access.") ?>
<? // @todo Set hover on AlbumGrid list items ?>
<form action="<?= url::site("/search") ?>" id="gSearchForm">
  <fieldset>
    <legend>
      <?= t("Search") ?>
    </legend>
    <ul>
      <li>
        <label for="q"><?= t("Search the gallery") ?></label>
        <input name="q" id="q" type="text" value="<?= p::clean($q) ?>"/>
      </li>
      <li>
        <input type="submit" value="<?= t("Search") ?>" />
      </li>
    </ul>
  </fieldset>
</form>

<div id="gSearchResults">
  <h1><?= t("Search Results") ?></h1>

  <? if (count($items)): ?>
  <ul id="gAlbumGrid">
    <? foreach ($items as $item): ?>
      <? $item_class = "gPhoto"; ?>
      <? if ($item->is_album()): ?>
        <? $item_class = "gAlbum"; ?>
      <? endif ?>
   <li class="gItem <?= $item_class ?>">
      <a href="<?= url::site("items/$item->id") ?>">
        <?= $item->thumb_img() ?>
        <p>
          <?= p::purify($item->title) ?>
        </p>
        <div>
    <?= nl2br(p::purify($item->description)) ?>
        </div>
      </a>
    </li>
    <? endforeach ?>
  </ul>
  <?= $theme->pager() ?>

  <? else: ?>
  <p>
    <?= t("No results found for <b>%term</b>", array("term" => p::clean($q))) ?>
  </p>

  <? endif; ?>
</div>
