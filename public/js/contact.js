"use strict";

$(function () {
    $("#male").on("click", function () {
        $("#syumi").attr("name", "syumi")
          .attr('placeholder', '趣味');
    });
});

$(function () {
    $("#female").on("click", function () {
        $("#syumi").attr("name", "tokugi")
          .attr('placeholder', '特技');
    });
});

$(function () {
    $(".check").on("click", function () {
        if ($(this).prop("checked")) {
            $(".check").prop("checked", false);
            $(this).prop("checked", true);
        }
    });
});

