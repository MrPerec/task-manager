<?php

$uri = $_SERVER['REQUEST_URI'];
$serverRootPath = $_SERVER['DOCUMENT_ROOT'];

require_once ($serverRootPath . '/src/constants.php');
require_once ($serverRootPath . HEADER);

?>
<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">
            <?php
            if (isLogin()) {
                ?><h1><?=getTitle($leftBarMenu)?></h1><?php
                if ($uri == URI_ABOUT) {
                    include ($serverRootPath . ABOUT_PAGE);
                } elseif ($uri == URI_CONTACTS) {
                    include ($serverRootPath . CONTACTS_PAGE);
                } elseif ($uri == URI_NEWS) {
                    include ($serverRootPath . NEWS_PAGE);
                } elseif ($uri == URI_CATALOG) {
                    include ($serverRootPath . CATALOG_PAGE);
                } elseif ($uri == URI_OPPORTUNITY) {
                    include ($serverRootPath . OPPORTUNITY_PAGE);
                } elseif ($uri == URI_GALLERY) {
                    include ($serverRootPath . GALLERY_PAGE);
                } elseif ($uri == URI_PROFILE) {
                    include ($serverRootPath . PROFILE_PAGE);
                } elseif ($uri == URI_POSTS) {
                    include ($serverRootPath . POSTS_PAGE);
                } elseif ($uri == URI_ADD_POSTS && isWriter()) {
                    include ($serverRootPath . ADD_POST_PAGE);
                } else {
                    include ($serverRootPath . MAIN_PAGE);
                }
            } else {
                ?><h1><?=$leftBarMenu[array_key_first($leftBarMenu)]['title']?></h1><?php
                include ($serverRootPath . MAIN_PAGE);
                include ($serverRootPath . RIGHT_COLUMN);
            }
            ?>
        </td>
    </tr>
</table>

<?php require_once ($serverRootPath . FOOTER); ?>