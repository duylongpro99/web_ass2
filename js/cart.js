let amounts = document.querySelectorAll(".amount");
let prices  = document.querySelectorAll(".price");
let items = document.querySelectorAll(".item");

pay = () => {
    let bill = 0;
    amounts.forEach((element, index) => {
        if(!isNaN(Number(amounts[index].innerHTML)) && !isNaN(Number(prices[index].innerHTML))){
            bill += Number(amounts[index].innerHTML) * Number(prices[index].innerHTML);
        }
    });
    document.querySelectorAll(".total")[0].innerHTML = "<b>" + bill.toString() + "</b>";
    document.querySelectorAll(".confirm")[0].innerHTML = "<button type='button' onclick='purchase()' class='btn btn-primary'>Purchase</button>" 
}

purchase = () => {
    window.location.href = "./success.html";
}
