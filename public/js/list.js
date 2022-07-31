"use strict";

// const { inArray } = require("jquery");

const cancel = document.getElementById("cancel");
const delModalOpen = document.getElementById("delModalOpen");
const deleteModal = document.getElementById("deleteModal");
const cartItemId = document.getElementById("cartItemId");
const checkbox = document.getElementsByName("checkbox");
const checkboxes = Array.from(checkbox);
const items = itemsList.data;

delModalOpen.addEventListener("click", () => {
    deleteModal.classList.remove("hidden");
});

cancel.addEventListener("click", () => {
    deleteModal.classList.add("hidden");
});

// checkboxをクリックするたびにクリックされたcheckboxにidがついているか確認し、ついていれば削除し、ついていなければidを付与する
$(".checkbox").on("click", function () {
    // console.log($(this).attr("value"));
    // console.log($(this).attr("id"));
    if ($(this).attr("id") === undefined) {
        let id = $(this).attr("value");
        $(this).attr("id", id);
        cartItemId.value += id + ",";
        console.log(cartItemId.value);
    } else {
        $(this).removeAttr("id");
    }
});

$("#cartBtn").on("click", function () {
    const checkedItems = checkboxes.filter((cbox) => {
        return cbox.checked === true;
    });

    const checkedItemsIds = checkedItems.map((checkedItem) => {
        let id = checkedItem.getAttribute("id");
        return id;
    });

    // const cartItems = items.filter((item, checkedItemsIds, index) => {
    //     return item.data[index].id === checkedItemsIds[index];
    // });

    // const cartItems = items.map((item, checkedItemsIds, index) => {
    //     if ($.inArray(checkedItemsIds[index], item)) {
    //       return item;
    //     }
    // });
    console.log(checkedItemsIds);
    // console.log(cartItems);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "/addCart",
        data: {
            checkedItemsIds: checkedItemsIds,
        },
    })
        //通信が成功したとき
        .done((res) => {
            // console.log(res.message);
            console.log("カートに入れました");
        })
        //通信が失敗したとき
        .fail((error) => {
            // console.log(error.statusText);
            console.log("失敗しました");
        });
});
