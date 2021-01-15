//-- Login & Signup page --/

function show_signup_popup() {
    $('#signup-form').show();
}

function hide_signup_popup() {
    $('#signup-form').hide();
}

(function init_signup_selectors() {
    let date = new Date();
    let node = null
    let textNode = null
    let months = ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"]
    console.log(date.getFullYear())
    console.log(date.getMonth())
    for (let i=1; i <= 31; i++) {
        node = document.createElement("option");
        textNode = document.createTextNode(i.toString());
        node.appendChild(textNode);
        node.selected = (i === date.getDate())
        $('#days').append(node);
    }
    for (let i = 0; i < months.length; i++) {
        node = document.createElement("option");
        textNode = document.createTextNode(months[i]);
        node.appendChild(textNode);
        node.selected = (i === date.getMonth())
        $('#months').append(node);
    }
    for (let i = date.getFullYear(); i >= 1969; i--) {
        node = document.createElement("option");
        textNode = document.createTextNode(i.toString())
        node.appendChild(textNode);
        node.selected = (i === date.getFullYear());
        $('#years').append(node)
    }
})();

//-- My Profile page --//
let navBtnId = ['my-posts-btn', 'my-friends-btn', 'my-friend-requests', 'edit-my-profile-btn', 'blocked-users-btn'];
let profileBodyContainers = ['posts-container', 'friends-container', 'friend-requests-container', 'edit-container', 'blocked-users-container'];
let currentYPosition = null;

function switch_active_btn(btn_id) {
    for (let i = 0; i < navBtnId.length; i++)
        $('#'+navBtnId[i]).removeClass('active');
    $('#'+btn_id).addClass('active');
    let arr = [0, 0, 0, 0, 0];
    if (btn_id === 'my-posts-btn')
        arr[0] = 1;
    else if (btn_id === 'my-friends-btn')
        arr[1] = 1;
    else if (btn_id === 'my-friend-requests')
        arr[2] = 1;
    else if (btn_id === 'edit-my-profile-btn')
        arr[3] = 1;
    else
        arr[4] = 1;
    for (let i = 0; i < arr.length; i++) {
        let el = $('#'+profileBodyContainers[i]);
        if (arr[i] === 0)
            el.css('display', 'none')
        else
            el.css('display', 'block');
        // console.log(profileBodyContainers[i] + '   ' + i + '   '  + arr[i] + '   ' + el.css('display') + '   ' + el.attr('id'))
    }
}

function show_form (form_id) {
    currentYPosition = window.pageYOffset;
    $("html, body").animate({scrollTop : 0},500);
    $('body').css({
        'overflow': 'hidden'
    });
    $('#'+form_id).show();
}

function hide_form (form_id) {
    $("html, body").animate({scrollTop : currentYPosition},500);
    $('body').css({
        'overflow': 'auto'
    });
    $('#'+form_id).hide();
}

function display_selected_image (input, el) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#'+el).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $('#'+el+'-container').css('display', 'block');
    }
}

function add_new_phone() {
    let phonesContainer = $('#phone-numbers-container');
    let lastPhoneNumber = phonesContainer.children().last().children().first().children().first();
    if (phonesContainer.children().length !== 0 && lastPhoneNumber.val().length === 0)
        return;
    let newPhoneId = phonesContainer.children().last().attr('id');
    if (newPhoneId === undefined)
        newPhoneId = 1;
    else
        newPhoneId = newPhoneId.substring(newPhoneId.lastIndexOf('-') + 1, newPhoneId.length);
    newPhoneId = parseInt(newPhoneId) + 1;
    let newPhone = '<div class="form-row col-md-4 mb-3" id="phone-number-' + newPhoneId + '">\n' +
        '                    <div class="col">\n' +
        '                        <input name="phones[]" type="number" class="form-control" placeholder="phone">\n' +
        '                    </div>\n' +
        '                    <div class="remove-btn col" onclick="remove_phone_number(' + newPhoneId + ')">\n' +
        '                        <i class="far fa-trash-alt btn"></i>\n' +
        '                    </div>\n' +
        '                </div>';
    phonesContainer.append(newPhone);
    phonesContainer.animate({scrollTop : phonesContainer.outerHeight()+100},1000);
}

function remove_phone_number (id) {
    $('#phone-number-' + id).remove();
}

switch_active_btn('my-posts-btn');