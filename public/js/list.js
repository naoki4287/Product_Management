"use strict";

const cancel = document.getElementById("cancel");
const delModalOpen = document.getElementById("delModalOpen");
const deleteModal = document.getElementById("deleteModal");
const cartItemId = document.getElementById("cartItemId");
const select = document.getElementsByClassName("select");
const checkbox = document.getElementsByName("checkbox");
const checkboxes = Array.from(checkbox);
const items = itemsList.data;
const selects = Array.from(select);
console.log(items);

delModalOpen.addEventListener("click", () => {
    deleteModal.classList.remove("hidden");
});

cancel.addEventListener("click", () => {
    deleteModal.classList.add("hidden");
});

// checkboxをクリックするたびにクリックされたcheckboxにidがついているか確認し、ついていれば削除し、ついていなければidを付与する
$(".checkbox").on("click", function () {
    if ($(this).attr("id") === undefined) {
        let id = $(this).attr("value");
        $(this).attr("id", id).attr("disabled", true);
        cartItemId.value += id + ",";
        console.log(cartItemId.value);
    } else {
        $(this).removeAttr("id").removeAttr;
    }
});

$(".select").on("change", function () {
    console.log($(this));
    if ($(this).val() !== "" && $(this).attr("id") === undefined) {
        let id = $(this).val();
        $(this).attr("id", id);
    }
    console.log($(this).attr("id"));
});

for (let i = 0; i < select.length; i++) {
    console.log(select[i].value);
}

$("#cartBtn").on("click", function () {
    // const checkedItems = checkboxes.filter((cbox) => {
    //     return cbox.checked === true;
    // });

    // const checkedItemsIds = checkedItems.map((checkedItem) => {
    //     let id = checkedItem.getAttribute("id");
    //     return id;
    // });
    // console.log(checkedItemsIds);

    const selectedItems = selects.filter((select) => {
        return select.value !== "";
    });

    const selectedItemsIds = selectedItems.map((selectedItem) => {
          let id = selectedItem.getAttribute("id");
          return id;
      });

    const selectedItemsNum = selectedItems.map((selectedItem) => {
          let num = selectedItem.value;
          return num;
      });

    console.log(selectedItems);
    console.log(selectedItemsIds);
    console.log(selectedItemsNum);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "/addCart",
        data: {
            selectedItemsIds: selectedItemsIds,
            selectedItemsNum: selectedItemsNum,
        },
    })
        //通信が成功したとき
        .done((res) => {
            console.log("カートに入れました");
        })
        //通信が失敗したとき
        .fail((error) => {
            console.log("失敗しました");
        });
});
