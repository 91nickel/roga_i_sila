<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?><?php

$arDefaultUrlTemplates404 = array(
   "list" => "index.php",
   "element" => "#ELEMENT_ID#.php"
);

$arDefaultVariableAliases404 = array();

$arDefaultVariableAliases = array();

$arComponentVariables = array("IBLOCK_ID", "ELEMENT_ID");


$SEF_FOLDER = "";
$arUrlTemplates = array();

if ($arParams["SEF_MODE"] == "Y") {
    $arVariables = array();

    $arUrlTemplates =
        CComponentEngine::MakeComponentUrlTemplates(
            $arDefaultUrlTemplates404,
            $arParams["SEF_URL_TEMPLATES"]
        );
    $arVariableAliases =
        CComponentEngine::MakeComponentVariableAliases(
            $arDefaultVariableAliases404,
            $arParams["VARIABLE_ALIASES"]
        );

    $componentPage = CComponentEngine::ParseComponentPath(
        $arParams["SEF_FOLDER"],
        $arUrlTemplates,
        $arVariables
    );

    if (StrLen($componentPage) <= 0) {
        $componentPage = "list";
    }

    CComponentEngine::InitComponentVariables(
        $componentPage,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables
    );

    $SEF_FOLDER = $arParams["SEF_FOLDER"];
} else {
    $arVariables = array();

    $arVariableAliases =
       CComponentEngine::MakeComponentVariableAliases(
           $arDefaultVariableAliases,
           $arParams["VARIABLE_ALIASES"]
       );
    CComponentEngine::InitComponentVariables(
        false,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables
    );

    $componentPage = "";
    if (IntVal($arVariables["ELEMENT_ID"]) > 0) {
        $componentPage = "element";
    } else {
        $componentPage = "list";
    }
}

$arResult = array(
   "FOLDER" => $SEF_FOLDER,
   "URL_TEMPLATES" => $arUrlTemplates,
   "VARIABLES" => $arVariables,
   "ALIASES" => $arVariableAliases
);

$this->IncludeComponentTemplate($componentPage);
