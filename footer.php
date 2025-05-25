<?php 
    require_once 'menu-option.php';
    require_once 'button.php';

    function createFooter() {
        $footerMenuOptions = createMenuOptionsContainer('footer-container', 'singular', array(
            new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
            new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
            new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
        ));

        $linkButton = createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, './styles/images/glow-logo.svg', 'manager access', 'button', 'login.php');
        
        return "<footer>$footerMenuOptions <a id='glow-logo-footer' href='index.php'><img src='./styles/images/glow-outlined-footer.svg'></a>$linkButton</footer>";
    }
?>