<style>
    body {
        background: white !important;
        overflow-x: hidden;
    }

    @media screen and (min-width: 1024px) {
        .login-background {
            position: fixed;
            top: 0;
            right: 0;
            width: 50vw;
            height: 100vh;
            background-image: url("{{ asset('assets/splash.jpg') }}");
            background-size: cover;
            background-position: center;
            object-fit: cover;
        }

        main {
            position: absolute;
            left: 100px;
            max-width: 400px;
            z-index: 1;
        }

        .fi-logo {
            position: fixed;
            left: 100px;
            font-size: 3em;
            color: black;
        }
    }

    @media screen and (max-width: 1023px) {
        .login-background {
            display: none;
        }
    }

    .fi-simple-main {
        background-color: white !important;
    }

    .fi-input {
        background-color: white !important;
        color: black !important;
    }

    .fi-input-wrp {
        border: 2px solid #d1d5db  !important;
        border-radius: 10px !important;
        background-color: #f4f7fc !important;
        box-shadow: 0 2px 6px rgba(0, 95, 255, 0.3) !important;
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active{
        -webkit-background-clip: text;
        -webkit-text-fill-color: black;
        transition: background-color 5000s ease-in-out 0s;
        box-shadow: inset 0 0 20px 20px white;
    }
    .fi-input-wrp:focus-within {
        border-color: #0059ff !important;
        background-color: #f4f7fc !important;
        box-shadow: 0 0 5px rgba(0, 95, 255, 0.5) !important;
    }

    h1 {
        margin-top: 10px;
        font-weight: 600 !important;
        color: black !important;
    }

    .fi-btn {
        background-color: #0059ff !important;
        color: white !important;
    }

    span {
        color: black !important;
    }

    button span {
        color: white !important;
    }

    .fi-simple-footer {
        color: black !important;
    }

    .fi-link {
        color: black !important;
        text-decoration: underline;
    }
    .fi-checkbox-input {
        background-color: white;
        border: 2px solid #d1d5db;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .fi-checkbox-input:checked {
        background-color: #0059ff !important;
        border-color: #0059ff !important;
    }

    .fi-checkbox-input:focus {
        border-color: #0059ff !important;
        outline: none;
    }

    .fi-checkbox-input:checked + span {
        color: #0059ff;
    }

</style>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const loginBackground = document.createElement('div');
        loginBackground.classList.add('login-background');
        document.body.appendChild(loginBackground);
    });
</script>
