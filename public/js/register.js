"use strict";


const input = document.getElementsByClassName("input");
const inputs = Array.from(input);

const confirmContent = (name, address, tel) =>
    `
  <div>
    <div class="mt-2">出荷先会社名</div>
    <div class="sdContent">${name}</div>
    <div class="mt-2">出荷先住所</div>
    <div class="sdContent">${address}</div>
    <div class="mt-2">出荷先電話番号</div>
    <div class="sdContent">${tel}</div>
    <button class="inline-flex items-center mt-8 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white" id="storeBtn">登録</button>
    <button class="inline-flex items-center mt-8 ml-8 px-4 py-2 bg-green-600 rounded-md font-semibold text-xs text-white" id="backBtn">戻る</button>
  </div>
`;

$("#registerBtn").on("click", function () {
    const sd = inputs.map((input) => {
        let sdinfo = input.value;
        return sdinfo;
    });

    let sdinfo = {
        name: null,
        address: null,
        tel: null,
    };

    sdinfo.name = sd[0];
    sdinfo.address = sd[1];
    sdinfo.tel = sd[2];

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        url: "validateSession",
        data: {
            sdinfo: sdinfo,
        },
    })
        //通信が成功したとき
        .done((sdinfo) => {
          console.log(sdinfo);
          console.log(Array.isArray(sdinfo.name));
          if(Array.isArray(sdinfo.name) || Array.isArray(sdinfo.address) || Array.isArray(sdinfo.tel)) {
            $('#errorList').empty()
            const sds = Object.values(sdinfo);
            sds.map((sd) => {
              $('#errorList').append(`<span>${sd}</span><br>`)
            })
          } else {
            history.pushState("", "", "confirm");
            $("#registerPage").attr("class", "hidden");
            $("#confirmPage").append(confirmContent(sdinfo.name, sdinfo.address, sdinfo.tel));
          }
        })
        //通信が失敗したとき
        .fail((error) => {
            console.error(error.statusText);
        });
});

// $("#storeBtn").on("click", function () {
$(document).on("click", "#storeBtn", function () {
    let sdContent = document.getElementsByClassName("sdContent");
    const sdContents = Array.from(sdContent);

    const sd = sdContents.map((sdContent) => {
        let sdinfo = sdContent.textContent;
        return sdinfo;
    });

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // type: "post",
        url: "validateSession",
        data: {
            sd: sd,
        },
    })
        //通信が成功したとき
        .done((sd) => {
            console.log("成功しました");
        })
        //通信が失敗したとき
        .fail((error) => {
            console.log("失敗しました");
        });
});
