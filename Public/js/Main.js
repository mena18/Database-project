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
let nav_btn_id = ['my-posts-btn', 'my-friends-btn', 'edit-my-profile-btn'];

function switch_active_btn(btn_id) {
    console.log('hello');
    for (let i = 0; i < nav_btn_id.length; i++)
        $('#'+nav_btn_id[i]).removeClass('active');
    $('#'+btn_id).addClass('active');
}

function show_create_post_form() {
    $('#create-post').show();
}

function hide_create_post_form() {
    $('#create-post').hide();
}
