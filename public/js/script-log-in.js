document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");
    const identifierInput = document.getElementById("identifier");
    const passwordInput = document.getElementById("password");

    const errIdentifier = document.getElementById("err-identifier");
    const errPassword = document.getElementById("err-password");

    const dummyUsers = [
        {
            identifiers: ["anggota", "anggota@gmail.com"],
            password: "anggota123",
            role: "anggota"
        },
        {
            identifiers: ["admin", "admin@gmail.com"],
            password: "admin123",
            role: "admin"
        }
    ];

    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const identifier = identifierInput.value.trim().toLowerCase();
        const password = passwordInput.value.trim();

        errIdentifier.textContent = "";
        errPassword.textContent = "";

        let isValid = true;

        if (identifier === "") {
            errIdentifier.textContent = "Username atau email wajib diisi.";
            isValid = false;
        }

        if (password === "") {
            errPassword.textContent = "Password wajib diisi.";
            isValid = false;
        }

        if (!isValid) {
            return;
        }

        const user = dummyUsers.find(function (item) {
            return item.identifiers.includes(identifier) && item.password === password;
        });

        if (!user) {
            errPassword.textContent = "Username/email atau password salah.";
            return;
        }

        localStorage.setItem("isLoggedIn", "true");
        localStorage.setItem("userRole", user.role);

        if (user.role === "admin") {
            window.location.href = window.LOGIN_ROUTES.admin;
        } else {
            window.location.href = window.LOGIN_ROUTES.anggota;
        }
    });

    const eyeButtons = document.querySelectorAll(".eye-btn");

    eyeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const targetId = button.getAttribute("data-target");
            const input = document.getElementById(targetId);

            const eyeOff = button.querySelector(".eye-off");
            const eyeOn = button.querySelector(".eye-on");

            if (input.type === "password") {
                input.type = "text";
                eyeOff.classList.add("hidden");
                eyeOn.classList.remove("hidden");
            } else {
                input.type = "password";
                eyeOff.classList.remove("hidden");
                eyeOn.classList.add("hidden");
            }
        });
    });
});