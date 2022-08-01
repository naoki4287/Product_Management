"use strict";

const itemSum = document.getElementsByClassName("itemSum");
const sum = document.getElementById("sum");
const cartInItemSum = document.getElementById("cartInItemSum");
const priceSum = Array.from(itemSum);

{
    const num = items.map((item) => {
        let sum = item.item_num;
        return sum;
    });

    const quantity = num.reduce((sum, num) => {
        return sum + num;
    });
    
    cartInItemSum.textContent = `合計：${quantity}個`;
}

{
    const cartSum = items.map((item) => {
        let sum = item.price * item.item_num;
        return sum;
    });

    const total = cartSum.reduce((sum, price) => {
        return sum + price;
    }, 0);

    const totalComma = total.toLocaleString();
    sum.textContent = `￥${totalComma}円`;
}

