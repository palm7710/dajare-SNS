// コメントモーダル関連の要素をクラス名で取得
const openCommentModalBtns = document.querySelectorAll('.openCommentModalBtn');
const closeCommentModalBtns = document.querySelectorAll('.closeCommentModalBtn');
const commentModals = document.querySelectorAll('.commentModal');
const commentModalOverlays = document.querySelectorAll('.commentModalOverlay');

// モーダルを開く処理
openCommentModalBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        commentModals[index].style.display = 'block';
        commentModalOverlays[index].style.display = 'block';
    });
});

// モーダルを閉じる処理
closeCommentModalBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        commentModals[index].style.display = 'none';
        commentModalOverlays[index].style.display = 'none';
    });
});

// オーバーレイをクリックした場合もモーダルを閉じる
commentModalOverlays.forEach((overlay, index) => {
    overlay.addEventListener('click', () => {
        commentModals[index].style.display = 'none';
        overlay.style.display = 'none';
    });
});
