    <?php
    if (isset($_SESSION['isAuthorized'])) {
        \showMenu\showMenu($mainMenu, 'title', false);
    } else {?>
        <div class="clearfix">
            <ul class="main-menu bottom">
                <li><a class="link_font-size-12 link_text-decoration" href="/">Главная</a></li>
            </ul>
        </div>
    <?}?>
    <div class="footer">&copy;&nbsp;<nobr>2018</nobr> Project.</div>
</body>
</html>