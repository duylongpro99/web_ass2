function deleteAccount(accountId) {
    $.post("./deleteAccount.php", {
        userId: accountId
    }, function(data) {
        if (data) {
            location.reload();
        }
    });
}

function myFunction(x) {
    var txt;
    var r = confirm("Delete data cannot be recovered!");
    if (r == true) {
        deleteAccount(x);
    }
}