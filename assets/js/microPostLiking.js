
document.querySelectorAll('.btn-like').forEach(likeButton => {
    const likeButtonId = likeButton.id.split('-')[1];
    const likeButtonByIdElement = document.getElementById(`microPostLikeBtn-${likeButtonId}`)
    likeButtonByIdElement.addEventListener('click', (event) => {
        likeButtonByIdElement.disabled = true;
        fetch(`/likes/like/${likeButtonId}`,{credentials:"include"})
            .then(function (response) {
                response.json().then(function (json) {
                        document.getElementById(`microPostUnlikeCount-${likeButtonId}`)
                            .innerText = json.count;
                        switchButtons(likeButtonByIdElement,document.getElementById(`microPostUnlikeBtn-${likeButtonId}`))

                    }
                )
                    .catch(function () {
                        switchButtons(likeButtonByIdElement,document.getElementById(`microPostUnlikeBtn-${likeButtonId}`))
                    })
            })
    })
})


document.querySelectorAll('.btn-unlike').forEach(unLikeButton => {
    const unLikeButtonId = unLikeButton.id.split('-')[1];
    const unLikeButtonByIdElement = document.getElementById(`microPostUnlikeBtn-${unLikeButtonId}`)
    unLikeButtonByIdElement.addEventListener('click', (event) => {
        unLikeButtonByIdElement.disabled = true;
        fetch(`/likes/unlike/${unLikeButtonId}`,{credentials:"include"})
            .then(function (response) {
                response.json().then(function (json) {
                        document.getElementById(`microPostLikeCount-${unLikeButtonId}`)
                            .innerText = json.count;
                        switchButtons(unLikeButtonByIdElement,document.getElementById(`microPostLikeBtn-${unLikeButtonId}`))

                    }
                )
                    .catch(function () {
                        switchButtons(unLikeButtonByIdElement,document.getElementById(`microPostLikeBtn-${unLikeButtonId}`))
                    })
            })
    })
})


function switchButtons(button,oppositeButton)
{
        button.disabled = false;
        button.style.display = 'none';
        oppositeButton.style.display = 'block';
}
