<?php

define('CORE', '/src/core.php');

define('PASSWORDS', '/data/passwords.php');
define('USERS', '/data/users.php');

define('AUTH_BLOCK', '/templates/auth.php');
define('FOOTER', '/templates/footer.php');
define('FORGOT_BLOCK', '/templates/forgot.php');
define('HEADER', '/templates/header.php');
define('REGISTER_BLOCK', '/templates/register.php');
define('RIGHT_COLUMN', '/templates/right_column.php');

define('AUTH_SUCC_MSG', '/include/auth_success_message.php');
define('AUTH_ERR_MSG', '/include/auth_error_message.php');
define('REG_SUCC_MSG', '/include/registr_success_message.php');
define('REG_PASS_MATCH_ERR_MSG', '/include/registr_pass_match_error_message.php');
define('REG_PASS_LENGTH_ERR_MSG', '/include/registr_pass_length_error_message.php');

define('ABOUT_PAGE', '/include/about.php');
define('CONTACTS_PAGE', '/include/contacts.php');
define('CATALOG_PAGE', '/include/catalog.php');
define('GALLERY_PAGE', '/include/gallery.php');
define('GALLERY_CREATE', '/include/gallery_create.php');
define('MAIN_PAGE', '/include/main.php');
define('NEWS_PAGE', '/include/news.php');
define('OPPORTUNITY_PAGE', '/include/opportunity.php');
define('PROFILE_PAGE', '/include/profile.php');
define('POSTS_PAGE', '/include/posts.php');
define('ADD_POST_PAGE', '/include/add_post.php');

define('URI_ABOUT', '/route/about/');
define('URI_CONTACTS', '/route/contacts/');
define('URI_CATALOG', '/route/catalog/');
define('URI_GALLERY', '/route/gallery/');
define('URI_MAIN', '/route/main/');
define('URI_NEWS', '/route/news/');
define('URI_OPPORTUNITY', '/route/opportunity/');
define('URI_PROFILE', '/route/profile/');
define('URI_POSTS', '/route/posts/');
define('URI_ADD_POSTS', '/route/posts/add');

define('UPLOAD_DIR', '/upload/');

define('EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'bmp']);

define("MIN_PASS_LENGTH", 6);
?>