'use strict';

$("#cartBtn").on("click", function () {

  $.ajax({
      headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      type: "post",
      url: "",
      data: {
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
