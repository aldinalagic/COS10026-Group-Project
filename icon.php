<?php
    /* 
        CONTEXT:
        The reason why this file was made is because of how trash HTML is. 
        Changing colors of external svg files is basically *nearly* impossible as the fill="currentColor"
        is not inherited, therefore it cannot be changed within css. 

        HOWEVER I (Aldin) thought of a workaround!
        Essentially icon.php reads in the contents of a external svg file, then it replaces 'fill' contents with
        `currentColor` (basically turn fill="#ffffff" into fill="currentColor"). Afterwards, we just copy the stuff 
        within the external svg and inline it rather than calling from an <img> tag or such.

        AND 

        we can change the color of the svg, using `color` property in CSS :D
    */

    // An enum that defines the possibles sizes of an icon.
    enum IconSize : string {
        case SMALL4 = 'small-4';
        case SMALL3 = 'small-3';
        case SMALL2 = 'small-2';
        case SMALL1 = 'small-1';
        case NORMAL = 'normal';
        case LARGE = 'large';
        case EXTRALARGE = 'extra-large';
    }

    // Creates the icon
    function createIcon($path = '', $size = IconSize::NORMAL) {
        return parseSVGContents($path, $size->value);
    }

    // Reads in and replaces the current fill with currentColor 
    function parseSVGContents($path, $sizeValue) {
        $contents = file_get_contents($path);

        // Add class to the svg.
        $contents = str_replace("<svg", "<svg class='icon $sizeValue'", $contents);
    
        $pattern = '/fill=[\'"]#([0-9a-fA-F]{3,6})[\'"]/';
        $replacement = 'fill="currentColor"';
        return preg_replace($pattern, $replacement, $contents);
        
    }
?>