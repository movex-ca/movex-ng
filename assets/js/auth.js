/* =========================================================
   MOVEX 9JA AUTH SHARED JS
   Handles password show/hide toggle
   ========================================================= */

function togglePassword(fieldId, button) {
    const input = document.getElementById(fieldId);

    if (!input) return;

    if (input.type === "password") {
        input.type = "text";
        button.textContent = "🙈";
    } else {
        input.type = "password";
        button.textContent = "👁";
    }
}