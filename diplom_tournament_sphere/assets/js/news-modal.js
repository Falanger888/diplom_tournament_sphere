document.addEventListener('DOMContentLoaded', () => {
    const fileInput            = document.getElementById('fileInput');
    const fileInputLabel       = document.getElementById('fileInputLabel');
    const selectedFileMessage  = document.getElementById('selectedFileMessage');
    const fileName             = document.getElementById('fileName');

    fileInput?.addEventListener('change', () => {
        const file = fileInput.files[0];
        if (file && !file.type.startsWith('image/')) {
            fileInput.value = '';
            selectedFileMessage.style.display = 'none';
            fileName.textContent = '';
            fileInputLabel.textContent = 'Выберите файл (изображение)';
            alert('Пожалуйста, выберите файл в формате изображения.');
        } else {
            selectedFileMessage.style.display = 'block';
            fileName.textContent = file ? file.name : '';
        }
    });

    // Открытие/закрытие — через общие openModal/closeModal из script.js
});