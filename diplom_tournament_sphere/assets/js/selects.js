function updateSelects() {
    const serverSelect   = document.getElementById("server-select");
    const classSelect    = document.getElementById("class-select");
    const nicknameSelect = document.getElementById("nickname-select");
    if (!serverSelect || !classSelect || !nicknameSelect) return;

    const val = serverSelect.value;
    classSelect.value    = val;
    nicknameSelect.value = val;
}