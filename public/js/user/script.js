document.querySelector('#profile_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const imgElement = document.querySelector('#profile_image_preview');
            imgElement.src = e.target.result;
        };
        
        reader.readAsDataURL(file);
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const flashMessage = document.getElementById('flashMessage');
    const closeFlash = document.getElementById('closeFlash');

    if (flashMessage) {
        // 5秒後にフラッシュメッセージを自動で非表示にする
        setTimeout(() => {
            flashMessage.classList.add('hidden');
        }, 5000);

        // フラッシュメッセージを手動で閉じる
        if (closeFlash) {
            closeFlash.addEventListener('click', function () {
                flashMessage.classList.add('hidden');
            });
        }
    }
});
