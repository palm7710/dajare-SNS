// 投稿の切り替え
document.addEventListener('DOMContentLoaded', function() {
    function showSection(section) {
        // すべてのセクションを非表示
        document.getElementById('common-posts').classList.add('hidden');
        document.getElementById('dajare-posts').classList.add('hidden');

        // 指定されたセクションを表示
        if (section === 'common') {
            document.getElementById('common-posts').classList.remove('hidden');
        } else if (section === 'dajare') {
            document.getElementById('dajare-posts').classList.remove('hidden');
        }
    }

    // デフォルトでダジャレの投稿を表示
    showSection('dajare');

    // ボタンにクリックイベントを追加
    document.querySelectorAll('.toggle-section').forEach(button => {
        button.addEventListener('click', function() {
            showSection(this.dataset.section);
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