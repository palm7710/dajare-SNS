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
