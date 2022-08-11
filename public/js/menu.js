"use strict";
const bg = document.getElementById("bg");
const pageListMenu = document.getElementById("pageListMenu");
const buyItemsMenu = document.getElementById("buyItemsMenu");

const buyItemsHistory = (product_name, item_num, created_at) =>
    `
      <tr>
        <td class="border-2 border-gray-200 px-4 py-2">${product_name}</td>
        <td class="border-2 border-gray-200 px-4 py-2">${item_num}</td>
        <td class="border-2 border-gray-200 px-4 py-2">${created_at}</td><br>
      </tr>
`;

$("#pageList").on("click", function () {
    pageListMenu.classList.remove("hidden");
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

$("#buyItems").on("click", function () {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: "buyItems",
    })
        //通信が成功したとき
        .done((buyItems) => {
            $("#buyItemsHistory").empty();
            buyItems.map((buyItem) => {
                $("#buyItemsHistory").append(buyItemsHistory(buyItem.product_name, buyItem.item_num, buyItem.created_at));
            });
        })
        //通信が失敗したとき
        .fail((error) => {
            console.error(error.statusText);
        });
});
