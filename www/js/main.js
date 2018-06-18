/**
 * Добавление товара в корзину
 * @param {type} itemId  ID товара по базе
 * @returns {undefined}
 */
function addToCart(itemId) {
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/addtocart/" + itemId + '/',
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        }
    });
}

function removeFromCart(itemId) {
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/removefromcart/" + itemId + '/',
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}

function conversionPrice(itemId){

    var newCnt = $('#itemCnt_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;
    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}

function getData(obj_form) {
    var hData = {};
    $('input, textarea, select', obj_form).each(function () {
        if(this.name && this.name !==''){
            hData[this.name] = this.value;
         //   console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
};

function registerNewUser(){
    var postData = getData('#registerBox');

    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data){
            alert(data['message']);
            if(data['success'] === 1){
                $('#registerBox').hide();
                $('#loginBox').hide();
                
                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                $('#btnSaveOrder').show();
            }
        }
    });
}

function logout(){
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/logout/",
        dataType: 'json'        
    });
}

function login(){
    var email = $('#loginEmail').val();
    var pwd   = $('#loginPwd').val();
    var postData = "email=" + email + "&pwd=" + pwd;
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();
                
                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
                
                $('#btnSaveOrder').show();
                
            } else {
                alert(data['message']);
            }
        }
    });
}

function showRegisterBox(){
    if( $('#registerBoxHidden').attr('value') !== '1'){
        $('#registerBoxHidden').show();
        $('#registerBoxHidden').attr('value', '1');
    } else {
        $('#registerBoxHidden').hide(); 
        $('#registerBoxHidden').attr('value', '');}
}

function updateUserData(){
    var postData = getData('#userDataBox');
    console.log(postData);
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/update/",
        data: postData,
        dataType: 'json',
        success: function(data){
            alert(data['message']);
            if(data['success'] === 1){
                $('#userLink').html(data['userName']);
            }
        }
    });
}
 
function saveOrder(){
    var postData = getData('form');
    console.log(postData);
    
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/saveorder/",
        data: postData,
        dataType: 'json',
        success: function(data){
            alert(data['message']);
            if(data['success'] === 1){
                document.location = '/';
            }
        }
    });
}

function showProducts(id){
    var objName = "#purchasesForOrderId_"+id;
    if( $(objName).css('display') != 'table-row'){
        $(objName).show();
    } else {
        $(objName).hide();
    }
}