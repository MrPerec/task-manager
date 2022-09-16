<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/src/constants.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . HEADER_PATH);

$uri = $_SERVER['REQUEST_URI'];

?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1><?=getTitle($menuArray)?></h1>
                <?php
                if ($uri == '/route/about/') {
                    include ($_SERVER['DOCUMENT_ROOT'] . ABOUT_PATH);
                } elseif ($uri == '/route/contacts/') {
                    include ($_SERVER['DOCUMENT_ROOT'] . CONTACTS_PATH);
                } elseif ($uri == '/route/news/') {
                    include ($_SERVER['DOCUMENT_ROOT'] . NEWS_PATH);
                } elseif ($uri == '/route/catalog/') {
                    include ($_SERVER['DOCUMENT_ROOT'] . CATALOG_PATH);
                } elseif ($uri == '/route/opportunity/') {
                    include ($_SERVER['DOCUMENT_ROOT'] . OPPORTUNITY_PATH);
                } elseif ($uri == '/route/gallery/') {
                    include ($_SERVER['DOCUMENT_ROOT'] . GALLERY_PATH);
                } elseif ($uri == '/route/gallery/create/') {
                    include ($_SERVER['DOCUMENT_ROOT'] . GALLERY_CREATE_PATH);
                } else {
                    include ($_SERVER['DOCUMENT_ROOT'] . MAIN_PATH);
                    include ($_SERVER['DOCUMENT_ROOT'] . RIGHT_COLUMN_PATH);
                }
                ?>
        </tr>
    </table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . FOOTER_PATH); ?>