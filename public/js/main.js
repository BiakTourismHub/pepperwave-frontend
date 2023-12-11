$(document).ready(function () {
    if(localStorage.getItem('authToken')){
        window.location.href = "/dashboard"
    }

    $('#form-login').submit(async function (e) {
        e.preventDefault();

        try {
            const email = $('#email').val();
            const password = $('#password').val();

            const { token } = await $.ajax({
                "url": "http://localhost:3000/login",
                "method": "POST",
                "headers": {
                  "Content-Type": "application/json"
                },
                "data": JSON.stringify({
                  "email": email,
                  "password": password
            })});

            `<?php
                session(['token_auth' => ${token}])
            ?>`
            localStorage.setItem('authToken', token)

            window.location.href = "/dashboard"

        } catch (error) {
            console.error(error);
        }
    });

    $('#form-register').submit(async function (e) {
        e.preventDefault();

        try {
            const fullname = $('#fullname').val();
            const email = $('#email').val();
            const password = $('#password').val();
            const phone = $('#phone').val();

            const response = await $.ajax({
                "url": "http://localhost:3000/register",
                "method": "POST",
                "headers": {
                  "Content-Type": "application/json"
                },
                "data": JSON.stringify({
                    "fullname": fullname,
                    "email": email,
                    "password": password,
                    "phone": phone
            })});

            window.location.href = `/`

        } catch (error) {
            console.error(error);
        }
    });
});
