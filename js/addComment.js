function myFunc(x){
    let comment = '';
    if($('#comment-text').val())comment = $('#comment-text').val();
    if(comment.length > 0){
        $.ajax({
        type: "POST",
        url: 'comment-add.php',
        data: {
            id: x,
            comment: comment
        },
        success: function(html) {
            //For wait 5 seconds
            if(html)location.reload();
        }

    });
    }
    else{
        alert('Comment is empty!!!');
    }
}