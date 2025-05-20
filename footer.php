<?php 
    require_once 'menu-option.php';
    require_once 'button.php';

    function createFooter() {
        $footerMenuOptions = createMenuOptionsContainer('footer-container', 'singular', array(
            new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
            new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
            new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
        ));

        $linkButton = createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Grey, './styles/images/external_link_line.svg', 'jira board', 'button', 'https://fletcher06.atlassian.net/jira/software/projects/CGAP1/summary');
        
        return "<footer>$footerMenuOptions <a id='glow-logo-footer' href='index.php'><img src='./styles/images/glow-outlined-footer.svg'></a>$linkButton</footer>";
    }
?>