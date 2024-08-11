// コメントモーダル関連の要素
const openCommentModalBtn = document.getElementById('openCommentModalBtn');
const closeCommentModalBtn = document.getElementById('closeCommentModalBtn');
const commentModal = document.getElementById('commentModal');
const commentModalOverlay = document.getElementById('commentModalOverlay');

console.log(openCommentModalBtn);

// モーダルを開く処理
openCommentModalBtn.addEventListener('click', () => {
    commentModal.style.display = 'block';
    commentModalOverlay.style.display = 'block';
});

// モーダルを閉じる処理
closeCommentModalBtn.addEventListener('click', () => {
    commentModal.style.display = 'none';
    commentModalOverlay.style.display = 'none';
});

// オーバーレイをクリックした場合もモーダルを閉じる
commentModalOverlay.addEventListener('click', () => {
    commentModal.style.display = 'none';
    commentModalOverlay.style.display = 'none';
});