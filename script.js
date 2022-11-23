

// Main: Cart Function 
var count = 0;
var tprice = 0;
const cart = (price) => {
    count = count + 1;
    document.getElementById('total-products').innerText = count;
    tprice = tprice + price;
    document.getElementById('price').innerText = tprice;
    DeliveryCharge(tprice);
    // updatePrice(price*102.72);
    // total();

}

// Function for Delivery Charge
var net_price = 0;
const DeliveryCharge = (newPrice) => {
    let DeliveryCharge;
    if (newPrice <= 500) {
        // return document.getElementById('delivery-charge').innerText = 0;
        DeliveryCharge = 0;
    }
    if (newPrice > 500 && newPrice <= 800) {
        // document.getElementById('delivery-charge').innerText = 100;
        DeliveryCharge = 100;
    }
    else if (newPrice > 800 && newPrice <= 1000) {
        // document.getElementById('delivery-charge').innerText = 150;
        DeliveryCharge = 150;
    }
    else if (newPrice >= 1000) {
        // document.getElementById('delivery-charge').innerText = 200;
        DeliveryCharge = 200;
    }
    document.getElementById('delivery-charge').innerText = DeliveryCharge;
    net_price = newPrice + DeliveryCharge;
    document.getElementById('total').innerText = newPrice + DeliveryCharge;
    tax(net_price);
}


const tax = (total) => {
    const taxadd = (total * 0.15);
    document.getElementById('tax').innerText = taxadd.toFixed(2);
    const result = taxadd + total;
    document.getElementById('intotal').innerText = result.toFixed(2);
}

const orderProducts = () => {
    const final = document.getElementById('intotal').innerText;
    alert("Dear Sir," + "\n" + "You have to pay: " + final + "\n" + "Thank You!" + "\n" + "Regrads-" + "\n" + "Twinkles's Shopping Zone");
    document.getElementById('intotal').innerText = 0;
    document.getElementById('total-products').innerText = 0;
    document.getElementById('price').innerText = 0;
    document.getElementById('delivery-charge').innerText = 0;
    document.getElementById('total').innerText = 0;
    document.getElementById('tax').innerText = 0;

    count = 0;
    tprice = 0;
    net_price = 0;
}


const chkout = () => {
    let initial_state = document.getElementById('mycart').style.display;
    if (initial_state == "block") {
        document.getElementById('mycart').style.display = "none";
    }
    else {
        document.getElementById('mycart').style.display = "block";
    }
}


// for register
// const form = document.getElementById('form');
// const name = document.getElementById('name');
// const uname = document.getElementById('uname');
// const email = document.getElementById('email');
// const number = document.getElementById('number');
// const pass = document.getElementById('pass');
// const re_pass = document.getElementById('re_pass');


// function checkInputs() {
//     const nameValue = name.value.trim();
//     const unameValue = uname.value.trim();
//     const emailValue = email.value.trim();
//     const numberValue = number.value.trim();
//     const passValue = pass.value.trim();
//     const re_passValue = re_pass.value.trim();

// function isEmail(email) {
//     const re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(email);
//     return re.test(String(email).toLowerCase());
// }

// function setErrorFor(input, message) {
//     const formControl = input.parentElement;
//     const small = formControl.querySelector('small');
//     formControl.className = 'form-control error';
//     const small = formControl.querySelector('small');
//     small.innerText = message;
// }
// function setSuccessFor(input) {
//     const formControl = input.parentElement;
//     formControl.className = 'form-control success';
// }

// form.addEventListener('submit', (e) => {
//     e.preventDefault();
//     if (nameValue === '') {
//         setErrorFor(name, 'Name cannot be blank');
//     } else {
//         setSuccessFor(name);
//     }
//     if (unameValue === '') {
//         setErrorFor(uname, 'Username cannot be blank');
//     } else {
//         setSuccessFor(uname);
//     }
//     if (emailValue === '') {
//         setErrorFor(email, 'Email cannot be blank');
//     } else if (!isEmail(emailValue)) {
//         setErrorFor(email, 'Not a valid email');
//     } else {
//         setSuccessFor(email);
//     }
//     if (numberValue === '') {
//         setErrorFor(number, 'Number cannot be blank');
//     } else if (!isNumber(numberValue)) {
//         setErrorFor(number, 'Not a valid number');
//     } else {
//         setSuccessFor(number);
//     }
//     if (passValue === '') {
//         setErrorFor(pass, 'Password cannot be blank');
//     } else {
//         setSuccessFor(pass);
//     }
//     checkInputs();
// }



// function checkRequired(inputArr) {
//     inputArr.forEach(function (input) {
//         if (input.value.trim() === '') {
//             setErrorFor(input, `${input.id} is required`);
//         } else {
//             setSuccessFor(input);
//         }
//     });


//     form.addEventListener('submit', (e) => {
//         e.preventDefault();
//         checkRequired([name, uname, email, number, pass, re_pass]);
//     });
// }

function register() {
    var name = document.getElementById('name').value;
    var uname = document.getElementById('uname').value;
    var email = document.getElementById('email').value;
    var number = document.getElementById('number').value;
    var pass = document.getElementById('pass').value;
    var re_pass = document.getElementById('re_pass').value;

    var httpr = new XMLHttpRequest();
    // var url = "http://localhost:3000/register";
    httpr.open("POST", "get_data.php", true);
    httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    httpr.onreadystatechange = function () {
        if (httpr.readyState == 4 && http.status == 200) {
            // alert(http.responseText);
            document.getElementById('response').innerHTML = httpr.responseText;
        }
    }
    
    httpr.send("name=" + name + "&uname=" + uname + "&email=" + email + "&number=" + number + "&pass=" + pass + "&re_pass" + re_pass);
}