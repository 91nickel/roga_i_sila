<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("T_IBLOCK_SALONS_NAME"),
    "DESCRIPTION" => GetMessage("T_IBLOCK_SALONS_DESCRIPTION"),
    "COMPLEX" => "Y",
    "PATH" => array(
        "ID" => "content",
        "CHILD" => array(
            "ID" => "qsoft",
            "NAME" => GetMessage("T_IBLOCK_QSOFT"),
            "SORT" => 10,
        ),
    ),
);
