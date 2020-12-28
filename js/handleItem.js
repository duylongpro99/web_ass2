function addItem(){
    let name = $('#item-name').val();
    let picture_link = $('#picture-link').val();
    let price = $('#item-price').val();
    let category = $('#category').val();
    //console.log(name, picture_link, price, category);

    $.ajax({
        type: "POST",
        url: 'product-add.php',
        data: {
            name: name,
            picture_link: picture_link,
            category: category,
            price: price,
        },
        success: function(html) {
            //For wait 5 seconds
            if(html)location.reload();
        }

    });
}

function removeItem(itemId){
    if(itemId > 0){
        $.ajax({
            type: "POST",
            url: 'product-remove.php',
            data: {
                itemId: itemId
            },
            success: function(html) {
                //For wait 5 seconds
                if(html)location.reload();
            }
    
        });
    }
}