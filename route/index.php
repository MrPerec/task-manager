<?php

$uri = $_SERVER['REQUEST_URI'];
$serverRootPath = $_SERVER['DOCUMENT_ROOT'];

require_once ($serverRootPath . '/src/constants.php');
require_once ($serverRootPath . HEADER);

?>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1><?=getTitle($mainMenu)?></h1>
                <?php
                if (isLogin()) {
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
                    }
                } 

                include ($serverRootPath . MAIN_PAGE);
                include ($serverRootPath . RIGHT_COLUMN);
                ?>
            </td>
        </tr>
    </table>

<?php require_once ($serverRootPath . FOOTER); ?>