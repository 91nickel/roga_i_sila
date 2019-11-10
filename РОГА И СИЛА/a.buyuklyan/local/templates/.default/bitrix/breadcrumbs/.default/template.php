<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult)) {
    return "";
}

$strReturn = '<nav class="nav_chain">';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if (!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css)) {
    $strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    if (!preg_match("/.*?company\/?$/", $arResult[$index]["LINK"])) {
        $arrow = ($index > 0? '<span class="nav_arrow inline-block"></span>' : '');

        if ($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
            $strReturn .= $arrow.'<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url">'.$title.'</a>';
        } else {
            $strReturn .= $arrow.'<span>'.$title.'</span>';
        }
    }
}
$strReturn .= '</nav>';
return $strReturn;
