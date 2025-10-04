document.addEventListener("DOMContentLoaded", function () {
  const signupForm = document.getElementById("signupForm");

  if (signupForm) {
    signupForm.addEventListener("submit", function (event) {
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;

      if (name === "" || email === "" || password === "") {
        alert("Semua kolom wajib diisi!");
        event.preventDefault();
        return;
      }

      if (password.length < 6) {
        alert("Password minimal harus 6 karakter.");
        event.preventDefault();
        return;
      }
    });
  }
});
