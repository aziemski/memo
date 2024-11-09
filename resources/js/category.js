function toggleColorInput() {
    const colorInput = document.getElementById('color');
    const disableColorCheckbox = document.getElementById('disableColor');

    if (disableColorCheckbox.checked) {
        colorInput.disabled = true;
    } else {
        colorInput.disabled = false;
    }
}

window.toggleColorInput = toggleColorInput;
