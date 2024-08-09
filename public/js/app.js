// 投稿の切り替え
document.addEventListener('DOMContentLoaded', function() {
    const currentSection = localStorage.getItem('currentSection') || 'dajare';
    
    function showSection(section) {
        document.getElementById('common-posts').classList.add('hidden');
        document.getElementById('dajare-posts').classList.add('hidden');

        if (section === 'common') {
            document.getElementById('common-posts').classList.remove('hidden');
        } else if (section === 'dajare') {
            document.getElementById('dajare-posts').classList.remove('hidden');
        }

        // セクションをローカルストレージに保存
        localStorage.setItem('currentSection', section);
    }

    function activateButton(button) {
        document.querySelectorAll('.toggle-section').forEach(btn => {
            btn.classList.remove('bg-deep-purple', 'text-white');
            btn.classList.add('border', 'border-deep-purple', 'text-deep-purple');
        });

        button.classList.add('bg-deep-purple', 'text-white');
        button.classList.remove('border', 'text-deep-purple');
    }

    // ページロード時に保存されたセクションを表示
    showSection(currentSection);
    activateButton(document.querySelector(`[data-section="${currentSection}"]`));

    document.querySelectorAll('.toggle-section').forEach(button => {
        button.addEventListener('click', function() {
            showSection(this.dataset.section);
            activateButton(this);
        });
    });
});


// ダイアログの表示
// 要素の取得
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const modal = document.getElementById('modal');
const modalOverlay = document.getElementById('modalOverlay');

// モーダルを開く処理
openModalBtn.addEventListener('click', () => {
    modal.style.display = 'block';
    modalOverlay.style.display = 'block';
});

// モーダルを閉じる処理
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
    modalOverlay.style.display = 'none';
});

// オーバーレイをクリックした場合もモーダルを閉じる
modalOverlay.addEventListener('click', () => {
    modal.style.display = 'none';
    modalOverlay.style.display = 'none';
});