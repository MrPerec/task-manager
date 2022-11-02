<?php

$menuArrRigthBar = [
    [
        'id' => 'login',
		'title' => 'Авторизация',
		'path' => '/?login=yes',
	],
    [
        'id' => 'registration',
		'title' => 'Регистрация',
		'path' => '/?registration=yes',
	],
    [
        'id' => 'forgot',
		'title' => 'Забыли пароль?',
		'path' => '/?forgot=yes',
	],
];

?>

<td class="right-collum-index">
    <?php 
    if (isLogin()) {
        // if (isset($_GET['login'])) require_once ($serverRootPath . AUTH_BLOCK);
        echo 'Тут должен красиво отображаться личный кабинет пользователя';
    } else{ 
        ?>
        <div class="project-folders-menu">
            <ul class="project-folders-v">
                <?php
                foreach ($menuArrRigthBar as $key => $value) {
                    $curId = $value['id'];
                    $curTitle = $value['title'];
                    $curPath = $value['path'];
                    $curClass = ( array_key_first($_GET) == $curId || ($curId == 'login' && empty($_GET)) ) ? 'project-folders-v-active' : '';
                    ?> 

                    <li class="<?=$curClass?>"><a href=<?=$curPath?>><?=$curTitle?></a></li> 
                    <?php
                }
                ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <?php
        if (isset($_GET['login'])) {
            require_once ($serverRootPath . AUTH_BLOCK);
        } elseif(isset($_GET['registration'])) {
            require_once ($serverRootPath . REGISTER_BLOCK);
        } elseif(isset($_GET['forgot'])) {
            require_once ($serverRootPath . FORGOT_BLOCK);
        } else {
            require_once ($serverRootPath . AUTH_BLOCK);
        }
    }
    ?>
</td>