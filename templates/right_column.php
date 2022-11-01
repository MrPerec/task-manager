<td class="right-collum-index">
    <!-- <div class="project-folders-menu">
        <ul class="project-folders-v">
            <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
            <li><a href="/?registration=yes">Регистрация</a></li>
            <li><a href="#">Забыли пароль?</a></li>
        </ul>
        <div class="clearfix"></div>
    </div> -->
    <?php 
    if (isLogin()) {
        // if (isset($_GET['login'])) require_once ($serverRootPath . AUTH_BLOCK);
        echo 'Тут должен красиво отображаться личный кабинет пользователя';
    } else{ 
        ?>
        <div class="project-folders-menu">
            <ul class="project-folders-v">
                <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
                <li><a href="/?registration=yes">Регистрация</a></li>
                <li><a href="#">Забыли пароль?</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <? 
        // require_once ($serverRootPath . AUTH_BLOCK);
        if (isset($_GET['login'])) {
            require_once ($serverRootPath . AUTH_BLOCK);
        } elseif(isset($_GET['registration'])) {
            require_once ($serverRootPath . REGISTER_BLOCK);
        } else {
            require_once ($serverRootPath . AUTH_BLOCK);
        }
    }
    ?>
</td>