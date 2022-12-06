<?php

class Schema
{
    /**
     */
    private function __construct()
    {
    }

    const SHOP = [
        "tb" => "tShop",
        "id" => "shopId",
        "owner" => "shopOwner",
        "email" => "shopEmail",
        "phone" => "shopPhone",
        "password" => "shopPassword",
        "address" => "shopFullAddress",
        "slogan" => "shopSlogan",
        "latitude" => "shopLat",
        "longitude" => "shopLng",
        "isSeller" => "isSeller",
        "cover" => "shopImageCover",
        "isSuspended"=>"isSuspended"
    ];

    const CATEGORY = [
        "tb" => "tCategory",
        "id" => "catId",
        "name" => "catName"
    ];

    const PRODUCT = [
        "tb" => "tProduct",
        "id" => "prodId",
        "name" => "prodName",
        "mark" => "prodmark",
        "price" => "prodPrice",
        "priceoff" => "prodOfferPrice",
        "isOffer" => "isOffer",
        "isValid" => "isValid",
        "prodImg" => "productImages",
        "comment" => "productComment"
    ];
    const CMD = [
        "tb" => "tCommand",
        "id" => "cmdId",
        "prodId" => "prodId",
        "tprice" => "cmdTotalPrice",
        "qt" => "cmdQuantity",
        "date" => "cmdDate",
        "delPoint" => "cmdDeliveyPoint",
        "delLat" => "cmdDeliverLat",
        "delLng" => "cmdDeliverLng",
        "confirmed" => "iscmdConfirmed",
        "isPaid" => "isPaid",
        "isReceived" => "isCustormerReceived"
    ];
}
