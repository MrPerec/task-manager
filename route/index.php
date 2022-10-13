<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/src/constants.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . HEADER);

$uri = $_SERVER['REQUEST_URI'];

?>

    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1><?=getTitle($menuArray)?></h1>
                <?php if ($uri == '/route/about/') {
                        include ($_SERVER['DOCUMENT_ROOT'] . ABOUT_PAGE);
                    } elseif ($uri == '/route/contacts/') {
                        include ($_SERVER['DOCUMENT_ROOT'] . CONTACTS_PAGE);
                    } elseif ($uri == '/route/news/') {
                        include ($_SERVER['DOCUMENT_ROOT'] . NEWS_PAGE);
                    } elseif ($uri == '/route/catalog/') {
                        include ($_SERVER['DOCUMENT_ROOT'] . CATALOG_PAGE);
                    } elseif ($uri == '/route/opportunity/') {
                        include ($_SERVER['DOCUMENT_ROOT'] . OPPORTUNITY_PAGE);
                    } elseif ($uri == '/route/gallery/') {
                        include ($_SERVER['DOCUMENT_ROOT'] . GALLERY_PAGE);
                    } else {
                        include ($_SERVER['DOCUMENT_ROOT'] . MAIN_PAGE);
                        include ($_SERVER['DOCUMENT_ROOT'] . RIGHT_COLUMN);
                } ?>
        </tr>
    </table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . FOOTER); ?>