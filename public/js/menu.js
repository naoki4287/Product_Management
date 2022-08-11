"use strict";
const bg = document.getElementById("bg");
const pageListMenu = document.getElementById("pageListMenu");
const buyItemsMenu = document.getElementById("buyItemsMenu");

$("#pageList").on("click", function () {
    if (buyItemsMenu.classList.contains("hidden")) {
        pageListMenu.classList.remove("hidden");
    }
});

$("#buyItems").on("click", function () {
    buyItemsMenu.classList.remove("hidden");
});

$("#pageListCrossBtn").on("click", function () {
    pageListMenu.classList.add("hidden");
});

$("#buyItemsCrossBtn").on("click", function () {
    buyItemsMenu.classList.add("hidden");
});

$(document).on("click", function (e) {
    if (!e.target.closest(".menu") && !e.target.closest("#pageList")) {
        pageListMenu.classList.add("hidden");
    }
    if (!e.target.closest(".menu") && !e.target.closest("#buyItems")) {
        buyItemsMenu.classList.add("hidden");
    }
});

